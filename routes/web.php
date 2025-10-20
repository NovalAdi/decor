<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductAdminController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('page.home');
});
Route::get('/home', function () {
    return view('page.home');
});

// noval
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::post('/product', [ProductController::class, 'search'])->name('product.search');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::post('/cart/add', [CartController::class, 'store'])->name('cart.add');

// audri
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/update/{type}/{id}', [CartController::class, 'update'])->name('cart.update');
Route::get('/cart/delete/{id}', [CartController::class, 'remove'])->name('cart.delete');

// alul
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/pesanan', [CheckoutController::class, 'listPesanan'])->name('pesanan.list');
Route::delete('/pesanan/hapus', [CheckoutController::class, 'clearPesanan'])->name('pesanan.hapus');

// paldo
Route::resource('products', ProductAdminController::class);

Route::get('/products-admin', [ProductAdminController::class, 'index'])->name('products-admin.index');
Route::get('/products-admin/create', [ProductAdminController::class, 'create'])->name('products-admin.create');
Route::post('/products-admin', [ProductAdminController::class, 'store'])->name('products-admin.store');
Route::get('/products-admin/{id}/edit', [ProductAdminController::class, 'edit'])->name('products-admin.edit');
Route::put('/products-admin/{id}', [ProductAdminController::class, 'update'])->name('products-admin.update');
Route::delete('/products-admin/{id}', [ProductAdminController::class, 'destroy'])->name('products-admin.destroy');
