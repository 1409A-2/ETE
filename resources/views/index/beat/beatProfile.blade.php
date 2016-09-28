<!DOCTYPE html>
<html lang="en">
<head>

    <script src="{{env('APP_HOST')}}/yi/contains.js" async="" charset="utf-8" type="text/javascript"></script>

    <title>我的履历－校易聘－最专业的互联网招聘平台</title>

    @include('index.beat.beatCss')
    <link rel="stylesheet" type="text/css" href="{{env('APP_HOST')}}/yi/resume.css">

</head>
<body>


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
                <li class="" onclick="trackMonitor('l-center-nav')"><a
                            href="{{url('beatCenter')}}">个人中心</a></li>
                <li class="active" onclick="trackMonitor('l-profile-nav')">
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

<div id="body" class="resume">
    <div class="container">
        <div class="content">
            @if($beat['b_state']==0)
            <div class="user-tip-msg">
                <p class="detail">
                    一拍职业顾问会对你的报名信息和简历进行审核<span class="mark underline seeStandard">（查看审核标准）</span>,审核结果会在2个工作日内通知你。完善的简历可以提高审核通过几率，同时有助于顾问快速完成审核，报名完成后你可以进一步完善以下简历信息：<span
                            class="mark">基本信息、教育经历、工作经历、项目经验、作品展示、自我介绍</span>等。</p>
            </div>
            @endif
            <div id="details-resume">
                <div class="card break-word">
                    <div class="card-brief">
                        <div class="img-wrapper">
                            <img src="{{$resume['r_img']}}" alt="头像">
                        </div>
                        <p class="self-work">
                            实习 · {{$school['s_name']}} · {{$beat['b_workyear']}}年项目经验</p>

                        <p class="self-one-word">
                           {{$resume['r_desc']}}</p>
                        @if($beat['b_state']==0)
                        <a class="btn-edit " title="点击编辑，修改约会补充资料；完整简历请到【我的简历】中进行修改"
                           href="{{url('resumeList')}}" type="button" target="_blank">编辑简历</a>
                            @endif
                    </div>
                    <ul class="card-detail">
                        <li class="item clearfix">
                            <div class="item-title">期望工作</div>
                            <div class="item-content">
                                <div class="expect-work fl">
                                    <p>@foreach($beat['b_professional'] as $v)
                                          @foreach($v as $ve)
                                            {{$ve['i_name']}}
                                            @endforeach
                                        @endforeach
                                            · <span class="salary">{{$beat['b_salary_start']}}k-{{$beat['b_salary_end']}}k</span>/月 · 北京</p>
                                </div>
                            </div>
                        </li>
                        <div class="card-collapse">

                            <li class="item clearfix">
                                <div class="item-title">项目经历</div>
                                @foreach($porject as $v)
                                <div class="item-content">
                                    <div class="content">
                                        <div class="content-title"><a href="">{{$v['p_name']}}</a></div>
                                        <div class="content-sub-title s-clearfix"><span class="left">{{$v['p_duties']}}</span><span
                                                    class="right">{{date('Y.m.d',$v['p_start_time'])}} - {{date('Y.m.d',$v['p_end_time'])}}</span>
                                        </div>
                                        <p>{{$v['p_desc']}}</p>
                                    </div>
                                </div>
                                @endforeach
                            </li>

                        </div>
                    </ul>
                </div>
            </div>
        </div>
        <div class="sidebar">
            <div class="resume-integrity">
                <div class="title">
                    <header>
                        简历完整度：<span class="mark">@if(session('sum')) {{session('sum')}} @else 50 @endif%</span>

                        <a href="{{url('previewList')}}/{{$resume['r_id']}}" target="_blank" class="mark fr">预览简历</a>
                    </header>
                </div>
                <div class="progress">
                    @if(session('sum'))
                    <div class="detail" style="width:{{session('sum')}}%"></div>
                    @else
                        <div class="detail" style="width:50%"></div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>

@include('index.beat.beatFoot')
<script type="text/javascript" src="{{env('APP_HOST')}}/yi/esl.js"></script>

<script type="text/javascript" src="{{env('APP_HOST')}}/yi/resume.js"></script>
<script type="text/javascript">
    var ctx = "http://pai.lagou.com";
    var lctx = "http://www.lagou.com";


    var _hmt = _hmt || [];
    (function () {
        var hm = document.createElement("script");
        hm.src = "//hm.baidu.com/hm.js?96cde98aa3a93d00e87f0e6ed4c296a0";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();


    require(['talents/page/resume/resume']);



    jQuery(function () {
        //小火箭
        $(window).scroll(function () {
            if ((document.documentElement.scrollTop || document.body.scrollTop) > 0) {
                $("#backtop").show();
            } else {
                $("#backtop").hide();
            }
        });
        $("#backtop").click(function () {
            pageScroll();
        });

        function pageScroll() {
            $("#backtop").css("background-position-x", "-28px");
            window.scrollBy(0, -20);
            var scrolldelay = setTimeout(function () {
                pageScroll();
            }, 1);
            if (document.documentElement.scrollTop == 0 && document.body.scrollTop == 0) {
                $("#backtop").css("background-position-x", "0");
                clearTimeout(scrolldelay);
            }
        }

        //小火箭结束
        $(".collapsible_menu").hover(function () {
            $(this).addClass("expend");
            $("dd", this).show();
        }, function () {
            $(this).removeClass("expend");
            $("dd", this).hide();
        });

        //鼠标悬浮显示微信二维码
        //footer_qr
        $('.footer_qr').hover(function () {
            $("i", this).stop().fadeIn(200);
        }, function () {
            $("i", this).stop().fadeOut(200);
        });

        //footer-app
        $('.footer_app').hover(function () {
            $("i", this).stop().fadeIn(200);
        }, function () {
            $("i", this).stop().fadeOut(200);
        });
        //是否加vip图标
        function callback(response) {
            if (response.success == true && response.state == 1) {
                $("#nowrap").parent().addClass('plus-vip');
                if ($('#accountSetting')[0]) {
                    $('#accountSetting')[0].href = "http://hr.lagou.com/baseinfo/accountDetail.html";
                }
            }
        }

        jQuery.ajax({
            url: "http://hr.lagou.com/plus/getVipTip.json",
            dataType: 'jsonp',
            jsonp: 'jsoncallback'
        }).done(function (response) {
            callback && callback(response);
        });
    });


</script>


</body>
</html>