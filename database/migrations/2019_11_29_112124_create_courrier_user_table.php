<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourrierUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courrier_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('courrier_id')->index();
            $table->bigInteger('user_id')->unsigned()->index();
            $table->string('message');
            $table->timestamps();

            //foreign keys 
            $table->foreign('courrier_id')
                ->references('id')
                ->on('courriers')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('courrier_user');
    }
}
