@extends('index.lar.public')
@section('title', '有效职位')
@section('content')
        <script src="style/js/job_list.min.js" type="text/javascript"></script>

    <div id="container">
        @include('index.industry.postOffice_public')
        <div class="content">
            <dl class="company_center_content">
                <dt>
                <h1>
                    <em></em>
                    有效职位 <span>（共<i style="color:#fff;font-style:normal" id="positionNumber">{{count($release)}}</i>个）</span></h1>
                </dt>
                <dd>
                    <form id="searchForm">
                        <input type="hidden" value="Publish" name="type">
                        <ul class="reset my_jobs">
                    @foreach($release as $v)
                            <li data-id="{{$v['re_id']}}">
                                <h3>
                                    <a target="_blank" title="随便写" href="">{{$v['i_name']}}</a>
                                    <span>[北京]</span>
                                </h3>
                                <span class="receivedResumeNo">
                                    <a href="">应聘简历（
                                    @foreach($count as $k=>$s)
                                        @if($v['re_id'] == $k)
                                            {{$s}}
                                        @endif
                                    @endforeach
                                    ）                                    
                                </a>
                                </span>

                                <div>全职 / {{$v['re_salarymin']}}k-{{$v['re_salarymax']}}k / {{$v['re_education']}}以上</div>
                                <div class="c9">发布时间： {{date('Y-m-d H:i:s',$v['re_time'])}}</div>
                                <div class="links">
                                    <!-- <a class="job_refresh" href="javascript:void(0)">刷新<span>每个职位7天内只能刷新一次</span></a> -->
                                    
                                    <a class="job_offline" status="1" href="javascript:void(0)">下线</a>
                                    <!-- <a class="job_del" href="javascript:void(0)">删除</a> -->
                                </div>
                            </li>
                    @endforeach
                        </ul>
                    </form>
                </dd>
            </dl>
        </div>
        @endsection
        <!-- end .content -->
        <div class="clear"></div>
        <input type="hidden" value="{{csrf_token()}}" id="resubmitToken">
    </div>


