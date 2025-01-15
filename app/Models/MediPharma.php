<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MediPharma extends Model
{
    protected $table = 'medi_pharmas';
    public const _NOT_ACTIVATED_ = 0;
    public const _ACTIVATED_ = 1;

    protected $fillable = [
        'user_id',
        'administrateur_id',
        'type_entity',
        'nom',
        'prenom',
        'adresse',
        'secteur',
        'ville',
        'speciality',
        'latitude',
        'longitude',
        'phones',
        'emails',
        'photos',
        'type_medecin',
        'potentiel_medecin',
        'etat',
    ];

    protected $casts = [
        'phones' =>'json',
        'emails' =>'json',
    ];

    protected $hidden=[
        'user_id',
        'administrateur_id',
        'created_at',
        'updated_at',
        'speciality'
    ];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function administrateur(): BelongsTo{
        return $this->belongsTo(Administrateur::class,'administrateur_id');
    }

    public function specialities(): BelongsToMany {
        return $this->belongsToMany(Specialitie::class,'medecins_specialities','medecin_id','speciality_id');
    }

    public function city(): BelongsTo{
        return $this->belongsTo(Ville::class,'ville');
    }

    public function secteurVille(): BelongsTo{
        return $this->belongsTo(Secteur::class,'secteur','id');
    }

    public function typeMedecin(): BelongsTo{
        return $this->belongsTo(TypeMedecin::class,'type_medecin','id');
    }

    public function potentielMedecin(): BelongsTo{
        return $this->belongsTo(PotentielMedecin::class,'potentiel_medecin','id');
    }

    public function visites(): HasMany{
        return $this->hasMany(Visite::class);
    }
}
