<?php

use App\TypeOperation;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TypeOperationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypeOperation::insert(
            [
                'id' => '8a40844d-1bed-41c0-ac6e-7b1516d459a6',
                'nom' => 'create',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]

        );


        TypeOperation::insert(
            [
                'id' => '2ba53ab3-aba8-421b-b650-46b4fa06e493',
                'nom' => 'update',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]

        );


        TypeOperation::insert(
            [
                'id' => '204bf80f-1ec6-4aa0-a689-0b7cd56fd851',
                'nom' => 'delete',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]

        );


        TypeOperation::insert(
            [
                'id' => '3fd26d34-e2e3-446c-bbd6-7ca0428af172',
                'nom' => 'view',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]

        );


        TypeOperation::insert(
            [
                'id' => '3b2d24db-b718-4425-a820-5630dd2843e1',
                'nom' => 'validate',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]

        );


        TypeOperation::insert(
            [
                'id' => 'c77d7630-7189-4e24-8d47-4985f703977f',
                'nom' => 'assignate',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]

        );


        TypeOperation::insert(
            [
                'id' => '4a25a0b0-d216-446e-8342-c50272ec4631',
                'nom' => 'cloture',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]

        );
    }
}
