<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
   // return "The route is working!";
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Route::middleware(['admin'])->group(function () {
        //Route::resource('products', ProductController::class);
    //});
    Route::middleware(['auth','admin'])->group(function () {
    Route::resource('products', ProductController::class);
});
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::get('/add-to-cart/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/remove-cart/{id}', [CartController::class, 'remove'])->name('cart.remove');
});

Route::post('/checkout', [PaymentController::class, 'checkout'])->name('checkout');
Route::get('/payment-success', [PaymentController::class, 'success']);

Route::middleware(['auth'])->group(function () {
    Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
});
require __DIR__.'/auth.php';
