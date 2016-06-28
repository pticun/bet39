<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('/home');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/match','MatchController@index');


Route::get('/admin', function(){
	return view('admin');
})->middleware('admin');

Route::group(['middleware' => 'user'], function () {
    Route::get('bet', function (){
    	return view('bet');
    });

    Route::get('user','UserController@index');
});
