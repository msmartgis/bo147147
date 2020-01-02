<?php

use App\NatureDiffusion;
use Illuminate\Database\Seeder;

class NatureDiffusionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nature_diff_1 = new NatureDiffusion();
        $nature_diff_1->nom = "ND 001";
        $nature_diff_1->save();

        $nature_diff_2 = new NatureDiffusion();
        $nature_diff_2->nom = "ND 002";
        $nature_diff_2->save();

        $nature_diff_3 = new NatureDiffusion();
        $nature_diff_3->nom = "ND 003";
        $nature_diff_3->save();

        $nature_diff_4 = new NatureDiffusion();
        $nature_diff_4->nom = "ND 004";
        $nature_diff_4->save();
    }
}
