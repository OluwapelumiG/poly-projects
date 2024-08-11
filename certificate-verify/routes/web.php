<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\VerificationController;
// Route::view('/', 'welcome');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/', [ResultController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [ResultController::class, 'index'])->name('dashboard');
    Route::get('/results/create', [ResultController::class, 'create'])->name('results.create');
    Route::post('/results', [ResultController::class, 'store'])->name('results.store');
    Route::get('/results/{result}/print', [ResultController::class, 'print'])->name('results.print');
});

Route::get('/verify-qr/{id}', [VerificationController::class, 'showVerificationForm'])->name('verify.qr');
Route::post('/verify-qr', [VerificationController::class, 'verifyQR'])->name('verify.qr.submit');




Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
