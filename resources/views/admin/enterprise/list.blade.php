@extends('admin.enterprise.enterprise')
@section('title_admin', '测试')
@section('content_admin')



    <form method="post">
        <div class="panel admin-panel">
            <div class="panel-head"><strong>企业列表</strong></div>
            <div class="padding border-bottom">
                <input type="button" class="button button-small checkall" name="checkall" checkfor="id" value="全选"/>
                <input type="button" class="button button-small border-green" value="添加文章"/>
                <input type="button" class="button button-small border-yellow" value="批量删除"/>
                <input type="button" class="button button-small border-blue" value="回收站"/>
            </div>
            <table class="table table-hover">
                <tr>
                    <th width="45">选择</th>
                    <th width="100">企业ceo</th>
                    <th width="150">企业名称</th>
                    <th width="150">企业logo</th>
                    <th width="150">企业邮箱</th>
                    <th width="100">企业电话</th>
                    <th width="100">企业网站</th>
                    <th width="200">企业介绍</th>
                </tr>
                @foreach($company as $v)
                    <tr>
                        <td><input type="checkbox" name="c_id" value="{{$v['c_id']}}"/></td>
                        <td>{{$v['c_ceo']}}</td>
                        <td>{{$v['c_name']}}</td>
                        <td><img src="{{$v['c_logo']}}" alt="企业logo" width="85px" height="50px"/></td>
                        <td>{{$v['c_email']}}</td>
                        <td>{{$v['c_tel']}}</td>
                        <td><a target="{{$v['c_name']}}" href="{{$v['c_website']}}">{{$v['c_website']}}</a></td>
                        <td>{{mb_substr($v['c_desc'],0,5,'utf-8')}}……</td>

                        <td><a class="button border-blue button-little" href="#">修改</a> <a
                                    class="button border-yellow button-little" href="#"
                                    onclick="{if(confirm('确认删除?')){return true;}return false;}">删除</a></td>
                    </tr>
                @endforeach
            </table>
            <div class="panel-foot text-center">
                <ul class="pagination">
                    <li><a href="#">上一页</a></li>
                </ul>
                <ul class="pagination pagination-group">
                    <li><a href="#">1</a></li>
                    <li class="active"><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                </ul>
                <ul class="pagination">
                    <li><a href="#">下一页</a></li>
                </ul>
            </div>
        </div>
    </form>
@endsection

