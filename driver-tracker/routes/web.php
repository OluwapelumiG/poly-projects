<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationController;

// Route::view('/', 'welcome');

Route::view('/', 'dashboard')
    ->middleware(['auth', 'verified']);

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::post('/update-location', [LocationController::class, 'updateLocation'])->name('updateLocation');

Route::get('/driver/{id}/location', [LocationController::class, 'viewLocation'])->name('drivers.location');

Route::get('/driver/{user}/fetch-location', [LocationController::class, 'fetchLocation'])->name('drivers.fetchLocation');




require __DIR__ . '/auth.php';
