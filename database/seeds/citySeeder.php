<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class citySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('cities')->truncate();

        DB::table('cities')->insert([
            'name' => '新北市',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('cities')->insert([
            'name' => '台北市',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('cities')->insert([
            'name' => '桃園市',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('cities')->insert([
            'name' => '台中市',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('cities')->insert([
            'name' => '台南市',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('cities')->insert([
            'name' => '高雄市',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

    }
}
