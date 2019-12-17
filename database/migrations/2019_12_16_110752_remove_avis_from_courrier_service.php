<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveAvisFromCourrierService extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courrier_service', function (Blueprint $table) {
            $table->dropForeign(['avis_id']);
            $table->dropColumn('avis_id');
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
            $table->string('avis_id');

            $table->foreign('avis_id')
                ->references('id')
                ->on('avis')
                ->onDelete('cascade');
        });
    }
}
