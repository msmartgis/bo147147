<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEtatForeignKeyToCourriers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courriers', function (Blueprint $table) {
            $table->dropColumn('etat');

            $table->string('etat_id')->index()->nullable();

            $table->foreign('etat_id')
                ->references('id')
                ->on('etats_courriers')
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
            $table->dropForeign(['etat_id']);
            $table->dropColumn('etat_id');

            $table->string('etat');
        });
    }
}
