<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    protected $table = 'actores';

    public function peliculas(){
        return $this->belongsToMany(
            Pelicula::class,
            'actor_pelicula',
            'actores_id',
            'pelicula_id'
        );
    }
}
