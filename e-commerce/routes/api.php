<?php

use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\ApiProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::controller(ApiProductController::class)->group(function() {
    Route::get('products', 'all');
    Route::get('products/{id}', 'show');
    Route::post('products', 'store');
    Route::delete('product/{id}', 'delete');
    Route::put('products/update/{id}', 'update');
});

Route::controller((ApiAuthController::class))->group(function() {
    Route::post("register", "register");
    Route::post("login", "login");
    Route::post("logout", "logout");
});