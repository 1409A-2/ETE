<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<title>我的Offer-拉勾网-最专业的互联网招聘平台</title>
<meta content="拉勾网是最权威的互联网行业招聘网站,提供全国真实的互联网招聘信息,工资不面议当面谈,找工作,招聘网,寻人才就来拉勾网,互联网行业找工作首选拉勾网" name="description">
<meta content="互联网招聘,找工作,招聘网,人才网" name="keywords">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="renderer" content="webkit">
<meta content="拉勾网是最权威的互联网行业招聘网站,提供全国真实的互联网招聘信息,工资不面议当面谈,找工作,招聘网,寻人才就来拉勾网,互联网行业找工作首选拉勾网" name="description">
<meta content="互联网招聘,找工作,招聘网,人才网" name="keywords">
<meta name="baidu-site-verification" content="QIQ6KC1oZ6">




<link rel="Shortcut Icon" href="http://www.lagou.com/images/favicon.ico?v=1.5.5.7_102001">
    <link rel="stylesheet" type="text/css" href="{{env('APP_HOST')}}/yi/header.css">
    <link rel="stylesheet" type="text/css" href="{{env('APP_HOST')}}/yi/common.css">
    <link rel="stylesheet" type="text/css" href="{{env('APP_HOST')}}/yi/foot.css">
    <link rel="stylesheet" type="text/css" href="{{env('APP_HOST')}}/yi/nav-head.css">
    <link rel="stylesheet" type="text/css" href="{{env('APP_HOST')}}/yi/jquery.css">
    <link rel="stylesheet" type="text/css" href="{{env('APP_HOST')}}/yi/reward.css">
</head>
<body>
    <div class="pai-nav">
<div class="pai-nav-top">
<ul class="top-left">
<li class="nav-icon"></li>
<li class="click_track" event-name="l-appdownload-header"><a href="http://www.lagou.com/app/download.html" class="lagou-app">拉勾APP</a></li>
<em></em>
<li class="click_track" event-name="l-switchusertype"><a href="http://pai.lagou.com/switchUserType.html?type=1">我要招人</a></li>
</ul>
<ul class="top-right">
<li class="msg_dropdown unreaded">
<a class="msg_group" href="javascript:%20void%200;" data-lg-tj-id="5h00" data-lg-tj-no="idnull" data-lg-tj-cid="idnull" rel="nofollow">
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
<li class="click_track" event-name="l-myresume"><a href="http://www.lagou.com/resume/myresume.html">我的简历</a></li>
<em></em>
<li class="click_track" event-name="l-delivery"><a href="http://www.lagou.com/mycenter/delivery.html">投递箱</a></li>
<em></em>
<li class="click_track" event-name="l-collections"><a href="http://www.lagou.com/mycenter/collections.html">收藏夹</a></li>
<em></em>
<li class="nav-user" id="nav-user-li">
<a href="javascript:;" id="nav-users">胡庆涛</a>
<span style=""></span>
<ul class="nav-select" style="z-index:999;">
<li class="click_track" event-name="l-subscribe"><a href="http://www.lagou.com/s/subscribe.html">我的订阅</a></li>
 <li class="click_track" event-name="l-logout"><a href="http://pai.lagou.com/frontLogout.do" style="margin-bottom: 10px;">退出</a></li>
</ul>
</li>
</ul>
</div>
<div class="pai-nav-bottom">
<div class="nav-wrapper">
<ul class="bottom-left">
<a href="http://www.lagou.com/" id="birthdayIcon">
<li class="pai-lagou"></li>
</a>
<em></em>
<li><a href="http://pai.lagou.com/">一拍</a></li>
</ul>
<ul class="bottom-right">
<li class="" onclick="trackMonitor('l-center-nav')"><a href="http://pai.lagou.com/talent/center.html">个人中心</a></li>
<li class="" onclick="trackMonitor('l-profile-nav')"><a href="http://pai.lagou.com/talent/profile.html">我的履历</a></li>
<li class="" onclick="trackMonitor('l-talent-invited-nav')"><a href="http://pai.lagou.com/talent/invited.html">我的邀约</a></li>
<li class="active" onclick="trackMonitor('l-reward-nav')"><a href="http://pai.lagou.com/feedback/reward.html">我的Offer</a></li>
<li class="" onclick="trackMonitor('l-guide-nav')"><a href="http://pai.lagou.com/talent/guide.html">一拍攻略</a></li>
</ul>
<a href="http://www.lagou.com/" id="nav-go-back" onclick="trackMonitor('l-backlagou-text')">回拉勾</a>
</div>
</div>
</div>
<script src="{{env('APP_HOST')}}/yi/v.htm" charset="utf-8"></script><script src="{{env('APP_HOST')}}/yi/analytics_002.js" async=""></script><script src="{{env('APP_HOST')}}/yi/hm_002.js"></script><script src="{{env('APP_HOST')}}/yi/a.js" async=""></script><script src="{{env('APP_HOST')}}/yi/hm.js"></script><script type="text/html" id="TOP_MSG_TPL">
    {{if content==null || content.data==null || content.data.newMessageList==null || content.data.newMessageList.length==0}}
        <div class="no_body">
            <p class="lg_msg_avatar no_msg_i">暂时没有新的消息~</p>
        </div>
    {{else}}
        <ul class="lg_top_msg_list">
        {{each content.data.newMessageList as item}}
            {{if item.messageType=='DELIVER'}}
            <li class="lg_msg_item {{if item.isNew===true}}is_new{{/if}}">{{if item.isNew===true}}<em>·</em>{{/if}}<div>
                <!-- 投递反馈 -->
                <a class="detail" target="_blank" href="http://www.lagou.com/message/businessDetail.html?type=DELIVER&businessId={{item.businessId}}">
                    {{if item.businessStatus=='SUCCESS'}}
                    你投递给<span class="empha">{{item.content.companyShowName}}·{{item.content.positionName}}</span>职位的简历，已经投递成功，请静候佳音
                    {{/if}}
                    {{if item.businessStatus=='FORWARD'}}
                    你投递给<span class="empha">{{item.content.companyShowName}}·{{item.content.positionName}}</span>职位的简历，已经被转发，请静候佳音
                    {{/if}}
                    {{if item.businessStatus=='READ'}}
                    你投递给<span class="empha">{{item.content.companyShowName}}·{{item.content.positionName}}</span>职位的简历，已经被招聘方查看啦，请静候佳音
                    {{/if}}
                    {{if item.businessStatus=='PREPARE_CONTACT'}}
                    你投递给<span class="empha">{{item.content.companyShowName}}·{{item.content.positionName}}</span>职位的简历，已经通过初筛，企业可能会在近期与你沟通，请保持联系方式畅通
                    {{/if}}
                    {{if item.businessStatus=='INTERVIEW'}}
                    你投递给<span class="empha">{{item.content.companyShowName}}·{{item.content.positionName}}</span>职位的招聘方给你发来了面试邀请，快去查看一下吧
                    {{/if}}
                    {{if item.businessStatus=='REFUSE'}}
                    你投递给<span class="empha">{{item.content.companyShowName}}·{{item.content.positionName}}</span>职位的简历被招聘方标记为不合适，不要气馁，相信更好的机会一定还在等着你！
                    {{/if}}
                </a>
            </div></li>
            {{/if}}
            {{if item.messageType=='PLUS'}}
            <li class="lg_msg_item {{if item.isNew===true}}is_new{{/if}}">{{if item.isNew===true}}<em>·</em>{{/if}}<div>
                <!-- 职位邀请 -->
                <a class="detail" target="_blank" href="http://www.lagou.com/message/businessDetail.html?type=PLUS&businessId={{item.content.id}}">
                    <span class="empha">{{item.content.companyShowName}}</span>的Leader很欣赏你的从业经历，给你发了面试邀请，快去查看一下吧。
                </a>
            </div></li>
            {{/if}}
            {{if item.messageType=='PAI'}}
                {{if item.businessStatus==='PAI_SERVICE_USER_EVALUATION'}}
                <!-- 一拍-评价顾问 -->
                <li class="lg_msg_item {{if item.isNew===true}}is_new{{/if}}">{{if item.isNew===true}}<em>·</em>{{/if}}<div>
                    {{#item.content | resolvePaiTopTemplate: item.businessStatus}}
                </div></li>
                {{else}}
                <li class="lg_msg_item {{if item.isNew===true}}is_new{{/if}}">{{if item.isNew===true}}<em>·</em>{{/if}}<div>
                    <!-- 一拍 -->
                    <a class="detail" target="_blank" href="http://www.lagou.com/message/msgdetail.html#pai">
                        {{#item.content | resolvePaiTopTemplate: item.businessStatus | formatText: 60}}
                    </a>
                </div></li>
                {{/if}}
            {{/if}}
            {{if item.messageType=='SYSTEM' || item.businessStatus==''}}
                {{if item.businessStatus==null}}
                    <!-- 系统消息，如果是纯文本消息，则无title，需要显示content -->
                    {{if item.content.type=='TEXT'}}
                    <li class="lg_msg_item {{if item.isNew===true}}is_new{{/if}}">{{if item.isNew===true}}<em>·</em>{{/if}}<div>
                        <a class="detail" target="_blank" href="http://www.lagou.com/message/msgdetail.html#system">
                            {{item.content.info | formatText: 60}}
                        </a>
                    </div></li>
                    {{else}}
                        {{if item.content.articleLink!=null || item.content.articleLink!=''}}
                        <li class="lg_msg_item {{if item.isNew===true}}is_new{{/if}}">{{if item.isNew===true}}<em>·</em>{{/if}}<div>
                            <a class="detail" target="_blank" href="{{item.content.articleLink}}">{{item.content.title | formatText: 60}}</a>
                        </div></li>
                        {{else}}
                        <li class="lg_msg_item {{if item.isNew===true}}is_new{{/if}}">{{if item.isNew===true}}<em>·</em>{{/if}}<div>
                            <a class="detail" target="_blank" href="http://www.lagou.com/message/msgdetail.html#system">
                                {{item.content.title | formatText: 60}}
                            </a>
                        </div></li>
                        {{/if}}
                    {{/if}}
                {{else if item.businessStatus==='C_USER_ACTIVE'}}
                <!-- 欢迎来到拉勾 -->
                <li class="lg_msg_item {{if item.isNew===true}}is_new{{/if}}">{{if item.isNew===true}}<em>·</em>{{/if}}<div>
                    <a class="empha welcomeInfo1" target="_blank" href="{{FE_base}}/message/msgdetail.html#system" data-lg-tj-id="Nw00" data-lg-tj-no="idnull" data-lg-tj-cid="idnull">Hi，拉勾君见过{{item.content.cUserCount}}个互联网人，才终于等到你。90%的HR会优先面试有完善简历的人才。现在就来完善简历吧</a>
                </div></li>
                {{else if item.businessStatus==='PAI_C_PUSH'}}
                <!-- 一拍系统消息 -->
                <li class="lg_msg_item {{if item.isNew===true}}is_new{{/if}}">{{if item.isNew===true}}<em>·</em>{{/if}}<div>
                    <a class="detail" data-lg-tj-id="hT00" data-lg-tj-no="idnull" data-lg-tj-cid="idnull" target="_blank" href="{{FE_base}}/message/msgdetail.html#system">
                        {{#item.content | resolvePaiTopTemplate: item.businessStatus | formatText: 60}}
                    </a><a class="detail" data-lg-tj-id="kq00" data-lg-tj-no="idnull" data-lg-tj-cid="idnull" target="_blank" href="/index.html">立即报名</a>
                </div></li>
                {{else}}
                <li class="lg_msg_item {{if item.isNew===true}}is_new{{/if}}">{{if item.isNew===true}}<em>·</em>{{/if}}<div>
                    <a class="detail" target="_blank" href="{{FE_base}}/message/msgdetail.html#system">
                        {{#item.content | resolvePaiTopTemplate: item.businessStatus | formatText: 60}}
                    </a>
                </div></li>
                {{/if}}
            {{/if}}
            {{if item.messageType=='COMMUNITY'}}
                <!-- 三个为什么消息 -->
                {{if item.businessStatus=='QUESTION_ASKTO'}}
                <li class="lg_msg_item {{if item.isNew===true}}is_new{{/if}}">{{if item.isNew===true}}<em>·</em>{{/if}}<div>
                    {{each item.content.userList as user index}}{{if user.userName == '匿名用户'}}匿名用户{{else}}<a class="detail" target="_blank" href="{{FE_zbase}}/user/userIndex-{{user.userId}}.html"><span class="empha">{{user.userName}}</span></a>{{/if}}{{if index + 1 < item.content.userList.length}}，{{/if}}{{/each}}{{if item.content.newsNum > 3}}等{{item.content.newsNum}}人{{/if}}向你提问<a class="detail" target="_blank" href="{{FE_zbase}}/question/{{item.businessId}}.html?code={{item.content.code}}"><span class="empha">{{item.content.questionTitle}}</span></a>
                </div></li>
                {{else if item.businessStatus=='ANSWER_ADD'}}
                <li class="lg_msg_item {{if item.isNew===true}}is_new{{/if}}">{{if item.isNew===true}}<em>·</em>{{/if}}<div>
                    {{each item.content.userList as user index}}{{if user.userName == '匿名用户'}}匿名用户{{else}}<a class="detail" target="_blank" href="{{FE_zbase}}/user/userIndex-{{user.userId}}.html"><span class="empha">{{user.userName}}</span></a>{{/if}}{{if index + 1 < item.content.userList.length}}，{{/if}}{{/each}}{{if item.content.newsNum > 3}}等{{item.content.newsNum}}人{{/if}}回答了<a class="detail" target="_blank" href="{{FE_zbase}}/question/{{item.businessId}}.html"><span class="empha">{{item.content.questionTitle}}</span></a>
                </div></li>
                {{else if item.businessStatus=='COMMENT_ADD'}}
                <li class="lg_msg_item {{if item.isNew===true}}is_new{{/if}}">{{if item.isNew===true}}<em>·</em>{{/if}}<div>
                    {{each item.content.userList as user index}}{{if user.userName == '匿名用户'}}匿名用户{{else}}<a class="detail" target="_blank" href="{{FE_zbase}}/user/userIndex-{{user.userId}}.html"><span class="empha">{{user.userName}}</span></a>{{/if}}{{if index + 1 < item.content.userList.length}}，{{/if}}{{/each}}{{if item.content.newsNum > 3}}等{{item.content.newsNum}}人{{/if}}评论了<a class="detail" target="_blank" href="{{FE_zbase}}/answer/{{item.businessId}}.html"><span class="empha">{{item.content.questionTitle}}</span></a>中你的回答
                </div></li>
                {{else if item.businessStatus=='STAR_ANSWER'}}
                <li class="lg_msg_item {{if item.isNew===true}}is_new{{/if}}">{{if item.isNew===true}}<em>·</em>{{/if}}<div>
                    {{each item.content.userList as user index}}{{if user.userName == '匿名用户'}}匿名用户{{else}}<a class="detail" target="_blank" href="{{FE_zbase}}/user/userIndex-{{user.userId}}.html"><span class="empha">{{user.userName}}</span></a>{{/if}}{{if index + 1 < item.content.userList.length}}，{{/if}}{{/each}}{{if item.content.newsNum > 3}}等{{item.content.newsNum}}人{{/if}}赞同了<a class="detail" target="_blank" href="{{FE_zbase}}/answer/{{item.businessId}}.html"><span class="empha">{{item.content.questionTitle}}</span></a>中你的回答
                </div></li>
                {{else if item.businessStatus=='QUESTION_REFUSE'}}
                <li class="lg_msg_item {{if item.isNew===true}}is_new{{/if}}">{{if item.isNew===true}}<em>·</em>{{/if}}<div>
                    <a class="detail" target="_blank" href="{{FE_zbase}}/user/userIndex-{{item.receiveUserId}}.html">
                        很遗憾，你的提问<span class="empha">{{item.content.questionTitle}}</span>未通过审核
                    </a>
                </div></li>
                {{else if item.businessStatus=='ANSWER_REFUSE'}}
                <li class="lg_msg_item {{if item.isNew===true}}is_new{{/if}}">{{if item.isNew===true}}<em>·</em>{{/if}}<div>
                    <a class="detail" target="_blank" href="{{FE_zbase}}/user/userIndex-{{item.receiveUserId}}.html">
                        很遗憾，<span class="empha">{{item.content.questionTitle}}</span>中你的回答未通过审核
                    </a>
                </div></li>
                {{else if item.businessStatus=='COMMENT_REFUSE'}}
                <li class="lg_msg_item {{if item.isNew===true}}is_new{{/if}}">{{if item.isNew===true}}<em>·</em>{{/if}}<div>
                    <a class="detail" target="_blank" href="{{FE_zbase}}/user/userIndex-{{item.receiveUserId}}.html">
                        很遗憾，<span class="empha">{{item.content.questionTitle}}</span>中你的评论未通过审核
                    </a>
                </div></li>
                {{else if item.businessStatus=='BY_USER_FOLLOWED'}}
                <li class="lg_msg_item {{if item.isNew===true}}is_new{{/if}}">{{if item.isNew===true}}<em>·</em>{{/if}}<div>
                    {{each item.content.userList as user index}}{{if user.userName == '匿名用户'}}匿名用户{{else}}<a class="detail" target="_blank" href="{{FE_zbase}}/user/userIndex-{{user.userId}}.html"><span class="empha">{{user.userName}}</span></a>{{/if}}{{if index + 1 < item.content.userList.length}}，{{/if}}{{/each}}{{if item.content.newsNum > 3}}等{{item.content.newsNum}}人{{/if}}关注了你
                </div></li>
                {{else if item.businessStatus=='COMMUNITY_INVITE_ANSWER'}}
                <li class="lg_msg_item {{if item.isNew===true}}is_new{{/if}}">{{if item.isNew===true}}<em>·</em>{{/if}}<div>
                    {{each item.content.userList as user index}}{{if user.userName == '匿名用户'}}匿名用户{{else}}<a class="detail" target="_blank" href="{{FE_zbase}}/user/userIndex-{{user.userId}}.html"><span class="empha">{{user.userName}}</span></a>{{/if}}{{if index + 1 < item.content.userList.length}}，{{/if}}{{/each}}{{if item.content.newsNum > 3}}等{{item.content.newsNum}}人{{/if}}邀请你回答<a class="detail" target="_blank" href="{{FE_zbase}}/question/{{item.businessId}}.html"><span class="empha">{{item.content.questionTitle}}</span></a>
                </div></li>
                {{/if}}
            {{/if}}
        {{/each}}
        </ul>
    {{/if}}
</script>
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
    Hi {{name}}，你好<br/>
    恭喜你通过拉勾一拍的审核，审核通过以后就可以参加线上专场了。<a href="/talent/guide.html" target="_blank">点击使用攻略，查看如何使用一拍</a>。
</script>
<script type="text/html" id="PAI_C_AUDIT_NO_UNCONTACT">
    亲爱的{{name}} ：<br/>
    非常感谢你报名参加拉勾一拍。不过由于一直无法联系上你，导致我们的顾问无法确定你是否可以参加一拍的Dating park。<br/>
    我们的Dating park会对报名对象进行严格的筛选，这是为了让求职者收到更多优秀的企业邀约，获得最好的求职体验。同时也会严格把关企业的质量，请理解。<br/>
    顾问和你联系的原因，主要是你的个人简历不完善或者有其他信息需要和你确认，而且如果报名成功，顾问也需要后续和你联系，所以你可以保证通讯顺畅的时候，再次申请报名一拍。
</script>
<script type="text/html" id="PAI_C_AUDIT_NO_BASICCONDITION">
    亲爱的{{name}} ：<br/>
    非常抱歉，你没有通过我们的筛选。非常感谢你报名参加拉勾一拍。<br/>
    目前一拍主要服务对象是3年+工作经验，30w+年薪的互联网技术，产品，设计，运营资深从业者，暂只开通服务北京，上海，广州，深圳，杭州五大城市。<br/>
    根据你的简历，我们无法保证你在Datingpark上可以获得满意的offer。我们会不断丰富 一拍技能类型，请多多关注一拍动态。<br/>
    我们的Dating park会对报名对象进行严格的筛选，这是为了让求职者收到更多优秀的企业邀约，获得最好的求职体验。同时也会严格把关企业的质量，请理解。<br/>
</script>
<script type="text/html" id="PAI_C_AUDIT_NO_OTHERREASON">
    亲爱的{{name}} ：<br/>
    非常抱歉，你没有通过我们的筛选。非常感谢你报名参加拉勾一拍。
    目前一拍主要服务对象是3年+工作经验，30w+年薪的互联网技术，产品，设计，运营资深从业者，暂只开通服务北京，上海，广州，深圳，杭州五大城市。
    根据你的简历，我们无法保证你在Datingpark上可以获得满意的offer。我们会不断丰富 一拍技能类型，请多多关注一拍动态
    我们的Dating park会对报名对象进行严格的筛选，这是为了让求职者收到更多优秀的企业邀约，获得最好的求职体验。同时也会严格把关企业的质量，请理解。
</script>
<script type="text/html" id="PAI_C_AUDIT_NO_NOINTENTION">
    亲爱的{{name}} ：<br/>
    非常抱歉，你没有通过我们的筛选。非常感谢你报名参加拉勾一拍。
    顾问和你沟通的过程中，发现你并没有求职意向，仅仅是为了体验一拍产品而报名一拍。
    非常感谢你对一拍产品的关注。目前我们的报名人数很多 ，顾问很辛苦 ，所以建议去一拍首页了解详情。
</script>
<script type="text/html" id="PAI_C_AUDIT_NO_RESUMEINFO">
    亲爱的{{name}} ：<br/>
    非常感谢你报名参加拉勾一拍。不过，由于你的简历太过于简单，我们的顾问无法确定你是否可以参加一拍的Dating park。
    为了保证每一期Dating park的体验，我们要求你的简历需具备基本的筛选条件。请参考如下的一拍简历要求，完善你的简历
</script>
<script type="text/html" id="PAI_C_SCHEDULE_YES">
    Hi {{name}}！<br/>
    很高兴的通知你，你的简历将于{{startDay}}（周{{week}}）上午10点上架Dating Park，并展示7天。敬请到时关注，别错过你心仪的企业发出的邀约哦！
</script>
<script type="text/html" id="PAI_C_SCHEDULE_NO_CANNOTCONTACTCANDIDATE">
    亲爱的{{name}}：<br/>
    非常感谢你报名参加拉勾一拍。不过由于一直无法联系上你，导致我们的顾问无法确定你是否可以参加一拍的Dating park。
    我们的Dating park会对报名对象进行严格的筛选，这是为了让求职者收到更多优秀的企业邀约，获得最好的求职体验。同时也会严格把关企业的质量，请理解。
    顾问和你联系的原因，主要是你的个人简历不完善或者有其他信息需要和你确认，而且如果报名成功，顾问也需要后续和你联系，所以你可以保证通讯顺畅的时候，再次申请 报名一拍。
</script>
<script type="text/html" id="PAI_C_SCHEDULE_NO_RESUNEINFO">
    亲爱的{{name}}：<br/>
    非常感谢你报名参加拉勾一拍。不过，由于你的简历太过于简单，我们的顾问无法确定你是否可以参加一拍的Dating park。
    为了保证每一期Dating park的体验，我们要求你的简历需具备基本的筛选条件。请参考如下的一拍简历要求，完善你的简历。
</script>
<script type="text/html" id="PAI_C_SCHEDULE_NO_NOINTENTION">
    亲爱的{{name}}：<br/>
    非常感谢你报名参加拉勾一拍。在我们的顾问和你沟通的过程，得知你已经没有求职意向。仍然感谢你参与一拍.
    一拍正在不断丰富Dating Park，立志帮每位像你这样的大咖找到满意的工作。谢谢你对一拍的关注。
</script>
<script type="text/html" id="PAI_C_AUCTION_START">
    Hi {{name}}！<br/>
    现在开始，你的简历将在Dating Park进行展示，为期7天。记得及时查看待处理的约见哦！
    在你未接受企业邀约的情况下，企业无法查看你的联系方式。
    有问题吗？试试咨询你的一拍私人顾问吧！
</script>
<script type="text/html" id="PAI_C_INVITE_EVERYTOTAL">
    Hi {{name}}！<br/>
    截止到今晚8点，你已经收到了{{invitesTotalNum}}个约见邀请，{{invitesNum}}个还未处理。在你未接受企业邀约的情况下，企业无法看到你的联系方式，但你可以通过私信与企业沟通。收到邀约起7天内不回应，将视为自动拒绝邀约。记得及时处理你的约见哦！
    有问题吗？试试咨询你的一拍私人顾问吧！
</script>
<script type="text/html" id="PAI_C_INVITE_ENDTOTAL">
    Hi {{name}}！<br/>
    你的简历即将于明早10点从一拍Dating Park下架，感谢你的参与。
    截止到今晚8点，你已经收到了{{invitesTotalNum}}个约见邀请，{{invitesNum}}个还未处理。在你未接受企业邀约的情况下，企业无法看到你的联系方式，但你可以通过私信与企业沟通。收到邀约起7天内不回应，将视为自动拒绝邀约。记得及时处理你的约见哦！
</script>
<script type="text/html" id="PAI_C_INVITE_END">
    亲爱的{{name}}：<br/>
    非常感谢你报名参加拉勾一拍。在我们的顾问和你沟通的过程，得知你已经没有求职意向。仍然感谢你参与一拍。
    一拍正在不断丰富Dating Park，立志帮每位像你这样的大咖找到满意的工作。谢谢你对一拍的关注。
</script>
<script type="text/html" id="PAI_C_OFFER_AUDIT_YES">
    Hi,{{name}}：<br/>
    恭喜你通过一拍入职反馈奖励申请，经核对，你的申请符合 ［{{offerType}}］，将获得 ［{{offerMoney}}］的现金奖励， {{offerMessage}}请你按照如下方式获取现金红包奖励，如果你后续获得了新的offer，你可以继续申请 领取奖励。
    领取方式：<br/>
    1、微信扫描邮件底部拉勾招聘二维码，关注拉勾微信公众号。<br/>
    2、到 个人中心 我的奖励扫描红包二维码，验证无误后现金奖励将以红包的形式发送到你关注的拉勾微信公众号里，点击领取，即可获得奖励。<br/>
    3、由于微信红包金额限制，如果你获得了300元入职奖励，奖金将以3个红包形式发到你的微信公众后台，请及时领取。
</script>
<script type="text/html" id="PAI_C_OFFER_AUDIT_NO">
    Hi,{{name}}：<br/>
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
    HI {{username}}！<br/>
    感谢您参加拉勾「一拍」，您对职业顾问的服务还满意吗？或是想发几句牢骚？诚挚邀请您对职业顾问的服务做出评价！「一拍」急切想听到您的声音，您的反馈和评价是顾问服务的动力和改进提高的依据，对于我们至关重要~<br/>
    <a class="to-detail" href="{{articleLink}}" target="_blank" data-lg-tj-id="18P0" data-lg-tj-no="idnull" data-lg-tj-cid="idnull">去评价顾问</a>
</script>
<script type="text/html" id="PAI_PAI_SERVICE_USER_EVALUATION_FOR_TOP">
    <a class="detail" data-lg-tj-id="1aY0" data-lg-tj-no="idnull" data-lg-tj-cid="idnull" target="_blank" href="{{articleLink}}">
        HI {{username}}！<br/>
        感谢您参加拉勾「一拍」，您对职业顾问的服务还满意吗？或是想发几句牢骚？诚挚邀请您对职业顾问的服务做出评价！
    </a>
</script><div id="body" class="reward">
<div class="container">
<div class="content">
<header>
<h2 class="fl">所有Offer</h2>
<a href="http://pai.lagou.com/feedback/applyForReward.html" class="mark fr" onclick="trackMonitor('r-apply-reward');">添加Offer</a>
</header>
<div class="reward-content">
<div class="reward-empty">
<img src="{{env('APP_HOST')}}/yi/redpack.png" alt="红包图标">
<p class="user-tip">
现在还没有任何Offer记录，快来反馈Offer吧<br>
<a href="http://pai.lagou.com/feedback/applyForReward.html" class="mark" onclick="trackMonitor('r-apply-reward');">添加Offer</a>
</p>
</div>
</div>
</div>
</div>
<script id="reward-item-new-id" type="text/html">
        <div class="reward-section">
        <header class="title-line">
            <time class="time">{{createTime}}</time>
        </header>
        <ul class="offer-detail">
            <li>
                <!-- 公司名称需要替换 -->
                <img src="http://www.lagou.com/{{companyLogo}}" width="64" alt="公司名称">
                <p class="company">{{companyShortName}}</p>
            </li>
            <li class="rewards-module">
                <div class="center-layout">
                    <div>
                        <p class="reward">{{department}}</p>
                    </div>
                </div>
            </li>
            <li class="rewards-module">
                <div class="center-layout">
                    <div>
                        <p class="reward">{{positionName}}</p>
                    </div>
                </div>
            </li>
        </ul>
    	</div>
        </script>
<script id="reward-item-id" type="text/html">
            <div class="reward-section">
                <header class="title-line">
                    <!-- 提交审核时间 -->
                    <time class="time">{{createTime}}</time>
                    <!-- 审核状态 -->
                    <span class="mark state">{{passStatus}}</span>
                </header>
                <ul class="offer-detail">
                    <li>
                        <!-- 公司名称需要替换 -->
                        <img src="http://www.lagou.com/{{companyLogo}}" width="64" alt="公司名称">
                        <p class="company">{{companyShortName}}</p>
                        <p class="position">{{positionName}}</p>
                    </li>
                    <li class="rewards-module">
                        <div class="center-layout">
                            <div>
                                <p class="reward">offer奖励</p>
                                {{if offerMoneyGreen == true}}
                                <p class="money offerMoneyGreen">¥{{offerMoney}}</p>
                                {{else}}
                                <p class="money">¥{{offerMoney}}</p>
                                {{/if}}
                            </div>
                            {{if workMoney > 0 }}
                            <div>
                                <p class="reward">入职奖励</p>
                                {{if workMoneyGreen == true}}
                                <p class="money workMoneyGreen">¥{{workMoney}}</p>
                                {{else}}
                                <p class="money">¥{{workMoney}}</p>
                                {{/if}}
                            </div>
                            {{/if}}
                        </div>
                    </li>
                    <li>
                        
                        {{if hasRewardUrl == true }}
                            {{if canAppendWorkReward == true}}
                                <button class="get-reward" data-qrcode="{{encryptReward}}" onclick="trackMonitor('r-get-reward');">领取奖励</button>
                                <a href="javascript:void(0)" class="add-reward underline">追加申请奖励</a>
                            {{else}}
                                <button class="get-reward middle" data-qrcode="{{encryptReward}}" onclick="trackMonitor('r-get-reward');">领取奖励</button>
                            {{/if}}
                        {{else}}
                                {{if canAppendWorkReward == true}}
                                    <a href="javascript:void(0)" class="add-reward underline middle" onclick="trackMonitor('r-append-reward');">追加申请奖励</a>
                                {{/if}}
                        {{/if}}
                    </li>
                </ul>
                <!-- 验证是否入职 -->
                <section class="induction" style="display: none">
                    <dl>
                        <label for="company-email">输入入职企业的邮箱</label>
                        <input type="text" name="company-email" class="company-email" maxlength="40" />
                        <a href="javascript:void(0)" data-invited-id="{{inviteId}}" class="mark underline send-email-btn" onclick="trackMonitor('r-send-email-vcode');">获取验证码</a>
                        <div class="err-tip" style="display: none;">错误提示</div>
                    </dl>
                    <dl>
                        <label for="v-code">输入验证码</label>
                        <input type="text" name="v-code" class="v-code" maxlength="6" />
                        <div class="err-tip" style="display: none;">错误提示</div>
                    </dl>
                    </dl>
                    <dl>
                        <button class="submit append-reward-btn" data-fid="{{fid}}" onclick="trackMonitor('r-submit');">确定</button>
                        <a href="javascript:void(0)" class="cancel" onclick="trackMonitor('r-submit');">取消</a>
                    </dl>
                </section>
            </div>
        </script>
<div class="hide">
<div id="getReward">
<div>
<i><img src="{{env('APP_HOST')}}/yi/qrcode.jpg" border="0"></i>
<p>关注拉勾微信服务号<br><span class="gray">在公众号登录拉勾网<br><br></span></p>
</div>
<div class="step-to"></div>
<div>
<i><img class="QRCode" src="{{env('APP_HOST')}}/yi/encryptReward.jpg" border="0"></i>
<p>微信扫描红包二维码<br><span class="gray">扫描后红包会自动发送拉勾微信服务号</span></p>
</div>
</div>
</div>
</div><div id="footer">
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
<span><em>©</em>2016 Lagou</span>
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
<input name="email" placeholder="留下邮箱方便我们沟通（选填）" type="text">
<span class="ensure">确定</span>
</div>
</form>
</div></div><div id="_lgpassport_" data-css-site="0" data-css-popup="0"></div>
<script type="text/javascript" src="{{env('APP_HOST')}}/yi/esl.js"></script>
<script type="text/javascript">/*resourcemap*/
require.config({paths:{
  "dep/jquery.mousewheel-3.0.6.min": "/static/dep/jquery.mousewheel-3.0.6.min",
  "dep/jquery.mCustomScrollbar.min": "/static/dep/jquery.mCustomScrollbar.min",
  "common/widgets/subject_header_c/javascript/msgPopup": "/static/common/widgets/subject_header_c/javascript/msgPopup"
}});</script>
<script type="text/javascript" src="{{env('APP_HOST')}}/yi/reward.js"></script>
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


    require(['talents/page/reward/reward']);
    

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
<script type="text/javascript" src="{{env('APP_HOST')}}/yi/tongji.js"></script>
<script type="text/javascript" src="{{env('APP_HOST')}}/yi/analytics.js"></script>
<script type="text/javascript" src="{{env('APP_HOST')}}/yi/oss.js"></script>
<div style="display: none;" id="cboxOverlay"></div><div style="display: none;" tabindex="-1" role="dialog" class="" id="colorbox"><div id="cboxWrapper"><div><div style="float: left;" id="cboxTopLeft"></div><div style="float: left;" id="cboxTopCenter"></div><div style="float: left;" id="cboxTopRight"></div></div><div style="clear: left;"><div style="float: left;" id="cboxMiddleLeft"></div><div style="float: left;" id="cboxContent"><div style="float: left;" id="cboxTitle"></div><div style="float: left;" id="cboxCurrent"></div><button id="cboxPrevious" type="button"></button><button id="cboxNext" type="button"></button><button id="cboxSlideshow"></button><div style="float: left;" id="cboxLoadingOverlay"></div><div style="float: left;" id="cboxLoadingGraphic"></div></div><div style="float: left;" id="cboxMiddleRight"></div></div><div style="clear: left;"><div style="float: left;" id="cboxBottomLeft"></div><div style="float: left;" id="cboxBottomCenter"></div><div style="float: left;" id="cboxBottomRight"></div></div></div><div style="position: absolute; width: 9999px; visibility: hidden; display: none; max-width: none;"></div></div></body></html>