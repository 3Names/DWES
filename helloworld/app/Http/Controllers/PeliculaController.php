<?php

namespace App\Http\Controllers;

use App\Models\Pelicula; // Importem el Model (com la Entity a Spring)
use Illuminate\Http\Request;

class PeliculaController extends Controller
{
	public function index()
	{
    	// Equivalent a: SELECT * FROM Peliculas
    	$totsPeliculas = Pelicula::all();

    	// Enviem les dades a la vista (com el ModelAndView)
    	return view('peliculas.index', ['peliculas' => $totsPeliculas]);
	}

    public function create() 
    {
        $actores = \App\Models\Actor::all();
        return view('peliculas.create', compact('actores'));
    }

    public function guardar(Request $request)
    {
        $nouPelicula = new Pelicula();

        $nouPelicula->titol = $request->input('titol');
        $nouPelicula->isbn = $request->input('isbn');
        $nouPelicula->duracion = $request->input('duracion');
        $nouPelicula->preu = $request->input('preu');
        
        if ($request->hasFile('imatge')) {
            // Guardem la imatge a la carpeta 'public/portades'
            $fitxer = $request->file('imatge');
            $nomImatge = time() . '_' . $fitxer->getClientOriginalName();
            $fitxer->move(public_path('portades'), $nomImatge);
        
            // Guardem el nom del fitxer a la base de dades
            $nouPelicula->imatge = $nomImatge;
        }

        $nouPelicula->save();

        if ($request->has('actores')) {
            $nouPelicula->actores()->attach($request->input('actores'));
        }
        return redirect('/peliculas');
    }
    
    public function detalles($id)
    {
        // Busquem el Pelicula pel seu ID. Si no existeix, donarà un error 404.
        $pelicula = Pelicula::findOrFail($id);
        return view('peliculas.show', compact('pelicula'));
    }

    public function destroy($id)
    {
        // 1. Busca el Pelicula per ID
        // ...
        $pelicula = Pelicula::findOrFail($id);
        // 2. Crida el mètode d'esborrat
        $pelicula->delete();
        // 3. Redirecciona al llistat amb un missatge
        return redirect('/peliculas');
    }

    public function editar($id)
    {
        $pelicula = Pelicula::findOrFail($id);
        $actores = \App\Models\Actor::all();
        return view('peliculas.update', compact('pelicula'), compact('actores'));
    }

    public function update(Request $request,$id)
    {
        $pelicula = Pelicula::findOrFail($id);

        $pelicula->titol = $request->input('titol');
        $pelicula->isbn = $request->input('isbn');
        $pelicula->duracion = $request->input('duracion');
        $pelicula->preu = $request->input('preu');
        
        if ($request->hasFile('imatge')) 
        {
            $fitxer = $request->file('imatge');
            $nomImatge = time() . '_' . $fitxer->getClientOriginalName();
            $fitxer->move(public_path('portades'), $nomImatge);
        
            $nouPelicula->imatge = $nomImatge;
        }

        $pelicula->save();

        if ($request->has('actores')) {
            $pelicula->actores()->sync($request->input('actores'));
        } else {
            $pelicula->actores()->sync([]);
        }

        return redirect('/peliculas');
    }
}