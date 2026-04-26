<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\IsAdminMiddleware;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('auth.login');
// });


Route::prefix('admin')
    ->middleware(IsAdminMiddleware::class)->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
        Route::get('/blog', [PostController::class, 'index'])->name('blog.index');
        Route::get('/blog/create', [PostController::class, 'create'])->name('blog.create');
        Route::post('/blog', [PostController::class, 'store'])->name('blog.store');
        Route::get('/blog/{post:slug}', [PostController::class, 'show'])->name('blog.show');
        Route::get('/blog/{post:slug}/edit', [PostController::class, 'edit'])->name('blog.edit');
        Route::patch('/blog/{post:slug}', [PostController::class, 'update'])->name('blog.update');
        Route::delete('/blog/{post:slug}', [PostController::class, 'destroy'])->name('blog.destroy');
    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
