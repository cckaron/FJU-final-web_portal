<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            citySeeder::class,
            districtSeeder::class,
            roadSeeder::class,
            intersectionSeeder::class,
            intersection_roadSeeder::class,
            lightSeeder::class,
            ruleSeeder::class,
            conditionSeeder::class,
            userSeeder::class
        ]);
    }
}
