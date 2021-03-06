﻿@extends('index.lar.public')
@section('title', '我的消息')
@section('content')
    <div id="container">
        <div class="clearfix">
            <div class="content_l">
                <dl class="c_delivery">
                    <dt>
                    <h1><em></em>我的消息</h1>
                    <a class="refresh_here" href="javascript:;" onclick="location.href='messageList?tag='+$('.current a').attr('level')">刷新</a>
                    </dt>
                    <dd>
                        <div class="delivery_tabs">
                            <ul class="reset">
                                <li @if($tag==0 || $tag=='')class="current"@endif>
                                    <a href="javascript:;" level="0">全部</a>
                                </li>
                                <li>
                                    <a href="javascript:;" level="1">投递反馈</a>
                                </li>
                                <li>
                                    <a href="javascript:;" level="2">系统通知</a>
                                </li>
                                <li>
                                    <a href="javascript:;" level="3" style="border-right: none;">一拍信息</a>
                                </li>
                            </ul>
                        </div>
                        <div class="deliver">
                            <form id="deliveryForm">
                                @if($message_data)
                                    <ul class="reset my_delivery" >
                                        @foreach($message_data as $message)
                                            <li>
                                                <div class="d_item">
                                                    <div class="clear"></div>
                                                    <h2>
                                                        @if($message['m_type'] == 1)
                                                            投递反馈
                                                        @elseif($message['m_type'] == 2)
                                                            系统消息
                                                        @else
                                                            一拍消息
                                                        @endif
                                                    </h2>
                                                    <span class="d_time">{{date('Y-m-d H:i:s',$message['m_time'])}}</span>

                                                    <div class="clear"></div>
                                                    <div class="d_resume">
	                                    	<span>
                                                <?php echo $message['m_content']?>
                                        	</span>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <div class="no-msg-text">
                                        <p class="lg_msg_avatar no_msg_i">暂时没有新的消息~</p>
                                    </div>
                                @endif
                                <input type="hidden" value="-1" name="tag">
                                <input type="hidden" value="" name="r">
                            </form>
                        </div>
                        <div class="deliver dn">
                            <form id="">
                                <ul class="reset my_delivery" >
                                    <?php $deliver1 = 0?>
                                    @foreach($message_data as $message)
                                        @if($message['m_type'] == 1)
                                            <?php $deliver1++?>
                                            <li>
                                                <div class="d_item">
                                                    <div class="clear"></div>
                                                    <h2>
                                                        投递反馈
                                                    </h2>
                                                    <span class="d_time">{{date('Y-m-d H:i:s',$message['m_time'])}}</span>

                                                    <div class="clear"></div>
                                                    <div class="d_resume">
                                                        <span>
                                                            <?php echo $message['m_content']?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                                @if($deliver1 == 0)
                                    <div class="no-msg-text">
                                        <p class="lg_msg_avatar no_msg_i">暂时没有新的消息~</p>
                                    </div>
                                @endif
                                <input type="hidden" value="-1" name="tag">
                                <input type="hidden" value="" name="r">
                            </form>
                        </div>
                        <div class="deliver dn">
                            <form id="deliveryForm">

                                <ul class="reset my_delivery" >
                                    <?php $deliver2 = 0?>
                                    @foreach($message_data as $message)
                                        @if($message['m_type'] == 2)
                                            <?php $deliver2++?>
                                            <li>
                                                <div class="d_item">
                                                    <div class="clear"></div>
                                                    <h2>
                                                        系统消息
                                                    </h2>
                                                    <span class="d_time">{{date('Y-m-d H:i:s',$message['m_time'])}}</span>

                                                    <div class="clear"></div>
                                                    <div class="d_resume">
                                                        <span>
                                                            <?php echo $message['m_content']?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                                @if($deliver2 == 0)
                                    <div class="no-msg-text">
                                        <p class="lg_msg_avatar no_msg_i">暂时没有新的消息~</p>
                                    </div>
                                @endif
                                <input type="hidden" value="-1" name="tag">
                                <input type="hidden" value="" name="r">
                            </form>
                        </div>
                        <div class="deliver dn">
                            <form id="deliveryForm">
                                <?php $deliver3 = 0?>
                                <ul class="reset my_delivery" >
                                    @foreach($message_data as $message)
                                        @if($message['m_type'] == 3)
                                            <?php $deliver3++?>
                                            <li>
                                                <div class="d_item">
                                                    <div class="clear"></div>
                                                    <h2>
                                                        一拍信息
                                                    </h2>
                                                    <span class="d_time">{{date('Y-m-d H:i:s',$message['m_time'])}}</span>

                                                    <div class="clear"></div>
                                                    <div class="d_resume">
                                                        <span>
                                                            <?php echo $message['m_content']?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                                @if($deliver3 == 0)
                                    <div class="no-msg-text">
                                        <p class="lg_msg_avatar no_msg_i">暂时没有新的消息~</p>
                                    </div>
                                @endif
                                <input type="hidden" value="-1" name="tag">
                                <input type="hidden" value="" name="r">
                            </form>
                        </div>
                    </dd>
                </dl>
            </div>
        </div>
        <input type="hidden" id="userid" name="userid" value="314873">
        <div class="clear"></div>
        <input type="hidden" id="resubmitToken" value="" />
        <a id="backtop" title="回到顶部" rel="nofollow"></a>
    </div>
@endsection

@section('script')
    <script src="{{env('APP_HOST')}}/style/js/delivery.js"></script>

    <script>
        $(function(){
            if("{{$tag}}" != ''){
                $("a[level='{{$tag}}']").parent().attr('class','current');
                $('.deliver').addClass('dn');
                $('.deliver').eq("{{$tag}}").removeClass('dn');
            }

            setTimeout(function () {
                $.ajax({
                    type : 'post',
                    url : "reading",
                    data : {
                        _token : "{{csrf_token()}}"
                    }
                })
            }, 2000);

            $(".reset li a").click(function(){
                var level = $(this).attr('level');
                $('.current').removeClass('current');
                $(this).parent().attr('class','current');
                $('.deliver').addClass('dn');
                $('.deliver').eq(level).removeClass('dn');
            });
            var noticeDot = $("#noticeDot-0");
            var message = $("#message");
            noticeDot.addClass('dn');
            message.html(' ');
            message.hide();
        });
    </script>

    <style>

        .no-msg-text {

            padding-top: 30px;
        }
        .no-msg-text p {
            height: 36px;
            line-height: 36px;
            margin: 0 auto;
            padding-left: 40px;
            width: 130px;
        }
        .lg_msg_avatar {
            background: #fafafa url("{{env('APP_HOST')}}/style/images/msg_popup_39fadf7.png") no-repeat 0 -16px;
        }
        .refresh_here {
            background: rgba(0, 0, 0, 0) url("{{env('APP_HOST')}}/style/css/img/refresh.png") no-repeat scroll left center;
            color: #555;
            font-size: 18px;
            padding-left: 20px;
            position: absolute;
            right: 50px;
            top: 16px;
        }
    </style>

@endsection