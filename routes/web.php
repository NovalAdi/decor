<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductAdminController;

Route::get('/products-admin', [ProductAdminController::class, 'index'])->name('products-admin.index');
Route::get('/products-admin/create', [ProductAdminController::class, 'create'])->name('products-admin.create');
Route::post('/products-admin', [ProductAdminController::class, 'store'])->name('products-admin.store');
Route::get('/products-admin/{id}/edit', [ProductAdminController::class, 'edit'])->name('products-admin.edit');
Route::put('/products-admin/{id}', [ProductAdminController::class, 'update'])->name('products-admin.update');
Route::delete('/products-admin/{id}', [ProductAdminController::class, 'destroy'])->name('products-admin.destroy');
