<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController; // Make sure to import your controller

// Define the route for the root path '/'
Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

// You can also keep the /dashboard route if needed for other purposes
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.main');