<!DOCTYPE html>
<html id="html">
<head>

    <title>一拍我的邀约-校易聘-最专业的互联网招聘平台</title>
    @include('index.beat.beatCss')

    <link rel="stylesheet" type="text/css" href="{{env('APP_HOST')}}/yi/invation.css">
    <link rel="stylesheet" type="text/css" href="{{env('APP_HOST')}}/style/css/style.css">
    <script charset="utf-8" class="lazyload" src="{{env('APP_HOST')}}/yi/jq.js"></script>
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
                <li class="" onclick="trackMonitor('l-profile-nav')">
                    <a href="{{url('beatProfile')}}">我的履历</a>
                </li>
                <li class="active" onclick="trackMonitor('l-talent-invited-nav')"><a
                            href="{{url('beatInvited')}}">我的邀约</a></li>
                <li class="" onclick="trackMonitor('l-guide-nav')">
                    <a href="{{url('beatRaider')}}">一拍攻略</a></li>
            </ul>
            <a href="{{url('/')}}" id="nav-go-back" onclick="trackMonitor('l-backlagou-text')">回校易聘</a>
        </div>
    </div>
</div>

<div id="body">
    <div class="realcontent">
        <ul class="navlist" style="width: 1000px" id="navlist">
            <li class="total click_track MD5_INDEX_0" event-name="c-myreceivedInvitations-toptotal" id="total"
                data-type="total" style="height:24px;line-height:24px;font-size:14px;margin-top:13px;margin-left:10px;">
                <a href="javascript:;">收到的所有邀约(<span>@if($num['cb']) {{$num['cb']}} @else 无 @endif</span>)</a>
            </li>

            <li class="arrange click_track md5_index_4" event-name="c-myreceivedInvitations-tophasarragedInterview"
                data-type="arrange">
                <a href="javascript:;">我的Offer(<span>@if(isset($num['cb9'])) {{$num['cb9']}} @else 0 @endif</span>)</a>
            </li>
            <li class="arrange click_track md5_index_4" event-name="c-myreceivedInvitations-tophasarragedInterview"
                data-type="arrange">
                <a href="javascript:;">收到Offer(<span>@if(isset($num['cb3'])) {{$num['cb6']}} @else 0 @endif</span>)</a>
            </li>

            <li class="arrange click_track md5_index_4" event-name="c-myreceivedInvitations-tophasarragedInterview"
                data-type="arrange">
                <a href="javascript:;">不合适(<span>@if(isset($num['cb4'])) {{$num['cb4']}} @else 0 @endif</span>)</a>
            </li>

            <li class="arrange click_track md5_index_4" event-name="c-myreceivedInvitations-tophasarragedInterview"
                data-type="arrange">
                <a href="javascript:;">已安排约见(<span>@if(isset($num['cb6'])) {{$num['cb6']}} @else 0 @endif</span>)</a>
            </li>
            <li class="refused click_track MD5_INDEX_3" event-name="c-myreceivedInvitations-tophasrefuse"
                data-type="refused"><a href="javascript:;">已拒绝(<span>@if(isset($num['cb7'])) {{$num['cb7']}}  @else
                            0 @endif</span>)</a>
            </li>
            <li class="accepted click_track MD5_INDEX_2" event-name="c-myreceivedInvitations-tophasreceived"
                data-type="accepted"><a href="javascript:;">已接受(<span>@if(isset($num['cb5'])) {{$num['cb5']}}  @else
                            0 @endif</span>)</a>
            </li>

            <li class="chat c
            lick_track MD5_INDEX_1 active" event-name="c-myreceivedInvitations-topwait" data-type="chat">
                <a href="javascript:;">待处理(<span>@if(isset($num['cb2'])) {{$num['cb2']}}  @else 0 @endif</span>)</a>
            </li>

        </ul>
        <div id="content" class="clearfix">

            <ul class="reset resumeLists hide">
                @if(isset($company['cb']))
                    @foreach($company['cb'] as $k=>$v)
                        <li data-id="1686182" class="onlineResume">


                            <div class="resumeShow">
                                <a title="预览公司" target="_blank" class="resumeImg"
                                   href="{{url('companyinfo')}}?c_id={{$v['c_id']}}">
                                    <img src="{{env('APP_HOST')}}{{$v['c_logo']}}">
                                </a>

                                <div class="resumeIntro">
                                    <h3 class="unread">
                                        <a target="_blank" title="{{$v['c_name']}}"
                                           href="{{url('companyinfo')}}?c_id={{$v['c_id']}}">
                                            {{$v['c_name']}}
                                        </a>
                                    </h3>
                                    <span class="fr">邀请时间：{{date('Y-m-d H:i',$time['cb'][$k])}}</span>


                                    <div>
                                        所处行业：{{$v['c_industry']}}<br>
                                        公司网址：<a target="_blank" href="{{$v['c_website']}}">{{$v['c_website']}}</a>

                                    </div>

                                    <div class="jdpublisher">
                                                        <span>
                                                            简短介绍：<a title="{{$v['c_shorthand']}}"
                                                                    href="javascript:;">{{$v['c_shorthand']}}</a>
                                                                                                                    </span>
                                    </div>


                                </div>
                                <div class="links">
                                        @if($bc_cid[$k]['cb_cb']==2)
                                        <a data-deliverid="1686182" data-name="jason" data-positionid="149594"
                                           bc_id="{{$bc_id['cb'][$k]}}" cb_cb="5" data-email="888888888@qq.com" class="resume_refuse"
                                           cb_cb="5" href="javascript:void(0)">接受邀约</a>
                                        <a data-deliverid="1686182" class="resume_refuse"
                                           bc_id="{{$bc_id['cb'][$k]}}" cb_cb="7" href="javascript:void(0)">拒绝邀约</a>
                                    @elseif($bc_cid[$k]['cb_cb']==3)
                                        <a data-deliverid="1686182" data-name="jason" data-positionid="149594"
                                           bc_id="{{$bc_id['cb'][$k]}}" cb_cb="9" class="resume_refuse"
                                           href="javascript:void(0)">接受此Offer</a>
                                        <a data-deliverid="1686182" data-name="jason" data-positionid="149594"
                                           bc_id="{{$bc_id['cb'][$k]}}" cb_cb="7" class="resume_refuse"
                                           href="javascript:void(0)">拒绝此Offer</a>

                                    @elseif($bc_cid[$k]['cb_cb']==4)
                                        <a data-deliverid="1686182" data-name="jason" data-positionid="149594"
                                           bc_id="{{$bc_id['cb'][$k]}}" class="resume_redel"
                                           href="javascript:void(0)">删除本条</a>
                                    @elseif($bc_cid[$k]['cb_cb']==5)
                                        <b>等待约见</b>
                                        <a data-deliverid="1686182" data-name="jason" data-positionid="149594"
                                           bc_id="{{$bc_id['cb'][$k]}}" cb_cb="7" class="resume_refuse"
                                           href="javascript:void(0)">取消本次约见</a>
                                    @elseif($bc_cid[$k]['cb_cb']==6)
                                        <b>具体详情请查看邮箱</b>
                                    @elseif($bc_cid[$k]['cb_cb']==7)
                                        <a data-deliverid="1686182" data-name="jason" data-positionid="149594"
                                           bc_id="{{$bc_id['cb'][$k]}}" class="resume_redel"
                                           href="javascript:void(0)">删除本条</a>
                                    @elseif($bc_cid[$k]['cb_cb']==9)
                                        <b>请尽快入职</b>
                                    @endif
                                </div>
                            </div>
                            <div class="contactInfo">
                                <span class="c9">电话：</span>{{$v['c_tel']}} &nbsp;&nbsp;&nbsp;
                                <span class="c9">邮箱：</span><a href="mailto:{{$v['c_email']}}">{{$v['c_email']}}</a>
                            </div>
                        </li>
                    @endforeach
                @endif
            </ul>

        {{--我的Offer--}}
            <ul class="reset resumeLists hide">
                @if(isset($company['cb9']))
                    @foreach($company['cb9'] as $k=>$v)
                        <li data-id="1686182" class="onlineResume">


                            <div class="resumeShow">
                                <a title="预览公司" target="_blank" class="resumeImg"
                                   href="{{url('companyinfo')}}?c_id={{$v['c_id']}}">
                                    <img src="{{env('APP_HOST')}}{{$v['c_logo']}}">
                                </a>

                                <div class="resumeIntro">
                                    <h3 class="unread">
                                        <a target="_blank" title="{{$v['c_name']}}"
                                           href="{{url('companyinfo')}}?c_id={{$v['c_id']}}">
                                            {{$v['c_name']}}
                                        </a>
                                    </h3>


                                    <div>
                                        所处行业：{{$v['c_industry']}}<br>
                                        公司网址：<a target="_blank" href="{{$v['c_website']}}">{{$v['c_website']}}</a>

                                    </div>

                                    <div class="jdpublisher">
                                                        <span>
                                                            简短介绍：<a title="{{$v['c_shorthand']}}"
                                                                    href="javascript:;">{{$v['c_shorthand']}}</a>
                                                                                                                    </span>
                                    </div>


                                </div>
                                <div class="links">
                            <b>请尽快入职</b>
                                </div>
                            </div>
                            <div class="contactInfo">
                                <span class="c9">电话：</span>{{$v['c_tel']}} &nbsp;&nbsp;&nbsp;
                                <span class="c9">邮箱：</span><a href="mailto:{{$v['c_email']}}">{{$v['c_email']}}</a>
                            </div>
                        </li>
                    @endforeach
                @endif
            </ul>

        {{--收到的Offer--}}
            <ul class="reset resumeLists hide">
                @if(isset($company['cb3']))
                    @foreach($company['cb3'] as $k=>$v)
                        <li data-id="1686182" class="onlineResume">


                            <div class="resumeShow">
                                <a title="预览公司" target="_blank" class="resumeImg"
                                   href="{{url('companyinfo')}}?c_id={{$v['c_id']}}">
                                    <img src="{{env('APP_HOST')}}{{$v['c_logo']}}">
                                </a>

                                <div class="resumeIntro">
                                    <h3 class="unread">
                                        <a target="_blank" title="{{$v['c_name']}}"
                                           href="{{url('companyinfo')}}?c_id={{$v['c_id']}}">
                                            {{$v['c_name']}}
                                        </a>
                                    </h3>


                                    <div>
                                        所处行业：{{$v['c_industry']}}<br>
                                        公司网址：<a target="_blank" href="{{$v['c_website']}}">{{$v['c_website']}}</a>

                                    </div>

                                    <div class="jdpublisher">
                                                        <span>
                                                            简短介绍：<a title="{{$v['c_shorthand']}}"
                                                                    href="javascript:;">{{$v['c_shorthand']}}</a>
                                                                                                                    </span>
                                    </div>


                                </div>
                                <div class="links">

                                    <a data-deliverid="1686182" data-name="jason" data-positionid="149594"
                                       bc_id="{{$bc_id['cb3'][$k]}}" cb_cb="9" class="resume_refuse"
                                       href="javascript:void(0)">接受此Offer</a>
                                    <a data-deliverid="1686182" data-name="jason" data-positionid="149594"
                                       bc_id="{{$bc_id['cb3'][$k]}}" cb_cb="7" class="resume_refuse"
                                       href="javascript:void(0)">拒绝此Offer</a>
                                </div>
                            </div>
                            <div class="contactInfo">
                                <span class="c9">电话：</span>{{$v['c_tel']}} &nbsp;&nbsp;&nbsp;
                                <span class="c9">邮箱：</span><a href="mailto:{{$v['c_email']}}">{{$v['c_email']}}</a>
                            </div>
                        </li>
                    @endforeach
                @endif
            </ul>

            {{--不合适--}}
            <ul class="reset resumeLists hide">
                @if(isset($company['cb4']))
                    @foreach($company['cb4'] as $k=>$v)
                        <li data-id="1686182" class="onlineResume">


                            <div class="resumeShow">
                                <a title="预览公司" target="_blank" class="resumeImg"
                                   href="{{url('companyinfo')}}?c_id={{$v['c_id']}}">
                                    <img src="{{env('APP_HOST')}}{{$v['c_logo']}}">
                                </a>

                                <div class="resumeIntro">
                                    <h3 class="unread">
                                        <a target="_blank" title="{{$v['c_name']}}"
                                           href="{{url('companyinfo')}}?c_id={{$v['c_id']}}">
                                            {{$v['c_name']}}
                                        </a>
                                    </h3>
                                    <span class="fr">邀请时间：{{date('Y-m-d H:i',$time['cb4'][$k])}}</span>
                                    <br/>
                                    <span class="fr">原因：@if(empty($bc_id['cb4'][$k]['cb_reason']))
                                            无 @else{{$bc_id['cb4'][$k]['cb_reason']}} @endif</span>

                                    <div>
                                        所处行业：{{$v['c_industry']}}<br>
                                        公司网址：<a target="_blank" href="{{$v['c_website']}}">{{$v['c_website']}}</a>

                                    </div>

                                    <div class="jdpublisher">
                                                        <span>
                                                            简短介绍：<a title="{{$v['c_shorthand']}}"
                                                                    href="javascript:;">{{$v['c_shorthand']}}</a>
                                                                                                                    </span>
                                    </div>


                                </div>
                                <div class="links">

                                    <a data-deliverid="1686182" data-name="jason" data-positionid="149594"
                                       bc_id="{{$bc_id['cb4'][$k]}}" class="resume_redel"
                                       href="javascript:void(0)">删除本条</a>
                                </div>
                            </div>
                            <div class="contactInfo">
                                <span class="c9">电话：</span>{{$v['c_tel']}} &nbsp;&nbsp;&nbsp;
                                <span class="c9">邮箱：</span><a href="mailto:{{$v['c_email']}}">{{$v['c_email']}}</a>
                            </div>
                        </li>
                    @endforeach
                @endif
            </ul>
        {{--已安排约见--}}
            <ul class="reset resumeLists hide">
                @if(isset($company['cb6']))
                    @foreach($company['cb6'] as $k=>$v)
                        <li data-id="1686182" class="onlineResume">


                            <div class="resumeShow">
                                <a title="预览公司" target="_blank" class="resumeImg"
                                   href="{{url('companyinfo')}}?c_id={{$v['c_id']}}">
                                    <img src="{{env('APP_HOST')}}{{$v['c_logo']}}">
                                </a>

                                <div class="resumeIntro">
                                    <h3 class="unread">
                                        <a target="_blank" title="{{$v['c_name']}}"
                                           href="{{url('companyinfo')}}?c_id={{$v['c_id']}}">
                                            {{$v['c_name']}}
                                        </a>
                                    </h3>
                                    <span class="fr">邀请时间：{{date('Y-m-d H:i',$time['cb6'][$k])}}</span>

                                    <div>
                                        所处行业：{{$v['c_industry']}}<br>
                                        公司网址：<a target="_blank" href="{{$v['c_website']}}">{{$v['c_website']}}</a>

                                    </div>
                                    <div class="jdpublisher">
                                                        <span>
                                                            简短介绍：<a title="{{$v['c_shorthand']}}"
                                                                    href="javascript:;">{{$v['c_shorthand']}}</a>
                                                                                                                    </span>
                                    </div>
                                </div>
                                <div class="links">

                                    <b>具体详情请查看邮箱</b>

                                </div>
                            </div>
                            <div class="contactInfo">
                                <span class="c9">电话：</span>{{$v['c_tel']}} &nbsp;&nbsp;&nbsp;
                                <span class="c9">邮箱：</span><a href="mailto:{{$v['c_email']}}">{{$v['c_email']}}</a>
                            </div>
                        </li>
                    @endforeach
                @endif
            </ul>

            {{--已拒绝--}}
            <ul class="reset resumeLists hide">
                @if(isset($company['cb7']))
                    @foreach($company['cb7'] as $k=>$v)
                        <li data-id="1686182" class="onlineResume">


                            <div class="resumeShow">
                                <a title="预览公司" target="_blank" class="resumeImg"
                                   href="{{url('companyinfo')}}?c_id={{$v['c_id']}}">
                                    <img src="{{env('APP_HOST')}}{{$v['c_logo']}}">
                                </a>

                                <div class="resumeIntro">
                                    <h3 class="unread">
                                        <a target="_blank" title="{{$v['c_name']}}"
                                           href="{{url('companyinfo')}}?c_id={{$v['c_id']}}">
                                            {{$v['c_name']}}
                                        </a>
                                    </h3>
                                    <span class="fr">邀请时间：{{date('Y-m-d H:i',$time['cb7'][$k])}}</span>

                                    <div>
                                        所处行业：{{$v['c_industry']}}<br>
                                        公司网址：<a target="_blank" href="{{$v['c_website']}}">{{$v['c_website']}}</a>

                                    </div>
                                    <div class="jdpublisher">
                                                        <span>
                                                            简短介绍：<a title="{{$v['c_shorthand']}}"
                                                                    href="javascript:;">{{$v['c_shorthand']}}</a>
                                                                                                                    </span>
                                    </div>
                                </div>
                                <div class="links">
                                    <a data-deliverid="1686182" data-name="jason" data-positionid="149594"
                                       bc_id="{{$bc_id['cb'][$k]}}" class="resume_redel"
                                       href="javascript:void(0)">删除本条</a>
                                </div>
                            </div>
                            <div class="contactInfo">
                                <span class="c9">电话：</span>{{$v['c_tel']}} &nbsp;&nbsp;&nbsp;
                                <span class="c9">邮箱：</span><a href="mailto:{{$v['c_email']}}">{{$v['c_email']}}</a>
                            </div>
                        </li>
                    @endforeach
                @endif
            </ul>
            {{--已接受--}}
            <ul class="reset resumeLists hide">
                @if(isset($company['cb5']))
                    @foreach($company['cb5'] as $k=>$v)

                        <li data-id="1686182" class="onlineResume">


                            <div class="resumeShow">
                                <a title="预览公司" target="_blank" class="resumeImg"
                                   href="{{url('companyinfo')}}?c_id={{$v['c_id']}}">
                                    <img src="{{env('APP_HOST')}}{{$v['c_logo']}}">
                                </a>

                                <div class="resumeIntro">
                                    <h3 class="unread">
                                        <a target="_blank" title="{{$v['c_name']}}"
                                           href="{{url('companyinfo')}}?c_id={{$v['c_id']}}">
                                            {{$v['c_name']}}
                                        </a>
                                    </h3>
                                    <span class="fr">邀请时间：{{date('Y-m-d H:i',$time['cb5'][$k])}}</span>

                                    <div>
                                        所处行业：{{$v['c_industry']}}<br>
                                        公司网址：<a target="_blank" href="{{$v['c_website']}}">{{$v['c_website']}}</a>

                                    </div>
                                    <div class="jdpublisher">
                                                        <span>
                                                            简短介绍：<a title="{{$v['c_shorthand']}}"
                                                                    href="javascript:;">{{$v['c_shorthand']}}</a>
                                                                                                                    </span>
                                    </div>
                                </div>
                                <div class="links">

                                    <b>等待约见</b>
                                    <a data-deliverid="1686182" data-name="jason" data-positionid="149594"
                                       bc_id="{{$bc_id['cb5'][$k]}}" cb_cb="7" class="resume_refuse"
                                       href="javascript:void(0)">取消本次约见</a>
                                </div>
                            </div>
                            <div class="contactInfo">
                                <span class="c9">电话：</span>{{$v['c_tel']}} &nbsp;&nbsp;&nbsp;
                                <span class="c9">邮箱：</span><a href="mailto:{{$v['c_email']}}">{{$v['c_email']}}</a>
                            </div>
                        </li>

                    @endforeach
                @endif
            </ul>

            {{--待处理--}}
            <ul class="reset resumeLists">
                @if(isset($company['cb2']))
                    @foreach($company['cb2'] as $k=>$v)
                        <li data-id="1686182" class="onlineResume">


                            <div class="resumeShow">
                                <a title="预览公司" target="_blank" class="resumeImg"
                                   href="{{url('companyinfo')}}?c_id={{$v['c_id']}}">
                                    <img src="{{env('APP_HOST')}}{{$v['c_logo']}}">
                                </a>

                                <div class="resumeIntro">
                                    <h3 class="unread">
                                        <a target="_blank" title="{{$v['c_name']}}"
                                           href="{{url('companyinfo')}}?c_id={{$v['c_id']}}">
                                            {{$v['c_name']}}
                                        </a>
                                    </h3>
                                    <span class="fr">邀请时间：{{date('Y-m-d H:i',$time['cb2'][$k])}}</span>

                                    <div>
                                        所处行业：{{$v['c_industry']}}<br>
                                        公司网址：<a target="_blank" href="{{$v['c_website']}}">{{$v['c_website']}}</a>

                                    </div>
                                    <div class="jdpublisher">
				                                        <span>
				                                        	公司：<a title="{{$v['c_shorthand']}}"
                                                                  href="javascript:;">{{$v['c_shorthand']}}</a>
				                                       						                                        </span>
                                    </div>
                                </div>
                                <div class="links">
                                    <a data-deliverid="1686182" data-name="jason" data-positionid="149594"
                                       bc_id="{{$bc_id['cb2'][$k]}}" cb_cb="5" data-email="888888888@qq.com" class="resume_refuse"
                                       cb_cb="5" href="javascript:void(0)">接受邀约</a>
                                    <a data-deliverid="1686182" class="resume_refuse"
                                       bc_id="{{$bc_id['cb2'][$k]}}" cb_cb="7" href="javascript:void(0)">拒绝邀约</a>
                                </div>
                            </div>
                            <div class="contactInfo">
                                <span class="c9">电话：</span>{{$v['c_tel']}} &nbsp;&nbsp;&nbsp;
                                <span class="c9">邮箱：</span><a href="mailto:{{$v['c_email']}}">{{$v['c_email']}}</a>
                            </div>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>

</div>


<script type="text/javascript" src="{{env('APP_HOST')}}/yi/esl.js"></script>

<script type="text/javascript" src="{{env('APP_HOST')}}/yi/invation.js"></script>
<script type="text/javascript">

    //期望工作--开始
    window.onload = function () {
        var $li = $('#navlist li');
        var $ul = $('#content ul');

        $li.click(function () {
            var $this = $(this);
            var $t = $this.index();
            $li.removeClass('active');
            $this.addClass('active');
            $ul.siblings('ul').addClass('hide');
            $ul.eq($t).removeClass('hide');
        })
    }
    var ctx = "http://pai.lagou.com";
    var lctx = "http://www.lagou.com";


    var _hmt = _hmt || [];
    (function () {
        var hm = document.createElement("script");
        hm.src = "//hm.baidu.com/hm.js?96cde98aa3a93d00e87f0e6ed4c296a0";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();


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
    });


    /**
     *  对我的邀约的操作
     * @param  {[type]} ){                            var bc_id [description]
 * @param  {[type]} success: function(msg){                                             if(msg [description]
 * @return {[type]}          [description]
 */
    $('.resume_refuse').click(function () {

        var bc_id = $(this).attr('bc_id');
        var cb_cb = $(this).attr('cb_cb');
        _this = $(this);
        $.ajax({
            type: "GET",
            url: "invitedUp",
            data: {bc_id: bc_id, cb_cb: cb_cb},
            success: function (msg) {
                if (msg==1) {
                    _this.parents('.onlineResume').slideUp('slow');
                } else {
                    alert('刷新后重试');
                }
            }
        });

    });


    /**
     * 删除我的邀约信息
     */
    $('.resume_redel').click(function () {

        var bc_id = $(this).attr('bc_id');
//        alert(bc_id)
        _this = $(this);
        $.ajax({
            type: "GET",
            url: "invitedDel",
            data: {bc_id: bc_id},
            success: function (msg) {
                if (msg == 1) {
                    _this.parents('.onlineResume').slideUp('slow');
                } else {
                    alert('刷新后重试');
                }
            }
        });

    });

</script>

</body>
</html>
