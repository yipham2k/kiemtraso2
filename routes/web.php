<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquationController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\TenController;
use App\Http\Controllers\GioHangController;
use App\Http\Controllers\CartController;

// Route::get('/add-to-cart/{id}', [GioHangController::class, 'addToCart'])->name('giohang.add');
// Route::get('/gio-hang', [GioHangController::class, 'index'])->name('giohang.index');
// Route::post('/gio-hang/update', [GioHangController::class, 'update'])->name('giohang.update');
// Route::post('/gio-hang/remove/{id}', [GioHangController::class, 'remove'])->name('giohang.remove');
// Route::post('/gio-hang/clear', [GioHangController::class, 'clear'])->name('giohang.clear');
// Route::get('/thanh-toan', [GioHangController::class, 'thanhtoan'])->name('thanhtoan');
Route::get('/giohang', function () {
    return view('giohang');
})->name('giohang');
Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');
// Đăng ký

Route::get('/dang-ky', [TenController::class, 'showRegisterForm'])->name('register');
Route::post('/dang-ky', [TenController::class, 'postRegister'])->name('register.post');

// Đăng nhập
Route::get('/dang-nhap', [TenController::class, 'showLoginForm'])->name('login');
Route::post('/dang-nhap', [TenController::class, 'postLogin'])->name('login.post');

// Đăng xuất
Route::post('/dang-xuat', [TenController::class, 'logout'])->name('logout');

Route::get('/timkiem', [TenController::class, 'search'])->name('search');
Route::get('/', [TenController::class, 'getIndex'])->name('index');

Route::get('/product/{id}', [TenController::class, 'show'])->name('product.show');

