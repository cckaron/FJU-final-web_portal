<?php

namespace App\Http\Controllers;

use App\City;
use App\District;
use App\Intersection;
use App\Road;
use App\Road_maintenance_form;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class QueryController extends Controller
{
    public function __construct(){
        $this->middleware('auth:api')->except(['searchByCity', 'searchByDistrict', 'searchByRoad', 'searchByIntersection', 'test']);
    }

    public function searchByCity(){
        $city_id = Input::get('id');

        $city = City::where('id', $city_id)->first();

        $districts = $city->district()->get();

        return response()->json([
            'result' => 'success',
            'districts' => $districts,
        ], 200, array(), JSON_PRETTY_PRINT);
    }

    public function searchByDistrict(){
        $district_id = Input::get('id');

        $district = District::where('id', $district_id)->first();

        $roads = $district->road()->get();

        return response()->json([
            'result' => 'success',
            'roads' => $roads,
        ], 200, array(), JSON_PRETTY_PRINT);
    }

    public function searchByRoad(){
        $road_id = Input::get('id');

        $road = Road::where('id', $road_id)->first();

        $intersections = $road->intersection()->get();

        return response()->json([
            'result' => 'success',
            'intersections' => $intersections,
        ], 200, array(), JSON_PRETTY_PRINT);
    }

    public function searchByIntersection(){
        $intersection_id = Input::get('id');

        $intersection = Intersection::where('id', $intersection_id)->first();

        $roads = $intersection->road()->get();

        $lights = $intersection->light()->get();

        //判斷當前行進方向
        if ($lights[0]->now_color == 'red'){
            //現在是中正路紅燈
            $now_direct = "中正路";

        } else {
            //現在是建國一路紅燈
            $now_direct = "建國一路";
        }

        $now_second = $lights[0]->now_second -2;

        return response()->json([
            'result' => 'success',
            'roads' => $roads,
            'lights' => $lights,
            'now_direct' => $now_direct,
            'now_second' => $now_second
        ], 200, array(), JSON_PRETTY_PRINT);
    }


    public function test(){
        $maintenance_forms = Road_maintenance_form::all();

        foreach ($maintenance_forms as $maintenance_form){
            $maintenance_form->name = DB::table('intersections')->where('id', $maintenance_form->intersections_id)->value('name');
        }

        return response()->json([
            'result' => 'success',
            'data' => $maintenance_forms
        ], 200, array(), JSON_PRETTY_PRINT);
    }


}
