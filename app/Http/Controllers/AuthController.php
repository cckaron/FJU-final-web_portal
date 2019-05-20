<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except(['signInPage', 'postSignIn', 'getSignOut', 'login']);
    }

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
        return redirect()->route('login');
    }

    public function login()
    {
        $credentials = request(['account', 'password']);

        if (! $token = JWTAuth::attempt($credentials, ['exp' => Carbon::now()->addDays(7)->timestamp])) {
            return response()->json(['result' => 'fail', 'message' => 'invalid credentials'], 401);
        }

        return response()->json(['result' => 'success', 'token' => $token]);
    }

    public function me()
    {
        return response()->json(auth()->user());
    }

    public function logout()
    {
        auth()->logout();
        return response()->json(['status' => 0]);
    }
}
