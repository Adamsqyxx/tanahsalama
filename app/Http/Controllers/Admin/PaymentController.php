<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    /**
     * ============================================================
     * DAFTAR PEMBAYARAN
     * ============================================================
     */
    public function index()
    {
        $payments = Payment::with([
            'booking.plot.category'
        ])
            ->latest()
            ->paginate(15);

        return view(
            'admin.payments.index',
            compact('payments')
        );
    }


    /**
     * ============================================================
     * DETAIL PEMBAYARAN
     * ============================================================
     */
    public function show(Payment $payment)
    {
        $payment->load([
            'booking.plot.category'
        ]);

        return view(
            'admin.payments.show',
            compact('payment')
        );
    }


    /**
     * ============================================================
     * VERIFIKASI PEMBAYARAN
     * ============================================================
     */
    public function verify(Payment $payment)
    {
        /*
        |--------------------------------------------------------------------------
        | 1. Pastikan pembayaran masih SUBMITTED
        |--------------------------------------------------------------------------
        */

        if ($payment->status !== 'SUBMITTED') {

            return back()->with(
                'error',
                'Pembayaran ini sudah diproses dan tidak dapat diverifikasi lagi.'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | 2. Ambil booking dan plot
        |--------------------------------------------------------------------------
        */

        $payment->load([
            'booking.plot'
        ]);

        $booking = $payment->booking;


        if (!$booking) {

            return back()->with(
                'error',
                'Data booking tidak ditemukan.'
            );
        }


        $plot = $booking->plot;


        if (!$plot) {

            return back()->with(
                'error',
                'Data petak tidak ditemukan.'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | 3. Tentukan jenis pembayaran
        |--------------------------------------------------------------------------
        */

        $isCicilan =
            $payment->jenis_pembayaran === 'CICILAN';

        $isCicilanBerikutnya =
            $isCicilan &&
            !is_null($payment->cicilan_ke) &&
            (int) $payment->cicilan_ke > 1;

        $isPelunasan =
            $payment->jenis_pembayaran === 'PELUNASAN';


        /*
        |--------------------------------------------------------------------------
        | 4. Validasi status booking
        |--------------------------------------------------------------------------
        |
        | BOOKING_FEE
        | CASH
        | CICILAN PERTAMA
        | -> harus BOOKED
        |
        | CICILAN BERIKUTNYA
        | -> harus CONFIRMED
        |
        | PELUNASAN
        | -> harus CONFIRMED
        |
        */

        if ($isPelunasan) {

            if ($booking->status !== 'CONFIRMED') {

                return back()->with(
                    'error',
                    'Pembayaran pelunasan hanya dapat diverifikasi pada booking yang sudah dikonfirmasi.'
                );
            }

        } elseif ($isCicilanBerikutnya) {

            if ($booking->status !== 'CONFIRMED') {

                return back()->with(
                    'error',
                    'Pembayaran cicilan berikutnya hanya dapat diverifikasi pada booking yang sudah dikonfirmasi.'
                );
            }

        } else {

            if ($booking->status !== 'BOOKED') {

                return back()->with(
                    'error',
                    'Booking ini tidak dalam status BOOKED.'
                );
            }
        }


        /*
        |--------------------------------------------------------------------------
        | 5. Validasi status plot
        |--------------------------------------------------------------------------
        |
        | Untuk semua pembayaran, plot harus minimal BOOKED.
        |
        | Plot OCCUPIED juga diperbolehkan karena:
        |
        | - Cicilan berikutnya
        | - Pelunasan
        |
        | memang bisa dilakukan setelah plot menjadi OCCUPIED.
        |
        */

        if (
            $plot->status !== 'BOOKED' &&
            $plot->status !== 'OCCUPIED'
        ) {

            return back()->with(
                'error',
                'Status petak tidak valid untuk pembayaran ini.'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | 6. Cek masa berlaku booking
        |--------------------------------------------------------------------------
        |
        | Hanya pembayaran awal yang masih terikat
        | dengan masa booking 1 x 24 jam.
        |
        | Pelunasan dan cicilan berikutnya tidak menggunakan
        | countdown booking awal.
        |
        */

        if (
            !$isPelunasan &&
            !$isCicilanBerikutnya &&
            now()->greaterThan($booking->expires_at)
        ) {

            DB::transaction(function () use (
                $booking,
                $plot
            ) {

                $booking->update([
                    'status' => 'EXPIRED',
                ]);

                $plot->update([
                    'status' => 'AVAILABLE',
                ]);
            });

            return back()->with(
                'error',
                'Masa berlaku booking telah berakhir.'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | 7. VERIFIKASI PEMBAYARAN
        |--------------------------------------------------------------------------
        */

        DB::transaction(function () use (
            $payment,
            $booking,
            $plot,
            $isCicilanBerikutnya,
            $isPelunasan
        ) {

            /*
            |--------------------------------------------------------------------------
            | Tandai pembayaran VERIFIED
            |--------------------------------------------------------------------------
            */

            $payment->update([
                'status' => 'VERIFIED',
                'verified_at' => now(),
            ]);


            /*
            |--------------------------------------------------------------------------
            | CICILAN BERIKUTNYA
            |--------------------------------------------------------------------------
            |
            | Cicilan ke-2, ke-3, dst:
            |
            | - Payment VERIFIED
            | - Booking tetap CONFIRMED
            | - Plot tetap OCCUPIED
            |
            */

            if ($isCicilanBerikutnya) {

                $booking->update([
                    'status' => 'CONFIRMED',
                ]);

                /*
                | Tidak perlu mengubah plot.
                */

                return;
            }


            /*
            |--------------------------------------------------------------------------
            | PELUNASAN
            |--------------------------------------------------------------------------
            |
            | Pelunasan berarti seluruh kewajiban pembayaran
            | telah diselesaikan.
            |
            | Plot dipastikan OCCUPIED.
            |
            */

            if ($isPelunasan) {

                $booking->update([
                    'status' => 'CONFIRMED',
                    'confirmed_at' =>
                        $booking->confirmed_at ?? now(),
                ]);

                $plot->update([
                    'status' => 'OCCUPIED',
                ]);

                return;
            }


            /*
            |--------------------------------------------------------------------------
            | BOOKING FEE
            |--------------------------------------------------------------------------
            */

            if (
                $payment->jenis_pembayaran === 'BOOKING_FEE'
            ) {

                $booking->update([
                    'status' => 'CONFIRMED',
                    'confirmed_at' => now(),
                ]);

                /*
                |--------------------------------------------------------------------------
                | Booking fee belum berarti lunas.
                |--------------------------------------------------------------------------
                */

                $plot->update([
                    'status' => 'BOOKED',
                ]);

                return;
            }


            /*
            |--------------------------------------------------------------------------
            | CASH
            |--------------------------------------------------------------------------
            */

            if (
                $payment->jenis_pembayaran === 'CASH'
            ) {

                $booking->update([
                    'status' => 'CONFIRMED',
                    'confirmed_at' => now(),
                ]);

                /*
                |--------------------------------------------------------------------------
                | Cash dianggap lunas.
                |--------------------------------------------------------------------------
                */

                $plot->update([
                    'status' => 'OCCUPIED',
                ]);

                return;
            }


            /*
            |--------------------------------------------------------------------------
            | CICILAN PERTAMA
            |--------------------------------------------------------------------------
            */

            if (
                $payment->jenis_pembayaran === 'CICILAN'
            ) {

                $booking->update([
                    'status' => 'CONFIRMED',
                    'confirmed_at' => now(),
                ]);

                /*
                |--------------------------------------------------------------------------
                | Sesuai alur sistem:
                |
                | Cicilan pertama diverifikasi
                | -> booking CONFIRMED
                | -> plot OCCUPIED
                |--------------------------------------------------------------------------
                */

                $plot->update([
                    'status' => 'OCCUPIED',
                ]);

                return;
            }
        });


        /*
        |--------------------------------------------------------------------------
        | 8. PESAN SUKSES
        |--------------------------------------------------------------------------
        */

        if (
            $payment->jenis_pembayaran === 'BOOKING_FEE'
        ) {

            $message =
                'Booking fee berhasil diverifikasi. Booking telah dikonfirmasi dan petak tetap dalam status BOOKED.';

        } elseif (
            $payment->jenis_pembayaran === 'CASH'
        ) {

            $message =
                'Pembayaran cash berhasil diverifikasi. Booking telah dikonfirmasi dan petak menjadi OCCUPIED.';

        } elseif (
            $payment->jenis_pembayaran === 'CICILAN'
        ) {

            if ($isCicilanBerikutnya) {

                $message =
                    'Pembayaran cicilan ke-' .
                    $payment->cicilan_ke .
                    ' berhasil diverifikasi. Booking tetap CONFIRMED dan petak tetap OCCUPIED.';

            } else {

                $message =
                    'Pembayaran cicilan ke-' .
                    ($payment->cicilan_ke ?? 1) .
                    ' berhasil diverifikasi. Booking telah dikonfirmasi dan petak menjadi OCCUPIED.';
            }

        } elseif (
            $payment->jenis_pembayaran === 'PELUNASAN'
        ) {

            $message =
                'Pembayaran pelunasan berhasil diverifikasi. Pembayaran booking telah diselesaikan dan petak menjadi OCCUPIED.';

        } else {

            $message =
                'Pembayaran berhasil diverifikasi.';
        }


        return back()->with(
            'success',
            $message
        );
    }


    /**
     * ============================================================
     * MENOLAK PEMBAYARAN
     * ============================================================
     */
    public function reject(
        Request $request,
        Payment $payment
    ) {

        /*
        |--------------------------------------------------------------------------
        | 1. Pastikan pembayaran masih SUBMITTED
        |--------------------------------------------------------------------------
        */

        if ($payment->status !== 'SUBMITTED') {

            return back()->with(
                'error',
                'Pembayaran ini sudah diproses dan tidak dapat ditolak lagi.'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | 2. Validasi alasan penolakan
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([

            'catatan_admin' => [
                'required',
                'string',
                'max:1000',
            ],

        ], [

            'catatan_admin.required' =>
                'Alasan penolakan pembayaran wajib diisi.',

            'catatan_admin.string' =>
                'Catatan penolakan tidak valid.',

            'catatan_admin.max' =>
                'Catatan penolakan maksimal 1000 karakter.',
        ]);


        /*
        |--------------------------------------------------------------------------
        | 3. Tolak pembayaran
        |--------------------------------------------------------------------------
        */

        $payment->update([

            'status' =>
                'REJECTED',

            'catatan_admin' =>
                $validated['catatan_admin'],
        ]);


        /*
        |--------------------------------------------------------------------------
        | 4. Pesan sukses
        |--------------------------------------------------------------------------
        */

        return back()->with(
            'success',
            'Pembayaran ditolak. Customer dapat melihat alasan penolakan dan mengirim pembayaran kembali selama booking masih berlaku.'
        );
    }
}