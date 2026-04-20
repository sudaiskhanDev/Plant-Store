<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MaintenanceController;

Route::prefix('v1')->group(function () {

    Route::prefix('maintenances')->group(function () {
        Route::get('/', [MaintenanceController::class, 'index']);
        Route::post('/', [MaintenanceController::class, 'store']);
        Route::get('/{id}', [MaintenanceController::class, 'show']);
        Route::put('/{id}', [MaintenanceController::class, 'update']);
        Route::delete('/{id}', [MaintenanceController::class, 'destroy']);
    });

});