<?php

use App\PersonnePhysique;
use Illuminate\Database\Seeder;

class ReponsableTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PersonnePhysique::insert([
            'id' => '82e73240-0171-4c44-b45b-bd2c392ba4f9',
            'ref' => 'REP0001',
            'nom' => 'Ben Sellam',
            'prenom' => 'Hassan',
            'cine' => 'cine',
            'adresse' => 'tiznit',
            'tel_fixe' => 'tel_fix',
            'tel_mobile' => 'tel_mobile',
            'tel_mobile' => 'tel_mobile',
            'email' => 'b.smartgis@gmail.com',
            'is_represantant' => 0,
            'service_id' => '1501fa77-140c-4840-add8-fa410323143c'
        ]);
    }
}
