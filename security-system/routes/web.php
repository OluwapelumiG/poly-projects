<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PersonController;


Route::view('/', 'welcome');
// use App\Livewire\SearchPersons;

// Route::get('/', SearchPersons::class);
Route::get('/search', [PersonController::class, 'search'])->name('search');


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
