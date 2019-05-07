<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class structureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //intersection
        DB::table('intersections')->insert([
            'name' => '路口(一)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        //road
        DB::table('roads')->insert([
            'name' => '方向(1)',
            'intersections_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('roads')->insert([
            'name' => '方向(2)',
            'intersections_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        //light
        DB::table('lights')->insert([
            'name' => '號誌(1)',
            'roads_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('lights')->insert([
            'name' => '號誌(2)',
            'roads_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('lights')->insert([
            'name' => '號誌(1)',
            'roads_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('lights')->insert([
            'name' => '號誌(2)',
            'roads_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        //rule
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
            'second' => 10,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('rules')->insert([
            'intersections_id' => 1,
            'name' => '紅燈車少/綠燈車多',
            'operator' => '*',
            'second' => 0.5,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('rules')->insert([
            'intersections_id' => 1,
            'name' => '紅燈車普通/綠燈車多',
            'operator' => '*',
            'second' => 1.25,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('rules')->insert([
            'intersections_id' => 1,
            'name' => '紅燈車少/綠燈車普通',
            'operator' => '*',
            'second' => 1.25,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('rules')->insert([
            'intersections_id' => 1,
            'name' => '紅燈車多/綠燈車少',
            'operator' => '*',
            'second' => 0.5,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('rules')->insert([
            'intersections_id' => 1,
            'name' => '紅燈車多/綠燈車普通',
            'operator' => '*',
            'second' => 0.75,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('rules')->insert([
            'intersections_id' => 1,
            'name' => '紅燈車普通/綠燈車少',
            'operator' => '*',
            'second' => 0.75,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        //condition
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
            'car_count' => 6,
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
            'car_count' => 6,
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
            'car_count' => 6,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('conditions')->insert([
            'rules_id' => 3,
            'name' => '綠燈',
            'color' => 'green',
            'operator' => '<=',
            'car_count' => 6,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        //rule 4
        DB::table('conditions')->insert([
            'rules_id' => 4,
            'name' => '紅燈',
            'color' => 'red',
            'operator' => '<=',
            'car_count' => 6,
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
            'car_count' => 6,
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
            'car_count' => 6,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('conditions')->insert([
            'rules_id' => 6,
            'name' => '綠燈',
            'color' => 'green',
            'operator' => '>',
            'car_count' => 6,
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
            'car_count' => 6,
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
            'car_count' => 6,
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
            'car_count' => 6,
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
            'car_count' => 6,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
