<?php

use Illuminate\Database\Seeder;

class AsignaturasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('asignaturas')->insert([
            'codigo' => 503356,
            'nombre' => 'Inteligencia Artificial',
            'programa' => 'Inteligencia-Artificial.pdf',
            'semestre' => 1
        ]);
            DB::table('asignaturas')->insert([
            'codigo' => 555555,
            'nombre' => 'Dummy Ramo',
            'programa' => 'Dummy-Ramo.pdf',
            'semestre' => 1
        ]);
    }
}
