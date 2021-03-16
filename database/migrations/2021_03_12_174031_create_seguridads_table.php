<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeguridadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguridads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 10)->nullable()->default('SI');
            $table->string('seguridad_local', 10)->nullable()->default('bien');
            $table->string('cuidado_medios', 10)->nullable()->default('bien');
            $table->string('sello_seguridad', 10)->nullable()->default('bien');
            $table->string('expediente_tecnico', 10)->nullable()->default('bien');
            $table->string('registro_acceso', 10)->nullable()->default('bien');
            $table->string('acta_responsabilidad', 10)->nullable()->default('bien');
            $table->string('inventario', 10)->nullable()->default('bien');
            $table->string('password1', 10)->nullable()->default('bien');
            $table->string('password2', 10)->nullable()->default('bien');
            $table->string('password3', 10)->nullable()->default('bien');
            $table->string('permiso_administrador', 10)->nullable()->default('bien');
            $table->string('software_autorizado', 10)->nullable()->default('bien');
            $table->string('software_no_autorizado', 10)->nullable()->default('bien');
            $table->string('archivo_no_autorizado', 10)->nullable()->default('bien');
            $table->string('evaluacion_inspeccion', 10)->nullable()->default('bien');
            $table->string('observaciones', 100)->nullable()->default('bien');
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
        Schema::dropIfExists('seguridads');
    }
}
