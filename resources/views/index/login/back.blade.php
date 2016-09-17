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
        	<a href="{{env('APP_HOST')}}"><img src="{{env('APP_HOST')}}/style/images/logo_white.png" width="285" height="62" alt="校易聘招聘" /></a>
            <div id="cloud_s"><img src="{{env('APP_HOST')}}/style/images/cloud_s.png" width="81" height="52" alt="cloud" /></div>
            <div id="cloud_m"><img src="{{env('APP_HOST')}}/style/images/cloud_m.png" width="136" height="95"  alt="cloud" /></div>
        </div>
        
    	<input type="hidden" id="resubmitToken" value="<?php echo csrf_token(); ?>" />	
		 <div class="login_box" style="overflow:auto;">
		 	<h3>找回密码-确认账号</h3>
        	<form id="loginForm" >
				<input type="text" id="email" name="email" value="" tabindex="1" placeholder="请填写您需要找回的帐号邮箱" />
				<span class="error" style="display:none;" id="beError"></span>
				{!! Geetest::render() !!}
			    <label class="fl" for="remember">
			    	</br>
			    </label>
			    <button style="color:#fff;"  class="submitLogin" title="下 &nbsp; 一 &nbsp; 步"/>
			    	下 &nbsp; 一 &nbsp; 步
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
	 	$110("#loginForm").validate({
	 		rules: {
	    	   	email: {
	    	    	required: true,
	    	    	email: true
	    	   	}
	    	},
	    	messages: {
	    	   	email: {
	    	    	required: "请输入登录邮箱地址",
	    	    	email: "请输入有效的邮箱地址，如：vivi@lagou.com"
	    	   	}
	    	},
	    	submitHandler:function(form) {
	    		if($('#remember').prop("checked")){
	      			$('#remember').val(1);
	      		}else{
	      			$('#remember').val(null);
	      		}
	    		var email = $('#email').val();
	    		var resubmitToken = $('#resubmitToken').val();
	    		var geetest_challenge = $('.geetest_challenge').val();
	    		var geetest_validate = $('.geetest_validate').val();
	    		var geetest_seccode = $('.geetest_seccode').val();

	    		$.ajax({
	            	type:'POST',
	            	data:{u_email:email, _token:resubmitToken , geetest_seccode:geetest_seccode , geetest_validate:geetest_validate, geetest_challenge:geetest_challenge},
	            	url:'backPro',
	            	success:function(e){
	            		if (e==0) {
	            			window.location.href='/twoPwd.html';
	            		} else if (e==2) {
	            			var str = '该邮箱不存在！';
	            			$('#beError').attr('style','');
	            			$('#beError').text('');
	            			$('#beError').append(str);
	            		} else {
	            			window.location.href='/pwdBack.html';
	            		}
	            	},
	            	error:function(e){
	            		if (e.responseText =='{"geetest_challenge":["The geetest challenge field is required."]}') {
	            			var str = '请验证验证码！';
	            			$('#beError').attr('style','');
	            			$('#beError').text('');
	            			$('#beError').append(str);
	            		} else {
	            			var str = '验证码验证失效，请刷新重置！';
	            			$('#beError').attr('style','');
	            			$('#beError').text('');
	            			$('#beError').append(str);
	            		}
	            	}
	            })
	        }
		});
})
</script>
</body>
</html>