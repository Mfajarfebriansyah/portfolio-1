<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {

    Route::get('/login',[LoginController::class, 'index'])->name('login');
    Route::post('/login/submit',[LoginController::class, 'submit'])->name('submit');

    Route::get('/register',[RegisterController::class, 'index'])->name('register');
    Route::post('/register/store', [RegisterController::class, 'store'])->name('store');
});

