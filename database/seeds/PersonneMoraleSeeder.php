<?php

use App\PersonneMorale;
use Illuminate\Database\Seeder;

class PersonneMoraleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PersonneMorale::insert([
            'id' => '157450fe-f500-4135-88b8-01c30a55d2de',
            'ref' => 'PM0001',
            'raison_social' => 'raison_social',
            'rc' => 'rc',
            'adresse' => 'Marrakech',
            'tel_fix' => 'tel_fix',
            'tel_mobile' => 'tel_mobile',
            'tel_mobile' => 'tel_mobile',
            'fax' => 'fax',
            'email' => 'email'
        ]);
    }
}
