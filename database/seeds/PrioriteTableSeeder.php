<?php

use App\Priorite;
use Illuminate\Database\Seeder;

class PrioriteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $normale = new Priorite();
        $normale->nom = "Normal";
        $normale->description = "Le courrier n a pas une priorite speciale";
        $normale->save();


        $urgent = new Priorite();
        $urgent->nom = "Urgent";
        $urgent->description = "Le traitement de courrier est urgent";
        $urgent->save();


        $tres_urgent = new Priorite();
        $tres_urgent->nom = "Très Urgent";
        $tres_urgent->description = "Le traitement de courrier est très urgent";
        $tres_urgent->save();


        //ar 
        $normale_ar = new Priorite();
        $normale_ar->nom = "عادية";
        $normale_ar->description = "Le courrier n a pas une priorite speciale";
        $normale_ar->lang = "ar";
        $normale_ar->save();


        $urgent_ar = new Priorite();
        $urgent_ar->nom = "عاجلة";
        $urgent_ar->description = "Le traitement de courrier est urgent";
        $urgent_ar->lang = "ar";
        $urgent_ar->save();


        $tres_urgent_ar = new Priorite();
        $tres_urgent_ar->nom = "عاجلة جدا";
        $tres_urgent_ar->description = "Le traitement de courrier est très urgent";
        $tres_urgent_ar->lang = "ar";
        $tres_urgent_ar->save();
    }
}
