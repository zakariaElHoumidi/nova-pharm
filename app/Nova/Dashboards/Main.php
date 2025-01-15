<?php

namespace App\Nova\Dashboards;

use App\Nova\Metrics\DeleguesMinusPerformant;
use App\Nova\Metrics\DeleguesPlusPerformant;
use App\Nova\Metrics\DelegueTaux;
use App\Nova\Metrics\DeleguésPlusPerformant;
use App\Nova\Metrics\MedecinVisite;
use App\Nova\Metrics\VillesMinusPerformant;
use App\Nova\Metrics\VillesPlusPerformant;
use Laravel\Nova\Cards\Help;
use Laravel\Nova\Dashboards\Main as Dashboard;

class Main extends Dashboard
{
    public function cards(): array
    {
        return [
            new DelegueTaux,
            new MedecinVisite,
            new DeleguesPlusPerformant,
            new DeleguesMinusPerformant,
            new VillesPlusPerformant,
            new VillesMinusPerformant
        ];
    }
}
