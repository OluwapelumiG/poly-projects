<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;


// Route::view('/', 'welcome');

Route::get('/', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Route for the /dashboard URL
Route::get('dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('req_docs', [DashboardController::class, 'req_docs'])
    ->middleware(['auth', 'verified'])
    ->name('req_docs');

Route::post('/req_docs', [DashboardController::class, 'store'])->name('documents.store');


Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::put('documents/{id}/approve', [DashboardController::class, 'approveDocument'])
    ->middleware(['auth', 'verified'])
    ->name('documents.approve');

Route::put('documents/{id}/disapprove', [DashboardController::class, 'disapproveDocument'])
    ->middleware(['auth', 'verified'])
    ->name('documents.disapprove');

require __DIR__ . '/auth.php';
