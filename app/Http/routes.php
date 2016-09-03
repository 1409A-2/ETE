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

		//这是发布职位控制
	Route::get('postOffice','Index\industryController@postOffice');
	Route::post('postOffice_add','Index\industryController@postOffice_add');//发布职位
	Route::get('postOffice_issue','Index\industryController@postOffice_issue');//发布成功
	Route::get('postOffice_list','Index\industryController@postOffice_list');//预览职位
	Route::get('postOffice_preview','Index\industryController@postOffice_preview');//

		//公司查看简历
	Route::get('PendingResume','Index\industryController@PendingResume');
	Route::get('Nndetermined','Index\industryController@Nndetermined');//查看公司简历的状态
	Route::get('CanInterviewResumes','Index\industryController@CanInterviewResumes');//查看待定简历
	Route::get('Nndetermineds','Index\industryController@Nndetermineds');//执行待定与不合适
	Route::get('NndeterminedsEmail','Index\industryController@NndeterminedsEmail');//面试成功和发送邮件
	Route::get('NndeterminedEmail','Index\industryController@NndeterminedEmail');//面试成功和发送邮件haveNoticeResumes
	Route::get('haveNoticeResumes','Index\industryController@haveNoticeResumes');//查看已发送邮件的简历
	Route::get('haveRefuseResumes','Index\industryController@haveRefuseResumes');//查看不合适的简历
	Route::get('preview','Index\industryController@preview');//公司查看简历详情
});
