<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncidenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidencias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100)->nullable()->default('incidencias');
            $table->dateTime('fecha')->nullable();
            $table->string('hecho_detectado', 100)->nullable()->default('violacion');
            $table->string('forma_de_deteccion', 100)->nullable()->default('medio');
            $table->string('medidas_tomadas', 100)->nullable()->default('sentencia');
            $table->string('observacion', 100)->nullable()->default('sugerencia');
            //Llave foranea
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
        Schema::dropIfExists('incidencias');
    }
}
