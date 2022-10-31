<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competencias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Compet_Nombre',255);
            $table->integer('Compet_Horas');
            $table->text('Compet_ConociProceso')->fullText();
            $table->text('Compet_ConociSaber')->fullText();
            $table->text('Compet_Criterios')->fullText();
            $table->string('Compet_Estado',100);
            $table->bigInteger('programa_id')->unsigned();
            $table->foreign('programa_id')->references('id')->on('programas');
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
        Schema::dropIfExists('competencias');
    }
}
