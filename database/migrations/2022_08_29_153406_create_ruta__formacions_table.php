<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRutaFormacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ruta__formacions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Ruta_Nombre',200);
            $table->string('Ruta_Estado',100);
            $table->bigInteger('Programa_id')->unsigned();
            $table->foreign('Programa_id')->references('id')->on('programas');
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
        Schema::dropIfExists('ruta__formacions');
    }
}
