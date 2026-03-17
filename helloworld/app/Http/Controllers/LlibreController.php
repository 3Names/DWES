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

        $nouLlibre->save();

        return redirect('/llibres');
    }
}