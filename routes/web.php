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

Route::get('login', [
    'uses' => 'authController@signInPage',
    'as' => 'login'
]);

Route::post('/signIn', [
    'uses' => 'AuthController@postSignIn',
    'as' => 'auth.signIn'
]);

// Password Reset Routes...
Route::post('password/email', [
    'as' => 'password.email',
    'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail'
]);
Route::get('password/reset', [
    'as' => 'password.request',
    'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm'
]);
Route::post('password/reset', [
    'as' => 'password.update',
    'uses' => 'Auth\ResetPasswordController@reset'
]);
Route::get('password/reset/{token}', [
    'as' => 'password.reset',
    'uses' => 'Auth\ResetPasswordController@showResetForm'
]);

Route::group(['prefix' => 'auth'], function(){
    Route::get('/sign-out', [
        'uses' => 'authController@getSignOut',
        'as' => 'auth.signOut',
    ]);
});

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [
        'uses' => 'MainController@getIndex',
        'as' => 'main.index'
    ]);

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

    Route::get('/user/manage', [
        'uses' => 'MainController@getUserManage',
        'as' => 'user.manage'
    ]);

    Route::get('/user/delete/{id}', [
        'uses' => 'MainController@deleteUser',
        'as' => 'user.delete'
    ]);
});


Route::get('/arduino/{now_direct}/{now_sec}', [
   'uses' => 'ArduinoController@getCurrentInfo',
   'as' => 'arduino.currentInfo'
]);

Route::get('/judgeRule/{intersection_id}/{l1_car}/{l2_car}/{l3_car}/{l4_car}/{open}', [
   'uses' => 'RuleController@judgeRule',
   'as' => 'rule.judge'
]);

Route::group(['prefix' => 'ajax'], function(){
    Route::get('/changeCity', [
        'uses' => 'ajaxController@changeCity',
        'as' => 'select.changeCity',
    ]);
});

Route::get('/home', 'HomeController@index')->name('home');
