@extends('index.lar.public')
@section('title', "绑定帐号-帐号设置-校易聘-最专业的互联网招聘平台")
@section('content')
<div id="container">
	<div class="user_bindSidebar">
    <dl id="user_sideBarmenu" class="user_sideBarmenu">
        <dt>
            <h3 style="padding-bottom:20px;padding-top:10px">帐号设置</h3>
        </dt>
        <dd>
        	<a class="hover" href="accountBind.html">帐号绑定</a>
        </dd>
        <dd>
        	<a href="updatePwd.html">修改密码</a>
    	</dd>
    </dl>
</div>
<input type="hidden" id="hasSidebar" value="1">	
<div class="user_bindContent">
    <dl class="c_section">
        <dt>
        <h2><em></em>帐号绑定</h2>
        </dt>
        <dd id="pad">
            <ul class="user_noModify">
                <li>当前登录帐号：<span>{{$data['u_email']}}</span> </li>
                <li>绑定后，你可以同时使用以下方式登录拉勾</li>
            </ul>
            <dl class="user_thirdLogin">
                @if (empty($con_data))
                    <dt><img alt="微信" src="{{env('APP_HOST')}}/style/images/wx1.png"></dt>
                    <dd>未绑定微信帐号  <span></span>
                        <a href="http://www.chinayang.top/test/binding/index.php">前去绑定</a>
                    </dd>
                @else
                    @foreach ($con_data as $val)
                        <?php
                        if ($val['ct_type']=='wx') {
                        ?>
                            <dt><img alt="微信" src="{{env('APP_HOST')}}/style/images/wx1.png"></dt>
                            <dd>已绑定微信帐号  <span></span>
                                <a href="/unAccount">解除绑定</a>
                            </dd>
                        <?php
                        }
                        ?>
                    @endforeach
                @endif
            </dl>
        </dd>
    </dl>
</div>
@endsection
