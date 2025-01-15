<?php

namespace App\Nova\Metrics;

use App\Models\Ville;
use DateTimeInterface;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\MetricTableRow;
use Laravel\Nova\Metrics\Table;

class VillesPlusPerformant extends Table
{
    public function calculate(NovaRequest $request): array
    {
        $villes = Ville::withCount('visites')
            ->having('visites_count', '>', 0)
            ->orderByDesc('visites_count')
            ->take(5)
            ->get();

        $rows = [];

        foreach ($villes as $ville) {
            $rows[] = MetricTableRow::make()
                ->title("Ville : " . $ville->name)
                ->subtitle("Nombre de visites : " . $ville->visites_count);
        }

        return $rows;
    }

    public function cacheFor(): DateTimeInterface|null
    {
        // return now()->addMinutes(5);

        return null;
    }
}
