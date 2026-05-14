<?php

use App\Http\Controllers\Api\DistribuidorController;
use App\Http\Controllers\Api\GameController;
use App\Http\Controllers\Api\PlataformaController;
use App\Http\Controllers\Api\PersonajeController;
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
// RUTA ESPECIAL: Assignar o canviar l'autor d'un llibre
// Farem servir PATCH perquè implementarem un funció on només modifiquem un camp concret
Route::patch('/games/{id}/assignar-distribuidor', [GameController::class, 'assignarDistribuidor']);

Route::get('/distribuidores', [DistribuidorController::class, 'index']);
Route::get('/distribuidores/{id}', [DistribuidorController::class, 'show']);
Route::post('/distribuidores', [DistribuidorController::class, 'store']);
Route::put('/distribuidores/{id}', [DistribuidorController::class, 'update']);
Route::delete('/distribuidores/{id}', [DistribuidorController::class, 'destroy']);

Route::post('/games/{id}/plataformas', [GameController::class, 'assignarPlataforma']);

Route::get('/plataformas', [PlataformaController::class, 'index']);
Route::post('/plataformas', [PlataformaController::class, 'store']);
Route::delete('/plataforma/{id}', [PlataformaController::class, 'destroy']);


Route::get('/personajes', [PersonajeController::class, 'index']);
Route::get('/personajes/{id}', [PersonajeController::class, 'show']);
Route::post('/personajes', [PersonajeController::class, 'store']);
Route::put('/personajes/{id}', [PersonajeController::class, 'update']);
Route::delete('/personajes/{id}', [PersonajeController::class, 'destroy']);
Route::get('/personajes/especie/{especie}', [PersonajeController::class, 'filtro']);
