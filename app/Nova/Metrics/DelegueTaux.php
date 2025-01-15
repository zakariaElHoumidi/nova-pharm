<?php

namespace App\Nova\Metrics;

use App\Models\User;
use App\Models\Visite;
use Carbon\Carbon;
use DateTimeInterface;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\Value;
use Laravel\Nova\Metrics\ValueResult;
use Laravel\Nova\Nova;

class DelegueTaux extends Value
{
    /**
     * Calculate the value of the metric.
     */
    public $name = "Taux de couverture global";

    public function calculate(NovaRequest $request): ValueResult
    {
        $range = $request->range;

        if ($range === 'global') {
            $previousMonth = Carbon::now()
                ->subMonth();
            $visites = Visite::whereYear('date', '=', $previousMonth->year)
                ->whereMonth('date', '=', $previousMonth->month)
                ->get();

            $result = $visites->count() > 0
                ? round(($visites->where('etat', Visite::_END_)->count() * 100) / $visites->count(), 2)
                : 0;
        } elseif ($range === 'current_week') {
            $visites_this_week = Visite::whereBetween('date', [
                Carbon::now()->startOfWeek(),
                Carbon::now()
            ])->get();

            $result = $visites_this_week->count() > 0
                ? round(($visites_this_week->where('etat', Visite::_END_)->count() * 100) / $visites_this_week->count(), 2)
                : 0;
        }
        return $this->result($result);
    }

    public function ranges(): array
    {
        return [
            'global' => 'Global ',
            'current_week' => 'Current Week',
        ];
    }

    /**
     * Determine the amount of time the results of the metric should be cached.
     */
    public function cacheFor(): DateTimeInterface|null
    {
        // return now()->addMinutes(5);

        return null;
    }
}
