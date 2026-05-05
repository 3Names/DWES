<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Game extends Model
{
    protected $fillable = ["titulo","fecha_lanzamiento","precio","distribuidor_id"];

    public function distribuidor(): BelongsTo{
        return $this->belongsTo(Distribuidor::class);
    }

    public function plataformas(): BelongsToMany{
        return $this->belongsToMany(Plataforma::class);
    }
}
