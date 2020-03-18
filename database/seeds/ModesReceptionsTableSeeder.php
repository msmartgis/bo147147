<?php

use App\ModeReception;
use Illuminate\Database\Seeder;

class ModesReceptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // $main_propre = new ModeReception();
        // $main_propre->nom = "Main propre";
        // $main_propre->save();

        // $courrier = new ModeReception();
        // $courrier->nom = "Courrier";
        // $courrier->save();

        // $fax = new ModeReception();
        // $fax->nom = "Fax";
        // $fax->save();

        // $autre = new ModeReception();
        // $autre->nom = "Autre";
        // $autre->save();



        $main_propre_ar = new ModeReception();
        $main_propre_ar->nom = "مباشرة";
        $main_propre_ar->save();

        $courrier_ar = new ModeReception();
        $courrier_ar->nom = "بريد";
        $courrier_ar->save();

        $fax_ar = new ModeReception();
        $fax_ar->nom = "فاكس";
        $fax_ar->save();

        $autre_ar = new ModeReception();
        $autre_ar->nom = "اخر";
        $autre_ar->save();
    }
}
