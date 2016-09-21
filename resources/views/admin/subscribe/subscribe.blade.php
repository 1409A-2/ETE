@extends('admin.lar.public')
@section('title_admin', '订阅管理')
@section('content_admin')

<form action="subscribeDelete" method="get">
    <div class="panel admin-panel">
    
        <div class="panel-head"><strong>订阅详情</strong></div>
        <div class="padding border-bottom">
            <input type="button" class="button button-small checkall" name="checkall" checkfor="u_id[]" value="全选" />
            <input type="submit" id="border-yellow" class="button button-small border-yellow" value="批量删除" />
        </div>
        <table class="table table-hover">
            <tr><th width="245">选择</th><th width="200">邮箱</th><th width="*">订阅内容</th><th width="*">订阅时间</th><th width="150">操作</th></tr>
            @foreach($subscribe as $v)
                <tr>
                    <td><input type="checkbox" name="u_id[]" value="{{$v['u_id']}}" /></td>
                    <td>{{$v['s_email']}}</td>
                    <td><font color="#91bece">{{$v['s_length']}}</font>天  /领域：<font color="#91bece">{{$v['s_field']}}</font>  /薪资：<font color="#91bece">{{$v['s_salary']}}</font>  /职位：<font color="#91bece">{{$v['s_position']}}</font></td>
                    <td>{{$v['s_time']}}</td>
                    <td><input type="hidden" name="p" value="{{$page['page']}}">
                        <a class="button border-yellow button-little" href="subscribeDelete?u_id={{$v['u_id']}}&p={{$page['page']}}" >删除</a>
                    </td>
                </tr>
            @endforeach
        </table>
        <div class="panel-foot text-center">
            <ul class="pagination"><li>
                @if($page['page']==1)
                    <a href="javascript:;">上一页</a>
                @else
                    <a href="adminSubscribe?p={{$page['up']}}">上一页</a>
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
                    <li><a href="adminSubscribe?p={{$i}}">{{$i}}</a></li>
                @endfor
            </ul>
            <ul class="pagination"><li>
                @if($page['page']==$page['pages'])
                    <a href="javascript:;">下一页</a>
                @else 
                    <a href="adminSubscribe?p={{$page['next']}}">下一页</a>
                @endif
            </li></ul>
        </div>
    </div>
    </form>
@endsection

