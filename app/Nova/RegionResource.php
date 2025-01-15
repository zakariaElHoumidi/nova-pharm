<?php

namespace App\Nova;

use App\Models\Region;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;

class RegionResource extends Resource
{
    public static $model = Region::class;

    public static $title = 'name';

    public static $search = [
        'name'
    ];

    public static function label() {
        return __('Region');
    }

    public function fields(Request $request): array
    {
        return [
            Text::make('Name')
                ->sortable()
                ->rules('required'),

            HasMany::make('Villes', 'villes', VilleResource::class)
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
