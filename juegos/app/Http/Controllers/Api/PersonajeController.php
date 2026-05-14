<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Personaje;

class PersonajeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Personaje::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "nombre" => "required",
            "especie" => "required",
            "año_aparicion" => "required",
        ]);

        $personaje = Personaje::create($request->all());

        return response()->json($personaje, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $personaje = Personaje::find($id);

        if (!$personaje) {
            return response()->json(["message" => "Personaje no encontrado"], 404);
        }

        return response()->json($personaje, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $personaje = Personaje::find($id);

        if (!$personaje) {
            return response()->json(["message" => "Personaje no encontrado"], 404);
        }

        $personaje->update($request->all());

        return response()->json($personaje, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $personaje = Personaje::destroy($id);

        if (!$personaje) {
            return response()->json(["message" => "Personaje no encontrado"], 404);
        }

        return response()->json(null, 204);
    }

    public function filtro(Request $request)
    {
        return Personaje::all()->where('especie', $request->especie)->sortBy('nombre');
    }
}
