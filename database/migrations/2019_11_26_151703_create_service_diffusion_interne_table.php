<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceDiffusionInterneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_diffusion_interne', function (Blueprint $table) {
            $table->string('service_id')->index();

            $table->foreign('service_id')
                ->references('id')
                ->on('services')
                ->onDelete('cascade');


            $table->string('diffusion_interne_id')->index();

            $table->foreign('diffusion_interne_id')
                ->references('id')
                ->on('diffusions_internes')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_diffusion_interne');
    }
}
