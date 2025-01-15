<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Region extends Model
{
    protected $fillable = [
        'name',
    ];

    public function villes(): HasMany{
        return $this->hasMany(Ville::class,'region_id');
    }
}
