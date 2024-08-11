<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibraryItemController;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/dashboard', [LibraryItemController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('/library-items/create', [LibraryItemController::class, 'create'])->middleware(['auth'])->name('library-items.create');
Route::post('/library-items', [LibraryItemController::class, 'store'])->middleware(['auth'])->name('library-items.store');

Route::get('/search', [LibraryItemController::class, 'search'])->name('search');

require __DIR__ . '/auth.php';
