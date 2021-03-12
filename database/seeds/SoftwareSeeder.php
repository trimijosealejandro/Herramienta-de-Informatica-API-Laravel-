<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Software;

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
