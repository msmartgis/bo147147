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
        // $service1 = new Service();
        // $service1->ref = "S0001";
        // $service1->nom = "Service 1";
        // $service1->save();

        // $service2 = new Service();
        // $service2->ref = "S0002";
        // $service2->nom = "Service 2";
        // $service2->save();

        // $service3 = new Service();
        // $service3->ref = "S0003";
        // $service3->nom = "Service 3";
        // $service3->save();


        // $service4 = new Service();
        // $service4->ref = "S0004";
        // $service4->nom = "Service 4";
        // $service4->save();


        $presdent_service = new Service();
        $presdent_service->ref = "President";
        $presdent_service->nom = "السيد الرئيس";
        $presdent_service->save();


        $dg_service = new Service();
        $dg_service->ref = "DG";
        $dg_service->nom = "المدير العام";
        $dg_service->save();



        $bo_service = new Service();
        $bo_service->ref = "B.O";
        $bo_service->nom = "مكتب الضبط";
        $bo_service->save();


        $bo_service = new Service();
        $bo_service->ref = "المصلحة 1";
        $bo_service->nom = "المصلحة 1";
        $bo_service->save();


        $bo_service = new Service();
        $bo_service->ref = "المصلحة 2";
        $bo_service->nom = "المصلحة 2";
        $bo_service->save();


        $bo_service = new Service();
        $bo_service->ref = "المكتب 2";
        $bo_service->nom = "المكتب 2";
        $bo_service->save();
    }
}
