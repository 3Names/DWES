<?php

namespace App\Http\Controllers;

class AlumneController extends Controller
{
    public function llistat()
    {
        // Simulem una matriu de dades
        $alumnes = [
            ['nom' => 'Joan', 'nota' => 10, 'poblacio' => 'Barcelona'],
            ['nom' => 'Marta', 'nota' => 3, 'poblacio' => 'Girona'],
            ['nom' => 'Albert', 'nota' => 6, 'poblacio' => 'Tarragona'],
            ['nom' => 'Elena', 'nota' => 4, 'poblacio' => 'Lleida'],
        ];
        $curso = "2nd DAW";
        // També podríem provar amb una llista buida per veure què passa
        // $alumnes = [];

        return view('lista_alumnos', ['llista' => $alumnes, 'curs' => $curso]);
    }
}
