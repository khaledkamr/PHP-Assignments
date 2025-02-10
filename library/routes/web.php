<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(CategoryController::class)->group(function() {
    Route::get("categories", "all")->name("allCategories");
    Route::get("categories/show/{id}", "show")->name("showCategory");
    Route::get("categories/create", "create")->name("createCategory");
    Route::post("categories", "store")->name("storeCategory");
    Route::get("categories/edit/{id}", "edit")->name("editCategory");
    Route::put("categories/update/{id}", "update")->name("updateCategory");
    Route::delete("categories/{id}", "delete")->name("deleteCategory");
});