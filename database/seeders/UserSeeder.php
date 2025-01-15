<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $data =  [
            [
            'id' => 9,
            'name' => 'ZAKARIAE BENACHOUR',
            'email' => 'zakariae.xpharm@gmail.com',
            'username' => 'ZAKARIAE',
            'cin' => 'F415940',
            'phone' => '0699013586',
            'photo' => 'public/storage/users//logo xpharm 2-01.png',
            'date_embauche' => '2021-01-01',
            'date_naissance' => '1990-01-12',
            'ville_id' => NULL,
            'secteur_id' => NULL,
            'add_medecin_permision' => 0,
            'listing_permision' => 0,
            'email_verified_at' => NULL,
            'password' => '$2y$10$/7LtyxrF1mcRbgiE2WM9MOQe1WoR0ZniGxR3mEM67hVPJ0rVL0lJ6',
            'remember_token' => NULL,
            'created_at' => '2022-06-12 09:55:06',
            'updated_at' => '2023-10-03 07:19:43',
        ],
            [
                'id' => 10,
                'name' => 'SABRINE SABIRI',
                'email' => 'sabrine.xpharm@gmail.com',
                'username' => 'SABRINE',
                'cin' => 'BH472955',
                'phone' => '0616103540',
                'photo' => 'public/storage/users//2bda90a3d6977e27d8162bcc3776b35c.png',
                'date_embauche' => '2018-11-01',
                'date_naissance' => '1996-01-20',
                'ville_id' => NULL,
                'secteur_id' => NULL,
                'add_medecin_permision' => 1,
                'listing_permision' => 1,
                'email_verified_at' => NULL,
                'password' => '$2y$10$J3HUBcDrq2/HWJBQZ2/puenaaBqR2bS4DM7mbZ0/bDFbRU8NFRkLO',
                'remember_token' => NULL,
                'created_at' => '2022-06-12 10:01:20',
                'updated_at' => '2023-10-20 07:08:54',
            ],
            [
                'id' => 11,
                'name' => 'LAILA OSMAN',
                'email' => 'laila.xpharm@gmail.com',
                'username' => 'LAILA',
                'cin' => 'BB75532',
                'phone' => '0649910910',
                'photo' => 'public/storage/users//4c8085bf81d2432daeb47f4cb51758a4.png',
                'date_embauche' => '2022-04-01',
                'date_naissance' => '1984-10-05',
                'ville_id' => NULL,
                'secteur_id' => NULL,
                'add_medecin_permision' => 1,
                'listing_permision' => 1,
                'email_verified_at' => NULL,
                'password' => '$2y$10$KDuwqGtdSNxv8u14WConduXmnuXKwVpkp/vT4Kk6MnpBqKY7Lzmbe',
                'remember_token' => NULL,
                'created_at' => '2022-06-12 10:06:31',
                'updated_at' => '2022-06-12 10:19:34',
            ],
            [
                'id' => 12,
                'name' => 'ADMINISTRATEUR',
                'email' => 'xpharm.maroc@gmail.com',
                'username' => 'ADMINISTRATEUR',
                'cin' => 'T100100',
                'phone' => '0649207920',
                'photo' => 'public/storage/users//6fef7ddff1751ade359e391539750bd5.png',
                'date_embauche' => '2017-01-01',
                'date_naissance' => '1973-01-01',
                'ville_id' => NULL,
                'secteur_id' => NULL,
                'add_medecin_permision' => 1,
                'listing_permision' => 1,
                'email_verified_at' => NULL,
                'password' => '$2y$10$uJ9mrZp/31JJMDkmfcu1Vu14IBKZig1mj80.8NQWeBjx.LNBXRB1S',
                'remember_token' => NULL,
                'created_at' => '2022-06-13 12:56:09',
                'updated_at' => '2022-06-29 12:23:47',
            ],
            [
                'id' => 14,
                'name' => 'teste almisbha',
                'email' => 'almisbah@almisbah.ma',
                'username' => 'almisbah',
                'cin' => 'BH476671000',
                'phone' => '0607821755',
                'photo' => 'public/storage/users//c59e16f21c98bea28aa5528743194663.png',
                'date_embauche' => '2022-07-25',
                'date_naissance' => '2022-07-25',
                'ville_id' => NULL,
                'secteur_id' => NULL,
                'add_medecin_permision' => 1,
                'listing_permision' => 1,
                'email_verified_at' => NULL,
                'password' => '$2y$10$NlPgVm91KTb7Xo1FwVQO7.ihDrI3/bcQINPfmV0/x/YzSm6sWuVtm',
                'remember_token' => NULL,
                'created_at' => '2022-07-25 15:26:27',
                'updated_at' => '2024-09-25 12:51:21',
            ]
        ];

        DB::table('users')->insert($data);
    }
}
