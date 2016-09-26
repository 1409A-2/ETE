@extends('index.lar.public')
@section('title', '邮箱验证-校易聘')
@section('content')<!-- end #header -->
<div id="container">
    <div class="clearfix">
        <div class="content_l">
            <dl class="c_collections">
                <dt>
                    <h1><em></em>邮箱验证</h1>
                </dt>
                <dd>
                    <div class="open_service_success">
                        <h3>请检查邮箱发送：{{session('u_email')}}</h3><button style="cursor: pointer;" onclick="sendEamil()"><a style="color: red;" href="javascript:void(0)">发送验证邮件</a></button>
                        <h4>请登录邮箱点击邮件内的链接，验证后即可正常访问我们的网站！</h4>
                        <!-- <div class="emailus">
                            我们已将主题为“开通招聘服务信息确认”邮件发送至邮箱：<a class="f18"></a> <br />
                            请点击邮件内的链接完成确认，确认后即可发布职位
                        </div> -->
                    </div>
                    <div class="open_service_success_btm">
                        <h5>没有收到确认邮件，怎么办？</h5>

                        <div class="contacttip">
                            1.邮箱地址填写错误？ <a href="/info?update=1">重新填写邮箱地址</a> <br>
                            2.看看是否在邮箱的垃圾邮件、广告邮件目录里<br>
                            3.稍等几分钟，若还未收到验证邮件， <a id="resendOpenService" href="javascript:void(0)" onclick="sendEamil()">重新发送验证邮件</a> <br>
                            4.还未收到验证邮件，请联系我们，邮箱：vivi@lagou.com 电话：010-57286997
                        </div>
                        <!-- <span id="tip" style="display:none; float:right; margin:-60px 0 0 -20px;">验证邮件发送成功！</span> -->
                    </div>
                </dd>
            </dl>
        </div>
        <a rel="nofollow" title="回到顶部" id="backtop" style="display: none;"></a>
    </div>

    <!-- ----------------------------------- 弹窗lightbox --------------------------------------- -->
    <div id="success" style="display:none;">
        <!--
            激活邮箱
            验证邮件发送成功弹窗
        -->
        <div class="popup" id="resend_success">
            <p>我们已将激活邮件发送至：<a>{{session('u_email')}}</a>，请进入邮件内的链接完成验证。</p>
        </div><!--/#resend_success-->

    </div>
    <!-- ----------------------------------- end --------------------------------------- -->

    <script src="style/js/services.min.js" type="text/javascript"></script>
    <div class="clear"></div>
    <input type="hidden" value="de66a3b79bed40df9c0c2a470d356435" id="resubmitToken">

    <!-- end #container -->
    <script>
        function sendEamil(){
            var _query_hint=$('#query_hint');
            _query_hint.css('display','block');

            $.ajax({
                type : 'get',
                url : 'checkEamil',
                success : function (e) {
                    _query_hint.css('display','none');
                   if(e==1) {
                       alert("我们已将激活邮件发送至：{{session('u_email')}}，请进入邮件内的链接完成验证。");
                    } else if (e==0) {
                        alert('发送异常，请重新发送');
                    }
                }
            });
        }
    </script>
@endsection