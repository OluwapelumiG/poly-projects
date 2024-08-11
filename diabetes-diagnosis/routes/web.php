<?php

use App\Http\Controllers\ResultController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Quiz;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

// Route::get('/quiz', Quiz::class)->name('quiz');

Route::view('quiz', 'quiz')->name('quiz');

Route::get('results', [ResultController::class, 'index'])->name('results');


require __DIR__ . '/auth.php';
