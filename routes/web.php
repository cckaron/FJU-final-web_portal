<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [
    'uses' => 'MainController@getIndex',
    'as' => 'main.index'
]);

Route::get('/signIn', [
    'uses' => 'authController@signInPage',
    'as' => 'auth.signIn'
]);

Route::post('/signIn', [
    'uses' => 'authController@postSignIn',
    'as' => 'auth.signIn'
]);

Route::group(['prefix' => 'auth'], function(){
    Route::get('/sign-out', [
        'uses' => 'UserAuthController@getSignOut',
        'as' => 'auth.signOut',
    ]);
});

Route::group(['middleware' => 'auth'], function(){
    Route::get('/Rule', [
        'uses' => 'MainController@getRule',
        'as' => 'main.rule'
    ]);

    Route::get('/MakeRule/delete/{id}', [
        'uses' => 'MainController@deleteRule',
        'as' => 'rule.delete'
    ]);

    Route::get('/Video', [
        'uses' => 'MainController@getVideo',
        'as' => 'main.video'
    ]);

    Route::get('/Member', [
        'uses' => 'MainController@getMember',
        'as' => 'main.member'
    ]);

    Route::get('/MakeRule', [
        'uses' => 'MainController@getMakeRule',
        'as' => 'main.makerule'
    ]);
});


Route::get('/arduino/{now_direct}/{now_sec}', [
   'uses' => 'ArduinoController@getCurrentInfo',
   'as' => 'arduino.currentInfo'
]);

Route::get('/judgeRule/{road1_id}/{road2_id}/{road1_car_count}/{road2_car_count}', [
   'uses' => 'RuleController@judgeRule',
   'as' => 'rule.judge'
]);

Route::get('/home', 'HomeController@index')->name('home');
