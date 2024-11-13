<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\CustomerController;

// Route untuk Autentikasi
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Route khusus untuk Merchant
Route::middleware('auth', 'role:merchant')->group(function () {
    Route::get('/merchant/profile', [MerchantController::class, 'show'])->name('merchant.profile');
    Route::resource('/merchant/menus', MenuController::class);
    Route::get('/merchant/orders', [OrderController::class, 'index'])->name('merchant.orders');
});

// Route khusus untuk Customer
Route::middleware('auth', 'role:customer')->group(function () {
    Route::get('/customer/search', [CustomerController::class, 'search'])->name('customer.search');
    Route::get('/customer/merchant/{id}', [CustomerController::class, 'showMerchant'])->name('customer.merchant.show');
    Route::get('/customer/order/{menu}', [OrderController::class, 'create'])->name('customer.orders.create');
    Route::post('/customer/order/{menu}', [OrderController::class, 'store'])->name('customer.orders.store');
    Route::get('/customer/invoice/{invoice}', [InvoiceController::class, 'show'])->name('customer.invoice.show');
});
