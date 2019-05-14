<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ajaxController extends Controller
{

    public function postChangeCourseContent(Request $request){
        $validation = Validator::make($request->all(), [
            'city_id' => 'required',
        ]);
        $city_id = $request->get('city_id');

        $error_array = array();
        $success_output = '';
        if ($validation->fails()){
            foreach($validation->messages()->getMessages() as $field_name => $messages)
            {
                $error_array[] = $messages;
            }
        } else {
            //TODO 查詢地區功能
            $city = City::where('id', $city_id)->first();
            $success_output = '成功';
        }

        $output = array(
            'error' => $error_array,
            'success' => $success_output,
        );
        echo json_encode($output);
    }
}
