<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookmarkController;
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

Route::controller(BookmarkController::class)->middleware(['auth'])->group(function(){
    Route::get('/bookmarks','bookmark_posts')->name('bookmarks');
    Route::post('/posts/{post}/bookmark','store')->name('bookmark.store');
    Route::post('/posts/{post}/bookmark','store')->name('bookmark.store');
    Route::delete('/posts/{post}/unbookmark','destroy')->name('bookmark.destroy');
});

Route::controller(PostController::class)->middleware(['auth'])->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/posts/create','create')->name('create');
    Route::get('/posts/{post}/edit','edit')->name('edit');
    Route::put('/posts/{post}',  'update')->name('update');
    Route::delete('/posts/{post}','delete')->name('delete');
    Route::get('/posts/{post}' ,'show')->name('show');
    Route::post('/posts','store')->name('store');

});


Route::get('/categories/{category}', [CategoryController::class,'index'])->middleware("auth");

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/user', [ UserController::class, 'index'])->middleware(['auth'])->name('user');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
