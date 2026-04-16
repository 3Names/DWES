<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Game::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'fecha_lanzamiento' => 'required|date',
            'precio' => 'required|integer'
        ]);

        $game = Game::create($request->all());

        return response()->json($game, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $game = Game::find($id);

        if (!$game) {
            return response()->json(["message" => "No se encontro el juego"], 404);
        }

        return response()->json($game, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'titulo' => 'sometimes|required|string',
            'fecha_lanzamiento' => 'sometimes|required|,' . $id,
            'precio' => 'sometimes|required|integer'
        ]);

        $game = Game::find($id);

        if (!$game) {
            return response()->json(["message" => "No se encontro el juego"], 404);
        }

        $game->update($request->all());
        return response()->json($game, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $game = Game::find($id);

        if (!$game) {
            return response()->json(["message" => "No se encontro el juego"], 404);
        }
        $game->delete();

        return response()->json(null, 204);
    }
}
