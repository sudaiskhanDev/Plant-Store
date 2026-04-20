<?php


use App\Http\Controllers\Api\OrderDetailController;

Route::get('/order-details', [OrderDetailController::class, 'index']);
Route::post('/order-details', [OrderDetailController::class, 'store']);
Route::get('/order-details/{id}', [OrderDetailController::class, 'show']);
Route::put('/order-details/{id}', [OrderDetailController::class, 'update']);
Route::delete('/order-details/{id}', [OrderDetailController::class, 'destroy']);