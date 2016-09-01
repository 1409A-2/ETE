<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
	
    Route::get('/','Index\indexController@index');
	Route::get('indexs','Index\indexController@indexs');

	//登录注册
	Route::get('login.html','Index\loginController@login');
	Route::get('register.html','Index\loginController@register');
	Route::post('registerPro','Index\loginController@registerPro');
	Route::post('loginPro','Index\loginController@loginPro');
});
