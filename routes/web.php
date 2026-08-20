<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CatController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\HobbyController;
use App\Http\Controllers\StudentController;

// hobbies
Route::resource('hobbies', HobbyController::class);

// phones
Route::resource('phones', PhoneController::class);

// students
Route::resource('students', StudentController::class);

// cats
Route::resource('cats', CatController::class);

// cars
Route::resource('cars', CarController::class);

Route::get('/', function () {
    return redirect()->route('students.index');
    // return view('welcome');
});
