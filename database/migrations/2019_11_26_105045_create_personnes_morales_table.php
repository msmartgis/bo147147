<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonnesMoralesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnes_morales', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('ref');
            $table->string('raison_social')->nullable();
            $table->string('rc')->nullable();
            $table->string('adresse')->nullable();
            $table->string('tel_fix')->nullable();
            $table->string('tel_mobile')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
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
        Schema::dropIfExists('personnes_morales');
    }
}
