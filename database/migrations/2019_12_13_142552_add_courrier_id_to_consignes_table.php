<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCourrierIdToConsignesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('consignes', function (Blueprint $table) {
            $table->string('courrier_id', 36)->nullable();

            $table->foreign('courrier_id')
                ->references('id')
                ->on('courriers')
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
        Schema::table('consignes', function (Blueprint $table) {
            $table->dropForeign(['courrier_id']);
            $table->dropColumn('courrier_id');
        });
    }
}
