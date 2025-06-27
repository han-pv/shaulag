<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;

Route::get('', [HomeController::class, 'index'])->name('home');
Route::get('cars', [CarController::class, 'index'])->name('cars');
