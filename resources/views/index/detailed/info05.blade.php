@extends('index.lar.public')
@section('title', '公司介绍-招聘服务-拉勾网-最专业的互联网招聘平台')
@section('content')<!-- end #header -->
    <div id="container">

        <div class="content_mid">
            <dl class="c_section c_section_mid">
                <dt>
                <h2><em></em>填写公司信息</h2>
                <a class="c_addjob" href="postOffice"><i></i>发布新职位</a>
                </dt>
                <dd>
                    <div class="c_text">背景深、规模大、发展快、氛围好…用优势吸引求职者吧！</div>
                    <img width="668" height="56" class="c_steps" alt="第五步" src="style/images/step5.png">
                    <!-- action="http://www.lagou.com/c/saveProfile.json" -->
                    <form method="post" action="info5Pro" id="infoForm">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="companyId" value="25927">

                        <h3>公司介绍</h3>
                        <textarea placeholder="请分段详细描述公司简介、企业文化等" name="companyProfile" id="companyProfile"></textarea>

                        <div class="word_count">你还可以输入 <span>1000</span> 字</div>
                        <div class="clear"></div>
                        <input type="button" id="step5Submit" value="保存，完成" class="btn_big fr">
                    </form>
                </dd>
            </dl>
        </div>
        <script src="style/js/step5.min.js" type="text/javascript"></script>

        <div class="clear"></div>
        <input type="hidden" value="" id="resubmitToken">
@endsection

