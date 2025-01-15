<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Administrateur;
use App\Models\Region;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RegionSeeder::class,
            VilleSeeder::class,
            SecteurSeeder::class,
            MedecinSeeder::class,
            PharmacieSeeder::class,
            ParaPharmacieSeeder::class,
            UserSeeder::class,
            TestSeeder::class,
            VisiteSeeder::class,
        ]);

        Administrateur::create([
            'name' => 'admin',
            'email' => 'admin@admin',
            'password' => Hash::make('admin@admin'),
        ]);
    }
}
