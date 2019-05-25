<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class CarController extends Controller
{
    public function reportCarCount(){
        $road_id = Input::get('id');


        return response()->json([
            'result' => 'success',
        ], 200, array(), JSON_PRETTY_PRINT);
    }
}
