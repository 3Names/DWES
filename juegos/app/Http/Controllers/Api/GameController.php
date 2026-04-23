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
        // El mètode with('autor') fa que el JSON inclogui les dades de l'autor
        return response()->json(Game::with('distribuidor')->get(), 200);
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

    public function assignarDistribuidor(Request $request, $id) {
        // 1. Busquem el llibre pel seu ID a la base de dades.
        $game = Game::find($id);

        // 2. Si no el trobem, retornem un error 404 immediatament per seguretat.
        if (!$game) return response()->json(['message' => 'Juego no encontrado'], 404);

        // 3. Validem que la petició porti un 'autor_id' i, el més important,
        //	que aquest ID existeixi realment a la taula 'autors' (exists:autors,id).
        $request->validate(['distribuidor_id' => 'required|exists:distribuidors,id']);

        // 4. Assignem el nou ID de l'autor a la propietat 'autor_id' del model Llibre.
        $game->distribuidor_id = $request->distribuidor_id;

        // 5. Persistim el canvi a la base de dades (executa l'UPDATE a MySQL).
        $game->save();

        // 6. Retornem el llibre amb un mètode nou: load('autor').
        //	Això "recarrega" l'objecte incloent tota la informació de l'autor que acabem d'assignar.
        return response()->json([
            'message' => 'Distribuidor assignat correctament',
            'game' => $game->load('distribuidor')
        ], 200);
    }
}
