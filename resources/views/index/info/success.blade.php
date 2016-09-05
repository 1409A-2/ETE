@extends('index.lar.public')
@section('title', '开通招聘服务')
@section('content')
<div id="container">

    <div class="content_mid">

        <!--发布职位成功 -->
        <dl class="c_section c_section_mid">
            <dt>
            <h2><em></em>开通招聘服务</h2>
            </dt>
            <dd class="c_notice">
                <h4>恭喜你，您已经成功开通公司</h4>
                <a class="greylink" href="detailed">完善公司信息，发布职位</a>
                <a class="greylink" href="/"> 进入主页</a>
            </dd>
        </dl>
    </div>

    <div class="clear"></div>
    <input type="hidden" value="" id="resubmitToken">
    <a rel="nofollow" title="回到顶部" id="backtop"></a>
</div><!-- end #container -->
@endsection