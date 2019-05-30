<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ruleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('rules')->truncate();

        DB::table('rules')->insert([
            'intersections_id' => 1,
            'name' => '紅燈車多/綠燈車多',
            'operator' => '+',
            'second' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('rules')->insert([
            'intersections_id' => 1,
            'name' => '紅燈車普通/綠燈車普通',
            'operator' => '+',
            'second' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('rules')->insert([
            'intersections_id' => 1,
            'name' => '紅燈車少/綠燈車少',
            'operator' => '=',
            'second' => 11,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('rules')->insert([
            'intersections_id' => 1,
            'name' => '紅燈車少/綠燈車多',
            'operator' => '=',
            'second' => 101,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('rules')->insert([
            'intersections_id' => 1,
            'name' => '紅燈車普通/綠燈車多',
            'operator' => '=',
            'second' => 101,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('rules')->insert([
            'intersections_id' => 1,
            'name' => '紅燈車少/綠燈車普通',
            'operator' => '=',
            'second' => 101,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('rules')->insert([
            'intersections_id' => 1,
            'name' => '紅燈車多/綠燈車少',
            'operator' => '=',
            'second' => 11,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('rules')->insert([
            'intersections_id' => 1,
            'name' => '紅燈車多/綠燈車普通',
            'operator' => '=',
            'second' => 11,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('rules')->insert([
            'intersections_id' => 1,
            'name' => '紅燈車普通/綠燈車少',
            'operator' => '=',
            'second' => 11,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
