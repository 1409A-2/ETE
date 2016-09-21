@extends('index.lar.public')
@section('title', "$company_data[c_name]")
@section('content')
	<div id="container">
		<!-- <script src="style/js/swfobject_modified.js" type="text/javascript"></script> -->
		<div class="clearfix">

			<div class="content_l">
				<div class="c_detail">
					<div style="background-color:#fff;" class="c_logo">
							<img width="190" height="190" alt="公司logo" src="{{env('APP_HOST').$company_data['c_logo']}}">
					</div>

					<!--  			                <div class="c_logo" style="background-color:#fff;">
                            <div id="logoShow">
                                <img src="style/images/logo_default.png" width="190" height="190" alt="公司logo" />
                                <span>更换公司图片<br />190px*190px 小于5M</span>
                            </div>
                            <input onchange="img_check(this,'http://www.lagou.com/cd/saveProfileLogo.json',25927,'logo');" type="file" id="logo" name="logo" title="支持jpg、jpeg、gif、png格式，文件小于5M" />

                        </div>
                        <span class="error" id="logo_error" style="display:none;"></span>
                         -->

					<div class="c_box companyName">
						<h2 title="{{$company_data['c_shorthand']}}">{{$company_data['c_shorthand']}}</h2>

						<em class="valid"></em>
						<span class="va dn">校易聘认证企业</span>
						<div class="clear"></div>

						<h1 title="{{$company_data['c_name']}}" class="fullname">{{$company_data['c_name']}}</h1>

						<form class="clear editDetail dn" id="editDetailForm">
							<input type="text" placeholder="请输入公司简称" maxlength="15" value="平潭协创进出口贸易有限公司" name="companyShortName" id="companyShortName">
							<input type="text" placeholder="一句话描述公司优势，核心价值，限50字" maxlength="50" value="测试的发打发打发大范德萨发" name="companyFeatures" id="companyFeatures">
							<input type="hidden" value="25927" id="companyId" name="companyId">
							<input type="submit" value="保存" id="saveDetail" class="btn_small">
							<a id="cancelDetail" class="btn_cancel_s" >取消</a>
						</form>

						<div class="clear oneword"><img width="17" height="15" src="style/images/quote_l.png">&nbsp; <span>{{$company_data['c_desc']}}</span> &nbsp;<img width="17" height="15" src="style/images/quote_r.png"></div>
						<h3 class="dn">已选择标签</h3>
						<ul style="overflow:auto" id="hasLabels" class="reset clearfix">
							@foreach($lable_data as $key=>$val)
							<li><span>{{$val['lab_name']}}</span></li>
							@endforeach
							<li style="border: none;"><a href="detailed_info2?url=companylist">编辑</a></li>
						</ul>
						<div class="dn" id="addLabels">
							<a id="changeLabels" class="change" href="javascript:void(0)">换一换</a>
							<input type="hidden" value="1" id="labelPageNo">
							<input type="submit" value="贴上" class="fr" id="add_label">
							<input type="text" placeholder="添加自定义标签" name="label" id="label" class="label_form fr">
							<div class="clear"></div>
							<ul class="reset clearfix"> </ul>
							<a id="saveLabels" class="btn_small" href="javascript:void(0)">保存</a>
							<a id="cancelLabels" class="btn_cancel_s" href="javascript:void(0)">取消</a>
						</div>
					</div>
					<a title="编辑基本信息" class="c_edit" href="/detailed?update=1&url=companylist"></a>
					<div class="clear"></div>
				</div>

				<div class="c_breakline"></div>

				<div id="Product">

					<div class="product_wrap">

						@if(!$product_data)
						<!--无产品 -->
						<dl class="c_section">
							<dt>
							<h2><em></em>公司产品</h2>
							</dt>
							<dd>
								<div class="addnew">
									酒香不怕巷子深已经过时啦！<br>
									把自己优秀的产品展示出来吸引人才围观吧！<br>
									<a class="product_edit" href="detailed_info4?url=companylist">+添加公司产品</a>
								</div>
							</dd>
						</dl>

						@else
						<!--有产品-->
						@foreach($product_data as $val)
						<dl class="c_product">
							<dt>
							<h2><em></em>公司产品</h2>
							</dt>
							<dd>
								<img width="380" height="220" alt="{{$val['pr_name']}}" src="{{env('APP_HOST').$val['pr_pic']}}">
								<div class="cp_intro">
									<h3 style="margin: 10px 0;"><a target="_blank" href="{{$val['pr_website']}}">{{$val['pr_name']}} </a></h3>
									<div class="scroll-pane" style="overflow: hidden; padding: 0px; width: 260px;">

										<div class="jspContainer" style="width: 260px; height: 140px;"><div class="jspPane" style="padding: 0px; top: 0px; width: 260px;"><div>{{$val['pr_desc']}}</div></div></div></div>
								</div>
								<a title="编辑公司产品" class="c_edit product_edit" href="detailed_info4?url=companylist&pr_id={{$val['pr_id']}}"></a>
								<a title="新增公司产品" class="c_add product_add" href="detailed_info4?url=companylist"></a>
							</dd>
						</dl>
						@endforeach

						@endif
						<!--产品编辑-->


					</div>
				</div>   <!-- end #Product -->

				<div id="Profile">
					<div class="profile_wrap">

						@if(!$company_data['c_intro'])
						<!--无介绍 -->
						<dl class="c_section dn" style="display: block;">
							<dt>
							<h2><em></em>公司介绍</h2>
							</dt>
							<dd>
								<div class="addnew">
									详细公司的发展历程、让求职者更加了解你!
									<br>
									<a id="addIntro" href="/detailed_info5?url=companylist">+添加公司介绍</a>
								</div>
							</dd>
						</dl>
						@else

						<!--有介绍-->
						<dl class="c_section">
							<dt>
							<h2><em></em>公司介绍</h2>
							</dt>
							<dd>
								<div class="c_intro">{{$company_data['c_intro']}}</div>
								<a title="编辑公司介绍" id="editIntro" class="c_edit" href="/detailed_info5?url=companylist"></a>
							</dd>
						</dl>
						@endif

						<!--编辑介绍-->
					</div>

				</div><!-- end #Profile -->

				<!--[if IE 7]> <br /> <![endif]-->


				<input type="hidden" value="" name="hasNextPage" id="hasNextPage">
				<input type="hidden" value="" name="pageNo" id="pageNo">
				<input type="hidden" value="" name="pageSize" id="pageSize">
				<div id="flag"></div>
			</div>	<!-- end .content_l -->

			<div class="content_r">
				<div id="Tags">
					<div id="c_tags_show" class="c_tags solveWrap">
						<table>
							<tbody><tr>
								<td width="45">地点</td>
								<td>北京</td>
							</tr>
							<tr>
								<td>领域</td><!-- 支持多选 -->
								<td title="移动互联网">{{$company_data['c_industry']}}</td>
							</tr>
							<tr>
								<td>主页</td>
								<td>
									<a rel="nofollow" title="{{$company_data['c_website']}}" target="_blank" href="{{$company_data['c_website']}}">{{substr($company_data['c_website'],0,15)}}...</a>
								</td>
							</tr>
							</tbody></table>
					</div>
					<div id="c_tags_edit" class="c_tags editTags dn">
						<form id="tagForms">
							<table>
								<tbody><tr>
									<td>地点</td>
									<td>
										<input type="text" placeholder="请输入地点" value="上海" name="city" id="city">
									</td>
								</tr>
								<tr>
									<td>领域</td><!-- 支持多选 -->
									<td>
										<input type="hidden" value="移动互联网" id="industryField" name="industryField">
										<input type="button" style="background:none;cursor:default;border:none !important;" disable="disable" value="移动互联网" id="select_ind" class="select_tags">
										<!-- <div id="box_ind" class="selectBox dn">
                                            <ul class="reset">
                                                                                                                                                            <li class="current">移动互联网</li>
                                                                                                                                                </ul>
                                        </div>	 -->
									</td>
								</tr>
								<tr>
									<td>规模</td>
									<td>
										<input type="hidden" value="150-500人" id="companySize" name="companySize">
										<input type="button" value="150-500人" id="select_sca" class="select_tags">
										<div class="selectBox dn" id="box_sca" style="display: none;">
											<ul class="reset">
												<li>少于15人</li>
												<li>15-50人</li>
												<li>50-150人</li>
												<li class="current">150-500人</li>
												<li>500-2000人</li>
												<li>2000人以上</li>
											</ul>
										</div>
									</td>
								</tr>
								<tr>
									<td>主页</td>
									<td>
										<input type="text" placeholder="请输入网址" value="http://www.weimob.com" name="companyUrl" id="companyUrl">
									</td>
								</tr>
								</tbody></table>
							<input type="hidden" id="comCity" value="上海">
							<input type="hidden" id="comInd" value="移动互联网">
							<input type="hidden" id="comSize" value="150-500人">
							<input type="hidden" id="comUrl" value="http://www.zmtpost.com">
							<input type="submit" value="保存" id="submitFeatures" class="btn_small">
							<a id="cancelFeatures" class="btn_cancel_s" href="javascript:void(0)">取消</a>
							<div class="clear"></div>
						</form>
					</div>
				</div><!-- end #Tags -->

				<div id="Member">
					<!--有创始团队-->
					<dl class="c_section c_member">
						<dt>
						<h2><em></em>创始团队</h2>
						</dt>
						<dd>

							<div class="member_wrap">
								@if($company_data['c_ceo']=='' || $company_data['ceo_desc']=='')
								<!-- 无创始人 -->
								<div class="member_info addnew_right">
									展示公司的领导班子，<br>提升诱人指数！<br>
									<a class="member_edit" href="detailed_info3?url=companylist">+添加成员</a>
								</div>

								@else

								<!-- 显示创始人 -->
								<div class="member_info">
									<a title="编辑创始人" class="c_edit member_edit" href="detailed_info3?url=companylist"></a>
									<div class="m_portrait">
										<div></div>
										<img width="120" height="120" alt="{{$company_data['c_ceo']}}" src="style/images/leader_default.png">
									</div>
									<div class="m_name">
										{{$company_data['c_ceo']}}
									</div>
									<div class="m_position">ceo</div>
									<div class="m_intro">{{$company_data['ceo_desc']}}</div>
								</div>

								@endif

								<!-- 编辑创始人 -->

							</div><!-- end .member_wrap -->
						</dd>
					</dl>
				</div> <!-- end #Member -->

			</div>
		</div>

		<!-------------------------------------弹窗lightbox  ----------------------------------------->
		<div style="display:none;">
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
							<p><a href="http://www.adobe.com/go/getflashplayer"><img width="112" height="33" src="style/images/get_flash_player.gif" alt="获取 Adobe Flash Player"></a></p>
						</div>
						<!--[if !IE]>-->
					</object>
					<!--<![endif]-->
				</object>
			</div><!-- #logoUploader -->
		</div>
		<!------------------------------------- end ----------------------------------------->

		<script src="style/js/company.min.js" type="text/javascript"></script>
		<script>
			var avatar = {};
			avatar.uploadComplate = function( data ){
				var result = eval('('+ data +')');
				if(result.success){
					jQuery('#logoShow img').attr("src",ctx+ '/'+result.content);
					jQuery.colorbox.close();
				}
			};
		</script>
		<div class="clear"></div>
		<input type="hidden" value="d1035b6caa514d869727cff29a1c2e0c" id="resubmitToken">
@endsection