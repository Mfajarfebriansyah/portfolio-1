<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {

    Route::get('/login',[LoginController::class, 'index'])->name('login');
    Route::post('/login/submit',[LoginController::class, 'submit'])->name('submit');

});

