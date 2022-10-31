<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Progra_Nombre',180);
            $table->string('Progra_Codigo',80);
            $table->string('Progra_Version',80);
            $table->string('Progra_TipoDuracion',45);
            $table->integer('Progra_Duracion');
            $table->string('Progra_FechaRegistro',255);
            $table->string('Progra_Estado',100);
            $table->bigInteger('TipoPrograma_id')->unsigned();
            $table->foreign('TipoPrograma_id')->references('id')->on('Tipo__programas');
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
        Schema::dropIfExists('programas');
    }
}
