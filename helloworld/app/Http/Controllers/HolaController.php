<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HolaController extends Controller
{
    public function saludar()
    {
        // 1. Obtenim l'hora actual (format 00-23)
        $hora = date('H');
        $minuts = date('i');

        // 2. Decidim la salutació i quina vista farem servir
        if ($hora >= 6 && $hora < 13) {
            $missatge = "Bon dia!";
            $imatge = "mati.jpg";
            $vista = 'salutacions.mati'; // Carpeta salutacions, fitxer mati.blade.php
        } elseif ($hora >= 13 && $hora < 21) {
            $missatge = "Bona tarda!";
            $imatge = "tarda.jpg";
            $vista = 'salutacions.tarda';
        } else {
            $missatge = "Bona nit!";
            $imatge = "nit.jpg";
            $vista = 'salutacions.nit';
        }

        // 3. Passem un array amb múltiples valors
        return view($vista, [
            'text_salutacio' => $missatge,
            'hora_actual'	=> $hora . ":" . $minuts,
            'imatge_fons'	=> $imatge,
            'es_mati'    	=> ($hora < 13) // Passem un booleà també!
        ]);
    }
}

