<?php

namespace App\Nova;

use App\Models\Historique;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use App\Nova\User as UserResource;

class HistoriqueResource extends Resource
{
    public static $model = Historique::class;

    public static $title = 'lat';

    public static $search = [
        'lat', 'lon', 'text'
    ];

    public static function label() {
        return __('Historique');
    }

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),

            Text::make('Lat')
                ->sortable()
                ->rules('nullable'),

            Text::make('Lon')
                ->sortable()
                ->rules('nullable'),

            Text::make('Text')
                ->sortable()
                ->rules('nullable'),

            BelongsTo::make('User', 'user', UserResource::class)
                ->showCreateRelationButton(),
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
