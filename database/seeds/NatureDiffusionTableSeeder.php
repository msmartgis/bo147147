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
        $nature_diff_1->nom = "النوع الاول";
        $nature_diff_1->save();

        $nature_diff_2 = new NatureDiffusion();
        $nature_diff_2->nom = "النوع الثاني";
        $nature_diff_2->save();

        $nature_diff_3 = new NatureDiffusion();
        $nature_diff_3->nom = "النوع الثالث";
        $nature_diff_3->save();

        $nature_diff_4 = new NatureDiffusion();
        $nature_diff_4->nom = "النوع الرابع";
        $nature_diff_4->save();
    }
}
