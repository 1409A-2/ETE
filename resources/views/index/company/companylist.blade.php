@extends('index.lar.public')
@section('title', '公司列表-校易聘')
@section('content')<!-- end #header -->
<div id="container">

    <div class="clearfix">
        <div class="content_l">
            <form id="companyListForm" name="companyListForm" method="get" action="h/c/companylist.html">
                <input type="hidden" id="city" name="city" value="全国"/>
                <input type="hidden" id="fs" name="fs" value=""/>
                <input type="hidden" id="ifs" name="ifs" value=""/>
                <input type="hidden" id="ol" name="ol" value=""/>
                <dl class="hc_tag">
                    <dd>
                        <dl>
                    <dt>行业领域：</dt>
                    <dd>
                        <a href="javascript:void(0)">移动互联网</a>
                        <a href="javascript:void(0)">电子商务</a>
                        <a href="javascript:void(0)">社交</a>
                        <a href="javascript:void(0)">企业服务</a>
                        <a href="javascript:void(0)">O2O</a>
                        <a href="javascript:void(0)">教育</a>
                        <a href="javascript:void(0)">文化艺术</a>
                        <a href="javascript:void(0)">游戏</a>
                        <a href="javascript:void(0)">在线旅游</a>
                        <a href="javascript:void(0)">金融互联网</a>
                        <a href="javascript:void(0)">健康医疗</a>
                        <a href="javascript:void(0)">生活服务</a>
                        <a href="javascript:void(0)">硬件</a>
                        <a href="javascript:void(0)">搜索</a>
                        <a href="javascript:void(0)">安全</a>
                        <a href="javascript:void(0)">运动体育</a>
                        <a href="javascript:void(0)">云计算\大数据</a>
                        <a href="javascript:void(0)">移动广告</a>
                        <a href="javascript:void(0)">社会化营销</a>
                        <a href="javascript:void(0)">视频多媒体</a>
                        <a href="javascript:void(0)">媒体</a>
                        <a href="javascript:void(0)">智能家居</a>
                        <a href="javascript:void(0)">智能电视</a>
                        <a href="javascript:void(0)">分类信息</a>
                        <a href="javascript:void(0)">招聘</a>
                    </dd>
                </dl>
                </dd>
                </dl>
                <ul class="hc_list reset">
                    <li style="clear:both;">
                        <a href="h/c/25829.html" target="_blank">
                            <h3 title="CCIC">CCIC</h3>

                            <div class="comLogo">
                                <img src="style/images/logo_default.png" width="190" height="190" alt="CCIC"/>
                                <ul>
                                    <li>安全</li>
                                    <li>深圳，D轮及以上</li>
                                </ul>
                            </div>
                        </a>
                        <a href="h/jobs/148928.html" target="_blank"> 环境监测工程师</a>
                        <a href="h/jobs/148919.html" target="_blank"> 电学校准工程师</a>
                        <a href="h/jobs/148931.html" target="_blank"> 能源管理项目经理</a>
                        <ul class="reset ctags">
                            <li>D轮及以上</li>
                            <li>安全</li>
                            <li>年终分红</li>
                            <li>绩效奖金</li>
                            <li>五险一金</li>
                            <li>交通补助</li>
                        </ul>
                    </li>
                </ul>

                <div class="Pagination"></div>
            </form>
        </div>
        <div class="content_r">
            <div class="subscribe_side">
                <a href="subscribe.html" target="_blank">
                    <div class="subpos"><span>订阅</span> 职位</div>
                    <div class="c7">拉勾网会根据你的筛选条件，定期将符合你要求的职位信息发给你
                    </div>
                    <div class="count">已有
                        <em>3</em>
                        <em>4</em>
                        <em>2</em>
                        <em>1</em>
                        <em>0</em>
                        人订阅
                    </div>
                    <i>我也要订阅职位</i>
                </a>
            </div>
            <div class="greybg qrcode mt20">
                <img src="style/images/companylist_qr.png" width="242" height="242" alt="拉勾微信公众号二维码"/>
                <span class="c7">扫描拉勾二维码，微信轻松搜工作</span>
            </div>
            <!-- <a href="h/speed/speed3.html" target="_blank" class="adSpeed"></a> -->
            <a href="h/subject/jobguide.html" target="_blank" class="eventAd">
                <img src="style/images/subject280.jpg" width="280" height="135"/>
            </a>
            <a href="h/subject/risingPrice.html" target="_blank" class="eventAd">
                <img src="style/images/rising280.png" width="280" height="135"/>
            </a>
        </div>
    </div>

    <input type="hidden" value="" name="userid" id="userid"/>

    <script type="text/javascript" src="style/js/company_list.min.js"></script>
    <script>
        $(function () {
            /*分页 */
            $('.Pagination').pager({
                currPage: 1,
                pageNOName: "pn",
                form: "companyListForm",
                pageCount: 20,
                pageSize: 5
            });
        })
    </script>
    <div class="clear"></div>
    <input type="hidden" id="resubmitToken" value=""/>
    <a id="backtop" title="回到顶部" rel="nofollow"></a>
</div><!-- end #container -->
@endsection