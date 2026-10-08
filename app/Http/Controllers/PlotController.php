<?php

namespace App\Http\Controllers;

use App\Models\Plot;

class PlotController extends Controller
{
    public function show(Plot $plot)
    {
        $plot->load('category');

        return view('makam.show', compact('plot'));
    }
}
