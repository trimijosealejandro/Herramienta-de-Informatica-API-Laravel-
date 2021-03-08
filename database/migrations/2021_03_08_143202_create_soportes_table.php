<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoportesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soportes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100)->nullable()->default('soportes');
            $table->string('area', 100)->nullable()->default('departamento');
            $table->string('contenido', 100)->nullable()->default('problemas');
            $table->string('trabajo', 100)->nullable()->default('solución');
            $table->string('nivel_de_acceso', 100)->nullable()->default('trabajo realizado');
            $table->dateTime('fecha_entrada')->nullable();
            $table->dateTime('fecha_salida')->nullable();
            $table->string('observaciones', 100)->nullable()->default('sugerencias');
            //llave foranea
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
        Schema::dropIfExists('soportes');
    }
}
