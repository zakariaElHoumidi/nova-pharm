<?php

namespace Database\Seeders;

use App\Models\Secteur;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SecteurSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['id' => 1, 'ville_id' => 68, 'name' => 'RABAT AGDAL', 'created_at' => '2022-05-20 13:24:12', 'updated_at' => '2022-05-20 13:24:12'],
            ['id' => 2, 'ville_id' => 68, 'name' => 'RABAT CYM', 'created_at' => '2022-05-20 13:25:36', 'updated_at' => '2022-05-20 13:25:36'],
            ['id' => 3, 'ville_id' => 68, 'name' => 'RABAT TAKKADDOUM', 'created_at' => '2022-05-20 13:25:55', 'updated_at' => '2022-05-20 13:25:55'],
            ['id' => 4, 'ville_id' => 90, 'name' => 'HAY HASSANI', 'created_at' => '2022-05-20 13:50:05', 'updated_at' => '2022-05-20 13:50:05'],
            ['id' => 5, 'ville_id' => 90, 'name' => 'HAY MOHAMMAD/SIDI MOUMEN', 'created_at' => '2022-05-20 13:50:16', 'updated_at' => '2022-05-20 13:50:16'],
            ['id' => 6, 'ville_id' => 90, 'name' => 'SIDI BERNOUSSI / ZENATA', 'created_at' => '2022-05-20 13:50:30', 'updated_at' => '2022-05-30 13:31:26'],
            ['id' => 7, 'ville_id' => 90, 'name' => 'SIDI OTHMANE', 'created_at' => '2022-05-20 13:50:41', 'updated_at' => '2022-05-20 13:50:41'],
            ['id' => 8, 'ville_id' => 90, 'name' => 'AIN CHOK', 'created_at' => '2022-05-20 13:50:53', 'updated_at' => '2022-05-20 13:50:53'],
            ['id' => 9, 'ville_id' => 90, 'name' => 'SIDI BELYOUT', 'created_at' => '2022-05-20 13:51:04', 'updated_at' => '2022-05-20 13:51:04'],
            ['id' => 10, 'ville_id' => 90, 'name' => 'CASA ANFA', 'created_at' => '2022-05-20 13:51:14', 'updated_at' => '2022-05-20 13:51:14'],
            ['id' => 11, 'ville_id' => 90, 'name' => 'SEBATA', 'created_at' => '2022-05-20 13:51:23', 'updated_at' => '2022-05-20 13:51:23'],
            ['id' => 12, 'ville_id' => 90, 'name' => 'AIN SEBAA', 'created_at' => '2022-05-20 13:51:36', 'updated_at' => '2022-05-20 13:51:36'],
            ['id' => 13, 'ville_id' => 90, 'name' => 'MOULAY RACHID', 'created_at' => '2022-05-20 13:51:46', 'updated_at' => '2022-05-20 13:51:46'],
            ['id' => 14, 'ville_id' => 90, 'name' => 'BOUCHENTOUF', 'created_at' => '2022-05-20 13:51:57', 'updated_at' => '2022-05-20 13:51:57'],
            ['id' => 15, 'ville_id' => 90, 'name' => 'ROCHES NOIRES', 'created_at' => '2022-05-20 13:52:10', 'updated_at' => '2022-05-20 13:52:10'],
            ['id' => 16, 'ville_id' => 90, 'name' => 'EL FIDA', 'created_at' => '2022-05-20 13:52:20', 'updated_at' => '2022-05-20 13:52:20'],
            ['id' => 17, 'ville_id' => 90, 'name' => 'AL IDRISSIA', 'created_at' => '2022-05-20 13:52:32', 'updated_at' => '2022-05-20 13:52:32'],
            ['id' => 18, 'ville_id' => 90, 'name' => 'BEN M SIK', 'created_at' => '2022-05-20 13:52:42', 'updated_at' => '2022-05-20 13:52:42'],
            ['id' => 19, 'ville_id' => 90, 'name' => 'TOUARGA / MERS SOLTANE', 'created_at' => '2022-05-20 13:52:52', 'updated_at' => '2022-05-20 13:52:52'],
            ['id' => 20, 'ville_id' => 90, 'name' => 'MOULAY YOUSSEF', 'created_at' => '2022-05-20 13:53:01', 'updated_at' => '2022-05-20 13:53:01'],
            ['id' => 132, 'ville_id' => 81, 'name' => 'TÉMARA', 'created_at' => '2023-02-17 11:40:56', 'updated_at' => '2023-02-17 11:40:56']
        ];

        DB::table('secteurs')->insert($data);
    }
}
