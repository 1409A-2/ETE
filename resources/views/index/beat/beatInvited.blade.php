<!DOCTYPE html>
<html>
<head>

    <title>一拍我的邀约-校易聘-最专业的互联网招聘平台</title>
    @include('index.beat.beatCss')

    <link rel="stylesheet" type="text/css" href="{{env('APP_HOST')}}/yi/invation.css">
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

<div id="body">
    <div class="body-loading body-loading-">
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
    <div class="realcontent">
        <ul class="navlist" id="navlist">
            <li class="total click_track MD5_INDEX_0" event-name="c-myreceivedInvitations-toptotal" id="total"
                data-type="total" style="height:24px;line-height:24px;font-size:14px;margin-top:13px;margin-left:10px;">
                <a href="http://pai.lagou.com/talent/invited.html?type=total">收到的所有邀约（<span>0</span>）</a></li>
            <li class="arrange click_track md5_index_4" event-name="c-myreceivedInvitations-tophasarragedInterview"
            '="" data-type="arrange"><a
                    href="http://pai.lagou.com/talent/invited.html?type=arrange">已安排约见（<span>0</span>）</a>


            </li>


            <li class="refused click_track MD5_INDEX_3" event-name="c-myreceivedInvitations-tophasrefuse"
                data-type="refused"><a href="http://pai.lagou.com/talent/invited.html?type=refused">已拒绝（<span>0</span>）</a>

            </li>

            <li class="accepted click_track MD5_INDEX_2" event-name="c-myreceivedInvitations-tophasreceived"
                data-type="accepted"><a href="http://pai.lagou.com/talent/invited.html?type=accepted">已接受（<span>0</span>）</a>

            </li>
            <li class="chat click_track MD5_INDEX_1 active" event-name="c-myreceivedInvitations-topwait"
            '="" data-type="chat"><a href="http://pai.lagou.com/talent/invited.html?type=chat">待处理（<span>0</span>）</a>

            </li></ul>
        <div id="content" class="clearfix">
            <div id="content-left">
                <div class="sidebar" id="mouse-over">
                    <ul style="position: relative; overflow: visible;"
                        class="barlist mCustomScrollbar _mCS_1 mCS-autoHide mCS_no_scrollbar" id="barlistover">
                        <div tabindex="0" style="max-height: none;" id="mCSB_1"
                             class="mCustomScrollBox mCS-minimal mCSB_vertical mCSB_outside">
                            <div id="mCSB_1_container" class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y"
                                 style="position:relative; top:0; left:0;" dir="ltr"></div>
                        </div>
                        <div style="display: none;" id="mCSB_1_scrollbar_vertical"
                             class="mCSB_scrollTools mCSB_1_scrollbar mCS-minimal mCSB_scrollTools_vertical">
                            <div class="mCSB_draggerContainer">
                                <div id="mCSB_1_dragger_vertical" class="mCSB_dragger"
                                     style="position: absolute; min-height: 50px; top: 0px;"
                                     oncontextmenu="return false;">
                                    <div style="line-height: 50px;" class="mCSB_dragger_bar"></div>
                                </div>
                                <div class="mCSB_draggerRail"></div>
                            </div>
                        </div>
                    </ul>
                </div>
                <div style="display: block;" id="content-right">
                    <div class="loading">
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
                    <div id="content-right-detail"></div>
                </div>
                <div id="no-tip" class="" style="margin-top: 50px">
                    <img src="{{env('APP_HOST')}}/yi/noresult.png" alt="tip" style="margin-left:0;">

                    <p>收到的邀约均已处理</p>

                    <p>暂无相关邀约记录</p>
                </div>
            </div>
            <div class="hide">
                <div id="popBox">
                    <div class="content-wrapper">
                        <div class="pop">
                            <div class="pop-body">
                                <p id="popbox-tip">接受邀约，企业可查看完整简历并主动与你私信啦～</p>
                            </div>
                            <div class="pop-foot">
                                <input class="btn btn-ok" value="确定" type="button">
                                <input class="btn btn-close" value="取消" type="button">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hide">
                <div id="popBoxRefuse">
                    <div class="content-wrapper">
                        <div class="pop">
                            <div class="pop-body">
                                <p id="popboxRefuse-tip">
                                </p>

                                <h1>你不感兴趣的原因是？</h1>

                                <p class="desc"></p>
                                <ul>
                                    <li><input value="1" name="refuseReason" id="refuse1" type="radio"><label
                                                for="refuse1">行业不感兴趣</label></li>
                                    <li><input value="2" name="refuseReason" id="refuse2" type="radio"><label
                                                for="refuse2">公司了解太少</label></li>
                                    <li><input value="3" name="refuseReason" id="refuse3" type="radio"><label
                                                for="refuse3">工作地点不满意</label></li>
                                    <li><input value="4" name="refuseReason" id="refuse4" type="radio"><label
                                                for="refuse4">工作内容不感兴趣</label></li>
                                    <li><input value="5" name="refuseReason" id="refuse5" type="radio"><label
                                                for="refuse5">薪资不满意</label></li>
                                    <li><input value="6" name="refuseReason" id="refuse6" type="radio"><label
                                                for="refuse6">已有满意offer</label></li>
                                </ul>
                                <input name="otherRefuse" id="otherRefuse" class="otherRefuse1"
                                       placeholder="或者你有其他原因(限15字)" type="text">

                                <div class="error-tip">输入过长(限15字)</div>
                                <div class="all-error-tip">请选择不感兴趣理由或填写自定义内容</div>
                                <div class="one-error-tip">只能提交一个原因</div>
                                <p></p>
                            </div>
                            <div class="pop-foot">
                                <input class="btn-refuse-ok" value="确&nbsp;定" type="button">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{--<script type="text/html" id="sideBar">--}}
{{--{{each invites as invite}}--}}
{{--<li userID="{{invite.inviteId}}" positionid="{{invite.id}}" class="{{invite.inviteIdMD5}}">--}}
{{--{{if invite.showInvitesTip == true}}--}}
{{--<i class='news'></i>--}}


{{--{{if invite.interviewTime}}--}}
{{--<div class="time">--}}
{{--{{if invite.companyLog != null && invite.companyLog }}--}}
{{--<img src="http://www.lagou.com/{{invite.companyLog}}" alt="头像" class='company-logo'>--}}

{{--<h3>{{if invite.companyName}} {{invite.companyName}} {{else}}</h3>--}}


{{--<p class='money'><span>{{invite.salary}}</span>/月·{{invite.city}}</p>--}}

{{--<p class="positions">{{invite.positionName}}</p>--}}
{{--{{if invite.isInterviewTimeGreen}}--}}
{{--<p class="interviewTimeGreen">约见时间 : {{invite.interviewTime}}</p>--}}
{{--{{else}}--}}
{{--<p class="interviewTimeGrey">约见时间 : {{invite.interviewTime}}</p>--}}

{{--</div>--}}
{{--{{else}}--}}
{{--<div>--}}
{{--{{if invite.companyLog != null && invite.companyLog }}--}}
{{--<img src="http://www.lagou.com/{{invite.companyLog}}" alt="头像" class='company-logo'>--}}

{{--<h3>{{if invite.companyName}} {{invite.companyName}} {{else}}</h3>--}}


{{--<p class='money'><span>{{invite.salary}}</span>/月·{{invite.city}}</p>--}}

{{--<p class="positions">{{invite.positionName}}</p>--}}
{{--</div>--}}

{{--{{if invite.statusStr == "已拒绝"}}--}}
{{--<span class="gray">{{invite.statusStr}}</span>--}}

{{--{{if invite.statusStr == "被取消"}}--}}
{{--<span class="gray">{{invite.statusStr}}</span>--}}

{{--{{if invite.statusStr == "待处理"}}--}}
{{--<span class="green">{{invite.statusStr}}</span>--}}

{{--{{if invite.statusStr == "已接受"}}--}}
{{--<span class="green">{{invite.statusStr}}</span>--}}

{{--{{if invite.statusStr == "沟通中"}}--}}
{{--<span class="green">{{invite.statusStr}}</span>--}}

{{--{{if invite.statusStr == "已安排约见"}}--}}
{{--<span class="green">{{invite.statusStr}}</span>--}}

{{--{{if invite.statusStr == "已完成约见"}}--}}
{{--<span class="green">{{invite.statusStr}}</span>--}}

{{--</li>--}}
{{--{{/each}}--}}

{{--</script>--}}
{{--<script type="text/html" id="detail">--}}
{{--{{if detailVo != null && detailVo}}--}}
{{--<div class="detail" positionId="{{detailVo.id}}" receive="{{detailVo.hrId}}" userID="{{detailVo.inviteId}}"--}}
{{--userName="{{detailVo.userName}}" attr="{{detailVo.status}}">--}}
{{--<div class="detail-top">--}}
{{--<ul>--}}
{{--<li class='company-information'>--}}
{{--{{if detailVo.logo != null && detailVo.logo}}--}}
{{--<img src="http://www.lagou.com/{{detailVo.logo}}" alt="头像" class='detail-company-logo'>--}}

{{--<h3>{{detailVo.companyShortName}}·{{detailVo.positionName}}<span>（{{detailVo.salary}}/月）</span>--}}
{{--</h3>--}}

{{--<p class='company-size'>{{detailVo.industryField}} / {{detailVo.financeStage}}</p>--}}

{{--<p class='job-attract'>职位诱惑：{{detailVo.positionAdvantage}}</p>--}}
{{--</li>--}}
{{--<li class='add-more click_track ' event-name="c-myinvations-jobDetail"><a--}}
{{--href="http://pai.lagou.com/job/{{detailVo.inviteId}}.html" target="_blank">查看职位详情>></a></li>--}}
{{--{{if detailVo.invitationContent != null && detailVo.invitationContent}}--}}
{{--<li class='hr-tip'>--}}
{{--<p>{{detailVo.invitationContent}}</p>--}}

{{--<!--<p>快加入我们吧!</p>-->--}}
{{--<span></span>--}}
{{--</li>--}}

{{--<li class='detail-handler'>--}}
{{--{{if detailVo.status == 2 || detailVo.status == 1}}--}}
{{--<p>只有你同意邀约，企业才可以查看你的联系方式或主动向你发出私信~ 一周内不回应将自动拒绝邀约并知会到企业。</p>--}}
{{--<a href="javascript:void(0)" class='btn-accept click_track'--}}
{{--event-name="c-myinvations-receiveInvitations">接受邀约</a>--}}
{{--<a href="javascript:void(0)" class='btn-accept click_track'--}}
{{--event-name="c-myinvations-hasReceiveInvitations" id="has-accept">已接受</a>--}}
{{--<a href="javascript:void(0)" class='btn-dislike click_track'--}}
{{--event-name="c-myinvations-dislike">不感兴趣</a>--}}
{{--<a href="javascript:void(0)" class='btn-dislike click_track' event-name="c-myinvations-hasrefuse"--}}
{{--id="has-refuse">已拒绝</a>--}}

{{--<div class="sixin-arrow">--}}
{{--<a href="javascript:void(0)" class='btn-private click_track' event-name="c-myinvitations-sixin"><span></span>私信</a>--}}
{{--<i class='textarrow'></i>--}}
{{--</div>--}}
{{--{{else if detailVo.status == 3}}--}}

{{--<p>你已经接受了企业的邀约，企业将向你发出正式的约见通知。超过<span style="color: #ff7452;">7天</span>未收到企业约见通知，可以选择不再接受约见。</p>--}}

{{--{{if detailVo.showInviteButton == true}}--}}
{{--<a href="javascript:void(0)" class="btn-not-invite-3  click_track"--}}
{{--event-name="c-myinvitations-neverReceiveInterview" style='background:#95cdbe;'>不再接受约见</a>--}}

{{--<div class="sixin-arrow">--}}
{{--<a href="javascript:void(0)" class='btn-private click_track' event-name="c-myinvitations-sixin"><span></span>私信</a>--}}
{{--<i class='textarrow'></i>--}}
{{--</div>--}}
{{--<div class="abolish" id="abolish">--}}
{{--<span class="abolish-icon" style=""></span>--}}


{{--<h2>不再接受约见吗</h2>--}}

{{--<h3>告诉HR原因吧~</h3>--}}
{{--<ul>--}}
{{--<li><input value="1" type="radio" name="refuseReason" id="refuse1"/><label--}}
{{--for="refuse1">已通过一拍收到其它offer</label></li>--}}
{{--<li><input value="2" type="radio" name="refuseReason" id="refuse2"/><label--}}
{{--for="refuse2">已通过其他渠道收到offer</label></li>--}}

{{--<li><input value="3" type="radio" name="refuseReason" id="refuse3"/><label--}}
{{--for="refuse3">沟通后未达成一致</label></li>--}}
{{--{{if hasSevenDay == true}}--}}
{{--<li><input value="4" type="radio" name="refuseReason" id="refuse4"/><label--}}
{{--for="refuse4">长时间未收到面试通知</label></li>--}}

{{--</ul>--}}
{{--<input type="text" name="otherRefuse" id="otherRefuse" placeholder="或者你有其他原因(15字以内)"/>--}}

{{--<div class="otherRefuse_send">--}}
{{--<a href="javascript:void(0)" class="btn-abolish-send">确定</a>--}}
{{--</div>--}}
{{--</div>--}}
{{--{{else}}--}}
{{--<div id="disabled">不再接受约见</div>--}}
{{--<div class="sixin-arrow" style='margin-left:112px;'>--}}
{{--<a href="javascript:void(0)" class='btn-private-3'><span></span>私信</a>--}}
{{--<i class='textarrow'></i>--}}
{{--</div>--}}

{{--{{else if detailVo.status == 4}}--}}
{{--{{if refuseReason}}--}}
{{--<p>你已经拒绝了企业的邀约，企业无法查看你的联系方式。原因：<span style="color: #ff7452;">{{refuseReason}}</span></p>--}}
{{--{{else}}--}}
{{--<p>你已经拒绝了企业的邀约，企业无法查看你的联系方式。</p>--}}

{{--{{else if detailVo.status == 5}}--}}
{{--<p>企业给你发出正式的面试通知了。做好准备赴约吧，别错过到手的机会。<br/>如果你已取得了Offer，可以去反馈Offer情况。</p>--}}

{{--<div class="sixin-arrow">--}}
{{--<a href="javascript:void(0)" class='btn-private-5 click_track'--}}
{{--event-name="c-myinvitations-sixin"><span></span>私信</a>--}}
{{--<i class='textarrow'></i>--}}
{{--</div>--}}
{{--{{else if detailVo.status == 8}}--}}
{{--<!--<p style='width: 400px;background: url("/static/images/pointright.png") no-repeat top right;'>邀约被取消，原因：{{cancelReason}}</p>-->--}}
{{--<p style='width: 400px;'>邀约被取消，原因：{{cancelReason}}</p>--}}
{{--{{else if detailVo.status == 9}}--}}

{{--<!--<p style='width: 320px;background: url("/static/images/pointright.png") no-repeat top right;'>企业已操作完成约见，如有疑问，请联系一拍顾问</p>-->--}}
{{--<p style='width: 320px;'>企业已操作完成约见，如有疑问，请联系一拍顾问</p>--}}


{{--<div class="private-text text-hide">--}}
{{--<textarea name="sixin" id="sixin" cols="30" rows="10"></textarea>--}}
{{--<a href="javascript:void(0)" class='btn-send'>发送</a>--}}
{{--<a href="javascript:void(0)" class='btn-no'>取消</a>--}}

{{--</div>--}}

{{--</li>--}}
{{--</ul>--}}
{{--</div>--}}

{{--<div class="detail-message">--}}
{{--<ul style="position:relative;">--}}
{{--{{if chatRecordVo != null && chatRecordVo.length !=0 }}--}}
{{--<div style="width:30px;height:34px;background: url('/static/images/dtop.png') no-repeat 0px -3px;position: absolute;top: 0px;left: -4px;z-index: 999;"></div>--}}
{{--{{each chatRecordVo as chatRecord index}}--}}
{{--{{if index == 0}}--}}
{{--<input type="hidden" id="revertImage" value="{{chatRecord.iconWrite}}"/>--}}

{{--{{/each}}--}}
{{--{{each chatRecordVo as chatRecord}}--}}
{{--{{if chatRecord.showInvitePosition}}--}}

{{--<li class='system-message'>--}}
{{--<i style="background:url('{{chatRecord.icon}}') no-repeat"></i>--}}
{{--<span class='logo system-logo'><img src="{{chatRecord.headPic}}" alt="头像"/></span>--}}


{{--{{if chatRecord.receiveId == 6023231}}--}}
{{--<h3>收到邀约</h3>--}}
{{--{{else}}--}}
{{--<h3 class="grey">收到邀约</h3>--}}


{{--<h5>{{chatRecord.createTime}}</h5>--}}

{{--<p><strong class="grey">职位：</strong><span><a--}}
{{--href="http://pai.lagou.com/job/{{chatRecord.inviteId}}.html" target="_blank"--}}
{{--style="color:#00b38a;">{{chatRecord.invitePositionVo.invitationpositionname}}</a></span>--}}
{{--</p>--}}

{{--<p><strong class="grey">城市：</strong><span>{{chatRecord.invitePositionVo.invitationcity}}</span></p>--}}

{{--<p><strong class="grey">薪资：</strong><span>{{chatRecord.invitePositionVo.invitationsalary}}</span>--}}
{{--</p>--}}

{{--<h3 class="content" style='margin-top:10px;'>{{#chatRecord.content}}</h3>--}}
{{--</li>--}}
{{--{{else if chatRecord.showInviteRecord}}--}}
{{--<li class='system-message'>--}}
{{--<i style="background:url('{{chatRecord.icon}}') no-repeat"></i>--}}
{{--<span class='logo system-logo'><img src="{{chatRecord.headPic}}" alt="头像"/></span>--}}


{{--{{if chatRecord.receiveId == 6023231}}--}}
{{--<h3>约见安排</h3>--}}

{{--{{else}}--}}
{{--<h3 class="grey">约见安排</h3>--}}


{{--<h5>{{chatRecord.createTime}}</h5>--}}


{{--<p><strong class="grey">约见时间：</strong><span>{{chatRecord.invitationRecordVo.inviteTime}}</span></p>--}}

{{--<p><strong class="grey">约见地点：</strong><span>{{chatRecord.invitationRecordVo.inviteSite}}</span></p>--}}

{{--<p><strong class="grey">联系人：</strong><span--}}
{{--class='person'>{{chatRecord.invitationRecordVo.linkman}}</span></p>--}}

{{--<p><strong class="grey">联系电话：</strong><span>{{chatRecord.invitationRecordVo.linkPhone}}</span></p>--}}

{{--</li>--}}
{{--{{else if chatRecord.sendId == -1}}--}}
{{--<li class='system-accept system-logo'>--}}
{{--<i style="background:url('{{chatRecord.icon}}') no-repeat"></i>--}}
{{--<span class='logo'><img src="{{chatRecord.headPic}}" alt="头像"/></span>--}}

{{--<h3 class="content">{{#chatRecord.content}}</h3>--}}
{{--<h5></h5>--}}
{{--</li>--}}
{{--{{else}}--}}
{{--{{if chatRecord.sendId == 6023231}}--}}
{{--<li class='myself'>--}}
{{--<i style="background:url('{{chatRecord.icon}}') no-repeat"></i>--}}
{{--<span class='logo myself-logo'><img src="{{chatRecord.headPic}}" alt="头像"/></span>--}}

{{--<div class='myself-said-content'>--}}
{{--<div class='myself'>{{chatRecord.viewName}}</div>--}}
{{--{{#chatRecord.content}}--}}
{{--</div>--}}
{{--<h5>{{chatRecord.createTime}}</h5>--}}
{{--</li>--}}
{{--{{else}}--}}
{{--<li class='hr-said'>--}}
{{--<i style="background:url('{{chatRecord.icon}}') no-repeat"></i>--}}
{{--<span class='logo hr-logo'><img src="{{chatRecord.headPic}}" alt="头像"/></span>--}}

{{--<div class='hr-said-content'>--}}
{{--<div class='hr-said-name'>{{chatRecord.viewName}}：</div>--}}
{{--{{#chatRecord.content}}--}}
{{--<h5>{{chatRecord.createTime}}</h5>--}}
{{--</div>--}}
{{--</li>--}}



{{--{{/each}}--}}
{{--<div style="width:30px;height:23px;background: url('/static/images/dfoot.png') no-repeat;position: absolute;bottom: 0px;left: -4px;z-index: 999;"></div>--}}

{{--</ul>--}}
{{--</div>--}}

{{--</div>--}}

{{--</script>--}}
{{--<script type="text/html" id="navlistLi">--}}
{{--<li class='total click_track MD5_INDEX_0' event-name="c-myreceivedInvitations-toptotal" id='total' data-type="total"--}}
{{--style="height:24px;line-height:24px;font-size:14px;margin-top:13px;margin-left:10px;"><a--}}
{{--href="http://pai.lagou.com/talent/invited.html?type=total">收到的所有邀约（<span>{{total}}</span>）</a></li>--}}
{{--<li class='arrange click_track md5_index_4'--}}
{{--event-name="c-myreceivedInvitations-tophasarragedInterview"' data-type="arrange"><a--}}
{{--href="http://pai.lagou.com/talent/invited.html?type=arrange">已安排约见（<span>{{arrange}}</span>）</a>--}}

{{--{{if hrInvitesNumTipVo.arrange >9}}--}}
{{--<div class='news-tip'>10+</div>--}}
{{--{{else if hrInvitesNumTipVo.arrange >0}}--}}
{{--<div class='news-tip'>{{hrInvitesNumTipVo.arrange}}</div>--}}

{{--</li>--}}


{{--<li class='refused click_track MD5_INDEX_3' event-name="c-myreceivedInvitations-tophasrefuse" data-type="refused"><a--}}
{{--href="http://pai.lagou.com/talent/invited.html?type=refused">已拒绝（<span>{{refuse}}</span>）</a>--}}
{{--{{if hrInvitesNumTipVo.refuse >9 }}--}}
{{--<div class='news-tip'>10+</div>--}}
{{--{{else if hrInvitesNumTipVo.refuse >0}}--}}
{{--<div class='news-tip'>{{hrInvitesNumTipVo.refuse}}</div>--}}

{{--</li>--}}

{{--<li class='accepted click_track MD5_INDEX_2' event-name="c-myreceivedInvitations-tophasreceived"--}}
{{--data-type="accepted"><a--}}
{{--href="http://pai.lagou.com/talent/invited.html?type=accepted">已接受（<span>{{accept}}</span>）</a>--}}
{{--{{if hrInvitesNumTipVo.accept >9 }}--}}
{{--<div class='news-tip'>10+</div>--}}
{{--{{else if hrInvitesNumTipVo.accept >0}}--}}
{{--<div class='news-tip'>{{hrInvitesNumTipVo.accept}}</div>--}}

{{--</li>--}}
{{--<li class='chat click_track MD5_INDEX_1' event-name="c-myreceivedInvitations-topwait"' data-type="chat"><a--}}
{{--href="http://pai.lagou.com/talent/invited.html?type=chat">待处理（<span>{{chat}}</span>）</a>--}}
{{--{{if hrInvitesNumTipVo.wait+hrInvitesNumTipVo.chat > 9}}--}}
{{--<div class='news-tip'>10+</div>--}}
{{--{{else if hrInvitesNumTipVo.chat >0}}--}}
{{--<div class='news-tip'>{{hrInvitesNumTipVo.wait+hrInvitesNumTipVo.chat}}</div>--}}

{{--</li>--}}
{{--</script>--}}
<div id="footer">
    <div class="wrapper">
        <i class="footer_lagou_icon"></i>

        <div class="inner_wrapper">
            <a class="footer_app click_track" event-name="l-appdownload-footer"
               href="http://www.lagou.com/app/download.html" rel="nofollow">拉勾APP<span></span><i></i></a>
            <a class="click_track" event-name="l-weibo-footer" href="http://e.weibo.com/lagou720" target="_blank"
               rel="nofollow">拉勾微博</a>
            <a class="footer_qr click_track" event-name="l-weixin-footer" href="javascript:void(0)"
               rel="nofollow">拉勾微信<i></i></a>
            <a class="click_track" event-name="l-whatisnew-footer" href="http://www.lagou.com/topic/whatisnew.html"
               target="_blank" rel="nofollow">版本更新</a>
            <a class="click_track" event-name="l-help-footer" href="http://www.lagou.com/qa.html?t=1" target="_blank"
               rel="nofollow">帮助中心</a>
            <a class="click_track" event-name="l-about-footer" href="http://www.lagou.com/about.html" target="_blank"
               rel="nofollow">联系我们</a>
            <a class="click_track" event-name="l-chat-footer" id="onlineService" href="javascript:void(0);"
               rel="nofollow">在线交流</a>
            <span class="tel">服务热线：<em>400-605-9900 (9:00 -19:00)</em></span>
        </div>
        <div class="copy">
            <span><em>©</em>2016 Lagou</span>
            <a class="click_track" event-name="l-beian-footer" target="_blank"
               href="http://www.miitbeian.gov.cn/state/outPortal/loginPortal.action" rel="nofollow">京ICP备14023790号-2</a>
            <span>京公网安备11010802017116号</span>
        </div>
    </div>
</div>
<div class="totop-wrapper" style="width:1024px;margin:0 auto;">
    <a style="display: none;margin-left: 1060px" id="backtop" title="回到顶部" rel="nofollow"></a>

    <div id="product-fk">
        <div id="feedback-icon" class="click_track" event-name="b-feedback">
            <div class="fb-icon"></div>
            <span>我要反馈</span>
            <em class="error dn fk-limit">今天已经反馈足够多了，给Candy点时间消化下吧~<i></i></em>
            <em class="error dn fk-suc">&nbsp;&nbsp;反馈提交成功！</em>
        </div>
    </div>
    <div id="feedback-con">
        <div class="pfb-pho-close">
            <div class="pfb-pho"></div>
            <div class="pfb-close"></div>
        </div>
        <em class="error dn"><span>你还没填任何反馈呢</span><i></i></em>

        <form id="product-fb">
            <div class="pfb-txt">
                <textarea placeholder="我是一拍的小管家Candy，把你遇到的问题，对一拍的意见或建议告诉我吧（200字以内）" maxlength="200"></textarea>
            </div>
            <div class="pfb-email" style="height:60px;">
                <input name="email" placeholder="留下邮箱方便我们沟通（选填）" type="text">
                <span class="ensure">确定</span>
            </div>
        </form>
    </div>
</div>
<div id="_lgpassport_" data-css-site="0" data-css-popup="0"></div>
<script type="text/javascript" src="{{env('APP_HOST')}}/yi/esl.js"></script>
<script type="text/javascript">/*resourcemap*/
    require.config({
        paths: {
            "common/widgets/subject_header_c/javascript/msgPopup": "/static/common/widgets/subject_header_c/javascript/msgPopup"
        }
    });</script>
<script type="text/javascript" src="{{env('APP_HOST')}}/yi/invation.js"></script>
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


    var headPic = "i/image/M00/54/BE/CgqKkVfE-PuAbPOuAAYXdYYFqZk407.jpg";
    if (!headPic) {
        headPic = "/images/myresume/default_headpic.png"
    }


    require(['talents/page/invation/invation']);
    require(['talents/page/intro/intro']);


    // 关闭
    //3s tips消失
    $(function () {
        window.global = window.global || {};
        global.email = "18519112343@163.com";
        global.usertoken = jQuery.cookie('user_trace_token');
    });


    require(['dep/jquery.cookie/jquery.cookie', 'common/static/js/feedback', 'common/static/js/usertrack/track']);
    // 在线交流
    jQuery.ajax({
        url: 'http://wpa.b.qq.com/cgi/wpa.php',
        dataType: 'script',
        cache: true
    }).done(function () {
        BizQQWPA.addCustom({
            aty: '0',
            a: '0',
            nameAccount: 800056379,
            selector: 'onlineService'
        });
    });
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


    var paiUserId = "6023231";


    jQuery.ajax({
        url: 'http://passport.lagou.com/static/js/passport.js',
        dataType: 'script',
        cache: true
    }).done(function () {

        require(['common/widgets/subject_header_c/javascript/msgPopup']);
    });
</script>
<script type="text/javascript" src="{{env('APP_HOST')}}/yi/tongji.js"></script>
<script type="text/javascript" src="{{env('APP_HOST')}}/yi/analytics.js"></script>
<script type="text/javascript" src="{{env('APP_HOST')}}/yi/oss.js"></script>
<div style="display: none;" id="cboxOverlay"></div>
<div style="display: none;" tabindex="-1" role="dialog" class="" id="colorbox">
    <div id="cboxWrapper">
        <div>
            <div style="float: left;" id="cboxTopLeft"></div>
            <div style="float: left;" id="cboxTopCenter"></div>
            <div style="float: left;" id="cboxTopRight"></div>
        </div>
        <div style="clear: left;">
            <div style="float: left;" id="cboxMiddleLeft"></div>
            <div style="float: left;" id="cboxContent">
                <div style="float: left;" id="cboxTitle"></div>
                <div style="float: left;" id="cboxCurrent"></div>
                <button id="cboxPrevious" type="button"></button>
                <button id="cboxNext" type="button"></button>
                <button id="cboxSlideshow"></button>
                <div style="float: left;" id="cboxLoadingOverlay"></div>
                <div style="float: left;" id="cboxLoadingGraphic"></div>
            </div>
            <div style="float: left;" id="cboxMiddleRight"></div>
        </div>
        <div style="clear: left;">
            <div style="float: left;" id="cboxBottomLeft"></div>
            <div style="float: left;" id="cboxBottomCenter"></div>
            <div style="float: left;" id="cboxBottomRight"></div>
        </div>
    </div>
    <div style="position: absolute; width: 9999px; visibility: hidden; display: none;"></div>
</div>
</body>
</html>