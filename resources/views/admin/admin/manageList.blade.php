@extends('admin.lar.public')
@section('title_admin', '校易聘')
@section('content_admin')

<form method="post">
    <div class="panel admin-panel">
        <div class="panel-head"><strong>管理员列表</strong></div>
        <div class="padding border-bottom">
            <input type="button" class="button button-small checkall" name="checkall" checkfor="id" value="全选" />
            <input type="button" class="button button-small border-green" value="添加用户" onclick="location.href='manageAdd'"  />
            <input type="button" class="button button-small border-yellow" disabled="disabled" value="批量删除" onclick="" />
            <input type="button" class="button button-small border-blue" disabled="disabled" value="回收站" />
        </div>
        <table class="table table-hover">
            <tr>
                <th width="45">全选</th>
                <th width="120">ID</th>
                <th width="120">用户名</th>
                <th width="100">昵称</th>
                <th width="100">邮箱</th>
                <th width="100">操作</th>
            </tr>
            @foreach($admin_list as $k=>$v)
            <tr>
                <td><input type="checkbox" name="id" value="12" /></td>
                <td>{{$v['a_id']}}</td>
                <td>{{$v['a_name']}}</td>
                <td>{{$v['a_nickname']}}</td>
                <td>{{$v['a_email']}}</td>
                <td>
                    @if($v['a_id']==1)        
                    @else
                    <a  class="button border-blue button-little" href="manageUpd?a_id={{$v['a_id']}}&page={{$page}}" >修改</a> 
                    <a class="button border-yellow button-little" href="manageDel?a_id={{$v['a_id']}}&page={{$page}}" onclick="{if(confirm('确认删除?')){return true;}return false;}">删除</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </table>
        <div class="panel-foot text-center">
            <ul class="pagination"><li><a href="manageList?page={{$page-1<1?1:$page-1}}">上一页</a></li></ul>
            <ul class="pagination pagination-group">
             @for($i=1;$i<=$pages;$i++)
                <li @if($i==$page) class="active" @endif><a href="manageList?page={{$i}}">{{$i}}</a></li>
             @endfor
            </ul>
            <ul class="pagination"><li><a href="manageList?page={{$page=$pages}}">下一页</a></li></ul>
        </div>
    </div>
    </form>
@endsection