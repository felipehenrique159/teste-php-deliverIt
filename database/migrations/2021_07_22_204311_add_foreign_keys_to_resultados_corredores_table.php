<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToResultadosCorredoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('resultados_corredores', function (Blueprint $table) {
            $table->foreign('id_corredor', 'resultados_corredores_ibfk_1')->references('id')->on('corredores');
            $table->foreign('id_prova', 'resultados_corredores_ibfk_2')->references('id')->on('provas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('resultados_corredores', function (Blueprint $table) {
            $table->dropForeign('resultados_corredores_ibfk_1');
            $table->dropForeign('resultados_corredores_ibfk_2');
        });
    }
}
