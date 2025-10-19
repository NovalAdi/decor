<?php

use App\Http\Controllers\CartController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function (Request $request) {
    return view('page.home');
});

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/update/{type}/{id}', [CartController::class, 'update'])->name('cart.update');
Route::get('/cart/delete/{id}', [CartController::class, 'remove'])->name('cart.delete');