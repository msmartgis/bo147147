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

        $main_propre = new ModeReception();
        $main_propre->nom = "Main propre";
        $main_propre->save();

        $courrier = new ModeReception();
        $courrier->nom = "Courrier";
        $courrier->save();

        $fax = new ModeReception();
        $fax->nom = "Fax";
        $fax->save();

        $autre = new ModeReception();
        $autre->nom = "Autre";
        $autre->save();



        // ModeReception::insert([
        //     [
        //         'id' => 'c23a3d89-5776-403b-a4f8-3a6bce63e762',
        //         'nom' => 'Main propre'
        //     ],
        //     [
        //         'id' => 'c6c8af4d-ec2f-4c65-abf3-70e9a36c374e',
        //         'nom' => 'Courrier'
        //     ],
        //     [
        //         'id' => '8bed8618-41c7-4b50-ad6b-2f156a543e67',
        //         'nom' => 'Fax'
        //     ]

        // ]);
    }
}
