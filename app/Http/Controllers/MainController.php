<?php

namespace App\Http\Controllers;

use App\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function getIndex(){
        $rules = Rule::with('condition')->get();
        return view('index', [
            'rules' => $rules
        ]);
    }
    public function getRule(){
        $rules = Rule::with('condition')->get();

        return view('rule', [
            'rules' => $rules
        ]);
    }

    public function deleteRule($id){
        DB::table('rules')
            ->where('id', $id)
            ->delete();

        return redirect()->back();
    }

/*    public function getRule2(){
        $rules = Rule::with('condition')->get();
        return view('rule2', [
            'rules' => $rules
        ]);
    }*/

    public function getVideo(){
//        $direct_12_sec = DB::table('lights')
//            ->where('id', 1)
//            ->value('now_sec');
//
//        $direct_34_sec = DB::table('lights')
//            ->where('id', 3)
//            ->value('now_sec');
//
//        $direct_12_default = DB::table('lights')
//            ->where('id', 1)
//            ->value('default_sec');
//
//        $direct_34_default = DB::table('lights')
//            ->where('id', 3)
//            ->value('default_sec');

        return view('video', [
//            'direct_12_sec' => $direct_12_sec,
//            'direct_34_sec' => $direct_34_sec,
//            'direct_12_sec_default' => $direct_12_default,
//            'direct_34_sec_default' => $direct_34_default,
            ]);
    }
    public function getMember(){
        return view('member');
    }

    public function getMakeRule(){
        $rules = Rule::with('condition')->get();

        return view('makeRule', [
            'rules' => $rules
        ]);
    }
}
