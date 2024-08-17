<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Livewire\OrderList;
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

Route::get('/user/{name}', function (string $name) {
    return 'Number '.$name;
});

Route::get('/cat/{name}', function (string $name) {
    return 'category is '.$name;
}); 



Route::get('/home', [CategoryController::class, 'index'])->name('home');

Route::get('/menu/{name}', [MenuController::class, 'show'])->name('menus.show');

Route::post('/menu/{name}', [OrderController::class, 'store'])->name('menus.cart');

Route::group(['prefix' =>'order'], function(){
    
        Route::get('/user/{email}/');
    
});

Route::get('/order/list', [OrderController::class, 'show'])->name('order.show');
Route::post('/order/list', [OrderController::class, 'create'])->name('order.save');
Route::get('/order/info', [OrderController::class, 'index'])->name('order.info');


// Route::get('/order', OrderList::class)->name('order');  



// Route::post('/order/remove/{id}', [OrderController::class, 'remove'])->name('order.remove');


Route::get('/orders/list', [OrderController::class, 'show'])->name('orders.show');

Route::post('/orders/list', [OrderController::class, 'store'])->name('orders.store');





Route::get('/payment', [PaymentController::class, 'index'])->name('payment');



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
