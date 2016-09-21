<link rel="Shortcut Icon" href="h/images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="{{env('APP_HOST')}}/style/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="{{env('APP_HOST')}}/style/css/external.min.css"/>
    <link rel="stylesheet" type="text/css" href="{{env('APP_HOST')}}/style/css/popup.css"/>
    <script src="{{env('APP_HOST')}}/style/js/jquery.1.10.1.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="{{env('APP_HOST')}}/style/js/jquery.lib.min.js"></script>
    <script src="{{env('APP_HOST')}}/style/js/ajaxfileupload.js" type="text/javascript"></script>
    <script type="text/javascript" src="{{env('APP_HOST')}}/style/js/additional-methods.js"></script>

    <div id="previewWrapper">
        <div class="preview_header">
            <h1 title="{{$resume['r_name']}}的简历">{{$resume['r_name']}}的简历</h1>

            <a title="下载简历" class="inline cboxElement" href="#downloadOnlineResume">下载该简历</a>

        </div>
        <!--end .preview_header-->

        <div class="preview_content">
            <div class="profile_box" id="basicInfo">
                <h2>基本信息</h2>
                @if($resume)
                    <div class="basicShow">
                   <span>{{$resume['r_name']}} |
                       @if($resume['r_sex']==0)男@else女@endif |                     @if($resume['r_education']==1)
                           大专@elseif($resume['r_education']==2)本科@elseif($resume['r_education']==3)
                           硕士@elseif($resume['r_education']==4)博士@elseif($resume['r_education']==5)其他@endif  |                                       		3年工作经验
            		            			<br>

            			            			{{$resume['r_photo']}} | {{$resume['r_email']}}<br>
            			
            		</span>

                        <div class="m_portrait">
                            <div></div>
                            <img width="120" height="120" src="{{env('APP_HOST')}}/{{$resume['r_img']}}">
                        </div>
                    </div>
                @endif
            </div>

            <div class="profile_box" id="expectJob">
                <h2>期望工作</h2>

                <div class="expectShow">
                    全职，月薪{{$expected['re_salarymin']}}k-{{$expected['re_salarymax']}}k，{{$expected['ex_name']}}
                </div>
                <!--end .expectShow-->
            </div>
            <!--end #expectJob-->




            <div class="profile_box" id="projectExperience">
                <h2>项目经验</h2>
            @if($porject)
                @foreach($porject as $v)
                <div class="projectShow">
                    <ul class="plist clearfix">
                        <li class="noborder">
                            <div class="projectList">
                                <div class="f16 mb10">{{$v['p_name']}},{{$v['p_duties']}}
		            						<span class="c9">
		            									            								（{{date('Y.m',$v['p_start_time'])}}-{{date('Y.d',$v['p_end_time'])}}）
		            									            						</span>
                                </div>
                                <div class="dl1"></div>
                            </div>
                        </li>
                    </ul>
                </div>
                    @endforeach
                @endif
                <!--end .projectShow-->
            </div>
            <!--end #projectExperience-->

            <div class="profile_box" id="educationalBackground">
                <h2>教育背景</h2>
                @if($school)
                <div class="educationalShow">
                    <ul class="elist clearfix">
                        <li class="clear">
                            <span class="c9">{{date('Y',$school['s_start_time'])}}-{{date('Y',$school['s_end_time'])}}</span>

                            <div>
                                <h3>{{$school['s_name']}}</h3>
                                <h4>{{$school['s_major']}}， @if($resume['r_education']==1)
                                        大专@elseif($resume['r_education']==2)本科@elseif($resume['r_education']==3)
                                        硕士@elseif($resume['r_education']==4)博士@elseif($resume['r_education']==5)其他@endif </h4>
                            </div>
                        </li>
                    </ul>
                </div>
                @endif
            </div>
            <!--end #educationalBackground-->

            <div class="profile_box" id="selfDescription">
                <h2>自我描述</h2>
                @if($resume['r_desc'])
                <div class="descriptionShow">
                         {{$resume['r_desc']}}
                </div>
                    @endif

                <!--end .descriptionShow-->
            </div>
            <!--end #selfDescription-->

            <div class="profile_box" id="worksShow">
                <h2>作品展示</h2>
                @if($works)
                    @foreach($works as $v)
                <div class="workShow">
                    <ul class="slist clearfix">
                        <li class="noborder">
                            <div class="workList c7">
                                <div class="f16">网址：<a target="_blank" href="{{$v['w_url']}}">{{$v['w_url']}}</a>
                                </div>
                                <p>{{$v['w_desc']}} </p>
                            </div>
                        </li>
                    </ul>
                </div>
                    @endforeach
            @endif
            </div>
            <!--end #worksShow-->
        </div>
        <!--end .preview_content-->
    </div><!--end #previewWrapper-->
    <script>
        $(function(){
            $("body").on("click","a.btn_s",function(){
                $.colorbox.close();
                parent.jQuery.colorbox.close();
            });
            $(".inline").colorbox({
                inline:true
            });
        });
    </script>
    <!-------------------------------------弹窗lightbox ----------------------------------------->

    <div style="display:none;">
        <!-- 下载简历 -->

        <div class="popup" id="downloadOnlineResume">
            <table width="100%">
                <tbody>
                <tr>
                    <td class="c5 f18">请选择下载简历格式：</td>
                </tr>
                <tr>
                    <td>
                        <a class="btn_s" href="{{url('downloadResume')}}?key={{csrf_token()}}&type=1&r_id={{$resume['r_id']}}&name={{$resume['r_name']}}">word格式</a>
                        <a class="btn_s" href="{{url('downloadResume')}}?key={{csrf_token()}}&type=2&r_id={{$resume['r_id']}}&name={{$resume['r_name']}}">html格式</a>
                        <a class="btn_s" href="{{url('downloadResume')}}?key={{csrf_token()}}&type=3&r_id={{$resume['r_id']}}&name={{$resume['r_name']}}">pdf格式</a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>




        <!--/#downloadOnlineResume-->
    </div>




