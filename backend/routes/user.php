<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

// USER AUTH ROUTES
Route::prefix('auth')->group(function () {

    // 🔥 LOGIN + REGISTER (generic)
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    // 👤 CUSTOMER ONLY REGISTER (NEW)
    Route::post('/customer-register', [AuthController::class, 'customerRegister']);

    // 🔒 PROTECTED ROUTES
    Route::middleware('auth:api')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::get('/profile', [AuthController::class, 'profile']);
    });

});