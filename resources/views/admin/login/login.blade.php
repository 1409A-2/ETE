<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>校易聘-管理员登录</title>
    <link rel="stylesheet" href="{{env('APP_HOST')}}/styles/css/pintuer.css">
    <link rel="stylesheet" href="{{env('APP_HOST')}}/styles/css/admin.css">
    <script src="{{env('APP_HOST')}}/styles/js/jquery.js"></script>
    <script src="{{env('APP_HOST')}}/styles/js/pintuer.js"></script>
    <script src="{{env('APP_HOST')}}/styles/js/respond.js"></script>
    <script src="{{env('APP_HOST')}}/styles/js/admin.js"></script>
    <link type="image/x-icon" href="/favicon.ico" rel="shortcut icon" />
    <link href="/favicon.ico" rel="bookmark icon" />
</head>

<body>
<div class="container">
    <div class="line">
        <div class="xs6 xm4 xs3-move xm4-move">
            <br /><br />
            <div class="media media-y">
                <a href="#" target="_blank"><strong><img src="/images/logo.png" class="radius" alt="后台管理系统" /></strong></a>
            </div>
            <br /><br />
            <form action="adminLogin" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="panel">
                <div class="panel-head"><strong>校易聘后台管理系统</strong></div>
                <div class="panel-body" style="padding:30px;">
                    <div class="form-group">
                        <div class="field field-icon-right">
                            <input type="text" class="input" name="uname" placeholder="登录账号" data-validate="required:请填写账号,length#>=5:账号长度不符合要求" />
                            <span class="icon icon-user"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="field field-icon-right">
                            <input type="password" class="input" name="upwd" placeholder="登录密码" data-validate="required:请填写密码,length#>=6:密码长度不符合要求" />
                            <span class="icon icon-key"></span>
                        </div>
                    </div>
                </div>
                <div class="panel-foot text-center"><button class="button button-block bg-main text-big">立即登录后台</button></div>
            </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>