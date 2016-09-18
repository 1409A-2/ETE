@extends('admin.lar.public')
@section('title_admin', '行业列表')
@section('content_admin')

<form action="adminIndustryDel" method="get">
    <div class="panel admin-panel">
        <div class="panel-head"><strong>行业列表</strong></div>
        <div class="padding border-bottom">
            <input type="button" class="button button-small checkall" name="checkall" checkfor="i_id[]" value="全选" />
            <input type="submit" id="border-yellow" class="button button-small border-yellow" onclick="{if(confirm('确认删除?')){return true;}return false;}" value="批量删除" />
        </div>
        <table class="table table-hover">
            <tr>
                <th width="245">选择</th>
                <th width="200">行业ID</th>
                <th width="200">所属行业</th>
                <th width="*">行业名称</th>
                <th width="100">操作</th>
            </tr>
            @foreach($industry as $v)
                <tr>
                    <td>
                        <input type="checkbox" name="i_id[]" value="{{$v['i_id']}}" />
                    </td>
                    <td>{{$v['i_id']}}</td>
                    <td>{{$v['i_pname']}}</td>
                    <td>{{$v['i_name']}}</td>
                    <td>
                        <a class="button border-blue button-little" href="adminIndustryUp?i_id={{$v['i_id']}}">编辑</a>
                        <a class="button border-yellow button-little" href="adminIndustryDel?i_id={{$v['i_id']}}" onclick="{if(confirm('确认删除?')){return true;}return false;}">删除</a>
                    </td>
                </tr>
            @endforeach
        </table>
        <div class="panel-foot text-center">
            <ul class="pagination">
                <li>
                    <a href="adminIndustryList?p=1">首页</a>
                </li>
                <li>
                    @if($page['page']==1)
                        <a href="javascript:;">上一页</a>
                    @else
                        <a href="adminIndustryList?p={{$page['up']}}">上一页</a>
                    @endif
                </li>
            </ul>
            <ul class="pagination pagination-group">
                @for($i=($page['page']-2);$i<=($page['page']+2);$i++)
                    @if($i<1)
                    <?php continue  ?>
                    @endif
                    @if($i>$page['pages'])
                    <?php continue  ?>
                    @endif
                    <li><a href="adminIndustryList?p={{$i}}">{{$i}}</a></li>
                @endfor
            </ul>
            <ul class="pagination">
                <li>
                    @if($page['page']==$page['pages'])
                        <a href="javascript:;">下一页</a>
                    @else
                        <a href="adminIndustryList?p={{$page['next']}}">下一页</a>
                    @endif
                </li>
                <li>
                    <a href="adminIndustryList?p={{$page['pages']}}">尾页</a>
                </li>
            </ul>
        </div>
    </div>
    </form>
@endsection