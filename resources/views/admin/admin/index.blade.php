@extends('admin.lar.public')
@section('title_admin', '首页')
@section('content_admin')
    <p>
    	<div class="admin">
    		<dl>
    			<dt><img src="{{env('APP_HOST')}}/styles/images/1.jpg"/></dt>
    			<dd>
    				<p><span>姓名</span>: <span style="color:purple">郝涌泉</span></p>
    				<p><span>QQ</span>: <span>594513729</span></p>
    				<p>理想的路总是为有信心的人预备着</p>
    			</dd>
    		</dl>
    	       <dl>
                <dt><img src="{{env('APP_HOST')}}/styles/images/5.jpg"/></dt>
                <dd>
                    <p><span>姓名</span>: <span style="color:blue">冯倩倩</span></p>
                    <p><span>QQ</span>: <span>969501997</span></p>
                    <p>一个今天胜过两个明天</p>
                </dd>
            </dl>
    		<dl>
    			<dt><img src="{{env('APP_HOST')}}/styles/images/3.jpg"/></dt>
    			<dd>
    				<p><span>姓名</span>: <span>胡庆涛</span></p>
    				<p><span>QQ</span>: <span>1329057511</span></p>
    				<p>经验是由痛苦中粹取出来的</p>
    			</dd>
    		</dl>
    		<dl id="desc">
    			<dt><img src="{{env('APP_HOST')}}/styles/images/4.jpg"/></dt>
    			<dd>
    				<p><span>姓名</span>: <span>杨嘉明</span></p>
    				<p><span>QQ</span>: <span>616859204</span></p>
    				<p>发光并非太阳的专利，你也可以发光</p>
    			</dd>
    		</dl>
    	
                <dl>
                <dt><img src="{{env('APP_HOST')}}/styles/images/2.jpg"/></dt>
                <dd>
                    <p><span>姓名</span>: <span style="color:purple">苏冬冬</span></p>
                    <p><span>QQ</span>: <span>592704298</span></p>
                    <p>把你的脸迎向阳光，那就不会有阴影</p>
                </dd>
            </dl>
    	</div>
    </p>
@endsection
