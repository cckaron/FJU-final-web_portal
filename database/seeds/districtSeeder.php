<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class districtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('districts')->truncate();

        DB::table('districts')->insert([
            'name' => '新莊區',
            'cities_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('districts')->insert([
            'name' => '板橋區',
            'cities_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('districts')->insert([
            'name' => '中和區',
            'cities_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('districts')->insert([
            'name' => '永和區',
            'cities_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('districts')->insert([
            'name' => '土城區',
            'cities_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('districts')->insert([
            'name' => '樹林區',
            'cities_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('districts')->insert([
            'name' => '三峽區',
            'cities_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('districts')->insert([
            'name' => '鶯歌區',
            'cities_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('districts')->insert([
            'name' => '三重區',
            'cities_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('districts')->insert([
            'name' => '蘆洲區',
            'cities_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('districts')->insert([
            'name' => '五股區',
            'cities_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('districts')->insert([
            'name' => '泰山區',
            'cities_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
