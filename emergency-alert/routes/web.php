<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmergencyController;
use App\Http\Controllers\NotificationController;

// Route::view('/', 'welcome');

Route::view('/', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');

Route::get('/emergencies/create', [EmergencyController::class, 'create'])->name('emergencies.create');
Route::post('/emergencies', [EmergencyController::class, 'store'])->name('emergencies.store');

Route::get('/notifications', [NotificationController::class, 'index']);


require __DIR__ . '/auth.php';
