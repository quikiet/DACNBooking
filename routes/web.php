<?php

use App\Http\Controllers\SocialiteController;
use App\Livewire\Admin\Components\TypeRoomTable;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Layout\MakePayment;
use App\Livewire\Layout\PaymentFinish;
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

Route::view('lich-su-dat-phong', 'livewire.pages.booking-history')
    ->middleware(['auth'])
    ->name('history');

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

Route::view('ve-chung-toi', 'livewire.pages.about')
    ->middleware(['auth', 'verified'])
    ->name('about');

Route::post('danh-sach-phong/thanh-toan-vnpay', [VnpayPayment::class, 'vnpay'])
    ->middleware(['auth', 'verified'])
    ->name('vnpay');

Route::view('danh-sach-phong/thuc-hien-thanh-toan', 'livewire/pages/booking-fill-info')
    ->middleware(['auth', 'verified'])
    ->name('payment');

Route::get('danh-sach-phong/hoan-tat-thanh-toan', [PaymentFinish::class, 'makePayment'])
    ->middleware(['auth', 'verified'])
    ->name('finish');


// Route::get('admin/room-type', TypeRoomTable::class)->name('admin.room-type');

require __DIR__ . '/auth.php';
