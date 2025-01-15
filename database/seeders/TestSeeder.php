<?php

namespace Database\Seeders;

use App\Models\PotentielMedecin;
use App\Models\Region;
use App\Models\Secteur;
use App\Models\TypeMedecin;
use App\Models\User;
use App\Models\Ville;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TestSeeder extends Seeder
{
    public function run(): void
    {
        TypeMedecin::create([
            'name' => 'typemedecin',
        ]);

        PotentielMedecin::create([
            'name' => 'po'
        ]);
    }
}
