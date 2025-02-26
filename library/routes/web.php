<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\CategoryController;
use Illuminate\Container\Attributes\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(CategoryController::class)->group(function() {
    Route::get("categories", "all")->name("allCategories");
    Route::get("categories/show/{id}", "show")->name("showCategory");
    Route::middleware('auth')->group(function() {
        Route::get("categories/create", "create")->name("createCategory");
        Route::post("categories", "store")->name("storeCategory");
        Route::get("categories/edit/{id}", "edit")->name("editCategory");
        Route::put("categories/update/{id}", "update")->name("updateCategory");
        Route::delete("categories/{id}", "delete")->name("deleteCategory");
    });
});

// auth

Route::controller(AuthController::class)->group(function() {
    Route::middleware('guest')->group(function() {
        Route::get('register', 'registerForm')->name('registerForm');
        Route::post('register', 'register')->name('register');
        Route::get('login', 'loginForm')->name('loginForm');
        Route::post('login', 'login')->name('login');
    });
    Route::middleware('auth')->group(function() {
        Route::post('logout', 'logout')->name('logout');
    });
    Route::get("allUsers", "allUsers")->middleware('isAdmin', 'auth');
});