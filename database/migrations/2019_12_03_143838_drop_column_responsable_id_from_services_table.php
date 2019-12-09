<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumnResponsableIdFromServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropForeign(['responsable_id']);
            $table->dropColumn('responsable_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->string('responsable_id');

            $table->foreign('responsable_id')
                ->references('id')
                ->on('personnes_physiques')
                ->onDelete('cascade');
        });
    }
}
