<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CoffeeController;
use App\Http\Controllers\Api\RegisterController;

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
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);
Route::post('/login', App\Http\Controllers\Api\LoginController::class);