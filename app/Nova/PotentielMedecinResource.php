<?php

namespace App\Nova;

use App\Models\PotentielMedecin;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;

class PotentielMedecinResource extends Resource
{
    public static $model = PotentielMedecin::class;

    public static $title = 'name';

    public static $search = [
        'name'
    ];

    public static function label() {
        return __('Potentiel medecin');
    }

    public function fields(Request $request): array
    {
        return [
            Text::make('Name')
                ->sortable()
                ->rules('required'),
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
