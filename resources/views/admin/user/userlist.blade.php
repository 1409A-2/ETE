@extends('admin.lar.public')
@section('title_admin', '测试')
@section('content_admin')



<form action="adminUserDel" method="get">
    <div class="panel admin-panel">
        <div class="panel-head"><strong>内容列表</strong></div>
        <div class="padding border-bottom">
            <input type="button" class="button button-small checkall" name="checkall" checkfor="u_id[]" value="全选" />
            <input type="submit" id="border-yellow" class="button button-small border-yellow" value="批量删除" />
        </div>
        <table class="table table-hover">
            <tr><th width="245">选择</th><th width="400">邮箱</th><th width="*">时间</th><th width="100">操作</th></tr>
            @foreach($users as $v)
                <tr>
                    <td><input type="checkbox" name="u_id[]" value="{{$v['u_id']}}" />{{$v['u_id']}}</td>
                    <td>{{$v['u_email']}}</td>
                    <td>{{date('Y-m-d H:i:s',$v['u_resign'])}}</td>
                    <td>
                        <a class="button border-yellow button-little" href="adminUserDel?u_id={{$v['u_id']}}" >删除</a>
                    </td>
                </tr>
            @endforeach
        </table>
        <div class="panel-foot text-center">
            <ul class="pagination"><li>
                @if($page['page']==1)
                    <a href="javascript:;">上一页</a>
                @else
                    <a href="adminUserList?p={{$page['up']}}">上一页</a>
                @endif
            </li></ul>
            <ul class="pagination pagination-group">
                @for($i=($page['page']-2);$i<=($page['page']+2);$i++)
                    @if($i<1)
                    <?php continue  ?>
                    @endif
                    @if($i>$page['pages'])
                    <?php continue  ?>
                    @endif                                      
                    <li><a href="adminUserList?p={{$i}}">{{$i}}</a></li>
                @endfor
            </ul>
            <ul class="pagination"><li>
                @if($page['page']==$page['pages'])
                    <a href="javascript:;">下一页</a>
                @else
                    <a href="adminUserList?p={{$page['next']}}">下一页</a>
                @endif
            </li></ul>
        </div>
    </div>
    </form>
@endsection

