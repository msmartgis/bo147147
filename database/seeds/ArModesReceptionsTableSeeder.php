<?php

use App\ModeReception;
use Illuminate\Database\Seeder;

class ArModesReceptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $main_propre_ar = new ModeReception();
        $main_propre_ar->nom = "مباشرة";
        $main_propre_ar->lang = "ar";
        $main_propre_ar->save();

        $courrier_ar = new ModeReception();
        $courrier_ar->nom = "بريد";
        $courrier_ar->lang = "ar";
        $courrier_ar->save();

        $fax_ar = new ModeReception();
        $fax_ar->nom = "فاكس";
        $fax_ar->lang = "ar";
        $fax_ar->save();

        $autre_ar = new ModeReception();
        $autre_ar->nom = "اخر";
        $fax_ar->lang = "ar";
        $autre_ar->save();
    }
}
