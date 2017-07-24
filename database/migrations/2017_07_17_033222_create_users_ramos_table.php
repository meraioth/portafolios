<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersRamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ramo_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('ramo_id')->unsigned();
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users');
            $table->foreign('ramo_id')
                    ->references('id')
                    ->on('ramos');
            $table->primary(['user_id','ramo_id']);        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_ramos');
    }
}
