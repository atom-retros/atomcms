<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return redirect()->route('login.index');
    })->name('login');

    Route::get('/login', LoginController::class)
        ->name('login.index');

    Route::get('/register', RegisterController::class)->name('register.index');
});
