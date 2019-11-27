<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveNatureDiffusionFromDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->dropForeign(['nature_diffusion_id']);
            $table->dropColumn('nature_diffusion_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->string('nature_diffusion_id')->nullable();

            $table->foreign('nature_diffusion_id')
                ->references('id')
                ->on('natures_diffusions')
                ->onDelete('cascade');
        });
    }
}
