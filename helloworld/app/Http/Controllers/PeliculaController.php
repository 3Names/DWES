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
        return view('peliculas.create');
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

        return redirect('/Peliculas');
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
        $Pelicula = Pelicula::findOrFail($id);

        $nouPelicula->titol = $request->input('titol');
        $nouPelicula->isbn = $request->input('isbn');
        $nouPelicula->pagines = $request->input('pagines');
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

        return redirect('/Peliculas');
    }

    public function update(Request $request,$id)
    {
        $Pelicula = Pelicula::findOrFail($id);

        $Pelicula->titol = $request->input('titol');
        $Pelicula->isbn = $request->input('isbn');
        $Pelicula->pagines = $request->input('pagines');
        $Pelicula->preu = $request->input('preu');
        
        if ($request->hasFile('imatge')) {
            // Guardem la imatge a la carpeta 'public/portades'
            $fitxer = $request->file('imatge');
            $nomImatge = time() . '_' . $fitxer->getClientOriginalName();
            $fitxer->move(public_path('portades'), $nomImatge);
        
            // Guardem el nom del fitxer a la base de dades
            $nouPelicula->imatge = $nomImatge;
        }

        $nouPelicula->save();

        return redirect('/Peliculas');
    }
}