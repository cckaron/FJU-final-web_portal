<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class conditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('conditions')->truncate();

        //rule 1
        DB::table('conditions')->insert([
            'rules_id' => 1,
            'name' => '紅燈',
            'color' => 'red',
            'operator' => '>=',
            'car_count' => 12,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('conditions')->insert([
            'rules_id' => 1,
            'name' => '綠燈',
            'color' => 'green',
            'operator' => '>=',
            'car_count' => 12,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        //rule 2
        DB::table('conditions')->insert([
            'rules_id' => 2,
            'name' => '紅燈',
            'color' => 'red',
            'operator' => '>',
            'car_count' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('conditions')->insert([
            'rules_id' => 2,
            'name' => '紅燈',
            'color' => 'red',
            'operator' => '<',
            'car_count' => 12,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('conditions')->insert([
            'rules_id' => 2,
            'name' => '綠燈',
            'color' => 'green',
            'operator' => '>',
            'car_count' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('conditions')->insert([
            'rules_id' => 2,
            'name' => '綠燈',
            'color' => 'green',
            'operator' => '<',
            'car_count' => 12,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        /*DB::table('conditions')->insert([
            'rules_id' => 2,
            'name' => '綠燈',
            'color' => 'green',
            'operator' => '>',
            'car_count' => 6,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);*/

        //rule 3
        DB::table('conditions')->insert([
            'rules_id' => 3,
            'name' => '紅燈',
            'color' => 'red',
            'operator' => '<=',
            'car_count' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('conditions')->insert([
            'rules_id' => 3,
            'name' => '綠燈',
            'color' => 'green',
            'operator' => '<=',
            'car_count' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        //rule 4
        DB::table('conditions')->insert([
            'rules_id' => 4,
            'name' => '紅燈',
            'color' => 'red',
            'operator' => '<=',
            'car_count' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('conditions')->insert([
            'rules_id' => 4,
            'name' => '綠燈',
            'color' => 'green',
            'operator' => '>=',
            'car_count' => 12,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        //rule 5
        DB::table('conditions')->insert([
            'rules_id' => 5,
            'name' => '紅燈',
            'color' => 'red',
            'operator' => '>',
            'car_count' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('conditions')->insert([
            'rules_id' => 5,
            'name' => '紅燈',
            'color' => 'red',
            'operator' => '<',
            'car_count' => 12,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('conditions')->insert([
            'rules_id' => 5,
            'name' => '綠燈',
            'color' => 'green',
            'operator' => '>=',
            'car_count' => 12,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        //rule 6
        DB::table('conditions')->insert([
            'rules_id' => 6,
            'name' => '紅燈',
            'color' => 'red',
            'operator' => '<=',
            'car_count' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('conditions')->insert([
            'rules_id' => 6,
            'name' => '綠燈',
            'color' => 'green',
            'operator' => '>',
            'car_count' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('conditions')->insert([
            'rules_id' => 6,
            'name' => '綠燈',
            'color' => 'green',
            'operator' => '<',
            'car_count' => 12,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        //rule 7
        DB::table('conditions')->insert([
            'rules_id' => 7,
            'name' => '紅燈',
            'color' => 'red',
            'operator' => '>=',
            'car_count' => 12,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('conditions')->insert([
            'rules_id' => 7,
            'name' => '綠燈',
            'color' => 'green',
            'operator' => '<=',
            'car_count' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        //rule 8
        DB::table('conditions')->insert([
            'rules_id' => 8,
            'name' => '紅燈',
            'color' => 'red',
            'operator' => '>=',
            'car_count' => 12,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('conditions')->insert([
            'rules_id' => 8,
            'name' => '綠燈',
            'color' => 'green',
            'operator' => '>',
            'car_count' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('conditions')->insert([
            'rules_id' => 8,
            'name' => '綠燈',
            'color' => 'green',
            'operator' => '<',
            'car_count' => 12,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        //rule 9
        DB::table('conditions')->insert([
            'rules_id' => 9,
            'name' => '紅燈',
            'color' => 'red',
            'operator' => '>',
            'car_count' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('conditions')->insert([
            'rules_id' => 9,
            'name' => '紅燈',
            'color' => 'red',
            'operator' => '<',
            'car_count' => 12,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('conditions')->insert([
            'rules_id' => 9,
            'name' => '綠燈',
            'color' => 'green',
            'operator' => '<=',
            'car_count' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
