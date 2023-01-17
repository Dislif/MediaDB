<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MediaController;
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
Route::get('media/index',
    [App\Http\Controllers\MediaController::class, 'index']
)->name('media.index');

Route::get('/media/create',
    [App\Http\Controllers\MediaController::class, 'create']
)->name('media.create');

Route::post('/media/store',
[App\Http\Controllers\MediaController::class, 'store']
)->name('media.store');

Route::get('media/{id}', 
[App\Http\Controllers\MediaController::class, 'show']
)->name('media.show');

