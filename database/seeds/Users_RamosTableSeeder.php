<?php

use Illuminate\Database\Seeder;

class Users_RamosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ramo_user')->insert([
        	'user_id'=>1,
        	'ramo_id'=>1
        	]);
    }
}
