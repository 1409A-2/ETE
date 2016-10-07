@extends('index.lar.public')
@section('title', '职位详情')
@section('content')
    <style>
        .jd_collection {  background: rgba(0, 0, 0, 0) url("{{env('APP_HOST')}}/style/images/jd_collection_be0471b.png") no-repeat scroll -2px -2px;  cursor: pointer;  height: 27px;  position: absolute;  left:500px;  top: 120px;  width: 27px;  }
        #collection_jd {background-color: #fff;  border: 2px solid #d4d4d4;  bottom: 30px;  color: #555;  font-size: 12px;  line-height: 18px;  margin: 0 0 0 -17px;  padding: 0 3px;  position: absolute;  text-align: center;  width: 50px;  z-index: 22;  }
        .job_detail dt h1 div {  font-size: 14px;  font-weight: normal;  line-height: 18px;  margin: 0 0 10px -5px;  }
    </style>
    <div id="container">

        <dl class="job_detail" id="job_detail">
            <dt class="clearfix join_tc_icon">
            <h1 title="{{$release['re_name']}}">
                <em></em>
                {{$release['re_name']}}
                <div id="jobCollection" class="jd_collection" data-lg-tj-cid="idnull" data-lg-tj-no="0001" data-lg-tj-id="9500">
                    <span id="collection_jd" class="dn">收藏职位</span>

                </div>
                <div class="jd_collection_success" style="display: none; position: absolute;  left:320px;  top: 153px;">
                    <span style="color: black;"></span>
                    <a class="jd_collection_page" target="_blank" href="{{url('collectedPosition')}}">查看全部收藏</a>
                    <a class="jd_collection_x" href="javascript:;" rel="nofollow"></a>
                </div>

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
                <div class="Pagination myself">
                    <a href="{{url('remusePro')}}/{{$release['re_id']}}" style="background-image: none;font-size: 20px;height: 43px;line-height: 43px;margin-top: 25px;padding: 0 22px">投个简历</a>
                </div>

            </dd>

        </dl>
        <script>
            $(function(){
                var u_id = "{{session('u_id')}}";
                var re_id = "{{$release['re_id']}}";

                var collection_jd = $("#collection_jd");
                var jd_collection = $(".jd_collection");
                var jd_collection_success = $('.jd_collection_success');
                var haveCollected = false;
                if(u_id != ''){
                    $.ajax({
                        type : 'post',
                        url : 'getcollected',
                        data : {
                            u_id : u_id,
                            re_id : re_id,
                            _token : "{{csrf_token()}}"
                        },
                        success : function (re) {
                            if(re != ''){
                                jd_collection.attr('class','jd_collection collected');
                                collection_jd.html('已收藏');
                                haveCollected = true;
                            }
                        }
                    });
                }
                jd_collection.hover(function () {
                    collection_jd.attr('class','');
                    var _class = $(this).attr('class');
                    if(_class != 'jd_collection collected'){
                        $(this).css("background-position",'-2px -29px');
                    }
                }, function () {
                    collection_jd.attr('class','dn');
                    $(this).css("background-position",'');
                });

                var interval = '';
                jd_collection.click(function(){
                    clearInterval(interval);
                    if(u_id == ''){
                        return
                    }

                    if(haveCollected){
                        var url = "cancelCollected";
                    }else{
                        var url = "collectionPosition";
                    }

                    $.ajax({
                        type : 'post',
                        url : url,
                        data : {
                            u_id : u_id,
                            re_id : re_id,
                            _token : "{{csrf_token()}}"
                        },
                        async : true,
                        success : function (re) {
                            if(re==1){
                                if(haveCollected){
                                    jd_collection.attr('class','jd_collection');
                                    jd_collection_success.find('span').html('已取消该收藏，');
                                    collection_jd.html('收藏职位');
                                    haveCollected = false;
                                }else{
                                    jd_collection.attr('class','jd_collection collected');
                                    jd_collection_success.find('span').html('已收藏该职位，');
                                    jd_collection.css("background-position",'-2px -58px');
                                    collection_jd.html('已收藏');
                                    haveCollected = true;
                                }
                                jd_collection_success.show();
                                interval = setShowInterval();
                            }
                        }
                    });
                });

               jd_collection_success.hover(function () {
                    jd_collection_success.show();
                    clearInterval(interval);
                }, function () {
                    interval = setShowInterval();
                });

                jd_collection_success.find('.jd_collection_x').click(function(){
                    jd_collection_success.hide();
                    clearInterval(interval);
                });

                function setShowInterval(){
                    return setInterval(hideCollected,1000)
                }

                function hideCollected(){
                    jd_collection_success.hide();
                    clearInterval(interval);
                }

            })
        </script>
        @endsection
