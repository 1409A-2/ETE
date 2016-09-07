@extends('index.lar.public')
@section('title', '待定简历')
@section('content')
<script type="text/javascript">
                                        $(function(){                                              
                                            $('.r').click(function(){
                                                $(this).parent().attr('class','read');
                                            })                                      
                                            $(document).delegate('.resume_notice','click',function(){
                                                resume_notice=$(this).attr('status');
                                                resume_no=$(this).html();
                                                rere_id=$(this).attr('data-deliverid');
                                                _this=$(this);
                                                $.ajax({
                                                    url:'nndetermined',
                                                    type:'get',
                                                    data: {remuse_resele:resume_notice,rere_id:rere_id},
                                                    success: function(a){
                                                        if(a==1){
                                                            _this.parent().parent().parent().remove();
                                                        }else{
                                                            alert(resume_no+"失败");
                                                        }
                                                    }
                                                })
                                            })

                                            $(document).delegate('#resumeInterviewAl','click',function(){
                                                var str=$(".chec[checked=checked]");
                                                var val = '';
                                                resume_notice=$(this).attr('status');
                                                for(var i=0;i<str.length;i++){
                                                    val +=','+ str.eq(i).val();

                                                }
                                                val=val.substr(1);
                                                $.ajax({
                                                    url:'nndetermineds',
                                                    type:'get',
                                                    data: {remuse_resele:resume_notice,rere_id:val},
                                                    success: function(a){
                                                        location.href='canInterviewResumes';
                                                    }
                                                })
                                            });
                                            $(document).delegate('#resumeInterviewAls','click',function(){
                                                var str=$(".chec[checked=checked]");
                                                var val = '';
                                                resume_notice=$(this).attr('status');
                                                
                                                email=$('.email').attr('em');
                                                c_name=$('.c_name').attr('c');
                                                r_name=$('.r_name').attr('r');
                                                i_name=$('.i_name').attr('i');
                                                for(var i=0;i<str.length;i++){
                                                    val +=','+ str.eq(i).val();

                                                }
                                                val=val.substr(1);
                                                $.ajax({
                                                    url:'nndeterminedsEmail',
                                                    type:'get',
                                                    data: {i_name:i_name,r_name:r_name,c_name:c_name,remuse_resele:resume_notice,email:email,rere_id:val},
                                                    success: function(a){
                                                        location.href='canInterviewResumes';
                                                    }
                                                })
                                            });
                                            $(document).delegate('.resume_notices','click',function(){
                                                resume_notice=$(this).attr('status');
                                                resume_no=$(this).html();
                                                rere_id=$(this).attr('data-deliverid');
                                                _this=$(this);
                                                email=$('.email').attr('em');
                                                c_name=$('.c_name').attr('c');
                                                r_name=$('.r_name').attr('r');
                                                i_name=$('.i_name').attr('i');
                                                $.ajax({
                                                    url:'nndeterminedEmail',
                                                    type:'get',
                                                    data: {i_name:i_name,r_name:r_name,c_name:c_name,remuse_resele:resume_notice,email:email,rere_id:rere_id},
                                                    success: function(a){
                                                        if(a==1){
                                                            _this.parent().parent().parent().remove();
                                                        }else{
                                                            alert(resume_no+"失败");
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
        <div class="content">
            <dl class="company_center_content">
                <dt>
                <h1>
                    <em></em>
                    待定简历 <span>（共{{count($resume)}}份）</span></h1>
                </dt>
                <dd>
                    <form action="canInterviewResumes.html" method="get" id="filterForm">
                        <div class="filter_actions">
                            <label class="checkbox">
                                <input type="checkbox">
                                <i></i>
                            </label>
                            <span>全选</span>
                            <!--  -->
                            <a id="resumeInterviewAls" status="1"  href="javascript:;">通知面试</a>
                              <!--  -->
                            <a id="resumeInterviewAl" status="3" href="javascript:;">不合适</a>

                            <div id="filter_btn" class="">筛选简历 <em class=""></em></div>
                        </div>
                        <!-- end .filter_actions -->


                        <div class="filter_options  dn " style="display: none;">
                            <dl>
                                <dt>简历状态：</dt>
                                <dd>
                                <input type="hidden" value="{{$read}}" id="rel">
                                @if($read==-1) 
                                    <a class="current"  href="javascript:;">不限</a>
                                @else
                                    <a href="canInterviewResumes?rel=-1&rels={{$ed_name}}">不限</a>
                                @endif 
                                 
                                @if($read==0) 
                                    <a class="current" href="javascript:;">未阅读</a>
                                @else
                                    <a href="canInterviewResumes?rel=0&rels={{$ed_name}}">未阅读</a>
                                @endif 
                                @if($read==1) 
                                    <a class="current" href="javascript:;">已阅读</a>
                                @else
                                    <a href="canInterviewResumes?rel=1&rels={{$ed_name}}">已阅读</a>
                                @endif    
                                   
                                   
                        
                                    <input type="hidden" value="-1" name="resumeStatus">
                                </dd>
                            </dl>
                           <!--  <dl>
                                <dt>简历形式：</dt>
                                <dd>
                                    <a rel="-1" class="current" href="javascript:;">不限</a>
                                    <a rel="0" href="javascript:;">附件简历</a>
                                    <a rel="1" href="javascript:;">在线简历</a>
                                    <input type="hidden" value="-1" name="resumeType">
                                </dd>
                            </dl> -->
                            <dl>
                                <dt>最低学历：</dt>
                                <dd>
                                   @foreach($education as $v)
                                @if($ed_name==$v['ed_id']) 
                                    <a class="current"  href="javascript:;">{{$v['ed_name']}}</a>
                                @else
                                    <a href="canInterviewResumes?rels={{$v['ed_id']}}&rel={{$read}}">{{$v['ed_name']}}</a>
                                @endif 
                                @endforeach
                                </dd>
                            </dl>
                            <input type="hidden" value="0" name="filterStatus" id="filterStatus">
                            <input type="hidden" value="" name="positionId" id="positionId">
                        </div>
                        <!-- end .filter_options -->
                        <ul class="reset resumeLists">
                        @foreach($resume as $v)
                            <li data-id="{{$v['rere_id']}}" class="onlineResume">
                                <label class="checkbox">
                                    <input class="chec" value="{{$v['rere_id']}}" type="checkbox">
                                    <i></i>
                                </label>
                                
                                <div class="resumeShow">
                                    <a title="预览在线简历" target="_blank" class="resumeImg"
                                       href="resumeView.html?deliverId=1686182">
                                        <img src="style/images/default_headpic.png">
                                    </a>

                                    <div class="resumeIntro">
                                    @if($v['read']==0)
                                        <h3 class="unread">
                                            <a class="r" target="_blank" title="预览jason的简历"
                                               href="preview?rere_id={{$v['rere_id']}}">
                                                {{$v['r_name']}}的简历
                                            </a>
                                            <em></em>
                                        </h3>
                                    @else
                                        <h3 class="read">
                                            <a target="_blank" title="预览jason的简历"
                                               href="preview?rere_id={{$v['rere_id']}}">
                                                {{$v['r_name']}}的简历
                                            </a>
                                            <em></em>
                                        </h3>
                                    @endif
                                        <span class="fr">投递时间:{{date('Y-m-d H:i:s',$v['delivery_time'])}}</span>

                                        <div>
                                            {{$v['r_name']}} / @if($v['r_sex']==0) 男 @else  女  @endif / {{$v['ed_name']}} /  北京 <br>
                                            {{$v['i_name']}} · {{$v['c_name']}} | {{$v['ed_name']}}
                                        </div>
                                        <div class="jdpublisher">
                                            <span>应聘职位：<a title="{{$v['i_name']}}" target="_blank"href="">{{$v['i_name']}}</a></span>
                                        </div>
                                    </div>
                                    <div class="links">
                                        <a data-deliverid="{{$v['rere_id']}}" status="1" data-name="jason" data-positionid="149594"
                                           email="{{$v['r_email']}}" class="resume_notices"
                                           href="javascript:void(0)">通知面试</a>
                                        <a data-deliverid="{{$v['rere_id']}}" status="3" class="resume_notice"
                                           href="javascript:void(0)">不合适</a>
                                        </a>
                                    </div>
                                <input type="hidden" r="{{$v['r_name']}}" class="r_name">
                                <input type="hidden" c="{{$v['c_name']}}" class="c_name">
                                <input type="hidden" i="{{$v['i_name']}}" class="i_name">
                                <input type="hidden" em="{{$v['r_email']}}" class="email">
                                </div>
                                <div class="contactInfo">
                                    <span class="c9">电话：</span>{{$v['r_photo']}} &nbsp;&nbsp;&nbsp;
                                    <span class="c9">邮箱：</span><a href="mailto:888888888@qq.com">{{$v['r_email']}}</a>
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

        <!------------------------------------- 弹窗lightbox ----------------------------------------->
        <div style="display:none;">
            <!--通知面试弹窗-->
            <div style="overflow:auto;" class="popup" id="noticeInterview">
                <form id="noticeInterviewForm">
                    <table width="100%" class="f16">
                        <tbody>
                        <tr>
                            <td width="20%" align="right" class="c9">收件人</td>
                            <td width="80%">
                                <span class="c9" id="receiveEmail"></span>
                                <input type="hidden" value="" name="email">
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><span class="redstar">*</span>主题</td>
                            <td>
                                <input type="text" placeholder="公司：职位名称面试通知" name="subject">
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><span class="redstar">*</span>面试时间</td>
                            <td>
                                <input type="text" id="datetimepicker" name="interTime" class="hasDatepicker">
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><span class="redstar">*</span>面试地点</td>
                            <td>
                                <input type="text" name="interAdd">
                            </td>
                        </tr>
                        <tr>
                            <td align="right">联系人</td>
                            <td>
                                <input type="text" name="linkMan">
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><span class="redstar">*</span>联系电话</td>
                            <td>
                                <input type="text" name="linkPhone">
                            </td>
                        </tr>
                        <tr>
                            <td valign="top" align="right">补充内容</td>
                            <td>
                                <textarea name="content"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" value="发送" class="btn">
                                <a class="emailPreview" href="javascript:;">预览</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <input type="hidden" value="" name="name">
                    <input type="hidden" value="" name="positionName">
                    <input type="hidden" value="" name="companyName">
                    <input type="hidden" value="" name="deliverId">
                </form>
            </div>
            <!--/#noticeInterview-->
</div>

<script src="style/js/core.min.js" type="text/javascript"></script>
<script src="style/js/popup.min.js" type="text/javascript"></script>

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
@endsection
