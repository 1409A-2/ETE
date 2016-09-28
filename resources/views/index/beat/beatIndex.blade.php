<!DOCTYPE html>
<html>
<title>一拍首页</title>
@include('index.beat.beatCss')
<link rel="stylesheet" type="text/css" href="{{env('APP_HOST')}}/yi/jquery.mCustomScrollbar.min.css" />
<link rel="stylesheet" type="text/css" href="{{env('APP_HOST')}}/yi/intro.css" />
<body>
 @include('index.beat.beatNav')

<div class="header"  style="background: url('yi/bg_head_big.jpg') no-repeat center bottom">
    <h1>校易聘一拍，重新定义互联网人才拍卖</h1>
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
                        <p class="author">—— 郝涌泉·高级服务器开发工程师·友加</p>
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
                        <p class="author">—— 冯倩倩·前端开发工程师·象辑科技</p>
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
                        <p class="author">—— 杨嘉明·产品运营主管·恒昌利通</p>
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
                        <p class="author">—— 苏冬冬·PHP开发工程师·罗辑思维</p>
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
                        <p class="author">—— 郝涌泉·高级服务器开发工程师·友加</p>
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
@include('index.beat.beatFoot')

<script type="text/javascript" src="{{env('APP_HOST')}}/yi/esl.js"></script>
<script type="text/javascript" src="{{env('APP_HOST')}}/yi/intro.html_aio.js"></script>
 @include('index.beat.beatJs')

<script type="text/javascript">
    require(['common/static/js/intro_base', 'talents/page/intro/intro']);
</script>

</body>
</html>