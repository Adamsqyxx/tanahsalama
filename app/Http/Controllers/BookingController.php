<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Plot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;

class BookingController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | CREATE BOOKING
    |--------------------------------------------------------------------------
    */

    public function create(Plot $plot)
    {
        if ($plot->status !== 'AVAILABLE') {
            return redirect()
                ->route('home')
                ->with(
                    'error',
                    'Petak ini sudah tidak tersedia.'
                );
        }

        $plot->load('category');

        return view(
            'booking.create',
            compact('plot')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | STORE BOOKING
    |--------------------------------------------------------------------------
    */

    public function store(Request $request, Plot $plot)
    {
        $validated = $request->validate([
            'nama_pemesan' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'foto_ktp' => 'required|file|mimes:jpg,jpeg,png|max:2048',
            'setuju_ketentuan' => 'required|accepted',
        ], [
            'nama_pemesan.required' =>
                'Nama pemesan wajib diisi.',

            'no_hp.required' =>
                'Nomor HP wajib diisi.',

            'email.email' =>
                'Format email tidak valid.',

            'foto_ktp.required' =>
                'Foto KTP wajib diunggah.',

            'foto_ktp.file' =>
                'Foto KTP harus berupa file.',

            'foto_ktp.mimes' =>
                'Foto KTP harus berformat JPG, JPEG, atau PNG.',

            'foto_ktp.max' =>
                'Ukuran foto KTP maksimal 2 MB.',

            'setuju_ketentuan.required' =>
                'Anda harus menyetujui ketentuan booking.',

            'setuju_ketentuan.accepted' =>
                'Anda harus menyetujui ketentuan booking.',
        ]);

        $fotoKtpPath = null;

        try {
            /*
            |--------------------------------------------------------------------------
            | SIMPAN FOTO KTP
            |--------------------------------------------------------------------------
            */

            $fotoKtpPath = $request
                ->file('foto_ktp')
                ->store(
                    'ktp-pemesan',
                    'local'
                );

            /*
            |--------------------------------------------------------------------------
            | TRANSAKSI BOOKING
            |--------------------------------------------------------------------------
            */

            $booking = DB::transaction(function () use (
                $validated,
                $plot,
                $fotoKtpPath
            ) {
                $plot = Plot::where(
                    'id',
                    $plot->id
                )
                    ->lockForUpdate()
                    ->first();

                if (!$plot) {
                    abort(
                        404,
                        'Petak makam tidak ditemukan.'
                    );
                }

                if ($plot->status !== 'AVAILABLE') {
                    abort(
                        409,
                        'Petak ini baru saja dipesan oleh pelanggan lain.'
                    );
                }

                /*
                |--------------------------------------------------------------------------
                | GENERATE KODE BOOKING
                |--------------------------------------------------------------------------
                */

                $kodeBooking =
                    'TS-' .
                    now()->format('Ymd') .
                    '-' .
                    strtoupper(Str::random(6));

                $bookedAt = now();

                $expiresAt = now()->addDay();

                /*
                |--------------------------------------------------------------------------
                | CREATE BOOKING
                |--------------------------------------------------------------------------
                */

                $booking = Booking::create([
                    'plot_id' =>
                        $plot->id,

                    'kode_booking' =>
                        $kodeBooking,

                    'nama_pemesan' =>
                        $validated['nama_pemesan'],

                    'no_hp' =>
                        $validated['no_hp'],

                    'email' =>
                        $validated['email'] ?? null,

                    'foto_ktp' =>
                        $fotoKtpPath,

                    'status' =>
                        'BOOKED',

                    'booked_at' =>
                        $bookedAt,

                    'expires_at' =>
                        $expiresAt,
                ]);

                /*
                |--------------------------------------------------------------------------
                | UPDATE STATUS PETAK
                |--------------------------------------------------------------------------
                */

                $plot->update([
                    'status' => 'BOOKED',
                ]);

                return $booking;
            });
        } catch (\Throwable $e) {

            /*
            |--------------------------------------------------------------------------
            | HAPUS FOTO JIKA TRANSAKSI GAGAL
            |--------------------------------------------------------------------------
            */

            if (
                $fotoKtpPath &&
                Storage::disk('local')->exists($fotoKtpPath)
            ) {
                Storage::disk('local')
                    ->delete($fotoKtpPath);
            }

            throw $e;
        }

        /*
        |--------------------------------------------------------------------------
        | REDIRECT KE DETAIL BOOKING
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route(
                'booking.show',
                $booking
            )
            ->with(
                'success',
                'Petak berhasil dipesan. Silakan simpan kode booking Anda.'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | SHOW BOOKING
    |--------------------------------------------------------------------------
    */

    public function show(Booking $booking)
    {
        /*
        |--------------------------------------------------------------------------
        | LOAD RELATION
        |--------------------------------------------------------------------------
        */

        $booking->load([
            'plot.category',
            'payments',
        ]);

        /*
        |--------------------------------------------------------------------------
        | DATA CICILAN
        |--------------------------------------------------------------------------
        */

        $cicilanPayments = $booking->payments
            ->where(
                'jenis_pembayaran',
                'CICILAN'
            )
            ->sortBy('cicilan_ke')
            ->values();

        $cicilanVerified = $cicilanPayments
            ->where(
                'status',
                'VERIFIED'
            )
            ->sortBy('cicilan_ke')
            ->values();

        $paymentCicilanPertama =
            $cicilanPayments->first();

        $tenor = $paymentCicilanPertama?->tenor
            ? (int) $paymentCicilanPertama->tenor
            : null;

        $cicilanTerakhirVerified =
            $cicilanVerified->last();

        $cicilanBerikutnya = null;

        if (
            $tenor &&
            $cicilanTerakhirVerified
        ) {
            $cicilanBerikutnya =
                ((int) $cicilanTerakhirVerified->cicilan_ke) + 1;

            if ($cicilanBerikutnya > $tenor) {
                $cicilanBerikutnya = null;
            }
        }

        $jumlahCicilanPending =
            $cicilanPayments
                ->where(
                    'status',
                    'SUBMITTED'
                )
                ->count();

        $jumlahCicilanTerbayar =
            $cicilanVerified->count();

        $jatuhTempoBerikutnya = null;

        if (
            $cicilanBerikutnya &&
            $cicilanTerakhirVerified
        ) {
            $jatuhTempoBerikutnya =
                $cicilanTerakhirVerified
                    ->tanggal_pembayaran
                    ->copy()
                    ->addMonth();
        }

        /*
        |--------------------------------------------------------------------------
        | RETURN VIEW
        |--------------------------------------------------------------------------
        */

        return view(
            'booking.show',
            compact(
                'booking',
                'cicilanPayments',
                'tenor',
                'cicilanBerikutnya',
                'jatuhTempoBerikutnya',
                'jumlahCicilanTerbayar',
                'jumlahCicilanPending'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | FORM CEK BOOKING
    |--------------------------------------------------------------------------
    */

    public function checkForm()
    {
        return view('booking.check');
    }

    /*
    |--------------------------------------------------------------------------
    | CEK BOOKING
    |--------------------------------------------------------------------------
    */

    public function check(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDASI KODE BOOKING
        |--------------------------------------------------------------------------
        */

        $request->validate([
            'kode_booking' =>
                'required|string|max:30',
        ], [
            'kode_booking.required' =>
                'Kode booking wajib diisi.',
        ]);

        /*
        |--------------------------------------------------------------------------
        | CARI BOOKING
        |--------------------------------------------------------------------------
        */

        $booking = Booking::with([
            'plot.category',
            'payments',
        ])
            ->where(
                'kode_booking',
                strtoupper(
                    trim(
                        $request->kode_booking
                    )
                )
            )
            ->first();

        if (!$booking) {
            return back()
                ->withInput()
                ->with(
                    'error',
                    'Kode booking tidak ditemukan.'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | DATA CICILAN
        |--------------------------------------------------------------------------
        */

        $cicilanPayments = $booking->payments
            ->where(
                'jenis_pembayaran',
                'CICILAN'
            )
            ->sortBy('cicilan_ke')
            ->values();

        $cicilanVerified = $cicilanPayments
            ->where(
                'status',
                'VERIFIED'
            )
            ->sortBy('cicilan_ke')
            ->values();

        $paymentCicilanPertama =
            $cicilanPayments->first();

        $tenor = $paymentCicilanPertama?->tenor
            ? (int) $paymentCicilanPertama->tenor
            : null;

        $cicilanTerakhirVerified =
            $cicilanVerified->last();

        $cicilanBerikutnya = null;

        if (
            $tenor &&
            $cicilanTerakhirVerified
        ) {
            $cicilanBerikutnya =
                ((int) $cicilanTerakhirVerified->cicilan_ke) + 1;

            if ($cicilanBerikutnya > $tenor) {
                $cicilanBerikutnya = null;
            }
        }

        $jumlahCicilanPending =
            $cicilanPayments
                ->where(
                    'status',
                    'SUBMITTED'
                )
                ->count();

        $jumlahCicilanTerbayar =
            $cicilanVerified->count();

        $jatuhTempoBerikutnya = null;

        if (
            $cicilanBerikutnya &&
            $cicilanTerakhirVerified
        ) {
            $jatuhTempoBerikutnya =
                $cicilanTerakhirVerified
                    ->tanggal_pembayaran
                    ->copy()
                    ->addMonth();
        }

        /*
        |--------------------------------------------------------------------------
        | DATA PEMBAYARAN
        |--------------------------------------------------------------------------
        */

        $category =
            $booking->plot->category;

        /*
        |--------------------------------------------------------------------------
        | PEMBAYARAN VERIFIED
        |--------------------------------------------------------------------------
        */

        $pembayaranVerified =
            $booking->payments
                ->where(
                    'status',
                    'VERIFIED'
                );

        /*
        |--------------------------------------------------------------------------
        | HARGA PETAK
        |--------------------------------------------------------------------------
        |
        | Harga petak selalu menggunakan harga CASH/LUNAS
        | dari kategori.
        |
        */

        $hargaPetak =
            (float) $category->harga_cash;

        /*
        |--------------------------------------------------------------------------
        | TOTAL PEMBAYARAN VERIFIED
        |--------------------------------------------------------------------------
        */

        $totalPembayaranVerified =
            (float) $pembayaranVerified
                ->sum('jumlah');

        /*
        |--------------------------------------------------------------------------
        | BOOKING FEE
        |--------------------------------------------------------------------------
        */

        $bookingFeePayment =
            $pembayaranVerified
                ->where(
                    'jenis_pembayaran',
                    'BOOKING_FEE'
                )
                ->sortByDesc(
                    'tanggal_pembayaran'
                )
                ->first();

        $bookingFeeTerbayar =
            $bookingFeePayment
                ? (float) $bookingFeePayment->jumlah
                : 0;

        /*
        |--------------------------------------------------------------------------
        | SISA PEMBAYARAN
        |--------------------------------------------------------------------------
        */

        $sisaPembayaran = max(
            0,
            $hargaPetak -
                $totalPembayaranVerified
        );

        /*
        |--------------------------------------------------------------------------
        | PEMBAYARAN PENDING
        |--------------------------------------------------------------------------
        */

        $pembayaranPending =
            $booking->payments
                ->where(
                    'status',
                    'SUBMITTED'
                )
                ->sortByDesc(
                    'tanggal_pembayaran'
                )
                ->values();

        $adaPembayaranPending =
            $pembayaranPending->isNotEmpty();

        /*
        |--------------------------------------------------------------------------
        | STATUS LUNAS
        |--------------------------------------------------------------------------
        */

        $sudahLunas =
            $sisaPembayaran <= 0;

        /*
        |--------------------------------------------------------------------------
        | BOLEH BAYAR SISA
        |--------------------------------------------------------------------------
        */

        $bolehBayarSisa =
            $booking->status === 'CONFIRMED'
            && !$adaPembayaranPending
            && !$sudahLunas;

        /*
        |--------------------------------------------------------------------------
        | RETURN RESULT
        |--------------------------------------------------------------------------
        */

        return view(
            'booking.result',
            compact(
                'booking',

                // CICILAN
                'cicilanPayments',
                'tenor',
                'cicilanBerikutnya',
                'jatuhTempoBerikutnya',
                'jumlahCicilanTerbayar',
                'jumlahCicilanPending',

                // PEMBAYARAN
                'hargaPetak',
                'bookingFeeTerbayar',
                'totalPembayaranVerified',
                'sisaPembayaran',
                'pembayaranPending',
                'adaPembayaranPending',
                'sudahLunas',
                'bolehBayarSisa'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | PETAK SAYA
    |--------------------------------------------------------------------------
    */

    public function petakSaya()
    {
        return view(
            'booking.petak-saya',
            [
                'booking' => null,
            ]
        );
    }

    /*
    |--------------------------------------------------------------------------
    | CEK PETAK SAYA
    |--------------------------------------------------------------------------
    */

    public function cekPetakSaya(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDASI
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([
            'kode_booking' =>
                'required|string|max:30',
        ], [
            'kode_booking.required' =>
                'Kode booking wajib diisi.',

            'kode_booking.max' =>
                'Kode booking terlalu panjang.',
        ]);

        /*
        |--------------------------------------------------------------------------
        | NORMALISASI KODE BOOKING
        |--------------------------------------------------------------------------
        */

        $kodeBooking =
            strtoupper(
                trim(
                    $validated['kode_booking']
                )
            );

        /*
        |--------------------------------------------------------------------------
        | CARI BOOKING
        |--------------------------------------------------------------------------
        */

        $booking = Booking::with([
            'plot.category',
            'payments',
        ])
            ->where(
                'kode_booking',
                $kodeBooking
            )
            ->first();

        /*
        |--------------------------------------------------------------------------
        | BOOKING TIDAK DITEMUKAN
        |--------------------------------------------------------------------------
        */

        if (!$booking) {
            return back()
                ->withInput()
                ->with(
                    'error',
                    'Kode booking tidak ditemukan.'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | PEMBAYARAN VERIFIED
        |--------------------------------------------------------------------------
        */

        $pembayaranVerified =
            $booking->payments
                ->where(
                    'status',
                    'VERIFIED'
                );

        /*
        |--------------------------------------------------------------------------
        | HARGA PETAK
        |--------------------------------------------------------------------------
        |
        | Harga petak selalu menggunakan
        | harga CASH/LUNAS dari kategori.
        |
        */

        $category =
            $booking->plot->category;

        $hargaPetak =
            (float) $category->harga_cash;

        /*
        |--------------------------------------------------------------------------
        | TOTAL PEMBAYARAN VERIFIED
        |--------------------------------------------------------------------------
        */

        $totalPembayaranVerified =
            (float) $pembayaranVerified
                ->sum('jumlah');

        /*
        |--------------------------------------------------------------------------
        | CEK LUNAS
        |--------------------------------------------------------------------------
        */

        $sudahLunas =
            $totalPembayaranVerified >=
            $hargaPetak;

        /*
        |--------------------------------------------------------------------------
        | BELUM LUNAS
        |--------------------------------------------------------------------------
        */

        if (!$sudahLunas) {
            return back()
                ->withInput()
                ->with(
                    'error',
                    'Petak ini belum lunas. Informasi kepemilikan belum dapat ditampilkan.'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | PETAK SUDAH LUNAS
        |--------------------------------------------------------------------------
        */

        return view(
            'booking.petak-saya',
            [
                'booking' =>
                    $booking,

                'totalPembayaranVerified' =>
                    $totalPembayaranVerified,

                'hargaPetak' =>
                    $hargaPetak,
            ]
        );
    }

    /*
    |--------------------------------------------------------------------------
    | PETAK SAYA PDF
    |--------------------------------------------------------------------------
    */

    public function petakSayaPdf(Booking $booking)
    {
        $booking->load([
            'plot.category',
            'payments',
        ]);

        /*
        |--------------------------------------------------------------------------
        | PEMBAYARAN VERIFIED
        |--------------------------------------------------------------------------
        */

        $pembayaranVerified =
            $booking->payments
                ->where(
                    'status',
                    'VERIFIED'
                );

        /*
        |--------------------------------------------------------------------------
        | HARGA PETAK
        |--------------------------------------------------------------------------
        |
        | Harga petak selalu berasal dari
        | harga CASH/LUNAS kategori.
        |
        */

        $category =
            $booking->plot->category;

        $hargaPetak =
            (float) $category->harga_cash;

        /*
        |--------------------------------------------------------------------------
        | TOTAL PEMBAYARAN VERIFIED
        |--------------------------------------------------------------------------
        */

        $totalPembayaranVerified =
            (float) $pembayaranVerified
                ->sum('jumlah');

        /*
        |--------------------------------------------------------------------------
        | PASTIKAN BOOKING BENAR-BENAR LUNAS
        |--------------------------------------------------------------------------
        */

        $sudahLunas =
            $totalPembayaranVerified >=
            $hargaPetak;

        if (!$sudahLunas) {
            return redirect()
                ->route('petak.saya')
                ->with(
                    'error',
                    'Bukti kepemilikan hanya dapat dicetak setelah pembayaran lunas dan terverifikasi.'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | GENERATE PDF
        |--------------------------------------------------------------------------
        */

        $pdf = Pdf::loadView(
            'booking.petak-saya-pdf',
            [
                'booking' =>
                    $booking,

                'hargaPetak' =>
                    $hargaPetak,

                'totalPembayaranVerified' =>
                    $totalPembayaranVerified,
            ]
        );

        /*
        |--------------------------------------------------------------------------
        | UKURAN KERTAS
        |--------------------------------------------------------------------------
        */

        $pdf->setPaper(
            'a4',
            'portrait'
        );

        /*
        |--------------------------------------------------------------------------
        | TAMPILKAN PDF DI BROWSER
        |--------------------------------------------------------------------------
        */

        return $pdf->stream(
            'Bukti-Kepemilikan-' .
            $booking->kode_booking .
            '.pdf'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | SEARCH BOOKING
    |--------------------------------------------------------------------------
    */

    public function search(Request $request)
    {
        $validated = $request->validate([
            'kode_booking' =>
                'required|string|max:30',
        ]);

        $booking = Booking::where(
            'kode_booking',
            strtoupper(
                trim(
                    $validated['kode_booking']
                )
            )
        )->first();

        if (!$booking) {
            return back()
                ->withErrors([
                    'kode_booking' =>
                        'Kode booking tidak ditemukan. Silakan periksa kembali kode booking Anda.',
                ])
                ->withInput();
        }

        return redirect()
            ->route(
                'booking.show',
                $booking
            );
    }
}