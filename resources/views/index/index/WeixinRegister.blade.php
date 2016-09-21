<!DOCTYPE HTML>
<html>
<head>
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
        	<a href="h/"><img src="{{env('APP_HOST')}}/style/images/logo_white.png" width="285" height="62" alt="校易聘招聘" /></a>
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
            	<label class="fl registerJianJu" for="checkbox">
            		<input type="checkbox" id="checkbox" name="checkbox" checked  class="checkbox valid" />我已阅读并同意<a href="h/privacy.html" target="_blank">《校易聘用户协议》</a>
           		</label>
                <input type="submit" id="submitLogin" value="信&nbsp;息&nbsp;完&nbsp;善" />
                <input type="hidden" id="openid" name="openid" value="{{$userKey}}"/>
                <input type="hidden" id="ct_type" name="ct_type" value="{{$ct_type}}"/>
                <input type="hidden" id="callback" name="callback" value=""/>
                <input type="hidden" id="authType" name="authType" value=""/>
                <input type="hidden" id="signature" name="signature" value=""/>
                <input type="hidden" id="timestamp" name="timestamp" value=""/>
            </form>
            <div class="login_right">
                <div id="hzy_fast_login">
	                <img src="{{env('APP_HOST')}}/style/images/zp.jpg" width="160px" alt="招聘图片">
                </div>
            </div>
        </div>
        <div class="login_box_btm"></div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            // 页面退出友情提示
            $(window).bind('beforeunload',function(){
                return '您的登陆信息尚未保存，是否以游客身份进入主页？';
            });

            // 显示密码
            $(function(){
                $("#eye").mouseover(function(){
                    $("#password").attr('type','text');
                });
                $("#eye").mouseout(function(){
                    $("#password").attr('type','password');
                });
            });
        });
        $(document).ready(function(e) {
            $('.register_radio li input').click(function(e){
                $(this).parent('li').addClass('current').append('<em></em>').siblings().removeClass('current').find('em').remove();
            });

            $('#email').focus(function(){
                $('#beError').hide();
            });
    	//验证表单
	    	 $("#loginForm").validate({
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
			    		var openid = $('#openid').val();
			    		var ct_type = $('#ct_type').val();

			    		var callback = $('#callback').val();
			    		var authType = $('#authType').val();
			    		var signature = $('#signature').val();
			    		var timestamp = $('#timestamp').val();
			    		var _beError = $('#beError');

			            $.ajax({
			            	type:'POST',
			            	data: {u_email:email,type:type,u_pwd:password,_token:resubmitToken, r_openid:openid, ct_type:ct_type},
			            	url: 'registerProne',
			            	dataType:'json',
		            		success: function(e) {
							    if(e) {
							    	if (e==500) {
							    		var str = '该邮箱已被注册！';
										_beError.attr('style','');
										_beError.text('');
										_beError.append(str);
							    	} else {
                                        $(window).unbind('beforeunload');
								    	window.location.href="/?user="+e;
							    	}
							    } else {
							    	alert('注册失败，请重试');
							    }
						    }
			            })
			        }
	    	});
    });
    </script>
</body>
</html>
