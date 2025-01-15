<?php

namespace App\Nova;

use App\Models\Pharmacie;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class PharmacieResource extends MediPharmaResource
{
    public static $model = Pharmacie::class;

    public static function label() {
        return __('Pharmacie');
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
