<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategorieCourrierIdToCourriersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courriers', function (Blueprint $table) {
            $table->string('categorie_courrier_id', 36)->nullable();

            $table->foreign('categorie_courrier_id')
                ->references('id')
                ->on('categorie_courriers')
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
        Schema::table('courriers', function (Blueprint $table) {
            $table->dropForeign(['categorie_courrier_id']);
            $table->dropColumn('categorie_courrier_id');
        });
    }
}
