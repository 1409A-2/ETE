﻿@extends('index.lar.public')
@section('title', '开通招聘服务')
@section('content')
    <style>.ui-autocomplete {
            max-height: 160px;
            overflow-y: scroll;
        }</style>
    <div id="container">
        <div class="content_mid">
            <!--form-->
            <dl class="c_section c_section_service">
                <dt>
                <h2><em></em>开通招聘服务</h2>
                </dt>
                <dd>
                    <div class="os_step_2"></div>
                    <form class="corp_form" id="companyNameForm">
                        <input type="hidden" value="{{csrf_token()}}" id="resubmitToken">

                        <h3><em class="redstar">*</em>公司全称 <span class="explain">（请输入与公司营业执照一致的公司全称，审核通过后不可更改）</span>
                        </h3>
                        <span role="status" aria-live="polite" class="ui-helper-hidden-accessible">测试公司</span><input
                                type="text" value="" placeholder="请输入与公司营业执照一致的公司全称" name="companyName" id="companyName"
                                class="valid ui-autocomplete-input" autocomplete="off">
                        <input type="submit" value="提 交" id="bindSubmit">
                        <a class="goback" href="h/corpCenter/bindStep1.html?update=1">返回修改邮箱地址</a>
                    </form>
                    <div class="contactus">如有问题，请致电：010-57286997或写信给：<a href="mailto:vivi@lagou.com">vivi@lagou.com</a>，我们会尽快为你解决。
                    </div>
                </dd>
            </dl>
        </div>
        <a rel="nofollow" title="回到顶部" id="backtop"></a>
    </div>
    <div class="dn" id="loadingDiv" style="display: none;"><img width="32" height="32"
                                                                src="style/images/ajax-loader.gif"></div>
    <script src="{{env('APP_HOST')}}/style/js/services.min.js" type="text/javascript"></script>
    <div class="clear"></div>
    <input type="hidden" value="3a9b3124ee0a4adca922f2c9756d1ac1" id="resubmitToken">

@endsection