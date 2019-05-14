<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    public function signInPage(){
        return view('login');
    }
    public function postSignIn(Request $request){
        $user_data = array(
            'account' => $request->input('account'),
            'password' => $request->input('password')
        );
        if (Auth::attempt($user_data)){
            return redirect()->route('main.index');
        } else {
            return back()->with('message', '帳號或密碼錯誤');
        }
    }
    public function getSignOut(){
        Auth::logout();
        return redirect()->route('auth.signIn');
    }
}
