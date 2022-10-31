<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmbientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ambientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Ambien_Nombres',100);
            $table->string('Ambien_Capacidad',100);
            $table->string('Ambien_Foto',200);
            $table->string('Ambien_Observacion',500);
            $table->string('Ambien_Estado',100);
            $table->bigInteger('CategoriaAmbienteId')->unsigned();
            $table->foreign('CategoriaAmbienteId')->references('id')->on('categoria_ambientes');
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
        Schema::dropIfExists('ambientes');
    }
}
