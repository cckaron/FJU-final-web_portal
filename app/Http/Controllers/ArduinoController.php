<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ArduinoController extends Controller
{
    public function getWriteSeconds($light1){
        DB::table('arduinos')
            ->where('id', 1)
            ->update(['light1' => $light1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
    }
}
