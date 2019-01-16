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

//Route::get('/video', [
//    'uses' => '',
//    'as' => ''
//]);
//Route::get('/member', [
//    'uses' => '',
//    'as' => ''
//]);
