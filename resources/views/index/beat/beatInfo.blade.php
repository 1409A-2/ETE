<!DOCTYPE html>
<html>
<head>
<title>一拍 · 即合-拉勾网-最专业的互联网招聘平台</title><meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="renderer" content="webkit">
<meta content="拉勾网是最权威的互联网行业招聘网站,提供全国真实的互联网招聘信息,工资不面议当面谈,找工作,招聘网,寻人才就来拉勾网,互联网行业找工作首选拉勾网" name="description">
<meta content="互联网招聘,找工作,招聘网,人才网" name="keywords">
<meta name="baidu-site-verification" content="QIQ6KC1oZ6" />
<link rel="Shortcut Icon" href="{{env('APP_HOST')}}/yi/index.png">
    <link rel="stylesheet" type="text/css" href="{{env('APP_HOST')}}/yi/basicInfo.css?v=1.5.5.7_102001" />
    <link rel="stylesheet" type="text/css" href="{{env('APP_HOST')}}/yi/header.css?v=1.5.5.7_102001" />
    <link rel="stylesheet" type="text/css" href="{{env('APP_HOST')}}/yi/common.css?v=1.5.5.7_102001" />
    <link rel="stylesheet" type="text/css" href="{{env('APP_HOST')}}/yi/foot.css?v=1.5.5.7_102001" />
    <link rel="stylesheet" type="text/css" href="{{env('APP_HOST')}}/yi/nav-head.css?v=1.5.5.7_102001" />
    <link rel="stylesheet" type="text/css" href="{{env('APP_HOST')}}/yi/jquery.mCustomScrollbar.min.css?v=1.5.5.7_102001" />
</head>
<body>
    <div class="pai-nav">
<div class="pai-nav-top">
<ul class="top-left">
<li class="nav-icon"></li>
<li class="click_track" event-name="l-appdownload-header"><a href="http://www.lagou.com/app/download.html" class="lagou-app">拉勾APP</a></li>
<em></em>
</ul>
<ul class="top-right">
<li class="msg_dropdown unreaded">
<a class="msg_group" href="javascript: void 0;" data-lg-tj-id="5h00" data-lg-tj-no="idnull" data-lg-tj-cid="idnull" rel="nofollow">
消息<span class="msg_amount hide" id="headMsgAmount"></span>
</a>
<div class="lg_msg_popup">
<div class="lg_msg_pu_body" id="lgPopupMsgBody">
</div>
<div class="lg_msg_pu_footer">
<a href="http://www.lagou.com/message/settingsdetail.html" class="lg_msg_setting fl" target="_blank"><i class="lg_msg_avatar setting_i"></i>&nbsp;</a>
<a href="http://www.lagou.com/message/msgdetail.html" class="lg_msg_more fr" target="_blank">查看更多</a>
</div>
</div>
</li>
<em></em>
<li class="click_track" event-name="l-myresume"><a href="{{url('resumeList')}}">我的简历</a></li>
<em></em>
<li class="click_track" event-name="l-delivery"><a href="{{url('remuseShow')}}">投递箱</a></li>
<em></em>
<li class="click_track" event-name="l-collections"><a href="http://www.lagou.com/mycenter/collections.html">收藏夹</a></li>
<em></em>
<li class="nav-user" id="nav-user-li">
<a href="javascript:;" id="nav-users">{{session('u_email')}}</a>
<span style=''></span>
<ul class="nav-select" style='z-index:999;'>
<li class="click_track" event-name="l-subscribe"><a href="http://www.lagou.com/s/subscribe.html">我的订阅</a></li>
 <li class="click_track" event-name="l-logout"><a href="{{url('loginOut.html')}}" style="margin-bottom: 10px;">退出</a></li>
</ul>
</li>
</ul>
</div>
<div class="pai-nav-bottom">
<div class="nav-wrapper">
<ul class="bottom-left">
<a href="http://www.lagou.com" id="birthdayIcon">
<li class="pai-lagou"></li>
</a>
<em></em>
<li><a href="{{url('beatIndex')}}">一拍</a></li>
</ul>
<ul class="bottom-right">
<li class="" onclick="trackMonitor('l-index-nav');" event-name="l-index-nav"><a href="{{url('beatIndex')}}">首页</a></li>
<li class="" onclick="trackMonitor('l-guide-nav')"><a href="http://pai.lagou.com/talent/guide.html">一拍攻略</a></li>
</ul>
<a href="http://www.lagou.com" id="nav-go-back" onclick="trackMonitor('l-backlagou-text')">回拉勾</a>
</div>
</div>
</div>
    <script type="text/html" id="PAI_C_APPLY_COMPLETE">
        太棒啦，你已成功提交申请。<br/>
        请耐心等待一拍职业顾问的筛选审核，预计两个工作日内通过邮件和微信通知。
        目前一拍主要服务对象是3年+工作经验，30w+年薪的互联网技术，产品，设计，运营资深从业者，暂只开通服务北京，上海，广州，深圳，杭州五大城市。
        同时，为方便顾问更准确的筛选判断，请参考如下的一拍简历要求，尽快完善你的在线简历：</br>

        <strong>基本信息</strong><br/>
        包括一句话的自我评价和基本信息；<br/>

        <strong>项目经验</strong><br/>
        请至少填写一项你最牛的项目经验，多多益善；<br/>

        <strong>工作经历</strong><br/>
        请至少要填写你最近的工作经历；完整的工作经历更能够吸 引企业邀约；<br/>

        <strong>教育经历</strong><br/>
        简单的教育经历介绍有助于企业了解你；<br/>

        <strong>作品展示</strong><br/>
        虽然不是必须填写的，但是出色的作品展示能够给你加分很多。<br/>

        现在就登录拉勾继续完善在线简历吧~  <a class="complete-link" target="_blank" href="http://www.lagou.com/resume/basic.html">&gt;&gt; 去完善简历</a>
    </script>
    <script type="text/html" id="PAI_C_AUDIT_YES">
        Hi 涛涛，name<br/>
        恭喜你通过拉勾一拍的审核，审核通过以后就可以参加线上专场了。<a href="/talent/guide.html" target="_blank">点击使用攻略，查看如何使用一拍</a>。
    </script>
    <script type="text/html" id="PAI_C_AUDIT_NO_UNCONTACT">
        亲爱的涛涛 ：<br/>
        非常感谢你报名参加拉勾一拍。不过由于一直无法联系上你，导致我们的顾问无法确定你是否可以参加一拍的Dating park。<br/>
        我们的Dating park会对报名对象进行严格的筛选，这是为了让求职者收到更多优秀的企业邀约，获得最好的求职体验。同时也会严格把关企业的质量，请理解。<br/>
        顾问和你联系的原因，主要是你的个人简历不完善或者有其他信息需要和你确认，而且如果报名成功，顾问也需要后续和你联系，所以你可以保证通讯顺畅的时候，再次申请报名一拍。
    </script>
    <script type="text/html" id="PAI_C_AUDIT_NO_BASICCONDITION">
        亲爱的涛涛 ：<br/>
        非常抱歉，你没有通过我们的筛选。非常感谢你报名参加拉勾一拍。<br/>
        目前一拍主要服务对象是3年+工作经验，30w+年薪的互联网技术，产品，设计，运营资深从业者，暂只开通服务北京，上海，广州，深圳，杭州五大城市。<br/>
        根据你的简历，我们无法保证你在Datingpark上可以获得满意的offer。我们会不断丰富 一拍技能类型，请多多关注一拍动态。<br/>
        我们的Dating park会对报名对象进行严格的筛选，这是为了让求职者收到更多优秀的企业邀约，获得最好的求职体验。同时也会严格把关企业的质量，请理解。<br/>
    </script>
    <script type="text/html" id="PAI_C_AUDIT_NO_OTHERREASON">
        亲爱的涛涛 ：<br/>
        非常抱歉，你没有通过我们的筛选。非常感谢你报名参加拉勾一拍。
        目前一拍主要服务对象是3年+工作经验，30w+年薪的互联网技术，产品，设计，运营资深从业者，暂只开通服务北京，上海，广州，深圳，杭州五大城市。
        根据你的简历，我们无法保证你在Datingpark上可以获得满意的offer。我们会不断丰富 一拍技能类型，请多多关注一拍动态
        我们的Dating park会对报名对象进行严格的筛选，这是为了让求职者收到更多优秀的企业邀约，获得最好的求职体验。同时也会严格把关企业的质量，请理解。
    </script>
    <script type="text/html" id="PAI_C_AUDIT_NO_NOINTENTION">
        亲爱的涛涛 ：<br/>
        非常抱歉，你没有通过我们的筛选。非常感谢你报名参加拉勾一拍。
        顾问和你沟通的过程中，发现你并没有求职意向，仅仅是为了体验一拍产品而报名一拍。
        非常感谢你对一拍产品的关注。目前我们的报名人数很多 ，顾问很辛苦 ，所以建议去一拍首页了解详情。
    </script>
    <script type="text/html" id="PAI_C_AUDIT_NO_RESUMEINFO">
        亲爱的涛涛 ：<br/>
        非常感谢你报名参加拉勾一拍。不过，由于你的简历太过于简单，我们的顾问无法确定你是否可以参加一拍的Dating park。
        为了保证每一期Dating park的体验，我们要求你的简历需具备基本的筛选条件。请参考如下的一拍简历要求，完善你的简历
    </script>
    <script type="text/html" id="PAI_C_SCHEDULE_YES">
        Hi 涛涛！<br/>
        很高兴的通知你，你的简历将于今天（周二）上午10点上架Dating Park，并展示7天。敬请到时关注，别错过你心仪的企业发出的邀约哦！
    </script>
    <script type="text/html" id="PAI_C_SCHEDULE_NO_CANNOTCONTACTCANDIDATE">
        亲爱的涛涛：<br/>
        非常感谢你报名参加拉勾一拍。不过由于一直无法联系上你，导致我们的顾问无法确定你是否可以参加一拍的Dating park。
        我们的Dating park会对报名对象进行严格的筛选，这是为了让求职者收到更多优秀的企业邀约，获得最好的求职体验。同时也会严格把关企业的质量，请理解。
        顾问和你联系的原因，主要是你的个人简历不完善或者有其他信息需要和你确认，而且如果报名成功，顾问也需要后续和你联系，所以你可以保证通讯顺畅的时候，再次申请 报名一拍。
    </script>
    <script type="text/html" id="PAI_C_SCHEDULE_NO_RESUNEINFO">
        亲爱的涛涛：<br/>
        非常感谢你报名参加拉勾一拍。不过，由于你的简历太过于简单，我们的顾问无法确定你是否可以参加一拍的Dating park。
        为了保证每一期Dating park的体验，我们要求你的简历需具备基本的筛选条件。请参考如下的一拍简历要求，完善你的简历。
    </script>
    <script type="text/html" id="PAI_C_SCHEDULE_NO_NOINTENTION">
        亲爱的涛涛：<br/>
        非常感谢你报名参加拉勾一拍。在我们的顾问和你沟通的过程，得知你已经没有求职意向。仍然感谢你参与一拍.
        一拍正在不断丰富Dating Park，立志帮每位像你这样的大咖找到满意的工作。谢谢你对一拍的关注。
    </script>
    <script type="text/html" id="PAI_C_AUCTION_START">
        Hi 涛涛！<br/>
        现在开始，你的简历将在Dating Park进行展示，为期7天。记得及时查看待处理的约见哦！
        在你未接受企业邀约的情况下，企业无法查看你的联系方式。
        有问题吗？试试咨询你的一拍私人顾问吧！
    </script>
    <script type="text/html" id="PAI_C_INVITE_EVERYTOTAL">
        Hi 涛涛！<br/>
        截止到今晚8点，你已经收到了老家个约见邀请，4个还未处理。在你未接受企业邀约的情况下，企业无法看到你的联系方式，但你可以通过私信与企业沟通。收到邀约起7天内不回应，将视为自动拒绝邀约。记得及时处理你的约见哦！
        有问题吗？试试咨询你的一拍私人顾问吧！
    </script>
    <script type="text/html" id="PAI_C_INVITE_ENDTOTAL">
        Hi 涛涛！<br/>
        你的简历即将于明早10点从一拍Dating Park下架，感谢你的参与。
        截止到今晚8点，你已经收到了老家个约见邀请，4个还未处理。在你未接受企业邀约的情况下，企业无法看到你的联系方式，但你可以通过私信与企业沟通。收到邀约起7天内不回应，将视为自动拒绝邀约。记得及时处理你的约见哦！
    </script>
    <script type="text/html" id="PAI_C_INVITE_END">
        亲爱的涛涛：<br/>
        非常感谢你报名参加拉勾一拍。在我们的顾问和你沟通的过程，得知你已经没有求职意向。仍然感谢你参与一拍。
        一拍正在不断丰富Dating Park，立志帮每位像你这样的大咖找到满意的工作。谢谢你对一拍的关注。
    </script>
    <script type="text/html" id="PAI_C_OFFER_AUDIT_YES">
        Hi,涛涛：<br/>
        恭喜你通过一拍入职反馈奖励申请，经核对，你的申请符合 ［233432］，将获得 ［233432］的现金奖励， 233432请你按照如下方式获取现金红包奖励，如果你后续获得了新的offer，你可以继续申请 领取奖励。
        领取方式：<br/>
        1、微信扫描邮件底部拉勾招聘二维码，关注拉勾微信公众号。<br/>
        2、到 个人中心 我的奖励扫描红包二维码，验证无误后现金奖励将以红包的形式发送到你关注的拉勾微信公众号里，点击领取，即可获得奖励。<br/>
        3、由于微信红包金额限制，如果你获得了300元入职奖励，奖金将以3个红包形式发到你的微信公众后台，请及时领取。
    </script>
    <script type="text/html" id="PAI_C_OFFER_AUDIT_NO">
        Hi,涛涛：<br/>
        很抱歉，你没有通过一拍offer奖励，运营人员在审核的过程中发现，你不符合领取入职奖励的要求，如果你后续获得了新的offer或者入职，你可以继续 领取奖励。<br/>
        领取入职奖励的要求为：<br/>
        1、资格要求：通过拉勾一拍顾问服务获得offer或者入职；获得offer未入职可以获得200元现金奖励；获得offer并且入职可以获得300元的现金奖励。<br/>
        2、证明文件要求：offer证明包括如下几种形式：offer信，offer信扫描件，offer信邮件截图，offer信照片；入职奖励需offer证明和工卡照片。
    </script>
    <script type="text/html" id="PAI_PAI_C_PUSH">
        【拉勾一拍邀请你来参加】拉勾一拍是拉勾网推出的高端招聘产品，汇集行业领域互联网企业，目前服务于有3年以上相关工作经验的北上广深杭成高端候选人，参与拉勾一拍，无须主动投递简历，专场履历展示7天，1V1职业顾问全程跟踪服务，轻松拿到满意offer。<a class="complete-link" href="http://pai.lagou.com/index.html" target="_blank" data-lg-tj-id="kr00" data-lg-tj-no="idnull" data-lg-tj-cid="idnull">点此报名</a>。
    </script>
    <script type="text/html" id="PAI_PAI_C_PUSH_FOR_TOP">
        【拉勾一拍邀请你来参加】拉勾一拍是拉勾网旗下高端招聘产品，参与拉勾一拍，无须主动投递简历，坐等企业邀约。
    </script>
    <script type="text/html" id="PAI_PAI_SERVICE_USER_EVALUATION">
        HI 我是我！<br/>
        感谢您参加拉勾「一拍」，您对职业顾问的服务还满意吗？或是想发几句牢骚？诚挚邀请您对职业顾问的服务做出评价！「一拍」急切想听到您的声音，您的反馈和评价是顾问服务的动力和改进提高的依据，对于我们至关重要~<br/>
        <a class="to-detail" href="链接地址" target="_blank" data-lg-tj-id="18P0" data-lg-tj-no="idnull" data-lg-tj-cid="idnull">去评价顾问</a>
    </script>
    <script type="text/html" id="PAI_PAI_SERVICE_USER_EVALUATION_FOR_TOP">
        <a class="detail" data-lg-tj-id="1aY0" data-lg-tj-no="idnull" data-lg-tj-cid="idnull" target="_blank" href="链接地址">
            HI 我是我！<br/>
            感谢您参加拉勾「一拍」，您对职业顾问的服务还满意吗？或是想发几句牢骚？诚挚邀请您对职业顾问的服务做出评价！
        </a>
    </script>
<div class="container">
<input type="hidden" id="resume-schedule" value=""/>
<input type="hidden" id="reserve-time-data" value="" />
<div class="m-progress s-clearfix">
<div class="item"><i class="stepEle"><span class="step">1</span></i><p>报名</p>
<div class="tip first-tip" style="display: none;">
顾问会对你的报名信息和简历进行审核（<span onclick="trackMonitor('c-pg-standard');" class="green link" id="m-progress-ft">查看审核标准</span>），审核结果会在<span class="green">2</span>个工作日内通知你。完善的简历可以提高审核通过几率，同时有助于顾问快速完成审核，报名完成后你可以进一步完善以下简历信息：<span class="green">基本信息、教育经历、工作经历、项目经验、作品展示、自我介绍等。</span>
</div>
</div>
<div class="arrow first-arrow"></div><div class="item"><i class="stepEle"><span class="step">2</span></i><p>审核通过</p>
<div class="tip second-tip" style="display: none;">
审核通过后，顾问会根据你预约的时间为你安排专场。<p class="note"><span class="bold">注意：</span><span class="note-content">专场展示期间你将不能编辑你的简历，在展示开始前请完善你的简历信息。</span></p>
</div>
</div>
<div class="arrow"></div>
<div class="item"><i class="stepEle"><span class="step">3</span></i><p>处理邀约</p>
<div class="tip third-tip" style="display: none;">
你的履历将在专场上展示<span class="green">1</span>周，企业会向你发出面试邀请，你可以接受感兴趣的邀约或者拒绝不感兴趣的工作机会，超过<span class="green">7</span>天未处理的邀约会被自动拒绝。只有在你接受邀约后，HR才能查看你的联系方式。记得及时处理邀约哦。<p class="note"><span class="bold">注意：</span><span class="note-content">拍卖开始后，不能修改履历信息。</span></p>
</div>
</div>
<div class="arrow last-arrow"></div>
<div class="item"><i class="stepEle"><span class="step">4</span></i><p>反馈Offer</p>
<div class="tip fourth-tip" style="display: none;">
反馈Offer，可以方便顾问辅助你做进一步分析决策。</div>
</div>
</div>
<h2>简单回答几个问题，完成<span>报名<span></h2>
        <form id="form">
<input type="hidden" id="resubmitToken" name="resubmitToken"  value="c39f802acfa84af7a630567a92c7a1ec" />
<div class="user">
<label for="userName">称呼</label><div class="s-clearfix">
<div class = "input-wrapper userName-wrapper">
<input type="text" data-tip-title="称呼" data-tip-content="请填写你的真实姓名。当你接受HR的邀约前，真实姓名对他们不可见。" name="userName" id="userName" placeholder="真实姓名" class="tip-show" value=""/>
<div class="error-tip">请填写</div>
</div>
<div class="input-wrapper identify-input-wrapper">
<div class = "select-wrapper identify-select-wrapper">
<span id="selectIdentity" class="input select-title select-click select-wrapper-default identity-input tip-show" data-tip-title="称呼" data-tip-content="请填写你的真实姓名。当你接受HR的邀约前，真实姓名对他们不可见。">女士/先生</span>
<i class="select-triangle select-click tip-show" data-tip-title="称呼" data-tip-content="请请填写你的真实姓名。当你接受HR的邀约前，真实姓名对他们不可见。"></i>
<input type="hidden" class="select-input" name="jobIntention" id="workIdentity" value="女士/先生">
                            <ul class="select select-list identity-select" >
                                <li>

                                    <label>女士</label>
                                </li>
                                <li>
                                    <label>先生</label>
                                </li>
                            </ul>
                        </div>
                        <div class="error-tip">请选择</div>
                    </div>
                </div>
            </div>
            <div class="input-wrapper"><label>期望职位</label>
                <!--<ul class="radio-wrapper col-5">-->
                <ul class="radio-wrapper radio col-5 tip-show" data-expectPosition="" data-property="" data-tip-title="期望职位" data-tip-content="一拍目前只专注于服务互联网相关行业的技术、产品、设计、运营、市场5个领域的高端候选人。如果你的期望不属于以上类别请斟酌是否报名。">
                    <li><label  for="field1">技术</label><input  type="radio" name="field" id="field1" value="1"/></li>
                    <li><label  for="field2">产品</label><input  type="radio" name="field" id="field2" value="2"/></li>
                    <li><label  for="field3">设计</label><input  type="radio" name="field" id="field3" value="3"/></li>
                    <li><label  for="field4">运营</label><input  type="radio" name="field" id="field4" value="4"/></li>
                    <li class="last"><label  for="field5">市场</label><input  type="radio" name="field" id="field5" value="5"/></li>
                </ul>
                <!-- 技术 -->
                <ul class="radio-techology-content radio-content ">
                    <li>
                        <input type="checkbox" name="professional-content " value="Java工程师">
                        <label class="radio-expectPosition ">Java工程师</label>
                    </li>
                    <li>
                        <input type="checkbox" name="professional-content" value="PHP工程师">
                        <label class="radio-expectPosition ">PHP工程师</label>
                    </li>
                    <li>
                        <input type="checkbox" name="professional-content" value="Python工程师">
                        <label class="radio-expectPosition ">Python工程师</label>
                    </li>
                    <li>
                        <input type="checkbox" name="professional-content" value="前端工程师">
                        <label class="radio-expectPosition ">前端工程师</label>
                    </li>
                    <li>
                        <input type="checkbox" name="professional-content" value="C/C++工程师">
                        <label class="radio-expectPosition ">C/C++工程师</label>
                    </li>
                    <li>
                        <input type="checkbox" name="professional-content" value="Ruby工程师">
                        <label class="radio-expectPosition ">Ruby工程师</label>
                    </li>
                    <li>
                        <input type="checkbox" name="professional-content" value=".Net工程师">
                        <label class="radio-expectPosition ">.Net工程师</label>
                    </li>
                    <li>
                        <input type="checkbox" name="professional-content" value="C#工程师">
                        <label class="radio-expectPosition ">C#工程师</label>
                    </li>
                    <li>
                        <input type="checkbox" name="professional-content" value="Node.js工程师">
                        <label class="radio-expectPosition ">Node.js工程师</label>
                    </li>
                    <li>
                        <input type="checkbox" name="professional-content" value="数据挖掘工程师">
                        <label class="radio-expectPosition ">数据挖掘工程师</label>
                    </li>
                    <li>
                        <input type="checkbox" name="professional-content" value="搜索算法工程师">
                        <label class="radio-expectPosition ">搜索算法工程师</label>
                    </li>
                    <li>
                        <input type="checkbox" name="professional-content" value="全栈工程师">
                        <label class="radio-expectPosition ">全栈工程师</label>
                    </li>
                    <li>
                        <input type="checkbox" name="professional-content" value="Android工程师">
                        <label class="radio-expectPosition ">Android工程师</label>
                    </li>
                    <li>
                        <input type="checkbox" name="professional-content" value="iOS工程师">
                        <label class="radio-expectPosition ">iOS工程师</label>
                    </li>
                    <li>
                        <input type="checkbox" name="professional-content" value="技术经理">
                        <label class="radio-expectPosition ">技术经理</label>
                    </li>
                    <li>
                        <input type="checkbox" name="professional-content" value="技术总监">
                        <label class="radio-expectPosition ">技术总监</label>
                    </li>
                    <li>
                        <input type="checkbox" name="professional-content" value="架构师">
                        <label class="radio-expectPosition ">架构师</label>
                    </li>
                    <li>
                        <input type="checkbox" name="professional-content" value="CTO">
                        <label class="radio-expectPosition ">CTO</label>
                    </li>
                    <li>
                        <input type="checkbox" name="professional-content" value="项目经理">
                        <label class="radio-expectPosition ">项目经理</label>
                    </li>
                    <li>
                        <input type="checkbox" name="professional-content" value="安全工程师">
                        <label class="radio-expectPosition ">安全工程师</label>
                    </li>
                    <li>
                        <input type="checkbox" name="professional-content" value="Go工程师">
                        <label class="radio-expectPosition ">Go工程师</label>
                    </li>
                    <li>
                        <input type="checkbox" name="professional-content" value="Scala工程师">
                        <label class="radio-expectPosition ">Scala工程师</label>
                    </li>
                    <li>
                        <input type="checkbox" name="professional-content" value="测试工程师">
                        <label class="radio-expectPosition ">测试工程师</label>
                    </li>
                    <li>
                        <input type="checkbox" name="professional-content" value="运维">
                        <label class="radio-expectPosition ">运维</label>
                    </li>
                    <li>
                        <input type="checkbox" name="professional-content" value="DBA">
                        <label class="radio-expectPosition ">DBA</label>
                    </li>
                    <li>
                        <input type="checkbox" name="professional-content" value="游戏开发">
                        <label class="radio-expectPosition ">游戏开发</label>
                    </li>
                    <li>
                        <input type="checkbox" name="professional-content" value="后端开发">
                        <label class="radio-expectPosition ">后端开发</label>
                    </li>
                    <li>
                        <input type="checkbox" name="professional-content" value="移动开发">
                        <label class="radio-expectPosition ">移动开发</label>
                    </li>
                </ul>
                <!-- 产品 -->
                <ul class="radio-production-content radio-content ">
                    <li>
                        <input type="checkbox" name="professional-content" value="产品经理">
                        <label class="radio-expectPosition ">产品经理</label>
                    </li>
                    <li>
                        <input type="checkbox" name="professional-content" value="移动产品经理">
                        <label class="radio-expectPosition ">移动产品经理</label>
                    </li>
                    <li>
                        <input type="checkbox" name="professional-content" value="产品总监">
                        <label class="radio-expectPosition ">产品总监</label>
                    </li>
                    <li>
                        <input type="checkbox" name="professional-content" value="游戏策划">
                        <label class="radio-expectPosition ">游戏策划</label>
                    </li>
                </ul>
                <!-- 设计 -->
                <ul class="radio-design-content radio-content ">
                    <li>
                        <input type="checkbox" name="professional-content" value="视觉设计师">
                        <label class="radio-expectPosition ">视觉设计师</label>
                    </li>
                    <li>
                        <input type="checkbox" name="professional-content" value="交互设计师">
                        <label class="radio-expectPosition ">交互设计师</label>
                    </li>
                    <li>
                        <input type="checkbox" name="professional-content" value="品牌设计师">
                        <label class="radio-expectPosition ">品牌设计师</label>
                    </li>
                    <li>
                        <input type="checkbox" name="professional-content" value="平面设计师">
                        <label class="radio-expectPosition ">平面设计师</label>
                    </li>
                    <li>
                        <input type="checkbox" name="professional-content" value="用户研究">
                        <label class="radio-expectPosition ">用户研究</label>
                    </li>
                    <li>
                        <input type="checkbox" name="professional-content" value="游戏设计">
                        <label class="radio-expectPosition ">游戏设计</label>
                    </li>
                    <li>
                        <input type="checkbox" name="professional-content" value="设计总监">
                        <label class="radio-expectPosition ">设计总监</label>
                    </li>
                </ul>
                <!-- 运营 -->
                <ul class="radio-operating-content radio-content ">
                    <li>
                        <input type="checkbox" name="professional-content" value="内容运营">
                        <label class="radio-expectPosition ">内容运营</label>
                    </li>
                    <li>
                        <input type="checkbox" name="professional-content" value="产品运营">
                        <label class="radio-expectPosition ">产品运营</label>
                    </li>
                    <li>
                        <input type="checkbox" name="professional-content" value="用户运营">
                        <label class="radio-expectPosition ">用户运营</label>
                    </li>
                    <li>
                        <input type="checkbox" name="professional-content" value="活动运营">
                        <label class="radio-expectPosition ">活动运营</label>
                    </li>
                    <li>
                        <input type="checkbox" name="professional-content" value="数据运营">
                        <label class="radio-expectPosition ">数据运营</label>
                    </li>
                    <li>
                        <input type="checkbox" name="professional-content" value="新媒体运营">
                        <label class="radio-expectPosition ">新媒体运营</label>
                    </li>
                    <li>
                        <input type="checkbox" name="professional-content" value="编辑">
                        <label class="radio-expectPosition ">编辑</label>
                    </li>
                    <li>
                        <input type="checkbox" name="professional-content" value="运营总监">
                        <label class="radio-expectPosition ">运营总监</label>
                    </li>
                </ul>
                <!-- 市场 -->
                <ul class="radio-market-content radio-content ">
                    <li>
                        <input type="checkbox" name="professional-content" value="市场营销">
                        <label class="radio-expectPosition ">市场营销</label>
                    </li>
                    <li>
                        <input type="checkbox" name="professional-content" value="公关">
                        <label class="radio-expectPosition ">公关</label>
                    </li>
<!--                     <li>
                        <input type="checkbox" name="professional-content" value="商务">
                        <label class="radio-expectPosition ">商务</label>
                    </li> -->
                    <li>
                        <input type="checkbox" name="professional-content" value="市场总监">
                        <label class="radio-expectPosition ">市场总监</label>
                    </li>
                </ul>
                <div class="error-tip"></div>
            </div>
            <div class="input-wrapper">
                <label for="workYear">工作经验</label>

                <div class="select-wrapper ">
                    <span id="selectYear" data-tip-title="工作经验" data-tip-content="一拍目前专注于服务工作经验3年以上的互联网从业人员。如果你的工作经验少于3年请斟酌是否报名。" class="input select-title select-click select-wrapper-default tip-show">请选择...</span>
<i class="select-triangle select-click tip-show" data-tip-title="工作经验" data-tip-content="一拍目前专注于服务工作经验3年以上的互联网从业人员。如果你的工作经验少于3年请斟酌是否报名。"></i>
<input type="hidden" class="select-input" name="workYear" id="workYear" value="请选择..."/>
                    <ul class="select select-list">
                        <li>
                            <label>1年</label>
                        </li>
                        <li>
                            <label>2年</label>
                        </li>
                        <li>
                            <label>3年</label>
                        </li>
                        <li>
                            <label>4年</label>
                        </li>
                        <li>
                            <label>5年</label>
                        </li>
                        <li>
                            <label>6年</label>
                        </li>
                        <li>
                            <label>7年</label>
                        </li>
                        <li>
                            <label>8年</label>
                        </li>
                        <li>
                            <label>9年</label>
                        </li>
                        <li>
                            <label>10年</label>
                        </li>
                        <li>
                            <label>10年以上</label>
                        </li>
                    </ul>
                </div>
                <div class="error-tip"></div>
            </div>
            <div class="contact-parent s-clearfix">
                <div class="input-wrapper contact-wrapper">
                    <label for="phoneNumber">手机号码<span></span></label>
                    <input type="text" data-tip-title="手机号码&邮箱地址" data-tip-content="电话和邮件是我们的顾问和HR与你联系的重要途径，请准确填写。你的联系方式只有当你接受HR的邀约后才对他们可见，否则会一直隐藏。" name="phoneNumber" id="phoneNumber" class="tip-show" value=""/>
                    <div class="error-tip"></div>
                </div
                >
                <div class="input-wrapper verify-input">
                    <label for="phone-verify-codes">&nbsp;<span></span></label>
                    <input type="text" data-tip-title="手机号码&邮箱地址" data-tip-content="电话和邮件是我们的顾问和HR与你联系的重要途径，请准确填写。你的联系方式只有当你接受HR的邀约后才对他们可见，否则会一直隐藏。" class="tip-show" name="phone-verify-codes" id="phone-verify-codes" placeholder="输入验证码" autocomplete="off" maxlength="6"/>
                    <div class="error-tip"></div>
                </div>
                <div class="verify-wrapper">
                    <a data-tip-title="手机号码&邮箱地址" data-tip-content="电话和邮件是我们的顾问和HR与你联系的重要途径，请准确填写。你的联系方式只有当你接受HR的邀约后才对他们可见，否则会一直隐藏。" class="verify-btn tip-show" href="javascript:;">获取验证码</a>
                </div>
            </div>
            <div class="input-wrapper">
                <label for="expectPosition">邮箱地址</label>
                <input type="text" data-tip-title="手机号码&邮箱地址" data-tip-content="电话和邮件是我们的顾问和HR与你联系的重要途径，请准确填写。你的联系方式只有当你接受HR的邀约后才对他们可见，否则会一直隐藏。" class="inputMailList tip-show" name="email" id="email" value="" autocomplete="off"/>
                <div class="error-tip"></div>
            </div> 
            
            <!-- <div class="input-wrapper">
                <label for="expectPosition">期望职位</label>
                <input data-tip-title="期望职位/月薪/地点/规模" data-tip-content="你的期望会显示给Hr，他们会根据你的期望向你发送邀请。" class="tip-show" type="text" name="expectPosition" id="expectPosition" 
                 value="" autocomplete="off"/>
                <div class="error-tip"></div>
            </div> -->
            <div class="salary-range">
                <label for="salary-range-start">期望月薪</label>
                <div class="s-clearfix">
                    <div class = "input-wrapper salary-wrapper">
                        <input type="text" data-tip-title="期望月薪" data-tip-content="我们的服务定位于服务互联网高端人才。我们希望你的薪资水平能够达到15K/月。" name="salary-range-start" id="salary-range-start" placeholder="最低期望月薪" class="tip-show" value=""/>
                    </div>
                    <div class="input-follow">&nbsp;k&nbsp;&nbsp;&nbsp;&nbsp;</div>
                    <div class="input-wrapper salary-wrapper">
                        <input type="text" data-tip-title="期望月薪" data-tip-content="我们的服务定位于服务互联网高端人才。我们希望你的薪资水平能够达到15K/月。" name="salary-range-end" id="salary-range-end" placeholder="最高期望月薪" class="tip-show" value=""/>
                    </div>
                    <div class="input-follow">&nbsp;k</div>
                </div>
                <div class="error-tip">请填写</div>
            </div>

            <div class="current-salary">
                <label>当前薪资<span class="mark">（选填）</span></label>
                <div class="s-clearfix">
                    <div class= "input-wrapper salary-wrapper">
                        <input type="text" name="currentSalary" id="currentSalary" placeholder="当前月薪" class="tip-show" value=""/>
                    	<div class="error-tip">请填写</div>
                    </div>
                    <div class="input-follow">&nbsp;k&nbsp;&nbsp;&nbsp;&nbsp;</div>
                    <div class="input-wrapper salary-wrapper">
                        <input type="text" name="paidMonth" id="paidMonth" placeholder="发薪月数" class="tip-show" value=""/>
                   		<div class="error-tip">请填写</div>
                    </div>
                    <div class="input-follow">&nbsp;月</div>
                    
                </div>
                
                
            </div>
<!--             <div class="input-wrapper">
                <label>期望月薪</label>
                <ul class="radio-wrapper col-4 tip-show" data-tip-title="期望职位/月薪/地点/规模" data-tip-content="你的期望会显示给HR，他们会根据你的期望向你发送邀请。">
                    <li><label  for="salary1">15K-25K</label><input  type="radio" name="expectSalary" id="salary1" value="15K-25K"/></li>
                    <li><label  for="salary2">25K-35K</label><input  type="radio" name="expectSalary" id="salary2" value="25K-35K"/></li>
                    <li><label  for="salary3">35K-50K</label><input  type="radio" name="expectSalary" id="salary3" value="35K-50K"/></li>
                    <li class="last"><label  for="salary4">50K以上</label><input  type="radio" name="expectSalary" id="salary4" value="50K以上"/></li>
                </ul>
                <div class="error-tip"></div>
            </div> -->
            <div class="input-wrapper checkbox">
                <label>期望工作地点<span>（可多选）</span></label>
                <ul class="checkbox-wrapper tip-show" data-tip-title="期望工作地点" data-tip-content="我们提供服务的城市目前有北京、上海、广州、深圳、杭州、成都。如果你的期望不包含以上城市，我们可能难以帮助到你。">
                    <li><label  for="city1">北京</label><input  type="checkbox" name="expectCity" id="city1" value="北京" /></li>
                    <li><label  for="city2">上海</label><input  type="checkbox" name="expectCity" id="city2" value="上海" /></li>
                    <li><label  for="city3">广州</label><input  type="checkbox" name="expectCity" id="city3" value="广州" /></li>
                    <li><label  for="city4">深圳</label><input  type="checkbox" name="expectCity" id="city4" value="深圳" /></li>
                    <li><label  for="city5">杭州</label><input  type="checkbox" name="expectCity" id="city5" value="杭州" /></li>
                    <li class="last"><label  for="city6">成都</label><input  type="checkbox" name="expectCity" id="city6" value="成都" /></li>
                </ul>
                <div class="error-tip"></div>
            </div>
            <div class="input-wrapper checkbox expect">
                <label>期望的企业规模<span>（可多选）</span></label>
                <ul class="checkbox-wrapper comsize-checkbox-wrapper tip-show" data-tip-title="期望企业规模" data-tip-content="你的期望会显示给HR，他们会根据你的期望向你发送邀请。">
                    <li><label  for="com-size1">天使轮融资公司</label><input  type="checkbox" name="componySize" id="com-size1" value="天使轮融资公司" /></li>
                    <li><label  for="com-size2">A轮融资公司</label><input  type="checkbox" name="componySize" id="com-size2" value="A轮融资公司" /></li>

                    <li><label  for="com-size3">B轮融资公司</label><input  type="checkbox" name="componySize" id="com-size3" value="B轮融资公司" /></li>
                    <li><label  for="com-size4">大型公司，人数大于500人</label><input  type="checkbox" name="componySize" id="com-size4" value="大型公司，人数大于500人" /></li>
                </ul>
            </div>

            <div class="step shieldCompany">
                <label>
                    是否有需要屏蔽的企业<span style="color: #00b38a;">（最多可添加10个）</span>
                    <!-- 是否屏蔽 -->
                    <div class="switch">
                        <input id="cmn-toggle" class="cmn-toggle cmn-toggle-round" type="checkbox" checked="checked">
                        <label for="cmn-toggle"></label>
                    </div>
                </label>

                <div class="step-details unexpectCompany-wrapper tip-show" data-tip-title="屏蔽企业" data-tip-content="担心某家企业HR会在一拍看到你？输入这家企业的邮箱后缀即可屏蔽他们。">
                    <p>对这些邮箱后缀的企业不可见：<span class="add">添加</span></p>
                    <p id="addBox" class="hide" style="display: none;">
                        <input type="text" name="unexpectCompany" id="unexpectCompany" value="@">
                        <input type="button" id="btn_ok" value="确定">
                        <input type="button" id="btn_cancel" value="取消">
                    </p>
                    <p class="add-tip" style="display: none;">请输入你想屏蔽企业的邮箱后缀</p>
                    <p class="error-tip" style="display: none;">请填写正确的邮箱地址</p>
                </div>
                <div class="mail-list"></div>
                <p class="error-tip" style="visibility: hidden; margin-top: 8px;">请添加屏蔽企业邮箱</p>
            </div> 

<!--             <div class="input-wrapper">
                <label for="company">你最近的公司名称是？</label>
                <input type="text" name="company" id="company" value="" autocomplete="off"/>
                <div class="error-tip"></div>
            </div> -->

            <div class="input-wrapper">
                <label for="jobIntention">你现在的求职意向？</label>
                <div class="select-wrapper">
                    <span id="selectIntention" data-tip-title="求职意向" data-tip-content="你的求职意向仅作为顾问审核和推荐时的参考信息，不会向HR展示。" name="jobIntention" id="jobIntention" class="input select-title select-click select-wrapper-default tip-show">请选择你的求职意向</span>
                    <i class="select-triangle select-click"></i>
                    <input type="hidden" class="select-input" name="jobIntention" id="jobIntention" value=""/>
                    <ul class="select select-list">
                        <li>
                            <label>暂不考虑任何新机会</label>
                        </li>
                        <li>
                            <label>看看自己的行情价</label>
                        </li>
                        <li>
                            <label>在职，近期会考虑新机会</label>
                        </li>
                        <li>
                            <label>已离职，可以立刻上专场</label>
                        </li>
                    </ul>
                </div>
                <div class="error-tip"></div>
            </div>
            <div class="input-wrapper self-intro">
                <label for="self-intro-content">自我介绍<span class="self-intro-faq"></span></label>
                <div class="textarea-wrapper">
                    <textarea rows="10" cols="65" id="self-intro-content" class="tip-show" data-tip-title="自我介绍" data-tip-content="好的自我总结可以让HR更好的了解你，帮助你获得更好的机会。你也可以参考我们给出的模板，50～200字即可。"></textarea>
                    <div class="error-tip">错误</div>
                </div>
                <div class="self-intro-demo" style="display: none;">
                    <div class="h3">自我介绍参考模板（200字以内）：</div>
                    <p>5年Java开发经验，作为技术Leader角色，带15人团队，负责平台架构、业务研发团队管理、项目中技术问题解决、项目进度把控等。熟悉分布式框架Dubbo、缓存技术Redis以及MongoDB，现只关注B轮以上互联网企业新机会，优先考虑车联网行业。</p>
                </div>
            </div>
           <!--  <div class="input-wrapper reserve-time">
                <label for="reserve-time-input">预约上场时间</label>
                <i class="select-triangle reserve-triangle-click"></i>
                <input type="text" name="reserve-time-input" id="reserve-time-input" class="long time tip-show" autocomplete="off" readonly="readonly" data-tip-title="预约上场时间" data-tip-content="你可以自主选择上场展示时间。一旦我们审核通过了你的报名，我们就会在你预定的时间为你安排上场展示。"/>
                <div class="error-tip"></div>
            </div>  -->

            <!-- <div class="input-wrapper">
                <label>什么时间方便联系你呢？</label>
                <ul class="radio-wrapper col-4 row-taller">
                    <li><label class="line-two " for="time1">工作日<br />(10:00-18:00)</label><input  type="radio" name="contactTime" id="time1" value="1"/></li>
                    <li><label class="line-two " for="time2">工作日晚上<br />(18:00-21:00)</label><input  type="radio" name="contactTime" id="time2" value="2"/></li>
                    <li><label  for="time3">节假日</label><input  type="radio" name="contactTime" id="time3" value="3"/></li>
                    <li class="last"><label  for="time4">不限</label><input  type="radio" name="contactTime" id="time4" value="4"/></li>
                </ul>
                <div class="error-tip"></div>
            </div> -->

            <!-- <div class="button-wrapper">
                              <input id="submit" type="submit" value="完成报名"/><a href="javascript:history.go(-1);" class="back">容我再想想</a>
                            </div> -->
            <input type="hidden" name="from_site" id="from_site" value="">
            <div class="button-wrapper">
               <!-- <input id="submit" type="submit" value="完成报名"/> -->
               <a href="javascript:;" id="submit" class="submit">完成报名</a>
            </div>
        </form>
        <div class="m-tip" style="display:none;">
            <div class="light_bulb"></div>
            <div class="tip-content">
                <h3>称呼</h3>
                <p>请填写你的真实姓名。当Hr在dating park中浏览候选人时根据你的姓名显示的X先生/女士。当你接受Hr的邀约后，Hr就可以看到你的真实姓名了。</p>
            </div>
            <div class="tip_shadow"></div>
        </div>
        <div class="hide">
            <div id="check-standard" class="check-standard">
                <ul>
                    <li><h3>简历完善</h3> 完整真实的简历是HR了解你的重要途径，也是我们审核的重要依据。请完善简历中的<span class="green">基本信息、教育经历、工作经历、项目经历、作品展示、自我描述</span>等信息。</li>
                    <li><h3>3年以上相关工作经验</h3>有<span class="green">3年或3年以上</span>期望职位的工作经验。</li>
                    <li><h3>互联网技术、产品、设计、运营、市场</h3>我们目前开放互联网<span class="green">技术、产品、设计、运营、市场</span>五类岗位，其它岗位敬请关注一拍后续的动态。</li>
                    <li><h3>期望城市在北上广深杭成</h3>我们目前服务的城市包含<span class="green">北京、上海、广州、深圳、杭州、成都</span>。如果你期望城市不属于这几个城市，我们目前暂时无法为你提供服务。</li>
                </ul>     
            </div> 
        </div>
        <div class="hide">
            <div id="resume-imperfect" class="resume-imperfect">
                <p class="p1">
                    感谢选择拉勾一拍，但目前你的简历不完善，为了让我们能更好的服务你，你需要先完善你的简历<span class="green">工作经历</span>等信息后再报名一拍。
                </p>
                <p class="p2">
                    如果你的职业方向是技术，请务必完善你的<span class="green">项目经验</span>。
                </p>
                <div class="btn">
                    <a href="http://www.lagou.com/resume/myresume.html" class="resume-edit-btn">完善我的简历</a>
                </div>
            </div>
        </div>
    </div>
    
<div id="footer">
<div class="wrapper">
<i class="footer_lagou_icon"></i>
<div class="inner_wrapper">
<a class="footer_app click_track" event-name="l-appdownload-footer" href="http://www.lagou.com/app/download.html" rel="nofollow">拉勾APP<span></span><i></i></a>
<a class="click_track" event-name="l-weibo-footer" href="http://e.weibo.com/lagou720" target="_blank" rel="nofollow">拉勾微博</a>
<a class="footer_qr click_track" event-name="l-weixin-footer" href="javascript:void(0)" rel="nofollow">拉勾微信<i></i></a>
<a class="click_track" event-name="l-whatisnew-footer" href="http://www.lagou.com/topic/whatisnew.html" target="_blank" rel="nofollow">版本更新</a>
<a class="click_track" event-name="l-help-footer" href="http://www.lagou.com/qa.html?t=1" target="_blank" rel="nofollow">帮助中心</a>
<a class="click_track" event-name="l-about-footer" href="http://www.lagou.com/about.html" target="_blank" rel="nofollow">联系我们</a>
<a class="click_track" event-name="l-chat-footer" id="onlineService" href="javascript:void(0);" rel="nofollow">在线交流</a>
<span class="tel">服务热线：<em>400-605-9900 (9:00 -19:00)</em></span>
</div>
<div class="copy">
<span><em>&copy;</em>2016 Lagou</span>
<a class="click_track" event-name="l-beian-footer" target="_blank" href="http://www.miitbeian.gov.cn/state/outPortal/loginPortal.action" rel="nofollow">京ICP备14023790号-2</a>
<span>京公网安备11010802017116号</span>
</div>
</div>
</div>
<div class="totop-wrapper" style="width:1024px;margin:0 auto;">
<a style="display: none;margin-left: 1060px" id="backtop" title="回到顶部" rel="nofollow"></a><div id="product-fk">
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
<input type="text" name="email" placeholder="留下邮箱方便我们沟通（选填）"/>
<span class="ensure">确定</span>
</div>
</form>
</div></div><div id="_lgpassport_" data-css-site="0" data-css-popup="0"></div>
    
<script type="text/javascript" src="{{env('APP_HOST')}}/yi/esl.js"></script>
<script type="text/javascript">/*resourcemap*/
require.config({paths:{
  "dep/jquery.mousewheel-3.0.6.min": "{{env('APP_HOST')}}/yi/jquery.mousewheel-3.0.6.min",
  "dep/jquery.mCustomScrollbar.min": "{{env('APP_HOST')}}/yi/jquery.mCustomScrollbar.min",
  "common/widgets/subject_header_c/javascript/msgPopup": "{{env('APP_HOST')}}/yi/msgPopup"
}});</script>
<script type="text/javascript" src="{{env('APP_HOST')}}/yi/basicInfo.html_aio.js"></script>
<script type="text/javascript">
var ctx = "http://pai.lagou.com";
var lctx = "http://www.lagou.com";


var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?96cde98aa3a93d00e87f0e6ed4c296a0";
  var s = document.getElementsByTagName("script")[0];
  s.parentNode.insertBefore(hm, s);
})();


    require(['talents/page/basicInfo/basicInfo']);
    

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
}).done(function() {
    BizQQWPA.addCustom({
        aty: '0',
        a: '0',
        nameAccount: 800056379,
        selector: 'onlineService'
    });
});
jQuery(function() {
    //小火箭
    $(window).scroll(function() {
        if ((document.documentElement.scrollTop || document.body.scrollTop) > 0) {
            $("#backtop").show();
        } else {
            $("#backtop").hide();
        }
    });
    $("#backtop").click(function() {
        pageScroll();
    });

    function pageScroll() {
        $("#backtop").css("background-position-x", "-28px");
        window.scrollBy(0, -20);
        var scrolldelay = setTimeout(function() {
            pageScroll();
        }, 1);
        if (document.documentElement.scrollTop == 0 && document.body.scrollTop == 0) {
            $("#backtop").css("background-position-x", "0");
            clearTimeout(scrolldelay);
        }
    }
    //小火箭结束
    $(".collapsible_menu").hover(function() {
        $(this).addClass("expend");
        $("dd", this).show();
    }, function() {
        $(this).removeClass("expend");
        $("dd", this).hide();
    });

    //鼠标悬浮显示微信二维码
    //footer_qr
    $('.footer_qr').hover(function() {
        $("i", this).stop().fadeIn(200);
    }, function() {
        $("i", this).stop().fadeOut(200);
    });

    //footer-app
    $('.footer_app').hover(function() {
        $("i", this).stop().fadeIn(200);
    }, function() {
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
    }).done(function(response) {
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
<script type="text/javascript" src="http://www.lagou.com/js/libs/tongji.js?v=1.5.5.7_102001"></script>
<script type="text/javascript" src="{{env('APP_HOST')}}/yi/analytics.js?v=1.5.5.7_102001"></script>
<script type="text/javascript" src="{{env('APP_HOST')}}/yi/oss.js"></script></body>
</html>