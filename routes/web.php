<?php

use App\Livewire\Admin\Components\TypeRoomTable;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Pages\DetailRoom;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('trang-chu', 'home')
    // ->middleware(['auth', 'verified'])
    ->name('home');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::view('danh-sach-phong', 'livewire.pages.room')
    // ->middleware(['auth', 'verified'])
    ->name('room');

// Route::get('danh-sach-phong/chi-tiet-phong', 'livewire.pages.detail-room')
//     ->name('room.detail');
Route::get('danh-sach-phong/chi-tiet-phong', DetailRoom::class)
    ->name('room.detail');


// Admin Panel Dashboard


Route::view('admin/dashboard', 'livewire/admin.dashboard')
    ->middleware(['auth', 'verified'])
    ->name('admin.dashboard');

Route::view('admin/home-dash', 'livewire.admin.home-dash')
    ->middleware(['auth', 'verified'])
    ->name('admin.home-dash');

Route::view('admin/type-room', 'livewire.admin.typeroom-dash')
    ->middleware(['auth', 'verified'])
    ->name('admin.tr-dash');

Route::view('admin/rooms', 'livewire.admin.room-dash')
    ->middleware(['auth', 'verified'])
    ->name('admin.room-dash');

// Route::get('admin/room-type', TypeRoomTable::class)->name('admin.room-type');

require __DIR__ . '/auth.php';
