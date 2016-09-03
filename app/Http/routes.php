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
    //前台
    Route::get('/','Index\indexController@index');
	Route::get('indexs','Index\indexController@indexs');
    //跳转职业详情
    Route::get('jump','Index\indexController@jump');


	//登录注册
	Route::get('login.html','Index\loginController@login');
	Route::get('register.html','Index\loginController@register');
	Route::post('registerPro','Index\loginController@registerPro');
	Route::post('loginPro','Index\loginController@loginPro');









































    //我的简历
    Route::get('jianli.html','Index\resumeController@index');
    Route::post('educationPro','Index\resumeController@educationPro');//个人资料
    Route::post('educationUpload','Index\resumeController@educationUpload');//个人头像
    Route::post('schoolPro','Index\resumeController@schoolPro');//教育背景
    Route::post('educationDesc','Index\resumeController@educationDesc');//自我描述
    Route::post('worksAdd','Index\resumeController@worksAdd');//添加作品
    Route::get('worksDel/{id}','Index\resumeController@worksDel');//删除作品
    Route::post('porjectAdd','Index\resumeController@porjectAdd');//添加项目
    Route::get('porjectDel/{id}','Index\resumeController@porjectDel');//删除项目
});
