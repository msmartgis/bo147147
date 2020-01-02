<?php

use App\PersonneMorale;
use App\PersonnePhysique;
use App\Service;
use Illuminate\Database\Seeder;

class PersonnePhysiqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $smartgis = PersonneMorale::where('raison_social', 'smartGIS')->first();
        $service = Service::where('ref', 'S0001')->first();

        $mohamed = new PersonnePhysique();
        $mohamed->ref = "ref_1";
        $mohamed->nom = "El hanine";
        $mohamed->prenom = "Mohamed";
        $mohamed->cine = "jh2255";
        $mohamed->adresse = "adresse mohamed";
        $mohamed->tel_fixe = "tel fix";
        $mohamed->tel_mobile = "tel mobile";
        $mohamed->email = "email";
        $mohamed->is_represantant = 0;
        $mohamed->role_en_entreprise = "";
        $mohamed->save();



        $hassan = new PersonnePhysique();
        $hassan->ref = "ref_2";
        $hassan->nom = "Ben sellam";
        $hassan->prenom = "Hassan";
        $hassan->cine = "dddf";
        $hassan->adresse = "adresse hassan";
        $hassan->tel_fixe = "tel fix";
        $hassan->tel_mobile = "tel mobile";
        $hassan->email = "email2";
        $hassan->is_represantant = 1;
        $hassan->role_en_entreprise = "gerant";
        $hassan->personne_morale_id = $smartgis->id;
        $hassan->save();



        $responsable_service = new PersonnePhysique();
        $responsable_service->ref = "ref_3";
        $responsable_service->nom = "Chawki";
        $responsable_service->prenom = "Mohamed";
        $responsable_service->cine = "dddddcf";
        $responsable_service->adresse = "adresse chawki";
        $responsable_service->tel_fixe = "tel fix";
        $responsable_service->tel_mobile = "tel mobile";
        $responsable_service->email = "email2";
        $responsable_service->is_represantant = 0;
        $responsable_service->service_id = $service->id;
        $responsable_service->save();
    }
}
