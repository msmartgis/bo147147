<?php

use App\Service;
use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $service1 = new Service();
        $service1->ref = "S0001";
        $service1->nom = "Service 1";
        $service1->save();

        $service2 = new Service();
        $service2->ref = "S0002";
        $service2->nom = "Service 2";
        $service2->save();

        $service3 = new Service();
        $service3->ref = "S0003";
        $service3->nom = "Service 3";
        $service3->save();


        $service4 = new Service();
        $service4->ref = "S0004";
        $service4->nom = "Service 4";
        $service4->save();



        // Service::insert(
        //     [
        //         'id' => 'd6f4ca3d-d0c4-4770-b540-8406696a2db0',
        //         'ref' => 'S0002',
        //         'nom' => 'service2'
        //     ],
        //     [
        //         'id' => '3492ffaf-4b2c-44e9-8ccc-6b74ca765c0e',
        //         'ref' => 'S0003',
        //         'nom' => 'service3'

        //     ]
        // );
    }
}
