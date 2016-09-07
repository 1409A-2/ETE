<!DOCTYPE HTML>
<html>
<head>
<script id="allmobilize" charset="utf-8" src="style/js/allmobilize.min.js"></script>
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="alternate" media="handheld"  />
<!-- end 云适配 -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>登录-校易聘</title>
<!-- <div class="web_root"  style="display:none">h</div> -->
<script type="text/javascript">
var ctx = "h";
console.log(1);
</script>
<link rel="Shortcut Icon" href="h/images/favicon.ico">
<link rel="stylesheet" type="text/css" href="{{env('APP_HOST')}}/style/css/style.css"/>
<script src="{{env('APP_HOST')}}/style/js/jquery.1.10.1.min.js" type="text/javascript"></script>
<script>var $110 = jQuery.noConflict();</script>
<script type="text/javascript" src="{{env('APP_HOST')}}/style/js/jquery.lib.min.js"></script>
<!-- <script type="text/javascript" src="{{env('APP_HOST')}}/style/js/core.min.js"></script> -->

<script type="text/javascript">
var youdao_conv_id = 271546; 
</script> 
<script type="text/javascript" src="style/js/conv.js"></script>
</head>

<body id="login_bg">
	<div class="login_wrapper">
		<div class="login_header">
        	<a href="h/"><img src="{{env('APP_HOST')}}/style/images/logo_white.png" width="285" height="62" alt="校易聘招聘" /></a>
            <div id="cloud_s"><img src="{{env('APP_HOST')}}/style/images/cloud_s.png" width="81" height="52" alt="cloud" /></div>
            <div id="cloud_m"><img src="{{env('APP_HOST')}}/style/images/cloud_m.png" width="136" height="95"  alt="cloud" /></div>
        </div>
        
    	<input type="hidden" id="resubmitToken" value="<?php echo csrf_token(); ?>" />		
		 <div class="login_box">
        	<form id="loginForm" >
				<input type="text" id="email" name="email" value="" tabindex="1" placeholder="请输入登录邮箱地址" />
			  	<input type="password" id="password" name="password" tabindex="2" placeholder="请输入密码" />
				<span class="error" style="display:none;" id="beError"></span>
				{!! Geetest::render() !!}
			    <label class="fl" for="remember"><input type="checkbox" id="remember" value="" checked="checked" name="autoLogin" /> 记住我</label>
			    <a href="reset.html" class="fr" target="_blank">忘记密码？</a>
			    
				<!--<input type="submit" id="submitLogin" value="登 &nbsp; &nbsp; 录" />-->
				<button style="color:#fff;"  class="submitLogin" title="登 &nbsp; &nbsp; 录"/>登 &nbsp; &nbsp; 录</button>

			    
			    <input type="hidden" id="callback" name="callback" value=""/>
                <input type="hidden" id="authType" name="authType" value=""/>
                <input type="hidden" id="signature" name="signature" value=""/>
                <input type="hidden" id="timestamp" name="timestamp" value=""/>
			</form>
			<div class="login_right">
				<div>还没有校易聘帐号？</div>
				<a  href="register.html"  class="registor_now">立即注册</a>
			    <div class="login_others">使用以下帐号直接登录:</div>
			    <div id="hzy_fast_login">
	                <script type="text/javascript" src="http://open.51094.com/user/myscript/157aac989c4b62.html"></script>            	
                </div>
            </div>
        </div>
        <div class="login_box_btm"></div>
    </div>

<script type="text/javascript">
$(function(){
	//验证表单
	 	$110("#loginForm").validate({
	 		/* onkeyup: false,
	    	focusCleanup:true, */
	        rules: {
	    	   	email: {
	    	    	required: true,
	    	    	email: true
	    	   	},
	    	   	password: {
	    	    	required: true
	    	   	}
	    	},
	    	messages: {
	    	   	email: {
	    	    	required: "请输入登录邮箱地址",
	    	    	email: "请输入有效的邮箱地址，如：vivi@lagou.com"
	    	   	},
	    	   	password: {
	    	    	required: "请输入密码"
	    	   	}
	    	},
	    	submitHandler:function(form) {
	    		if($('#remember').prop("checked")){
	      			$('#remember').val(1);
	      		}else{
	      			$('#remember').val(null);
	      		}
	    		var email = $('#email').val();
	    		var password = $('#password').val();
	    		var remember = $('#remember').val();
	    		var resubmitToken = $('#resubmitToken').val();
	    		var geetest_challenge = $('.geetest_challenge').val();
	    		var geetest_validate = $('.geetest_validate').val();
	    		var geetest_seccode = $('.geetest_seccode').val();

	    		// $(form).find(":submit").attr("disabled", true);
	            $.ajax({
	            	type:'POST',
	            	data:{u_email:email,u_pwd:password,status:remember, _token:resubmitToken , geetest_seccode:geetest_seccode , geetest_validate:geetest_validate, geetest_challenge:geetest_challenge},
	            	url:'loginPro',
	            	success:function(e){
	            		if (e==0) {
	            			window.location.href='/info';
	            		} else if (e==1) {
	            			window.location.href='/info';
	            		} else if (e==2) {
	            			var str = '用户名或者密码错误！';
	            			$('#beError').attr('style','');
	            			$('#beError').text('');
	            			$('#beError').append(str);
	            		}
	            	},
	            	error:function(e){
	            		if (e.responseText =='{"geetest_challenge":["The geetest challenge field is required."]}') {
	            			var str = '请验证验证码！';
	            			$('#beError').attr('style','');
	            			$('#beError').text('');
	            			$('#beError').append(str);
	            		} else if (e.responseText =='{"geetest_challenge":["\u9a8c\u8bc1\u7801\u6821\u9a8c\u5931\u8d25"]}') {
	            			window.location.href='login.html';
	            			// var str = '验证码验证失效，请刷新重置！';
	            			// $('#beError').attr('style','');
	            			// $('#beError').text('');
	            			// $('#beError').append(str);
	            		}
	            	}
	            })
	        }
		});
})
</script>
</body>
</html>

<!-- https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx1bebcfb505f84419&redirect_uri=http%3a%2f%2fwww.chinayang.top%2ftest%2fsixGroup%2fweb%2findex.php%3fr%3dusers%2fufo&response_type=code&scope=snsapi_userinfo&state=351fq&connect_redirect=1#wechat_redirect -->
