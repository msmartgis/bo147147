<?php

use App\Avis;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AvisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Avis::insert(
            [
                'id' => '9a91a422-378d-4073-95aa-472a5cebc222',
                'nom' => 'favorable',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        );

        Avis::insert(
            [
                'id' => '0f5e8144-e1a3-455f-bfb3-0bd80914c5aa',
                'nom' => 'défavorable',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        );


        Avis::insert(
            [
                'id' => 'fcd389fe-1496-438e-b7fa-31c82873235e',
                'nom' => 'avec réserve',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        );
    }
}
