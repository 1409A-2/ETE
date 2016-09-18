@extends('admin.lar.public')
@section('title_admin', '新增行业')
@section('content_admin')

<div class="tab">
    <div class="tab-body">
        <br />
        <div class="tab-panel active" id="tab-set">
            <form method="post" action="industryAddPro">
                <input type="hidden" name="_token" value="{{csrf_token()}}">

                <div class="form-group">
                    <div class="label"><label for="sitename">行业名称</label></div>
                    <div class="field">
                        <input type="text" class="input" id="i_name" name="i_name" size="50" placeholder="行业名称" data-validate="required:请填写你要添加的行业名称" value="" />
                    </div>
                </div>

                <div class="form-group">
                    <div class="label"><label for="i_pid">所属行业</label></div>
                    <div class="field">
                        <select name="i_pid" class="input" style="width: 200px;" data-validate="required:请选择选择顺序">
                            <option value="0">顶级</option>
                            @foreach($industry as $v)
                                <option value="{{$v['i_id']}}">{{$v['i_name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <script>
                        $('select[name="i_pid"]').val("");
                    </script>
                </div>

                <div class="form-button">
                    <button class="button bg-main" type="submit">
                        添加
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
