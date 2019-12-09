<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveColumnRepresentantIdFromPersonnesMoralesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personnes_morales', function (Blueprint $table) {
            $table->dropForeign(['representant_id']);
            $table->dropColumn('representant_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personnes_morales', function (Blueprint $table) {
            $table->string('representant_id');

            $table->foreign('representant_id')
                ->references('id')
                ->on('personnes_physiques')
                ->onDelete('cascade');
        });
    }
}
