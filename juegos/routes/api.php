<?php

use App\Http\Controllers\Api\DistribuidorController;
use App\Http\Controllers\Api\GameController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/games', [GameController::class, 'index']);
Route::get('/games/{id}', [GameController::class, 'show']);
Route::post('/games', [GameController::class, 'store']);
Route::put('/games/{id}', [GameController::class, 'update']);
Route::delete('/games/{id}', [GameController::class, 'destroy']);

Route::get('/distribuidores', [DistribuidorController::class, 'index']);
Route::get('/distribuidores/{id}', [DistribuidorController::class, 'show']);
Route::post('/distribuidores', [DistribuidorController::class, 'store']);
Route::put('/distribuidores/{id}', [DistribuidorController::class, 'update']);
Route::delete('/distribuidores/{id}', [DistribuidorController::class, 'destroy']);
