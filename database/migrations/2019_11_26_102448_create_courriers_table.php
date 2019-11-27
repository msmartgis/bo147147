<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourriersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courriers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('ref');
            $table->string('type')->default('entrant');    //entrant ou sortant       
            $table->date('date_reception')->nullable();
            $table->date('date_envoie')->nullable();
            $table->text('objet')->nullable();
            $table->date('delai')->nullable();
            $table->string('avis')->nullable();  //favorable ou defavorable ...        
            $table->string('etat')->nullable();  //         
            $table->integer('is_cloture')->default(0);        // 1 if colurer 0 if not  
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
        Schema::dropIfExists('courriers');
    }
}
