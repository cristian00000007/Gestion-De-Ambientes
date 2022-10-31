<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAprendizsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aprendizs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Aprend_Nombres',200);
            $table->string('Aprend_Apellidos',200);
            $table->string('Aprend_Documento',20);
            $table->string('Aprend_Celular',50);
            $table->string('Aprend_Email',200);
            $table->string('Aprend_Foto',200);
            $table->string('Aprend_Estado',150);
            $table->bigInteger('FichaId')->unsigned();
            $table->foreign('FichaId')->references('id')->on('fichas');
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
        Schema::dropIfExists('aprendizs');
    }
}
