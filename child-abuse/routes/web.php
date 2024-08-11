<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;

Route::view('/', 'welcome')->name('welcome');

Route::get('dashboard', [ReportController::class, 'index'])->middleware(['auth'])->name('dashboard');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::put('/reports/{report}/markTreated', [ReportController::class, 'markTreated'])->middleware(['auth'])->name('reports.markTreated');
Route::put('/reports/{report}/markInvestigated', [ReportController::class, 'markInvestigated'])->middleware(['auth'])->name('reports.markInvestigated');

Route::get('/report', [ReportController::class, 'create'])->name('reports.create');
Route::post('/report', [ReportController::class, 'store'])->name('reports.store');


require __DIR__ . '/auth.php';
