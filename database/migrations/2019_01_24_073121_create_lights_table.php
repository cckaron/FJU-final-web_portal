<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lights', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('roads_id')->unsigned();
            $table->integer('default_sec');
            $table->integer('now_sec');
            $table->integer('default_max_car');
            $table->integer('now_car');
            $table->timestamps();
            $table->foreign('roads_id')
                ->references('id')
                ->on('roads')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->index('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lights');
    }
}
