<!DOCTYPE HTML>
<html>
<head>
<style>
.query_hint{
	display:none;
	border:5px solid #939393;
	width:250px;
	height:50px;
	line-height:55px;
	padding:0 20px;
	position:absolute;
	left:50%;
	margin-left:-140px;
	top:50%;
	margin-top:-40px;
	font-size:15px;
	color:#333;
	font-weight:bold;
	text-align:center;
	background-color:#f9f9f9;
}
.query_hint img{
	position:relative;
	top:10px;
	left:-8px;
}
</style>
<script id="allmobilize" charset="utf-8" src="style/js/allmobilize.min.js"></script>
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="alternate" media="handheld"  />
<!-- end 云适配 -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>注册-校易聘网-最专业的互联网招聘平台</title>
<meta property="qc:admins" content="23635710066417756375" />
<meta content="校易聘网是3W旗下的互联网领域垂直招聘网站,互联网职业机会尽在校易聘网" name="description">
<meta content="校易聘,校易聘网,校易聘招聘,拉钩, 拉钩网 ,互联网招聘,校易聘互联网招聘, 移动互联网招聘, 垂直互联网招聘, 微信招聘, 微博招聘, 校易聘官网, 校易聘百科,跳槽, 高薪职位, 互联网圈子, IT招聘, 职场招聘, 猎头招聘,O2O招聘, LBS招聘, 社交招聘, 校园招聘, 校招,社会招聘,社招" name="keywords">
<meta name="baidu-site-verification" content="QIQ6KC1oZ6" />
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
<script type="text/javascript" src="{{env('APP_HOST')}}/style/js/conv.js"></script>
</head>
<body id="login_bg">
	<div class="login_wrapper">
		<div class="login_header">
            <a href="{{env('APP_HOST')}}"><img src="{{env('APP_HOST')}}/style/images/logo_white.png" width="285" height="62" alt="校易聘招聘" /></a>
            <div id="cloud_s"><img src="{{env('APP_HOST')}}/style/images/cloud_s.png" width="81" height="52" alt="cloud" /></div>
            <div id="cloud_m"><img src="{{env('APP_HOST')}}/style/images/cloud_m.png" width="136" height="95"  alt="cloud" /></div>
        </div> 
    	<input type="hidden" id="resubmitToken" value="<?php echo csrf_token(); ?>" />		
		<div class="login_box">
        	<form id="loginForm">
        		<ul class="register_radio clearfix">
		            <li>
		            	找工作
		              	<input type="radio" value="0" name="type" />
		            </li>
		            <li>
            	        招人
		              	<input type="radio" value="1" name="type" /> 
		            </li>
		        </ul>
            	<input type="text" id="email" name="email" tabindex="1" placeholder="请输入常用邮箱地址" />
                <span class="error" style="display:none;" id="beError"></span>
                <input type="password" id="password" name="password" tabindex="2" placeholder="请输入密码" />
                <p>
                    鼠标移到眼睛，看一看我的密码
                    <img id="eye" src="{{env('APP_HOST')}}/style/images/eye.jpg" style="width:20px" alt="显示密码">
                </p>
            	{!! Geetest::render() !!}
            	<label class="fl registerJianJu" for="checkbox">
            		<input type="checkbox" id="checkbox" name="checkbox" checked  class="checkbox valid" />我已阅读并同意<a href="h/privacy.html" target="_blank">《校易聘用户协议》</a>
           		</label>
                <input type="submit" id="submitLogin" value="注 &nbsp; &nbsp; 册" />
                <input type="hidden" id="callback" name="callback" value=""/>
                <input type="hidden" id="authType" name="authType" value=""/>
                <input type="hidden" id="signature" name="signature" value=""/>
                <input type="hidden" id="timestamp" name="timestamp" value=""/>
            </form>
            <div class="login_right">
            	<div>已有校易聘帐号</div>
            	<a  href="login.html"  class="registor_now">直接登录</a>
                <div class="login_others">使用以下帐号直接登录:</div>
                <div id="hzy_fast_login">
					<a href="http://www.chinayang.top/test/demo/index.php?url={{env('APP_HOST')}}">
					    <img src="{{env('APP_HOST')}}/style/images/wx1.png" alt="使用微信登录">
					</a>
                </div>
            </div>
        </div>
        <div class="login_box_btm"></div>
    </div>
	<div id="query_hint" class="query_hint">
		<img src="{{env('APP_HOST')}}/style/images/load.gif" />正在处理，请稍等...
	</div>
    <script type="text/javascript">    
    $110(document).ready(function(e) {
        // 显示密码
        $(function(){
            $("#eye").mouseover(function(){
                $("#password").attr('type','text');
            });
            $("#eye").mouseout(function(){
                $("#password").attr('type','password');
            });
        });
    	$110('.register_radio li input').click(function(e){
    		$(this).parent('li').addClass('current').append('<em></em>').siblings().removeClass('current').find('em').remove();
    	});
    	
    	$110('#email').focus(function(){
    		$('#beError').hide();
    	});
    	//验证表单
	    	 $110("#loginForm").validate({
	    	        rules: {
	    	        	type:{
	    	        		required: true
	    	        	},
			    	   	email: {
			    	    	required: true,
			    	    	email: true
			    	   	},
			    	   	password: {
			    	    	required: true,
			    	    	rangelength: [6,16]
			    	   	},
			    	   	checkbox:{required:true}
			    	},
			    	messages: {
			    		type:{
	    	        		required:"请选择使用校易聘的目的"
	    	        	},
			    	 	email: {
			    	    	required: "请输入常用邮箱地址",
			    	    	email: "请输入有效的邮箱地址，如：vivi@lagou.com"
			    	   	},
			    	   	password: {
			    	    	required: "请输入密码",
			    	    	rangelength: "请输入6-16位密码，字母区分大小写"
			    	   	},
			    	   	checkbox: {
			    	    	required: "请接受校易聘用户协议"
			    	   	}
			    	},
			    	errorPlacement:function(label, element){
			    		if(element.attr("type") == "radio"){
			    			label.insertAfter($(element).parents('ul')).css('marginTop','-20px');
			    		}else if(element.attr("type") == "checkbox"){
			    			label.insertAfter($(element).parent()).css('clear','left');
			    		}else{
			    			label.insertAfter(element);
			    		};	
			    	},
			    	submitHandler:function(form){
			    		var type =$('input[type="radio"]:checked',form).val();
			    		var email =$('#email').val();
			    		var password =$('#password').val();
			    		var resubmitToken = $('#resubmitToken').val();
			    		
			    		var callback = $('#callback').val();
			    		var authType = $('#authType').val();
			    		var signature = $('#signature').val();
			    		var timestampamp = $('#timestamp').val();
			    		var geetest_challenge = $('.geetest_challenge').val();
			    		var geetest_validate = $('.geetest_validate').val();
		    			var geetest_seccode = $('.geetest_seccode').val();
						var _beError = $('#beError');
						$('#query_hint').css('display','block');
						_query_hint=$('#query_hint');
						_login_hint=$('#login_hint');
			    		// $(form).find(":submit").attr("disabled", true);
			            $.ajax({
			            	type:'POST',
			            	data: {u_email:email,type:type,u_pwd:password,_token:resubmitToken, geetest_seccode:geetest_seccode , geetest_validate:geetest_validate, geetest_challenge:geetest_challenge},
			            	url: 'registerPro',
			            	dataType:'json',
		            		success: function(e) {
							    if(e) {
							    	if (e==500) {
			            				_query_hint.css('display','none');
							    		var str = '该邮箱已被注册！';
										_beError.attr('style','');
										_beError.text('');
										_beError.append(str);
							    	} else {
			            				_query_hint.css('display','none');
								    	window.location.href='login.html';
							    	}
							    } else {
							    	_query_hint.css('display','none');
							    	window.location.href='register.html';
							    }
						    },
			            	error:function(e){
			            		if (e.responseText =='{"geetest_challenge":["The geetest challenge field is required."]}') {
			            			_query_hint.css('display','none');
			            			var str = '请验证验证码！';
									_beError.attr('style','');
									_beError.text('');
									_beError.append(str);
			            		} else if (e.responseText ='{"geetest_challenge":["\u9a8c\u8bc1\u7801\u6821\u9a8c\u5931\u8d25"]}') {
			            			_query_hint.css('display','none');
			            			var str = '验证码验证失效，请刷新重置！';
									_beError.attr('style','');
									_beError.text('');
									_beError.append(str);
			            		} else {
			            			_query_hint.css('display','none');
			            			window.location.href='register.html';
			            		}
			            	}
			            })
			        }
	    	});
    });
    </script>
</body>
</html>
