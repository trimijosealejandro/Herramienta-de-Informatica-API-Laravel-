<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pcs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100)->nullable()->default('text');
            $table->float('InventarioMonitor', 100)->nullable();
            $table->float('InventarioCPU', 100)->nullable();
            $table->float('InventarioBackup', 100)->nullable();
            $table->float('InventarioImpresora', 100)->nullable();
            $table->float('InventarioModem', 100)->nullable();
            $table->float('InventarioOtro', 100)->nullable();
            $table->string('MotherboardFabricante', 100)->nullable();
            $table->string('MotherboardModelo', 100)->nullable();
            $table->string('MotherboardVersión', 100)->nullable();
            $table->float('MotherboardSerie', 100)->nullable();
            $table->string('MicroprocesadorFabricante', 100)->nullable();
            $table->string('MicroprocesadorModelo', 100)->nullable();
            $table->string('MicroprocesadorVersión', 100)->nullable();
            $table->float('MicroprocesadorSerie', 100)->nullable();
            $table->string('DiscoduroFabricante', 100)->nullable();
            $table->string('DiscoduroModelo', 100)->nullable();
            $table->string('DiscoduroVersión', 100)->nullable();
            $table->float('DiscoduroSerie', 100)->nullable();
            $table->string('MemoriaFabricante', 100)->nullable();
            $table->string('MemoriaModelo', 100)->nullable();
            $table->string('MemoriaVersión', 100)->nullable();
            $table->float('MemoriaSerie', 100)->nullable();
            $table->string('FuenteFabricante', 100)->nullable();
            $table->string('FuenteModelo', 100)->nullable();
            $table->string('FuenteVersión', 100)->nullable();
            $table->float('FuenteSerie', 100)->nullable();
            $table->string('CDDVDFabricante', 100)->nullable();
            $table->string('CDDVDModelo', 100)->nullable();
            $table->string('CDDVDVersión', 100)->nullable();
            $table->float('CDDVDSerie', 100)->nullable();
            $table->string('BocinasFabricante', 100)->nullable();
            $table->string('BocinasModelo', 100)->nullable();
            $table->string('BocinasVersión', 100)->nullable();
            $table->float('BocinasSerie', 100)->nullable();
            $table->string('MouseFabricante', 100)->nullable();
            $table->string('MouseModelo', 100)->nullable();
            $table->string('MouseVersión', 100)->nullable();
            $table->float('MouseSerie', 100)->nullable();
            $table->string('TecladoFabricante', 100)->nullable();
            $table->string('TecladoModelo', 100)->nullable();
            $table->string('TecladoVersión', 100)->nullable();
            $table->float('TecladoSerie', 100)->nullable();
            $table->string('ImpresoraFabricante', 100)->nullable();
            $table->string('ImpresoraModelo', 100)->nullable();
            $table->string('ImpresoraVersión', 100)->nullable();
            $table->float('ImpresoraSerie', 100)->nullable();
            $table->string('MonitorFabricante', 100)->nullable();
            $table->string('MonitorModelo', 100)->nullable();
            $table->string('MonitorVersión', 100)->nullable();
            $table->float('MonitorSerie', 100)->nullable();
            $table->string('BackupFabricante', 100)->nullable();
            $table->string('BackupModelo', 100)->nullable();
            $table->string('BackupVersión', 100)->nullable();
            $table->float('BackupSerie', 100)->nullable();
            $table->string('ModemFabricante', 100)->nullable();
            $table->string('ModemModelo', 100)->nullable();
            $table->string('ModemVersión', 100)->nullable();
            $table->float('ModemSerie', 100)->nullable();
            $table->string('OtroFabricante', 100)->nullable();
            $table->string('OtroModelo', 100)->nullable();
            $table->string('OtroVersión', 100)->nullable();
            $table->float('OtroSerie', 100)->nullable();
            //Añadir llave foranea a la tabla pcs
            $table->integer('departamentos_id')->unsigned();
            $table->foreign('departamentos_id')->references('id')->on('departamentos');
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
        Schema::dropIfExists('pcs');
    }
}
