<?php

use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [SessionController::class, 'profile'])->name('profile');
});

Route::middleware('guest')->group(function () {
    Route::post('/registration', [SessionController::class, 'register'])->name('register');
});
