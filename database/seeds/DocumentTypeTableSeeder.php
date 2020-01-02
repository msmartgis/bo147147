<?php

use App\DocumentType;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DocumentTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reclamation = new DocumentType();
        $reclamation->nom = "reclamation";
        $reclamation->save();

        $facture = new DocumentType();
        $facture->nom = "facture";
        $facture->save();

        $lettre = new DocumentType();
        $lettre->nom = "lettre";
        $lettre->save();

        $plainte = new DocumentType();
        $plainte->nom = "une plainte";
        $plainte->save();

        // DocumentType::insert(
        //     [
        //         'id' => 'a1830f90-684e-428f-a8a5-c24821709a8c',
        //         'nom' => 'reclamation',
        //         'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        //     ],
        //     [
        //         'id' => '3e9957dc-6f65-4341-af5c-4e8d91c59573',
        //         'nom' => 'facture',
        //         'created_at' => Carbon::now()->format('Y-m-d H:i:s')

        //     ],
        //     [
        //         'id' => '2a9235c4-9851-44d1-9aee-944d1627e2f8',
        //         'nom' => 'lettre',
        //         'created_at' => Carbon::now()->format('Y-m-d H:i:s')

        //     ],
        //     [
        //         'id' => '4f4d8ade-babd-4bf8-82d5-2dac813c3293',
        //         'nom' => 'une plainte',
        //         'created_at' => Carbon::now()->format('Y-m-d H:i:s')

        //     ]
        // );
    }
}
