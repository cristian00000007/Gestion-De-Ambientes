<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstructorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instructors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Instruct_Nombres',255);
            $table->string('Instruct_Apellidos',255);
            $table->string('Instruct_EmailInstitucional',200);
            $table->string('Instruct_EmailAlternativo',200);
            $table->string('Instruct_Celular',20);
            $table->string('Instruct_Foto',255);
            $table->string('Instruct_Estado',100);
            $table->string('Instruc_Cedula');
            $table->bigInteger('AreaTematicaId')->unsigned();
            $table->foreign('AreaTematicaId')->references('id')->on('area__tematicas');
            $table->bigInteger('TipoVinculacionId')->unsigned();
            $table->foreign('TipoVinculacionId')->references('id')->on('tipo__vinculacions');
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
        Schema::dropIfExists('instructors');
    }
}
