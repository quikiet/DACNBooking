<?php

use App\Livewire\Admin\Components\TypeRoomTable;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::view('admin/dashboard', 'livewire/admin.dashboard');

Route::get('admin/home-dash', function () {
    return view('livewire.admin.home-dash');
})->name('admin.home-dash');

Route::get('admin/type-room', function () {
    return view('livewire.admin.typeroom-dash');
})->name('admin.tr-dash');
// Route::get('admin/room-type', TypeRoomTable::class)->name('admin.room-type');

require __DIR__ . '/auth.php';
