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
        NatureDiffusion::insert([
            [
                'id' => 'f1ba48e5-263b-4e93-95ce-f2dfbc7d12dc',
                'nom' => 'ND 001'
            ],
            [
                'id' => '674b61d4-f8ea-4c6c-9a25-345213d01a96',
                'nom' => 'ND 002'
            ],
            [
                'id' => 'a16e85f8-f53e-4a2c-b37f-cb1c6e643ec9',
                'nom' => 'ND 002'
            ]
        ]);
    }
}
