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
         // DB::table('carpetas')->insert([
         //    'ramo_id' => 1,
         //    'fecha_subida'=> '2008-7-04',
         //    'planilla'=> 'planilla.pdf',
         //    'syllabus'=> 'syllabus.pdf',
         //    'acta'=> 'acta.pdf',
         //    'zip'=> 'archivo.zip',
         //    'syllabus' => 'Inteligencia-Artificial.pdf',
            
        DB::table('carpetas')->insert([
            'fecha_subida' => '2017-07-01',
            'planilla' => 'no disponible',
            'syllabus' => 'no disponible',
            'acta' =>'no disponible',
            'material' =>'no disponible',
            'ramo_id'=>1
        ]);
    }
}
