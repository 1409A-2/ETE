@extends('index.lar.public')
@section('title', '预览')
@section('content')
    <div id="container">
	
        <dl class="job_detail" id="job_detail">
            <dt class="clearfix join_tc_icon">
            <h1 title="Delphi">
                <em></em>
                {{$release['re_name']}}
            </h1>
            </dt>

            <dd class="job_request">
                <p>
                    <span class="red">{{$release['re_salarymin']}}k-{{$release['re_salarymax']}}k</span>
                    <span>北京</span>
                    <span>{{$release['re_education']}}及以上</span>
                    <span>全职</span>
                </p>

                <p>职位诱惑 :{{$release['re_welfare']}} </p>

            </dd>
            <dd class="job_bt">
                <h3 class="description">职位描述</h3>

                <p>{{$release['re_desc']}}<br/></p>
            </dd>

            <!-- 职位发布者 -->
            <dd class="jd_publisher">
                <h3>职位发布者</h3>

                <div class="border clearfix">
                    <i class="initial_avatar c3">{{$company['c_name']}}</i>

   
                        <div>
                            <span class="data">发布时间</span>
                                        <span class="tip">
                        
                        <span class="tip_text">{{date('Y-m-d H:i:s',$release['re_time'])}}</span>
                    </span>
                        </div>
                    </div>
                </div>
            </dd>

      
            <!-- 职位发布者 end -->

            
        </dl>

</div>
@endsection
