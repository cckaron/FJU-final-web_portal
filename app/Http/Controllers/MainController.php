<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function getIndex(){
        return view('index');
    }
    public function getRule(){
        return view('rule');
    }
    public function getVideo(){
        return view('video');
    }
    public function getMember(){
        return view('member');
    }
}
