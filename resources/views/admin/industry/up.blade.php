@extends('admin.lar.public')
@section('title_admin', '编辑行业')
@section('content_admin')

<div class="tab">
    <div class="tab-body">
        <br />
        <div class="tab-panel active" id="tab-set">
            <form method="post" action="industryUpPro">
                <input type="hidden" name="_token" value="{{csrf_token()}}">

                <div class="form-group">
                    <div class="label"><label for="sitename">行业名称</label></div>
                    <div class="field">
                        <input type="hidden" class="input" id="i_id" name="i_id" value="{{$data['i_id']}}" >
                        <input type="text" class="input" id="i_name" name="i_name" size="50" placeholder="行业名称" data-validate="required:请填写你要修改的行业名称" value="{{$data['i_name']}}" />
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="label"><label for="i_pid">所属行业</label></div>
                    <div class="field">
                        @if($data['i_pname']=="")
                            <input type="hidden" class="input" name="i_pid" style="width: 200px;" disabled="true" value="0">
                            <p>顶级目录不可以更改</p>
                        @else
                            <select name="i_pid" class="input" style="width: 200px;" data-validate="required:请选择选择顺序">
                                <option value="0">
                                    顶级
                                </option>
                                @foreach($industry as $v)
                                    <option value="{{$v['i_id']}}" 
                                        @if($v['i_name']==$data['i_pname'])
                                            selected="selected" 
                                        @endif
                                    >
                                        {{$v['i_name']}}
                                    </option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                </div>

                <div class="form-button">
                    <button class="button bg-main" type="submit">
                        编辑
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
