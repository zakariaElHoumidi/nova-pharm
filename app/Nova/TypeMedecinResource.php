<?php

namespace App\Nova;

use App\Models\TypeMedecin;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;

class TypeMedecinResource extends Resource
{
    public static $model = TypeMedecin::class;

    public static $title = 'name';

    public static $search = [
        'name'
    ];

    public static function label() {
        return __('Type Medecin');
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
