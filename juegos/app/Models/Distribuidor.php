<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Distribuidor extends Model
{
    protected $fillable = ["nombre","pais"];

    public function games(): HasMany {
        return $this->hasMany(Game::class);
    }
}
