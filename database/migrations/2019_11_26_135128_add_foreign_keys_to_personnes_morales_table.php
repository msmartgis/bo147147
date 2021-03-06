<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPersonnesMoralesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personnes_morales', function (Blueprint $table) {
            $table->string('representant_id')->nullable();

            $table->foreign('representant_id')
                ->references('id')
                ->on('personnes_physiques')
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
        Schema::table('personnes_morales', function (Blueprint $table) {
            $table->dropForeign(['representant_id']);

            $table->dropColumn('representant_id');
        });
    }
}
