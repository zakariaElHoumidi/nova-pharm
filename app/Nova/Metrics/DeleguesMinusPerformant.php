<?php

namespace App\Nova\Metrics;

use App\Models\User;
use DateTimeInterface;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\MetricTableRow;
use Laravel\Nova\Metrics\Table;

class DeleguesMinusPerformant extends Table
{
    public $name = "5 Délégués les moins Performants";

    public function calculate(NovaRequest $request): array
    {
        $users = User
            ::withCount("visites")
            ->having("visites_count", '>' ,0)
            ->orderBy('visites_count')
            ->take(5)
            ->get();

        $rows = $users->map(function ($user) {
            return MetricTableRow::make()
                ->title("Délégué : " . $user->name)
                ->subtitle("Nombre de visites : " . $user->visites_count);
        });

        return $rows->toArray();
    }

    public function cacheFor(): DateTimeInterface|null
    {
        // return now()->addMinutes(5);

        return null;
    }
}
