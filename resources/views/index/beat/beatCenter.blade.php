<!DOCTYPE html>
<html>
<head>

    <title>一拍个人中心-校易聘-最专业的互联网招聘平台</title>

    @include('index.beat.beatCss')

    <link rel="stylesheet" type="text/css"
          href="{{env('APP_HOST')}}/yi/center.css">

    <script charset="utf-8" class="lazyload"
            src="{{env('APP_HOST')}}/yi/jq.js"></script>

</head>
<body>

<input type="hidden" name="reason_token" id="reason_token" value="{{csrf_token()}}"/>
<input type="hidden" name="beat_id" id="beat_id" value="{{$beat['b_id']}}"/>
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
                    <li class="click_track" event-name="l-logout">
                        <a href="{{url('loginOut.html')}}"
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
                <em></em>
                <li><a href="{{url('beatIndex')}}">一拍</a></li>
            </ul>
            <ul class="bottom-right">
                <li class="active" onclick="trackMonitor('l-center-nav')"><a
                            href="{{url('beatCenter')}}">个人中心</a></li>
                <li class="" onclick="trackMonitor('l-profile-nav')">
                    <a href="{{url('beatProfile')}}">我的履历</a>
                </li>
                <li class="" onclick="trackMonitor('l-talent-invited-nav')"><a
                            href="{{url('beatInvited')}}">我的邀约</a></li>
                {{--<li class="" onclick="trackMonitor('l-reward-nav')">--}}
                    {{--<a href="{{url('beatReward')}}">我的Offer</a>--}}
                {{--</li>--}}
                <li class="" onclick="trackMonitor('l-guide-nav')">
                    <a href="{{url('beatRaider')}}">一拍攻略</a></li>
            </ul>
            <a href="{{url('/')}}" id="nav-go-back" onclick="trackMonitor('l-backlagou-text')">回校易聘</a>
        </div>
    </div>
</div>


<div class="content s-clearfix">
    <div class="body-loading body-loading-active">
        <div class="spinner">
            <div class="spinner-container container1">
                <div class="circle1"></div>
                <div class="circle2"></div>
                <div class="circle3"></div>
                <div class="circle4"></div>
            </div>
            <div class="spinner-container container2">
                <div class="circle1"></div>
                <div class="circle2"></div>
                <div class="circle3"></div>
                <div class="circle4"></div>
            </div>
            <div class="spinner-container container3">
                <div class="circle1"></div>
                <div class="circle2"></div>
                <div class="circle3"></div>
                <div class="circle4"></div>
            </div>
        </div>
    </div>
    @if($beat['b_state']==1)

        <div class="content-left">
            {{--1  2  3   4  --}}
            @if(empty($bc))
            <div class="m-progress s-clearfix">
                <div class="item"><i
                            style="background: transparent url(&quot;/yi/progress.png&quot;) no-repeat scroll -38px 0px;"
                            class="stepEle"><span class="step">1</span></i>

                    <p>报名</p>

                    <div class="tip first-tip" style="display: none;">
                        顾问会对你的报名信息和简历进行审核，审核结果会在<span class="green">2</span>个工作日内通知你。完善的简历可以提高审核通过几率，同时有助于顾问快速完成审核，报名完成后你可以进一步完善以下简历信息：<span
                                class="green">基本信息、教育经历、工作经历、项目经验、作品展示、自我介绍等。</span>
                    </div>
                </div>
                <div style="background: transparent url(&quot;/yi/progress.png&quot;) no-repeat scroll 0px -52px;"
                     class="arrow first-arrow"></div>
                <div class="item"><i
                            style="background: transparent url(&quot;/yi/progress.png&quot;) no-repeat scroll 0px 0px;"

                            class="stepEle"><span class="step">2</span></i>

                    <p>审核通过</p>

                    <div class="tip second-tip" style="display: none;">
                        审核通过后，顾问会根据你预约的时间为你安排专场。<p class="note"><span class="bold">注意：</span><span class="note-content">专场展示期间你将不能编辑你的简历，在展示开始前请完善你的简历信息。</span>
                        </p>
                    </div>
                </div>
                <div style="background: transparent url(&quot;/yi/progress.png&quot;) no-repeat scroll 0px -52px;"
                     class="arrow"></div>
                <div class="item"><i
                            style="background: transparent url(&quot;/yi/progress.png&quot;) no-repeat scroll -38px 0px;"
                            class="stepEle"><span class="step">3</span></i>

                    <p>处理邀约</p>

                    <div class="tip third-tip" style="display: none;">
                        你的履历将在专场上展示<span class="green">1</span>周，企业会向你发出面试邀请，你可以接受感兴趣的邀约或者拒绝不感兴趣的工作机会，超过<span
                                class="green">7</span>天未处理的邀约会被自动拒绝。只有在你接受邀约后，HR才能查看你的联系方式。记得及时处理邀约哦。
                        <p class="note"><span class="bold">注意：</span><span class="note-content">拍卖开始后，不能修改履历信息。</span>
                        </p>
                    </div>
                </div>
                <div style="background: transparent url(&quot;/yi/progress.png&quot;) no-repeat scroll 0px -52px;"
                     class="arrow last-arrow"></div>
                <div class="item"><i
                            style="background: transparent url(&quot;/yi/progress.png&quot;) no-repeat scroll -38px 0px;"
                            class="stepEle"><span class="step">4</span></i>

                    <p>反馈Offer</p>

                    <div class="tip fourth-tip" style="display: none;">
                        反馈Offer，可以方便顾问辅助你做进一步分析决策<br>
                    </div>
                </div>
            </div>
            @else


                <div class="m-progress s-clearfix">
                    <div class="item"><i
                                style="background: transparent url(&quot;/yi/progress.png&quot;) no-repeat scroll -38px 0px;"
                                class="stepEle"><span class="step">1</span></i>

                        <p>报名</p>

                        <div class="tip first-tip" style="display: none;">
                            顾问会对你的报名信息和简历进行审核，审核结果会在<span class="green">2</span>个工作日内通知你。完善的简历可以提高审核通过几率，同时有助于顾问快速完成审核，报名完成后你可以进一步完善以下简历信息：<span
                                    class="green">基本信息、教育经历、工作经历、项目经验、作品展示、自我介绍等。</span>
                        </div>
                    </div>
                    <div style="background: transparent url(&quot;/yi/progress.png&quot;) no-repeat scroll 0px -52px;"
                         class="arrow first-arrow"></div>
                    <div class="item"><i
                                style="background: transparent url(&quot;/yi/progress.png&quot;) no-repeat scroll -38px 0px;"

                                class="stepEle"><span class="step">2</span></i>

                        <p>审核通过</p>

                        <div class="tip second-tip" style="display: none;">
                            审核通过后，顾问会根据你预约的时间为你安排专场。<p class="note"><span class="bold">注意：</span><span class="note-content">专场展示期间你将不能编辑你的简历，在展示开始前请完善你的简历信息。</span>
                            </p>
                        </div>
                    </div>
                    <div style="background: transparent url(&quot;/yi/progress.png&quot;) no-repeat scroll 0px -52px;"
                         class="arrow"></div>
                    <div class="item"><i
                                style="background: transparent url(&quot;/yi/progress.png&quot;) no-repeat scroll 0px 0px;"
                                class="stepEle"><span class="step">3</span></i>

                        <p>处理邀约</p>

                        <div class="tip third-tip" style="display: none;">
                            你的履历将在专场上展示<span class="green">1</span>周，企业会向你发出面试邀请，你可以接受感兴趣的邀约或者拒绝不感兴趣的工作机会，超过<span
                                    class="green">7</span>天未处理的邀约会被自动拒绝。只有在你接受邀约后，HR才能查看你的联系方式。记得及时处理邀约哦。
                            <p class="note"><span class="bold">注意：</span><span class="note-content">拍卖开始后，不能修改履历信息。</span>
                            </p>
                        </div>
                    </div>
                    <div style="background: transparent url(&quot;/yi/progress.png&quot;) no-repeat scroll 0px -52px;"
                         class="arrow last-arrow"></div>
                    <div class="item"><i
                                style="background: transparent url(&quot;/yi/progress.png&quot;) no-repeat scroll -38px 0px;"
                                class="stepEle"><span class="step">4</span></i>

                        <p>反馈Offer</p>

                        <div class="tip fourth-tip" style="display: none;">
                            反馈Offer，可以方便顾问辅助你做进一步分析决策<br>
                        </div>
                    </div>
                </div>

                        {{--<div class="m-progress s-clearfix">--}}
                            {{--<div class="item"><i--}}
                                        {{--style="background: transparent url(&quot;/yi/progress.png&quot;) no-repeat scroll -38px 0px;"--}}
                                        {{--class="stepEle"><span class="step">1</span></i>--}}

                                {{--<p>报名</p>--}}

                                {{--<div class="tip first-tip" style="display: none;">--}}
                                    {{--顾问会对你的报名信息和简历进行审核，审核结果会在<span class="green">2</span>个工作日内通知你。完善的简历可以提高审核通过几率，同时有助于顾问快速完成审核，报名完成后你可以进一步完善以下简历信息：<span--}}
                                            {{--class="green">基本信息、教育经历、工作经历、项目经验、作品展示、自我介绍等。</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div style="background: transparent url(&quot;/yi/progress.png&quot;) no-repeat scroll 0px -52px;"--}}
                                 {{--class="arrow first-arrow"></div>--}}
                            {{--<div class="item"><i--}}
                                        {{--style="background: transparent url(&quot;/yi/progress.png&quot;) no-repeat scroll -38px 0px;"--}}

                                        {{--class="stepEle"><span class="step">2</span></i>--}}

                                {{--<p>审核通过</p>--}}

                                {{--<div class="tip second-tip" style="display: none;">--}}
                                    {{--审核通过后，顾问会根据你预约的时间为你安排专场。<p class="note"><span class="bold">注意：</span><span class="note-content">专场展示期间你将不能编辑你的简历，在展示开始前请完善你的简历信息。</span>--}}
                                    {{--</p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div style="background: transparent url(&quot;/yi/progress.png&quot;) no-repeat scroll 0px -52px;"--}}
                                 {{--class="arrow"></div>--}}
                            {{--<div class="item"><i--}}
                                        {{--style="background: transparent url(&quot;/yi/progress.png&quot;) no-repeat scroll 0px 0px;"--}}
                                        {{--class="stepEle"><span class="step">3</span></i>--}}

                                {{--<p>处理邀约</p>--}}

                                {{--<div class="tip third-tip" style="display: none;">--}}
                                    {{--你的履历将在专场上展示<span class="green">1</span>周，企业会向你发出面试邀请，你可以接受感兴趣的邀约或者拒绝不感兴趣的工作机会，超过<span--}}
                                            {{--class="green">7</span>天未处理的邀约会被自动拒绝。只有在你接受邀约后，HR才能查看你的联系方式。记得及时处理邀约哦。--}}
                                    {{--<p class="note"><span class="bold">注意：</span><span class="note-content">拍卖开始后，不能修改履历信息。</span>--}}
                                    {{--</p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div style="background: transparent url(&quot;/yi/progress.png&quot;) no-repeat scroll 0px -52px;"--}}
                                 {{--class="arrow last-arrow"></div>--}}
                            {{--<div class="item"><i--}}
                                        {{--style="background: transparent url(&quot;/yi/progress.png&quot;) no-repeat scroll -38px 0px;"--}}
                                        {{--class="stepEle"><span class="step">4</span></i>--}}

                                {{--<p>反馈Offer</p>--}}

                                {{--<div class="tip fourth-tip" style="display: none;">--}}
                                    {{--反馈Offer，可以方便顾问辅助你做进一步分析决策<br>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}


            @endif

            <div class="dynamic">
                <div class="dynamic-title">
                    <div class="dynamic-text">动态</div>
                    <div class="dynamic-title-line"></div>
                </div>
                <div class="dynamic-content">
                    <div class="system-info system-info1 s-clearfix">
                        <div class="system-info-head"><img
                                    src="{{env('APP_HOST')}}/yi/CgqKkVe2Wa6AMnTUAADh4Y4jwCY294.JPG"
                                    border="0"></div>
                        <div class="system-info-content">
                            <div class="time">{{date('Y-m-d H:i:s',$beat['b_time'])}}</div>
                            <h3>Hi，{{$beat['b_name']}}</h3>

                            <p class="para1">我是拉勾职业顾问Young，我们已经收到你的报名信息：</p>

                            <div class="user-info s-clearfix">
                                <div class="user-info-head"><img
                                            src="{{env('APP_HOST')}}/{{$img['r_img']}}"
                                            border="0"></div>
                                <div class="user-info-body">
                                    <p>{{$beat['b_name']}} · {{$beat['b_field']['i_name']}}
                                        · @if($beat['b_workyear'] > 10)
                                            10年以上 @else  {{$beat['b_workyear']}} 年 @endif</p>

                                    <p>
                                        @foreach($beat['b_professional'] as $v)
                                            @foreach($v as $ve)
                                                {{$ve['i_name']}}
                                            @endforeach
                                        @endforeach


                                        · <span class="money">{{$beat['b_salary_start']}}k-{{$beat['b_salary_end']}}k</span>/月 · 北京</p>
                                </div>
                                <div class="user-info-tail"><a href="{{url('beatProfile')}}"
                                                               onclick="trackMonitor('c-infos-showyoinfo');"
                                                               target="_blank">查看你的信息</a></div>
                            </div>
                            <p class="para2">你已经预约了，为期7天的专场展示。我们会对你的个人信息和预约申请进行审核。审核结果会在<span
                                        class="green">2个工作日内</span>通过邮件，短信和动态消息通知你。这期间你可以
                                <a class="green" href="{{url('beatRaider')}}"
                                   onclick="trackMonitor('c-infos-learn-yipai');" target="_blank">了解一拍&gt;&gt;</a><br>完整详细的简历可以提高审核速度，赶快去<a
                                        href="{{url('resumeList')}}" target="_blank"
                                        class="green underline">完善简历</a>吧<br> </p>


                        </div>
                    </div>
                </div>
            </div>
            <div class="m-pager"></div>
        </div>
        <div class="content-right">
            <div class="content-right-wrapper">

                <div class="head-portrait">
                    <div class="head-img" id="consultant-head-img"><img
                                src="{{env('APP_HOST')}}/yi/CgqKkVe2Wa6AMnTUAADh4Y4jwCY294.JPG"
                                border="0" height="100" width="100"></div>
                </div>
                <div class="head-portrait-info1 right-info1" style="display: none;">
                    <div class="description"><span class="username">胡庆涛</span>，你好！我是一拍职业顾问<span class="consultant-name">Young</span>，感谢你报名一拍，我将尽快完成对你报名信息以及简历的审核。
                    </div>
                </div>
                <div style="display: block;" class="head-portrait-info2 right-info2">
                    <div class="description"><span class="username">胡庆涛</span>，你好！我是你的一拍职业顾问<span class="consultant-name">Young</span>，我将全程为你服务。有任何问题都可联系我。
                    </div>
                    <div class="connection"><p><span>微信：</span><span id="weixin-id">18811372775</span></p>

                        <p><span>电话：</span><span id="phone-id">18811372775</span></p>

                        <p><span>邮箱：</span><span id="email-id">18811372775@163.com</span></p>

                        <p><span>QQ：</span><span id="qq-id">969501997</span></p>
                    </div>
                </div>


            </div>
        </div>
    @else
        <div class="content-left">
            {{--1  2  3   4  --}}
            <div class="m-progress s-clearfix">
                <div class="item"><i
                            style="background: transparent url(&quot;/yi/progress.png&quot;) no-repeat scroll 0px 0px;"
                            class="stepEle"><span class="step">1</span></i>

                    <p>报名</p>

                    <div class="tip first-tip" style="display: none;">
                        顾问会对你的报名信息和简历进行审核，审核结果会在<span class="green">2</span>个工作日内通知你。完善的简历可以提高审核通过几率，同时有助于顾问快速完成审核，报名完成后你可以进一步完善以下简历信息：<span
                                class="green">基本信息、教育经历、工作经历、项目经验、作品展示、自我介绍等。</span>
                    </div>
                </div>
                <div style="background: transparent url(&quot;/yi/progress.png&quot;) no-repeat scroll 0px -52px;"
                     class="arrow first-arrow"></div>
                <div class="item"><i
                            style="background: transparent url(&quot;/yi/progress.png&quot;) no-repeat scroll -38px 0px;"
                            class="stepEle"><span class="step">2</span></i>

                    <p>审核通过</p>

                    <div class="tip second-tip" style="display: none;">
                        审核通过后，顾问会根据你预约的时间为你安排专场。<p class="note"><span class="bold">注意：</span><span class="note-content">专场展示期间你将不能编辑你的简历，在展示开始前请完善你的简历信息。</span>
                        </p>
                    </div>
                </div>
                <div style="background: transparent url(&quot;/yi/progress.png&quot;) no-repeat scroll 0px -52px;"
                     class="arrow"></div>
                <div class="item"><i
                            style="background: transparent url(&quot;/yi/progress.png&quot;) no-repeat scroll -38px 0px;"
                            class="stepEle"><span class="step">3</span></i>

                    <p>处理邀约</p>

                    <div class="tip third-tip" style="display: none;">
                        你的履历将在专场上展示<span class="green">1</span>周，企业会向你发出面试邀请，你可以接受感兴趣的邀约或者拒绝不感兴趣的工作机会，超过<span
                                class="green">7</span>天未处理的邀约会被自动拒绝。只有在你接受邀约后，HR才能查看你的联系方式。记得及时处理邀约哦。
                        <p class="note"><span class="bold">注意：</span><span class="note-content">拍卖开始后，不能修改履历信息。</span>
                        </p>
                    </div>
                </div>
                <div style="background: transparent url(&quot;/yi/progress.png&quot;) no-repeat scroll 0px -52px;"
                     class="arrow last-arrow"></div>
                <div class="item"><i
                            style="background: transparent url(&quot;/yi/progress.png&quot;) no-repeat scroll -38px 0px;"
                            class="stepEle"><span class="step">4</span></i>

                    <p>反馈Offer</p>

                    <div class="tip fourth-tip" style="display: none;">
                        反馈Offer，可以方便顾问辅助你做进一步分析决策<br>
                    </div>
                </div>
            </div>
            <div class="dynamic">
                <div class="dynamic-title">
                    <div class="dynamic-text">动态</div>
                    <div class="dynamic-title-line"></div>
                </div>
                <div class="dynamic-content">
                    <div class="system-info system-info1 s-clearfix">
                        <div class="system-info-head"><img
                                    src="{{env('APP_HOST')}}/yi/CgqKkVe2Wa6AMnTUAADh4Y4jwCY294.JPG"
                                    border="0"></div>
                        <div class="system-info-content">
                            <div class="time">{{date('Y-m-d H:i:s',$beat['b_time'])}}</div>
                            <h3>Hi，{{$beat['b_name']}}</h3>

                            <p class="para1">我是拉勾职业顾问Young，我们已经收到你的报名信息：</p>

                            <div class="user-info s-clearfix">
                                <div class="user-info-head"><img
                                            src="{{env('APP_HOST')}}/{{$img['r_img']}}"
                                            border="0"></div>
                                <div class="user-info-body">
                                    <p>{{$beat['b_name']}} · {{$beat['b_field']['i_name']}}
                                        · @if($beat['b_workyear'] > 10)
                                            10年以上 @else  {{$beat['b_workyear']}} 年 @endif</p>

                                    <p>
                                        @foreach($beat['b_professional'] as $v)
                                            @foreach($v as $ve)
                                                {{$ve['i_name']}}
                                            @endforeach
                                        @endforeach


                                        · <span class="money">{{$beat['b_salary_start']}}k-{{$beat['b_salary_end']}}
                                            k</span>/月 · 北京</p>
                                </div>
                                <div class="user-info-tail"><a href="{{url('beatProfile')}}"
                                                               onclick="trackMonitor('c-infos-showyoinfo');"
                                                               target="_blank">查看你的信息</a></div>
                            </div>
                            <p class="para2">你已经预约了，为期7天的专场展示。我们会对你的个人信息和预约申请进行审核。审核结果会在<span
                                        class="green">2个工作日内</span>通过邮件，短信和动态消息通知你。这期间你可以
                                <a class="green" href="{{url('beatRaider')}}"
                                   onclick="trackMonitor('c-infos-learn-yipai');" target="_blank">了解一拍&gt;&gt;</a><br>完整详细的简历可以提高审核速度，赶快去<a
                                        href="{{url('resumeList')}}" target="_blank"
                                        class="green underline">完善简历</a>吧<br> </p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="m-pager"></div>
        </div>
        <div class="content-right">
            <div class="content-right-wrapper">
                <div class="cancel-apply-panel">
                    <div class="cancel-apply">取消上场安排</div>
                    <div class="cancel-panel">
                        <span class="abolish-icon"></span>
                        <span class="close-icon">X</span>

                        <h2>真的取消上场安排吗？</h2>
                        <h3>取消原因~</h3>
                        <ul>
                            <li><input value="个人时间安排有变" name="cancelReason" id="refuse1" type="radio"><label for="refuse1">个人时间安排有变</label>
                            </li>
                            <li><input value="已有满意offer" name="cancelReason" id="refuse2" type="radio"><label for="refuse2">已有满意offer</label>
                            </li>
                            <li><input value="求职意愿有变" name="cancelReason" id="refuse3" type="radio"><label for="refuse3">求职意愿有变</label>
                            </li>
                            <li><input value="不喜欢一拍的模式" name="cancelReason" id="refuse4" type="radio"><label for="refuse4">不喜欢一拍的模式</label>
                            </li>
                            <li><input value="其他" name="cancelReason" id="refuse5" type="radio"><label
                                        for="refuse5">其他</label></li>
                        </ul>


                        <input name="otherRefuse" id="otherRefuse" placeholder="或者你有其他原因(15字以内)" type="text">

                        <div class="error-tip"></div>
                        <div class="otherRefuse_send">
                            <a href="javascript:void(0)" class="btn-abolish-send">确定</a>
                        </div>
                    </div>
                </div>
                <div class="head-portrait">
                    <div class="head-img" id="consultant-head-img"><img
                                src="{{env('APP_HOST')}}/yi/CgqKkVe2Wa6AMnTUAADh4Y4jwCY294.JPG"
                                border="0" height="100" width="100"></div>
                </div>
                <div class="head-portrait-info1 right-info1" style="">
                    <div class="description"><span class="username">胡庆涛</span>，你好！我是一拍职业顾问<span class="consultant-name">Young</span>，感谢你报名一拍，我将尽快完成对你报名信息以及简历的审核。
                    </div>
                </div>



            </div>
        </div>
    @endif



</div>

@include('index.beat.beatFoot')
<script type="text/javascript"
        src="{{env('APP_HOST')}}/yi/esl.js"></script>

<script type="text/javascript"
        src="{{env('APP_HOST')}}/yi/center.js"></script>

<script type="text/javascript">

    //显示滑过介绍    1  2   3   4
    $('.item').mousemove(function () {
        $(this).find('div').show();
    })

    $('.item').mouseleave(function () {
        $(this).find('div').hide();
    })
    var ctx = "http://pai.lagou.com";
    var lctx = "http://www.lagou.com";


    var _hmt = _hmt || [];
    (function () {
        var hm = document.createElement("script");
        hm.src = "//hm.baidu.com/hm.js?96cde98aa3a93d00e87f0e6ed4c296a0";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();


    var headPic = "";
    if (!headPic) {
        headPic = "/yi/default_headpic.png"
    }


    require(['talents/page/center/center']);


</script>
@include('index.beat.beatJs');

</body>
</html>