<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('user-enrollment/create', [DashboardController::class, 'create_user'])->name('user_enrollment.create');
Route::post('user-enrollment', [DashboardController::class, 'store_user'])->name('user_enrollment.store');

// Route::view('/profile', 'profile')->name('profile');
Route::view('/courses', 'courses')->name('courses');
Route::view('/results', 'results')->name('results');
Route::view('/fees_payment', 'fees')->name('fees_payment');

require __DIR__ . '/auth.php';
