<?php

namespace App\Nova;

use App\Models\Medecin;
use App\Models\MediPharma;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use App\Nova\User as UserResource;

class MediPharmaResource extends Resource
{
    public static $model = MediPharma::class;

    public static $title = 'nom';

    public static $search = [
        'nom', 'prenom'
    ];

    public function fields(Request $request): array
    {
        return [
            Text::make('Nom', 'nom')
                ->sortable()
                ->rules('nullable'),

            Text::make('Prenom', 'prenom')
                ->sortable()
                ->rules('nullable'),

            Text::make('Adresse', 'adresse')
                ->sortable()
                ->rules('nullable'),

            Text::make('Latitude', 'latitude')
                ->sortable()
                ->rules('nullable'),

            Text::make('Longitude', 'longitude')
                ->sortable()
                ->rules('nullable'),

            Text::make('Phones', 'phones')
                ->sortable()
                ->rules('nullable'),

            Text::make('Emails', 'emails')
                ->sortable()
                ->rules('nullable'),

            File::make('Photos', 'photos')
                ->rules('nullable'),

            Boolean::make('Etat', 'etat'),

            BelongsTo::make('User', 'user', UserResource::class)
                ->showCreateRelationButton(),

            BelongsTo::make('Admin', 'administrateur', AdministrateurResource::class)
                ->showCreateRelationButton(),

            BelongsTo::make('Ville', 'city', VilleResource::class)
                ->showCreateRelationButton(),

            BelongsTo::make('Secteur Ville', 'secteurVille', SecteurResource::class)
                ->showCreateRelationButton(),

            BelongsTo::make('Type de Médecin', 'typeMedecin', TypeMedecinResource::class)
                ->showCreateRelationButton(),

            BelongsTo::make('Potentiel de Médecin', 'potentielMedecin', PotentielMedecinResource::class)
                ->showCreateRelationButton(),

            BelongsToMany::make('Specialities', 'specialities', SpecialitieResource::class),

            HasMany::make('Visites', 'visites', VisiteResource::class)
        ];
    }

    public function cards(Request $request): array
    {
        return [];
    }

    public function filters(Request $request): array
    {
        return [];
    }

    public function lenses(Request $request): array
    {
        return [];
    }

    public function actions(Request $request): array
    {
        return [];
    }
}
