@extends('index.lar.public')
@section('title', '公司列表-校易聘')
@section('content')<!-- end #header -->
<div id="container" style="padding-left:320px">

    <div class="clearfix">
        <div class="content_l">
        <div id="search_box">
            <ul id="searchType">
                <li data-searchtype="1" class="type_selected">职位</li>
                <li data-searchtype="4">公司</li>
            </ul>
            <div class="searchtype_arrow" style="z-index: 1;"></div>
            <input type="text" id="search_input" style="height: 20px;" name="i_name"   tabindex="1" value=""  placeholder="请输入职位名称，如：产品经理"  />
            <input type="hidden" value="" id="education">
            <input type="hidden" value="" id="k">
            <input type="submit" id="search_button" value="搜索" />
           
        </div>
        <style>
            .ui-autocomplete{width:488px;background:#fafafa !important;position: relative;z-index:10;border: 2px solid #91cebe;}
            .ui-autocomplete-category{font-size:16px;color:#999;width:50px;position: absolute;z-index:11; right: 0px;/*top: 6px; */text-align:center;border-top: 1px dashed #e5e5e5;padding:5px 0;}
            .ui-menu-item{ *width:439px;vertical-align: middle;position: relative;margin: 0px;margin-right: 50px !important;background:#fff;border-right: 1px dashed #ededed;}
            .ui-menu-item a{display:block;overflow:hidden;}
        </style>
        <dl class="hotSearch">
           <!--  <dt>热门搜索：</dt>
            <dd><a href="list.htmlJava?labelWords=label&city=">Java</a></dd>
            <dd><a href="list.htmlPHP?labelWords=label&city=">PHP</a></dd>
            <dd><a href="list.htmlAndroid?labelWords=label&city=">Android</a></dd>
            <dd><a href="list.htmliOS?labelWords=label&city=">iOS</a></dd>
            <dd><a href="list.html前端?labelWords=label&city=">前端</a></dd>
            <dd><a href="list.html产品经理?labelWords=label&city=">产品经理</a></dd>
            <dd><a href="list.htmlUI?labelWords=label&city=">UI</a></dd>
            <dd><a href="list.html运营?labelWords=label&city=">运营</a></dd>
            <dd><a href="list.htmlBD?labelWords=label&city=">BD</a></dd>
            <dd><a href="list.html?gx=实习&city=">实习</a></dd> -->
        </dl>
        <script type="text/javascript" src="style/js/search.min.js"></script>
            <form method="get" action="jump">
                <input type="hidden" id="city" name="city" value="全国"/>
                <input type="hidden" id="fs" name="fs" value=""/>
                <input type="hidden" id="ifs" name="ifs" value=""/>
                <input type="hidden" id="ol" name="ol" value=""/>
                <dl class="hc_tag">
                    <dd>
                        <dl id="industry">
                    <dt>行业领域：</dt>
                    <dd>
                        <a href="jump?page=1" @if($industry=='')class="current"@endif>全部</a>
                        <a href="javascript:void(0)">移动互联网</a>
                        <a href="javascript:void(0)">电子商务</a>
                        <a href="javascript:void(0)">社交</a>
                        <a href="javascript:void(0)">企业服务</a>
                        <a href="javascript:void(0)">O2O</a>
                        <a href="javascript:void(0)">教育</a>
                        <a href="javascript:void(0)">文化艺术</a>
                        <a href="javascript:void(0)">游戏</a>
                        <a href="javascript:void(0)">在线旅游</a>
                        <a href="javascript:void(0)">金融互联网</a>
                        <a href="javascript:void(0)">健康医疗</a>
                        <a href="javascript:void(0)">生活服务</a>
                        <a href="javascript:void(0)">硬件</a>
                        <a href="javascript:void(0)">搜索</a>
                        <a href="javascript:void(0)">安全</a>
                        <a href="javascript:void(0)">运动体育</a>
                        <a href="javascript:void(0)">云计算\大数据</a>
                        <a href="javascript:void(0)">移动广告</a>
                        <a href="javascript:void(0)">社会化营销</a>
                        <a href="javascript:void(0)">视频多媒体</a>
                        <a href="javascript:void(0)">媒体</a>
                        <a href="javascript:void(0)">智能家居</a>
                        <a href="javascript:void(0)">智能电视</a>
                        <a href="javascript:void(0)">分类信息</a>
                        <a href="javascript:void(0)">招聘</a>

                    </dd>
                </dl>
                </dd>
                </dl>
                <ul class="hc_list reset">
                    @foreach($company_data as $key=>$val)
                    <li @if($key%3==0)style="clear:both;"@endif>
                        <a href="companyinfo?c_id={{$val['c_id']}}" target="_blank">
                            <h3 title="{{$val['c_shorthand']}}">{{$val['c_shorthand']}}</h3>

                            <div class="comLogo" style="height: 190px;width: 190px;">
                                <img src="{{env("APP_HOST").$val['c_logo']}}" width="190" height="190" alt="CCIC"/>
                                <ul>
                                    @foreach($val['industry'] as $vv)
                                    <li>{{$vv}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </a>
                        @if($val['release_data'])
                            @foreach($val['release_data'] as $release)
                        <a href="postPreview?re_id={{$release['re_id']}}" target="_blank"> {{$release['re_name']}}</a>
                            @endforeach
                        @endif

                        <ul class="reset ctags">
                            @foreach($val['lable_data'] as $vv)
                            <li>{{$vv['lab_name']}}</li>
                            @endforeach
                        </ul>

                    </li>
                    @endforeach
                </ul>

                <div class="Pagination"></div>
            </form>
            <div class="Pagination myself">
                @if($page==1)
                    <span class="disabled" title="首页" >首页 </span>
                    <span class="disabled" title="上一页" >上一页 </span>
                @else
                    <a title="1" href="companylist?page={{1}}&industry={{$industry}}">首页</a>
                    <a title="{{$page-1}}" href="companylist?page={{$page-1}}&industry={{$industry}}">上一页 </a>
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
                        <a title="{{$i}}" href="companylist?page={{$i}}&industry={{$industry}}">{{$i}}</a>
                    @endif
                @endfor
                @if($page==$pages)
                    <span class="disabled" title="下一页" >下一页 </span>
                    <span class="disabled" title="尾页" >尾页 </span>
                @else
                    <a title="{{$page+1}}" href="companylist?page={{$page+1}}&industry={{$industry}}">下一页 </a>
                    <a title="30" href="companylist?page={{$pages}}&industry={{$industry}}">尾页</a>
                @endif
            </div>
        </div>
      
    </div>

    <input type="hidden" value="" name="userid" id="userid"/>

    {{--<script type="text/javascript" src="style/js/company_list.min.js"></script>--}}

    <div class="clear"></div>
    <script>
        $(function(){
            $('dl dd a').click(function () {
                var industry = $(this).html();
                var c_name = "{{$c_name}}";
                if(industry=='全部'){
                    return
                }
                location.href='jump?industry='+industry+"&c_name="+c_name;
            });

            var industry=$('#industry dd a');
            var _industry="{{$industry}}";
            for(var i=0;i<industry.length;i++){
                if(industry.eq(i).html()==_industry){
                    industry.eq(i).attr('class','current');
                }
            }
        })
    </script>
@endsection