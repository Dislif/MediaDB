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

//Reviews routes
Route::get('/reviews/create', 
    [App\Http\Controllers\ReviewController::class, 'create']
)->name('review.create');

Route::post('/reviews/store', 
    [App\Http\Controllers\ReviewController::class, 'store']
)->name('review.store');

Route::get('/reviews/{id}/edit', 
    [App\Http\Controllers\ReviewController::class, 'edit']
)->name('review.edit');

Route::put('/reviews/{id}/update', 
    [App\Http\Controllers\ReviewController::class, 'update']
)->name('review.update');

Route::delete('/reviews/{id}/destory', 
    [App\Http\Controllers\ReviewController::class, 'destroy']
)->name('review.destroy');

//Media routes
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

Route::get('/media/{id}/edit', 
[App\Http\Controllers\MediaController::class, 'edit']
)->name('media.edit');

Route::put('media/{id}/update',
[App\Http\Controllers\MediaController::class, 'update']
)->name('media.update');

Route::delete('media/{id}/',
[App\Http\Controllers\MediaController::class, 'destroy']
)->name('media.destroy');

Route::get('media/{id}/show',
[App\Http\Controllers\MediaController::class, 'show']
)->name('media.show');

//Genres routes
Route::get('/genres/create', 
    [App\Http\Controllers\GenreController::class, 'create']
)->name('genre.create');

Route::post('/genres/store', 
    [App\Http\Controllers\GenreController::class, 'store']
)->name('genre.store');

Route::get('/genres/{id}/edit', 
    [App\Http\Controllers\GenreController::class, 'edit']
)->name('genre.edit');

Route::put('/genres/{id}/update', 
    [App\Http\Controllers\GenreController::class, 'update']
)->name('genre.update');

Route::delete('/genres/{id}/destory', 
    [App\Http\Controllers\GenreController::class, 'destroy']
)->name('genre.destroy');

Route::post('/genres/{media_id}/assign', 
    [App\Http\Controllers\GenreController::class, 'assign']
)->name('genre.assign');

Route::get(
    '/genres/{media_id}/{genre_id}/unassign',
    [App\Http\Controllers\GenreController::class, 'unassign']
)->name('genre.unassign');


//Tags routes
Route::get('/tags/create', 
    [App\Http\Controllers\TagController::class, 'create']
)->name('tag.create');

Route::post('/tags/store', 
    [App\Http\Controllers\TagController::class, 'store']
)->name('tag.store');

Route::get('/tags/{id}/edit', 
    [App\Http\Controllers\TagController::class, 'edit']
)->name('tag.edit');

Route::put('/tags/{id}/update', 
    [App\Http\Controllers\TagController::class, 'update']
)->name('tag.update');

Route::delete('/tags/{id}/destory', 
    [App\Http\Controllers\TagController::class, 'destroy']
)->name('tag.destroy');
Route::post(
    '/tags/{media_id}/assign',
    [App\Http\Controllers\TagController::class, 'assign']
)->name('tag.assign');

Route::get(
    '/tag/{media_id}/{tag_id}/unassign',
    [App\Http\Controllers\TagController::class, 'unassign']
)->name('tag.unassign');


//Actor
Route::get('/actor/create',
    [App\Http\Controllers\ActorController::class, 'create']
)->name('actor.create');

Route::post('/actor/store',
[App\Http\Controllers\ActorController::class, 'store']
)->name('actor.store');

Route::get('/actor/{id}/edit',
    [App\Http\Controllers\ActorController::class, 'edit']
)->name('actor.edit');

Route::put('/actor/{id}/update',
[App\Http\Controllers\ActorController::class, 'update']
)->name('actor.update');

Route::delete('/actor/{id}/destroy',
[App\Http\Controllers\ActorController::class, 'destroy']
)->name('actor.destroy');
Route::post(
    'actor/{media_id}/assign',
    [App\Http\Controllers\ActorController::class, 'assign']
)->name('actor.assign');









Route::get('reviews/media/{mediaId}/user/{userId}', [ReviewController::class, 'index'])->name('reviews.index');
Route::get('reviews/create/media/{mediaId}/user/{userId}', [ReviewController::class, 'create'])->name('reviews.create');
Route::post('reviews/store/media/{mediaId}/user/{userId}', [ReviewController::class, 'store'])->name('reviews.store');
// routes/web.php

Route::put('reviews/{review}',
    [App\Http\Controllers\ReviewController::class, 'update']
)->middleware('review.edit.within24hours');
