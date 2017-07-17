<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RamosMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ramos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('codigo_asignatura');
            $table->integer('ano');
            $table->integer('semestre');
            $table->foreign('codigo_asignatura')
                    ->references('codigo')
                    ->on('asignaturas');
            $table->unique([
                'codigo_asignatura','ano','semestre']);
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
        Schema::dropIfExists('ramos');
    }
}
