<!DOCTYPE HTML>
<html>
<head>
<script id="allmobilize" charset="utf-8" src="style/js/allmobilize.min.js"></script>
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="alternate" media="handheld"  />
<!-- end 云适配 -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>找回密码-确认账号-校易聘</title>
<!-- <div class="web_root"  style="display:none">h</div> -->
<script type="text/javascript">
var ctx = "h";
console.log(1);
</script>
<link rel="Shortcut Icon" href="h/images/favicon.ico">
<link rel="stylesheet" type="text/css" href="{{env('APP_HOST')}}/style/css/style.css"/>
<script src="{{env('APP_HOST')}}/styles/js/jquery.js" type="text/javascript"></script>
</head>
<body id="login_bg">
	<div class="login_wrapper">
		<div class="login_header">
        	<a href="{{env('APP_HOST')}}"><img src="{{env('APP_HOST')}}/style/images/logo_white.png" width="285" height="62" alt="校易聘招聘" /></a>
            <div id="cloud_s"><img src="{{env('APP_HOST')}}/style/images/cloud_s.png" width="81" height="52" alt="cloud" /></div>
            <div id="cloud_m"><img src="{{env('APP_HOST')}}/style/images/cloud_m.png" width="136" height="95"  alt="cloud" /></div>
        </div>        
		 <div class="login_box" style="overflow:auto;">
		 	<h3>找回密码-重置密码</h3>
        	<form id="loginForm" method="post" action="/newPro">
    	    	<input type="hidden" id="resubmitToken" name="_token" value="<?php echo csrf_token(); ?>" />
				<input type="hidden" id="email" name="u_email" value="<?php echo $email; ?>" />
				<input type="password" id="password" name="password" value="" tabindex="1" placeholder="请填写您的新密码" />
				<input type="password" id="pwd" name="u_pwd" value="" tabindex="2" placeholder="再次输入密码" />
				<span class="error" style="display:none;" id="beError"></span>
			    <label class="fl" for="remember">
			    	</br>
			    </label>
			    <button style="color:#fff;"  class="submitLogin" title="完 &nbsp;&nbsp; 成"/>
			    	完 &nbsp;&nbsp; 成
			    </button>
			</form>
			<div class="login_right">
			    <div id="hzy_fast_login">
	                <img src="{{env('APP_HOST')}}/style/images/zp.jpg" width="120px" alt="招聘图片">
                </div>
            </div>
        </div>
        <div class="login_box_btm"></div>
    </div>

<script type="text/javascript">
$(function(){
	//验证表单
	$('#loginForm').submit(function() {
		var rest = false;
		var email = $('#email').val();
		var password = $('#password').val();
		var pwd = $('#pwd').val();
		if(password==""){
			var str = '密码不能为空';
			$('#beError').attr('style','');
			$('#beError').text('');
			$('#beError').append(str);
			return rest;
		}
		if(password != pwd) {
			var str = '两次输入的密码不一致';
			$('#beError').attr('style','');
			$('#beError').text('');
			$('#beError').append(str);
			return rest;
		}
	});
})
</script>
</body>
</html>