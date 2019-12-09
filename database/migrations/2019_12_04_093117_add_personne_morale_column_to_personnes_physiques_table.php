<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPersonneMoraleColumnToPersonnesPhysiquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personnes_physiques', function (Blueprint $table) {
            $table->string('personne_morale_id', 36); // pour definir quelle organisation represente cette personne

            $table->foreign('personne_morale_id')
                ->references('id')
                ->on('personnes_morales')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personnes_physiques', function (Blueprint $table) {
            $table->dropForeign(['personne_morale_id']);
            $table->dropColumn('personne_morale_id');
        });
    }
}
