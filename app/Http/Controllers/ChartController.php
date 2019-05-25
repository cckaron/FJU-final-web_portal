<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ChartController extends Controller
{
    public function getPie_maintenance(){
        $intersection_id = Input::get('intersection_id');

        //取得維修單事件名稱 (array)
        $labels = DB::table('road_maintenance_forms')
            ->where('intersections_id', $intersection_id)
            ->pluck('content');

        //取得各事件的總和
        $counts = array();
        foreach( $labels as $label){
            $count = DB::table('road_maintenance_forms')
                ->where('content', $label)
                ->count();
            array_push($counts, $count);
        }

        $datasets = [];
        $datasets[] = [
            'data' => $counts,
            'backgroundColor' => [
                'rgba(255, 0, 0, 0.5)',
                'rgba(0, 255, 0, 0.5)',
            ],
        ];

        $data = [
            'datasets' => $datasets,
            'labels' => $labels
        ];

        return response()->json([
            'result' => 'success',
            'data' => $data,
        ], 200, array(), JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES);
    }

    public function getRealtime_flow(){

    }
}
