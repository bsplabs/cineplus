<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageFileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getFile($filename)
    {
        // $path = storage_public('images/movies/' . $filename);
    }
}
