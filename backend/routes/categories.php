<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;

/*
|--------------------------------------------------------------------------
| CATEGORY ROUTES
|--------------------------------------------------------------------------
*/

// Get all categories
Route::get('/categories', [CategoryController::class, 'index']);

// Create category
Route::post('/categories', [CategoryController::class, 'store']);

// Get single category
Route::get('/categories/{id}', [CategoryController::class, 'show']);

// Update category
Route::put('/categories/{id}', [CategoryController::class, 'update']);

// Delete category
Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);

