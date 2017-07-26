<?php

use Illuminate\Database\Seeder;

class RamosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ramos')->insert([
        	'codigo_asignatura'=>503356,
        	'ano'=>2017,
        	'semestre'=>1
        	]);
        DB::table('ramos')->insert([
            'codigo_asignatura'=>503356,
            'ano'=>2016,
            'semestre'=>1
            ]);
        DB::table('ramos')->insert([
            'codigo_asignatura'=>503356,
            'ano'=>2015,
            'semestre'=>1
            ]);
        DB::table('ramos')->insert([
            'codigo_asignatura'=>555555,
            'ano'=>2015,
            'semestre'=>1
            ]);
        DB::table('ramos')->insert([
            'codigo_asignatura'=>555555,
            'ano'=>2015,
            'semestre'=>2
        ]);    
    }
}
