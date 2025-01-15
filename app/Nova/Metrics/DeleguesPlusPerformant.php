<?php

namespace App\Nova\Metrics;

use App\Models\User;
use DateTimeInterface;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\MetricTableRow;
use Laravel\Nova\Metrics\Table;

class DeleguesPlusPerformant extends Table
{
    public $name = "5 Délégués les plus Performants";

    public function calculate(NovaRequest $request): array
    {
        $users = User::withCount('visites')
            ->having('visites_count', '>', 0)
            ->orderByDesc('visites_count')
            ->take(5)
            ->get();

        $rows = [];

        foreach ($users as $user) {
            $rows[] = MetricTableRow::make()
                ->title("Délégué : " . $user->name)
                ->subtitle("Nombre de visites : " . $user->visites_count);
        }

        return $rows;
    }

    public function cacheFor(): DateTimeInterface|null
    {
        // return now()->addMinutes(5);

        return null;
    }
}
