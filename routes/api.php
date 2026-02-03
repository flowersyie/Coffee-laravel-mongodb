<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CoffeeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Route::get('/coffees', [CoffeeController::class, 'index']);
// Route::post('/coffees', [CoffeeController::class, 'store']);
// Route::get('/coffees/{id}', [CoffeeController::class, 'show']);
// Route::put('/coffees/{id}', [CoffeeController::class, 'update']);
// Route::delete('/coffees/{id}', [CoffeeController::class, 'destroy']);

Route::apiResource('/coffee', CoffeeController::class);