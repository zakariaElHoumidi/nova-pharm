<?php

namespace App\Nova;

use App\Models\Secteur;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;

class SecteurResource extends Resource
{
    public static $model = Secteur::class;

    public static $title = 'name';

    public static $search = [
        'name'
    ];

    public static function label() {
        return __('Secteur');
    }

    public function fields(Request $request): array
    {
        return [
            Text::make('Name')
                ->sortable()
                ->rules('nullable'),

            BelongsTo::make('Ville', 'ville', VilleResource::class)
                ->showCreateRelationButton(),

            HasMany::make('Medecins', 'medecins', MediPharmaResource::class)
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
