<?php

use App\CategorieCourrier;
use Illuminate\Database\Seeder;

class CategorieCourrierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $marche = new CategorieCourrier();
        // $marche->nom = "Marché";
        // $marche->description = "les courriers concernant les marches";
        // $marche->save();


        // $autorisation = new CategorieCourrier();
        // $autorisation->nom = "Autorisation";
        // $autorisation->description = "les courriers concernant les autorisation";
        // $autorisation->save();


        $marche_ar = new CategorieCourrier();
        $marche_ar->nom = "عقد عمومي";
        $marche_ar->description = "les courriers concernant les marches";
        $marche_ar->save();


        $autorisation_ar = new CategorieCourrier();
        $autorisation_ar->nom = "رخص البناء";
        $autorisation_ar->description = "les courriers concernant les autorisation";
        $autorisation_ar->save();


        $bon_commande = new CategorieCourrier();
        $bon_commande->nom = "نمودج طلبية";
        $bon_commande->description = "les courriers concernant les bons de commandes";
        $bon_commande->save();


        $autre = new CategorieCourrier();
        $autre->nom = " اخر";
        $autre->description = "les courriers concernant autres choses";
        $autre->save();
    }
}
