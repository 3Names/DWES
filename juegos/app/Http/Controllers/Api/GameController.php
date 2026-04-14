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

        return Game::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $game = Game::find($id);

        if (!$game) {
            return response()->json(["message" => "No se encontro el juego"]);
        }

        return Game::find($id);
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
            return response()->json(["message" => "No se encontro el juego"]);
        }

        $game->update($request->all());
        return $game;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $game = Game::find($id);

        if (!$game) {
            return response()->json(["message" => "No se encontro el juego"]);
        }

        return Game::destroy($id);
    }
}
