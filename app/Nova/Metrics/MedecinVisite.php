<?php

namespace App\Nova\Metrics;

use App\Models\Medecin;
use App\Models\ParaPharmacie;
use App\Models\Pharmacie;
use App\Models\Visite;
use Carbon\Carbon;
use DateTimeInterface;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\Value;
use Laravel\Nova\Metrics\ValueResult;

class MedecinVisite extends Value
{
    public $name = 'Nombre Médecin non visités';

    public function calculate(NovaRequest $request): ValueResult
    {
        $previousWeeks = Carbon
            ::now()
            ->subWeeks(config('nombre_semaines_precedentes') ?? 4);

        $range = $request->get('range');

        if ($range === 'MEDECIN') {
            $medecin_non_visiter_count = Medecin
                ::doesntHave('visites')
                ->count();
        } elseif ($range === 'PHARMACIE') {
            $medecin_non_visiter_count = Pharmacie
                ::doesntHave('visites')
                ->count();
        } elseif ($range === 'PARAPHARMACIE') {
            $medecin_non_visiter_count = ParaPharmacie
                ::doesntHave('visites')
                ->count();
        }

        return $this->result($medecin_non_visiter_count);
    }

    public function ranges(): array
    {
        return [
            'MEDECIN' => 'Medecin',
            'PHARMACIE' => 'Pharmacie',
            'PARAPHARMACIE' => 'Para Pharmacie',
        ];
    }

    public function cacheFor(): DateTimeInterface|null
    {
        // return now()->addMinutes(5);

        return null;
    }
}
