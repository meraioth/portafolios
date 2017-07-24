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
            $table->date('fecha_subida')->nullable();
            $table->string('planilla')->nullable();;
            $table->string('syllabus')->nullable();;
            $table->string('acta')->nullable();;
            $table->string('zip')->nullable();;
            $table->integer('ramo_id')->unsigned();
            $table->foreign('ramo_id')
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
