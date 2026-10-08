<?php

namespace App\Http\Controllers;

use App\Models\Category;

class AreaMakamController extends Controller
{
    public function index()
    {
        $categories = Category::with('plots')->get();

        return view('makam.index', compact('categories'));
    }
}