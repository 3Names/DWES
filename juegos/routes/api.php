<?php

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
