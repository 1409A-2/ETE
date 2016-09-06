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
	Route::get('positions','Index\industryController@positions');//查看有效职位  positions
	Route::get('positionsdown','Index\industryController@positionsdown');//查看有效职位  positionsdown
	Route::get('positionsType','Index\industryController@positionsType');//职位上下线管理	positionsType 
	Route::get('positionsDel','Index\industryController@positionsDel');//删除职位   positionsDel
	Route::get('downloadResume','Index\industryController@downloadResume');//下载简历   	downloadResume

	//用户个人信息
	Route::group(['middleware' => 'login'], function () {
		//完善公司基本信息（必填）
		Route::get('info','Index\InfoController@checkCompany');
		Route::get('sendEamil','Index\InfoController@sendMail');
		Route::post('company1pro','Index\InfoController@company1Pro');
		Route::post('company2pro','Index\InfoController@company2Pro');
		//完善公司的信息
		Route::get('detailed','Index\DetailedController@index');//必填 1
		Route::post('info1pro','Index\DetailedController@Info1Pro');//提交1
		Route::get('detailed_info2','Index\DetailedController@Info2');// 可选 2
		Route::post('info2Pro','Index\DetailedController@info2Pro');
		Route::get('detailed_info3','Index\DetailedController@Info3');// 可选 3
		Route::post('info3Pro','Index\DetailedController@info3Pro');
		Route::get('detailed_info4','Index\DetailedController@Info4');// 可选 4
		Route::post('info4Pro','Index\DetailedController@info4Pro');
		Route::get('detailed_info5','Index\DetailedController@Info5');// 可选 5
		Route::post('info5Pro','Index\DetailedController@info5Pro');// 可选 5

	});
	Route::get('companylist','Index\CompanyController@Index');// 可选 5
	//通过邮箱验证
	Route::get('adopt','Index\InfoController@adoptVerify');

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

    //投递简历
  
 



});
