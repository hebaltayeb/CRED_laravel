<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Models\Product;
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

Route::resource('categories', CategoryController::class);

Route::get('/', function () {
    $latestProducts = Product::latest()->take(3)->get();
    return view('landing', compact('latestProducts'));
});