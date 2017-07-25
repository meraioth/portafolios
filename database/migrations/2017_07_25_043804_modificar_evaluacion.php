<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModificarEvaluacion extends Migration
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
            $table->string('nombre');
            $table->string('tipo');
            $table->string('buena');
            $table->string('media');
            $table->string('mala');
            $table->string('otro');
            $table->string('pauta');
            $table->integer('carpeta_id')->unsigned();

            $table->foreign('carpeta_id')
            ->references('id')
                    ->on('carpetas');

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
       Schema::dropIfExists('evaluacions');
    }
}

