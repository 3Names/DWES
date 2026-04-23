<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Plataforma extends Model
{
    public function plataforma(): BelongsToMany {
        return $this->belongsToMany(Game::class);
    }
}
