<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TechnologyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/blog', [BlogController::class, 'index'])
->name('blog.main');

Route::prefix('posts')->controller(PostController::class)->group(function () {
        Route::get('/', 'index')->name('posts.index');
    })->middleware(['auth', 'verified']);
    
Route::prefix('tech')->controller(TechnologyController::class)->group(function () {
        Route::get('/', 'index')->name('tech.index');
    })->middleware(['auth', 'verified']);
require __DIR__ . '/auth.php';
