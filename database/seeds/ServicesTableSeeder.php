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
        Service::insert([
            'id' => '1501fa77-140c-4840-add8-fa410323143c',
            'ref' => 'S0001',
            'nom' => 'service1',
        ]);
    }
}
