<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use App\Models\PaymentSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    /**
     * ============================================================
     * HALAMAN PEMBAYARAN
     * ============================================================
     */
    public function create(Booking $booking)
    {
        $booking->load([
            'plot.category',
            'payments',
        ]);

        /*
        |--------------------------------------------------------------------------
        | TENTUKAN JENIS PEMBAYARAN
        |--------------------------------------------------------------------------
        |
        | Jika URL:
        | /payment/{booking}/create
        |
        | maka dianggap pembayaran awal.
        |
        | Jika URL:
        | /payment/{booking}/create?jenis=PELUNASAN
        |
        | maka dianggap pembayaran sisa.
        |
        */

        $jenisPembayaran = strtoupper(
            trim(request()->query('jenis', ''))
        );

        /*
        |--------------------------------------------------------------------------
        | CEK STATUS BOOKING
        |--------------------------------------------------------------------------
        */

        if ($jenisPembayaran === 'PELUNASAN') {

            if ($booking->status !== 'CONFIRMED') {
                return redirect()
                    ->route('booking.show', $booking)
                    ->with(
                        'error',
                        'Pelunasan hanya dapat dilakukan setelah booking dikonfirmasi admin.'
                    );
            }

        } else {

            if ($booking->status !== 'BOOKED') {
                return redirect()
                    ->route('booking.show', $booking)
                    ->with(
                        'error',
                        'Booking ini tidak dapat melakukan pembayaran.'
                    );
            }
        }

        /*
        |--------------------------------------------------------------------------
        | CEK MASA BERLAKU BOOKING
        |--------------------------------------------------------------------------
        |
        | Pelunasan tidak perlu dicek expiry karena booking sudah CONFIRMED.
        |
        */

        if (
            $jenisPembayaran !== 'PELUNASAN' &&
            now()->greaterThan($booking->expires_at)
        ) {

            $booking->update([
                'status' => 'EXPIRED',
            ]);

            $booking->plot()->update([
                'status' => 'AVAILABLE',
            ]);

            return redirect()
                ->route('booking.show', $booking)
                ->with(
                    'error',
                    'Masa berlaku booking telah berakhir.'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | HITUNG SISA PEMBAYARAN
        |--------------------------------------------------------------------------
        */

        $sisaPembayaran = 0;

        if ($jenisPembayaran === 'PELUNASAN') {

            $hargaCash = (float) $booking
                ->plot
                ->category
                ->harga_cash;

            $totalPembayaranVerified = (float) $booking
                ->payments
                ->where('status', 'VERIFIED')
                ->sum('jumlah');

            $sisaPembayaran = max(
                0,
                $hargaCash - $totalPembayaranVerified
            );

            /*
            |--------------------------------------------------------------------------
            | CEK PEMBAYARAN YANG MASIH MENUNGGU VERIFIKASI
            |--------------------------------------------------------------------------
            */

            $pendingPayment = $booking
                ->payments
                ->where('status', 'SUBMITTED')
                ->first();

            if ($pendingPayment) {

                return redirect()
                    ->route('booking.show', $booking)
                    ->with(
                        'error',
                        'Masih ada pembayaran yang menunggu verifikasi admin.'
                    );
            }

            /*
            |--------------------------------------------------------------------------
            | JIKA SUDAH LUNAS
            |--------------------------------------------------------------------------
            */

            if ($sisaPembayaran <= 0) {

                return redirect()
                    ->route('booking.show', $booking)
                    ->with(
                        'success',
                        'Pembayaran booking ini sudah lunas.'
                    );
            }
        }

        /*
        |--------------------------------------------------------------------------
        | PENGATURAN PEMBAYARAN
        |--------------------------------------------------------------------------
        */

        $paymentSetting = PaymentSetting::first();

        /*
        |--------------------------------------------------------------------------
        | TAMPILKAN HALAMAN PEMBAYARAN
        |--------------------------------------------------------------------------
        */

        return view(
            'payment.create',
            compact(
                'booking',
                'paymentSetting',
                'jenisPembayaran',
                'sisaPembayaran'
            )
        );
    }


    /**
     * ============================================================
     * PROSES PEMBAYARAN AWAL / PELUNASAN
     * ============================================================
     */
    public function store(Request $request, Booking $booking)
    {
        /*
        |--------------------------------------------------------------------------
        | LOAD RELASI
        |--------------------------------------------------------------------------
        */

        $booking->load([
            'plot.category',
            'payments',
        ]);

        /*
        |--------------------------------------------------------------------------
        | VALIDASI FORM
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([

            'jenis_pembayaran' => [
                'required',
                'in:BOOKING_FEE,CASH,CICILAN,PELUNASAN',
            ],

            'tenor' => [
                'nullable',
                'required_if:jenis_pembayaran,CICILAN',
                'in:12,24,36',
            ],

            'metode_pembayaran' => [
                'required',
                'in:Transfer Bank,QRIS',
            ],

            'tanggal_pembayaran' => [
                'required',
                'date',
            ],

            'bukti_pembayaran' => [
                'required',
                'file',
                'mimes:jpg,jpeg,png,pdf',
                'max:5120',
            ],

        ], [

            'jenis_pembayaran.required' =>
                'Silakan pilih jenis pembayaran.',

            'jenis_pembayaran.in' =>
                'Jenis pembayaran tidak valid.',

            'tenor.required_if' =>
                'Tenor wajib dipilih untuk pembayaran cicilan.',

            'tenor.in' =>
                'Tenor cicilan harus 12, 24, atau 36 bulan.',

            'metode_pembayaran.required' =>
                'Silakan pilih metode pembayaran.',

            'metode_pembayaran.in' =>
                'Metode pembayaran tidak valid.',

            'tanggal_pembayaran.required' =>
                'Tanggal pembayaran wajib diisi.',

            'tanggal_pembayaran.date' =>
                'Tanggal pembayaran tidak valid.',

            'bukti_pembayaran.required' =>
                'Bukti pembayaran wajib diunggah.',

            'bukti_pembayaran.file' =>
                'Bukti pembayaran harus berupa file.',

            'bukti_pembayaran.mimes' =>
                'Bukti pembayaran harus berupa JPG, JPEG, PNG, atau PDF.',

            'bukti_pembayaran.max' =>
                'Ukuran bukti pembayaran maksimal 5 MB.',
        ]);


        /*
        |--------------------------------------------------------------------------
        | DATA PEMBAYARAN
        |--------------------------------------------------------------------------
        */

        $jenisPembayaran = $validated['jenis_pembayaran'];

        $tenor = $validated['tenor'] ?? null;

        $cicilanKe = null;

        if ($jenisPembayaran === 'CICILAN') {
            $cicilanKe = 1;
        }


        /*
        |--------------------------------------------------------------------------
        | CEK STATUS BOOKING SESUAI JENIS PEMBAYARAN
        |--------------------------------------------------------------------------
        */

        if ($jenisPembayaran === 'PELUNASAN') {

            if ($booking->status !== 'CONFIRMED') {

                return redirect()
                    ->route('booking.show', $booking)
                    ->with(
                        'error',
                        'Pelunasan hanya dapat dilakukan setelah booking dikonfirmasi admin.'
                    );
            }

        } else {

            if ($booking->status !== 'BOOKED') {

                return redirect()
                    ->route('booking.show', $booking)
                    ->with(
                        'error',
                        'Booking ini tidak dapat melakukan pembayaran.'
                    );
            }
        }


        /*
        |--------------------------------------------------------------------------
        | CEK MASA BERLAKU BOOKING
        |--------------------------------------------------------------------------
        */

        if (
            $jenisPembayaran !== 'PELUNASAN' &&
            now()->greaterThan($booking->expires_at)
        ) {

            DB::transaction(function () use ($booking) {

                $booking->update([
                    'status' => 'EXPIRED',
                ]);

                $booking->plot()->update([
                    'status' => 'AVAILABLE',
                ]);
            });

            return redirect()
                ->route('booking.show', $booking)
                ->with(
                    'error',
                    'Masa berlaku booking telah berakhir.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | AMBIL KATEGORI
        |--------------------------------------------------------------------------
        */

        $category = $booking->plot->category;


        /*
        |--------------------------------------------------------------------------
        | TENTUKAN NOMINAL
        |--------------------------------------------------------------------------
        |
        | Nominal selalu diambil dari database.
        | Customer tidak bisa menentukan nominal sendiri.
        |
        */

        $jumlah = null;


        /*
        |--------------------------------------------------------------------------
        | BOOKING FEE
        |--------------------------------------------------------------------------
        */

        if ($jenisPembayaran === 'BOOKING_FEE') {

            $jumlah = $category->booking_fee;
        }


        /*
        |--------------------------------------------------------------------------
        | CASH
        |--------------------------------------------------------------------------
        */

        elseif ($jenisPembayaran === 'CASH') {

            $jumlah = $category->harga_cash;
        }


        /*
        |--------------------------------------------------------------------------
        | CICILAN PERTAMA
        |--------------------------------------------------------------------------
        */

        elseif ($jenisPembayaran === 'CICILAN') {

            if ((int) $tenor === 12) {

                $jumlah = $category->cicilan_12;

            } elseif ((int) $tenor === 24) {

                $jumlah = $category->cicilan_24;

            } elseif ((int) $tenor === 36) {

                $jumlah = $category->cicilan_36;
            }
        }


        /*
        |--------------------------------------------------------------------------
        | PELUNASAN
        |--------------------------------------------------------------------------
        |
        | Sisa = Harga Cash - seluruh pembayaran VERIFIED
        |
        */

        elseif ($jenisPembayaran === 'PELUNASAN') {

            /*
            |--------------------------------------------------------------------------
            | CEK PEMBAYARAN PENDING
            |--------------------------------------------------------------------------
            */

            $adaPaymentPending = $booking
                ->payments
                ->where('status', 'SUBMITTED')
                ->isNotEmpty();

            if ($adaPaymentPending) {

                return redirect()
                    ->route('booking.show', $booking)
                    ->with(
                        'error',
                        'Masih ada pembayaran yang menunggu verifikasi admin.'
                    );
            }


            /*
            |--------------------------------------------------------------------------
            | TOTAL PEMBAYARAN YANG SUDAH DIVERIFIKASI
            |--------------------------------------------------------------------------
            */

            $totalPembayaranVerified = (float) $booking
                ->payments
                ->where('status', 'VERIFIED')
                ->sum('jumlah');


            /*
            |--------------------------------------------------------------------------
            | HARGA CASH
            |--------------------------------------------------------------------------
            */

            $hargaCash = (float) $category->harga_cash;


            /*
            |--------------------------------------------------------------------------
            | HITUNG SISA
            |--------------------------------------------------------------------------
            */

            $jumlah = max(
                0,
                $hargaCash - $totalPembayaranVerified
            );


            /*
            |--------------------------------------------------------------------------
            | CEK SUDAH LUNAS
            |--------------------------------------------------------------------------
            */

            if ($jumlah <= 0) {

                return redirect()
                    ->route('booking.show', $booking)
                    ->with(
                        'success',
                        'Pembayaran booking ini sudah lunas.'
                    );
            }
        }


        /*
        |--------------------------------------------------------------------------
        | CEK NOMINAL
        |--------------------------------------------------------------------------
        */

        if (is_null($jumlah) || $jumlah <= 0) {

            return back()
                ->withInput()
                ->withErrors([
                    'jenis_pembayaran' =>
                        'Nominal pembayaran untuk pilihan tersebut belum tersedia.',
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | SIMPAN BUKTI PEMBAYARAN
        |--------------------------------------------------------------------------
        */

        $buktiPath = null;

        try {

            $buktiPath = $request
                ->file('bukti_pembayaran')
                ->store(
                    'bukti-pembayaran',
                    'public'
                );


            /*
            |--------------------------------------------------------------------------
            | SIMPAN PAYMENT
            |--------------------------------------------------------------------------
            */

            DB::transaction(function () use (
                $booking,
                $validated,
                $jenisPembayaran,
                $tenor,
                $cicilanKe,
                $jumlah,
                $buktiPath
            ) {

                Payment::create([

                    'booking_id' =>
                        $booking->id,

                    'metode_pembayaran' =>
                        $validated['metode_pembayaran'],

                    'jenis_pembayaran' =>
                        $jenisPembayaran,

                    'tenor' =>
                        $tenor,

                    'cicilan_ke' =>
                        $cicilanKe,

                    'jumlah' =>
                        $jumlah,

                    'tanggal_pembayaran' =>
                        $validated['tanggal_pembayaran'],

                    'bukti_pembayaran' =>
                        $buktiPath,

                    /*
                    |--------------------------------------------------------------------------
                    | Status awal
                    |--------------------------------------------------------------------------
                    */

                    'status' =>
                        'SUBMITTED',
                ]);
            });


        } catch (\Throwable $e) {

            /*
            |--------------------------------------------------------------------------
            | HAPUS FILE JIKA DATABASE GAGAL
            |--------------------------------------------------------------------------
            */

            if (
                $buktiPath &&
                Storage::disk('public')->exists($buktiPath)
            ) {

                Storage::disk('public')
                    ->delete($buktiPath);
            }

            throw $e;
        }


        /*
        |--------------------------------------------------------------------------
        | PESAN SUKSES
        |--------------------------------------------------------------------------
        */

        $pesanSukses = match ($jenisPembayaran) {

            'BOOKING_FEE' =>
                'Bukti pembayaran booking fee berhasil dikirim dan sedang menunggu verifikasi admin.',

            'CASH' =>
                'Bukti pembayaran cash berhasil dikirim dan sedang menunggu verifikasi admin.',

            'CICILAN' =>
                'Bukti pembayaran cicilan berhasil dikirim dan sedang menunggu verifikasi admin.',

            'PELUNASAN' =>
                'Bukti pembayaran pelunasan berhasil dikirim dan sedang menunggu verifikasi admin.',

            default =>
                'Bukti pembayaran berhasil dikirim dan sedang menunggu verifikasi admin.',
        };


        return redirect()
            ->route(
                'payment.success',
                $booking
            )
            ->with(
                'success',
                $pesanSukses
            );
    }


    /**
     * ============================================================
     * HALAMAN PAYMENT SUCCESS
     * ============================================================
     */
    public function success(Booking $booking)
    {
        $booking->load([
            'plot.category',
            'payments',
        ]);


        /*
        |--------------------------------------------------------------------------
        | PAYMENT TERAKHIR
        |--------------------------------------------------------------------------
        */

        $payment = $booking
            ->payments
            ->sortByDesc('created_at')
            ->first();


        /*
        |--------------------------------------------------------------------------
        | JIKA BELUM ADA PAYMENT
        |--------------------------------------------------------------------------
        */

        if (!$payment) {

            return redirect()
                ->route('booking.show', $booking)
                ->with(
                    'error',
                    'Data pembayaran belum ditemukan.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | TAMPILKAN SUCCESS
        |--------------------------------------------------------------------------
        */

        return view(
            'payment.success',
            compact(
                'booking',
                'payment'
            )
        );
    }


    /**
     * ============================================================
     * HALAMAN CICILAN BERIKUTNYA
     * ============================================================
     */
    public function installment(Booking $booking)
    {
        $booking->load([
            'plot.category',
            'payments',
        ]);


        /*
        |--------------------------------------------------------------------------
        | BOOKING HARUS CONFIRMED
        |--------------------------------------------------------------------------
        */

        if ($booking->status !== 'CONFIRMED') {

            return redirect()
                ->route('booking.show', $booking)
                ->with(
                    'error',
                    'Booking ini belum dapat melakukan pembayaran cicilan.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | AMBIL CICILAN VERIFIED
        |--------------------------------------------------------------------------
        */

        $paymentsVerified = $booking
            ->payments
            ->where('jenis_pembayaran', 'CICILAN')
            ->where('status', 'VERIFIED')
            ->sortBy('cicilan_ke');


        /*
        |--------------------------------------------------------------------------
        | CICILAN PERTAMA HARUS SUDAH VERIFIED
        |--------------------------------------------------------------------------
        */

        if ($paymentsVerified->isEmpty()) {

            return redirect()
                ->route('booking.show', $booking)
                ->with(
                    'error',
                    'Pembayaran cicilan pertama belum diverifikasi.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | CICILAN TERAKHIR
        |--------------------------------------------------------------------------
        */

        $lastVerified = $paymentsVerified->last();

        $tenor = (int) $lastVerified->tenor;

        $cicilanBerikutnya =
            ((int) $lastVerified->cicilan_ke) + 1;


        /*
        |--------------------------------------------------------------------------
        | CEK TENOR
        |--------------------------------------------------------------------------
        */

        if ($cicilanBerikutnya > $tenor) {

            return redirect()
                ->route('booking.show', $booking)
                ->with(
                    'success',
                    'Seluruh cicilan booking ini sudah lunas.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | AMBIL KATEGORI
        |--------------------------------------------------------------------------
        */

        $category = $booking->plot->category;


        /*
        |--------------------------------------------------------------------------
        | TENTUKAN NOMINAL CICILAN
        |--------------------------------------------------------------------------
        */

        $jumlah = match ($tenor) {

            12 => $category->cicilan_12,

            24 => $category->cicilan_24,

            36 => $category->cicilan_36,

            default => 0,
        };


        /*
        |--------------------------------------------------------------------------
        | CEK NOMINAL
        |--------------------------------------------------------------------------
        */

        if (!$jumlah || $jumlah <= 0) {

            return redirect()
                ->route('booking.show', $booking)
                ->with(
                    'error',
                    'Nominal cicilan belum tersedia.'
                );
        }


        return view(
            'payment.installment',
            compact(
                'booking',
                'lastVerified',
                'cicilanBerikutnya',
                'tenor',
                'jumlah'
            )
        );
    }


    /**
     * ============================================================
     * SIMPAN CICILAN BERIKUTNYA
     * ============================================================
     */
    public function storeInstallment(
        Request $request,
        Booking $booking
    ) {
        $booking->load([
            'plot.category',
            'payments',
        ]);


        /*
        |--------------------------------------------------------------------------
        | BOOKING HARUS CONFIRMED
        |--------------------------------------------------------------------------
        */

        if ($booking->status !== 'CONFIRMED') {

            return redirect()
                ->route('booking.show', $booking)
                ->with(
                    'error',
                    'Booking ini tidak dapat melakukan pembayaran cicilan.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | AMBIL CICILAN VERIFIED
        |--------------------------------------------------------------------------
        */

        $paymentsVerified = $booking
            ->payments
            ->where('jenis_pembayaran', 'CICILAN')
            ->where('status', 'VERIFIED')
            ->sortBy('cicilan_ke');


        /*
        |--------------------------------------------------------------------------
        | CICILAN PERTAMA HARUS VERIFIED
        |--------------------------------------------------------------------------
        */

        if ($paymentsVerified->isEmpty()) {

            return redirect()
                ->route('booking.show', $booking)
                ->with(
                    'error',
                    'Pembayaran cicilan pertama belum diverifikasi.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | CICILAN BERIKUTNYA
        |--------------------------------------------------------------------------
        */

        $lastVerified = $paymentsVerified->last();

        $tenor = (int) $lastVerified->tenor;

        $cicilanKe =
            ((int) $lastVerified->cicilan_ke) + 1;


        /*
        |--------------------------------------------------------------------------
        | CEK TENOR
        |--------------------------------------------------------------------------
        */

        if ($cicilanKe > $tenor) {

            return redirect()
                ->route('booking.show', $booking)
                ->with(
                    'success',
                    'Seluruh cicilan sudah lunas.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | CEK PEMBAYARAN PENDING
        |--------------------------------------------------------------------------
        */

        $pendingPayment = $booking
            ->payments
            ->where('jenis_pembayaran', 'CICILAN')
            ->where('status', 'SUBMITTED')
            ->first();


        if ($pendingPayment) {

            return redirect()
                ->route('booking.show', $booking)
                ->with(
                    'error',
                    'Pembayaran cicilan sebelumnya masih menunggu verifikasi admin.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | VALIDASI FORM
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([

            'metode_pembayaran' => [
                'required',
                'in:Transfer Bank,QRIS',
            ],

            'tanggal_pembayaran' => [
                'required',
                'date',
            ],

            'bukti_pembayaran' => [
                'required',
                'file',
                'mimes:jpg,jpeg,png,pdf',
                'max:5120',
            ],

        ], [

            'metode_pembayaran.required' =>
                'Silakan pilih metode pembayaran.',

            'metode_pembayaran.in' =>
                'Metode pembayaran tidak valid.',

            'tanggal_pembayaran.required' =>
                'Tanggal pembayaran wajib diisi.',

            'tanggal_pembayaran.date' =>
                'Tanggal pembayaran tidak valid.',

            'bukti_pembayaran.required' =>
                'Bukti pembayaran wajib diunggah.',

            'bukti_pembayaran.file' =>
                'Bukti pembayaran harus berupa file.',

            'bukti_pembayaran.mimes' =>
                'Bukti pembayaran harus berupa JPG, JPEG, PNG, atau PDF.',

            'bukti_pembayaran.max' =>
                'Ukuran bukti pembayaran maksimal 5 MB.',
        ]);


        /*
        |--------------------------------------------------------------------------
        | AMBIL KATEGORI
        |--------------------------------------------------------------------------
        */

        $category = $booking->plot->category;


        /*
        |--------------------------------------------------------------------------
        | NOMINAL CICILAN
        |--------------------------------------------------------------------------
        */

        $jumlah = match ($tenor) {

            12 => $category->cicilan_12,

            24 => $category->cicilan_24,

            36 => $category->cicilan_36,

            default => 0,
        };


        /*
        |--------------------------------------------------------------------------
        | CEK NOMINAL
        |--------------------------------------------------------------------------
        */

        if (!$jumlah || $jumlah <= 0) {

            return back()
                ->withInput()
                ->withErrors([
                    'bukti_pembayaran' =>
                        'Nominal cicilan belum tersedia.',
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | SIMPAN BUKTI
        |--------------------------------------------------------------------------
        */

        $buktiPath = null;

        try {

            $buktiPath = $request
                ->file('bukti_pembayaran')
                ->store(
                    'bukti-pembayaran',
                    'public'
                );


            /*
            |--------------------------------------------------------------------------
            | SIMPAN PAYMENT
            |--------------------------------------------------------------------------
            */

            DB::transaction(function () use (
                $booking,
                $validated,
                $tenor,
                $cicilanKe,
                $jumlah,
                $buktiPath
            ) {

                Payment::create([

                    'booking_id' =>
                        $booking->id,

                    'metode_pembayaran' =>
                        $validated['metode_pembayaran'],

                    'jenis_pembayaran' =>
                        'CICILAN',

                    'tenor' =>
                        $tenor,

                    'cicilan_ke' =>
                        $cicilanKe,

                    'jumlah' =>
                        $jumlah,

                    'tanggal_pembayaran' =>
                        $validated['tanggal_pembayaran'],

                    'bukti_pembayaran' =>
                        $buktiPath,

                    'status' =>
                        'SUBMITTED',
                ]);
            });


        } catch (\Throwable $e) {

            /*
            |--------------------------------------------------------------------------
            | HAPUS FILE JIKA DATABASE GAGAL
            |--------------------------------------------------------------------------
            */

            if (
                $buktiPath &&
                Storage::disk('public')->exists($buktiPath)
            ) {

                Storage::disk('public')
                    ->delete($buktiPath);
            }

            throw $e;
        }


        /*
        |--------------------------------------------------------------------------
        | REDIRECT SUCCESS
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route(
                'payment.success',
                $booking
            )
            ->with(
                'success',
                "Bukti pembayaran cicilan ke-{$cicilanKe} berhasil dikirim dan sedang menunggu verifikasi admin."
            );
    }
}