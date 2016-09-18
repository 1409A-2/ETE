<?php
if(strpos($_SERVER['REQUEST_URI'],'?')){
    $url = substr($_SERVER['REQUEST_URI'],1,strpos($_SERVER['REQUEST_URI'],'?')-1);
}else{
    $url = substr($_SERVER['REQUEST_URI'],1);
}
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>@yield('title_admin','校易聘后台')</title>
    <link rel="stylesheet" href="{{env('APP_HOST')}}/styles/css/pintuer.css">
    <link rel="stylesheet" href="{{env('APP_HOST')}}/styles/css/admin.css">
    <script src="{{env('APP_HOST')}}/styles/js/jquery.js"></script>
    <script src="{{env('APP_HOST')}}/styles/js/pintuer.js"></script>
    <script src="{{env('APP_HOST')}}/styles/js/respond.js"></script>
    <script src="{{env('APP_HOST')}}/styles/js/admin.js"></script>
    <link type="image/x-icon" href="/favicon.ico" rel="shortcut icon" />
    <link href="/favicon.ico" rel="bookmark icon" />
    <script>
        $(function () {
            var url = "{{$url}}";
            var _actionContent = $("a[href='"+url+"']").html();
            var _action = $("a[href='"+url+"']").parent();
            var _bread = '<li><a href="javascript:void(0);" class="'+_action.parents('li').children('a').attr('class')+'"> '+_action.parents('li').children('a').html()+'</a></li><li>'+_actionContent+'</li>';
            $('.bread').html(_bread);
            _action.attr('class','active');
            _action.parents('li').attr('class','active');

            $(document).delegate("a[class^='icon-']",'click',function(){
                var _this=$(this);

                _this.parent().siblings().removeAttr('class');

                _this.parent().attr('class','active');

                if(_this.parent().html()==_action.parents('li').html()){
                    var str = '<li><a href="javascript:void(0);" class="'+_this.attr('class')+'"> '+_this.html()+'</a></li><li>'+_actionContent+'</li>';
                }else{
                    var str='<li><a href="javascript:void(0);" class="'+_this.attr('class')+'"> '+_this.html()+'</a></li>';
                }

                $('.bread').html(str);
            });
        });

    </script>
</head>

<body>
<div class="lefter">
    <div class="logo"><a href="#" target="_blank"><img src="{{env('APP_HOST')}}/styles/images/logo.png" height="40" alt="后台管理系统" /></a></div>
</div>
<div class="righter nav-navicon" id="admin-nav">
    <div class="mainer">
        <div class="admin-navbar">
            <span class="float-right">
            	<a class="button button-little bg-main" href="{{env('APP_HOST')}}" target="_blank">前台首页</a>
                <a class="button button-little bg-yellow" href="login.html">注销登录</a>
            </span>
            <ul class="nav nav-inline admin-nav">
                <li><a href="javascript:void(0);" class="icon-home"> 开始</a>
                    <ul>
                        <li><a href="adminIndex">系统设置</a></li>
                        <li><a href="#">行业管理</a></li>
                        <li><a href="#">订单管理</a></li>
                        <li><a href="#">会员管理</a></li>
                        <li><a href="#">文件管理</a></li>
                        <li><a href="#">栏目管理</a></li>
                    </ul>
                </li>
                <li><a href="javascript:void(0);" class="icon-cog"> 系统</a>
                    <ul><li><a href="#">全局设置</a></li><li><a href="#">系统设置</a></li><li><a href="#">会员设置</a></li><li><a href="#">积分设置</a></li></ul>
                </li>
                <li><a href="javascript:void(0);" class="icon-file-text"> 行业</a>
                    <ul>
                        <li><a href="adminIndustryList">行业列表</a></li>
                        <li><a href="adminIndustryAdd">添加行业</a></li>
                    </ul>
                </li>
                <li><a href="javascript:void(0);" class="icon-shopping-cart"> 订单</a></li>
                <li><a href="javascript:void(0);" class="icon-user"> 用户管理</a>
                    <ul><li><a href="adminUserList">用户列表</a></li><li><a href="feedBackList">反馈列表</a></li></ul>
                </li>
                <li><a href="javascript:void(0);" class="icon-file"> 文件</a></li>
                <li><a href="javascript:void(0);" class="icon-th-list"> 栏目</a>
                    <ul>
                        <li><a href="adminMaterial">轮播管理</a></li>
                        <li><a href="adminFriendShip">友情链接</a></li>
                        <li><a href="adminRecommend">推荐网站</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="admin-bread">
            <span>您好，admin，欢迎您的光临。</span>
            <ul class="bread">
                <li><a href="index.html" class="icon-home"> 开始</a></li>

            </ul>
        </div>
    </div>
</div>

<div class="admin">
    @yield('content_admin')
</div>


</body>
</html>