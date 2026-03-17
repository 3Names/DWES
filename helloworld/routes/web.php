<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HolaController;
use App\Http\Controllers\AlumneController;
use App\Http\Controllers\LlibreController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hola', function () {
    return "HOLA MUNDO";
});

//Route::get('/saludo/{nom}', [HolaController::class, 'saludar']);

Route::get('/salutacio-dinamica', [HolaController::class, 'saludar']);

Route::get('/alumnes', [AlumneController::class, 'llistat']);

Route::get('/llibres', [LlibreController::class, 'index']);
