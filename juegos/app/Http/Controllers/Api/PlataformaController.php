<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Plataforma;
use Illuminate\Http\Request;

class PlataformaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Plataforma::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255'
        ]);

        $plataforma = Plataforma::create($request->all());

        return response()->json($plataforma, 201);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $plataforma = Plataforma::destroy($id);

        if (!$plataforma) {
            return response()->json(["message" => "Plataforma no encontrada"], 404);
        }

        return response()->json(null, 204);
    }
}
