<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fichas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Ficha_Numero',100);
            $table->integer('Ficha_CantidadApren');
            $table->string('Ficha_Jornada',100);
            $table->string('Ficha_FechaInicio',255);
            $table->string('Ficha_FechaFin',255);
            $table->string('Ficha_Estado',100);
            $table->bigInteger('Programa_Id')->unsigned();
            $table->foreign('Programa_Id')->references('id')->on('programas');
            $table->bigInteger('RutaFormacionId')->unsigned();
            $table->foreign('RutaFormacionId')->references('id')->on('Ruta__Formacions');
            $table->bigInteger('InstructorId')->unsigned();
            $table->foreign('InstructorId')->references('id')->on('instructors');
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
        Schema::dropIfExists('fichas');
    }
}
