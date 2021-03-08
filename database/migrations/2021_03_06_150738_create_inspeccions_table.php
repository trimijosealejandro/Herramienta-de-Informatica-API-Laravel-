<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInspeccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspeccions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100)->nullable()->default('inspección');
            $table->dateTime('fecha')->nullable();
            $table->string('area',100 )->nullable()->default('departamento');
            $table->string('participantes', 100)->nullable()->default('técnico');
            $table->string('situacion_detectada', 100)->nullable()->default('situación');
            $table->string('plan_medida', 100)->nullable()->default('solución');
            $table->string('responsable', 100)->nullable()->default('técnico');
            $table->dateTime('fecha_solucionar')->nullable();
            //llave foranea con pc
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
        Schema::dropIfExists('inspeccions');
    }
}
