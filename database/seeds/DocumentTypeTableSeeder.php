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
        $reclamation->nom = "رسالة";
        $reclamation->save();

        $facture = new DocumentType();
        $facture->nom = "فاتورة";
        $facture->save();

        $lettre = new DocumentType();
        $lettre->nom = "عقد";
        $lettre->save();

        $plainte = new DocumentType();
        $plainte->nom = "طلب";
        $plainte->save();


        $plainte = new DocumentType();
        $plainte->nom = "شكاية";
        $plainte->save();
    }
}
