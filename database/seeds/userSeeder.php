<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('users')->truncate();

        //light
        DB::table('users')->insert([
            'account' => 'admin',
            'password' => bcrypt('admin'),
            'type' => 1,
            'name' => '管理員',
            'email' => '405402091@gapp.fju.edu.tw',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
