<?php

use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::get('dashboard', [StaffController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');


// Display the dashboard with staff table
Route::get('/pension', [StaffController::class, 'index'])->name('pension.index');

// Add a new staff member
Route::post('/pension/store', [StaffController::class, 'store'])->name('pension.store');

// Withdraw from staff pension
Route::post('/withdraw/{id}', [StaffController::class, 'withdraw'])->name('pension.withdraw');


Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
