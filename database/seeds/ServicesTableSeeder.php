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
        Service::insert(
            [
                'id' => 'd6f4ca3d-d0c4-4770-b540-8406696a2db0',
                'ref' => 'S0002',
                'nom' => 'service2'
            ],
            [
                'id' => '3492ffaf-4b2c-44e9-8ccc-6b74ca765c0e',
                'ref' => 'S0003',
                'nom' => 'service3'

            ]
        );
    }
}
