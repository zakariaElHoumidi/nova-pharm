<?php

namespace App\Nova\Metrics;

use App\Models\Ville;
use DateTimeInterface;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\MetricTableRow;
use Laravel\Nova\Metrics\Table;

class VillesMinusPerformant extends Table
{
    public $name = "5 Villes les moins Performants";

    public function calculate(NovaRequest $request): array
    {
        $villes = Ville
            ::withCount("visites")
            ->having("visites_count", '>' ,0)
            ->orderBy('visites_count')
            ->take(5)
            ->get();

        $rows = $villes->map(function ($ville) {
            return MetricTableRow::make()
                ->title("Ville : " . $ville->name)
                ->subtitle("Nombre de visites : " . $ville->visites_count);
        });

        return $rows->toArray();
    }

    public function cacheFor(): DateTimeInterface|null
    {
        // return now()->addMinutes(5);

        return null;
    }
}
