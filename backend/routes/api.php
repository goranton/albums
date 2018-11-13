<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/groups/{secret}', 'Api\GroupsController@index');
Route::get('/elements/{secret}', 'Api\ElementsController@index');
Route::post('/elements/update/names', 'Api\ElementsController@storeNames');
