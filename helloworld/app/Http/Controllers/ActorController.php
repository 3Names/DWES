<?php

namespace App\Http\Controllers;

use App\Models\Actor; // Importem el Model (com la Entity a Spring)
use Illuminate\Http\Request;

class ActorController extends Controller
{
	public function index()
	{
    	// Equivalent a: SELECT * FROM actors
    	$totsactors = Actor::all();

    	// Enviem les dades a la vista (com el ModelAndView)
    	return view('actores.index', ['actores' => $totsactors]);
	}

    public function create() 
    {
        return view('actores.create');
    }

    public function guardar(Request $request)
    {
        $nouactor = new Actor();

        $nouactor->nombre = $request->input('nombre');
        $nouactor->dni = $request->input('dni');
        $nouactor->hobby = $request->input('hobby');
        $nouactor->edad = $request->input('edad');

        $nouactor->save();

        return redirect('/actores');
    }
    
    public function detalles($id)
    {
        // Busquem el actor pel seu ID. Si no existeix, donarà un error 404.
        $actor = Actor::findOrFail($id);
        return view('actores.show', compact('actor'));
    }

    public function destroy($id)
    {
        // 1. Busca el actor per ID
        // ...
        $actor = Actor::findOrFail($id);
        // 2. Crida el mètode d'esborrat
        $actor->delete();
        // 3. Redirecciona al llistat amb un missatge
        return redirect('/actores');
    }

    public function editar($id)
    {
        $actor = Actor::findOrFail($id);
        return view('actores.update', compact('actor'));
    }

    public function update(Request $request,$id)
    {
        $actor = Actor::findOrFail($id);

        $actor->nombre = $request->input('nombre');
        $actor->dni = $request->input('dni');
        $actor->hobby = $request->input('hobby');
        $actor->edad = $request->input('edad');

        $actor->save();

        return redirect('/actores');
    }
}
