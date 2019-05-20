<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBasicStructure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name')->nullable();
            $table->timestamps();

            $table->index('id');
        });

        Schema::create('districts', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('cities_id')->unsigned()->nullable();
            $table->string('name')->nullable();
            $table->timestamps();

            $table->index('id');
        });

        Schema::create('intersections', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->timestamps();

            $table->index('id');
        });

        Schema::create('roads', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('districts_id')->unsigned()->nullable();
            $table->string('name')->nullable();
            $table->timestamps();

            $table->index('id');
        });

        Schema::create('intersection_road', function (Blueprint $table) {
            $table->integer('intersections_id')->unsigned();
            $table->integer('roads_id')->unsigned();
            $table->primary(['intersections_id', 'roads_id']);
            $table->timestamps();
        });

        Schema::create('lights', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('intersections_id')->unsigned();
            $table->string('name')->nullable();
            $table->integer('now_second')->nullable();
            $table->string('now_color')->nullable();
            $table->integer('now_car_count')->nullable();
            $table->timestamps();

            $table->index('id');
        });

        Schema::create('rules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('intersections_id')->unsigned();
            $table->string('name')->nullable();
            $table->string('operator')->nullable();
            $table->float('second')->nullable();
            $table->timestamps();

            $table->index('id');
        });

        Schema::create('conditions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rules_id')->unsigned();
            $table->string('name');
            $table->string('color');
            $table->string('operator');
            $table->integer('car_count');
            $table->timestamps();
        });



        //foreign key
        Schema::table('districts', function (Blueprint $table) {
            $table->foreign('cities_id')->references('id')->on('cities')->onUpdate('CASCADE')->onDelete('CASCADE');
        });

        Schema::table('roads', function (Blueprint $table) {
            $table->foreign('districts_id')->references('id')->on('districts')->onUpdate('CASCADE')->onDelete('CASCADE');
        });

        Schema::table('intersection_road', function (Blueprint $table) {
            $table->foreign('intersections_id')
                ->references('id')->on('intersections')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
            $table->foreign('roads_id')
                ->references('id')->on('roads')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });

        Schema::table('lights', function (Blueprint $table) {
            $table->foreign('intersections_id')->references('id')->on('intersections')->onUpdate('CASCADE')->onDelete('CASCADE');
        });

        Schema::table('rules', function (Blueprint $table) {
            $table->foreign('intersections_id')->references('id')->on('intersections')->onUpdate('CASCADE')->onDelete('CASCADE');
        });

        Schema::table('conditions', function (Blueprint $table) {
            $table->foreign('rules_id')->references('id')->on('conditions')->onUpdate('CASCADE')->onDelete('CASCADE');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('basic_structure');
    }
}
