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
    }
}
