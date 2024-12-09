<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Middleware\isAdminMiddleware;
use App\Livewire\Admin\Dashboard;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::middleware('guest')->group(function () {
    Volt::route('register', 'pages.auth.register')
        ->name('register');

    Volt::route('login', 'pages.auth.login')
        ->name('login');

    Volt::route('forgot-password', 'pages.auth.forgot-password')
        ->name('password.request');

    Volt::route('reset-password/{token}', 'pages.auth.reset-password')
        ->name('password.reset');
});

Route::middleware('auth')->group(function () {
    Volt::route('verify-email', 'pages.auth.verify-email')
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Volt::route('confirm-password', 'pages.auth.confirm-password')
        ->name('password.confirm');
});

Route::middleware(['auth', isAdminMiddleware::class])->group(function () {
    // Admin Panel Dashboard
    Route::view('admin/dashboard', 'livewire.admin.dashboard')->name('admin.dashboard');

    Route::view('admin/home-dash', 'livewire.admin.home-dash')
        ->name('admin.home-dash');

    Route::view('admin/rooms', 'livewire.admin.room-dash')
        ->name('admin.room-dash');

    Route::view('admin/type-room', 'livewire.admin.typeroom-dash')
        ->name('admin.tr-dash');

    Route::view('admin/users', 'livewire.admin.user-dash')
        ->name('admin.user-dash');

    Route::view('admin/bookings', 'livewire.admin.booking-dash')
        ->name('admin.booking-dash');
});
