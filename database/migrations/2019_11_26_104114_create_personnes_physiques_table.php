<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonnesPhysiquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnes_physiques', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('ref');     
            $table->string('nom')->nullable();     
            $table->string('prenom')->nullable();     
            $table->string('cine')->nullable();     
            $table->string('adresse')->nullable();     
            $table->string('tel_fixe')->nullable();     
            $table->string('tel_mobile')->nullable();     
            $table->string('email')->nullable();     
            $table->integer('is_represantant')->nullable();     // is representant of a company 'gerant' 'directeur'...
            $table->string('role_en_entreprise')->nullable();     // son role en entreprise
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
        Schema::dropIfExists('personnes_physiques');
    }
}
