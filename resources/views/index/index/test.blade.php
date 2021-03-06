@extends('index.lar.public')
@section('title', '校易聘-最专业的互联网招聘平台')
@section('content')
    <div id="container">
        <div id="sidebar">
        <div class="mainNavs">
        @foreach($nav_industry as $key => $val)
            <div class="menu_box">
                <div class="menu_main">                    
                    <h2>{{$val['i_name']}} <span></span></h2>
                    @foreach($two_industry[$key] as $k => $v)
                        <a href="{{url('jump')}}?i_name={{$v['i_name']}}">{{$v['i_name']}} </a>
                    @endforeach                   
                </div>
                <div class="menu_sub dn">
                    @foreach($industry as $key => $vals)
                        @if($vals['i_pid']==$val['i_id'])
                        <dl class="reset">
                                <dt style="width: 90px;">
                                    <a href="{{url('jump')}}?i_name={{$vals['i_name']}}">
                                        {{$vals['i_name']}}
                                    </a>
                                </dt>
                                <dd>
                                      @foreach($industry as $key => $va)
                                        @if($va['i_pid']==$vals['i_id'])
                                            <a href="{{url('jump')}}?i_name={{$va['i_name']}}">{{$va['i_name']}}</a>
                                        @endif
                                      @endforeach  
                                </dd>
                        </dl>
                        @endif
                    @endforeach
                </div>
            </div>
        @endforeach

        </div>
        <a class="subscribe" href="subscribe" >订阅职位</a>
            </div>

        <div class="content">
        <div id="search_box">
        <form action="jump" method="get">
            <ul id="searchType">
                <li data-searchtype="1" class="type_selected">职位</li>
                <li data-searchtype="4">公司</li>
            </ul>
            <div class="searchtype_arrow" style="z-index: 1;"></div>
            <input type="hidden" id="type_selected" value="1" name="type_selected">
            <input type="text" id="search_input" style="height: 37px;" name="i_name"   tabindex="1" value=""  placeholder="请输入职位名称，如：产品经理"  />
            <input type="hidden" value="" id="education">
            <input type="hidden" value="" id="k">
            <input type="submit" id="search_button" value="搜索" />
          </form> 
        </div>
      
      

        <style>
            .ui-autocomplete{width:488px;background:#fafafa !important;position: relative;z-index:10;border: 2px solid #91cebe;}
            .ui-autocomplete-category{font-size:16px;color:#999;width:50px;position: absolute;z-index:11; right: 0px;/*top: 6px; */text-align:center;border-top: 1px dashed #e5e5e5;padding:5px 0;}
            .ui-menu-item{ *width:439px;vertical-align: middle;position: relative;margin: 0px;margin-right: 50px !important;background:#fff;border-right: 1px dashed #ededed;}
            .ui-menu-item a{display:block;overflow:hidden;}
        </style>
        <script type="text/javascript" src="style/js/search.min.js"></script>
        <dl class="hotSearch">
           {{-- <dt>热门搜索：</dt>
            <dd><a href="list.htmlJava?labelWords=label&city=">Java</a></dd>
            <dd><a href="list.htmlPHP?labelWords=label&city=">PHP</a></dd>
            <dd><a href="list.htmlAndroid?labelWords=label&city=">Android</a></dd>
            <dd><a href="list.htmliOS?labelWords=label&city=">iOS</a></dd>
            <dd><a href="list.html前端?labelWords=label&city=">前端</a></dd>
            <dd><a href="list.html产品经理?labelWords=label&city=">产品经理</a></dd>
            <dd><a href="list.htmlUI?labelWords=label&city=">UI</a></dd>
            <dd><a href="list.html运营?labelWords=label&city=">运营</a></dd>
            <dd><a href="list.htmlBD?labelWords=label&city=">BD</a></dd>
            <dd><a href="list.html?gx=实习&city=">实习</a></dd>--}}
        </dl>
        <div id="home_banner">
            <ul class="banner_bg">
                @foreach($carousel as $key => $val)
                <li  class="banner_bg_{{$key+1}}" >
                    <a href="{{$val['car_url']}}" target="_blank"><img src="{{env('APP_HOST').$val['car_img']}}" width="612" height="160" alt="{{$val['car_name']}}" /></a>
                </li>
                @endforeach
                {{--<li  class="banner_bg_2" >
                    <a href="h/subject/s_worldcup.html?utm_source=DH__lagou&utm_medium=home&utm_campaign=wc" target="_blank"><img src="style/images/c9d8a0756d1442caa328adcf28a38857.jpg" width="612" height="160" alt="世界杯放假看球，老板我也要！" /></a>
                </li>
                <li  class="banner_bg_3" >
                    <a href="h/subject/s_xiamen.html?utm_source=DH__lagou&utm_medium=home&utm_campaign=xiamen" target="_blank"><img src="style/images/d03110162390422bb97cebc7fd2ab586.jpg" width="612" height="160" alt="出北京记——第一站厦门" /></a>
                </li>--}}
            </ul>
            <div class="banner_control">
                <em></em>
                <ul class="thumbs">
                    @foreach($carousel as $key => $val)
                    <li  class="thumbs_{{$key+1}}" >
                        <i></i>
                        <img src="{{env('APP_HOST').$val['car_img']}}" style="width:113px; height:42px;" />
                    </li>
                    @endforeach
                    {{--<li  class="thumbs_2" >
                        <i></i>
                        <img src="style/images/381b343557774270a508206b3a725f39.jpg" width="113" height="42" />
                    </li>
                    <li  class="thumbs_3" >
                        <i></i>
                        <img src="style/images/354d445c5fd84f1990b91eb559677eb5.jpg" width="113" height="42" />
                    </li>--}}
                </ul>
            </div>
        </div><!--/#main_banner-->

        <ul id="da-thumbs" class="da-thumbs">
            <li >
                <a href="#">
                    <img src="style/images/a254b11ecead45bda166afa8aaa9c8bc.jpg" width="113" height="113" alt="联想" />
                    <div class="hot_info">
                        <h2 title="联想">联想</h2>
                        <em></em>
                        <p title="世界因联想更美好">
                            世界因联想更美好
                        </p>
                    </div>
                </a>
            </li>
            <li >
                <a href="#">
                    <img src="style/images/c75654bc2ab141df8218983cfe5c89f9.jpg" width="113" height="113" alt="淘米" />
                    <div class="hot_info">
                        <h2 title="淘米">淘米</h2>
                        <em></em>
                        <p title="将心注入 追求极致">
                            将心注入 追求极致
                        </p>
                    </div>
                </a>
            </li>
            <li >
                <a href="#">
                    <img src="style/images/2bba2b71d0b0443eaea1774f7ee17c9f.png" width="113" height="113" alt="优酷土豆" />
                    <div class="hot_info">
                        <h2 title="优酷土豆">优酷土豆</h2>
                        <em></em>
                        <p title="专注于视频领域，是中国网络视频行业领军企业">
                            专注于视频领域，是中国网络视频行业领军企业
                        </p>
                    </div>
                </a>
            </li>
            <li >
                <a href="#">
                    <img src="style/images/f4822a445a8b495ebad81fcfad3e40e2.jpg" width="113" height="113" alt="思特沃克" />
                    <div class="hot_info">
                        <h2 title="思特沃克">思特沃克</h2>
                        <em></em>
                        <p title="一家全球信息技术服务公司">
                            一家全球信息技术服务公司
                        </p>
                    </div>
                </a>
            </li>
            <li >
                <a href="#">
                    <img src="style/images/5caf8f9631114bf990f87bb11360653e.png" width="113" height="113" alt="奇猫" />
                    <div class="hot_info">
                        <h2 title="奇猫">奇猫</h2>
                        <em></em>
                        <p title="专注于移动互联网、互联网产品研发">
                            专注于移动互联网、互联网产品研发
                        </p>
                    </div>
                </a>
            </li>
            <li  class="last" >
                <a href="#">
                    <img src="style/images/c0052c69ef4546c3b7d08366d0744974.jpg" width="113" height="113" alt="堆糖网" />
                    <div class="hot_info">
                        <h2 title="堆糖网">堆糖网</h2>
                        <em></em>
                        <p title="分享收集生活中的美好，遇见世界上的另外一个你">
                            分享收集生活中的美好，遇见世界上的另外一个你
                        </p>
                    </div>
                </a>
            </li>
        </ul>

        <ul class="reset hotabbing">
            <li class="current">热门职位</li>
            <li>最新职位</li>
        </ul>

        <div id="hotList">
@if($hot)        
            <ul class="hot_pos reset">
            @foreach($hot as $v)
                <li class="clearfix">
                    
                    <div class="hot_pos_l">
                        <div class="mb10">
                            <a href="postPreview?re_id={{$v['re_id']}}" target="_blank">{{$v['re_name']}}</a>
                            &nbsp;
                            <span class="c9">[北京]</span>
                        </div>
                        <span><em class="c7">月薪： </em>{{$v['re_salarymin']}}k-{{$v['re_salarymax']}}k</span>
                        <span><em class="c7">最低学历： </em>{{$v['re_education']}}</span>
                        <br />
                        <span><em class="c7">职位诱惑：</em>{{$v['re_welfare']}}</span>
                        <br />
                        <span>{{ceil((time()-$v['re_time'])/86400)}}天以前发布</span>
                        <!-- <a  class="wb">分享到微博</a> -->
                    </div>
                    
                    <div class="hot_pos_r">
                    <div class="apply">       
                        </div>
                        <div class="mb10"><a href="companyinfo?c_id={{$v['c_id']}}" title="" target="_blank">{{$v['c_name']}}</a></div>
                        <span><em class="c7">领域： </em>{{$v['c_industry']}}</span><br />
                        <span><em class="c7">创始人：</em>{{$v['c_ceo']}}</span>
                        
                        <br />
                        <ul class="companyTags reset">
                            @foreach($v['label'] as $ks=>$label)
                            @if($ks>3)
                            @else
                                <li>{{$label['lab_name']}}</li>                                
                            @endif                        
                            @endforeach
                        </ul>
                    </div>
                </li>
                @endforeach
            </ul>
            @else
            <div class="hot_pos reset" style="margin-top:150px;margin-left:100px;margin-bottom:100px">
                    <div style="color:#91cebe;font-size:28px">暂时没有符合该搜索条件的职位</div>
                    <br>
                    
            </div>
    @endif       

    @if($new)        
            <ul class="hot_pos hot_posHotPosition reset" style="display:none">
            @foreach($new as $v)
                <li class="clearfix">
                    
                    <div class="hot_pos_l">
                        <div class="mb10">
                            <a href="postPreview?re_id={{$v['re_id']}}" target="_blank">{{$v['re_name']}}</a>
                            &nbsp;
                            <span class="c9">[北京]</span>
                        </div>
                        <span><em class="c7">月薪： </em>{{$v['re_salarymin']}}k-{{$v['re_salarymax']}}k</span>
                        <span><em class="c7">最低学历： </em>{{$v['re_education']}}</span>
                        <br />
                        <span><em class="c7">职位诱惑：</em>{{$v['re_welfare']}}</span>
                        <br />
                        <span>{{ceil((time()-$v['re_time'])/86400)}}天以前发布</span>
                        <!-- <a  class="wb">分享到微博</a> -->
                    </div>
                    
                    <div class="hot_pos_r">
                    <div class="apply">       
                        </div>
                        <div class="mb10"><a href="companyinfo?c_id={{$v['c_id']}}" title="" target="_blank">{{$v['c_name']}}</a></div>
                        <span><em class="c7">领域： </em>{{$v['c_industry']}}</span><br />
                        <span><em class="c7">创始人：</em>{{$v['c_ceo']}}</span>
                        </span>
                        <br />
                        <ul class="companyTags reset">
                        @foreach($v['label'] as $ks=>$label)
                        @if($ks>3)
                        @else
                            <li>{{$label['lab_name']}}</li>
                            
                        @endif                        
                        @endforeach
                        </ul>
                    </div>
                </li>
                @endforeach
            </ul>
            @else
                <div class="hot_pos hot_posHotPosition reset" style="display:none" style="margin-top:150px;margin-left:100px;margin-bottom:100px">
                    <div style="color:#91cebe;font-size:28px">暂时没有符合该搜索条件的职位</div>
                    <br>
                    
                </div>
        @endif   
        </div>

        <div class="clear"></div>
        <div id="linkbox">
            <dl>
                <dt>友情链接</dt>
                <dd>
                    @foreach($friend_link as $v)
                    <a href="{{$v['link_url']}}" target="_blank">{{$v['link_name']}}</a> <span>|</span>
                    @endforeach

                    <a href="#" class="more">更多</a>
                </dd>
            </dl>
        </div>
        </div>
        <input type="hidden" value="" name="userid" id="userid" />
        @endsection
</div>