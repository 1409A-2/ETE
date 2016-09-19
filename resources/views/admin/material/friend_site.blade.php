@extends('admin.lar.public')
@section('title_admin', '校易聘后台管理-推荐网站')
@section('content_admin')

    <div class="tab">
        <div class="tab-head">
            <strong>推荐网站</strong>
            <ul class="tab-nav">
                <li class="active"><a href="#tab-email">推荐网站</a></li>
                @if(count($carousel)<5)
                <li><a href="#tab-set">网站添加</a></li>
                @endif
            </ul>
        </div>

        <div class="tab-body">
            <br />
            @if(count($carousel)<5)
            <div class="tab-panel" id="tab-set">
                <form method="post" class="form-x" action="adminRecommendPro" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">

                    <div class="form-group">
                        <div class="label"><label for="sitename">网站</label></div>
                        <div class="field">
                            <input type="text" class="input" id="sitename" name="sitename" size="50" placeholder="图片介绍" data-validate="required:请填写你图片的介绍" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="label"><label for="siteurl">网站链接</label></div>
                        <div class="field">
                            <input type="text" class="input" id="siteurl" name="siteurl" size="50" placeholder="请填写网址" data-validate="required:请填写网址,url:请填写正确的链接网址" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="label"><label for="logo">推荐图片</label></div>
                        <div class="field">
                            <a class="button input-file" href="javascript:void(0);">+ 浏览文件<input size="100" type="file" name="logo" data-validate="required:请选择上传文件,regexp#.+.(jpg|jpeg|png|gif)$:只能上传jpg|gif|png格式文件" /></a>
                        </div>
                    </div>

                    <div class="form-button"><button class="button bg-main" type="submit">提交</button></div>
                </form>
            </div>
            @endif

            <div class="tab-panel active" id="tab-email">
                <form method="post" action="batchDelSite">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="panel admin-panel">
                        <div class="panel-head"><strong>轮播列表</strong></div>
                        <div class="padding border-bottom">
                            <input type="button" class="button button-small checkall" name="checkall" checkfor="id[]" value="全选" />
                            <input type="submit" class="button button-small border-yellow" value="批量删除" onclick="{if(confirm('确认删除?')){return true;}return false;}" />
                        </div>
                        <table class="table table-hover">
                            <tr>
                                <th width="100">选择</th>
                                <th width="200">介绍</th>
                                <th width="*">图片</th>
                                <th width="150">网址</th>
                                <th width="100">操作</th>
                            </tr>
                            @foreach($carousel as $val)
                            <tr style="height: 80px;line-height: 80px;">
                                <td style="height: 80px;line-height: 80px;"><input type="checkbox" name="id[]" value="{{$val['site_id']}}" /></td>
                                <td style="height: 80px;line-height: 80px;">{{$val['site_name']}}</td>
                                <td style="height: 80px;line-height: 80px;"><img src="{{env('APP_HOST').$val['site_img']}}" style="width:230px; height: 80px;"></td>
                                <td style="height: 80px;line-height: 80px;">{{$val['site_url']}}</td>
                                <td style="height: 80px;line-height: 80px;">
                                    <a class="button border-blue button-little" href="upsite?car_id={{$val['site_id']}}">修改</a>
                                    <a class="button border-yellow button-little" href="delsite?car_id={{$val['site_id']}}" onclick="{if(confirm('确认删除?')){return true;}return false;}">删除
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </table>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <p class="text-right text-gray">基于<a class="text-gray" target="_blank" href="#">校易聘框架</a>构建</p>
@endsection
