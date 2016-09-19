@extends('admin.lar.public')
@section('title_admin', '校易聘后台管理-友情链接')
@section('content_admin')

    <div class="tab">
        <div class="tab-head">
            <strong>友情连接</strong>
            <ul class="tab-nav">
                <li class="active"><a href="#tab-email">友情链接</a></li>
                @if(count($carousel)<15)
                <li><a href="#tab-set">添加链接</a></li>
                @endif
            </ul>
        </div>

        <div class="tab-body">
            <br />
            @if(count($carousel)<15)
            <div class="tab-panel" id="tab-set">
                <form method="post" class="form-x" action="friendLinkPro" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">

                    <div class="form-group">
                        <div class="label"><label for="sitename">链接名称</label></div>
                        <div class="field">
                            <input type="text" class="input" id="sitename" name="sitename" size="50" placeholder="链接名称" data-validate="required:请填写你链接名称" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="label"><label for="siteurl">链接地址</label></div>
                        <div class="field">
                            <input type="text" class="input" id="siteurl" name="siteurl" size="50" placeholder="请填写网址" data-validate="required:请填写网址,url:请填写正确的链接网址" />
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

                    <div class="form-button"><button class="button bg-main" type="submit">提交</button></div>
                </form>
            </div>
            @endif

            <div class="tab-panel active" id="tab-email">
                <form method="post" action="batchDelLink">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="panel admin-panel">
                        <div class="panel-head"><strong>轮播列表</strong></div>
                        <div class="padding border-bottom">
                            <input type="button" class="button button-small checkall" name="checkall" checkfor="id[]" value="全选" />
                            <input type="submit" class="button button-small border-yellow" value="批量删除" onclick="{if(confirm('确认删除?')){return true;}return false;}" />
                        </div>
                        <table class="table table-hover">
                            <tr>
                                <th width="45">选择</th>
                                <th width="200">名称</th>
                                <th width="*">地址</th>
                                <th width="100">排序</th>
                                <th width="100">操作</th>
                            </tr>
                            @foreach($carousel as $val)
                            <tr>
                                <td><input type="checkbox" name="id[]" value="{{$val['link_id']}}" /></td>
                                <td>{{$val['link_name']}}</td>
                                <td>{{$val['link_url']}}</td>
                                <td>{{$val['link_sort']}}</td>
                                <td>
                                    <a class="button border-blue button-little" href="uplink?car_id={{$val['link_id']}}">详情</a>
                                    <a class="button border-yellow button-little" href="dellink?car_id={{$val['link_id']}}" onclick="{if(confirm('确认删除?')){return true;}return false;}">删除
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
