
<div class="pai-nav">
    <div class="pai-nav-top">

        <ul class="top-right">


            <li class="click_track" event-name="l-myresume"><a href="{{url('resumeList')}}">我的简历</a>
            </li>

            <li class="click_track" event-name="l-delivery"><a
                        href="{{url('remuseShow')}}">投递箱</a></li>


            <li class="nav-user" id="nav-user-li">
                <a href="javascript:;" id="nav-users">{{session('u_email')}}</a>
                <span style=""></span>
                <ul class="nav-select" style="z-index:999;">
                    <li class="click_track" event-name="l-logout"><a href="http://pai.lagou.com/frontLogout.do"
                                                                     style="margin-bottom: 10px;">退出</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="pai-nav-bottom">
        <div class="nav-wrapper">
            <ul class="bottom-left">
                <a href="{{url('/')}}" id="birthdayIcon">
                    <li class="pai-lagou"></li>
                </a>
                <li><a href="{{url('beatIndex')}}">一拍</a></li>
            </ul>
            <ul class="bottom-right">
                <li class="" onclick="trackMonitor('l-index-nav');" event-name="l-index-nav"><a
                            href="{{url('beatIndex')}}">首页</a></li>
                <li class="" onclick="trackMonitor('l-guide-nav')"><a
                            href="{{url('beatRaiders')}}">一拍攻略</a></li>
            </ul>
            <a href="/" id="nav-go-back" onclick="trackMonitor('l-backlagou-text')">回拉勾</a>
        </div>
    </div>
</div>