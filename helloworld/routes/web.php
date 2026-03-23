<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HolaController;
use App\Http\Controllers\AlumneController;
use App\Http\Controllers\PeliculaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hola', function () {
    return "HOLA MUNDO";
});

//Route::get('/saludo/{nom}', [HolaController::class, 'saludar']);

Route::get('/salutacio-dinamica', [HolaController::class, 'saludar']);

Route::get('/alumnes', [AlumneController::class, 'llistat']);

Route::get('/peliculas', [PeliculaController::class, 'index']);
Route::get('/peliculas/create', [PeliculaController::class, 'create']);
Route::post('/peliculas/create', [PeliculaController::class, 'guardar']);
Route::get('/peliculas/{id}', [PeliculaController::class, 'detalles']);
Route::get('/peliculas/eliminar/{id}', [PeliculaController::class, 'destroy']);
Route::get('/peliculas/editar/{id}', [PeliculaController::class, 'editar']);
Route::post('/peliculas/editar/{id}', [PeliculaController::class, 'update']);
