@extends('admin.lar.public')
@section('title_admin', '校易聘后台管理-友情链接')
@section('content_admin')
<div class="tab">
    <div class="tab-body">
        <br />
        <div class="tab-panel active" id="tab-set">
            <form method="post" class="form-x" action="upLinkPro">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="link_id" value="{{$link_id}}">

                <div class="form-group">
                    <div class="label"><label for="sitename">链接名称</label></div>
                    <div class="field">
                        <input type="text" class="input" id="sitename" name="sitename" size="50" placeholder="链接名称" data-validate="required:请填写你链接名称" value="{{$link_name}}"/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="label"><label for="siteurl">链接地址</label></div>
                    <div class="field">
                        <input type="text" class="input" id="siteurl" name="siteurl" size="50" placeholder="请填写网址" data-validate="required:请填写网址,url:请填写正确的链接网址" value="{{$link_url}}" />
                    </div>
                </div>

                <div class="form-group">
                    <div class="label"><label for="title">排序</label></div>
                    <div class="field">
                        <select name="title" class="input" style="width: 200px;" data-validate="required:请选择选择顺序">
                            <option value="">请选择...</option>
                            @for($i=1;$i<=15;$i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <script>
                    $("select[name='title']").val("{{$link_sort}}");
                </script>

                <div class="form-button"><button class="button bg-main" type="submit">提交</button></div>
            </form>
        </div>
    </div>
</div>
<p class="text-right text-gray">基于<a class="text-gray" target="_blank" href="#">拼图前端框架</a>构建</p>
@endsection