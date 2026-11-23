<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookController;
//use App\Http\Controllers\GenreController;
//use App\Http\Controllers\ReviewController;
//use App\Http\Controllers\FavoriteController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::resource('books', BookController::class);

Route::get('/ranking', [BookController::class, 'ranking'])->name('ranking.index');

Route::resource('genres', GenreController::class);

Route::post('/books/{book}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
//Route::get('/reviews/{review}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');
//Route::put('/reviews/{review}', [ReviewController::class, 'update'])->name('reviews.update');
//Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');

Route::get('/fovorites', [FavoriteController::class, 'index'])->name('favorites.index');
Route::post('/books/{book}/favorite', [FavoriteController::class, 'toggle'])->name('favorites.toggle');



Route::get('/', function () {return view('welcome');});
