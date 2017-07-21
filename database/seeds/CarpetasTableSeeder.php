<?php

use Illuminate\Database\Seeder;

class CarpetasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carpetas')->insert([
            'fecha_subida' => '2017-07-01',
            'planilla' => 'no disponible',
            'syllabus' => 'no disponible',
            'acta' =>'no disponible',
            'zip' =>'no disponible',
            'ramo_id'=>1
        ]);
    }
}
