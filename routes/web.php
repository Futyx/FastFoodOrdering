<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/cart', [CartController::class, 'index'])->name('cart');

Route::get('/menu/{id}', [MenuController::class, 'show'])->name('menus.show');

Route::post('/menu/{id}', [OrderController::class, 'store'])->name('menus.cart');

Route::get('/order/list', [OrderController::class, 'show'])->name('order.show');

Route::get('/orders/list', [OrderController::class, 'show'])->name('orders.show');

Route::post('/orders/list', [OrderController::class, 'store'])->name('order.store');

Route::get('/home', [CategoryController::class, 'index'])->name('home.category');




Route::group(['prefix' => 'customer'], function(){

    Route::get('login', [CustomerController::class, 'index'])->name('login.customer');
    Route::post('login', [CustomerController::class, 'store'])->name('login.customer.store');
});


Route::group(['prefix' => 'admin'], function(){

    Route::get('login', [AdminController::class, 'login'])->name('login.admin');
    Route::post('login', [AdminController::class, 'store'])->name('login.admin.store');
})->middleware('auth.admin');

Route::group(['prefix' => 'owner'], function(){

    Route::get('login', [OwnerController::class, 'login'])->name('login.owner');
    Route::post('login', [OwnerController::class, 'store'])->name('login.owner.store');
});


require __DIR__.'/auth.php';
