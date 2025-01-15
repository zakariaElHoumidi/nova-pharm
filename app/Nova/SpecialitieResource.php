<?php

namespace App\Nova;

use App\Models\Specialitie;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;

class SpecialitieResource extends Resource
{
    public static $model = Specialitie::class;

    public static $title = 'name';

    public static $search = [
        'name'
    ];

    public static function label() {
        return __('Specialitie');
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
