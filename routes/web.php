<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

Route::resource('cats', CarController::class);
Route::resource('cars', CarController::class);

Route::get('/', function () {
    return redirect()->route('cats.index');
    // return view('welcome');
});
