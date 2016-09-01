@extends('index.lar.public')
@section('title', '发布新职位')
@section('content')
       <script type="text/javascript">
        var ctx = "http://www.lagou.com";
        console.log(1);
    </script>
    <link href="http://www.lagou.com/images/favicon.ico" rel="Shortcut Icon">
    <link href="style/css/style.css" type="text/css" rel="stylesheet">
    <link href="style/css/external.min.css" type="text/css" rel="stylesheet">
    <link href="style/css/popup.css" type="text/css" rel="stylesheet">
    <script src="{{env('APP_HOST')}}/style/js/jq.js" type="text/javascript"></script>

    <!-- // <script type="text/javascript" src="style/js/jquery.1.10.1.min.js"></script> -->
    <script src="style/js/jquery.lib.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="style/js/ajaxfileupload.js"></script>
    <script src="style/js/additional-methods.js" type="text/javascript"></script>
    <!--[if lte IE 8]>
        <script type="text/javascript" src="style/js/excanvas.js"></script>
    <![endif]-->
    <script type="text/javascript">
        var youdao_conv_id = 271546;
    </script>
    <script src="style/js/conv.js" type="text/javascript"></script>


    <div id="container">

        <div class="sidebar">
            <a class="btn_create" href="">发布新职位</a>
            <dl class="company_center_aside">
                <dt>我收到的简历</dt>
                <dd>
                    <a href="">待处理简历</a>
                </dd>
                <dd>
                    <a href="canInterviewResumes.html">待定简历</a>
                </dd>
                <dd>
                    <a href="haveNoticeResumes.html">已通知面试简历</a>
                </dd>
                <dd>
                    <a href="haveRefuseResumes.html">不合适简历</a>
                </dd>
                <dd class="btm">
                    <a href="autoFilterResumes.html">自动过滤简历</a>
                </dd>
            </dl>
            <dl class="company_center_aside">
                <dt>我发布的职位</dt>
                <dd>
                    <a href="positions.html">有效职位</a>
                </dd>
                <dd>
                    <a href="positions.html">已下线职位</a>
                </dd>
            </dl>
            <div class="subscribe_side mt20">
                <div class="f14">想收到更多更好的简历？</div>
                <div class="f18 mb10">就用拉勾招聘加速助手 </div>
                <div>咨询：<a class="f16" href="mailto:jessica@lagou.com">jessica@lagou.com</a></div>
                <div class="f18 ti2em">010-57286512</div>
            </div>
            <div class="subscribe_side mt20">
                <div class="f14">加入互联网HR交流群</div>
                <div class="f18 mb10">跟同行聊聊</div>
                <div class="f24">338167634</div>
            </div>            </div><!-- end .sidebar -->
        <div class="content">
            <dl class="company_center_content">
                <dt>
                <h1>
                    <em></em>
                    发布新职位
                </h1>
                </dt>
                <dd>
                    <div class="ccc_tr">今日已发布 <span>0</span> 个职位   还可发布 <span>5</span> 个职位</div>
                    <form action="postOffice_add" method="post" id="jobForm">
                        <!-- <input type="hidden" value="{{csrf_token()}}" name="resubmitToken"> -->
                        <input type="hidden" value="" name="id">
                        <input type="hidden" value="create" name="preview">
                        <input type="hidden" value="{{$company['c_id']}}" id="c_id" name="c_id">
                        <input type="hidden" value="{{csrf_token()}}" name="resubmitToken">
                        <table class="btm">
                            <tbody><tr>
                                <td width="25"><span class="redstar">*</span></td>
                                <td width="85">职位类别</td>
                                <td>
                                    <input type="hidden" id="positionType" value="" name="positionType">
                                    <input type="button" value="请选择职位类别" id="select_category" class="selectr selectr_380">
                                    <div class="dn" id="box_job" style="display: none;">

<dl>
    @foreach($industry as $v)
        @if($v['level']==0)
            <dt>{{$v['i_name']}}</dt>
            <dd>
            @foreach($industry as $k)
                <ul class="reset job_main">
                    @if($k['i_pid']==$v['i_id'])
                        <li>        	
                            <span>{{$k['i_name']}}</span>			
                            <ul class="reset job_sub dn">
                           		@foreach($industry as $kv)           		
                					@if($kv['i_pid']==$k['i_id'])
                	                <li>{{$kv['i_name']}}</li>
                					@endif
                				@endforeach
                            </ul>                        
                        </li>
                    @endif
                </ul>
            @endforeach
            </dd>
        @endif
    @endforeach
</dl>

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="redstar">*</span></td>
                                <td>职位名称</td>
                                <td>
                                    <input type="text" placeholder="请输入职位名称，如：产品经理" value="" name="positionName" id="positionName">
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>所属部门</td>
                                <td>
                                    <input type="text" placeholder="请输入所属部门" value="" name="department" id="department">
                                </td>
                            </tr>
                            </tbody></table>

                        <table class="btm">
                            <tbody><tr>
                                <td width="25"><span class="redstar">*</span></td>
                                <td width="85">工作性质</td>
                                <td>
                                    <ul class="profile_radio clearfix reset">
                                        <li>
                                            全职<em></em>
                                            <input type="radio" name="jobNature" value="全职">
                                        </li>                                     
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="redstar">*</span></td>
                                <td>月薪范围</td>
                                <!--<h3><span>(最高月薪不能大于最低月薪的2倍)</span></h3> -->
                                <td>
                                    <div class="salary_range">
                                        <div>
                                            <input type="text" placeholder="最低月薪" value="" id="salaryMin" name="salaryMin">
                                            <span>k</span>
                                        </div>
                                        <div>
                                            <input type="text" placeholder="最高月薪" value="" id="salaryMax" name="salaryMax">
                                            <span>k</span>
                                        </div>
                                        <span>只能输入整数，如：9</span>
                                    </div>
                                </td>
                            </tr>
                            <!-- <tr>
                                <td><span class="redstar">*</span></td>
                                <td>工作城市</td>
                                <td>
                                    <input type="text" placeholder="请输入工作城市，如：北京" value="上海" name="workAddress" id="workAddress">
                                </td>
                            </tr> -->
                            </tbody></table>

                        <table class="btm">
                            <tbody>
                            <tr>
                                <td><span class="redstar">*</span></td>
                                <td>学历要求</td>
                                <!--<h3><span>(最高月薪不能大于最低月薪的2倍)</span></h3> -->
                                <td>
                                    <input type="hidden" id="education" value="" name="education">
                                    <input type="button" value="请选择学历要求" id="select_education" class="selectr selectr_380">
                                    <div class="boxUpDown boxUpDown_380 dn" id="box_education" style="display: none;">
                                        <ul>
								@foreach($education as $e)
                                            <li>
                                                {{$e['ed_name']}}
                                            </li>
								@endforeach
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            </tbody></table>

                        <table class="btm">
                            <tbody><tr>
                                <td width="25"><span class="redstar">*</span></td>
                                <td width="85">职位诱惑</td>
                                <td>
                                    <input type="text" placeholder="20字描述该职位的吸引力，如：福利待遇、发展前景等" value="" name="positionAdvantage" class="input_520" id="positionAdvantage">
                                </td>
                            </tr>
                            <tr>
                                <td><span class="redstar">*</span></td>
                                <td>职位描述</td>
                                <td>
                                    <span class="c9 f14">(建议分条描述工作职责等。请勿输入公司邮箱、联系电话及其他外链，否则将自动删除)</span>
                                    <textarea name="re_desc" id="re_desc" cols="30" rows="10"></textarea>

                                </td>
                            </tr>
                            <tr>
                                <td><span class="redstar">*</span></td>
                                <td>工作地址</td>
                                <td>
                                    <input type="text" placeholder="请输入详细的工作地址" value="" name="positionAddress" class="input_520" id="positionAddress">
                                    <input type="hidden" value="" name="positionLng" id="lng">
                                    <input type="hidden" value="" name="positionLat" id="lat">
                                    <div class="work_place f14">我们将在职位详情页以地图方式精准呈现给用户  <a id="mapPreview" href="javascript:;">预览地图</a></div>
                                </td>
                            </tr>
                            </tbody></table>

                        <table>
                            <tbody><tr>
                                <td width="25"><span class="redstar">*</span></td>
                                <td colspan="2">
                                    接收简历邮箱： <span id="receiveEmailVal">{{$company['c_email']}}</span>
                                    <input type="hidden" value="admin@admin.com" id="receiveEmail" name="email">
                                </td>
                            </tr>
                           
                            <tr>
                                <td width="25"></td>
                                <td colspan="2">
                                    <input type="submit" value="预览" id="jobPreview" class="btn_32">
                                    <input type="button" value="发布" id="formSubmit" class="btn_32">
                                </td>
                            </tr>
                            </tbody></table>
                    </form>
                </dd>
            </dl>
        </div><!-- end .content -->
            <!--地图弹窗-->
   
         		<div class="popup" id="baiduMap" >
                <div class="mb10">点击地图可重新定位公司所在的位置</div>
                <div id="allmap" style="overflow: hidden; position: relative; z-index: 0; background-color: rgb(243, 241, 236); color: rgb(0, 0, 0); text-align: left;"><div style="overflow: visible; position: absolute; z-index: 0; left: 0px; top: 0px; cursor: grab;"><div class="BMap_mask" style="position: absolute; left: 0px; top: 0px; z-index: 9; overflow: hidden; width: 0px; height: 0px;"></div><div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 200;"><div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 800;"></div><div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 700;"></div><div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 600;"></div><div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 500;"><label class="BMapLabel" unselectable="on" style="position: absolute; -moz-user-select: none; display: none; cursor: inherit; background-color: rgb(190, 190, 190); border: 1px solid rgb(190, 190, 190); padding: 1px; white-space: nowrap; font: 12px arial,simsun,sans-serif; z-index: -20000; color: rgb(190, 190, 190);">shadow</label></div><div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 400;"></div><div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 300;"></div><div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 201;"></div><div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 200;"></div></div><div style="position: absolute; overflow: visible; top: 0px; left: 0px; z-index: 1;"><div style="position: absolute; overflow: visible; z-index: -100; left: 0px; top: 0px; display: none;"></div></div><div style="position: absolute; overflow: visible; top: 0px; left: 0px; z-index: 2; display: block;"><div style="position: absolute; overflow: visible; top: 0px; left: 0px; z-index: 0; display: block;"><canvas style="position: absolute; width: 256px; height: 256px; left: -74px; top: -213px; background: none repeat scroll 0% 0% rgb(243, 241, 236);" width="256" height="256" id="_1_bg_6323_2355_15"></canvas></div><div style="position: absolute; overflow: visible; top: 0px; left: 0px; z-index: 10; display: block;"><canvas style="position: absolute; width: 256px; height: 256px; left: -74px; top: -213px;" width="256" height="256" id="_1_poi_6323_2355_15"></canvas></div></div><div style="position: absolute; overflow: visible; top: 0px; left: 0px; z-index: 3;"></div></div><div style="position: absolute; z-index: 1201; top: 10px; right: 10px; width: 17px; height: 16px; background: url(style/images/img/st-close.pngquot) no-repeat scroll 0% 0% transparent; cursor: pointer; display: none;" title="退出全景"></div><div style="height: 32px; position: absolute; z-index: 30; -moz-user-select: none; bottom: 0px; right: auto; top: auto; left: 1px; display: none;" class=" anchorBL"><a title="到百度地图查看此区域" target="_blank" href="http://map.baidu.com/?sr=1" style="outline: medium none;"><img src="style/images/copyright_logo.png" style="border:none;width:77px;height:32px"></a></div><div style="position:absolute;z-index:0;top:0px;left:0px;overflow:hidden;visibility:hidden;cursor:-moz-grab" id="zoomer"><div style="top:0;left:0;" class="BMap_zoomer"></div><div style="top:0;right:0;" class="BMap_zoomer"></div><div style="bottom:0;left:0;" class="BMap_zoomer"></div><div style="bottom:0;right:0;" class="BMap_zoomer"></div></div><div unselectable="on" class=" BMap_stdMpCtrl BMap_stdMpType0 BMap_noprint anchorTL" style="width: 62px; height: 186px; bottom: auto; right: auto; top: 10px; left: 10px; position: absolute; z-index: 1100; -moz-user-select: none;"><div class="BMap_stdMpPan"><div title="向上平移" class="BMap_button BMap_panN"></div><div title="向左平移" class="BMap_button BMap_panW"></div><div title="向右平移" class="BMap_button BMap_panE"></div><div title="向下平移" class="BMap_button BMap_panS"></div><div class="BMap_stdMpPanBg BMap_smcbg"></div></div><div class="BMap_stdMpZoom" style="height: 141px; width: 62px;"><div title="放大一级" class="BMap_button BMap_stdMpZoomIn"><div class="BMap_smcbg"></div></div><div title="缩小一级" class="BMap_button BMap_stdMpZoomOut" style="top: 120px;"><div class="BMap_smcbg"></div></div><div class="BMap_stdMpSlider" style="height: 102px;"><div class="BMap_stdMpSliderBgTop" style="height: 102px;"><div class="BMap_smcbg"></div></div><div class="BMap_stdMpSliderBgBot" style="top: 19px; height: 87px;"></div><div title="放置到此级别" class="BMap_stdMpSliderMask"></div><div title="拖动缩放" class="BMap_stdMpSliderBar" style="cursor: grab; top: 19px;"><div class="BMap_smcbg"></div></div></div><div class="BMap_zlHolder"><div class="BMap_zlSt"><div class="BMap_smcbg"></div></div><div class="BMap_zlCity"><div class="BMap_smcbg"></div></div><div class="BMap_zlProv"><div class="BMap_smcbg"></div></div><div class="BMap_zlCountry"><div class="BMap_smcbg"></div></div></div></div></div><div unselectable="on" style="bottom: auto; right: 10px; top: 10px; left: auto; white-space: nowrap; cursor: pointer; position: absolute; z-index: 10; -moz-user-select: none;" class=" BMap_noprint anchorTR"><div style="-moz-user-select: none; float: left;"><div style="-moz-user-select: none; box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.35); border-left: 1px solid rgb(139, 164, 220); border-top: 1px solid rgb(139, 164, 220); border-bottom: 1px solid rgb(139, 164, 220); background: none repeat scroll 0% 0% rgb(142, 168, 224); padding: 2px 6px; font: bold 12px/1.3em arial,simsun,sans-serif; text-align: center; white-space: nowrap; border-radius: 3px 0px 0px 3px; color: rgb(255, 255, 255);" title="显示普通地图">地图</div></div><div style="-moz-user-select: none; float: left;"><div style="-moz-user-select: none; box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.35); border-left: 1px solid rgb(139, 164, 220); border-top: 1px solid rgb(139, 164, 220); border-bottom: 1px solid rgb(139, 164, 220); background: none repeat scroll 0% 0% rgb(255, 255, 255); padding: 2px 6px; font-family: arial,simsun,sans-serif; font-style: normal; font-variant: normal; font-size: 12px; line-height: 1.3em; font-size-adjust: none; font-stretch: normal; -moz-font-feature-settings: normal; -moz-font-language-override: normal; text-align: center; white-space: nowrap; color: rgb(0, 0, 0);" title="显示卫星影像">卫星</div><div style="-moz-user-select: none; position: absolute; top: 0px; left: 0px; z-index: -1; display: none;"><div style="border-right:1px solid #8ba4dc;border-bottom:1px solid #8ba4dc;border-left:1px solid #8ba4dc;background:white;font:12px arial,simsun,sans-serif;padding:0 8px 0 6px;line-height:1.6em;box-shadow:2px 2px 3px rgba(0, 0, 0, 0.35)" title="显示带有街道的卫星影像"><span class="BMap_checkbox"  checked="checked"></span><label style="vertical-align: middle; cursor: pointer;">混合</label></div></div></div><div style="-moz-user-select: none; float: left;"><div style="-moz-user-select: none; box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.35); border-left: 1px solid rgb(139, 164, 220); border-width: 1px; border-style: solid; border-color: rgb(139, 164, 220); background: none repeat scroll 0% 0% rgb(255, 255, 255); padding: 2px 6px; font-family: arial,simsun,sans-serif; font-style: normal; font-variant: normal; font-size: 12px; line-height: 1.3em; font-size-adjust: none; font-stretch: normal; -moz-font-feature-settings: normal; -moz-font-language-override: normal; text-align: center; white-space: nowrap; border-radius: 0px 3px 3px 0px; color: rgb(0, 0, 0);" title="显示三维地图">三维</div></div></div><div unselectable="on" class=" BMap_scaleCtrl BMap_noprint anchorBL" style="bottom: 18px; right: auto; top: auto; left: 81px; width: 88px; position: absolute; z-index: 10; -moz-user-select: none;"><div unselectable="on" class="BMap_scaleTxt" style="background-color: transparent; color: black;">500&nbsp;米</div><div class="BMap_scaleBar BMap_scaleHBar" style="background-color: black;"><img src="style/images/mapctrls.png" style="border:none"></div><div class="BMap_scaleBar BMap_scaleLBar" style="background-color: black;"><img src="style/images/mapctrls.png" style="border:none"></div><div class="BMap_scaleBar BMap_scaleRBar" style="background-color: black;"><img src="style/images/mapctrls.png" style="border:none"></div></div><div unselectable="on" class=" BMap_omCtrl BMap_ieundefined BMap_noprint anchorBR quad4" style="width: 13px; height: 13px; bottom: 0px; right: 0px; top: auto; left: auto; position: absolute; z-index: 10; -moz-user-select: none;"><div class="BMap_omOutFrame" style="width: 149px; height: 149px;"><div class="BMap_omInnFrame" style="bottom: auto; right: auto; top: 5px; left: 5px; width: 142px; height: 142px;"><div class="BMap_omMapContainer"></div><div class="BMap_omViewMv" style="cursor: grab;"><div class="BMap_omViewInnFrame"><div></div></div></div></div></div><div class="BMap_omBtn BMap_omBtnClosed" style="bottom: 0px; right: 0px; top: auto; left: auto;"></div></div><div unselectable="on" class=" BMap_cpyCtrl BMap_noprint anchorBL" style="cursor: default; white-space: nowrap; -moz-user-select: none; color: black; background: none repeat scroll 0% 0% transparent; font: 11px/15px arial,simsun,sans-serif; bottom: 2px; right: auto; top: auto; left: 4px; position: absolute; z-index: 10;"><span _cid="1" style="display: inline;"><span style="font-size:11px">&copy; 2014 Baidu&nbsp;- Data &copy; <a style="display:inline;" href="http://www.navinfo.com/" target="_blank">NavInfo</a> &amp; <a style="display:inline;" href="http://www.cennavi.com.cn/" target="_blank">CenNavi</a> &amp; <a style="display:inline;" href="http://www.365ditu.com/" target="_blank">道道通</a></span></span></div></div>
            <input type="hidden" id="experience" value="不限" name="workYear">
            <input type="hidden"  value="北京" name="workAddress" id="workAddress">
            </div>
            <!--/#baiduMap-->
        </div>
         <!-- // <script type="text/javascript" src="style/js/tinymce.min.js"></script> -->
        <!------------------------------------- end ----------------------------------------->
        <!-- 
        <script>
        $(function(){

            /*textarea 编辑器*/
            tinymce.init({
                selector: "textarea.tinymce",
                // width: 100,
                height: 225,
                language: "zh_CN",
                content_css: ctx + "/js/tinymce4/content.css",
                plugins: "contextmenu autolink code paste searchreplace",
                contextmenu: "copy cut paste",
                // paste_word_valid_elements: "",
                paste_as_text: true,
                // paste_webkit_styles: "color",//all | none
                // paste_retain_style_properties: "font-size",//
                menubar: false,
                statusbar: false,
                toolbar: [
                    "undo redo | bold italic underline strikethrough | bullist numlist | alignleft aligncenter alignright | removeformat | code"
                ],
                save_enablewhendirty: function(e) {
                    console.log('dirty',e);
                },
                save_onsavecallback: function(e){
                    console.log('save',e);
                },
                setup: function (editor) {
                    editor.on('keyup', function (e) {
                        tinyMCE.triggerSave();
                        var editorContent = tinyMCE.get(editor.id).getContent();
                        if(editorContent.length > 20){
                            $("#" + editor.id).valid();
                        }
                    });
                }
            });
        });
        </script> -->

        <!-- old -->
        <script src="style/js/jquery.tinymce.js" type="text/javascript"></script>
        <script>
            // $(function(){

                /***********************************************
                 ** textarea 编辑器
                //  */
                // $('textarea.tinymce').tinymce({
                //     // Location of TinyMCE script
                //     script_url : ctx+'/js/tinymce/jscripts/tiny_mce/tiny_mce.js',

                //     // General options
                //     theme : "advanced",
                //     language : "zh-cn",
                //     plugins : "paste,autolink,lists,style,layer,save,advhr,advimage,advlink,iespell,inlinepopups,preview,media,searchreplace,contextmenu,fullscreen,noneditable,visualchars,nonbreaking",

                //     // Theme options
                //     theme_advanced_buttons1 : "bold,italic,underline,|,justifyleft,justifycenter,justifyright,|,bullist,numlist,|,outdent,indent,|,undo,redo,|,link,unlink,|,hr,fullscreen,image",
                //     theme_advanced_toolbar_location : "top",
                //     theme_advanced_toolbar_align : "left",
                //     theme_advanced_statusbar_location : "none",//定义输入框下方是否显示状态栏，默认不显示
                //     theme_advanced_resizing : false,
                //     paste_auto_cleanup_on_paste: true,
                //     paste_as_text: true,
                //     auto_cleanup_word:true,
                //     paste_remove_styles: true,
                //     contextmenu: "copy cut paste",
                //     force_br_newlines: true,
                //     force_p_newlines: false,
                //     apply_source_formatting: false,
                //     remove_linebreaks: false,
                //     convert_newlines_to_brs: true,

                //     // Example content CSS (should be your site CSS)
                //     content_css : ctx+"/js/tinymce/examples/css/content.css",

                //     // Drop lists for link/image/media/template dialogs
                //     template_external_list_url : "lists/template_list.js",
                //     external_link_list_url : "lists/link_list.js",

                //     // Replace values for the template plugin
                //     template_replace_values : {
                //         username : "Some User",
                //         staffid : "991234"
                //     },
                //     onchange_callback: function(editor){
                //         tinyMCE.triggerSave();
                //         var editorContent = tinyMCE.get(editor.id).getContent();
                //         if(editorContent.length > 20){
                //             $("#" + editor.id).valid();
                //         }
                //     }
                // });


        </script>
        <!-- end old -->

        <script src="style/js/jobs.min.js" type="text/javascript"></script>
        <script src="http://api.map.baidu.com/api?v=2.0&amp;ak=A2c1a1ff1fe0750e3290660295aac602" type="text/javascript"></script><script src="http://api.map.baidu.com/getscript?v=2.0&amp;ak=A2c1a1ff1fe0750e3290660295aac602&amp;services=&amp;t=20140617153133" type="text/javascript"></script>
        <script type="text/javascript">
            //百度地图API功能
            var map = new BMap.Map("allmap");
            //控件添加
            map.addControl(new BMap.NavigationControl());
            map.addControl(new BMap.MapTypeControl());
            map.addControl(new BMap.ScaleControl());
            map.addControl(new BMap.OverviewMapControl());

            var point = new BMap.Point(116.331398,39.897445);//初始化坐标点
            map.centerAndZoom(point, 15);
            /* map.centerAndZoom(, 15); */
            map.enableScrollWheelZoom(true);//允许缩放
            var gc = new BMap.Geocoder();//地址定位
            var local = new BMap.LocalSearch(map, {
                renderOptions:{map: map}
            });
            function showInfo(e){
                map.clearOverlays();//清除所有覆盖物
                //map.centerAndZoom(new BMap.Point(olng, olat), 11);//重定义中心点
                //alert(e.point.lng + ", " + e.point.lat);
                var marker = new BMap.Marker(new BMap.Point(e.point.lng, e.point.lat));  // 创建标注
                marker.addEventListener("mouseup",function(em){//覆盖物监听事件--释放鼠标时定位覆盖物位置
                    var pt = em.point;//移动后重新定位
                    gc.getLocation(pt, function(rs){
                        var addComp = rs.addressComponents;
                        var label = new BMap.Label("我的坐标："+em.point.lng + ", " + em.point.lat+"  我的地址："+addComp.province + ", " + addComp.city + ", " + addComp.district + ", " + addComp.street + ", " + addComp.streetNumber,{offset:new BMap.Size(20,-10)});
                        // marker.setLabel(label);//新坐标-新地址
                        if(rs){
                            var sContent =
                                    "<h4 style='margin:0 0 5px 0;padding:0.2em 0'>"+addComp.province+"</h4>" +
                                    "<p style='margin:0;line-height:1.5;font-size:13px;text-indent:2em'>"+rs.address+"</p>" +
                                    "</div>";
                            var infoWindow = new BMap.InfoWindow(sContent);  // 创建信息窗口对象
                            //图片加载完毕重绘infowindow
                            marker.openInfoWindow(infoWindow);
                        }
						
                        $('#lat').val(em.point.lat);
                        $('#lng').val(em.point.lng);
                    });
                });
                marker.enableDragging();    //可拖拽
                map.addOverlay(marker);     // 将标注添加到地图中

                /////////////////////地址定位
                var pt = e.point;
                gc.getLocation(pt, function(rs){
                    var addComp = rs.addressComponents;
                    addr=addComp.province + ", " + addComp.city + ", " + addComp.district + ", " + addComp.street + ", " + addComp.streetNumber,{offset:new BMap.Size(20,-10)}
                    var label = new BMap.Label("我的坐标："+e.point.lng + ", " + e.point.lat+"  我的地址："+addComp.province + ", " + addComp.city + ", " + addComp.district + ", " + addComp.street + ", " + addComp.streetNumber,{offset:new BMap.Size(20,-10)});
                    //marker.setLabel(label);
                    if(rs){
                        var sContent =
                                "<h4 style='margin:0 0 5px 0;padding:0.2em 0'>"+addComp.province+"</h4>" +
                                "<p style='margin:0;line-height:1.5;font-size:13px;text-indent:2em'>"+rs.address+"</p>" +
                                "</div>";
                        var infoWindow = new BMap.InfoWindow(sContent);  // 创建信息窗口对象
                        //图片加载完毕重绘infowindow
                        marker.openInfoWindow(infoWindow);
                    }
					$('#positionAddress').val(addr);	
                    $('#lat').val(e.point.lat);
                    $('#lng').val(e.point.lng);
                });
                $("#cboxClose").trigger('click');   
                $('#baiduMap').hide();
                //////////////////////重置中心点
                olng = e.point.lng;
                olat = e.point.lat;
            }
            map.addEventListener("click", showInfo);//地图点击事件

            $(function(){
            	$('#baiduMap').hide();
                $('#mapPreview').bind('click',function(){
                	$('#baiduMap').show();
                    $.colorbox({inline:true, href:"#baiduMap",title:"公司地址"});
                    var address = $('#positionAddress').val();
                    var city = $('#workAddress').val();
                    map.setCurrentCity(city);
                    map.setZoom(15);
                    gc.getPoint(address, function(point){
                        if (point) {
                            map.centerAndZoom(point, 15);
                            map.setZoom(15);
                            map.setCenter(point);
                            local.search(address);
                        }
                    }, city);
                    /* map.addEventListener("tilesloaded",function(){
                     map.setZoom(15);
                     }); */

                });
            });
        </script>

        <div class="clear"></div>
        <input type="hidden" value="{{csrf_token()}}" id="resubmitToken">
        <a rel="nofollow" title="回到顶部" id="backtop" style="display: none;"></a>
    
    </div><!-- end #container -->
</div><!-- end #body -->


<script src="style/js/core.min.js" type="text/javascript"></script>
<script src="style/js/popup.min.js" type="text/javascript"></script>

<!--  -->


<div id="cboxOverlay" style="display: none;"></div><div id="colorbox" class="" role="dialog" tabindex="-1" style="display: none;"><div id="cboxWrapper"><div><div id="cboxTopLeft" style="float: left;"></div><div id="cboxTopCenter" style="float: left;"></div><div id="cboxTopRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxMiddleLeft" style="float: left;"></div><div id="cboxContent" style="float: left;"><div id="cboxTitle" style="float: left;"></div><div id="cboxCurrent" style="float: left;"></div><button type="button" id="cboxPrevious"></button><button type="button" id="cboxNext"></button><button id="cboxSlideshow"></button><div id="cboxLoadingOverlay" style="float: left;"></div><div id="cboxLoadingGraphic" style="float: left;"></div></div><div id="cboxMiddleRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxBottomLeft" style="float: left;"></div><div id="cboxBottomCenter" style="float: left;"></div><div id="cboxBottomRight" style="float: left;"></div></div></div><div style="position: absolute; width: 9999px; visibility: hidden; display: none;"></div></div></body></html>
@endsection
