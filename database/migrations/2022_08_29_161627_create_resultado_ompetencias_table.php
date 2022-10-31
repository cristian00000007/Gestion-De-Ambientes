<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultadoOmpetenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultado_ompetencias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('Result_Nombre')->fullText();
            $table->string('Result_Estado',100);
            $table->bigInteger('competencias_id')->unsigned();
            $table->foreign('competencias_id')->references('id')->on('competencias');
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
        Schema::dropIfExists('resultado_ompetencias');
    }
}
