<?php

use Illuminate\Database\Seeder;
use App\Soporte;
use Illuminate\Support\Str;

class SoporteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pc= DB::table('pcs')->select('id')->first();

        factory(Soporte::Class)->create([
            'name'=>Str::random(5),
            'pcs_id'=>$pc->id,
        ]);
        factory(Soporte::Class)->create([
            'name'=>Str::random(5),
            'pcs_id'=>$pc->id,
        ]);
        factory(Soporte::Class)->create([
            'name'=>Str::random(5),
            'pcs_id'=>$pc->id,
        ]);
        factory(Soporte::Class)->create([
            'name'=>Str::random(5),
            'pcs_id'=>$pc->id,
        ]);
    }
}
