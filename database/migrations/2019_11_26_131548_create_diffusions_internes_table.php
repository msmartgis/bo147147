<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiffusionsInternesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diffusions_internes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('ref')->nullable();
            $table->date('date_envoi')->nullable();
            $table->text('objet')->nullable();
            $table->longText('observations')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index(['id', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diffusions_internes');
    }
}
