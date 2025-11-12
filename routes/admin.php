<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {

    // Login form (guest)
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
    Route::post('login', [LoginController::class, 'login'])->name('login.post')->middleware('guest');

    // Logout
    Route::post('logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

    // Protected admin area
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    });

});
