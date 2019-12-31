<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ReAddNatureDiffusionToDiffusionsInternesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('diffusions_internes', function (Blueprint $table) {
            $table->dropForeign(['nature_reception_id']);
            $table->dropColumn('nature_reception_id');


            $table->string('nature_diffusion_id')->nullable();

            $table->foreign('nature_diffusion_id')
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
            $table->string('nature_reception_id')->nullable();

            $table->foreign('nature_reception_id')
                ->references('id')
                ->on('modes_receptions')
                ->onDelete('cascade');
        });


        $table->dropForeign(['nature_diffusion_id']);
        $table->dropColumn('nature_diffusion_id');
    }
}
