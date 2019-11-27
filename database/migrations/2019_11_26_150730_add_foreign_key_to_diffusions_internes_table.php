<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToDiffusionsInternesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('diffusions_internes', function (Blueprint $table) {
            $table->string('nature_reception_id')->nullable();

            $table->foreign('nature_reception_id')
                ->references('id')
                ->on('natures_diffusions')
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
        Schema::table('diffusions_internes', function (Blueprint $table) {
            $table->dropForeign(['nature_reception_id']);
            $table->dropColumn('nature_reception_id');
        });
    }
}
