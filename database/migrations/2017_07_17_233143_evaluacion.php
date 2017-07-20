<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Evaluacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('evaluacions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo');
            $table->string('buena')->unique();
            $table->string('media');
            $table->string('mala');
            $table->string('id_carpeta');

            $table->foreign('id_carpeta')
            ->references('codigo')
                    ->on('asignaturas');

            $table->rememberToken();
            $table->timestamps();
        });
    }    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
