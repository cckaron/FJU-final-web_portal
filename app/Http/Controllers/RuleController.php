<?php

namespace App\Http\Controllers;

use App\Intersection;
use App\Road;
use App\Rule;
use Carbon\Carbon;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RuleController extends Controller
{
    public function judgeRule($intersection_id, $l1_car, $l2_car, $l3_car, $l4_car, $open){
        $now_second = DB::table('lights')->where('id', 1)->value('now_second');

        //回報車流量
        DB::table('trafficflows')
            ->insert([
                'lights_id' => 1,
                'car_count' => $l1_car,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

        DB::table('trafficflows')
            ->insert([
                'lights_id' => 2,
                'car_count' => $l2_car,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

        DB::table('trafficflows')
            ->insert([
                'lights_id' => 3,
                'car_count' => $l3_car,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

        DB::table('trafficflows')
            ->insert([
                'lights_id' => 4,
                'car_count' => $l4_car,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

        //如果秒數小於10，設定為不合法
        if ($now_second < 10){
            return "illegal";
        }

        //車輛總和
        $road1_car_count = $l1_car + $l2_car;
        $road2_car_count = $l3_car + $l4_car;

        //區分哪一條路是紅燈，哪一條是綠燈
        $intersection = Intersection::where('id', $intersection_id)->first();

        $light_left = $intersection->light()->where('name', '中正路1')->first();
        if ($light_left->now_color == 'red'){ // 代表左右方向為紅燈，南北方向為綠燈
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

        $after_second = $now_second;
        switch ($ans->operator){
            case "+":
                $url .= "1";
                $after_second += $ans->second;
                break;
            case "-":
                $url .= "2";
                $after_second -= $ans->second;
                break;
            case "*":
                $url .= "3";
                $after_second *= $ans->second;
                break;
            case "/":
                $url .= "4";
                $after_second /= $ans->second;
                break;
            case "=":
                $url .= "5";
                $after_second = $ans->second;
                break;
        }

        $url .= "&second=".$ans->second;


        if ($open == 1 && $now_second <= 74 && $now_second >= 68){
            $client = new \GuzzleHttp\Client();
            try {
                $res = $client->request('GET', $url);

                //update seconds to adjusted seconds
                DB::table('lights')
                    ->where('id', 1)
                    ->update(['now_second' => $after_second]);

                DB::table('lights')
                    ->where('id', 2)
                    ->update(['now_second' => $after_second]);

                DB::table('lights')
                    ->where('id', 3)
                    ->update(['now_second' => $after_second]);

                DB::table('lights')
                    ->where('id', 4)
                    ->update(['now_second' => $after_second]);

            } catch (GuzzleException $e) {
                Log::info($e);
            }
        }


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
