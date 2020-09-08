<?php

use App\Http\Models\User;
use App\Post;
use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\Redis;
use \Illuminate\Support\Facades\Cache;

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
Auth::routes();
Route::get('lang/{ln}', 'Lang\LangController@ln')->name('lang');
Route::group(['middleware' => ['langCheck']], function () {
Route::group(['middleware'=>['auth']], function (){





    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

//-----------------------Profile-------------------------------
    Route::group(['namespace' => 'Profile'], function () {
        Route::get('profile/{id}', 'ProfileController@show')->name('profile.show');
        Route::post('profile/avatar/{id}', 'ProfileController@avatar')->name('profile.avatar');
        Route::get('profile/edit/{id}', 'ProfileController@edit')->name('profile.edit');
        Route::post('profile/update/{id}', 'ProfileController@update')->name('profile.update');
    });
//-----------------------Access--------------------------------
    Route::group(['middleware' => ['access']], function () {
        Route::get('adminPortal', 'Admin\AdminController@index')->name('admin.Portal');
        Route::get('authorPortal', 'Author\AuthorController@index')->name('author.Portal');
    });

});
    Route::get('index', 'UI\UIController@index')->name('index');
    Route::get('contact', 'UI\UIController@contact')->name('contact');

Route::get('/setting',function (){
   dd('setting page');
})->name('setting');
});

Route::get('test', function (){
   $x['name']= 'ali';
   $x['age']=10;
   dd(gettype($x),$x);
});

//---------------------------Exception-------------------------------
Route::get('exception', function(){
    try {

        \App\Http\Models\User::get(1021);
    }catch (Exception $exception){

        throw new \App\Exceptions\CostumException($exception->getMessage());
    };
});

Route::view('exception/view', 'exception\view');

Route::get('pay','Payment\PayOrderController@store');

Route::get('zagma/getPrice', 'PostController@getPrice');
Route::get('zagma/orderstatus', 'PostController@orderstatus');
Route::get('zagma/requestpricepostnew', 'PostController@requestpricepostnew');
Route::get('zagma/orderwitharray', 'PostController@orderwitharray');


Route::get('redis', function (){

    if (Redis::get('posts.all')){
        $posts=Redis::get('posts.all');

        return $posts;
    }
    $posts = User::all();
    Redis::setex('posts.all',60 * 60 * 24 , $posts);

    return $posts;
});


Route::get('/cache', function (){

    return Cache::remember('posts.all',60*60*24, function (){
        return Post::all();
    });
});


Route::get('redis/{id}','RedisController@index');
