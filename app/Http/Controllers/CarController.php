<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class CarController extends Controller
{
    public function reportCarCount(){
        $l1_car = DB::table('trafficflows')
            ->where('lights_id', 1)
            ->orderBy('updated_at', 'desc')
            ->value('car_count');

        $l2_car = DB::table('trafficflows')
            ->where('lights_id', 2)
            ->orderBy('updated_at', 'desc')
            ->value('car_count');

        $l3_car = DB::table('trafficflows')
            ->where('lights_id', 3)
            ->orderBy('updated_at', 'desc')
            ->value('car_count');

        $l4_car = DB::table('trafficflows')
            ->where('lights_id', 4)
            ->orderBy('updated_at', 'desc')
            ->value('car_count');

        $r1_car = $l1_car + $l2_car;
        $r2_car = $l3_car + $l4_car;

        return response()->json([
            'result' => 'success',
            'r1_car' => $r1_car,
            'r2_car' => $r2_car
        ], 200, array(), JSON_PRETTY_PRINT);
    }
}
