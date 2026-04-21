<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/blog', [PostController::class, 'index'])->middleware(['auth', 'verified'])->name('blog.index');
Route::get('/blog/create', [PostController::class, 'create'])->middleware(['auth', 'verified'])->name('blog.create');
Route::post('/blog', [PostController::class, 'store'])->middleware(['auth', 'verified'])->name('blog.store');
Route::get('/blog/{post:slug}', [PostController::class, 'show'])->middleware(['auth', 'verified'])->name('blog.show');
Route::delete('/blog/{post:slug}', [PostController::class, 'destroy'])->middleware(['auth', 'verified'])->name('blog.destroy');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
