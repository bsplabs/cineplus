<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    public function show($id)
    {
        $movie = Movie::findOrFail($id);
        $comments = $movie->comments()->orderBy('created_at', 'desc')->get();
        $movie_score = $movie->comments()->orderBy('created_at', 'desc')->avg('score');
        return view('pages.movies.show', [
            'movie' => $movie,
            'comments' => $comments,
            'movie_score' => $movie_score
        ]);
    }
}
