<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pc extends Model
{
    protected $table='pcs';
    protected $fillable=[
        'name',
        'InventarioMonitor',
        'InventarioCPU',
        'InventarioBackup',
        'InventarioImpresora',
        'InventarioModem',
        'InventarioOtro',
        'MotherboardFabricante',
        'MotherboardModelo',
        'MotherboardVersión',
        'MotherboardSerie',
        'MicroprocesadorFabricante',
        'MicroprocesadorModelo',
        'MicroprocesadorVersión',
        'MicroprocesadorSerie',
        'DiscoduroFabricante',
        'DiscoduroModelo',
        'DiscoduroVersión',
        'DiscoduroSerie',
        'MemoriaFabricante',
        'MemoriaModelo',
        'MemoriaVersión',
        'MemoriaSerie',
        'FuenteFabricante',
        'FuenteModelo',
        'FuenteVersión',
        'FuenteSerie',
        'CDDVDFabricante',
        'CDDVDModelo',
        'CDDVDVersión',
        'CDDVDSerie',
        'BocinasFabricante',
        'BocinasModelo',
        'BocinasVersión',
        'BocinasSerie',
        'MouseFabricante',
        'MouseModelo',
        'MouseVersión',
        'MouseSerie',
        'TecladoFabricante',
        'TecladoModelo',
        'TecladoVersión',
        'TecladoSerie',
        'ImpresoraFabricante',
        'ImpresoraModelo',
        'ImpresoraVersión',
        'ImpresoraSerie',
        'MonitorFabricante',
        'MonitorModelo',
        'MonitorVersión',
        'MonitorSerie',
        'BackupFabricante',
        'BackupModelo',
        'BackupVersión',
        'BackupSerie',
        'ModemFabricante',
        'ModemModelo',
        'ModemVersión',
        'ModemSerie',
        'OtroFabricante',
        'OtroModelo',
        'OtroVersión',
        'OtroSerie',

    ];
    public function departamento()
    {
        return $this->belongsToMany('App\Departamento','departamentos_id');
    }
    public function inspeccion()
   {
       return $this->hasMany('App\Inspeccion');
   }
   public function soporte()
   {
       return $this->hasMany('App\Soporte');
   }
   public function software()
   {
       return $this->hasMany('App\Software');
   }
   public function mantenimiento()
   {
       return $this->hasMany('App\Mantenimiento');
   }
   public function incidencia()
   {
       return $this->hasMany('App\Incidencia');
   }
   public function seguridad()
   {
       return $this->hasMany('App\seguridad');
   }
   public function movimientoPc()
   {
       return $this->hasMany('App\MovimientoPc');
   }
}
