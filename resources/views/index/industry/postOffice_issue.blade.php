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
	                	<div class="ccc_tr">今日已发布 <span>1</span> 个职位   还可发布 <span>4</span> 个职位</div>
	                	<div class="publish_tip">
                            <h2>恭喜你，职位发布成功！</h2>
                            <a target="_blank" href="postOffice_preview">预览职位</a><br>
                                                        <a class="greylink" href="postOffice">继续发布新职位</a><br>
                                                        <a class="greylink" href="http://www.lagou.com/c/25927.html"> 进入我的公司主页</a><br>
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
<style>
.jiathis_style_32x32 .jiathis_txt{font-size:14px!important;text-decoration:underline!important;padding-left:0 !important;}
.jiathis_style_32x32 .jiathis_separator{margin:0!important; line-height:22px !important;}
.jiathis_style_32x32 .jtico{height:auto !important;background:none;line-height:22px !important;padding-left:0 !important;}
</style>
<script type="text/javascript">
var jiathis_config={summary:"【公司名称随便写招聘随便写】我们公司正在招聘随便写，月薪1k-2k，如果你对这个职位感兴趣，请进入详情页投递简历：http://www.lagou.com/jobs/149594.html @拉勾网",boldNum:6,title:"#拉勾网热招职位#",url:"http://www.lagou.com/jobs/149594.html",hideMore:!0,appkey:{tsina:"3761453225"},pic:"",evt:{share:""}};
	popQR();
function popQR(){
    $.ajax({
         url:ctx+"/mycenter/showQRCode",
         type:"GET"
    }).done(function(data){
         if(data.success){
              $('.weixinSuc .qr img').attr("src",data.content);
              $('.weixinSuc').removeClass('dn');
         }
    });  
}
</script>
<script charset="utf-8" src="style/js/jia.js" type="text/javascript"></script>
			<div class="clear"></div>
			<input type="hidden" value="e0b2bdfab8ab466cb973d5ee5acc6adb" id="resubmitToken">
	    	<a rel="nofollow" title="回到顶部" id="backtop"></a>
	    </div><!-- end #container -->

	

<script src="style/js/core.min.js" type="text/javascript"></script>
<script src="style/js/popup.min.js" type="text/javascript"></script>

<!--  -->

<script type="text/javascript">
$(function(){
	$('#noticeDot-1').hide();
	$('#noticeTip a.closeNT').click(function(){
		$(this).parent().hide();
	});
});
var index = Math.floor(Math.random() * 2);
var ipArray = new Array('42.62.79.226','42.62.79.227');
var url = "ws://" + ipArray[index] + ":18080/wsServlet?code=314873";
var CallCenter = {
		init:function(url){
			var _websocket = new WebSocket(url);
			_websocket.onopen = function(evt) {
				console.log("Connected to WebSocket server.");
			};
			_websocket.onclose = function(evt) {
				console.log("Disconnected");
			};
			_websocket.onmessage = function(evt) {
				//alert(evt.data);
				var notice = jQuery.parseJSON(evt.data);
				if(notice.status[0] == 0){
					$('#noticeDot-0').hide();
					$('#noticeTip').hide();
					$('#noticeNo').text('').show().parent('a').attr('href',ctx+'/mycenter/delivery.html');
					$('#noticeNoPage').text('').show().parent('a').attr('href',ctx+'/mycenter/delivery.html');
				}else{
					$('#noticeDot-0').show();
					$('#noticeTip strong').text(notice.status[0]);
					$('#noticeTip').show();
					$('#noticeNo').text('('+notice.status[0]+')').show().parent('a').attr('href',ctx+'/mycenter/delivery.html');
					$('#noticeNoPage').text(' ('+notice.status[0]+')').show().parent('a').attr('href',ctx+'/mycenter/delivery.html');
				}
				$('#noticeDot-1').hide();
			};
			_websocket.onerror = function(evt) {
				console.log('Error occured: ' + evt);
			};
		}
};
CallCenter.init(url);
</script>

<div id="cboxOverlay" style="display: none;"></div><div id="colorbox" class="" role="dialog" tabindex="-1" style="display: none;"><div id="cboxWrapper"><div><div id="cboxTopLeft" style="float: left;"></div><div id="cboxTopCenter" style="float: left;"></div><div id="cboxTopRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxMiddleLeft" style="float: left;"></div><div id="cboxContent" style="float: left;"><div id="cboxTitle" style="float: left;"></div><div id="cboxCurrent" style="float: left;"></div><button type="button" id="cboxPrevious"></button><button type="button" id="cboxNext"></button><button id="cboxSlideshow"></button><div id="cboxLoadingOverlay" style="float: left;"></div><div id="cboxLoadingGraphic" style="float: left;"></div></div><div id="cboxMiddleRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxBottomLeft" style="float: left;"></div><div id="cboxBottomCenter" style="float: left;"></div><div id="cboxBottomRight" style="float: left;"></div></div></div><div style="position: absolute; width: 9999px; visibility: hidden; display: none;"></div></div>

@endsection