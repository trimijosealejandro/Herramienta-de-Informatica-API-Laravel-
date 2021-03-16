<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoftwareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('software', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100)->nullable()->default('softwares');
            $table->string('area', 100)->nullable()->default('departamento');
            $table->string('software_instalados', 100)->nullable()->default('programas');
            $table->string('instalado_por', 100)->nullable()->default('técnico');
            $table->dateTime('fecha')->nullable();
            $table->string('observaciones', 100)->nullable()->default('sugerencias');
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
        Schema::dropIfExists('software');
    }
}
