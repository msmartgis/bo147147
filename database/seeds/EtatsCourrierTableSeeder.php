<?php

use App\EtatCourrier;
use Illuminate\Database\Seeder;

class EtatsCourrierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EtatCourrier::insert(
            [
                'id' => 'de4d5fe6-a384-4df0-abeb-6f953f4102f4',
                'nom' => 'brouillon'
            ]

        );

        EtatCourrier::insert(
            [
                'id' => '4eb0a1ba-a55e-40f0-bea1-bfc9b21cabc8',
                'nom' => 'en_cours'
            ]

        );

        EtatCourrier::insert(

            [
                'id' => '110a3194-9e8e-40b3-953e-256a68cdfcf7',
                'nom' => 'en_retard'
            ]

        );


        EtatCourrier::insert(

            [
                'id' => 'bfe54fe8-fc87-4fec-aaf0-1cb5beacf858',
                'nom' => 'cloturer'
            ]

        );
    }
}
