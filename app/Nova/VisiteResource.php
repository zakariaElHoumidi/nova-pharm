<?php

namespace App\Nova;

use App\Models\Visite;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;

class VisiteResource extends Resource
{
    public static $model = Visite::class;

    public static $title = 'id';

    public static $search = [
        'cancel_position_geo', 'end_position_geo', 'end_note', 'end_photos', 'reporter_position_geo', 'reporter_note', 'etat'
    ];

    public static function label() {
        return __('Visite');
    }
    public function fields(Request $request): array
    {
        return [
            Date::make('Date')
                ->sortable()
                ->rules('nullable', 'date'),

            Date::make('Start Date')
                ->sortable()
                ->rules('nullable', 'date'),

            Markdown::make('Start Position Geo')
                ->sortable()
                ->rules('nullable'),

            Date::make('Cancel Date')
                ->sortable()
                ->rules('nullable', 'date'),

            Markdown::make('Cancel Position Geo')
                ->sortable()
                ->rules('nullable'),

            Date::make('End Date')
                ->sortable()
                ->rules('nullable', 'date'),

            Markdown::make('End Position Geo')
                ->sortable()
                ->rules('nullable'),

            Textarea::make('End Note')
                ->sortable()
                ->rules('nullable'),

            File::make('End Photos')
                ->sortable()
                ->rules('nullable'),

            Date::make('Reporter Date')
                ->sortable()
                ->rules('nullable', 'date'),

            Markdown::make('Reporter Position Geo')
                ->sortable()
                ->rules('nullable'),

            Textarea::make('Reporter Note')
                ->sortable()
                ->rules('nullable'),

            Date::make('Reporter Next Date')
                ->sortable()
                ->rules('nullable', 'date'),

            Boolean::make('Etat')
                ->sortable()
                ->rules('required'),

            BelongsTo::make('User', 'user', User::class)
                ->showCreateRelationButton(),

            BelongsTo::make('Ville', 'ville', VilleResource::class)
                ->showCreateRelationButton(),

            BelongsTo::make('Medecin', 'medecin', MedecinResource::class)
                ->showCreateRelationButton(),

            BelongsTo::make('Pharmacie', 'pharmacie', PharmacieResource::class)
                ->showCreateRelationButton(),

            BelongsTo::make('Para Pharmacie', 'para_pharmacie', ParaPharmacieResource::class)
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
