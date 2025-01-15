<?php

namespace App\Nova;

use App\Models\Ville;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;

class VilleResource extends Resource
{
    public static $model = Ville::class;

    public static $title = 'name';

    public static $search = [
        'name'
    ];

    public static function label() {
        return __('Ville');
    }

    public function fields(Request $request): array
    {
        return [
            Text::make('Name')
                ->sortable()
                ->rules('required'),

            BelongsTo::make('Region', 'region', RegionResource::class)
                ->showCreateRelationButton(),

            HasMany::make('Secteurs', 'secteurs', SecteurResource::class),
            HasMany::make('Medecins', 'medecins', MediPharmaResource::class),
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
