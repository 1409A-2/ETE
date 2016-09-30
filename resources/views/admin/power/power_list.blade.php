@extends('admin.lar.public')
@section('title_admin', '权限列表')
@section('content_admin')

	<p>
		    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
		    <div class="panel admin-panel">
		        <div class="panel-head"><strong>权限列表</strong></div>
		        <div class="padding border-bottom">
		            <input type="button" class="button button-small checkall" name="checkall" checkfor="uid[]" value="全选" />
		            <input type="button" class="button button-small border-green" value="添加权限" onclick="location.href='setPower_add'" />
		            <input type="button" class="button button-small border-yellow" value="分配权限" onclick="location.href='SetPower_allot'">
		            <input type="button" class="button button-small border-blue" value="回收站" />
		        </div>
		        <table class="table table-hover">
		            <tr>
		                <th width="150">ID</th>
		                <th width="190">权限名</th>
		                <th width="160">操作</th>
		            </tr>
		           @foreach($user_data as $key=>$value)
		                <tr>
		                    <td><input type="checkbox" name="uid[]" value="{{$value['p_id']}}" />{{$value['p_id']}}</td>
		                    <td>{{$value['level'] !=0 ? str_repeat('★',$value['level']-1) : ''}}{{$value['level'] !=0 ? $key+1<$count && $user_data[$key+1]['level']==0 ? "★" : "┡" : ''}}{{$value['p_name']}}</td>
		                    <td>
		                    	<a class="button border-blue button-little" href="power_upd?p_id={{$value['p_id']}}">修改</a>
		                        <a class="button border-yellow button-little" href="power_del?p_id={{$value['p_id']}}" onclick="{if(confirm('确认删除?')){return true;}return false;}">删除</a>
		                    </td>
		                </tr>
		            @endforeach
		        </table>
		    </div>
	
	</p>
@endsection



