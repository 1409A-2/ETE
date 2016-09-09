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
    <link rel="stylesheet" type="text/css" href="{{env('APP_HOST')}}/yi/intro.css?v=1.5.5.7_102001" />
    <link rel="stylesheet" type="text/css" href="http://www.lagou.com/css/subject/header.css?v=1.5.5.7_102001" />
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
                <li><a href="http://pai.lagou.com">一拍</a></li>
            </ul>
            <ul class="bottom-right">
                <li class="active" onclick="trackMonitor('l-index-nav');" event-name="l-index-nav"><a href="http://pai.lagou.com">首页</a></li>
                <li class="" onclick="trackMonitor('l-guide-nav')"><a href="http://pai.lagou.com/talent/guide.html">一拍攻略</a></li>
            </ul>
            <a href="{{url('/')}}" id="nav-go-back" onclick="trackMonitor('l-backlagou-text')">回拉勾</a>
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
<div class="header"  style="background: url('yi/bg_head_big.jpg') no-repeat center bottom">
    <h1>拉勾一拍，重新定义互联网人才拍卖</h1>
    <p>[ 3年+工作经验，30W+年薪，互联网技术、产品、设计、运营、市场 ]</p>
    <p>1V1专业顾问私人订制</p>
    <p>限时展示，风尖互联网企业机会任你选</p>
    <div class="control clearfix">
        <button class="play click_track" event-name="b-play"></button>
        <a class="btn btn-apply click_track" event-name="l-capply-top" href="{{url('beatInfo')}}">我要申请</a>
    </div>
</div>
<div class="about">
    <div class="container">
        <h1>大咖专场</h1>
        <div class="row clearfix">
            <div class="column">
                <div class="about-item">
                    <i class="fe fe-icon1"></i>
                    <h3>你的Boss你来挑</h3>
                    <p>采用企业邀约制，聚集众多优质企业参与，让出色的你获得最大的选择权。</p>
                </div>
            </div>
            <div class="column">
                <div class="about-item">
                    <i class="fe fe-icon2"></i>
                    <h3>个性化定制服务</h3>
                    <p>每位用户指定一位专属顾问全程跟踪服务；根据用户的独特情况，提供个性化的职业咨询。换工作不再费心费力。</p>
                </div>
            </div>
            <div class="column">
                <div class="about-item">
                    <i class="fe fe-icon3"></i>
                    <h3>保障隐私防打扰</h3>
                    <p>不必担心隐私泄露，私密信息保护、屏蔽企业权力让你无后顾之忧。</p>
                </div>
            </div>
            <div class="column">
                <div class="about-item">
                    <i class="fe fe-icon4"></i>
                    <h3>反馈Offer</h3>
                    <i class="hot"></i>
                    <p>获得Offer之后，可以反馈给顾问，顾问可以提供进一步的资讯服务。</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="company">
    <div class="container">
        <h1>参与企业</h1>
        <div class="imgs">
            <img src="{{env('APP_HOST')}}/yi/company_logo.png" width="1024" height="410">
        </div>
    </div>
</div>
<div class="m-carousel">
    <div class="list" style="left: -100%;">
        <div class="item">
            <div class="carousel-content clearfix">
                <div class="head head-icon4"></div>
                <div class="carousel-caption clearfix">
                    <div class="left-quot"></div>
                    <div class="paragraphs">
                        <p class="second-paragraph">
                            在一拍被“拍卖”的经历让我很惊喜，我的一拍职业顾问Micheal告诉我，我当时成为了一拍有史以来收到邀约数最多的候选人，并打破了候选人收到offer速度的记录，从上专场到拿到offer只用了20个小时。仅仅面试了一家公司，我就找到了对味的团队。一拍对我来说已经不是一个找工作的工具这么简单，5月19日这天我在一拍上所经历的，可能已经影响了我的人生轨迹。<span class="right-quot"></span>
                        </p>
                        <br />
                        <br />
                        <p class="author">—— 王学兵·前端开发工程师·罗辑思维</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="carousel-content clearfix">
                <div class="head head-icon1"></div>
                <div class="carousel-caption clearfix">
                    <div class="left-quot"></div>
                    <div class="paragraphs">
                        <p class="second-paragraph">
                            这是我3年来第一次上招聘网站找工作，很幸运申请上了一拍，遇见职业顾问Yolanda。我的简历在一拍上展示了一天，收到不少企业的邀约，面试后的第二天就收到了offer，并且我很满意。Yolanda告诉我，拉勾一拍是终身服务，无论是在职场还是生活，遇到问题都可以找她。我发现自己不仅拥有了一个私人顾问，还多了一个朋友。<span class="right-quot"></span>
                        </p>
                        <br />
                        <br />
                        <p class="author">—— 陈果·高级服务器开发工程师·友加</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="carousel-content clearfix">
                <div class="head head-icon2"></div>
                <div class="carousel-caption clearfix">
                    <div class="left-quot"></div>
                    <div class="paragraphs">
                        <p class="second-paragraph">
                            近期考虑到自身发展，我计划到北京工作。一拍私人职业顾问Jessica找到我，想推荐我上一拍专场，我就抱着试试的心态报名了，没想到收到了好几十个面试邀请。工作这么久，多少有了解过其他招聘网站，一拍无论是在求职流程，还是简历中获取的信息，会更加突出一些，特别是提供私人顾问这样的服务，这种模式让求职者不再处于弱势地位。<span class="right-quot"></span>
                        </p>
                        <br />
                        <br />
                        <p class="author">—— 李明·前端开发工程师·象辑科技</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="carousel-content clearfix">
                <div class="head head-icon3"></div>
                <div class="carousel-caption clearfix">
                    <div class="left-quot"></div>
                    <div class="paragraphs">
                        <p class="second-paragraph">
                            在一拍还没有开放的时候我就知道一拍了，开放使用后我就报了名。我刚毕业的时候就到上家公司工作，一呆就是4年，求职经验少得可怜。在遇到一拍之后，职业顾问Jessica给予了我很多鼓励和陪伴，帮我解答很多职业困惑，让我慢慢放下了心理负担，她的专业影响了我。从一拍的申请到我最终入职，只用了一周时间，有些不可思议。<span class="right-quot"></span>
                        </p>
                        <br />
                        <br />
                        <p class="author">—— 丁杨洋·产品运营主管·恒昌利通</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="carousel-content clearfix">
                <div class="head head-icon4"></div>
                <div class="carousel-caption clearfix">
                    <div class="left-quot"></div>
                    <div class="paragraphs">
                        <p class="second-paragraph">
                            在一拍被“拍卖”的经历让我很惊喜，我的一拍职业顾问Micheal告诉我，我当时成为了一拍有史以来收到邀约数最多的候选人，并打破了候选人收到offer速度的记录，从上专场到拿到offer只用了20个小时。仅仅面试了一家公司，我就找到了对味的团队。一拍对我来说已经不是一个找工作的工具这么简单，5月19日这天我在一拍上所经历的，可能已经影响了我的人生轨迹。<span class="right-quot"></span>
                        </p>
                        <br />
                        <br />
                        <p class="author">—— 王学兵·前端开发工程师·罗辑思维</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="carousel-content clearfix">
                <div class="head head-icon1"></div>
                <div class="carousel-caption clearfix">
                    <div class="left-quot"></div>
                    <div class="paragraphs">
                        <p class="second-paragraph">
                            这是我3年来第一次上招聘网站找工作，很幸运申请上了一拍，遇见职业顾问Yolanda。我的简历在一拍上展示了一天，收到不少企业的邀约，面试后的第二天就收到了offer，并且我很满意。Yolanda告诉我，拉勾一拍是终身服务，无论是在职场还是生活，遇到问题都可以找她。我发现自己不仅拥有了一个私人顾问，还多了一个朋友。<span class="right-quot"></span>
                        </p>
                        <br />
                        <br />
                        <p class="author">—— 陈果·高级服务器开发工程师·友加</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="javascript:;" class="arrow prev"></a>
    <a href="javascript:;" class="arrow next"></a>
</div>
<div class="part part1">
    <h2>一拍流程</h2>
    <div class="step-wrapper clearfix">
        <div class="step step1">
            <i>01</i>
            <h3>一拍报名</h3>
            <p>注册、填写基本信息并提交申请。一拍顾问会在2个工作日内通知你报名结果［在这期间，你可以进一步完善在线简历来提高通过几率］。</p>
        </div>
        <div class="arrow"><i>2天</i></div>
        <div class="step step2">
            <i>02</i>
            <h3>专属定制</h3>
            <p>报名成功后，一拍会为你配备专属私人顾问，进一步沟通了解你的需求，并协助完善你的个人资料，安排你进入一拍专场。</p>
        </div>
        <div class="arrow"><i>1天</i></div>
        <div class="step step3">
            <i>03</i>
            <h3>Dating Park</h3>
            <p>你的简历会安排在一拍DatingPark专场展示1周。对你感兴趣的企业会发出邀约，你可以接受心仪企业的邀约，或先进行私信沟通，你也可以拒绝不感兴趣的约见。</p>
        </div>
        <div class="arrow"><i>7天</i></div>
        <div class="step step4">
            <i>04</i>
            <h3>线下面试</h3>
            <p>你同意约见的企业会与你沟通并确定面试时间，贴心的一拍顾问会为你备好专车，送你到达面试地点。同时一拍顾问全程1V1服务，协助你拿到满意的offer。</p>
        </div>
    </div>
</div>
<div class="foot-banner">
    <div class="wrapper">
        <p>一拍 · 即合，真的一拍即合</p>
        <a class="btn btn-apply click_track" event-name="l-capply-footer" href="{{url('beatInfo')}}">我要申请</a>
    </div>
</div>
<div id="shelter" class="hide"></div>
<div id="popVideo" class="hide">
    <div class="video-wrapper">
        <div id="youku" class="" style="width:944px; height:531px"></div>
        <a class="video-close"></a>
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
        "dep/jquery-ui-1.10.4.min": "{{env('APP_HOST')}}/yi/jquery-ui-1.10.4.min",
        "dep/jquery.mousewheel-3.0.6.min": "{{env('APP_HOST')}}/yi/jquery.mousewheel-3.0.6.min",
        "dep/jquery.mCustomScrollbar.min": "{{env('APP_HOST')}}/yi/jquery.mCustomScrollbar.min",
        "dep/artTemplate/dist/template": "/static/dep/artTemplate/dist/template",
        "common/widgets/subject_header_c/javascript/msgPopup": "/static/common/widgets/subject_header_c/javascript/msgPopup"
    }});</script>
<script type="text/javascript" src="{{env('APP_HOST')}}/yi/intro.html_aio.js"></script>
<script type="text/javascript">
    var ctx = "http://pai.lagou.com";
    var lctx = "http://www.lagou.com";


    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "//hm.baidu.com/hm.js?96cde98aa3a93d00e87f0e6ed4c296a0";
        var s = document.getElementsByTagname("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();


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
<script type="text/javascript">
    require(['common/static/js/intro_base', 'talents/page/intro/intro']);
</script>
<script type="text/javascript" src="{{env('APP_HOST')}}/yi/oss.js"></script></body>
</html>
