<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
            'name' => 'Julio Godoy',
            'email' => 'jugodoy@udec.cl',
            'password' => bcrypt('140602345'),
        ]);

         DB::table('users')->insert([
            'name' => 'Guillermo Cabrera Vives',
            'email' => 'guillecabrera@udec.cl',
            'password' => bcrypt('9990996K'),
        ]);

         DB::table('users')->insert([
            'name' => 'Ricardo Contreras Arriagada',
            'email' => 'rcontrer@udec.cl',
            'password' => bcrypt('56718648'),
        ]);

         DB::table('users')->insert([
            'name' => 'Yussef Farran Leiva',
            'email' => 'yfarran@udec.cl',
            'password' => bcrypt('5484431K'),
        ]);

         DB::table('users')->insert([
            'name' => 'César González Castillo',
            'email' => 'cesarg@udec.cl',
            'password' => bcrypt('83949651'),
        ]);

         DB::table('users')->insert([
            'name' => 'Cecilia Hernández Rivas',
            'email' => 'chernand@inf.udec.cl',
            'password' => bcrypt('102267273'),
        ]);

         DB::table('users')->insert([
            'name' => 'Jorge López Reguera',
            'email' => 'jorlopez@udec.cl',
            'password' => bcrypt('70040131'),
        ]);

         DB::table('users')->insert([
            'name' => 'Ma. Angélica Pinninghoff Junemann',
            'email' => 'mapinnin@inf.udec.cl',
            'password' => bcrypt('65689561'),
        ]);

         DB::table('users')->insert([
            'name' => 'Andrea Rodríguez Tastets',
            'email' => 'andrea@udec.cl',
            'password' => bcrypt('90280317'),
        ]);

         DB::table('users')->insert([
            'name' => 'Gonzalo Rojas Durán',
            'email' => 'gonzalorojas@udec.cl',
            'password' => bcrypt('12734731K'),
        ]);

         DB::table('users')->insert([
            'name' => 'Lilian Salinas Ayala',
            'email' => 'lilisalinas@udec.cl',
            'password' => bcrypt('12482513K'),
        ]);

         DB::table('users')->insert([
            'name' => 'Marcela Varas Contreras',
            'email' => 'mvaras@udec.cl',
            'password' => bcrypt('106623872'),
        ]);

         DB::table('users')->insert([
            'name' => 'Javier Vidal Valenzuela',
            'email' => 'jvidal@udec.cl',
            'password' => bcrypt('94130581'),
        ]);

        //  DB::table('users')->insert([
        //     'name' => 'Diego Seco',
        //     'email' => 'dseco@udec.cl',
        //     'password' => bcrypt(''),
        // ]);

        //  DB::table('users')->insert([
        //     'name' => 'Roberto Asín Achá',
        //     'email' => 'rasin@udec.cl',
        //     'password' => bcrypt(''),
        // ]);
    }
}
