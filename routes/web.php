<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('videos')->controller(VideoController::class)->middleware(['auth'])->group(function () {
    Route::get('/', 'index')->name('videos');
    Route::get('/create', 'create')->name('videos.create');
    Route::get('/{id}', 'show')->name('videos.show');
    Route::get('/{id}/edit', 'edit')->name('videos.edit');
});

Route::prefix('channels')->controller(ChannelController::class)->middleware(['auth'])->group(function () {
    Route::get('/', 'index')->name('channels');
    Route::get('/create', 'create')->name('channels.create');
    Route::get('/{id}', 'show')->name('channels.show');
    Route::get('/{id}/edit', 'edit')->name('channels.edit');
});

Route::prefix('categories')->controller(CategoryController::class)->middleware(['auth'])->group(function () {
    Route::get('/', 'index')->name('categories');
    Route::get('/create', 'create')->name('categories.create');
    Route::get('/{id}', 'show')->name('categories.show');
    Route::get('/{id}/edit', 'edit')->name('categories.edit');
});

require __DIR__ . '/auth.php';
