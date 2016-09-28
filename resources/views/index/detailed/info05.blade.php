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
                    <input type="hidden" name="url" value="{{$url}}" id="url">

                    <h3>公司介绍</h3>
                    <script id="editor" type="text/plain" style="width:620px;height:245px;margin-top:20px;"></script>
                    <textarea placeholder="请分段详细描述公司简介、企业文化等" name="companyProfile" id="companyProfile" style="display: none;">{{$company_data['c_intro']}}</textarea>

                    <div class="word_count" style="display: none;">你还可以输入 <span>1000</span> 字</div>
                    <div class="clear"></div>
                    <input type="button" id="step5Submit" value="保存，完成" class="btn_big fr">
                </form>
            </dd>
        </dl>
    </div>


    <div class="clear"></div>
    <input type="hidden" value="" id="resubmitToken">


@endsection

@section('script')
    <script src="{{env('APP_HOST')}}/style/js/step5.min.js" type="text/javascript"></script>
    <script>

        var ue = UE.getEditor('editor',{
            wordCount:true          //是否开启字数统计
            ,maximumWords:1000
            ,wordCountMsg:"你还可以输入 <font color='red'>{#leave}</font> 字"
        });

        $(function(){
            var _query_hint=$('#query_hint');
            _query_hint.css('display','block');
            setTimeout(function () {
                setContent();
                _query_hint.css('display','none');
            }, 3000);
        });



        function setContent(isAppendTo) {

            ue.setContent("<?php echo $company_data['c_intro']?>", isAppendTo);
        }



    </script>
@endsection
