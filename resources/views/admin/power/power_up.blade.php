@extends('admin.lar.public')
@section('title_admin', '权限添加')
@section('content_admin')
	<p>
		<div class="tab">
		    <div class="tab-body">
		        <br />
		        <div class="tab-panel active" id="tab-set">
		            <form method="post" class="form-x" action="powerEdit">
		            <input type="hidden" name="p_id" value="{{$data_all['p_id']}}">
		                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
		                <div class="form-group">
		                    <div class="label"><label for="p_name">权限名</label></div>
		                    <div class="field">
		                        <input type="text" class="input" id="p_name" name="p_name" value="{{$data_all['p_name']}}" size="50" placeholder="权限名" data-validate="required:请填写权限的名称" />
		                    </div>
		                </div>

		                  <div class="form-group">
                        <div class="label"><label for="parent_id">父级权限</label></div>
                        <div class="field">
                            <select name="parent_id" id="parent_id" class="input" style="width: 200px" data-validate="required:请选择选择状态">
                                <option value="0">顶级目录</option>
                                @foreach($user_data as $key => $value)
                                    <option value="{{$value['p_id']}}">{{str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$value['level']).'|--'.$value['p_name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

		                <div class="form-group">
		                    <div class="label"><label for="p_route">路由</label></div>
		                    <div class="field">
		                        <input type="text" class="input" id="p_route" name="p_route" value="{{$data_all['p_route']}}" size="50" placeholder="路由" data-validate="required:请填写路由" />
		                    </div>
		                </div>
		                  <div class="form-group">
                        <div class="label"><label for="p_status">是否显示</label></div>
                        <div class="field">
                            <input type="radio" name="p_status" data-validate="required:请选择选择状态" value="1" checked/>yes
                            <input type="radio" name="p_status" data-validate="required:请选择选择状态" value="0"/>no
                        </div>
                    </div>

		                <div class="form-button"><button class="button bg-main" type="submit">提交</button></div>
		            </form>
		        </div>
		    </div>
		</div>
	
	</p>
@endsection