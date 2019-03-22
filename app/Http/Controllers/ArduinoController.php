<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ArduinoController extends Controller
{
    public function getWriteSeconds($now_sec, $nowdirect){
        DB::table('Lights')
            ->where('id', 1)
            ->update([
                'now_sec' => $now_sec-1,
                'now_direct' => $nowdirect,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

        DB::table('Lights')
            ->where('id', 2)
            ->update([
                'now_sec' => $now_sec-1,
                'now_direct' => $nowdirect,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

        DB::table('Lights')
            ->where('id', 3)
            ->update([
                'now_sec' => $now_sec-1,
                'now_direct' => $nowdirect,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

        DB::table('Lights')
            ->where('id', 4)
            ->update([
                'now_sec' => $now_sec-1,
                'now_direct' => $nowdirect,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);    }

}
