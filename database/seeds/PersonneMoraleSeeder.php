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
        $smartgis = new PersonneMorale();
        $smartgis->ref = "ref_smartGis";
        $smartgis->raison_social = "smartGIS";
        $smartgis->rc = "RC smartGIS";
        $smartgis->adresse = "av My Abdellah Marrakech";
        $smartgis->tel_fix = "tel fix";
        $smartgis->tel_mobile = "tel mobile";
        $smartgis->fax = "fax";
        $smartgis->email = "email";
        $smartgis->save();


        $ministere = new PersonneMorale();
        $ministere->ref = "ref_2";
        $ministere->raison_social = "";
        $ministere->rc = "";
        $ministere->adresse = "";
        $ministere->tel_fix = "tel fix2";
        $ministere->tel_mobile = "tel mobile2";
        $ministere->fax = "fax2";
        $ministere->email = "email2";
        $ministere->save();


        $personne_morale3 = new PersonneMorale();
        $personne_morale3->ref = "ref_2";
        $personne_morale3->raison_social = "raison personne morale 3";
        $personne_morale3->rc = "rc personne morale 3";
        $personne_morale3->adresse = "adresse personne morale 3";
        $personne_morale3->tel_fix = "tel fix3";
        $personne_morale3->tel_mobile = "tel mobile3";
        $personne_morale3->fax = "fax3";
        $personne_morale3->email = "email3";
        $personne_morale3->save();


        // PersonneMorale::insert([
        //     'id' => '157450fe-f500-4135-88b8-01c30a55d2de',
        //     'ref' => 'PM0001',
        //     'raison_social' => 'raison_social',
        //     'rc' => 'rc',
        //     'adresse' => 'Marrakech',
        //     'tel_fix' => 'tel_fix',
        //     'tel_mobile' => 'tel_mobile',
        //     'tel_mobile' => 'tel_mobile',
        //     'fax' => 'fax',
        //     'email' => 'email'
        // ]);
    }
}
