<?php
header("content-type:text/html;charset=utf8");
if(strpos($_SERVER['REQUEST_URI'],'?')){
    $url = substr($_SERVER['REQUEST_URI'],1,strpos($_SERVER['REQUEST_URI'],'?')-1);
}else{
    $url = substr($_SERVER['REQUEST_URI'],1);
}

$admin_id=session('uid');
$admin=DB::table('admin')
->join('u_r','u_r.a_id','=','admin.a_id')
->join('role','u_r.r_id','=','role.r_id')
->join('r_p','r_p.r_id','=','role.r_id')
->join('power','r_p.p_id','=','power.p_id')
->where('admin.a_id','=',$admin_id['a_id'])
->get();

// print_r($admin);die;
$admin_list=level($admin,$parent_id=0,$level=0);
// print_r($admin_list);die;
function level($admin,$parent_id=0,$level=0){
    static $arr=array();
    foreach($admin as $k=>$v){
        $val=get_object_vars($v);
        if($val['parent_id']==$parent_id){
            $val['level']=$level;
            $arr[]=$val;
            level($admin,$val['p_id'],$level+1); 
        }

    }
     return $arr;  
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
                <a class="button button-little bg-yellow" href="cancellation">注销登录</a>
            </span>
            <ul class="nav nav-inline admin-nav">
            @foreach($admin_list as $key=>$v)
                @if($v['level']==0)
                <li><a href="javascript:void(0);" class="icon-home"> {{$v['p_name']}}</a>
                    <ul>
                    @foreach($admin_list as $key=>$val)
                        @if($val['parent_id']==$v['p_id'])
                        <li><a href="{{$val['p_route']}}">{{$val['p_name']}}</a></li>
                        @endif
                      @endforeach  
                    </ul>
                </li>
                @endif
                @endforeach
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