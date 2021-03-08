<?php

use Illuminate\Database\Seeder;
use App\Software;
use Illuminate\Support\Str;

class SoftwareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pc= DB::table('pcs')->select('id')->first();

        factory(Software::Class)->create([
            'name'=>Str::random(5),
            'pcs_id'=>$pc->id,
        ]);
        factory(Software::Class)->create([
            'name'=>Str::random(5),
            'pcs_id'=>$pc->id,
        ]);
        factory(Software::Class)->create([
            'name'=>Str::random(5),
            'pcs_id'=>$pc->id,
        ]);
        factory(Software::Class)->create([
            'name'=>Str::random(5),
            'pcs_id'=>$pc->id,
        ]);
    }
}
