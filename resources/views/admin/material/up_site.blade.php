@extends('admin.lar.public')
@section('title_admin', '校易聘后台管理-修改网站')
@section('content_admin')

    <div class="tab">
        <div class="tab-body">
            <br />

            <div class="tab-panel active" id="tab-set">
                <form method="post" class="form-x" action="upSitePro" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="site_id" value="{{$carousel['site_id']}}">

                    <div class="form-group">
                        <div class="label"><label for="sitename">网站</label></div>
                        <div class="field">
                            <input type="text" class="input" id="sitename" name="sitename" size="50" placeholder="图片介绍" data-validate="required:请填写你图片的介绍" value="{{$carousel['site_name']}}" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="label"><label for="siteurl">网站链接</label></div>
                        <div class="field">
                            <input type="text" class="input" id="siteurl" name="siteurl" size="50" value="{{$carousel['site_url']}}" placeholder="请填写网址" data-validate="required:请填写网址,url:请填写正确的链接网址" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="label"><label for="logo">推荐图片</label></div>
                        <div class="field">
                            <img src="{{env('APP_HOST').$carousel['site_img']}}" style="width:230px; height: 80px;"><br/>
                            <a class="button input-file" href="javascript:void(0);">+ 浏览文件<input size="100" type="file" name="logo" /></a><br/>
                            <span style="color: green;">如果需要修改，请重新上传</span>
                        </div>
                    </div>

                    <div class="form-button"><button class="button bg-main" type="submit">修改</button></div>
                </form>
            </div>
        </div>
    </div>
        <p class="text-right text-gray">基于<a class="text-gray" target="_blank" href="#">校易聘框架</a>构建</p>
@endsection
