 @extends('index.lar.public')
@section('title', '发布新职位')
@section('content')
                <div id="container">
        @include('index.industry.postOffice_public')
        <!-- end .sidebar -->
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
                                    <a target="_blank" title="{{$v['re_name']}}" href="#">{{$v['re_name']}}</a>
                                    <span>{{$v['re_address']}}</span>
                                </h3>
                                <span class="receivedResumeNo"><a
                                        href="unHandleResumes.html?positionId=149594">应聘简历（）</a></span>

                                <div>全职 / {{$v['re_salarymin']}}k-{{$v['re_salarymax']}}k / {{$v['re_education']}}以上</div>
                                <div class="c9">发布时间： {{date('Y-m-d H:i:s',$v['re_time'])}}</div>
                                <div class="links">
                                    <a class="job_refresh" href="javascript:void(0)">刷新<span>每个职位7天内只能刷新一次</span></a>
                                    <a target="_blank" class="job_edit" href="postOffice?positionId=149594">编辑</a>
                                    <a class="job_offline" href="javascript:void(0)">下线</a>
                                    <a class="job_del" href="javascript:void(0)">删除</a>
                                </div>
                            </li>
                        @endforeach
                        </ul>
                    </form>
                </dd>
            </dl>
        </div>
        <!-- end .content -->
        <script src="style/js/job_list.min.js" type="text/javascript"></script>
        <div class="clear"></div>
        <input type="hidden" value="{{csrf_token()}}" id="resubmitToken">
        <a rel="nofollow" title="回到顶部" id="backtop"></a>
    </div>
    <!-- end #container -->
</div>
<!-- end #body -->


@section('script')
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
@endsection
<div id="cboxOverlay" style="display: none;"></div>
<div id="colorbox" class="" role="dialog" tabindex="-1" style="display: none;">
    <div id="cboxWrapper">
        <div>
            <div id="cboxTopLeft" style="float: left;"></div>
            <div id="cboxTopCenter" style="float: left;"></div>
            <div id="cboxTopRight" style="float: left;"></div>
        </div>
        <div style="clear: left;">
            <div id="cboxMiddleLeft" style="float: left;"></div>
            <div id="cboxContent" style="float: left;">
                <div id="cboxTitle" style="float: left;"></div>
                <div id="cboxCurrent" style="float: left;"></div>
                <button type="button" id="cboxPrevious"></button>
                <button type="button" id="cboxNext"></button>
                <button id="cboxSlideshow"></button>
                <div id="cboxLoadingOverlay" style="float: left;"></div>
                <div id="cboxLoadingGraphic" style="float: left;"></div>
            </div>
            <div id="cboxMiddleRight" style="float: left;"></div>
        </div>
        <div style="clear: left;">
            <div id="cboxBottomLeft" style="float: left;"></div>
            <div id="cboxBottomCenter" style="float: left;"></div>
            <div id="cboxBottomRight" style="float: left;"></div>
        </div>
    </div>
    <div style="position: absolute; width: 9999px; visibility: hidden; display: none;"></div>
</div>
@endsection