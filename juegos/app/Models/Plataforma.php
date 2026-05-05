<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Plataforma extends Model
{
    protected $fillable = ["nombre"];
    public function games(): BelongsToMany {
        return $this->belongsToMany(Game::class);
    }
}
