<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOperationIdForeignKeyToCourrierUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courrier_user', function (Blueprint $table) {
            $table->string('operation_id')->index();

            $table->foreign('operation_id')
                ->references('id')
                ->on('operations')
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
        Schema::table('courrier_user', function (Blueprint $table) {
            $table->dropForeign(['operation_id']);
            $table->dropColumn('operation_id');
        });
    }
}
