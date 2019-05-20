<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Road_maintenance_forms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('intersections_id')->unsigned()->nullable();
            $table->longText('content')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
        });

        Schema::create('SNS', function (Blueprint $table) {
            $table->increments('id');
            $table->string('users_phone')->nullable();
            $table->integer('intersections_id')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::create('TrafficFlows', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lights_id')->unsigned()->nullable();
            $table->integer('car_count')->default(0);
            $table->timestamps();
        });

//      foreign key
        Schema::table('Road_maintenance_forms', function (Blueprint $table) {
            $table->foreign('intersections_id')->references('id')->on('intersections')->onUpdate('CASCADE')->onDelete('CASCADE');
        });

        Schema::table('SNS', function (Blueprint $table) {
            $table->foreign('users_phone')->references('phone')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
        });

        Schema::table('TrafficFlows', function (Blueprint $table) {
            $table->foreign('lights_id')->references('id')->on('lights')->onUpdate('CASCADE')->onDelete('CASCADE');
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
