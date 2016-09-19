<!DOCTYPE HTML>
<html>
<head>
<script id="allmobilize" charset="utf-8" src="style/js/allmobilize.min.js"></script>
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="alternate" media="handheld"  />
<!-- end 云适配 -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>找回密码-修改完成-校易聘</title>
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
		 	<h3>找回密码-完成修改</h3>
			<div>
				@if ($res === false)
				<p>密码修改有误，请您联系客服解决！</p>
				@else
				<center>
				<p>
					密码修改成功，跳转至<a href="/login.html">登陆页面</a>或<a href="/">跳转至首页</a>
				</p>
				</center>
				@endif
			</div>
        </div>
        <div class="login_box_btm"></div>
    </div>
</body>
</html>