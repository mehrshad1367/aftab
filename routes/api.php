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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/zagma/getprice','Api\ZagmaController@getPrice');
Route::get('/zagma/orderstatus','Api\ZagmaController@orderStatus');
Route::get('/zagma/requestpricepostnew','Api\ZagmaController@requestPricePostNew');
Route::get('/zagma/orderwitharray','Api\ZagmaController@orderWithArray');
