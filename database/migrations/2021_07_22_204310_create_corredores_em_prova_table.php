<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorredoresEmProvaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corredores_em_prova', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_corredor')->index('id_corredor');
            $table->integer('id_prova')->index('id_prova');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('corredores_em_prova');
    }
}
