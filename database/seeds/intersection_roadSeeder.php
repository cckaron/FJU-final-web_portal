<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class intersection_roadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('intersection_road')->truncate();

        DB::table('intersection_road')->insert([
            'intersections_id' => 1,
            'roads_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('intersection_road')->insert([
            'intersections_id' => 1,
            'roads_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
