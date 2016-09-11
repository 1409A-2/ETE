@extends('index.lar.public')
@section('title','前端开发全国-职位搜索-拉勾网-最专业的互联网招聘平台')
@section('content')
<script>
    $(function(){
        $('.moery').click(function(){
            k=$(this).html();
            education=$('#education').val();
            i_name=$('#i_name').val();
            location.href="jump?k="+k+"&i_name="+i_name+"&education="+education;      
        })
        $('.education').click(function(){
             education=$(this).html();
            k=$('#k').val();
            i_name=$('#i_name').val();
            location.href="jump?k="+k+"&i_name="+i_name+"&education="+education;      
        })
    })
</script>
<input type="hidden" value="{{$i_name}}" id="i_name">
<input type="hidden" value="{{$education}}" id="education">
<input type="hidden" value="{{$k}}" id="k">
    <div id="container">
        <div id="sidebar">
<div id="options" class="greybg">
    <dl class="">
        <dt>月薪范围 <em class=""></em></dt>
        <dd style="display: block;">
            <div class="moery">2k以下</div>
            <div class="moery">2k-5k</div>
            <div class="moery">5k-10k</div>
            <div class="moery">10k-15k</div>
            <div class="moery">15k-25k</div>
            <div class="moery">25k-50k</div>
            <div class="moery">50k以上</div>
        </dd>
    </dl>
    <dl class="">
        <dt>最低学历 <em class=""></em></dt>
        <dd style="display: block;">
            <div class="education">不限</div>
            <div class="education">大专</div>
            <div class="education">本科</div>
            <div class="education">硕士</div>
            <div class="education">博士</div>
        </dd>
    </dl>
</div>

<!-- QQ群 -->
<div class="qq_group">
    加入<span>前端</span>QQ群
    <div class="f18">跟同行聊聊</div>
    <p>160541839</p>
</div>

<!-- 对外合作广告位  -->
<a href="http://www.w3cplus.com/" target="_blank" class="partnersAd">
    <img src="style/images/w3cplus.png" width="230" height="80" alt="w3cplus" />
</a>
<a href="" target="_blank" class="partnersAd">
    <img src="style/images/jquery_school.jpg" width="230" height="80" alt="JQ学校" />
</a>
<a href="http://linux.cn/" target="_blank" class="partnersAd">
    <img src="style/images/linuxcn.png" width="230" height="80" alt="Linux中文社区"  />
</a>
<a href="http://zt.zhubajie.com/zt/makesite? utm_source=lagou.com&utm_medium=referral&utm_campaign=BD-yl" target="_blank" class="partnersAd">
    <img src="style/images/zhubajie.jpg" width="230" height="80" alt="猪八戒" />
</a>
<a href="http://www.imooc.com" target="_blank" class="partnersAd">
    <img src="style/images/muke.jpg" width="230" height="80" alt="幕课网" />
</a>
<!-- 	            <a href="http://www.osforce.cn/" target="_blank" class="partnersAd">
<img src="style/images/osf-lg.jpg" width="230" height="80" alt="开源力量"  />
</a>
-->
</div>
<div class="content">
    <div id="search_box">
            <ul id="searchType">
                <li data-searchtype="1" class="type_selected">职位</li>
                <li data-searchtype="4">公司</li>
            </ul>
            <div class="searchtype_arrow"></div>
            <input type="text" id="search_input" name = "kd"  tabindex="1" value="{{$i_name}}"  placeholder="请输入职位名称，如：产品经理"  />

            <input type="submit" id="search_button" value="搜索" />
    </div>
    <style>
        .ui-autocomplete{width:488px;background:#fafafa !important;position: relative;z-index:10;border: 2px solid #91cebe;}
        .ui-autocomplete-category{font-size:16px;color:#999;width:50px;position: absolute;z-index:11; right: 0px;/*top: 6px; */text-align:center;border-top: 1px dashed #e5e5e5;padding:5px 0;}
        .ui-menu-item{ *width:439px;vertical-align: middle;position: relative;margin: 0px;margin-right: 50px !important;background:#fff;border-right: 1px dashed #ededed;}
        .ui-menu-item a{display:block;overflow:hidden;}
    </style>
    <script type="text/javascript" src="style/js/search.min.js"></script>
    <dl class="hotSearch">
        {{--<dt>热门搜索：</dt>
        <dd><a href="list.htmlJava?labelWords=label&city=全国">Java</a></dd>
        <dd><a href="list.htmlPHP?labelWords=label&city=全国">PHP</a></dd>
        <dd><a href="list.htmlAndroid?labelWords=label&city=全国">Android</a></dd>
        <dd><a href="list.htmliOS?labelWords=label&city=全国">iOS</a></dd>
        <dd><a href="list.html前端?labelWords=label&city=全国">前端</a></dd>
        <dd><a href="list.html产品经理?labelWords=label&city=全国">产品经理</a></dd>
        <dd><a href="list.htmlUI?labelWords=label&city=全国">UI</a></dd>
        <dd><a href="list.html运营?labelWords=label&city=全国">运营</a></dd>
        <dd><a href="list.htmlBD?labelWords=label&city=全国">BD</a></dd>
        <dd><a href="list.html?gx=实习&city=全国">实习</a></dd>--}}
    </dl>

    <div id="tip_didi" class="dn">
        <span>亲，“嘀嘀打车”已更名为“滴滴打车”了哦，我们已帮您自动跳转~</span>
        <a href="javascript:;">我知道了</a>
    </div>

    <ul class="hot_pos reset">
     @foreach($arr as $v)
        <li class="odd clearfix">
            <div class="hot_pos_l">
                <div class="mb10">
                    <a href="postPreview?re_id={{$v['re_id']}}" title="{{$v['re_name']}}" target="_blank">{{$v['re_name']}}</a>
                    &nbsp;
                    <span class="c9">{{$v['re_address']}}</span>
                </div>
                <span><em class="c7">月薪：{{$v['re_salarymin']}}-{{$v['re_salarymax']}}k</em></span>
                <span><em class="c7">最低学历：{{$v['re_education']}}</em></span>
                <br />
                <span><em class="c7">职位诱惑:{{$v['re_desc']}}</em></span>
                <br />
                <span>1天前发布</span>
            </div>
        
            <div class="hot_pos_r">
                <div class="apply">
       
                    <a href="{{url('remusePro')}}/{{$v['re_id']}}" target="_blank">投个简历</a>

                </div>
                <div class="mb10"><a href="h/c/1712.html" title="" target="_blank">{{$v['re_name']}}</a></div>
                <span><em class="c7">领域： </em>移动互联网 ,健康医疗</span>
                <span><em class="c7">创始人：</em> Lu</span>
                <br />
                <span><em class="c7">阶段： </em>成长型(A轮)</span>
                <span><em class="c7">规模： </em>15-50人</span>
                <ul class="companyTags reset">
                    <li>五险一金</li>
                    <li>股票期权</li>
                    <li>年度旅游</li>
                </ul>
            </div>
                     <div class="hot_pos_l"> 
        </li> 
        @endforeach    
    </ul>
    <div class="Pagination myself">

        @if($page==1)
            <span class="disabled" title="首页" >首页 </span>
            <span class="disabled" title="上一页" >上一页 </span>
        @else
            <a title="1" href="jump?i_name={{$i_name}}&page={{1}}&k={{$k}}">首页</a>
            <a title="{{$page-1}}" href="jump?i_name={{$i_name}}&page={{$page-1}}&k={{$k}}">上一页 </a>
        @endif
        @for($i=($page-2);$i<=($page+2);$i++)
            @if($i<1)
            <?php continue  ?>
            @endif
            @if($i>$pages)
            <?php continue  ?>
            @endif
            @if($i==$page)
            <span class="current" title="{{$i}}">{{$i}}</span>
            @else
            <a title="{{$i}}" href="jump?i_name={{$i_name}}&page={{$i}}&k={{$k}}">{{$i}}</a>
            @endif
        @endfor
        @if($page==$pages)
            <span class="disabled" title="下一页" >下一页 </span>
            <span class="disabled" title="尾页" >尾页 </span>
        @else
            <a title="{{$page+1}}" href="jump?i_name={{$i_name}}&page={{$page+1}}&k={{$k}}">下一页 </a>
            <a title="30" href="jump?i_name={{$i_name}}&page={{$pages}}&k={{$k}}">尾页</a>
        @endif
        
    </div>  
    <div class="Pagination"></div>
</div>



<div class="clear"></div>
<input type="hidden" id="resubmitToken" value="" />

@endsection