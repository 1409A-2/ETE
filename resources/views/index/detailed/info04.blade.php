@extends('index.lar.public')
@section('title', '公司产品-招聘服务-拉勾网-最专业的互联网招聘平台')
@section('content')<!-- end #header -->
    <div id="container">

        <div class="content_mid">
            <dl class="c_section c_section_mid">
                <dt>
                <h2><em></em>填写公司信息</h2>
                <a class="c_addjob" href="postOffice"><i></i>发布新职位</a>
                </dt>
                <dd>
                    <div class="c_text">目标明确、前途光明的产品是吸引求职者的制胜法宝哦！</div>
                    <img width="668" height="56" class="c_steps" alt="第四步" src="style/images/step4.png">

                    <form method="post" action="info4Pro" id="productForm" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" id="_token">
                        <input type="hidden" name="url" value="{{$url}}" id="url">
                        <input type="hidden" name="pr_id" value="{{$product_data['pr_id']}}" id="pr_id">
                        <input type="hidden" value="8f79f658e49846ae89d90a3f1590f12e" name="resubmitToken">
                        <input type="hidden" id="companyId" name="companyId" value="25927">

                        <div id="productDiv">
                            <div class="formWrapper">
                                <input type="hidden" value="25927" name="productInfos[0].companyId">

                                <h3>产品海报</h3>

                                <div class="new_product mt20">
                                    <div id="productNo0" class="product_upload">
                                        <div style="background-color: rgb(147, 183, 187);">
                                            <span>上传产品图片</span>
                                            <br>
                                            尺寸：380*220px 大小：小于5M
                                        </div>
                                    </div>
                                    <div id="productShow0" class="product_upload dn productShow">
                                        <img width="380" height="220" src="{{env('APP_HOST').$product_data['pr_pic']}}">
                                        <span>更换产品图片<br>380*220px 小于5M</span>
                                    </div>
                                    <input type="file" title="支持jpg、jpeg、gif、png格式，文件小于5M"name="myfiles[]" id="myfiles0">
                                </div>
                                <span style="display:none;" id="myfiles0_error" class="error"></span>

                                <h3>产品名称</h3>
                                <input type="text" value="{{$product_data['pr_name']}}" placeholder="请输入产品名称" name="product[]" id="name0" style="width:500px;">

                                <h3>产品地址</h3>
                                <input type="text" placeholder="请输入产品主页URL或产品下载地址" name="productUrl[]"
                                       id="address0" value="{{$product_data['pr_name']}}" style="width:500px;">

                                <h3>产品简介</h3>
                                <textarea placeholder="请简短描述该产品定位、产品特色、用户群体等" maxlength="1000"
                                          name="productProfile[]" id="description0">{{$product_data['pr_name']}}</textarea>

                                <div class="word_count">你还可以输入 <span>500</span> 字</div>
                            </div>
                        </div>
                        @if($url=='')
                        <a id="addMember" class="add_member" href="javascript:void(0)"><i></i>继续添加公司产品</a>
                        @endif

                        <div class="clear"></div>
                        <input type="submit" value="保存，下一步" id="step4Submit" class="btn_big fr">
                        @if($url=='')
                        <a class="btn_cancel fr" href="/detailed_info5">跳过</a>
                        @endif
                    </form>
                </dd>
            </dl>
        </div>

        <script src="{{env('APP_HOST')}}/style/js/step4.min.js" type="text/javascript"></script>
        <div class="clear"></div>
        <input type="hidden" value="8f79f658e49846ae89d90a3f1590f12e" id="resubmitToken"><!-- end #container -->
@endsection<!-- end #body -->
