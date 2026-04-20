<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PlantController;

/*
|--------------------------------------------------------------------------
| PLANT ROUTES
|--------------------------------------------------------------------------
*/

// Get all plants
Route::get('/plants', [PlantController::class, 'index']);

// Create plant
Route::post('/plants', [PlantController::class, 'store']);

// Get single plant
Route::get('/plants/{id}', [PlantController::class, 'show']);

// Update plant
Route::put('/plants/{id}', [PlantController::class, 'update']);

// Delete plant
Route::delete('/plants/{id}', [PlantController::class, 'destroy']);