<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

Route::get('/', function () {
    return view('welcome');
})-> name('welcome');

Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');

Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');

Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');

Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');

Route::get('/orders/{id}/edit', [OrderController::class, 'edit'])->name('orders.edit');

Route::put('/orders/{id}', [OrderController::class, 'update'])->name('orders.update');

Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');

Route::resource('/products', ProductController::class);

// Cart Routes
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

// Checkout Routes
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
Route::get('/checkout/success/{order}', [CheckoutController::class, 'success'])->name('checkout.success');


