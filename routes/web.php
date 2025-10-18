<?php

use Illuminate\Support\Facades\Route;
// routes/web.php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController; // Add this controller
use App\Http\Controllers\SettingsController; // Add this controller

// Auth Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.attempt');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout'); // Ensure this matches the form action

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.attempt');

// Group routes that require authentication
Route::middleware('auth')->group(function () {
    // Dashboard Route
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.main');

    // Profile Route (Example)
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    // Add more profile routes if needed (e.g., update)

    // Settings Route (Example)
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    // Add more settings routes if needed (e.g., update)
});