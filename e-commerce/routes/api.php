<?php

use App\Http\Controllers\ApiProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::controller(ApiProductController::class)->group(function() {
    Route::get('products', 'all')->name('allProducts');
    Route::get('products/{id}', 'show')->name('showProduct');
    Route::get('products/create', 'create')->name('createProduct');
    Route::post('products', 'store')->name('storeProduct');
    Route::delete('product/{id}', 'delete')->name('deleteProduct');
    Route::get('products/edit/{id}', 'edit')->name('editProduct');
    Route::put('products/update/{id}', 'update')->name('updateProduct');
});