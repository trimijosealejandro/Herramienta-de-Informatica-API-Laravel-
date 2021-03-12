<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\MovimientoPc;

class MovimientoPcSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pc= DB::table('pcs')->select('id')->first();

        factory(MovimientoPc::Class)->create([
            'name'=>Str::random(5),
            'pcs_id'=>$pc->id,
        ]);

        factory(MovimientoPc::Class)->create([
            'name'=>Str::random(5),
            'pcs_id'=>$pc->id,
        ]);

        factory(MovimientoPc::Class)->create([
            'name'=>Str::random(5),
            'pcs_id'=>$pc->id,
        ]);

        factory(MovimientoPc::Class)->create([
            'name'=>Str::random(5),
            'pcs_id'=>$pc->id,
        ]);
    }
}
