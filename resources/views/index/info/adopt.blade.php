@extends('index.lar.public')
@section('title', '开通成功')
@section('content')
    <div id="container">

        <div class="content_mid">

            <!--发布职位成功 -->
            <dl class="c_section c_section_mid">
                <dt>
                <h2><em></em>开通招聘服务</h2>
                </dt>
                <dd class="c_notice">
                    <h5>恭喜你，您已经成功通过验证开通公司，请到验证页面刷新</h5>
                </dd>
            </dl>
        </div>

        <div class="clear"></div>
        <input type="hidden" value="" id="resubmitToken">
        <a rel="nofollow" title="回到顶部" id="backtop"></a>
    </div><!-- end #container -->
@endsection