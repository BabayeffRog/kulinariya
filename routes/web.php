<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\RecipeController;
use Illuminate\Support\Facades\Route;


Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('about/', 'about')->name('about');

});

Route::controller(RecipeController::class)->group(function () {
    Route::get('recipes/', 'index')->name('recipes');
    Route::get('recipes/{slug}', 'show')->name('recipes.show');
    Route::get('recipes/search', 'show')->name('recipes.search');

});


Route::controller(ProductController::class)->group(function () {
    Route::get('products/', 'index')->name('products');
    Route::get('product/{slug}', 'show')->name('product.show');

});

