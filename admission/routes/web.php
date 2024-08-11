<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::view('/apply', 'apply')->name('apply.view');

Route::post('apply', [StudentController::class, 'store'])->name('apply.store');

require __DIR__ . '/auth.php';
