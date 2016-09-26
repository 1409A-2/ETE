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
	// 验证公司邮箱
	Route::get('adopt','Index\InfoController@adoptVerify');
    //前台
    Route::get('/','Index\IndexController@index');
	Route::get('postPreview','Index\IndexController@postPreview');//查看职位详情
	Route::get('feedBack','Index\IndexController@feedBack');//前台用户反馈信息
	// 微信用户整合
	Route::get('registerWeixin.html','Index\IndexController@registerWeixin');
	Route::post('registerProne','Index\IndexController@registerProne');
    //跳转职业详情
    Route::get('jump','Index\IndexController@jump');
    Route::get('jumpSearch','Index\IndexController@jumpSearch');  //跳转查询职位详情
    // 订阅职位 
    Route::get('te','Index\FeedbackController@te');
    Route::get('subscribe','Index\FeedbackController@subscribe');	// 订阅职位 
    Route::post('subscribeEmail','Index\FeedbackController@subscribeEmail');	// 订阅职位 的发送邮件
    Route::post('subscribeDel','Index\FeedbackController@subscribeDel'); 	//删除订阅器  
	// 注册发送邮件
	Route::get('mail/send','MailController@send');
	Route::get('checkEamil','Index\IndexController@sendMail');

	//登录注册
	Route::get('login.html','Index\LoginController@login');
	Route::get('register.html','Index\LoginController@register');
	Route::post('registerPro','Index\LoginController@registerPro');
	Route::post('loginPro','Index\LoginController@loginPro');
	Route::controller('login','Index\LoginController');
	Route::get('email','Index\LoginController@email');
	Route::get('loginOut.html','Index\LoginController@loginOut');
	Route::get('pwdBack.html','Index\LoginController@pwdBack');
	Route::post('backPro','Index\LoginController@backPro');
	Route::get('newPwd.html','Index\LoginController@newPwd');
	Route::post('newPro','Index\LoginController@newPro');
	Route::get('twoPwd.html','Index\LoginController@twoPwd');
	Route::get('resPwd.html','Index\LoginController@resPwd');


	//用户个人信息
	Route::group(['middleware' => 'login'], function () {
		//完善公司基本信息（必填）
        Route::get('info','Index\InfoController@checkCompany');
        Route::get('sendEamil','Index\InfoController@sendMail');
        Route::post('company1pro','Index\InfoController@companyEmail');
        Route::post('company2pro','Index\InfoController@companyName');
        Route::get('detailed','Index\DetailedController@index');//必填 1
        Route::post('info1pro','Index\DetailedController@basePro');//提交1
        //账号设置
        Route::get('accountBind.html','Index\AccountController@accountBind');
        Route::get('updatePwd.html','Index\AccountController@updatePwd');
        Route::post('upPwdPro','Index\AccountController@upPwdPro');
        Route::get('unAccount','Index\AccountController@unAccount');
        Route::get('accountPro','Index\AccountController@accountPro');

		//这是发布职位控制
		Route::group(['middleware' => 'company'], function () {

			Route::get('postOffice','Index\IndustryController@postOffice');
			Route::post('postOffice_add','Index\IndustryController@postOfficeAdd');//发布职位
			Route::get('postOffice_issue','Index\IndustryController@postOfficeIssue');//发布成功
			Route::get('postOffice_list','Index\IndustryController@postOfficeList');//预览职位
			Route::get('postOffice_preview','Index\IndustryController@postOfficePreview');//

			//公司查看简历
			Route::get('pendingResume','Index\IndustryController@pendingResume');
			Route::get('nndetermined','Index\IndustryController@unDetermined');//查看公司简历的状态
			Route::get('canInterviewResumes','Index\IndustryController@canInterviewResumes');//查看待定简历
			Route::get('nndetermineds','Index\IndustryController@deterMined');//执行待定与不合适
			Route::get('nndeterminedsEmail','Index\IndustryController@deterMinedEmail');//面试成功和发送邮件
			Route::get('nndeterminedEmail','Index\IndustryController@unDeterminedEmail');//面试成功和发送邮件haveNoticeResumes
			Route::get('haveNoticeResumes','Index\IndustryController@haveNoticeResumes');//查看已发送邮件的简历
			Route::get('haveRefuseResumes','Index\IndustryController@haveRefuseResumes');//查看不合适的简历
			Route::get('preview','Index\IndustryController@preview');//公司查看简历详情
			Route::get('undeterminedOffer','Index\IndustryController@undeterminedOffer');//公司发送Offer给用户   undeterminedOffer
			Route::get('positions','Index\IndustryController@positions');//查看有效职位  positions
			Route::get('positionsdown','Index\IndustryController@positionsDown');//查看有效职位  positionsdown
			Route::get('positionsType','Index\IndustryController@positionsType');//职位上下线管理	positionsType
			Route::get('positionsDel','Index\IndustryController@positionsDel');//删除职位   positionsDel



			//完善公司的信息

			Route::get('detailed_info2','Index\DetailedController@detailedLabel');// 可选 2
			Route::post('info2Pro','Index\DetailedController@labelPro');
			Route::get('detailed_info3','Index\DetailedController@detailedTeam');// 可选 3
			Route::post('info3Pro','Index\DetailedController@teamPro');
			Route::get('detailed_info4','Index\DetailedController@detailedProduct');// 可选 4
			Route::post('info4Pro','Index\DetailedController@productPro');
			Route::get('detailed_info5','Index\DetailedController@detailedIntro');// 可选 5
			Route::post('info5Pro','Index\DetailedController@introPro');// 可选 5


			//公司查看一拍结果 
			Route::get('companyAllBeat', 'Index\IndustryController@companyAllBeat');//公司查看一拍页面   
			Route::get('companyBeat', 'Index\beatController@companyBeat');//查看一拍页面信息
			Route::get('beatYes', 'Index\beatController@beatYes');//添加公司的一拍   
			Route::get('companyBeatEmail', 'Index\IndustryController@companyBeatEmail');// 公司发送offer
		});
        Route::post('getcollected','Index\IndexController@getCollected');// 是否收藏职位
        Route::post('collectionPosition','Index\IndexController@collectionPosition');// 收藏职位
        Route::post('cancelCollected','Index\IndexController@cancelCollected');// 取消收藏职位
        Route::get('collectedPosition','Index\IndexController@collectedPosition');// 取消收藏职位
    });
    Route::get('downloadResume','Index\IndustryController@downloadResume');//下载简历   	downloadResume

//我的简历
    Route::group(['middleware' => 'resume'], function () {
        Route::get('resumeList', 'Index\ResumeController@index'); ///简历
        Route::post('educationPro', 'Index\ResumeController@educationPro');//个人资料
        Route::post('educationUpload', 'Index\ResumeController@educationUpload');//个人头像
        Route::post('educationDesc', 'Index\ResumeController@educationDesc');//自我描述

        Route::post('schoolPro', 'Index\ResumeController@schoolPro');//教育背景
        Route::get('schoolDel', 'Index\ResumeController@schoolDel');//教育背景

        Route::post('worksAdd', 'Index\ResumeController@worksAdd');//添加作品
        Route::get('worksDel', 'Index\ResumeController@worksDel');//删除作品

        Route::post('porjectAdd', 'Index\ResumeController@porjectAdd');//添加项目
        Route::get('porjectSel', 'Index\ResumeController@porjectSel');//查询项目
        Route::get('porjectDel', 'Index\ResumeController@porjectDel');//删除项目

        Route::post('expectedAdd', 'Index\ResumeController@expectedAdd');//添加(修改)期望工作
        Route::get('expectedDel', 'Index\ResumeController@expectedDel');//删除期望工作


        Route::get('previewList/{id}', 'Index\ResumeController@previewList');//简历预览

        //投递简历
        Route::get('remusePro/{id}', 'Index\ResumeController@remusePro');//投递简历添加
        Route::get('remuseShow', 'Index\ResumeController@remuseShow');//投递简历和对应状况查看

        //一拍
        Route::get('beatIndex', 'Index\beatController@beatIndex');//一拍首页
        Route::get('beatRaiders', 'Index\beatController@beatRaiders');//一拍攻略注册前
        Route::get('beatRaider', 'Index\beatController@beatRaider');//一拍攻略注册后
        Route::get('beatInfo', 'Index\beatController@beatInfo');//一拍添加显示
        Route::get('beatPhone', 'Index\beatController@beatPhone');//一拍发送手机验证码
        Route::get('codePro', 'Index\beatController@codePro');//一拍验证手机验证码

        Route::post('beatPro', 'Index\beatController@beatPro');//一拍添加入库
        Route::post('beatReason', 'Index\beatController@beatReason');//一拍取消上场

        Route::get('beatCenter', 'Index\beatController@beatCenter');//一拍个人中心
        Route::get('beatProfile', 'Index\beatController@beatProfile');//一拍我的履历
//        Route::get('beatInvited', 'Index\beatController@beatInvited');//一拍我的邀约
//        Route::get('beatReward', 'Index\beatController@beatReward');//一拍我的Offer



    });
    Route::get('companylist','Index\CompanyController@index');// 可选 5
	Route::get('companyinfo','Index\CompanyController@enterpriseInfo');// 可选 5

	//后台
    Route::get('admin','Admin\AdminController@admin');
     	//登录
		Route::post('adminLogin','Admin\AdminController@adminLogin');
    Route::group(['middleware'=>'admin'],function(){
		//后台首页
		Route::get('adminIndex','Admin\AdminController@adminIndex');
		Route::get('adminMaterial','Admin\MaterialController@carousel');
		Route::post('adminMaterialPro','Admin\MaterialController@carouselPro');
		Route::get('upcarousel','Admin\MaterialController@upCarousel');
		Route::post('upCarouselPro','Admin\MaterialController@upCarouselPro');
		Route::get('delcarousel','Admin\MaterialController@delCarousel');
		Route::post('batchDelCarousel','Admin\MaterialController@batchDelCarousel');
		//用户模块
		Route::get('adminUser','Admin\UserController@adminUser');//用户的主菜单页面
		Route::get('adminUserList','Admin\UserController@adminUserList');//用户列表 后台管理用户  adminUserList
		Route::get('adminUserDel','Admin\UserController@adminUserDel');//删除用户  adminUserDel
		//友情连接
		Route::get('adminFriendShip','Admin\MaterialController@friendShipLink');
        Route::post('friendLinkPro','Admin\MaterialController@friendLinkPro');
        Route::get('uplink','Admin\MaterialController@upLink');
        Route::get('dellink','Admin\MaterialController@delLink');
        Route::post('upLinkPro','Admin\MaterialController@upLinkPro');
        Route::post('batchDelLink','Admin\MaterialController@delLinkSome');

        // 后台行业管理
        Route::get('adminIndustryList','Admin\IndustryController@adminIndustryList');
        Route::get('adminIndustryAdd','Admin\IndustryController@adminIndustryAdd');
        Route::post('industryAddPro','Admin\IndustryController@industryAddPro');
        Route::get('adminIndustryDel','Admin\IndustryController@adminIndustryDel');
        Route::get('adminIndustryUp','Admin\IndustryController@adminIndustryUp');
        Route::post('industryUpPro','Admin\IndustryController@industryUpPro');
        Route::get('adminIndustryHot','Admin\IndustryController@adminIndustryHot');

		//推荐网站
		Route::get('adminRecommend','Admin\MaterialController@recommendSite');
		Route::post('adminRecommendPro','Admin\MaterialController@recommendSitePro');
		Route::get('upsite','Admin\MaterialController@upSite');
		Route::post('upSitePro','Admin\MaterialController@upSitePro');
		Route::get('delsite','Admin\MaterialController@delSite');
		Route::post('batchDelSite','Admin\MaterialController@batchDelSite');

		//用户反馈信息模块   
		Route::get('feedBackList','Admin\FeekController@feedBackList'); // 后台显示用户反馈的信息列表
		Route::get('feedBackDel','Admin\FeekController@feedBackDel'); //用户反馈信息删除  
		Route::get('feedBackDele','Admin\FeekController@feedBackDele'); //确认用户反馈信息删除  
		Route::get('feedBackHandle','Admin\FeekController@feedBackHandle');//用户反馈信息管理
		Route::get('feedBackEmail','Admin\FeekController@feedBackEmail');//反馈手机没打通，发邮件通知 feedBackEmail

		//后台订阅操作
		Route::get('adminSubscribe','Admin\SubscribeController@adminSubscribe');//后台管理订阅功能  adminSubscribe
		Route::get('subscribeDelete','Admin\SubscribeController@subscribeDelete');//删除订阅信息  //发邮件通知用户  subscribeDelete

        //注销退出
        Route::get('cancellation','Admin\AdminController@cancellation');
	});
});