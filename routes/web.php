<?php

use App\Http\Controllers\SocialiteController;
use App\Livewire\Admin\Components\TypeRoomTable;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Layout\MakePayment;
use App\Livewire\Layout\VnpayPayment;
use App\Livewire\Pages\Contact;
use App\Livewire\Pages\DetailRoom;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::controller(SocialiteController::class)->group(function () {
    Route::get('auth/google', [SocialiteController::class, 'googleLogin'])->name('auth.google');
    Route::get('auth/google-callback', 'googleAuthentication')->name('auth/google-callback');
});


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
// Route::get('chi-tiet-phong', DetailRoom::class)
//     ->middleware(['auth', 'verified'])
//     ->name('room.detail');

Route::view('lien-he', 'livewire.pages.contact')
    ->middleware(['auth', 'verified'])
    ->name('contact');

Route::post('danh-sach-phong/thanh-toan-vnpay', [VnpayPayment::class, 'vnpay'])
    ->middleware(['auth', 'verified'])
    ->name('vnpay');

Route::get('danh-sach-phong/thuc-hien-thanh-toan', [MakePayment::class, 'makePayment'])
    ->middleware(['auth', 'verified'])
    ->name('vnpay.return');

// Admin Panel Dashboard


Route::view('admin/dashboard', 'livewire/admin.dashboard')
    ->middleware(['auth', 'verified'])
    ->name('admin.dashboard');

Route::view('admin/home-dash', 'livewire.admin.home-dash')
    ->middleware(['auth', 'verified'])
    ->name('admin.home-dash');

Route::view('admin/rooms', 'livewire.admin.room-dash')
    ->middleware(['auth', 'verified'])
    ->name('admin.room-dash');

Route::view('admin/type-room', 'livewire.admin.typeroom-dash')
    ->middleware(['auth', 'verified'])
    ->name('admin.tr-dash');

Route::view('admin/users', 'livewire.admin.user-dash')
    ->middleware(['auth', 'verified'])
    ->name('admin.user-dash');

Route::view('admin/bookings', 'livewire.admin.booking-dash')
    ->middleware(['auth', 'verified'])
    ->name('admin.booking-dash');


// Route::get('admin/room-type', TypeRoomTable::class)->name('admin.room-type');

require __DIR__ . '/auth.php';
