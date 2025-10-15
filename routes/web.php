<?php

use Illuminate\Support\Facades\Route;
// routes/web.php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;

// Auth Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login'); // Changed from 'login.show' to 'login'
Route::post('/login', [LoginController::class, 'login'])->name('login.attempt');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register'); // Changed from 'register.show' to 'register'
Route::post('/register', [RegisterController::class, 'register'])->name('register.attempt');

// Protected Dashboard Route (requires authentication)
Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.main');
});