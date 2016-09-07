@extends('index.lar.public')
@section('title', '职位发布成功')
@section('content')
    <div id="container">
    @include('index.industry.postOffice_public')
            <div class="content">
            	<dl class="company_center_content">
                    <dt>
                        <h1>
                            <em></em>
                           	发布新职位
                        </h1>
                    </dt>
	                <dd> 
	                	<div class="ccc_tr">今日已发布 <span>{{$data['out_num']}}</span> 个职位   还可发布 <span>{{5-$data['out_num']}}</span> 个职位</div>
	                	<div class="publish_tip">
                            <h2>恭喜你，职位发布成功！</h2>
                            <a target="_blank" href="postOffice_preview">预览职位</a><br>
                                                        <a class="greylink" href="postOffice">继续发布新职位</a><br>
                                                        <a class="greylink" href="companylist"> 进入我的公司主页</a><br>
                        	<div style="float:left;" class="invite_share">
			                    <!-- JiaThis Button BEGIN -->
								<div class="jiathis_style_32x32">
									<a class="jiathis_button_tsina" title="分享到新浪微博"><span class="jiathis_txt jiathis_separator jtico jtico_tsina">分享到新浪微博</span></a>
								</div>
								<!-- JiaThis Button END -->
			               	</div>
                        </div>
                        <div class="weixin weixinSuc">
                        	<div class="qr">
                        		<div></div>
                        	</div>
                        	<div class="qr_text">
                        		</div>
                        </div>
	                </dd>
            	</dl>
       		</div><!-- end .content -->


			<div class="clear"></div>
			<input type="hidden" value="{{csrf_token()}}" id="resubmitToken">
	    	<a rel="nofollow" title="回到顶部" id="backtop"></a>
	    </div><!-- end #container -->

	

<script src="style/js/core.min.js" type="text/javascript"></script>
<script src="style/js/popup.min.js" type="text/javascript"></script>


@endsection