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

Auth::routes();

Route::get('/', [
    'uses' => 'MainController@getIndex',
    'as' => 'main.index'
]);
Route::get('/Rule', [
    'uses' => 'MainController@getRule',
    'as' => 'main.rule'
]);
Route::get('/Video', [
    'uses' => 'MainController@getVideo',
    'as' => 'main.video'
]);

Route::get('/Member', [
    'uses' => 'MainController@getMember',
    'as' => 'main.member'
]);

Route::get('/arduino/{light1}', [
   'uses' => 'ArduinoController@getWriteSeconds',
   'as' => 'arduino.writeSeconds'
]);
