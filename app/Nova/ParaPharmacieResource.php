<?php

namespace App\Nova;

use App\Models\ParaPharmacie;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ParaPharmacieResource extends MediPharmaResource
{
    public static $model = ParaPharmacie::class;

    public static function label() {
        return __('Para Pharmacie');
    }

    public function fields(Request $request): array
    {
        $fields = parent::fields($request);

        return $fields;
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
