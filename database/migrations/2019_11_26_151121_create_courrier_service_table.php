<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourrierServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courrier_service', function (Blueprint $table) {
            $table->bigIncrements('id')->primary();
            $table->string('courrier_id')->index();

            $table->foreign('courrier_id')
                ->references('id')
                ->on('courriers')
                ->onDelete('cascade');


            $table->string('service_id')->index();

            $table->foreign('service_id')
                ->references('id')
                ->on('services')
                ->onDelete('cascade');

            $table->longText('message')->nullable();
            $table->integer('vu')->default(0);

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
        Schema::dropIfExists('courrier_service');
    }
}
