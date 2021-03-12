<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Seguridad;
class SeguridadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pc= DB::table('pcs')->select('id')->first();

        factory(Seguridad::Class)->create([
            'name'=>Str::random(5),
            'pcs_id'=>$pc->id,
        ]);

        factory(Seguridad::Class)->create([
            'name'=>Str::random(5),
            'pcs_id'=>$pc->id,
        ]);

        factory(Seguridad::Class)->create([
            'name'=>Str::random(5),
            'pcs_id'=>$pc->id,
        ]);

        factory(Seguridad::Class)->create([
            'name'=>Str::random(5),
            'pcs_id'=>$pc->id,
        ]);
    }
}
