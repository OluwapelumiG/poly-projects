<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HospitalController;

// Route::view('/', 'welcome');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/', [HospitalController::class, 'welcome'])->name('welcome');
// Route::post('/', [HospitalController::class, 'welcome'])->name('welcome');
Route::get('/dashboard', [HospitalController::class, 'index'])->name('dashboard');
// Route::get('/hospital/{id}', [HospitalController::class, 'show']);
Route::get('/hospital/create', [HospitalController::class, 'create'])->name('create_hospital');
Route::get('/lgas/{state}', [HospitalController::class, 'getLgasByState']);
Route::post('/hospital', [HospitalController::class, 'store']);

require __DIR__ . '/auth.php';
