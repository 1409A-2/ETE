<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="renderer" content="webkit">
    <title>@yield('title_admin','校易聘后台')</title>
    <link rel="stylesheet" href="{{env('APP_HOST')}}/styles/css/pintuer.css">
    <link rel="stylesheet" href="{{env('APP_HOST')}}/styles/css/admin.css">
    <script src="{{env('APP_HOST')}}/styles/js/jquery.js"></script>
    <script src="{{env('APP_HOST')}}/styles/js/pintuer.js"></script>
    <script src="{{env('APP_HOST')}}/styles/js/respond.js"></script>
    <script src="{{env('APP_HOST')}}/styles/js/admin.js"></script>
    <link type="image/x-icon" href="/favicon.ico" rel="shortcut icon"/>
    <link href="/favicon.ico" rel="bookmark icon"/>
</head>

<body>
<div class="lefter">
    <div class="logo"><a href="#" target="_blank"><img src="{{env('APP_HOST')}}/styles/images/logo.png" width="20"
                                                       height="20" alt="后台管理系统"/></a></div>
</div>
<div class="righter nav-navicon" id="admin-nav">
    <div class="mainer">
        <div class="admin-navbar">
            <span class="float-right">
            	<a class="button button-little bg-main" href="#" target="_blank">前台首页</a>
                <a class="button button-little bg-yellow" href="login.html">注销登录</a>
            </span>
            <ul class="nav nav-inline admin-nav">
                <li><a href="index.html" class="icon-home"> 开始</a></li>
                <li><a href="system.html" class="icon-cog"> 系统</a></li>
                <li><a href="content.html" class="icon-file-text"> 内容</a></li>
                <li><a href="#" class="icon-shopping-cart"> 订单</a></li>
                <li><a href="#" class="icon-user"> 会员</a></li>
                <li><a href="#" class="icon-file"> 文件</a></li>
                <li class="active">
                    <a href="{{url('enterpriseIndex')}}" class="icon-th-list"> 企业管理</a>
                    <ul>
                        <li><a href="{{url('enterpriseList')}}" class="hover">企业列表</a></li>
                        <li><a href="{{url('enterprisePro')}}" class="hover">企业审核</a></li>
                        <li><a href="#" class="hover">订单管理</a></li>
                        <li><a href="#" class="hover">会员管理</a></li>
                        <li><a href="#" class="hover">文件管理</a></li>
                        <li><a href="#" class="hover">栏目管理</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="admin-bread">
            <span>您好，admin，欢迎您的光临。</span>
            <ul class="bread">
                <li><a href="{{url('adminIndex')}}" class="icon-home"> 开始</a></li>
                <li>企业管理</li>
            </ul>
        </div>
    </div>
</div>

<div class="admin">
    @yield('content_admin')
</div>


</body>
</html>
<script>
    $(function () {
        $('.hover').hover(function(){
            $(this).parent('li').addClass('active')
            $(this).parent('li').siblings('li').removeClass('active')
        })

    })
</script>