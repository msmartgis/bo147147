<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeColumnReponsableIdNullableToPersonnesMoralesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personnes_physiques', function (Blueprint $table) {
            $table->string('personne_morale_id', 36)->nullable()->change();
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
            $table->string('personne_morale_id', 36)->nullable(false)->change();
        });
    }
}
