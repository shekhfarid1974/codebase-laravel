<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\CrmController; // Add this controller

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make sure something handles this!
|
*/

// Public Auth Routes (Accessible without login)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.attempt');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.attempt');

// Logout Route (POST request)
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Protected Routes (Require authentication)
Route::middleware('auth')->group(function () {
    // Dashboard Route
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.main');

    // Profile Route
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');

    // Settings Route
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');

    // CRM Route
    Route::get('/crm', [CrmController::class, 'index'])->name('crm.index');
    // You might also want routes for storing, updating, deleting CRM data
    // Route::post('/crm', [CrmController::class, 'store'])->name('crm.store');
    // Route::get('/crm/{id}', [CrmController::class, 'show'])->name('crm.show');
    // Route::put('/crm/{id}', [CrmController::class, 'update'])->name('crm.update');
    // Route::delete('/crm/{id}', [CrmController::class, 'destroy'])->name('crm.destroy');
});
