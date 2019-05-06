<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

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

}
