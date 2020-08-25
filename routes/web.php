<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('lang/{ln}','Lang\LangController@ln')->name('lang');

Route::group(['middleware'=>['langCheck']], function (){
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

//-----------------------Profile-------------------------------
    Route::group(['namespace'=>'Profile'],function()
    {
        Route::get('profile/{id}', 'ProfileController@show')->name('profile.show');
});
//-----------------------Access--------------------------------
Route::group(['middleware'=>['access'],'namespace' => 'Admin'], function(){
    Route::get('adminPortal','AdminController@index')->name('admin.Portal');
});



});
