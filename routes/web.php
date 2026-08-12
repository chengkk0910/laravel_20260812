<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CatController;

// cats
Route::resource('cats', CatController::class);

// cars
Route::resource('cars', CarController::class);

Route::get('/', function () {
    return redirect()->route('cats.index');
    // return view('welcome');
});
