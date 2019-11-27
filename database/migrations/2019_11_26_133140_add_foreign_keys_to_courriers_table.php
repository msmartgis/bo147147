<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCourriersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courriers', function (Blueprint $table) {
            $table->string('personne_physique_id')->nullable();
            $table->string('personne_morale_id')->nullable();

            //forign key to personne physiques table            
            $table->foreign('personne_physique_id')
                ->references('id')
                ->on('personnes_physiques')
                ->onDelete('cascade');

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
        Schema::table('courriers', function (Blueprint $table) {
            $table->dropForeign(['personne_physique_id']);
            $table->dropForeign(['personne_morale_id']);

            $table->dropColumn('personne_physique_id');
            $table->dropColumn('personne_morale_id');
        });
    }
}
