@extends('admin.lar.public')
@section('title_admin', '角色列表')
@section('content_admin')


<form method="post">
    <div class="panel admin-panel">
        <div class="panel-head"><strong>管理员列表</strong></div>
        <div class="padding border-bottom">
            <input type="button" class="button button-small checkall" name="checkall" checkfor="id" value="全选" />
            <input type="button" class="button button-small border-green" value="添加角色" onclick="location.href='roleAdd'"  />
            <input type="button" class="button button-small border-yellow" value="分配角色" onclick="location.href='allotRole'" />
            <input type="button" class="button button-small border-blue" disabled="disabled" value="回收站" />
        </div>
        <table class="table table-hover">
            <tr>
                <th width="200">全选</th>
                <th width="380">ID</th>
                <th width="700">角色名</th>
                <th>操作</th>
            </tr>
          @foreach($role_list as $k=>$v)
            <tr>
                <td><input type="checkbox" name="r_id" value="12" /></td>
                <td>{{$v['r_id']}}</td>
                <td>{{$v['r_name']}}</td>
                <td>
                @if($v['r_id']==1)
                @else
                <a class="button border-blue button-little" href="userUpd?r_id={{$v['r_id']}}&page={{$page}}">修改</a> 
                <a class="button border-yellow button-little" href="userDel?r_id={{$v['r_id']}}&page={{$page}}" onclick="{if(confirm('确认删除?')){return true;}return false;}">删除</a>
                @endif
                </td>
            </tr>
        @endforeach
        </table>
       <div class="panel-foot text-center">
    <ul class="pagination"><li><a href="roleList?page={{$page-1<1?1:$page-1}}">上一页</a></li></ul>
    <ul class="pagination pagination-group">
     @for($i=1;$i<=$page;$i++)
        <li @if($i==$page) class="active" @endif ><a href="roleList?page={{$i}}">{{$i}}</a></li>
     @endfor
    </ul>
    <ul class="pagination"><li><a href="roleList?page={{$page=$pages}}">下一页</a></li></ul>
</div> 
    </div>
    </form>
@endsection