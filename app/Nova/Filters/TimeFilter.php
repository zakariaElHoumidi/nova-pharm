<?php

namespace App\Nova\Filters;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Laravel\Nova\Filters\DateFilter;
use Laravel\Nova\Http\Requests\NovaRequest;

class TimeFilter extends DateFilter
{
    public $name = "Created At";

    public function apply(NovaRequest $request, Builder $query, mixed $value): Builder
    {
        $dateValue = Carbon::parse($value);

        return $query->whereDate('created_at', '>=', $dateValue);
    }
}
