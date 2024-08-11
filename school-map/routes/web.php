<?php

use App\Http\Controllers\LocationController;
use Illuminate\Support\Facades\Route;

// Route::view('/', 'welcome');

Route::get('/', [LocationController::class, 'index']);

Route::get('dashboard', [LocationController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('locations', LocationController::class)->middleware(['auth', 'verified']);


// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
