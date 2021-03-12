<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Pc;


class PcSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departamento= DB::table('departamentos')->select('id')->first();
        factory(Pc::Class)->create([
            'name'=>Str::random(3),
            'departamentos_id'=>$departamento->id,
        ]);

        factory(Pc::Class)->create([
            'name'=>Str::random(3),
            'departamentos_id'=>$departamento->id,
        ]);

        factory(Pc::Class)->create([
            'name'=>Str::random(3),
            'departamentos_id'=>$departamento->id,
        ]);

        factory(Pc::Class)->create([
            'name'=>Str::random(3),
            'departamentos_id'=>$departamento->id,
        ]);
    }
}
