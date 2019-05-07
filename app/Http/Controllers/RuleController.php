<?php

namespace App\Http\Controllers;

use App\Road;
use App\Rule;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RuleController extends Controller
{
    public function judgeRule($road1_id, $road2_id, $road1_car_count, $road2_car_count){
        //區分哪一條路是紅燈，哪一條是綠燈
        $road1 = Road::where('id', $road1_id)->first();

        if ($road1->light()->first()->now_color == 'red'){
            $road1_color = 'red';
            $road2_color = 'green';

            $red_car_count = $road1_car_count;
            $green_car_count = $road2_car_count;
        } else {
            $road1_color = 'green';
            $road2_color = 'red';

            $red_car_count = $road2_car_count;
            $green_car_count = $road1_car_count;
        }

        //判斷哪個規則成立
        $rules = Rule::all();
        $ans = null;
        foreach($rules as $rule){
            //取得規則的所有條件
            $conditions = $rule->condition()->get();

            //所有條件都成立
            if ($this->checkRuleConfirm($conditions, $red_car_count, $green_car_count)){
                $ans = $rule;
                break;
            }
        }

        $url = 'http://192.168.50.126/change?operand=';

        switch ($ans->operator){
            case "+":
                $url .= "1";
                break;
            case "-":
                $url .= "2";
                break;
            case "*":
                $url .= "3";
                break;
            case "/":
                $url .= "4";
                break;
        }

        $url .= "&second=".$ans->second;

//        $client = new \GuzzleHttp\Client();
//        try {
//            $res = $client->request('GET', $url);
//        } catch (GuzzleException $e) {
//            Log::info($e);
//        }

        return $ans->id;
    }

    private function checkRuleConfirm($conditions, $red_car_count, $green_car_count){
        //檢查每一個條件是否都成立
        foreach($conditions as $condition){
            //條件是紅燈
            if ($condition->color == 'red'){
                if(!$this->judge($condition, $red_car_count)){
                    return false;
                }
            } else { //條件是綠燈
                if(!$this->judge($condition, $green_car_count)){
                    return false;
                }
            }

        }
        return true;
    }

    private function judge($condition, $car_count){
        switch ($condition->operator){
            case ">":
                return $car_count > $condition->car_count ? true:false;
                break;
            case "<":
                return $car_count < $condition->car_count ? true:false;
                break;
            case "=":
                return $car_count == $condition->car_count ? true:false;
                break;
            case ">=":
                return $car_count >= $condition->car_count ? true:false;
                break;
            case "<=":
                return $car_count <= $condition->car_count ? true:false;
                break;
        }
    }

}
