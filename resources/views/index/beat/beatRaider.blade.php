<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>使用攻略</title>
 @include('index.beat.beatCss')

    <link rel="Shortcut Icon" href="{{env('APP_HOST')}}/yi/index.png">
    <link rel="stylesheet" type="text/css" href="{{env('APP_HOST')}}/yi/strategy.css">

    <link rel="stylesheet" type="text/css" href="{{env('APP_HOST')}}/yi/jquery.css">
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
                <li class="" onclick="trackMonitor('l-talent-invited-nav')"><a
                            href="{{url('beatInvited')}}">我的邀约</a></li>
                {{--<li class="" onclick="trackMonitor('l-reward-nav')">--}}
                    {{--<a href="{{url('beatReward')}}">我的Offer</a>--}}
                {{--</li>--}}
                <li class="active" onclick="trackMonitor('l-guide-nav')">
                    <a href="{{url('beatRaider')}}">一拍攻略</a></li>
            </ul>
            <a href="{{url('/')}}" id="nav-go-back" onclick="trackMonitor('l-backlagou-text')">回校易聘</a>
        </div>
    </div>
</div>

<div id="body">
    <div class="container">
        <div class="top">
            <img src="{{env('APP_HOST')}}/yi/logo1.png" alt="strategy-logo">
        </div>
        <ul class="nav">
            <li class="nav-faq nav-selected">常见问题</li>
            <li class="nav-strategy">流程攻略</li>
        </ul>
        <div style="display: block;" class="faq-content">
            <div class="faq">
                <div class="quesiton s-clearfix">
                    <div class="icon-left icon-left-ques"></div>
                    <h2>1. 校易聘一拍是什么？<span class="icon-right"></span></h2>
                </div>
                <div class="answer s-clearfix" style="display: none;">
                    <div class="icon-left icon-left-ans"></div>
                    <p>一拍是校易聘网针对互联网行业风尖企业与高端人才定制的全新人才拍卖服务产品，为高端稀缺人才与企业之间建立及时有效的联系，专业团队全程提供1V1
                        服务。只要你拿到Dating
                        Park入场资格，就可在1周内收到多家优质企业邀请，由你自主决定是否接受，并准许对方查看你的联系方式，快速拿到最中意的offer。</p>
                </div>
            </div>
            <div class="faq">
                <div class="quesiton s-clearfix">
                    <div class="icon-left icon-left-ques"></div>
                    <h2>2. 谁能参与一拍？<span class="icon-right"></span></h2>
                </div>
                <div class="answer s-clearfix" style="display: none;">
                    <div class="icon-left icon-left-ans"></div>
                    <p>目前，校易聘一拍主要服务期望工作地点在北京、上海、广州、深圳、成都的候选人，并且具有3年+工作经验，30W+年薪的技术、产品、设计、运营、市场等互联网高端人才。</p>
                </div>
            </div>
            <div class="faq">
                <div class="quesiton s-clearfix">
                    <div class="icon-left icon-left-ques"></div>
                    <h2>3. 参与一拍我需要做什么？<span class="icon-right"></span></h2>
                </div>
                <div class="answer s-clearfix" style="display: none;">
                    <div class="icon-left icon-left-ans"></div>
                    <p>so easy ~ 完善你的信息（包括简历、申请资料等），申请报名，后面的事情都交给一拍吧。在属于你的Dating
                        Park日子，简历展示1周，你需要的只是回应企业抛出的橄榄枝，选择心仪的offer，轻松完成啦!</p>
                </div>
            </div>
            <div class="faq">
                <div class="quesiton s-clearfix">
                    <div class="icon-left icon-left-ques"></div>
                    <h2>4. Dating Park的含义？<span class="icon-right"></span></h2>
                </div>
                <div class="answer s-clearfix" style="display: none;">
                    <div class="icon-left icon-left-ans"></div>
                    <p>Dating Park进行时，你的简历会在一拍Dating park专场展示1周，企业可在展示期间对你进行邀约。自主选择心仪的企业，与企业来一场轻松愉悦的私人专场私密约会吧。</p>
                </div>
            </div>
            <div class="faq">
                <div class="quesiton s-clearfix">
                    <div class="icon-left icon-left-ques"></div>
                    <h2>5. 一拍如何保护我的隐私？<span class="icon-right"></span></h2>
                </div>
                <div class="answer s-clearfix" style="display: none;">
                    <div class="icon-left icon-left-ans"></div>
                    <p>
                        校易聘一拍全方位保护你的隐私，并给你独有屏蔽权。你可以指定屏蔽三家企业，只对心仪企业开放完整信息。只有你接受邀请，应邀企业才能看到你的姓名及联系方式。你的简历会于规定时间自动下架，所有信息都将关闭，为你免除后顾之忧。</p>
                </div>
            </div>
            <div class="faq">
                <div class="quesiton s-clearfix">
                    <div class="icon-left icon-left-ques"></div>
                    <h2>6. 一拍私人职业顾问如何服务我？<span class="icon-right"></span></h2>
                </div>
                <div class="answer s-clearfix" style="display: none;">
                    <div class="icon-left icon-left-ans"></div>
                    <p>当你申请校易聘一拍，我们便为你配备专属私人职业顾问。拿到Dating
                        Park入场券后，你的私人顾问将第一时间与你联系，帮你优化简历、撰写校易聘推荐语，将你最耀眼的一面完美展现给企业，为你实时跟进Dating
                        Park进度，及时解决你的所有问题，直到你拿到最满意的offer。</p>
                </div>
            </div>
            <div class="faq">
                <div class="quesiton s-clearfix">
                    <div class="icon-left icon-left-ques"></div>
                    <h2>7. 如果申请未通过我可以再次申请吗？<span class="icon-right"></span></h2>
                </div>
                <div class="answer s-clearfix" style="display: none;">
                    <div class="icon-left icon-left-ans"></div>
                    <p>如果你暂时没有拿到入场券，有可能是简历不够完善，有可能目前开设的技能专场与你技能不太相配，有可能是参与人员过多……不要放弃哦！只要你愿意，Dating Park将永远为优秀候选人开启！</p>
                </div>
            </div>
        </div>
        <div class="content" style="display: none;">
            <div class="part1 part">
                <p>我们相信，高端的人才值得拥有更优质的机会。校易聘一拍专注于服务高端人才，包括产品、设计、技术、运营和市场，报名参与一拍，您将拥有专业职业顾问一对一的全程服务。</p>
                <img src="{{env('APP_HOST')}}/yi/c_part1_new.png" alt="">
            </div>
            <div class="part2 part">
                <p>加入一拍后，职业顾问会与主动您沟通，帮您撰写推荐语“校易聘说“，并帮您安排专场展示。</p>
                <img src="{{env('APP_HOST')}}/yi/c_part2_new.png" alt="">
            </div>
            <div class="part3 part">
                <p>专场开始的前一天，我们会通过邮件等途径提示您。专场开始后，我们会全程跟踪您的动态，7日内，为您即时提醒收到的每一份邀约。</p>
                <img src="{{env('APP_HOST')}}/yi/c_part3_new.png" alt="">
            </div>
            <div class="part4 part">
                <p>择选出您心仪的企业，请静心等待企业的面试邀约吧。</p>
                <img src="{{env('APP_HOST')}}/yi/c_part4_new.png" alt="">
            </div>
            <div class="part5 part">
                <p>线下沟通后，如果您与企业拍一即合，就接受企业的offer，准备加入新公司吧！</p>
                <img src="{{env('APP_HOST')}}/yi/c_part5_new.png" alt="">
            </div>
        </div>
    </div>
    <div class="foot-tip">
        <div class="center">
            <p>一拍 · 即合，真的一拍即合</p>
<span>
              <a class="btn-apply click_track" event-name="l-creapply" href="javascript:void(0);">重新申请</a>
            </span>
        </div>
    </div>
</div>
 @include('index.beat.beatFoot')

<div id="_lgpassport_" data-css-site="0" data-css-popup="0"></div>
<script type="text/javascript" src="{{env('APP_HOST')}}/yi/esl.js"></script>

<script type="text/javascript" src="{{env('APP_HOST')}}/yi/strategy.js"></script>
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


    require(['talents/page/strategy/strategy']);




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


</script>

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