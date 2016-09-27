@extends('index.lar.public')
@section('title', '我的收藏-校易聘')
@section('content')<!-- end #header -->
@section('script')
<script>
    $(function () {
        $('.collectionCancel').click(function () {
            var _this = $(this);
            var u_id = "{{session('u_id')}}";
            var re_id = _this.parents('li').attr('data-id');
            $.ajax({
                type : 'post',
                url : 'cancelCollected',
                data : {
                    u_id : u_id,
                    re_id : re_id,
                    _token : "{{csrf_token()}}"
                },
                async : true,
                success : function (re) {
                    if(re==1){
                        _this.parents('li').animate({
                            opacity: "hide"
                        }, "slow");
                    }
                }
            });
        });
    })
</script>
@endsection
<div id="container">

    <div class="clearfix">
        <div class="content_l">
            <dl class="c_collections">
                <dt>
                <h1><em></em>我收藏的职位</h1>
                </dt>
                <dd>
                    <form id="collectionsForm">
                        <ul class="reset my_collections">
                            @foreach($collected as $val)
                            <li data-id="{{$val['re_id']}}">
                                <a href="companyinfo?c_id={{$val['c_id']}}" target="_blank" title="{{$val['c_name']}}">
                                    <img src="{{env('APP_HOST').$val['c_logo']}}" alt="{{$val['c_name']}}">
                                </a>
                                <div class="co_item">
                                    <h2 title="{{$val['re_name']}}">
                                        <a target="_blank" href="postPreview?re_id={{$val['re_id']}}">
                                            <em>{{$val['re_name']}}</em>
                                            <span>（{{$val['re_salarymin'].'k - '.$val['re_salarymax'].'k'}}）</span>
                                        </a>
                                    </h2>
                                    <span class="co_time">发布时间：{{date('Y-m-d H:i',$val['re_time'])}}</span>

                                    <div class="co_cate">{{$val['c_shorthand']}} / 北京 / {{$val['re_education']}}</div>
                                    <span class="co_youhuo c7">{{$val['welfare']}}</span>
                                    @if($val['re_status']==0)
                                    <a class="collection_link" target="_blank" href="{{url('remusePro')}}/{{$val['re_id']}}">投个简历</a>
                                    @else
                                        <a class="collection_link" style="cursor: default; margin-left: 24px;"> 已下线 </a>
                                    @endif
                                    <i></i>
                                    <a class="collectionCancel collection_link" href="javascript:;">
                                        取消收藏
                                    </a>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </form>
                </dd>
            </dl>
        </div>
        <div class="content_r">
            <div class="mycenterR" id="myInfo">
                <h2>我的信息</h2>
                <a href="collectedPosition">我收藏的职位</a>
                <br>
                <a target="_blank" href="#">我订阅的职位</a>
            </div>
            <!--end #myInfo-->

        </div>
    </div>

@endsection