<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['id' => 1, 'name' => 'TANGER & RÉGIONS', 'created_at' => '2022-05-20 12:50:33', 'updated_at' => '2022-05-20 12:50:33'],
            ['id' => 2, 'name' => 'OUJDA & RÉGIONS', 'created_at' => '2022-05-20 12:50:45', 'updated_at' => '2022-05-20 12:50:45'],
            ['id' => 3, 'name' => 'FES & RÉGIONS', 'created_at' => '2022-05-20 12:50:54', 'updated_at' => '2022-05-20 12:50:54'],
            ['id' => 4, 'name' => 'BENI MELLAL & RÉGIONS', 'created_at' => '2022-05-20 12:51:14', 'updated_at' => '2022-05-20 12:51:14'],
            ['id' => 5, 'name' => 'RABAT & RÉGIONS', 'created_at' => '2022-05-20 12:51:36', 'updated_at' => '2022-05-20 12:51:36'],
            ['id' => 6, 'name' => 'CASABLANCA & RÉGIONS', 'created_at' => '2022-05-20 12:51:44', 'updated_at' => '2022-05-20 12:51:44'],
            ['id' => 7, 'name' => 'MARRAKECH & RÉGIONS', 'created_at' => '2022-05-20 12:51:52', 'updated_at' => '2022-05-20 12:51:52'],
            ['id' => 8, 'name' => 'SOUSS-MASSA', 'created_at' => '2022-05-20 12:51:59', 'updated_at' => '2022-05-20 12:51:59'],
            ['id' => 9, 'name' => 'DRAA & RÉGIONS', 'created_at' => '2022-05-20 12:52:06', 'updated_at' => '2022-05-20 12:52:06'],
            ['id' => 10, 'name' => 'GUELMIM & RÉGIONS', 'created_at' => '2022-05-20 12:52:13', 'updated_at' => '2022-05-20 12:52:13'],
            ['id' => 11, 'name' => 'LAAYOUNE & RÉGIONS', 'created_at' => '2022-05-20 12:52:18', 'updated_at' => '2022-05-20 12:52:18'],
            ['id' => 12, 'name' => 'DAKHLA & RÉGIONS', 'created_at' => '2022-05-20 12:52:27', 'updated_at' => '2022-05-20 12:52:27'],
        ];

        DB::table('regions')->insert($data);
    }
}
