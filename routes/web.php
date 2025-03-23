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






use App\Http\Controllers\CouponController;
use App\Http\Controllers\PageController;


Route::get('/coupons', function () {
    return view('index'); 
})->name('welcome');


use App\Models\Coupon;

Route::get('/home', function () {
    $coupons = Coupon::all(); 
    return view('home', compact('coupons')); 
})->name('home');



Route::get('/about', function () {
    return view('about_us');
});

Route::get('/header', function () {
    return view('header');
});


/* coupon */
Route::get('/add-coupon', [CouponController::class, 'addCoupon']);
Route::post('/coupons/{id}/apply', [CouponController::class, 'applyCoupon'])->name('coupons.apply');
Route::get('/coupon/{id}', [CouponController::class, 'show']);

Route::get('/coupons', [App\Http\Controllers\CouponController::class, 'index'])->name('coupons.index');
Route::post('/coupons', [App\Http\Controllers\CouponController::class, 'store'])->name('coupons.store');



// routes/web.php
Route::get('/home', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'submitContact'])->name('contact.submit');
Route::resource('categories', CategoryController::class);

Route::get('/', function () {
    $latestProducts = Product::latest()->take(3)->get();
    return view('landing', compact('latestProducts'));
});

