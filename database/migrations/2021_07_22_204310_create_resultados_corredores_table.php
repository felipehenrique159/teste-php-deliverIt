<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultadosCorredoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultados_corredores', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_corredor')->index('id_corredor');
            $table->integer('id_prova')->index('id_prova');
            $table->time('horario_inicio_prova')->nullable();
            $table->time('horario_conclusao_prova')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resultados_corredores');
    }
}
