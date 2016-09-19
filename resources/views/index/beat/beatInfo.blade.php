<!DOCTYPE html>
<html>
@include('index.beat.beatCss')
<title>一拍</title>
<link rel="stylesheet" type="text/css" href="yi/basicInfo.css">
<link rel="stylesheet" type="text/css" href="yi/jquery.css">
<body>

@include('index.beat.beatNav')

<div class="container">
    <input id="resume-schedule" value="" type="hidden">
    <input id="reserve-time-data" value="" type="hidden">

    <div class="m-progress s-clearfix">

        <div class="item">
            <i style="background: transparent url(&quot;/yi/progress.png&quot;) no-repeat scroll 0px 0px;"
               class="stepEle">
                <span class="step">1</span>
            </i>

            <p>报名</p>

            <div class="tip first-tip" style="display: none;">
                顾问会对你的报名信息和简历进行审核（<span onclick="trackMonitor('c-pg-standard');" class="green link" id="m-progress-ft">查看审核标准</span>），审核结果会在<span
                        class="green">2</span>个工作日内通知你。完善的简历可以提高审核通过几率，同时有助于顾问快速完成审核，报名完成后你可以进一步完善以下简历信息：<span
                        class="green">基本信息、教育经历、工作经历、项目经验、作品展示、自我介绍等。</span>
            </div>
        </div>

        <div style="background: transparent url(&quot;/yi/progress.png&quot;) no-repeat scroll 0px -52px;"
             class="arrow first-arrow"></div>
        <div class="item">
            <i style="background: transparent url(&quot;/yi/progress.png&quot;) no-repeat scroll -38px 0px;"
               class="stepEle">
                <span class="step">2</span>
            </i>

            <p>审核通过</p>

            <div class="tip second-tip" style="display: none;">
                审核通过后，顾问会根据你预约的时间为你安排专场。<p class="note"><span class="bold">注意：</span><span class="note-content">专场展示期间你将不能编辑你的简历，在展示开始前请完善你的简历信息。</span>
                </p>
            </div>
        </div>

        <div style="background: transparent url(&quot;/yi/progress.png&quot;) no-repeat scroll 0px -52px;"
             class="arrow"></div>
        <div class="item">
            <i style="background: transparent url(&quot;/yi/progress.png&quot;) no-repeat scroll -38px 0px;"
               class="stepEle">
                <span class="step">3</span>
            </i>

            <p>处理邀约</p>

            <div class="tip third-tip" style="display: none;">
                你的履历将在专场上展示<span class="green">1</span>周，企业会向你发出面试邀请，你可以接受感兴趣的邀约或者拒绝不感兴趣的工作机会，超过<span
                        class="green">7</span>天未处理的邀约会被自动拒绝。只有在你接受邀约后，HR才能查看你的联系方式。记得及时处理邀约哦。<p class="note"><span
                            class="bold">注意：</span><span class="note-content">拍卖开始后，不能修改履历信息。</span></p>
            </div>
        </div>

        <div style="background: transparent url(&quot;/yi/progress.png&quot;) no-repeat scroll 0px -52px;"
             class="arrow last-arrow"></div>
        <div class="item">
            <i style="background: transparent url(&quot;/yi/progress.png&quot;) no-repeat scroll -38px 0px;"
               class="stepEle"><span class="step">4</span></i>

            <p>反馈Offer</p>

            <div class="tip fourth-tip" style="display: none;">
                反馈Offer，可以方便顾问辅助你做进一步分析决策。
            </div>
        </div>
    </div>
    <h2>简单回答几个问题，完成<span>报名<span></span></span></h2>

    <form id="beatHome" name="form" method="post" action="{{url('beatPro')}}">
        <input id="resubmitToken" name="_token" value="{{csrf_token()}}" type="hidden">

        <div class="user">
            <label for="userName">称呼</label>

            <div class="s-clearfix">
                <div class="input-wrapper userName-wrapper">
                    <input data-tip-title="称呼" data-tip-content="请填写你的真实姓名。当你接受HR的邀约前，真实姓名对他们不可见。" name="userName"
                           id="userName" placeholder="真实姓名" class="tip-show" type="text">

                    <div class="error-tip">请填写</div>
                </div>
                <div class="input-wrapper identify-input-wrapper">
                    <div class="select-wrapper identify-select-wrapper">
                        <select name="beatSex" id=""
                                class="input select-title select-click select-wrapper-default identity-input tip-show">
                            <option value="">--请选择--</option>
                            <option value="1">先生</option>
                            <option value="0">女士</option>
                        </select>
                    </div>
                    {{--<div class="error-tip">请选择</div>--}}
                </div>
            </div>
        </div>

        <div class="input-wrapper"><label>期望职位</label>
            <!--<ul class="radio-wrapper col-5">-->
            <ul id="tipshow" class="radio-wrapper radio col-5 tip-show"
                data-property="1">
                <li><label for="field1">技术</label><input name="field" id="field1" value="1" type="radio"></li>
                <li><label for="field2">产品</label><input name="field" id="field2" value="2" type="radio"></li>
                <li><label for="field3">设计</label><input name="field" id="field3" value="3" type="radio"></li>
                <li><label for="field4">运营</label><input name="field" id="field4" value="4" type="radio"></li>
            </ul>
            <diy id="diy">
                <!-- 技术 -->
                <ul class="radio-techology-content radio-content">
                    <li>
                        <input name="professional_content[]" value="Java工程师" type="checkbox">
                        <label class="radio-expectPosition">Java工程师</label>
                    </li>
                    <li>
                        <input name="professional_content[]" value="PHP工程师" type="checkbox">
                        <label class="radio-expectPosition">PHP工程师</label>
                    </li>
                    <li>
                        <input name="professional_content[]" value="Python工程师" type="checkbox">
                        <label class="radio-expectPosition">Python工程师</label>
                    </li>
                    <li>
                        <input name="professional_content[]" value="前端工程师" type="checkbox">
                        <label class="radio-expectPosition">前端工程师</label>
                    </li>
                    <li>
                        <input name="professional_content[]" value="C/C++工程师" type="checkbox">
                        <label class="radio-expectPosition">C/C++工程师</label>
                    </li>
                    <li>
                        <input name="professional_content[]" value="Ruby工程师" type="checkbox">
                        <label class="radio-expectPosition">Ruby工程师</label>
                    </li>
                    <li>
                        <input name="professional_content[]" value=".Net工程师" type="checkbox">
                        <label class="radio-expectPosition">.Net工程师</label>
                    </li>
                    <li>
                        <input name="professional_content[]" value="C#工程师" type="checkbox">
                        <label class="radio-expectPosition">C#工程师</label>
                    </li>
                    <li>
                        <input name="professional_content[]" value="Node.js工程师" type="checkbox">
                        <label class="radio-expectPosition">Node.js工程师</label>
                    </li>
                    <li>
                        <input name="professional_content[]" value="数据挖掘工程师" type="checkbox">
                        <label class="radio-expectPosition">数据挖掘工程师</label>
                    </li>
                    <li>
                        <input name="professional_content[]" value="搜索算法工程师" type="checkbox">
                        <label class="radio-expectPosition">搜索算法工程师</label>
                    </li>
                    <li>
                        <input name="professional_content[]" value="全栈工程师" type="checkbox">
                        <label class="radio-expectPosition">全栈工程师</label>
                    </li>
                    <li>
                        <input name="professional_content[]" value="Android工程师" type="checkbox">
                        <label class="radio-expectPosition">Android工程师</label>
                    </li>
                    <li>
                        <input name="professional_content[]" value="iOS工程师" type="checkbox">
                        <label class="radio-expectPosition">iOS工程师</label>
                    </li>
                    <li>
                        <input name="professional_content[]" value="技术经理" type="checkbox">
                        <label class="radio-expectPosition">技术经理</label>
                    </li>
                    <li>
                        <input name="professional_content[]" value="技术总监" type="checkbox">
                        <label class="radio-expectPosition">技术总监</label>
                    </li>
                    <li>
                        <input name="professional_content[]" value="架构师" type="checkbox">
                        <label class="radio-expectPosition">架构师</label>
                    </li>
                    <li>
                        <input name="professional_content[]" value="CTO" type="checkbox">
                        <label class="radio-expectPosition">CTO</label>
                    </li>
                    <li>
                        <input name="professional_content[]" value="项目经理" type="checkbox">
                        <label class="radio-expectPosition">项目经理</label>
                    </li>
                    <li>
                        <input name="professional_content[]" value="安全工程师" type="checkbox">
                        <label class="radio-expectPosition">安全工程师</label>
                    </li>
                    <li>
                        <input name="professional_content[]" value="Go工程师" type="checkbox">
                        <label class="radio-expectPosition">Go工程师</label>
                    </li>
                    <li>
                        <input name="professional_content[]" value="Scala工程师" type="checkbox">
                        <label class="radio-expectPosition">Scala工程师</label>
                    </li>
                    <li>
                        <input name="professional_content[]" value="测试工程师" type="checkbox">
                        <label class="radio-expectPosition">测试工程师</label>
                    </li>
                    <li>
                        <input name="professional_content[]" value="运维" type="checkbox">
                        <label class="radio-expectPosition">运维</label>
                    </li>
                    <li>
                        <input name="professional_content[]" value="DBA" type="checkbox">
                        <label class="radio-expectPosition">DBA</label>
                    </li>
                    <li>
                        <input name="professional_content[]" value="游戏开发" type="checkbox">
                        <label class="radio-expectPosition">游戏开发</label>
                    </li>
                    <li>
                        <input name="professional_content[]" value="后端开发" type="checkbox">
                        <label class="radio-expectPosition">后端开发</label>
                    </li>
                    <li>
                        <input name="professional_content[]" value="移动开发" type="checkbox">
                        <label class="radio-expectPosition">移动开发</label>
                    </li>
                </ul>
                <!-- 产品 -->
                <ul class="radio-production-content radio-content ">
                    <li>
                        <input name="professional_content[]" value="产品经理" type="checkbox">
                        <label class="radio-expectPosition">产品经理</label>
                    </li>
                    <li>
                        <input name="professional_content[]" value="移动产品经理" type="checkbox">
                        <label class="radio-expectPosition">移动产品经理</label>
                    </li>
                    <li>
                        <input name="professional_content[]" value="产品总监" type="checkbox">
                        <label class="radio-expectPosition">产品总监</label>
                    </li>
                    <li>
                        <input name="professional_content[]" value="游戏策划" type="checkbox">
                        <label class="radio-expectPosition">游戏策划</label>
                    </li>
                </ul>
                <!-- 设计 -->
                <ul class="radio-design-content radio-content ">
                    <li>
                        <input name="professional_content[]" value="视觉设计师" type="checkbox">
                        <label class="radio-expectPosition">视觉设计师</label>
                    </li>
                    <li>
                        <input name="professional_content[]" value="交互设计师" type="checkbox">
                        <label class="radio-expectPosition">交互设计师</label>
                    </li>
                    <li>
                        <input name="professional_content[]" value="品牌设计师" type="checkbox">
                        <label class="radio-expectPosition">品牌设计师</label>
                    </li>
                    <li>
                        <input name="professional_content[]" value="平面设计师" type="checkbox">
                        <label class="radio-expectPosition">平面设计师</label>
                    </li>
                    <li>
                        <input name="professional_content[]" value="用户研究" type="checkbox">
                        <label class="radio-expectPosition">用户研究</label>
                    </li>
                    <li>
                        <input name="professional_content[]" value="游戏设计" type="checkbox">
                        <label class="radio-expectPosition">游戏设计</label>
                    </li>
                    <li>
                        <input name="professional_content[]" value="设计总监" type="checkbox">
                        <label class="radio-expectPosition">设计总监</label>
                    </li>
                </ul>
                <!-- 运营 -->
                <ul class="radio-operating-content radio-content ">
                    <li>
                        <input name="professional_content[]" value="内容运营" type="checkbox">
                        <label class="radio-expectPosition">内容运营</label>
                    </li>
                    <li>
                        <input name="professional_content[]" value="产品运营" type="checkbox">
                        <label class="radio-expectPosition">产品运营</label>
                    </li>
                    <li>
                        <input name="professional_content[]" value="用户运营" type="checkbox">
                        <label class="radio-expectPosition">用户运营</label>
                    </li>
                    <li>
                        <input name="professional_content[]" value="活动运营" type="checkbox">
                        <label class="radio-expectPosition">活动运营</label>
                    </li>
                    <li>
                        <input name="professional_content[]" value="数据运营" type="checkbox">
                        <label class="radio-expectPosition">数据运营</label>
                    </li>
                    <li>
                        <input name="professional_content[]" value="新媒体运营" type="checkbox">
                        <label class="radio-expectPosition">新媒体运营</label>
                    </li>
                    <li>
                        <input name="professional_content[]" value="编辑" type="checkbox">
                        <label class="radio-expectPosition">编辑</label>
                    </li>
                    <li>
                        <input name="professional_content[]" value="运营总监" type="checkbox">
                        <label class="radio-expectPosition">运营总监</label>
                    </li>
                </ul>
                <!-- 市场 -->

            </diy>
        </div>


        <div class="input-wrapper">
            <label for="workYear">项目经验</label>

            <div class="select-wrapper ">


                <select name="workYear" id="" class="input select-title select-click select-wrapper-default tip-show">
                    <option value="">--请选择--</option>
                    @for($i=1;$i<10;$i++)

                        <option value="{{$i}}">{{$i}}年</option>

                    @endfor
                    <option value="10">10年以上</option>
                </select>

            </div>
            <font color="red" size="3"><span id="workError"></span></font>

        </div>

        <div class="contact-parent s-clearfix">
            <div class="input-wrapper contact-wrapper">
                <label for="phoneNumber">手机号码<span></span></label>
                <input name="phoneNumber" id="phoneNumber" class="tip-show" type="text">

                <font color="red" size="3"><span id="phoneError"></span> </font>
            </div>
            <div class="input-wrapper verify-input">
                <label for="phone-verify-codes">&nbsp;<span></span></label>
                <input style="ime-mode: disabled;" class="tip-show" name="phoneCodes" id="phoneCodes"
                       placeholder="输入验证码" autocomplete="off" maxlength="6" type="text">

                <font color="red" size="3"><span id="phonecodeError"></span> </font>
            </div>
            <div class="verify-wrapper">
                <input style="height:50px;" type="button" id="phoneCode" class="verify-btn tip-show" value="获取验证码"/>
            </div>
        </div>


        <div class="input-wrapper">
            <label for="expectPosition">邮箱地址</label>
            <input class="inputMailList tip-show" name="email" id="email" autocomplete="off" type="text">

            <font color="red" size="3"><span id="emailError"></span> </font>
        </div>

        <div class="salary-range">
            <label for="salary-range-start">期望月薪</label>

            <div class="s-clearfix">
                <div class="input-wrapper salary-wrapper">
                    <input style="ime-mode: disabled;"
                           name="salary_start" id="salary_start" placeholder="最低期望月薪" class="tip-show" type="text">
                </div>
                <div class="input-follow">&nbsp;k&nbsp;&nbsp;&nbsp;&nbsp;</div>
                <div class="input-wrapper salary-wrapper">
                    <input style="ime-mode: disabled;"
                           name="salary_end" id="salary_end" placeholder="最高期望月薪" class="tip-show" type="text">
                </div>
                <div class="input-follow">&nbsp;k</div>
            </div>
            <font color="red" size="3"><span id="salaryError"></span> </font>
        </div>

        <div class="current-salary">
            <label>当前薪资<span class="mark">（选填）</span></label>

            <div class="s-clearfix">
                <div class="input-wrapper salary-wrapper">
                    <input name="currentSalary" id="currentSalary" placeholder="当前月薪" class="tip-show" type="text">

                    <font color="red" size="3"><span id="currentError"></span> </font>
                </div>
                <div class="input-follow">&nbsp;k&nbsp;&nbsp;&nbsp;&nbsp;</div>
                <div class="input-wrapper salary-wrapper">
                    <input name="paidMonth" id="paidMonth" placeholder="发薪月数" class="tip-show" type="text">

                    <font color="red" size="3"><span id="paidError"></span> </font>
                </div>
                <div class="input-follow">&nbsp;月</div>
            </div>
        </div>


        <div class="input-wrapper">
            <label for="jobIntention">你现在的求职意向？</label>

            <div class="select-wrapper">


                <select name="jobIntention" id="jobIntention"
                        class="input select-title select-click select-wrapper-default tip-show">
                    <option value="">--请选择--</option>
                    <option value="暂不考虑任何新机会">暂不考虑任何新机会</option>
                    <option value="看看自己的行情价">看看自己的行情价</option>
                    <option value="在职，近期会考虑新机会">在职，近期会考虑新机会</option>
                    <option value="已离职，可以立刻上专场">已离职，可以立刻上专场</option>
                </select>

            </div>
            <font color="red" size="3"><span id="jobError"></span> </font>
        </div>


        <div class="input-wrapper self-intro">
            <label for="self-intro-content">自我介绍<span class="self-intro-faq" id="intro_content"></span></label>

            <div class="textarea-wrapper">
                <textarea rows="10" cols="65" id="self_content" name="beat_content" class="tip-show"></textarea>

                <font color="red" size="3"><span id="selfError"></span></font>
            </div>
            <div class="self-intro-demo" style="display: none;">
                <div class="h3">自我介绍参考模板（200字以内）：</div>
                <p>
                    5年Java开发经验，作为技术Leader角色，带15人团队，负责平台架构、业务研发团队管理、项目中技术问题解决、项目进度把控等。熟悉分布式框架Dubbo、缓存技术Redis以及MongoDB，现只关注B轮以上互联网企业新机会，优先考虑车联网行业。</p>
            </div>
        </div>

        <div class="button-wrapper">
            <input id="submit" type="submit" class="submit" value="完成报名"/>
            {{--<a href="javascript:;" id="submit" class="submit">完成报名</a>--}}
        </div>
    </form>
    <div class="m-tip" style="top: 298.2px; display: none; opacity: 0.987958;">
        <div class="light_bulb"></div>
        <div class="tip-content">
            <h3>自我介绍</h3>

            <p>好的自我总结可以让HR更好的了解你，帮助你获得更好的机会。你也可以参考我们给出的模板，50～200字即可。</p>
        </div>
        <div class="tip_shadow"></div>
    </div>
    <div class="hide">
        <div id="check-standard" class="check-standard">
            <ul>
                <li><h3>简历完善</h3> 完整真实的简历是HR了解你的重要途径，也是我们审核的重要依据。请完善简历中的<span class="green">基本信息、教育经历、工作经历、项目经历、作品展示、自我描述</span>等信息。
                </li>
                <li><h3>3年以上相关工作经验</h3>有<span class="green">3年或3年以上</span>期望职位的工作经验。</li>
                <li><h3>互联网技术、产品、设计、运营、市场</h3>我们目前开放互联网<span class="green">技术、产品、设计、运营、市场</span>五类岗位，其它岗位敬请关注一拍后续的动态。
                </li>
                <li><h3>期望城市在北上广深杭成</h3>我们目前服务的城市包含<span class="green">北京、上海、广州、深圳、杭州、成都</span>。如果你期望城市不属于这几个城市，我们目前暂时无法为你提供服务。
                </li>
            </ul>
        </div>
    </div>
    <div class="hide">
        <div id="resume-imperfect" class="resume-imperfect">
            <p class="p1">
                感谢选择校易聘一拍，但目前你的简历不完善，为了让我们能更好的服务你，你需要先完善你的简历<span class="green"></span>等信息后再报名一拍。
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

@include('index.beat.beatFoot')

<script type="text/javascript" src="yi/jq.js"></script>
<script type="text/javascript" src="yi/jquery-validate.js"></script>
<script type="text/javascript" src="yi/my_beat.js"></script>
@include('index.beat.beatJs')

@if(empty($porject))
    <script>
        $(function () {
            $('#cboxOverlay').show();
            $('#colorbox').show();
        })
    </script>
@else
    <script>
        $(function () {
            $('#cboxOverlay').hide();
            $('#colorbox').hide();
        })
    </script>

@endif


<div style="opacity: 0.9; visibility: visible;" id="cboxOverlay"></div>
<div style="display: block; visibility: visible; top: 124px; left: 496px; position: absolute; width: 528px; height: 288px;"
     tabindex="-1" role="dialog" class="" id="colorbox">
    <div style="height: 288px; width: 528px;" id="cboxWrapper">
        <div>
            <div style="float: left;" id="cboxTopLeft"></div>
            <div style="float: left; width: 502px;" id="cboxTopCenter"></div>
            <div style="float: left;" id="cboxTopRight"></div>
        </div>
        <div style="clear: left;">
            <div style="float: left; height: 262px;" id="cboxMiddleLeft"></div>
            <div style="float: left; width: 502px; height: 262px;" id="cboxContent">
                <div style="width: 502px; overflow: auto; height: 218px;" id="cboxLoadedContent">
                    <div id="resume-imperfect" class="resume-imperfect">
                        <p class="p1">
                            感谢选择校易聘一拍，但目前你的简历不完善，为了让我们能更好的服务你，你需要先完善你的简历<span class="green">项目经验</span>等信息后再报名一拍。
                        </p>

                        <p class="p2">
                            如果你的职业方向是技术，请务必完善你的<span class="green">项目经验</span>。
                        </p>

                        <div class="btn">
                            <a href="{{url('resumeList')}}" class="resume-edit-btn">完善我的简历</a>
                        </div>
                    </div>
                </div>
                <div style="float: left; display: block;" id="cboxTitle">简历不完善</div>
                <div style="float: left; display: none;" id="cboxCurrent"></div>
                <button style="display: none;" id="cboxPrevious" type="button"></button>
                <button style="display: none;" id="cboxNext" type="button"></button>
                <button style="display: none;" id="cboxSlideshow"></button>
                <div style="float: left; display: none;" id="cboxLoadingOverlay"></div>
                <div style="float: left; display: none;" id="cboxLoadingGraphic"></div>
            </div>
            <div style="float: left; height: 262px;" id="cboxMiddleRight"></div>
        </div>
        <div style="clear: left;">
            <div style="float: left;" id="cboxBottomLeft"></div>
            <div style="float: left; width: 502px;" id="cboxBottomCenter"></div>
            <div style="float: left;" id="cboxBottomRight"></div>
        </div>
    </div>
    <div style="position: absolute; width: 9999px; visibility: hidden; max-width: none; display: none;"></div>
</div>
</body>
</html>

