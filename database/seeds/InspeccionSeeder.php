<?php

use Illuminate\Database\Seeder;
use App\Inspeccion;
use Illuminate\Support\Str;

class InspeccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pc= DB::table('pcs')->select('id')->first();

        factory(Inspeccion::Class)->create([
            'name'=>Str::random(10),
            'pcs_id'=>$pc->id,
        ]);
        factory(Inspeccion::Class)->create([
            'name'=>Str::random(10),
            'pcs_id'=>$pc->id,
        ]);
        factory(Inspeccion::Class)->create([
            'name'=>Str::random(10),
            'pcs_id'=>$pc->id,
        ]);
        factory(Inspeccion::Class)->create([
            'name'=>Str::random(10),
            'pcs_id'=>$pc->id,
        ]);
    }
}
