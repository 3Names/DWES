<?php

namespace App\Http\Controllers;

use App\Models\Llibre; // Importem el Model (com la Entity a Spring)
use Illuminate\Http\Request;

class LlibreController extends Controller
{
	public function index()
	{
    	// Equivalent a: SELECT * FROM llibres
    	$totsElsLlibres = Llibre::all();

    	// Enviem les dades a la vista (com el ModelAndView)
    	return view('llibres.index', ['llibres' => $totsElsLlibres]);
	}

    public function create() 
    {
        return view('llibres.create');
    }

    public function guardar(\Illuminate\Http\Request $request)
    {
        $nouLlibre = new \App\Models\Llibre();

        $nouLlibre->titol = $request->input('titol');
        $nouLlibre->isbn = $request->input('isbn');
        $nouLlibre->pagines = $request->input('pagines');
        $nouLlibre->preu = $request->input('preu');
        
        if ($request->hasFile('imatge')) {
            // Guardem la imatge a la carpeta 'public/portades'
            $fitxer = $request->file('imatge');
            $nomImatge = time() . '_' . $fitxer->getClientOriginalName();
            $fitxer->move(public_path('portades'), $nomImatge);
        
            // Guardem el nom del fitxer a la base de dades
            $nouLlibre->imatge = $nomImatge;
        }

        $nouLlibre->save();

        return redirect('/llibres');
    }
    
    public function detalles($id)
    {
        // Busquem el llibre pel seu ID. Si no existeix, donarà un error 404.
        $llibre = \App\Models\Llibre::findOrFail($id);
        return view('llibres.show', compact('llibre'));
    }

    public function destroy($id)
    {
        // 1. Busca el llibre per ID
        // ...
        $llibre = Llibre::findOrFail($id);
        // 2. Crida el mètode d'esborrat
        $llibre->delete();
        // 3. Redirecciona al llistat amb un missatge
        return redirect('/llibres');
    }
}