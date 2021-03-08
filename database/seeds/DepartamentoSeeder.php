<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Departamento;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Departamento::class)->create([
            'name'=>Str::random(10)
        ]);

        factory(Departamento::class)->create([
            'name'=>Str::random(10)
        ]);

        factory(Departamento::class)->create([
            'name'=>Str::random(10)
        ]);

        factory(Departamento::class)->create([
            'name'=>Str::random(10)
        ]);

        factory(Departamento::class)->create([
            'name'=>Str::random(10)
        ]);

        factory(Departamento::class)->create([
            'name'=>Str::random(10)
        ]);

        factory(Departamento::class)->create([
            'name'=>Str::random(10)
        ]);

        factory(Departamento::class)->create([
            'name'=>Str::random(10)
        ]);


    }
}
