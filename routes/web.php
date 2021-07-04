<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ImageFileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MovieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|ก
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/movies/{id}', [MovieController::class, 'show'])->name('movies.show');

Route::post('/comments', [CommentController::class, 'store'])->name('comments.store')->middleware('auth');

Route::get('/coming-soon', function () {
    return view('pages.coming_soon');
})->name('coming_soon');


Route::get('/login', [CustomAuthController::class, 'index'])->name('login');

Route::post('/login', [CustomAuthController::class, 'customLogin'])->name('login');

Route::get('/register', [CustomAuthController::class, 'register'])->name('register');

Route::post('/register', [CustomAuthController::class, 'customRegisteration'])->name('register');

Route::get('/logout', function(Request $request) {
    $request->session()->flush();
    Auth::logout();
    return Redirect('/');
})->name('logout')->middleware('auth');

// Route::get('/create-movie', function () {
//     return view('pages.create_movie');
// })->name('admin.create_movie')->middleware('auth');

// Route::get('/images/movies/{filename}', [ImageFileController::class, 'getFile']);

// Route::get('/a', function() {
//     // echo 'asdasda';
//     return view('welcome');
//     // echo asset('storage/public/images/movies/movie01.jpg');
// });
