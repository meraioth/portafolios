<?php

use Illuminate\Database\Seeder;

class EvaluacionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('evaluacions')->insert([
            'carpeta_id' => 1,
            'nombre'=> 'Certamen 1',
            'tipo' => 'Certamen',
            'buena'=>'buena.pdf',
            'media'=>'media.pdf',
            'mala'=>'mala.pdf',
            'pauta'=>'pauta.pdf',
            'enunciado'=>'enunciado.pdf',
            'fecha'=>'17deEnerodel2017'
        ]);
    }
}
