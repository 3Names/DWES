<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Distribuidor;
class DistribuidorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Distribuidor::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'pais' => 'required|string|max:255',
        ]);

        $distribuidor = Distribuidor::create($request->all());

        return response()->json($distribuidor, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $distribuidor = Distribuidor::find($id);

        if (!$distribuidor) {
            return response()->json(["message" => "Distribuidor no encontrado"], 404);
        }

        return response()->json($distribuidor, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'pais' => 'required|string|max:255',
        ]);

        $distribuidor = Distribuidor::find($id);

        if (!$distribuidor) {
            return response()->json(["message" => "Distribuidor no encontrado"], 404);
        }
        $distribuidor->update($request->all());
        return response()->json($distribuidor, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $distribuidor = Distribuidor::destroy($id);

        if (!$distribuidor) {
            return response()->json(["message" => "Distribuidor no encontrado"], 404);
        }

        return response()->json(null, 204);
    }
}
