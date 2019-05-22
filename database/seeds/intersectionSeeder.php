<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class intersectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('intersections')->truncate();

        DB::table('intersections')->insert([
            'name' => '中正路/建國一路 交叉口',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('intersections')->insert([
            'name' => '建國一路/後港一路 交叉口',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

    }
}
