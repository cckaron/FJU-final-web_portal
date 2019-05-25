<?php

namespace App\Http\Controllers;

use App\Road_maintenance_form;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Tymon\JWTAuth\Facades\JWTAuth;

class MaintainanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except('get');
    }

    public function get(){
        $intersections_id = Input::get('intersection_id');
        if ($intersections_id != null){
            $maintenance_forms = Road_maintenance_form::where('intersections_id', $intersections_id)->get();
        } else {
             $maintenance_forms = Road_maintenance_form::all();
        }

        foreach ($maintenance_forms as $maintenance_form){
            $maintenance_form->name = DB::table('intersections')->where('id', $maintenance_form->intersections_id)->value('name');
//            $maintenance_form->updated_at_diff = $maintenance_form->updated_at->diffForHumans();
        }

        return response()->json([
            'result' => 'success',
            'data' => $maintenance_forms
        ], 200, array(), JSON_PRETTY_PRINT);


    }

    public function generate(Request $request){
        $intersections_id = Input::get('intersections_id');
        $content = Input::get('content');

        if ($files = $request->file()){
            $filename = "";
            foreach($files as $file){
                $filename = 'cam.jpg';

                $filename = str_replace(' ', '_', $filename);
                //this line is really important!!!!!!!!!!!!!!
                setlocale(LC_ALL,'en_US.UTF-8');

                Storage::disk('public')->putFileAs(
                    'maintenance/'.$intersections_id , $file, $filename
                );
            }
        }

        $isExist = DB::table('road_maintenance_forms')
            ->where('intersections_id', $intersections_id)
            ->where('status', 1)
            ->where('content', $content)
            ->exists();

        if (! $isExist){
            DB::table('road_maintenance_forms')
                ->insert([
                    'intersections_id' => $intersections_id,
                    'content' => $content,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);

            $payload = JWTAuth::parseToken()->getPayload();
            $expires_at = date('d M Y h:i', $payload->get('exp'));

            return response()->json([
                'result' => 'generate success',
                'notify' => 1,
                'intersections_id' => $intersections_id,
                'content' => $content,
                'profile' => auth()->user(),
                'expires_at' => $expires_at
            ]);
        } else {
            return response()->json([
                'result' => 'maintenance has been exists',
                'notify' => 0,
                'profile' => auth()->user(),
            ]);
        }



    }

    public function edit(Request $request){

    }

    public function delete(Request $request){

    }
}
