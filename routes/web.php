<?php

use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;


Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');

    Route::get('/blogdetails/{slug}','blogDetails')->name('blogdetails');

});
