@extends('index.lar.public')
@section('title', '公司标签-招聘服务-拉勾网-最专业的互联网招聘平台')
@section('content')
    <div id="container">

        <div class="content_mid">
            <dl class="c_section c_section_mid">
                <dt>
                <h2><em></em>填写公司信息</h2>
                <a class="c_addjob" href="postOffice"><i></i>发布新职位</a>
                </dt>
                <dd id="step2Form">
                    <div class="c_text">简短明了的标签信息让求职者更加方便检索，更快找到你们！</div>
                    <img width="668" height="56" class="c_steps" alt="第二步" src="style/images/step2.png">

                    <h3>已添加标签</h3>
                    <ul class="reset" id="labels">
                        @foreach($lab_data as $val)
                        <li>
                            <span>{{$val['lab_name']}}</span>
                            <i class=""></i>
                        </li>
                            <script>
                                $(function () {
                                    $('.reset li[li="{{$val['lab_name']}}"]').attr('class','selected');
                                })
                            </script>
                        @endforeach
                    </ul>

                    <input type="text" placeholder="请输入自定义标签" name="label" id="label" style="height: 30px;">
                    <input type="submit" value="贴上" id="add_label">

                    <div class="clear"></div>

                    <div id="box_labels">
                        <dl>
                <dt>薪酬激励</dt>
                <dd>
                    <ul class="reset">
                        <li li="年终分红">年终分红</li>
                        <li li="绩效奖金">绩效奖金</li>
                        <li li="股票期权">股票期权</li>
                        <li li="专项奖金">专项奖金</li>
                        <li li="年底双薪">年底双薪</li>
                    </ul>
                </dd>
            </dl>
            <dl>
                <dt>员工福利</dt>
                <dd>
                    <ul class="reset">
                        <li li="五险一金">五险一金</li>
                        <li li="通讯津贴">通讯津贴</li>
                        <li li="交通补助">交通补助</li>
                        <li li="带薪年假">带薪年假</li>
                    </ul>
                </dd>
            </dl>
            <dl>
                <dt>员工关怀</dt>
                <dd>
                    <ul class="reset">
                        <li li="免费班车">免费班车</li>
                        <li li="节日礼物">节日礼物</li>
                        <li li="年度旅游">年度旅游</li>
                        <li li="弹性工作">弹性工作</li>
                        <li li="定期体检">定期体检</li>
                        <li li="午餐补助">午餐补助</li>
                    </ul>
                </dd>
            </dl>
            <dl>
                <dt>其他</dt>
                <dd>
                    <ul class="reset">
                        <li li="岗位晋升">岗位晋升</li>
                        <li li="技能培训">技能培训</li>
                        <li li="管理规范">管理规范</li>
                        <li li="扁平管理">扁平管理</li>
                        <li li="领导好">领导好</li>
                        <li li="美女多">美女多</li>
                        <li li="帅哥多">帅哥多</li>
                    </ul>
                </dd>
            </dl>
        </div>
        <input type="hidden" id="companyId" name="companyId" value="25927">
        <input type="hidden" id="_token" name="_token" value="{{csrf_token()}}">
        <input type="hidden" id="url" name="url" value="{{$url}}">
        <input type="button" value="保存，下一步" id="step2Submit" class="btn_big fr">
        <a class="btn_cancel fr" href="detailed_info3">跳过</a>

        </dd>
        </dl>
    </div>

    <script src="style/js/step2.min.js" type="text/javascript"></script>
    <div class="clear"></div>
    <input type="hidden" value="" id="resubmitToken">
    <!-- end #container -->
@endsection