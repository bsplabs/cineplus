<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class HomeController extends Controller
{
    public function index()
    {
        $movies = Movie::where('is_showing_now', true)->get();

        return view('pages.home', compact('movies'));
    }
}
