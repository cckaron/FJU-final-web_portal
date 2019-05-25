<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;

class ArduinoController extends Controller
{
    public function getCurrentInfo($now_direct, $now_sec){
        if ($now_direct == 1){
            $this->setLight(1, 'red', $now_sec);
            $this->setLight(2, 'red', $now_sec);
            $this->setLight(3, 'green', $now_sec);
            $this->setLight(4, 'green', $now_sec);
        } else {
            $this->setLight(1, 'green', $now_sec);
            $this->setLight(2, 'green', $now_sec);
            $this->setLight(3, 'red', $now_sec);
            $this->setLight(4, 'red', $now_sec);
        }
    }

    private function setLight($id, $color, $second){
        DB::table('Lights')
            ->where('id', $id)
            ->update([
                'now_color' => $color,
                'now_second' => $second,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
    }

    public function adjustSecond(){
        $second = Input::get('second');
        $url = 'http://192.168.50.126/change?operator=5&second='.$second;

        $client = new \GuzzleHttp\Client();
        try {
            $res = $client->request('GET', $url);
        } catch (GuzzleException $e) {
            Log::info($e);
        }

        return response()->json([
            'result' => 'success',
        ], 200, array(), JSON_PRETTY_PRINT);
    }
}
