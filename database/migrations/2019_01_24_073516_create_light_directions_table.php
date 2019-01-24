<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLightDirectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('light_directions', function (Blueprint $table) {
            $table->integer('lights_id')->unsigned();
            $table->integer('directions_direct')->unsigned();
            $table->dateTime('time');
            $table->integer('car_count');
            $table->timestamps();

            $table->foreign('lights_id')
                ->references('id')
                ->on('lights')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->foreign('directions_direct')
                ->references('direct')
                ->on('directions')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->primary(['lights_id', 'directions_direct']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('light_directions');
    }
}
