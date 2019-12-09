<?php

use App\PersonnePhysique;
use Illuminate\Database\Seeder;

class RepresentantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PersonnePhysique::insert([
            'id' => 'd6cb0611-7fbd-4468-ade4-703d2f1676c8',
            'ref' => 'REP0001',
            'nom' => 'Ben Sellam',
            'prenom' => 'Yassine',
            'cine' => 'cine',
            'adresse' => 'tiznit',
            'tel_fixe' => 'tel_fix',
            'tel_mobile' => 'tel_mobile',
            'tel_mobile' => 'tel_mobile',
            'email' => 'b.smartgis@gmail.com',
            'is_represantant' => 1,
            'personne_morale_id' => '157450fe-f500-4135-88b8-01c30a55d2de'
        ]);
    }
}
