<?php

use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\admin\LoginController as AdminLoginController;
use App\Http\Controllers\admin\MenuBookingController as AdminMenuBookingController;
use App\Http\Controllers\admin\BookingController as AdminBookingController;
use App\Http\Controllers\admin\UserController as AdminUserController;
use App\Http\Controllers\admin\LaporanController as AdminLaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\MenuBookingController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DaftarOrderController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'account'],function(){
    
    // Guest middleware
    Route::group(['middleware' => 'guest'],function() {
        Route::get('login',[LoginController::class,'index'])->name('account.login');
        Route::get('register',[LoginController::class,'register'])->name('account.register');
        Route::post('Process-register',[LoginController::class,'processRegister'])->name('account.processRegister');
        Route::post('authenticate',[LoginController::class,'authenticate'])->name('account.authenticate');
    });
    
    // authenticated Middleware
    Route::group(['middleware' => 'auth'],function() {
        Route::get('logout', [LoginController::class, 'logout'])->name('account.logout');
        Route::get('gallery', [GalleryController::class, 'index'])->name('account.Gallery');
        Route::get('menu_booking', [MenuBookingController::class, 'index'])->name('account.menu_booking');
        Route::get('booking/form', [BookingController::class, 'showBookingForm'])->name('booking.form');
        Route::post('booking/store', [BookingController::class, 'store'])->name('booking.store');
        Route::get('about', [AboutController::class, 'index'])->name('account.about');
        Route::get('daftar_order', [AdminBookingController::class, 'order'])->name('account.daftar_order');
        Route::get('daftar_order', [DaftarOrderController::class, 'index'])->name('account.daftar_order');
        Route::post('booking/uncancel/{id}', [BookingController::class, 'uncancel'])->name('booking.uncancel');
        Route::get('menu/detail/{event}', [MenuBookingController::class, 'showEvent'])->name('menu.detail');

        // Payment routes

        Route::post('pay', [PaymentController::class, 'pay'])->name('pay');
        Route::post('payment/callback', [PaymentController::class, 'callback'])->name('payment.callback');
        
        // Booking cancel route
        Route::post('booking/{id}/cancel', [BookingController::class, 'cancel'])->name('booking.cancel');

        // Route untuk mengubah status booking setelah pembayaran berhasil
        Route::post('payment/success', [BookingController::class, 'paymentSuccess'])->name('payment.success');

        // Route untuk halaman terima kasih setelah pembayaran sukses
        Route::get('thank_you', [BookingController::class, 'thankYou'])->name('thank.you');
    });
});

Route::group(['prefix' => 'admin'],function(){
    
    // Guest middleware for admin
    Route::group(['middleware' => 'admin.guest'],function() {
        Route::get('login',[AdminLoginController::class,'index'])->name('admin.login');
        Route::post('authenticate',[AdminLoginController::class,'authenticate'])->name('admin.authenticate');
    });
    
    // authenticated Middleware for admin
    Route::group(['middleware' => 'admin.auth'],function() {
        Route::get('dashboard',[AdminDashboardController::class,'index'])->name('admin.dashboard');
        Route::get('logout',[AdminLoginController::class,'logout'])->name('admin.logout');
        Route::get('menu_booking',[AdminMenuBookingController::class,'index'])->name('admin.menu_booking');
        Route::get('laporan',[AdminLaporanController::class,'index'])->name('admin.laporan');
        Route::get('create',[AdminMenuBookingController::class,'create'])->name('admin.create');
        Route::post('admin',[AdminMenuBookingController::class,'store'])->name('admin.store');
        Route::get('admin/{menu}/edit',[AdminMenuBookingController::class,'edit'])->name('admin.edit');
        Route::put('admin/{menu}',[AdminMenuBookingController::class,'update'])->name('admin.update');
        Route::delete('admin/{menu}',[AdminMenuBookingController::class,'destroy'])->name('admin.destroy');
        Route::get('booking', [AdminBookingController::class, 'index'])->name('admin.booking');
        Route::post('booking', [AdminBookingController::class, 'store'])->name('admin.booking.store');
        Route::post('booking/{id}/confirm', [AdminBookingController::class, 'confirmBooking'])->name('admin.booking.confirm');
        Route::post('booking/{id}/cancel', [AdminBookingController::class, 'cancelBooking'])->name('admin.booking.cancel');
        Route::get('user', [AdminUserController::class, 'showUsers'])->name('admin.user');
        Route::get('booking/{status}', [AdminBookingController::class, 'status'])->name('admin.booking.status');
        Route::post('admin/booking/{id}/uncancel',[AdminBookingController::class, 'uncancelBooking'])->name('admin.booking.uncancel');
        Route::get('admin/laporan', [AdminLaporanController::class, 'index'])->name('admin.laporan');
    });
});




