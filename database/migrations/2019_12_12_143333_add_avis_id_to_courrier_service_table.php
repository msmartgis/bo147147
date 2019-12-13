<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAvisIdToCourrierServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courrier_service', function (Blueprint $table) {
            $table->string('avis_id', 36)->nullable();

            $table->foreign('avis_id')
                ->references('id')
                ->on('avis')
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
        Schema::table('courrier_service', function (Blueprint $table) {
            $table->dropForeign(['avis_id']);
            $table->dropColumn('avis_id');
        });
    }
}
