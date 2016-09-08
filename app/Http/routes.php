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
Route::get('adminIndex','Admin\adminController@adminIndex');
Route::group(['middleware' => ['web']], function () {


//前台
	Route::get('/','Index\indexController@index');

	Route::get('postPreview','Index\indexController@postPreview');//查看职位详情
	//跳转职业详情
	Route::get('jump','Index\indexController@jump');


	// 注册发送邮件
	Route::get('mail/send','MailController@send');

	//登录注册
	Route::get('login.html','Index\loginController@login');
	Route::get('register.html','Index\loginController@register');
	Route::post('registerPro','Index\loginController@registerPro');
	Route::post('loginPro','Index\loginController@loginPro');
	Route::controller('login','Index\loginController');
	Route::get('email','Index\loginController@email');
	Route::get('loginOut.html','Index\LoginController@loginOut');



	//用户个人信息
	Route::group(['middleware' => 'login'], function () {
		//完善公司基本信息（必填）
        Route::get('info','Index\InfoController@checkCompany');
        Route::get('sendEamil','Index\InfoController@sendMail');
        Route::post('company1pro','Index\InfoController@companyEmail');
        Route::post('company2pro','Index\InfoController@companyName');

		//这是发布职位控制
		Route::group(['middleware' => 'company'], function () {

			Route::get('postOffice','Index\industryController@postOffice');
			Route::post('postOffice_add','Index\industryController@postOfficeAdd');//发布职位
			Route::get('postOffice_issue','Index\industryController@postOfficeIssue');//发布成功
			Route::get('postOffice_list','Index\industryController@postOfficeList');//预览职位
			Route::get('postOffice_preview','Index\industryController@postOfficePreview');//

			//公司查看简历
			Route::get('pendingResume','Index\industryController@pendingResume');
			Route::get('nndetermined','Index\industryController@unDetermined');//查看公司简历的状态
			Route::get('canInterviewResumes','Index\industryController@canInterviewResumes');//查看待定简历
			Route::get('nndetermineds','Index\industryController@deterMined');//执行待定与不合适
			Route::get('nndeterminedsEmail','Index\industryController@deterMinedEmail');//面试成功和发送邮件
			Route::get('nndeterminedEmail','Index\industryController@unDeterminedEmail');//面试成功和发送邮件haveNoticeResumes
			Route::get('haveNoticeResumes','Index\industryController@haveNoticeResumes');//查看已发送邮件的简历
			Route::get('haveRefuseResumes','Index\industryController@haveRefuseResumes');//查看不合适的简历
			Route::get('preview','Index\industryController@preview');//公司查看简历详情
			Route::get('positions','Index\industryController@positions');//查看有效职位  positions
			Route::get('positionsdown','Index\industryController@positionsDown');//查看有效职位  positionsdown
			Route::get('positionsType','Index\industryController@positionsType');//职位上下线管理	positionsType
			Route::get('positionsDel','Index\industryController@positionsDel');//删除职位   positionsDel
			Route::get('downloadResume','Index\industryController@downloadResume');//下载简历   	downloadResume



			//完善公司的信息
			Route::get('detailed','Index\DetailedController@index');//必填 1
			Route::post('info1pro','Index\DetailedController@basePro');//提交1
			Route::get('detailed_info2','Index\DetailedController@detailedLabel');// 可选 2
			Route::post('info2Pro','Index\DetailedController@labelPro');
			Route::get('detailed_info3','Index\DetailedController@detailedTeam');// 可选 3
			Route::post('info3Pro','Index\DetailedController@teamPro');
			Route::get('detailed_info4','Index\DetailedController@detailedProduct');// 可选 4
			Route::post('info4Pro','Index\DetailedController@productPro');
			Route::get('detailed_info5','Index\DetailedController@detailedIntro');// 可选 5
			Route::post('info5Pro','Index\DetailedController@introPro');// 可选 5

		});
    });

//我的简历
    Route::group(['middleware' => 'resume'], function () {
        Route::get('resumeList', 'Index\resumeController@index');
        Route::post('educationPro', 'Index\resumeController@educationPro');//个人资料
        Route::post('educationUpload', 'Index\resumeController@educationUpload');//个人头像
        Route::post('educationDesc', 'Index\resumeController@educationDesc');//自我描述

        Route::post('schoolPro', 'Index\resumeController@schoolPro');//教育背景

        Route::post('worksAdd', 'Index\resumeController@worksAdd');//添加作品
        Route::get('worksDel/{id}', 'Index\resumeController@worksDel');//删除作品

        Route::post('porjectAdd', 'Index\resumeController@porjectAdd');//添加项目
        Route::get('porjectDel/{id}', 'Index\resumeController@porjectDel');//删除项目

        Route::post('expectedAdd', 'Index\resumeController@expectedAdd');//添加(修改)期望工作
        Route::get('expectedDel/{id}', 'Index\resumeController@expectedDel');//删除期望工作


        Route::get('previewList/{id}', 'Index\resumeController@previewList');//简历预览

        //投递简历
        Route::get('remusePro/{id}', 'Index\resumeController@remusePro');//投递简历添加
        Route::get('remuseShow', 'Index\resumeController@remuseShow');//投递简历和对应状况查看
    });
    Route::get('companylist','Index\CompanyController@Index');// 可选 5
	Route::get('companyinfo','Index\CompanyController@enterpriseInfo');// 可选 5

	//后台
    Route::get('admin','Admin\AdminController@admin');
     	//登录
		Route::post('adminLogin','Admin\AdminController@adminLogin');
    Route::group(['middleware'=>'admin'],function(){
		//后台首页
		Route::get('adminIndex','Admin\AdminController@adminIndex');
	});
});