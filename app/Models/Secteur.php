<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Secteur extends Model
{
    protected $fillable = [
        'ville_id',
        'name',
    ];

    public function getVilleName(){
        return $this->ville ? $this->ville->ville : "";
    }

    public function ville(): BelongsTo{
        return $this->belongsTo(Ville::class,'ville_id');
    }
    public function medecins(): HasMany{
        return $this->hasMany(MediPharma::class,"secteur",'id');
    }
}
