<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddModeReceptionForeignKieyToCourriersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courriers', function (Blueprint $table) {
            $table->string('mode_reception_id')->index();

            $table->foreign('mode_reception_id')
                ->references('id')
                ->on('modes_receptions')
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
            $table->dropForeign(['mode_reception_id']);
            $table->dropColumn('mode_reception_id');
        });
    }
}
