<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCorredoresEmProvaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('corredores_em_prova', function (Blueprint $table) {
            $table->foreign('id_corredor', 'corredores_em_prova_ibfk_1')->references('id')->on('corredores');
            $table->foreign('id_prova', 'corredores_em_prova_ibfk_2')->references('id')->on('provas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('corredores_em_prova', function (Blueprint $table) {
            $table->dropForeign('corredores_em_prova_ibfk_1');
            $table->dropForeign('corredores_em_prova_ibfk_2');
        });
    }
}
