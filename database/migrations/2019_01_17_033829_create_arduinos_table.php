<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArduinosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arduinos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('light1')->nullable();
            $table->integer('light2')->nullable();
            $table->integer('light3')->nullable();
            $table->integer('light4')->nullable();
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
        Schema::dropIfExists('arduinos');
    }
}
