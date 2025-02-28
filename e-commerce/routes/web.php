<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
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