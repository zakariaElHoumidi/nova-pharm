<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ville extends Model
{
    protected $fillable = [
        'region_id',
        'name',
    ];

    public function getCountVisitesAttribute(){
        return $this->medecins->sum('countVisites');
    }

    function secteurs(): HasMany{
        return $this->hasMany(Secteur::class);
    }

    function medecins(): HasMany{
        return $this->hasMany(Medecin::class);
    }

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    public function visites(): HasMany{
        return $this->hasMany(Visite::class);
    }
}
