<?php
use App\Model\User;
if(strpos($_SERVER['REQUEST_URI'],'?')){
	$url = substr($_SERVER['REQUEST_URI'],1,strpos($_SERVER['REQUEST_URI'],'?')-1);
}else{
	$url = substr($_SERVER['REQUEST_URI'],1);
}
?>
<!DOCTYPE HTML>
<html>
<head>
<style>
	#product-fk {bottom: 80px;cursor: pointer;height: 50px;left: 50%;margin-left: 588px;position: fixed;width: 50px;z-index: 21;}
	#feedback-icon {position: relative;}
	#feedback-icon {position: relative;}
	.fb-icon {background: rgba(0, 0, 0, 0) url("{{env('APP_HOST')}}/style/images/img/feedback_06c5af9.png") no-repeat scroll 0 0;height: 30px;margin: 0 auto;width: 30px;}
	.feedback {width:300px;height:450px;border-width:0;border-radius: 3px;transition: height 0.5s ease-out;z-index:99999;display: none;bottom:0;right:0;position:fixed;background: #fff;}
	.query_hint{display: none;z-index: 999999;width:100%;height:100%;position:fixed;top:0.1px;padding-top:22%; font-size:15px;color:#666;font-weight:bold;text-align:center;}
	.query_hint img{position:relative;top:10px;left:-8px;}
</style>
	<script id="allmobilize" charset="utf-8" src="{{env('APP_HOST')}}/style/js/allmobilize.min.js"></script>
	<meta http-equiv="Cache-Control" content="no-siteapp" />
	<link rel="alternate" media="handheld"  />
	<!-- end 云适配 -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>@yield('title','校易聘')</title>
	<meta name="baidu-site-verification" content="QIQ6KC1oZ6" />
	<script type="text/javascript">
		var ctx = "{{env('APP_HOST')}}";
		console.log(1);
	</script>
	<link rel="Shortcut Icon" href="h/images/favicon.ico">
	<link rel="stylesheet" type="text/css" href="{{env('APP_HOST')}}/style/css/feekback.css"/>
	<link rel="stylesheet" type="text/css" href="{{env('APP_HOST')}}/style/css/feekback2.css"/>
	<link rel="stylesheet" type="text/css" href="{{env('APP_HOST')}}/style/css/style.css"/>
	<link rel="stylesheet" type="text/css" href="{{env('APP_HOST')}}/style/css/external.min.css"/>
	<link rel="stylesheet" type="text/css" href="{{env('APP_HOST')}}/style/css/popup.css"/>
	<script src="{{env('APP_HOST')}}/style/js/jquery.1.10.1.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="{{env('APP_HOST')}}/style/js/jquery.lib.min.js"></script>
	<script src="{{env('APP_HOST')}}/style/js/ajaxfileupload.js" type="text/javascript"></script>     
	<!-- feedback -->
	<script type="text/javascript" src="{{env('APP_HOST')}}/style/js/additional-methods.js"></script>
	<!--[if lte IE 8]>
	<script type="text/javascript" src="{{env('APP_HOST')}}/style/js/excanvas.js"></script>
	<![endif]-->
	<script type="text/javascript">
		var youdao_conv_id = 271546;
	</script>
	<script type="text/javascript" src="{{env('APP_HOST')}}/style/js/conv.js"></script>
	<?php
	$user_data = User::selOne(session('u_id'));
	?>
</head>
<body>
<div id="body">
	<div id="header">
		<div class="wrapper">
			<a href="/" class="logo">
				<img src="style/images/logo.png" width="229" height="43" alt="校易聘-专注互联网招聘" />
			</a>
			<ul class="reset" id="navheader">
				<li @if($url=='') class="current" @endif><a href="/">首页</a></li>
				<li @if($url=='companylist') class="current" @endif ><a href="companylist" >公司</a></li>
				@if($user_data['u_cid']==0)
				<li @if($url=='resumeList') class="current" @endif  ><a href="resumeList" rel="nofollow">我的简历</a></li>
                    <li><a href="{{url('beatIndex')}}">一拍</a></li>
				@else
				<li @if($url=='detailed' || $url=='postOffice') class="current" @endif><a href="detailed" rel="nofollow">发布职位</a></li>
				<li @if($url=='companyBeat') class="current" @endif><a href="companyBeat" rel="nofollow">一拍</a></li>
				@endif

			</ul>
			<?php
			if(session('u_email')){
			?>
			<dl class="collapsible_menu">
				<dt>
					<span>{{session('u_email')}}&nbsp;</span>
					<span class="red dn" id="noticeDot-0"></span>
					<i></i>
				</dt>
				@if($user_data['u_cid']==0)
				<dd><a rel="nofollow" href="resumeList">我的简历</a></dd>
				<dd><a href="collectedPosition">我收藏的职位</a></dd>
				<dd class="btm"><a href="subscribe">我的订阅</a></dd>
				@else
				<dd><a href="detailed">我要招人</a></dd>
				@endif
				<dd><a href="updatePwd.html">帐号设置</a></dd>
				<dd class="logout"><a rel="nofollow" href="loginOut.html">退出</a></dd>
			</dl>
			<?php  }else{?>
			<ul class="loginTop">
				<li><a href="login.html" rel="nofollow">登录</a></li>
				<li>|</li>
				<li><a href="register.html" rel="nofollow">注册</a></li>
			</ul>
			<?php  }?>
		</div>
	</div>

	<!-- 中间内容开始 -->

	@yield('content')

			<!-- 中间内容结束 -->

	<div class="clear"></div>
	<!-- <div id="qrSide"><a></a></div> -->
	<!--  -->

	<!-- <div id="loginToolBar">
        <div>
            <em></em>
            <img src="style/images/footbar_logo.png" width="138" height="45" />
            <span class="companycount"></span>
            <span class="positioncount"></span>
            <a href="#loginPop" class="bar_login inline" title="登录"><i></i></a>
            <div class="right">
                <a href="register.html?from=index_footerbar" onclick="_hmt.push(['_trackEvent', 'button', 'click', 'register'])" class="bar_register" id="bar_register" target="_blank"><i></i></a>
            </div>
            <input type="hidden" id="cc" value="16002" />
            <input type="hidden" id="cp" value="96531" />
        </div>
    </div>
     -->
	<!-- -----------------------------------弹窗lightbox  --------------------------------------- -->
	<div style="display:none;">
		<!-- 登录框 -->
		<div id="loginPop" class="popup" style="height:240px;">
			<form id="loginForm">
				<input type="text" id="email" name="email" tabindex="1" placeholder="请输入登录邮箱地址" />
				<input type="password" id="password" name="password" tabindex="2" placeholder="请输入密码" />
				<span class="error" style="display:none;" id="beError"></span>
				<label class="fl" for="remember"><input type="checkbox" id="remember" value="" checked="checked" name="autoLogin" /> 记住我</label>
				<a href="h/reset.html" class="fr">忘记密码？</a>
				<input type="submit" id="submitLogin" value="登 &nbsp; &nbsp; 录" />
			</form>
			<div class="login_right">
				<div>还没有拉勾帐号？</div>
				<a href="register.html" class="registor_now">立即注册</a>
				<div class="login_others">使用以下帐号直接登录:</div>
				<a href="h/ologin/auth/sina.html" target="_blank" id="icon_wb" class="icon_wb" title="使用新浪微博帐号登录"></a>
				<a href="h/ologin/auth/qq.html" class="icon_qq" id="icon_qq" target="_blank" title="使用腾讯QQ帐号登录" ></a>
			</div>
		</div><!--/#loginPop-->
	</div>
	<!------------------------------------- end --------------------------------------- -->
	<script type="text/javascript" src="style/js/Chart.min.js"></script>
	<script type="text/javascript" src="style/js/home.min.js"></script>
	<script type="text/javascript" src="style/js/count.js"></script>
	<div class="clear"></div>
	<input type="hidden" id="resubmitToken" value="" />
	<a id="backtop" title="回到顶部" rel="nofollow"></a>
		
</div><!-- end #container -->
</div><!-- end #body -->
<div id="product-fk" style="bottom: 80px;">
<div id="feedback-icon">
<div class="fb-icon"></div>
<span style="font-size: 12px;">我要反馈</span>
</div>
</div>
<div id="footer">
	<div class="wrapper">
		<a href="#" target="_blank" rel="nofollow">联系我们</a>
		<a href="#" target="_blank">互联网公司导航</a>
		<a href="http://weibo.com/u/5570236185" target="_blank" rel="nofollow">校易聘微博</a>
		<div class="copyright">&copy;2016-2016 xiaoyipin <a target="_blank" href="http://www.ete.com">京ICP备14023790号-2</a></div>
	</div>
</div>

<script type="text/javascript" src="style/js/core.min.js"></script>
<script type="text/javascript" src="style/js/popup.min.js"></script>

<!-- <script src="style/js/wb.js" type="text/javascript" charset="utf-8"></script>
 -->
<div id="followDiv2" style="z-index: 10; position: fixed; width: 80px; height: 60px; left: 20px; top: 250px;">
<script type='text/javascript'>
    function yourFunction() {
    }
</script>
<script type='text/javascript'>
    (function(m, ei, q, i, a, j, s) {
        m[i] = m[i] || function() {
            (m[i].a = m[i].a || []).push(arguments)
        };
        j = ei.createElement(q),
            s = ei.getElementsByTagName(q)[0];
        j.async = true;
        j.charset = 'UTF-8';
        j.src = '//static.meiqia.com/dist/meiqia.js';
        s.parentNode.insertBefore(j, s);
    })(window, document, 'script', '_MEIQIA');
    _MEIQIA('entId', '32443');
    _MEIQIA('allSet', yourFunction);
</script>
<script type='text/javascript'>
    _MEIQIA('allSet', yourFunction);
    _MEIQIA('init');
</script>
<!-- <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=616859204&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:616859204:53" alt="校易聘官方客服" title="校易聘官方客服"/></a> -->
</div>

	<div class="feedback" style="display: none;">
	<div class="header">
		<span class="connect" style="display: none;">连接中...</span>
		<span class="btns">
		<i class="icon-base minimize"></i>
		<i class="icon-base close"></i>
		</span>
	</div>
		<p class="title">请留言，我们将尽快联系您！</p>
		<textarea id="feedbackText" class="feedback-text" placeholder="尊敬的用户您好，请把您遇到的问题以及您的联系方式告诉我们，我们会尽快与您联系。" name="feedbackText"></textarea>
		<span id="feedbackTexts"></span>
		<input id="telText" class="tel-text" type="text" placeholder="联系电话" name="tel">
		<span id="telTexts"></span>
		<input id="emailText" class="email-text" type="text" placeholder="邮箱" name="email">
		<span id="emailTexts"></span>
		<input class="submit-feedback" id="feedbackSubmit" type="button" value="留言" name="submit">
	</div>
		<div id="query_hint" class="query_hint">
	   		<img src="{{env('APP_HOST')}}/style/images/load.gif" />正在处理，请稍等...
	  	</div>
</body>
</html> 