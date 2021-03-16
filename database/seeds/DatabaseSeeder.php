<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(DepartamentoSeeder::class);
         $this->call(PcSeeder::class);
         $this->call(InspeccionSeeder::class);
         $this->call(SoporteSeeder::class);
         $this->call(SoftwareSeeder::class);
         $this->call(MantenimientoSeeder::class);
         $this->call(IncidenciaSeeder::class);
         $this->call(SeguridadSeeder::class);
         $this->call(MovimientoPcSeeder::class);
    }
}
