<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\BuiltInFunctionController;
use App\Http\Controllers\ConceptController;
use App\Http\Controllers\LearnReferenceController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\TechnologyController;
use App\Http\Controllers\UserController;
use App\Models\Concept;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;


Route::get('/', function () {
    return view('welcome');
})->name('home');



Route::get('/blog', [BlogController::class, 'index'])
    ->name('blog.main');

Route::prefix('/docs')->controller(LearnReferenceController::class)->group(function () {
    Route::get('/{name}', 'show')->name('docs.show');
});

// dashboard & Authenticated Routes control panel of app - only for logged in users
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('posts')->controller(PostController::class)->group(function () {
    Route::get('/', 'index')->name('posts.index');
    Route::post('/store', 'store')->name('post.store');
    Route::get('/show/{post}', 'show')->name('post.show');
    Route::get('/edit/{post}', 'edit')->name('post.edit');
    Route::post('/update/{post}', 'update')->name('post.update');
    Route::delete('/delete/{post}', 'destroy')->name('post.destroy');
})->middleware(['auth', 'verified']);

Route::prefix('tech')->controller(TechnologyController::class)->group(function () {
    Route::get('/', 'index')->name('tech.index');
    Route::get('/create', 'create')->name('tech.create');
    Route::post('/store', 'store')->name('tech.store');
    Route::get('/show/{name}', 'show')->name('tech.show');
    Route::get('/edit/{name}', 'edit')->name('tech.edit');
    Route::post('/update/{name}', 'update')->name('tech.update');
    Route::delete('/delete/{name}', 'destroy')->name('tech.destroy');
})->middleware(['auth', 'verified']);

Route::prefix('section')->controller(SectionController::class)->group(function () {
    Route::post('/store', 'store')->name('section.store');
    Route::get('/show/{section}', 'show')->name('section.show');
    Route::get('/edit/{section}', 'edit')->name('section.edit');
    Route::post('/update/{section}', 'update')->name('section.update');
    Route::delete('/delete/{section}', 'destroy')->name('section.destroy');
})->middleware(['auth', 'verified']);

Route::prefix('concept')->controller(ConceptController::class)->group(function () {
    Route::get('/', 'index')->name('concept.index');
    Route::get('/create', 'create')->name('concept.create');
    Route::post('/store', 'store')->name('concept.store');
    Route::get('/show/{concept}', 'show')->name('concept.show');
    Route::get('/edit/{concept}', 'edit')->name('concept.edit');
    Route::post('/update/{concept}', 'update')->name('concept.update');
    Route::delete('/delete/{concept}', 'destroy')->name('concept.destroy');
})->middleware(['auth', 'verified']);

Route::prefix('builtin')->controller(BuiltInFunctionController::class)->group(function () {
    Route::post('/store', 'store')->name('builtin.store');
    Route::get('/show/{builtInFunction}', 'show')->name('builtin.show');
    Route::get('/edit/{builtInFunction}', 'edit')->name('builtin.edit');
    Route::post('/update/{builtInFunction}', 'update')->name('builtin.update');
    Route::delete('/delete/{builtInFunction}', 'destroy')->name('builtin.destroy');
})->middleware(['auth', 'verified']);

Route::prefix('user')->controller(UserController::class)->group(function () {
    Route::get('/', 'index')->name('users.index');
    Route::delete('/{user}/delete', 'destroy')->name('user.destroy');
})->middleware(['auth', 'verified', 'role:super-admin']);

Route::prefix('role')->controller(RoleController::class)->group(function () {
    Route::get('/create', 'create')->name('role.create');
    Route::post('/store', 'store')->name('role.store');
    Route::get('/show/{role}', 'show')->name('role.show');
    Route::get('/edit/{role}', 'edit')->name('role.edit');
    Route::post('/update/{role}', 'update')->name('role.update');
    Route::delete('/delete', 'destroy')->name('role.destroy');
})->middleware(['auth', 'verified', 'role:super-admin']);
//Route::resource('permission', RoleController::class)->middleware(['auth', 'verified', 'role:super-admin']);
Route::prefix('permission')->controller(RoleController::class)->group(function () {
    Route::get('/create', 'create')->name('permission.create');
    Route::post('/store', 'store')->name('permission.store');
    Route::get('/show/{permission}', 'show')->name('permission.show');
    Route::get('/edit/{permission}', 'edit')->name('permission.edit');
    Route::post('/update/{permission}', 'update')->name('permission.update');
    Route::delete('/delete', 'destroy')->name('permission.destroy');
})->middleware(['auth', 'verified', 'role:super-admin']);

require __DIR__ . '/auth.php';
