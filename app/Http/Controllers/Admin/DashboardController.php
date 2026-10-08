<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\Plot;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPlot = Plot::count();

        $plotTersedia = Plot::where('status', 'AVAILABLE')->count();

        $plotDipesan = Plot::where('status', 'BOOKED')->count();

        $plotTerisi = Plot::where('status', 'OCCUPIED')->count();

        $bookingAktif = Booking::where('status', 'BOOKED')->count();

        $menungguVerifikasi = Payment::where('status', 'SUBMITTED')->count();

        return view('admin.dashboard', compact(
            'totalPlot',
            'plotTersedia',
            'plotDipesan',
            'plotTerisi',
            'bookingAktif',
            'menungguVerifikasi'
        ));
    }
}