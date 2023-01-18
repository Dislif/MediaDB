<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/reviews/create', [App\Http\Controllers\ReviewController::class, 'create'])->name('review.create');
Route::post('/reviews/store', [App\Http\Controllers\ReviewController::class, 'store'])->name('review.store');
Route::get('/reviews/{id}/edit', [App\Http\Controllers\ReviewController::class, 'edit'])->name('review.edit');
Route::put('/reviews/{id}/update', [App\Http\Controllers\ReviewController::class, 'update'])->name('review.update');
Route::delete('/reviews/{id}/destory', [App\Http\Controllers\ReviewController::class, 'destroy'])->name('review.destroy');
