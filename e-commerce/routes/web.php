<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ProductController as UserProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('redirect', [AuthController::class, 'redirect'])->name('redirect');

Route::controller(ProductController::class)->group(function() {
    Route::middleware("auth", "isAdmin")->group(function() {
        Route::get('products', 'all')->name('allProducts');
        Route::get('products/create', 'create')->name('createProduct');
        Route::post('products', 'store')->name('storeProduct');
        Route::delete('product/{id}', 'delete')->name('deleteProduct');
        Route::get('products/edit/{id}', 'edit')->name('editProduct');
        Route::put('products/update/{id}', 'update')->name('updateProduct');
    });
});

Route::controller(UserProductController::class)->group(function() {
    Route::get('products', 'all')->name('allProducts');
    Route::get('products/show/{id}', 'show')->name('showProduct');
    
    Route::middleware('auth')->group(function() {
        Route::post('products/addToCart/{id}', 'addToCart')->name('addToCart');
        Route::get('products/Cart', 'showCart')->name('showCart');
        Route::post('products/makeOrder', 'makeOrder')->name('makeOrder');
    });
    
});

Route::controller(HomeController::class)->group(function() {
    Route::get('home', 'all')->name('home');
    Route::post('products/addToWishlist/{id}', 'addToWishlist')->name('addToWishlist');
    Route::get('products/wishlist', 'wishlist')->name('wishlist');
});

Route::get('change/{lang}', function($lang) {
    if($lang == 'en') {
        session()->put('lang', 'en');
    } else {
        session()->put('lang', 'ar');
    }
    return redirect()->back();
});