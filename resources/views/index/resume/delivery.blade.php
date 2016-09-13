@extends('index.lar.public')

@section('content')
    <style>
        diy{
            display: none;
        }
    </style>
    <div id="container">

        <div class="clearfix">
            <div class="content_l">
                <dl class="c_delivery">
                    <dt>
                    <h1><em></em>已投递简历状态</h1>
                    <a class="d_refresh" href="javascript:;">刷新</a>
                    </dt>
                    <dd>
                        <div class="delivery_tabs">

                            <ul class="reset" id="tab">
                                <li class="current"><a href="javascript:;">全部</a></li>
                                <li><a href="javascript:;">投递成功</a></li>
                                <li><a href="javascript:;">被查看</a></li>
                                <li><a href="javascript:;">通过初筛</a></li>
                                <li><a href="javascript:;">通知面试</a></li>
                                <li class="last"><a href="javascript:;">不合适</a></li>
                            </ul>

                        </div>
                        <div id="content">
                            {{--//全部--}}


                                <diy style="display: block">
                                    @if(array_key_exists('all',$reList))
                                    @foreach($reList['all'] as $v)
                                    <ul class="reset my_delivery">
                                        <li>
                                            <div class="d_item">
                                                <h2 title="{{$v['re_name']}}">
                                                    <a target="_blank" href="postPreview?re_id={{$v['re_id']}}">
                                                        <em>{{$v['re_name']}}</em>
                                                        <span>（{{$v['re_salarymin']}}k-{{$v['re_salarymax']}}k）</span>
                                                        <!--  -->
                                                    </a>
                                                </h2>

                                                <div class="clear"></div>
                                                <a title="公司名称" class="d_jobname" target="_blank"
                                                   href="">
                                                    {{$v['c_name']}} <span>[北京]</span>
                                                </a>
                                                <span class="d_time">{{date('Y-m-d H:i:s',$v['delivery_time'])}}</span>

                                                <div class="clear"></div>

                                                @if($v['read']==1)
                                                    @if($v['remuse_resele']==0)
                                                        <a class="btn_showprogress" href="javascript:;">
                                                            被查看
                                                            </a>
                                                    @elseif($v['remuse_resele']==1)
                                                        <a class="btn_showprogress" href="javascript:;">
                                                            通知面试
                                                            </a>
                                                    @elseif($v['remuse_resele']==2)
                                                        <a class="btn_showprogress" href="javascript:;">
                                                            初试通过
                                                            </a>
                                                    @elseif($v['remuse_resele']==3)
                                                        <a class="btn_showprogress" href="javascript:;">
                                                            不合适
                                                            </a>
                                                    @endif

                                                @else

                                                    @if($v['remuse_resele']==0)
                                                    <a class="btn_showprogress" href="javascript:;">
                                                        投递成功
                                                       </a>
                                                    @elseif($v['remuse_resele']==1)
                                                    <a class="btn_showprogress" href="javascript:;">
                                                        通知面试
                                                       </a>
                                                    @elseif($v['remuse_resele']==2)
                                                    <a class="btn_showprogress" href="javascript:;">
                                                        初试通过
                                                        </a>
                                                    @elseif($v['remuse_resele']==3)
                                                    <a class="btn_showprogress" href="javascript:;">
                                                        不合适
                                                        </a>
                                                    @endif

                                                  @endif
                                            </div>
                                            <div class="progress_status	dn">
                                                <ul class="status_steps">
                                                    <li class="status_done status_1">1</li>
                                                    <li class="status_line status_line_done"><span></span></li>
                                                    <li class="status_done"><span>2</span></li>
                                                    <li class="status_line status_line_done"><span></span></li>
                                                    <li class="status_done"><span>3</span></li>
                                                    <li class="status_line status_line_done"><span></span></li>
                                                    <li class="status_done"><span>4</span></li>
                                                </ul>
                                                <ul class="status_text">
                                                    <li>投递成功</li>
                                                    <li class="status_text_2">简历被查看</li>
                                                    <li class="status_text_3">通过初步筛选</li>
                                                    <li style="margin-left: 75px;*margin-left: 60px;" class="status_text_4">
                                                        不合适
                                                    </li>
                                                </ul>
                                                <ul class="status_list">
                                                    <li class="top">
                                                        <div class="list_time"><em></em>2014-07-01 17:15</div>
                                                        <div class="list_body">
                                                            简历被lixiang标记为不合适
                                                            <div>您的简历已收到，但目前您的工作经历与该职位不是很匹配，因此很抱歉地通知您无法进入面试。</div>
                                                        </div>
                                                    </li>
                                                    <li class="bottom">
                                                        <div class="list_time"><em></em>2014-07-01 17:08</div>
                                                        <div class="list_body">
                                                            lixiang已成功接收你的简历
                                                        </div>
                                                    </li>
                                                </ul>
                                                <a class="btn_closeprogress" href="javascript:;"></a>
                                            </div>
                                        </li>
                                    </ul>
                                    @endforeach
                                    @else

                                    @endif
                                </diy>



                            {{--全部结束--}}


                            {{--//投递成功--}}
                            <diy>
                            @if(array_key_exists('remuse_0',$reList))

                                @foreach($reList['remuse_0'] as $v)
                                @if($v['read']==0)
                                        <ul class="reset my_delivery">
                                            <li>
                                                <div class="d_item">
                                                    <h2 title="{{$v['re_name']}}">
                                                        <a target="_blank" href="{{url('jump')}}?i_name={{$v['re_name']}}">
                                                            <em>{{$v['re_name']}}</em>
                                                            <span>（{{$v['re_salarymin']}}k-{{$v['re_salarymax']}}k）</span>
                                                            <!--  -->
                                                        </a>
                                                    </h2>

                                                    <div class="clear"></div>
                                                    <a title="公司名称" class="d_jobname" target="_blank"
                                                       href="http://www.lagou.com/c/25927.html">
                                                        {{$v['c_name']}} <span>[北京]</span>
                                                    </a>
                                                    <span class="d_time">2014-07-01 17:15</span>

                                                    <div class="clear"></div>

                                                    <a class="btn_showprogress" href="javascript:;">
                                                        投递成功
                                                        </a>
                                                </div>

                                            </li>
                                        </ul>
                                 @endif
                                @endforeach

                            @else

                            @endif
                            </diy>
                            {{--投递结束--}}
                            {{--被查看--}}
                            <diy>
                            @if(array_key_exists('read',$reList))
                                @foreach($reList['read'] as $v)
                                    @if($v['read']==1&&$v['remuse_resele']==0)
                                        <ul class="reset my_delivery">
                                            <li>
                                                <div class="d_item">
                                                    <h2 title="{{$v['re_name']}}">
                                                        <a target="_blank" href="{{url('jump')}}?i_name={{$v['re_name']}}">
                                                            <em>{{$v['re_name']}}</em>
                                                            <span>（{{$v['re_salarymin']}}k-{{$v['re_salarymax']}}k）</span>
                                                            <!--  -->
                                                        </a>
                                                    </h2>

                                                    <div class="clear"></div>
                                                    <a title="公司名称" class="d_jobname" target="_blank"
                                                       href="http://www.lagou.com/c/25927.html">
                                                        {{$v['c_name']}} <span>[北京]</span>
                                                    </a>
                                                    <span class="d_time">2014-07-01 17:15</span>

                                                    <div class="clear"></div>

                                                    <a class="btn_showprogress" href="javascript:;">
                                                        被查看
                                                        </a>
                                                </div>
                                                <div class="progress_status	dn">
                                                    <ul class="status_steps">
                                                        <li class="status_done status_1">1</li>
                                                        <li class="status_line status_line_done"><span></span></li>
                                                        <li class="status_done"><span>2</span></li>
                                                        <li class="status_line status_line_done"><span></span></li>
                                                        <li class="status_done"><span>3</span></li>
                                                        <li class="status_line status_line_done"><span></span></li>
                                                        <li class="status_done"><span>4</span></li>
                                                    </ul>
                                                    <ul class="status_text">
                                                        <li>投递成功</li>
                                                        <li class="status_text_2">简历被查看</li>
                                                        <li class="status_text_3">通过初步筛选</li>
                                                        <li style="margin-left: 75px;*margin-left: 60px;" class="status_text_4">
                                                            不合适
                                                        </li>
                                                    </ul>
                                                    <ul class="status_list">
                                                        <li class="top">
                                                            <div class="list_time"><em></em>2014-07-01 17:15</div>
                                                            <div class="list_body">
                                                                简历被lixiang标记为不合适
                                                                <div>您的简历已收到，但目前您的工作经历与该职位不是很匹配，因此很抱歉地通知您无法进入面试。</div>
                                                            </div>
                                                        </li>
                                                        <li class="bottom">
                                                            <div class="list_time"><em></em>2014-07-01 17:08</div>
                                                            <div class="list_body">
                                                                lixiang已成功接收你的简历
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <a class="btn_closeprogress" href="javascript:;"></a>
                                                </div>
                                            </li>
                                        </ul>
                                    @endif
                                @endforeach

                            @else

                            @endif
                            </diy>
                            {{--通过初筛--}}
                            <diy>
                            @if(array_key_exists('remuse_2',$reList))
                                @foreach($reList['remuse_2'] as $v)

                                        <ul class="reset my_delivery">
                                            <li>
                                                <div class="d_item">
                                                    <h2 title="{{$v['re_name']}}">
                                                        <a target="_blank" href="{{url('jump')}}?i_name={{$v['re_name']}}">
                                                            <em>{{$v['re_name']}}</em>
                                                            <span>（{{$v['re_salarymin']}}k-{{$v['re_salarymax']}}k）</span>
                                                            <!--  -->
                                                        </a>
                                                    </h2>

                                                    <div class="clear"></div>
                                                    <a title="公司名称" class="d_jobname" target="_blank"
                                                       href="http://www.lagou.com/c/25927.html">
                                                        {{$v['c_name']}} <span>[北京]</span>
                                                    </a>
                                                    <span class="d_time">2014-07-01 17:15</span>

                                                    <div class="clear"></div>


                                                    <a class="btn_showprogress" href="javascript:;">
                                                        初试通过
                                                        </a>

                                                </div>
                                                <div class="progress_status	dn">
                                                    <ul class="status_steps">
                                                        <li class="status_done status_1">1</li>
                                                        <li class="status_line status_line_done"><span></span></li>
                                                        <li class="status_done"><span>2</span></li>
                                                        <li class="status_line status_line_done"><span></span></li>
                                                        <li class="status_done"><span>3</span></li>
                                                        <li class="status_line status_line_done"><span></span></li>
                                                        <li class="status_done"><span>4</span></li>
                                                    </ul>
                                                    <ul class="status_text">
                                                        <li>投递成功</li>
                                                        <li class="status_text_2">简历被查看</li>
                                                        <li class="status_text_3">通过初步筛选</li>
                                                        <li style="margin-left: 75px;*margin-left: 60px;" class="status_text_4">
                                                            不合适
                                                        </li>
                                                    </ul>
                                                    <ul class="status_list">
                                                        <li class="top">
                                                            <div class="list_time"><em></em>2014-07-01 17:15</div>
                                                            <div class="list_body">
                                                                简历被lixiang标记为不合适
                                                                <div>您的简历已收到，但目前您的工作经历与该职位不是很匹配，因此很抱歉地通知您无法进入面试。</div>
                                                            </div>
                                                        </li>
                                                        <li class="bottom">
                                                            <div class="list_time"><em></em>2014-07-01 17:08</div>
                                                            <div class="list_body">
                                                                lixiang已成功接收你的简历
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <a class="btn_closeprogress" href="javascript:;"></a>
                                                </div>
                                            </li>
                                        </ul>

                                @endforeach

                            @else

                            @endif
                            </diy>
                            {{--通过初筛结束--}}
                            {{--//通知面试成功--}}
                            <diy>
                            @if(array_key_exists('remuse_1',$reList))
                                @foreach($reList['remuse_1'] as $v)

                                        <ul class="reset my_delivery">
                                            <li>
                                                <div class="d_item">
                                                    <h2 title="{{$v['re_name']}}">
                                                        <a target="_blank" href="{{url('jump')}}?i_name={{$v['re_name']}}">
                                                            <em>{{$v['re_name']}}</em>
                                                            <span>（{{$v['re_salarymin']}}k-{{$v['re_salarymax']}}k）</span>
                                                            <!--  -->
                                                        </a>
                                                    </h2>

                                                    <div class="clear"></div>
                                                    <a title="公司名称" class="d_jobname" target="_blank"
                                                       href="http://www.lagou.com/c/25927.html">
                                                        {{$v['c_name']}} <span>[北京]</span>
                                                    </a>
                                                    <span class="d_time">2014-07-01 17:15</span>

                                                    <div class="clear"></div>


                                                    <a class="btn_showprogress" href="javascript:;">
                                                        通知面试
                                                        </a>

                                                </div>
                                                <div class="progress_status	dn">
                                                    <ul class="status_steps">
                                                        <li class="status_done status_1">1</li>
                                                        <li class="status_line status_line_done"><span></span></li>
                                                        <li class="status_done"><span>2</span></li>
                                                        <li class="status_line status_line_done"><span></span></li>
                                                        <li class="status_done"><span>3</span></li>
                                                        <li class="status_line status_line_done"><span></span></li>
                                                        <li class="status_done"><span>4</span></li>
                                                    </ul>
                                                    <ul class="status_text">
                                                        <li>投递成功</li>
                                                        <li class="status_text_2">简历被查看</li>
                                                        <li class="status_text_3">通过初步筛选</li>
                                                        <li style="margin-left: 75px;*margin-left: 60px;" class="status_text_4">
                                                            不合适
                                                        </li>
                                                    </ul>
                                                    <ul class="status_list">
                                                        <li class="top">
                                                            <div class="list_time"><em></em>2014-07-01 17:15</div>
                                                            <div class="list_body">
                                                                简历被lixiang标记为不合适
                                                                <div>您的简历已收到，但目前您的工作经历与该职位不是很匹配，因此很抱歉地通知您无法进入面试。</div>
                                                            </div>
                                                        </li>
                                                        <li class="bottom">
                                                            <div class="list_time"><em></em>2014-07-01 17:08</div>
                                                            <div class="list_body">
                                                                lixiang已成功接收你的简历
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <a class="btn_closeprogress" href="javascript:;"></a>
                                                </div>
                                            </li>
                                        </ul>

                                @endforeach

                            @else

                            @endif
                                </diy>
                            <diy>
                            @if(array_key_exists('remuse_3',$reList))
                                @foreach($reList['remuse_3'] as $v)

                                        <ul class="reset my_delivery">
                                            <li>
                                                <div class="d_item">
                                                    <h2 title="{{$v['re_name']}}">
                                                        <a target="_blank" href="{{url('jump')}}?i_name={{$v['re_name']}}">
                                                            <em>{{$v['re_name']}}</em>
                                                            <span>（{{$v['re_salarymin']}}k-{{$v['re_salarymax']}}k）</span>
                                                            <!--  -->
                                                        </a>
                                                    </h2>

                                                    <div class="clear"></div>
                                                    <a title="公司名称" class="d_jobname" target="_blank"
                                                       href="http://www.lagou.com/c/25927.html">
                                                        {{$v['c_name']}} <span>[北京]</span>
                                                    </a>
                                                    <span class="d_time">2014-07-01 17:15</span>

                                                    <div class="clear"></div>


                                                    <a class="btn_showprogress" href="javascript:;">
                                                        不合适
                                                        </a>

                                                </div>
                                                <div class="progress_status	dn">
                                                    <ul class="status_steps">
                                                        <li class="status_done status_1">1</li>
                                                        <li class="status_line status_line_done"><span></span></li>
                                                        <li class="status_done"><span>2</span></li>
                                                        <li class="status_line status_line_done"><span></span></li>
                                                        <li class="status_done"><span>3</span></li>
                                                        <li class="status_line status_line_done"><span></span></li>
                                                        <li class="status_done"><span>4</span></li>
                                                    </ul>
                                                    <ul class="status_text">
                                                        <li>投递成功</li>
                                                        <li class="status_text_2">简历被查看</li>
                                                        <li class="status_text_3">通过初步筛选</li>
                                                        <li style="margin-left: 75px;*margin-left: 60px;" class="status_text_4">
                                                            不合适
                                                        </li>
                                                    </ul>
                                                    <ul class="status_list">
                                                        <li class="top">
                                                            <div class="list_time"><em></em>2014-07-01 17:15</div>
                                                            <div class="list_body">
                                                                简历被lixiang标记为不合适
                                                                <div>您的简历已收到，但目前您的工作经历与该职位不是很匹配，因此很抱歉地通知您无法进入面试。</div>
                                                            </div>
                                                        </li>
                                                        <li class="bottom">
                                                            <div class="list_time"><em></em>2014-07-01 17:08</div>
                                                            <div class="list_body">
                                                                lixiang已成功接收你的简历
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <a class="btn_closeprogress" href="javascript:;"></a>
                                                </div>
                                            </li>
                                        </ul>

                                @endforeach

                            @else

                            @endif
                            </diy>
                            {{--不合格结束--}}


                        </div>
                    </dd>
                </dl>
            </div>
            <div class="content_r">
                <div class="mycenterR" id="myInfo">
                    <h2>我的信息</h2>
                    <a href="resumeList">我的简历</a>
                    <br>
                    <!-- <a href="toudi.html" target="_blank">我投递的职位<span id="noticeNoPage"
                                                                     class="red dn">&nbsp;(0)</span></a>
                    <br>
                    <a target="_blank" href="subscribe.html">我订阅的职位</a>
                    <br>
                    <a target="_blank" href="mList.html">我的职位推荐</a> -->
                </div>
                <!--end #myInfo-->
                <div class="mycenterR" id="myRecommend">
                    <h2>可能适合你的职位 <i>匹配度</i></h2>
                    <ul class="reset">
                    <li><center>暂无</center></li>
                       <!--  <li>
                            <a target="_blank" href="http://www.lagou.com/jobs/22194.html">
                                <span class="f16">产品经理</span>
                                <span class="c7">广州百田</span>
                                <em>92%</em>
                            </a>
                        </li> -->
                    </ul>
                    <!-- <a target="_blank" class="more" href="mList.html">更多推荐职位&gt;&gt;</a> -->
                </div>

            </div>
        </div>
        <input type="hidden" id="userid" name="userid" value="314873">

        <div class="dn" id="recordPopBox">
            <dl>
                <dt>
                    评价面试体验
                    <a class="boxclose" href="javascript:;"></a>
                </dt>
                <dd>
                    <form id="recordForm">
                        <input type="hidden" value="" id="recordId">
                        <ul id="interviewResult" class="record_radio clearfix">
                            <li class="mr35">
                                已收到offer
                                <input type="radio" name="type" value="1">
                            </li>
                            <li>
                                未收到offer
                                <input type="radio" name="type" value="2">
                            </li>
                        </ul>
                        <div class="dividebtm">
                            <table>
                                <tbody>
                                <tr>
                                    <td width="80" valign="top" align="right">面试评分：</td>
                                    <td>
                                        <ul id="recordStarSelect">
                                            <li></li>
                                            <li></li>
                                            <li></li>
                                            <li></li>
                                            <li></li>
                                        </ul>
                                        <input type="hidden" id="recordStar" value="" name="recordStar">

                                        <div class="clear"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top" align="right" class="dividebtman">面试短评：</td>
                                    <td>

                                        <input type="hidden" class="error" id="select_record_hidden" value=""
                                               name="record">
                                        <input type="text" autocomplete="off" placeholder="15字以内对面试的简单描述哦"
                                               id="select_record" class="selectr_340" maxlength="15">

                                        <div class="boxUpDownan boxUpDown_340 dn" id="box_record"
                                             style="display: none;">
                                            <ul>
                                                <p>热门短评：</p>
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top" align="right" class="dividebtman">面试经历：</td>
                                    <td>
                                        <textarea id="interviewDesc" placeholder="记录下自己的面试经历"
                                                  style="width: 320px;"></textarea>

                                        <div class="word_count">你还可以输入 <span>500</span> 字</div>
                                        <div id="showName" class="f14 c7">
                                            <label class="checkbox">
                                                <input type="checkbox">
                                                
                                            </label>
                                            匿名提交
                                        </div>
                                        <input type="hidden" value="" id="isShowName">
                                        <input type="hidden" value="" id="senduid">
                                        <input type="hidden" value="" id="poid">
                                        <input type="hidden" value="" id="deid">
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right" colspan="2">
                                        <input type="submit" value="确认提交" class="submitRecord btn_small">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </dd>
            </dl>
        </div>
        <!-- end #recordPopBox -->
        <script src="style/js/delivery.js"></script>
        <script>
            $(function () {
                //location.reload(true);

                $('.Pagination').pager({
                    currPage: 1,
                    pageNOName: "pageNo",
                    form: "deliveryForm",
                    pageCount: 1,
                    pageSize: 5
                });
            });
        </script>
        <div class="clear"></div>
        <input type="hidden" value="" id="resubmitToken">
        <a rel="nofollow" title="回到顶部" id="backtop" style="display: none;"></a>
    </div><!-- end #container -->



@endsection
<script type="text/javascript" src="{{env('APP_HOST')}}/style/js/jq.js"></script>

<script type="text/javascript">
    $(function () {
        $('#noticeDot-1').hide();
        $('#noticeTip a.closeNT').click(function () {
            $(this).parent().hide();
        });
    });
    var index = Math.floor(Math.random() * 2);
    var ipArray = new Array('42.62.79.226', '42.62.79.227');
    var url = "ws://" + ipArray[index] + ":18080/wsServlet?code=314873";
    var CallCenter = {
        init: function (url) {
            var _websocket = new WebSocket(url);
            _websocket.onopen = function (evt) {
                console.log("Connected to WebSocket server.");
            };
            _websocket.onclose = function (evt) {
                console.log("Disconnected");
            };
            _websocket.onmessage = function (evt) {
                //alert(evt.data);
                var notice = jQuery.parseJSON(evt.data);
                if (notice.status[0] == 0) {
                    $('#noticeDot-0').hide();
                    $('#noticeTip').hide();
                    $('#noticeNo').text('').show().parent('a').attr('href', ctx + '/mycenter/delivery.html');
                    $('#noticeNoPage').text('').show().parent('a').attr('href', ctx + '/mycenter/delivery.html');
                } else {
                    $('#noticeDot-0').show();
                    $('#noticeTip strong').text(notice.status[0]);
                    $('#noticeTip').show();
                    $('#noticeNo').text('(' + notice.status[0] + ')').show().parent('a').attr('href', ctx + '/mycenter/delivery.html');
                    $('#noticeNoPage').text(' (' + notice.status[0] + ')').show().parent('a').attr('href', ctx + '/mycenter/delivery.html');
                }
                $('#noticeDot-1').hide();
            };
            _websocket.onerror = function (evt) {
                console.log('Error occured: ' + evt);
            };
        }
    };
    CallCenter.init(url);
</script>

<script>
    $(function () {
        window.onload = function () {
            var $li = $('#tab li');
            var $ul = $('#content diy');

            $li.click(function () {
                var $this = $(this);
                var $t = $this.index();
                $li.removeClass();
                $this.addClass('current');
                $ul.css('display', 'none');
                $ul.eq($t).css('display', 'block');
            })
        }
    });
</script>
