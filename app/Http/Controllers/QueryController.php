<?php

namespace App\Http\Controllers;

use App\City;
use App\District;
use App\Intersection;
use App\Road;
use App\Road_maintenance_form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class QueryController extends Controller
{
    public function __construct(){
        $this->middleware('auth:api')->except(['searchByCity', 'searchByDistrict', 'searchByRoad', 'test', 'test1']);
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

    public function test1(){
        $maintenance_forms = Road_maintenance_form::where('id', 2)->get();

        foreach ($maintenance_forms as $maintenance_form){
            $maintenance_form->name = DB::table('intersections')->where('id', $maintenance_form->intersections_id)->value('name');
        }

        return response()->json([
            'result' => 'success',
            'data' => $maintenance_forms
        ], 200, array(), JSON_PRETTY_PRINT);
    }
}
