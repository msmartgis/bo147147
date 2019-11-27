<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accuses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('ref')->nullable();
            $table->string('type')->nullable(); // reception ou envoie
            $table->date('date')->nullable();
            $table->string('path')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('accuses');
    }
}
