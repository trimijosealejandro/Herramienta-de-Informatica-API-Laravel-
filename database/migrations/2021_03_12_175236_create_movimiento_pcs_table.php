<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovimientoPcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimiento_pcs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100)->nullable()->default('movimiento');
            $table->string('departamento', 100)->nullable()->default('departamento');
            $table->dateTime('fecha')->nullable();
            $table->string('accesorio_movido',100)->nullable()->default('monitor');
            $table->string('lugar_origen',100)->nullable()->default('departamento');
            $table->string('lugar_destino',100)->nullable()->default('departamento');
            $table->string('responsable_entrega',100)->nullable()->default('Informático');
            $table->string('responsable_recibe',100)->nullable()->default('Informático');
            //Llave Foranea
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
        Schema::dropIfExists('movimiento_pcs');
    }
}
