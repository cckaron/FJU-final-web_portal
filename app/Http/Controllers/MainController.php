<?php

namespace App\Http\Controllers;

use App\City;
use App\Rule;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function getIndex(){
        $img = DB::table('road_maintenance_forms')
            ->where('id', 6)
            ->value('content');
        $user = Auth::user();
        $cities = null;
        //admin
        if ($user->type == 1){
            $cities = City::all();
        }

        $rules = Rule::with('condition')->get();

        return view('index', [
            'rules' => $rules,
            'cities' => $cities,
            'img' => $img,
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

    public function getUserManage(){
        $users = User::all();

        return view('users.manage', [
            'users' => $users
        ]);
    }

    public function deleteUser($id){
        DB::table('users')
            ->where('id', $id)
            ->delete();

        return redirect()->back()->with('message', '已成功刪除帳號！');
    }
}
