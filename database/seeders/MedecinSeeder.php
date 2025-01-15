<?php

namespace Database\Seeders;

use App\Models\Medecin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedecinSeeder extends Seeder
{
    public function run(): void
    {

        $data = [
            [
                'user_id' => 9,
                'administrateur_id' => 1,
                'speciality' => NULL,
                'nom' => 'BENABDERRAZIK',
                'prenom' => 'MOHAMED ALI',
                'adresse' => '96, avenue du 2 Mars, rés Walili, imm. A 2°étage',
                'ville_id' => 10,
                'latitude' => '33.5762453',
                'longitude' => '-7.6156917',
                'emails' => json_encode(['.']),
                'photos' => json_encode(['public/storage/medecins/zakariae-benachour2022-06-13-13-07-02-974981.jpg']),
                'created_at' => '2022-06-13 11:06:48',
                'updated_at' => '2023-11-04 08:29:05',
            ],
            [
                'user_id' => 9,
                'administrateur_id' => 1,
                'speciality' => NULL,
                'nom' => 'BENABDERRAZIK',
                'prenom' => 'MOHAMED ALI',
                'adresse' => '96, avenue du 2 Mars, rés Walili, imm. A 2°étage',
                'ville_id' => 10,
                'latitude' => '33.5762453',
                'longitude' => '-7.6156917',
                'emails' => json_encode(['.']),
                'photos' => json_encode(['public/storage/medecins/zakariae-benachour2022-06-13-13-07-02-974981.jpg']),
                'created_at' => '2022-06-13 11:06:48',
                'updated_at' => '2023-11-04 08:29:05',
            ],
            [
                'user_id' => 9,
                'administrateur_id' => 1,
                'speciality' => NULL,
                'nom' => 'BENABDERRAZIK',
                'prenom' => 'MOHAMED ALI',
                'adresse' => '96, avenue du 2 Mars, rés Walili, imm. A 2°étage',
                'ville_id' => 10,
                'latitude' => '33.5762453',
                'longitude' => '-7.6156917',
                'emails' => json_encode(['.']),
                'photos' => json_encode(['public/storage/medecins/zakariae-benachour2022-06-13-13-07-02-974981.jpg']),
                'created_at' => '2022-06-13 11:06:48',
                'updated_at' => '2023-11-04 08:29:05',
            ],
            [
                'user_id' => 9,
                'administrateur_id' => 1,
                'speciality' => NULL,
                'nom' => 'BENABDERRAZIK',
                'prenom' => 'MOHAMED ALI',
                'adresse' => '96, avenue du 2 Mars, rés Walili, imm. A 2°étage',
                'ville_id' => 10,
                'latitude' => '33.5762453',
                'longitude' => '-7.6156917',
                'emails' => json_encode(['.']),
                'photos' => json_encode(['public/storage/medecins/zakariae-benachour2022-06-13-13-07-02-974981.jpg']),
                'created_at' => '2022-06-13 11:06:48',
                'updated_at' => '2023-11-04 08:29:05',
            ],
            [
                'user_id' => 9,
                'administrateur_id' => 1,
                'speciality' => NULL,
                'nom' => 'BENABDERRAZIK',
                'prenom' => 'MOHAMED ALI',
                'adresse' => '96, avenue du 2 Mars, rés Walili, imm. A 2°étage',
                'ville_id' => 10,
                'latitude' => '33.5762453',
                'longitude' => '-7.6156917',
                'emails' => json_encode(['.']),
                'photos' => json_encode(['public/storage/medecins/zakariae-benachour2022-06-13-13-07-02-974981.jpg']),
                'created_at' => '2022-06-13 11:06:48',
                'updated_at' => '2023-11-04 08:29:05',
            ],
            [
                'user_id' => 9,
                'administrateur_id' => 1,
                'speciality' => NULL,
                'nom' => 'BENABDERRAZIK',
                'prenom' => 'MOHAMED ALI',
                'adresse' => '96, avenue du 2 Mars, rés Walili, imm. A 2°étage',
                'ville_id' => 10,
                'latitude' => '33.5762453',
                'longitude' => '-7.6156917',
                'emails' => json_encode(['.']),
                'photos' => json_encode(['public/storage/medecins/zakariae-benachour2022-06-13-13-07-02-974981.jpg']),
                'created_at' => '2022-06-13 11:06:48',
                'updated_at' => '2023-11-04 08:29:05',
            ],
            [
                'user_id' => 9,
                'administrateur_id' => 1,
                'speciality' => NULL,
                'nom' => 'BENABDERRAZIK',
                'prenom' => 'MOHAMED ALI',
                'adresse' => '96, avenue du 2 Mars, rés Walili, imm. A 2°étage',
                'ville_id' => 10,
                'latitude' => '33.5762453',
                'longitude' => '-7.6156917',
                'emails' => json_encode(['.']),
                'photos' => json_encode(['public/storage/medecins/zakariae-benachour2022-06-13-13-07-02-974981.jpg']),
                'created_at' => '2022-06-13 11:06:48',
                'updated_at' => '2023-11-04 08:29:05',
            ],
        ];

        DB::table('medecins')->insert($data);
    }
}
