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
						<input type="hidden" name="url" value="{{$url}}">
						<input type="submit" value="保存，下一步" id="stepBtn" class="btn_big fr">
					</form>
				</dd>
			</dl>
		</div>
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
		<div class="clear"></div>
		<input type="hidden" value="13ae35fedd9e45cdb66fb712318d7369" id="resubmitToken">

@endsection