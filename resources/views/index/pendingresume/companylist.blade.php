@extends('index.lar.public')
@section('title', '一拍')
@section('content')
<input type="hidden" id="url" value="{{$_SERVER['REQUEST_URI']}}">
<script type="text/javascript">
        $(function(){                                                                              
            $(document).delegate('.resume_notice','click',function(){
                b_id=$(this).attr('data-deliverid');
                // alert(bc);return;
                _this=$(this);
                bc=3;
                $.ajax({
                    url:'beatYes',
                    type:'get',
                    data: {b_id:b_id,bc:bc},
                    success: function(a){
                        if(a==1){
                            _this.parent().html("<a data-deliverid='' status='' class='' href='javascript:void(0)'>已发送</a>");
                        }else{
                            alert("失败");
                        }
                    }
                })
            })
             $(document).delegate('.resume_notices','click',function(){
                b_id=$(this).attr('data-deliverid');
                // alert(bc);return;
                _this=$(this);
                bc=4;
                $.ajax({
                    url:'beatYes',
                    type:'get',
                    data: {b_id:b_id,bc:bc},
                    success: function(a){
                        if(a==1){
                            _this.parent().html("<a data-deliverid='' status='' class='' href='javascript:void(0)'>不合适</a>");
                        }else{
                            alert("失败");
                        }
                    }
                })
            })
        })
    </script>
<script src="style/js/job_list.min.js" type="text/javascript"></script>
    <!-- // <script src="style/js/conv.js" type="text/javascript"></script> -->
<script src="style/js/ajaxCross.json" charset="UTF-8"></script></head>
<div id="container">
 @include('index.industry.postOffice_public')
        <div class="content" >
            <dl class="company_center_content">
                <dt>
                <h1>
                    <em></em>
                    一拍信息 <span>（共{{count($companylist)}}份）</span></h1>
                </dt>
                <dd>
                    <form action="canInterviewResumes.html" method="get" id="filterForm">
                        
                        <!-- end .filter_actions -->


                        <div class="filter_options  dn " style="display: none;">
                            <dl>
                                <dt>工作经验：</dt>
                                <dd>
                                <a class="current"  href="javascript:;">全部</a> 
                                @for($i=1;$i<10;$i++)
                                    <a class="current"  href="javascript:;">{{$i}}</a>                             
                                @endfor
                                </dd>
                            </dl>
                            <input type="hidden" value="0" name="filterStatus" id="filterStatus">
                            <input type="hidden" value="" name="positionId" id="positionId">
                        </div>
                        <!-- end .filter_options -->
                        <ul class="reset resumeLists">
                        @foreach($companylist as $v)
                            <li data-id="{{$v['b_id']}}" class="onlineResume">
                                
                                
                                <div class="resumeShow">

                                    <div class="resumeIntro">
                                        <h3 class="read">
                                            <a title="预览{{$v['b_name']}}的一拍"
                                               href="#">
                                                {{$v['b_name']}}的一拍
                                            </a>
                                        </h3>
                                        <span class="fr">投递时间:{{date('Y-m-d H:i:s',$v['b_time'])}}</span>

                                        <div>
                                            {{$v['b_name']}} / @if($v['b_sex']==0) 男 @else  女  @endif / {{$v['b_workyear']}}年 /    
                                            {{$v['b_status']}} 
                                        </div>
                                        <div class="jdpublisher" style="height:50px">
                                            <span style="font-size:17px">期望工作：{{$v['b_professional']}}</span><br />
                                            <span style="font-size:17px">期望薪资：{{$v['b_salary_start']}}k-{{$v['b_salary_end']}}k</span>
                                        </div>
                                    </div>
                                    <div class="links">
                                                                                                 
                                            
                                                        @if($v['cb_cb']==2)
                                                               <a data-deliverid="{{$v['b_id']}}" status="4" class="resume_notice"
                                               href="javascript:void(0)">  发送offer </a>
                                               <a data-deliverid="{{$v['b_id']}}" status="4" class="resume_notices"
                                               href="javascript:void(0)">   不合适</a>
                                                        @else
                                                            @if($v['cb_cb']==4)
                                                <a data-deliverid="{{$v['b_id']}}" status="4" class=""
                                               href="javascript:void(0)">   不合适</a>
                                                            @else
                                                             <a data-deliverid="{{$v['b_id']}}" status="4" class="" href="javascript:void(0)">    已发送 </a>

                                                        
                                                          @endif    
                                                        @endif
                                               
                                    
                                    </div>
                                
                                <input type="hidden" i="{{$v['b_phone']}}" class="b_phone">
                                <input type="hidden" em="{{$v['b_email']}}" class="email">
                                </div>
                                <div class="contactInfo">
                                    <span class="c9">电话：</span>{{$v['b_phone']}} &nbsp;&nbsp;&nbsp;
                                    <span class="c9">邮箱：</span><a href="mailto:888888888@qq.com">{{$v['b_email']}}</a>
                                </div>
                            </li>
                    @endforeach
                        </ul>
                        <!-- end .resumeLists -->
                    </form>
                </dd>
            </dl>
            <!-- end .company_center_content -->
        </div>
        <!-- end .content -->
@endsection
</div>

<!--  -->


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
<div class="ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" id="ui-datepicker-div"></div>
</body></html>

