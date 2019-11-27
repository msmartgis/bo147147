<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->string('type_document_id')->nullable();
            $table->string('nature_diffusion_id')->nullable();

            $table->foreign('type_document_id')
                ->references('id')
                ->on('types_documents')
                ->onDelete('cascade');


            $table->foreign('nature_diffusion_id')
                ->references('id')
                ->on('natures_diffusions')
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
        Schema::table('documents', function (Blueprint $table) {
            $table->dropForeign(['type_document_id']);
            $table->dropForeign(['nature_diffusion_id']);

            $table->dropColumn('type_document_id');
            $table->dropColumn('nature_diffusion_id');
        });
    }
}
