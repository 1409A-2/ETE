
<html>
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>简历预览-校易聘平台</title>
    <link href="{{env('APP_HOST')}}/style/css/style.css" type="text/css" rel="stylesheet">
    <link href="{{env('APP_HOST')}}/style/css/colorbox.min.css" type="text/css" rel="stylesheet">
    <link href="{{env('APP_HOST')}}/style/css/popup.css" type="text/css" rel="stylesheet">

    <script type="text/javascript" src="{{env('APP_HOST')}}/style/js/jquery.1.10.1.min.js"></script>

    <script src="{{env('APP_HOST')}}/style/js/jquery.colorbox-min.js" type="text/javascript"></script>
    <script>
        $(function () {
            $("body").on("click", "a.btn_s", function () {
                $.colorbox.close();
                parent.jQuery.colorbox.close();
            });
            $(".inline").colorbox({
                inline: true
            });
        });
    </script>
    <script src="style/js/ajaxCross.json" charset="UTF-8"></script>
</head>
<body>
<div id="previewWrapper">
    <div class="preview_header">
        <h1 title="jason的简历">{{$res['r_name']}} 的简历</h1>
        <a title="下载简历" class="inline cboxElement" href="#downloadOnlineResume">下载该简历</a>
    </div>
    <!--end .preview_header-->

    <div class="preview_content">
        <div class="profile_box" id="basicInfo">
            <h2>基本信息</h2>

            <div class="basicShow">
                   <span>{{$res['r_name']}} |  @if($res['u_sex']==0) 男 @else  女  @endif |{{$res['ed_name']}} |广州<br>
                     {{$res['ed_name']}}· {{$res['s_name']}}<br>
            			            			{{$res['r_photo']}} | {{$res['r_email']}}<br>
            			
            		</span>

                <div class="m_portrait">
                    <img width="120" height="120" alt="jason" src="style/images/default_headpic.png">
                </div>
            </div>
            <!--end .basicShow-->
        </div>
        <!--end #basicInfo-->

        <div class="profile_box" id="expectJob">
            <h2>期望工作</h2>

            <div class="expectShow">
                月薪{{$res['re_salarymin']}}k-{{$res['re_salarymax']}}k，{{$res['ex_name']}}
            </div>
            <!--end .expectShow-->
        </div>


        <div class="profile_box" id="projectExperience">
            <h2>项目经验</h2>

            <div class="projectShow">
                <ul class="plist clearfix">
                @foreach($porject as $v)
                    <li class="noborder">
                        <div class="projectList">
                            <div class="f16 mb10">{{$v['p_name']}}<span class="c9">({{date('Y-m-d H:i:s',$v['p_start_time'])}}——{{date('Y-m-d H:i:s',$v['p_end_time'])}})</span>
                            </div>
                            <div class="dl1"></div>
                        </div>
                    </li>
                @endforeach
                </ul>
            </div>
            <!--end .projectShow-->
        </div>
        <!--end #projectExperience-->

        <div class="profile_box" id="educationalBackground">
            <h2>教育背景</h2>

            <div class="educationalShow">
                <ul class="elist clearfix">
                    <li class="clear">
                        <span class="c9">{{date('Y-m-d',$res['s_start_time'])}}——{{date('Y-m-d',$res['s_end_time'])}}</span>

                        <div>
                            <h3>{{$res['s_name']}}</h3>
                            <h4>{{$res['s_major']}}，{{$res['ed_name']}}</h4>
                        </div>
                    </li>
                </ul>
            </div>
            <!--end .educationalShow-->
        </div>
        <!--end #educationalBackground-->

        <div class="profile_box" id="selfDescription">
            <h2>自我描述</h2>

            <div class="descriptionShow">
                {{$res['r_desc']}}
            </div>
            <!--end .descriptionShow-->
        </div>
        <!--end #selfDescription-->

        <div class="profile_box" id="worksShow">
            <h2>作品展示</h2>

            <div class="workShow">
                <ul class="slist clearfix">
                @foreach($works as $v)
                    <li class="noborder">
                        <div class="workList c7">
                             项目：{{$v['w_name']}} <em></em>
                            <div class="f16">网址：<a target="_blank" href="{{$v['w_url']}}">{{$v['w_url']}}</a></div>
                            
                        </div>
                    </li>
                @endforeach
                </ul>
            </div>
            <!--end .workShow-->
        </div>
        <!--end #worksShow-->
    </div>
    <!--end .preview_content-->
</div>
<!--end #previewWrapper-->

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
                    <a class="btn_s" href="downloadResume?key={{csrf_token()}}&type=1&rere_id={{$res['rere_id']}}&name={{$res['r_name']}}">word格式</a>
                    <a class="btn_s" href="downloadResume?key={{csrf_token()}}&type=2&rere_id={{$res['rere_id']}}&name={{$res['r_name']}}">html格式</a>
                    <a class="btn_s" href="downloadResume?key={{csrf_token()}}&type=3&rere_id={{$res['rere_id']}}&name={{$res['r_name']}}">pdf格式</a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <!--/#downloadOnlineResume-->
</div>
