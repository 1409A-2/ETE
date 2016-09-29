@extends('index.lar.public')
@section('title', '基本信息-招聘服务-校易聘')
@section('content')
	<div id="container">
		<div style="" id="stepTip">
			<a></a>
			<img width="803" height="59" src="style/images/tiponce.jpg">
		</div>
		<div class="content_mid">
			<dl class="c_section c_section_mid">
				<dt>
				<h2><em></em>填写公司信息</h2>
				</dt>
				<dd>
					<form id="stepForm" action="info1pro" method="post" enctype="multipart/form-data">
						<div class="c_text_1">基本信息为必填项，是求职者加速了解公司的窗口，认真填写吧！</div>
						<img width="668" height="56" class="c_steps" alt="第一步" src="style/images/step1.png">

						<h3>公司全称 <span>{{$company_data['c_name']}}</span></h3>

						<h3>公司简称</h3> <!--非必填-->
						<input type="text" style="width: 600px;" placeholder="请输入公司简称，如:校易聘" value="{{empty($url) ? '': $company_data['c_shorthand']}}" name="name" id="name" class="valid">

						<h3>公司LOGO</h3> <!--非必填改必填-->
						<div class="c_logo c_logo_pos">
							{{--<a title="上传公司LOGO" class="inline cboxElement" href="#logoUploader">
								<div id="logoNo">
									<span>上传公司LOGO</span> <br>
									尺寸：190*190px  <br>
									大小：小于5M
								</div>
								<div class="dn" id="logoShow">
									<img width="190" height="190" alt="公司logo" src="">
									<span>更换公司LOGO<br>190px*190px 小于5M</span>
								</div>
							</a>--}}
							<div id="logoNo">
								<span>上传公司LOGO</span>
								<br>
								尺寸：190*190px  大小：小于5M
							</div>
							<div id="productShow0" class="product_upload dn productShow">
								<img width="380" height="220" src="{{empty($url) ? '': env('APP_HOST').$company_data['c_logo']}}">
								<span>更换产品图片<br>380*220px 小于5M</span>
							</div>
							<input type="file" title="支持jpg、jpeg、gif、png格式，文件小于5M" name="myfiles" id="myfiles0">
						</div>

						<h3>公司网址</h3>
						<input type="text" style="width: 600px;" placeholder="请输入公司网址" value="{{empty($url) ? '': $company_data['c_website']}}" name="website" id="website">

						<h3>行业领域</h3>
						<div>
							<input type="hidden" value="" name="select_industry_hidden" id="select_industry_hidden">
							<input type="button" value="{{empty($url) ? '': $company_data['c_industry']}}" name="select_industry" id="select_industry" class="select">
							<div class="dn" id="box_industry" style="display: none;">
								<ul class="reset">
									<li>移动互联网</li>
									<li>电子商务</li>
									<li>社交</li>
									<li>企业服务</li>
									<li>O2O</li>
									<li>教育</li>
									<li>文化艺术</li>
									<li>游戏</li>
									<li>在线旅游</li>
									<li>金融互联网</li>
									<li>健康医疗</li>
									<li>生活服务</li>
									<li>硬件</li>
									<li>搜索</li>
									<li>安全</li>
									<li>运动体育</li>
									<li>云计算\大数据</li>
									<li>移动广告</li>
									<li>社会化营销</li>
									<li>视频多媒体</li>
									<li>媒体</li>
									<li>智能家居</li>
									<li>智能电视</li>
									<li>分类信息</li>
									<li>招聘</li>
								</ul>
							</div>
						</div>

						<h3>一句话介绍</h3>
						<input type="text" value="{{empty($url) ? '': $company_data['c_desc']}}" placeholder="一句话概括公司亮点，如公司愿景、领导团队等，限50字" maxlength="50" name="temptation" id="temptation" style="width: 600px;">
						<span style="display:none;" class="error" id="beError"></span>
						<input type="hidden" id="companyId" name="companyId" value="{{$company_data['c_id']}}">
						<input type="hidden" id="companyName" name="companyName" value="{{$company_data['c_name']}}">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
                        <h3>总部地址</h3>
                        <input type="text" placeholder="请输入详细的工作地址" value="{{empty($url) ? '': $company_data['c_address']}}" name="positionAddress" id="positionAddress" class="input_520" id="positionAddress">
                        <input type="hidden" value="" name="positionLng" id="lng">
                        <input type="hidden" value="" name="positionLat" id="lat">
                        <div class="work_place f14">我们将在职位详情页以地图方式精准呈现给用户  <a id="mapPreview" href="javascript:;">预览地图</a></div>
						<input type="hidden" name="url" value="{{$url}}">
						<input type="submit" value="保存，下一步" id="stepBtn" class="btn_big fr">

					</form>
				</dd>
			</dl>
		</div>
        <div class="popup" id="baiduMap" >
            <div class="mb10">点击地图可重新定位公司所在的位置</div>
            <div id="allmap" style="overflow: hidden; position: relative; z-index: 0; background-color: rgb(243, 241, 236); color: rgb(0, 0, 0); text-align: left;"><div style="overflow: visible; position: absolute; z-index: 0; left: 0px; top: 0px; cursor: grab;"><div class="BMap_mask" style="position: absolute; left: 0px; top: 0px; z-index: 9; overflow: hidden; width: 0px; height: 0px;"></div><div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 200;"><div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 800;"></div><div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 700;"></div><div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 600;"></div><div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 500;"><label class="BMapLabel" unselectable="on" style="position: absolute; -moz-user-select: none; display: none; cursor: inherit; background-color: rgb(190, 190, 190); border: 1px solid rgb(190, 190, 190); padding: 1px; white-space: nowrap; font: 12px arial,simsun,sans-serif; z-index: -20000; color: rgb(190, 190, 190);">shadow</label></div><div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 400;"></div><div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 300;"></div><div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 201;"></div><div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 200;"></div></div><div style="position: absolute; overflow: visible; top: 0px; left: 0px; z-index: 1;"><div style="position: absolute; overflow: visible; z-index: -100; left: 0px; top: 0px; display: none;"></div></div><div style="position: absolute; overflow: visible; top: 0px; left: 0px; z-index: 2; display: block;"><div style="position: absolute; overflow: visible; top: 0px; left: 0px; z-index: 0; display: block;"><canvas style="position: absolute; width: 256px; height: 256px; left: -74px; top: -213px; background: none repeat scroll 0% 0% rgb(243, 241, 236);" width="256" height="256" id="_1_bg_6323_2355_15"></canvas></div><div style="position: absolute; overflow: visible; top: 0px; left: 0px; z-index: 10; display: block;"><canvas style="position: absolute; width: 256px; height: 256px; left: -74px; top: -213px;" width="256" height="256" id="_1_poi_6323_2355_15"></canvas></div></div><div style="position: absolute; overflow: visible; top: 0px; left: 0px; z-index: 3;"></div></div><div style="position: absolute; z-index: 1201; top: 10px; right: 10px; width: 17px; height: 16px; background: url(style/images/img/st-close.pngquot) no-repeat scroll 0% 0% transparent; cursor: pointer; display: none;" title="退出全景"></div><div style="height: 32px; position: absolute; z-index: 30; -moz-user-select: none; bottom: 0px; right: auto; top: auto; left: 1px; display: none;" class=" anchorBL"><a title="到百度地图查看此区域" target="_blank" href="http://map.baidu.com/?sr=1" style="outline: medium none;"><img src="style/images/copyright_logo.png" style="border:none;width:77px;height:32px"></a></div><div style="position:absolute;z-index:0;top:0px;left:0px;overflow:hidden;visibility:hidden;cursor:-moz-grab" id="zoomer"><div style="top:0;left:0;" class="BMap_zoomer"></div><div style="top:0;right:0;" class="BMap_zoomer"></div><div style="bottom:0;left:0;" class="BMap_zoomer"></div><div style="bottom:0;right:0;" class="BMap_zoomer"></div></div><div unselectable="on" class=" BMap_stdMpCtrl BMap_stdMpType0 BMap_noprint anchorTL" style="width: 62px; height: 186px; bottom: auto; right: auto; top: 10px; left: 10px; position: absolute; z-index: 1100; -moz-user-select: none;"><div class="BMap_stdMpPan"><div title="向上平移" class="BMap_button BMap_panN"></div><div title="向左平移" class="BMap_button BMap_panW"></div><div title="向右平移" class="BMap_button BMap_panE"></div><div title="向下平移" class="BMap_button BMap_panS"></div><div class="BMap_stdMpPanBg BMap_smcbg"></div></div><div class="BMap_stdMpZoom" style="height: 141px; width: 62px;"><div title="放大一级" class="BMap_button BMap_stdMpZoomIn"><div class="BMap_smcbg"></div></div><div title="缩小一级" class="BMap_button BMap_stdMpZoomOut" style="top: 120px;"><div class="BMap_smcbg"></div></div><div class="BMap_stdMpSlider" style="height: 102px;"><div class="BMap_stdMpSliderBgTop" style="height: 102px;"><div class="BMap_smcbg"></div></div><div class="BMap_stdMpSliderBgBot" style="top: 19px; height: 87px;"></div><div title="放置到此级别" class="BMap_stdMpSliderMask"></div><div title="拖动缩放" class="BMap_stdMpSliderBar" style="cursor: grab; top: 19px;"><div class="BMap_smcbg"></div></div></div><div class="BMap_zlHolder"><div class="BMap_zlSt"><div class="BMap_smcbg"></div></div><div class="BMap_zlCity"><div class="BMap_smcbg"></div></div><div class="BMap_zlProv"><div class="BMap_smcbg"></div></div><div class="BMap_zlCountry"><div class="BMap_smcbg"></div></div></div></div></div><div unselectable="on" style="bottom: auto; right: 10px; top: 10px; left: auto; white-space: nowrap; cursor: pointer; position: absolute; z-index: 10; -moz-user-select: none;" class=" BMap_noprint anchorTR"><div style="-moz-user-select: none; float: left;"><div style="-moz-user-select: none; box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.35); border-left: 1px solid rgb(139, 164, 220); border-top: 1px solid rgb(139, 164, 220); border-bottom: 1px solid rgb(139, 164, 220); background: none repeat scroll 0% 0% rgb(142, 168, 224); padding: 2px 6px; font: bold 12px/1.3em arial,simsun,sans-serif; text-align: center; white-space: nowrap; border-radius: 3px 0px 0px 3px; color: rgb(255, 255, 255);" title="显示普通地图">地图</div></div><div style="-moz-user-select: none; float: left;"><div style="-moz-user-select: none; box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.35); border-left: 1px solid rgb(139, 164, 220); border-top: 1px solid rgb(139, 164, 220); border-bottom: 1px solid rgb(139, 164, 220); background: none repeat scroll 0% 0% rgb(255, 255, 255); padding: 2px 6px; font-family: arial,simsun,sans-serif; font-style: normal; font-variant: normal; font-size: 12px; line-height: 1.3em; font-size-adjust: none; font-stretch: normal; -moz-font-feature-settings: normal; -moz-font-language-override: normal; text-align: center; white-space: nowrap; color: rgb(0, 0, 0);" title="显示卫星影像">卫星</div><div style="-moz-user-select: none; position: absolute; top: 0px; left: 0px; z-index: -1; display: none;"><div style="border-right:1px solid #8ba4dc;border-bottom:1px solid #8ba4dc;border-left:1px solid #8ba4dc;background:white;font:12px arial,simsun,sans-serif;padding:0 8px 0 6px;line-height:1.6em;box-shadow:2px 2px 3px rgba(0, 0, 0, 0.35)" title="显示带有街道的卫星影像"><span class="BMap_checkbox"  checked="checked"></span><label style="vertical-align: middle; cursor: pointer;">混合</label></div></div></div><div style="-moz-user-select: none; float: left;"><div style="-moz-user-select: none; box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.35); border-left: 1px solid rgb(139, 164, 220); border-width: 1px; border-style: solid; border-color: rgb(139, 164, 220); background: none repeat scroll 0% 0% rgb(255, 255, 255); padding: 2px 6px; font-family: arial,simsun,sans-serif; font-style: normal; font-variant: normal; font-size: 12px; line-height: 1.3em; font-size-adjust: none; font-stretch: normal; -moz-font-feature-settings: normal; -moz-font-language-override: normal; text-align: center; white-space: nowrap; border-radius: 0px 3px 3px 0px; color: rgb(0, 0, 0);" title="显示三维地图">三维</div></div></div><div unselectable="on" class=" BMap_scaleCtrl BMap_noprint anchorBL" style="bottom: 18px; right: auto; top: auto; left: 81px; width: 88px; position: absolute; z-index: 10; -moz-user-select: none;"><div unselectable="on" class="BMap_scaleTxt" style="background-color: transparent; color: black;">500&nbsp;米</div><div class="BMap_scaleBar BMap_scaleHBar" style="background-color: black;"><img src="style/images/mapctrls.png" style="border:none"></div><div class="BMap_scaleBar BMap_scaleLBar" style="background-color: black;"><img src="style/images/mapctrls.png" style="border:none"></div><div class="BMap_scaleBar BMap_scaleRBar" style="background-color: black;"><img src="style/images/mapctrls.png" style="border:none"></div></div><div unselectable="on" class=" BMap_omCtrl BMap_ieundefined BMap_noprint anchorBR quad4" style="width: 13px; height: 13px; bottom: 0px; right: 0px; top: auto; left: auto; position: absolute; z-index: 10; -moz-user-select: none;"><div class="BMap_omOutFrame" style="width: 149px; height: 149px;"><div class="BMap_omInnFrame" style="bottom: auto; right: auto; top: 5px; left: 5px; width: 142px; height: 142px;"><div class="BMap_omMapContainer"></div><div class="BMap_omViewMv" style="cursor: grab;"><div class="BMap_omViewInnFrame"><div></div></div></div></div></div><div class="BMap_omBtn BMap_omBtnClosed" style="bottom: 0px; right: 0px; top: auto; left: auto;"></div></div><div unselectable="on" class=" BMap_cpyCtrl BMap_noprint anchorBL" style="cursor: default; white-space: nowrap; -moz-user-select: none; color: black; background: none repeat scroll 0% 0% transparent; font: 11px/15px arial,simsun,sans-serif; bottom: 2px; right: auto; top: auto; left: 4px; position: absolute; z-index: 10;"><span _cid="1" style="display: inline;"><span style="font-size:11px">&copy; 2014 Baidu&nbsp;- Data &copy; <a style="display:inline;" href="http://www.navinfo.com/" target="_blank">NavInfo</a> &amp; <a style="display:inline;" href="http://www.cennavi.com.cn/" target="_blank">CenNavi</a> &amp; <a style="display:inline;" href="http://www.365ditu.com/" target="_blank">道道通</a></span></span></div></div>
            <input type="hidden" id="experience" value="不限" name="workYear">
            <input type="hidden"  value="北京" name="workAddress" id="workAddress">
        </div>

        <!--/#baiduMap-->
        <!-- old -->

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
                $(document).delegate('#cboxClose','click',function(){
                    $('#baiduMap').hide();
                })
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
		<a rel="nofollow" title="回到顶部" id="backtop" style="display: none;"></a>
	</div>

		<!-------------------------------------弹窗lightbox  ----------------------------------------->
		{{--<div style="display:none;">
			<!--图片上传-->
			<div style="width:650px;height:470px;" class="popup" id="logoUploader">
				<object width="650" height="470" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" id="FlashID">
					<param value="../../flash/avatar.swf?url=http://www.lagou.com/cd/saveProfileLogo.json" name="movie">
					<param value="high" name="quality">
					<param value="opaque" name="wmode">
					<param value="111.0.0.0" name="swfversion">
					<!-- 此 param 标签提示使用 Flash Player 6.0 r65 和更高版本的用户下载最新版本的 Flash Player。如果您不想让用户看到该提示，请将其删除。 -->
					<param value="../../Scripts/expressInstall.swf" name="expressinstall">
					<!-- 下一个对象标签用于非 IE 浏览器。所以使用 IECC 将其从 IE 隐藏。 -->
					<!--[if !IE]>-->
					<object width="650" height="470" data="../../flash/avatar.swf?url=http://www.lagou.com/cd/saveProfileLogo.json" type="application/x-shockwave-flash">
						<!--<![endif]-->
						<param value="high" name="quality">
						<param value="opaque" name="wmode">
						<param value="111.0.0.0" name="swfversion">
						<param value="../../Scripts/expressInstall.swf" name="expressinstall">
						<!-- 浏览器将以下替代内容显示给使用 Flash Player 6.0 和更低版本的用户。 -->
						<div>
							<h4>此页面上的内容需要较新版本的 Adobe Flash Player。</h4>
							<p><a href="http://www.adobe.com/go/getflashplayer"><img width="112" height="33" src="{{env('APP_HOST')}}/style/images/get_flash_player.gif" alt="获取 Adobe Flash Player"></a></p>
						</div>
						<!--[if !IE]>-->
					</object>
					<!--<![endif]-->
				</object>
			</div><!-- #logoUploader -->
		</div>--}}
		<!------------------------------------- end ----------------------------------------->
        @section('script')
            <script src="{{env('APP_HOST')}}/style/js/step1.min.js" type="text/javascript"></script>
            <script>
                var avatar = {};
                avatar.uploadComplate = function( data ){
                    var result = eval('('+ data +')');
                    if(result.success){
                        jQuery('#logoShow img').attr("src",ctx+ '/'+result.content);
                        jQuery.colorbox.close();
                        jQuery('#logoNo').hide();
                        jQuery('#logoShow').show();
                    }
                };
            </script>
        @endsection
		<div class="clear"></div>
		<input type="hidden" value="13ae35fedd9e45cdb66fb712318d7369" id="resubmitToken">

@endsection