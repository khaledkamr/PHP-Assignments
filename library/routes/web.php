<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get("categories", [CategoryController::class, "all"]);

Route::get("categories/show/{id}", [CategoryController::class, "show"]);

Route::get("categories/create", [CategoryController::class, "create"]);

Route::post("categories", [CategoryController::class, "store"]);