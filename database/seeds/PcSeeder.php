<?php

use Illuminate\Database\Seeder;
use App\Pc;
use Illuminate\Support\Str;

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
            'name'=>Str::random(10),
            'departamentos_id'=>$departamento->id,
        ]);
        factory(Pc::Class)->create([
            'name'=>Str::random(10),
            'departamentos_id'=>$departamento->id,
        ]);
        factory(Pc::Class)->create([
            'name'=>Str::random(10),
            'departamentos_id'=>$departamento->id,
        ]);
        factory(Pc::Class)->create([
            'name'=>Str::random(10),
            'departamentos_id'=>$departamento->id,
        ]);
    }
}
