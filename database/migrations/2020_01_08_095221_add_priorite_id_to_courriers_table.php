<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPrioriteIdToCourriersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courriers', function (Blueprint $table) {
            $table->string('priorite_id')->nullable()->after('etat_id');

            $table->foreign('priorite_id')
                ->references('id')
                ->on('priorites_courriers')
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
            $table->dropForeign('priorite_id');
            $table->dropColumn('priorite_id');
        });
    }
}
