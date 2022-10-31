<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleRutasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_rutas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('Detalle_Ruta_Horas');
            $table->string('Detalle_Ruta_TemaPrincipal',150);
            $table->string('Detalle_Ruta_Trimestre',150);
            $table->string('Detalle_Ruta_Estado',100);
            $table->bigInteger('RutaFormacionId')->unsigned();
            $table->foreign('RutaFormacionId')->references('id')->on('Ruta__Formacions');
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
        Schema::dropIfExists('detalle_rutas');
    }
}
