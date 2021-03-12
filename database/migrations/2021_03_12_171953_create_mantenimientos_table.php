<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMantenimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mantenimientos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100)->nullable()->default('mantenimiento');
            $table->string('area', 100)->nullable()->default('departamento');
            $table->string('equipo', 100)->nullable()->default('pcs');
            $table->dateTime('fecha')->nullable();
            $table->string('tecnico', 100)->nullable()->default('nombre');
            $table->string('labor_realizada', 100)->nullable()->default('acción');
            $table->string('observaciones', 100)->nullable()->default('sugerencias');
            //Llave foraneas
            $table->integer('pcs_id')->unsigned();
            $table->foreign('pcs_id')->references('id')->on('pcs');
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
        Schema::dropIfExists('mantenimientos');
    }
}
