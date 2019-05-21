<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/users', function (Request $request) {
//    return $request->user();
//});

//auth
Route::group(['prefix' => 'auth'], function () {
    Route::get('/', 'AuthController@me');
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
});

//maintainance
Route::group(['prefix' => 'maintenance'], function () {
    Route::post('generate', 'MaintainanceController@generate');
});

//query
Route::group(['prefix' => 'query'], function () {
    Route::get('/city', 'QueryController@searchByCity');
    Route::get('/district', 'QueryController@searchByDistrict');
    Route::get('/road', 'QueryController@searchByRoad');
    Route::get('/test', 'QueryController@test');
    Route::get('/test1', 'QueryController@test1');

});
