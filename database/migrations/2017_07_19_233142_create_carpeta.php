<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarpeta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carpetas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_ramo');
            $table->date('fecha_subida');
            $table->String('archivo');
            $table->String('syllabus');
            $table->String('acta');
            $table->String('planilla');
            $table->foreign('id_ramo')
            ->references('id')
                    ->on('ramos');
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
        Schema::dropIfExists('carpetas');
    }
}
