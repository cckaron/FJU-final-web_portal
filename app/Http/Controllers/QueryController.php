<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class QueryController extends Controller
{
    public function __construct(){
        $this->middleware('auth:api')->except('searchByCity');
    }

    public function searchByCity(){
        $city_id = Input::get('id');

        $city = City::where('id', $city_id)->first();

        $districts = $city->district()->get();

        foreach($districts as $district){
            $district->road = $district->road()->get();
        }


        return response()->json([
            'result' => 'success',
            'districts' => $districts,
            'road' => $road
        ]);
    }
}
