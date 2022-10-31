<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetenciasHasDetalleRutasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competencias__has__detalle__rutas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('resultadoCompetenciaId')->unsigned();
            $table->foreign('resultadoCompetenciaId')->references('id')->on('resultado_competencias');
            $table->bigInteger('DetalleRutaId')->unsigned();
            $table->foreign('DetalleRutaId')->references('id')->on('detalle_rutas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('competencias__has__detalle__rutas');
    }
}
