<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookingController extends Controller
{
    /**
     * Menampilkan daftar seluruh booking.
     */
    public function index(Request $request)
    {
        $query = Booking::with('plot.category')
            ->latest();

        // Filter berdasarkan status booking
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Pencarian berdasarkan:
        // - kode booking
        // - nama pemesan
        // - nomor HP
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('kode_booking', 'like', '%' . $search . '%')
                    ->orWhere('nama_pemesan', 'like', '%' . $search . '%')
                    ->orWhere('no_hp', 'like', '%' . $search . '%');
            });
        }

        $bookings = $query->paginate(10)->withQueryString();

        return view('admin.bookings.index', compact('bookings'));
    }

    /**
     * Menampilkan detail booking.
     */
    public function show(Booking $booking)
    {
        $booking->load('plot.category', 'payments');

        return view('admin.bookings.show', compact('booking'));
    }

    public function ktp(Booking $booking)
{
    if (!$booking->foto_ktp) {
        abort(404);
    }

    if (!Storage::exists($booking->foto_ktp)) {
        abort(404);
    }

    return response()->file(
        Storage::path($booking->foto_ktp)
    );
}
}