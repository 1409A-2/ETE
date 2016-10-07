@extends('admin.lar.public')
@section('title_admin', '分配角色')
@section('content_admin')
<script>
    $(function () {
        $("#a_id").change(function(){
            var a_id = $(this).val();
            var r_id = $("input[name='r_id[]']");
            for(var x=0;x<=r_id.length;x++){
                r_id.eq(x).removeAttr('checked')
            }
            if(a_id==''){
                return
            }
            $.ajax({
                type : 'post',
                url : 'getRole',
                dataType : 'json',
                data : {
                    a_id : a_id,
                    _token : "{{csrf_token()}}"
                },
                success : function(re){
                    for(var i=0;i<re.length;i++){
                        for(var x=0;x<r_id.length;x++){

                            if(re[i].r_id == r_id.eq(x).val()){
                                r_id.eq(x).click();
                            }
                        }
                    }

                }
            })
        });
    });
</script>
     <div class="tab">
            <div class="tab-body">
                <br />
                <div class="tab-panel active" id="tab-set">
                    <form method="post" class="form-x" action="setRole_pro">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <div class="form-group">
                            <div class="label"><label for="a_name">用户名</label></div>
                            <div class="field">
                                <select name="a_id" id="a_id" class="input" style="width: 200px" data-validate="required:请选择选择用户">
                                    <option value="">请选择...</option>
                                    @foreach($admin_list as $key => $value)
                                        <option value="{{$value['a_id']}}">{{$value['a_name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="label"><label for="r_name">角色名</label></div>
                            <div class="field">
                                @foreach($role_list as $value)
                                    <input type="checkbox" name="r_id[]" value="{{$value['r_id']}}">  {{$value['r_name']}}<br/>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-button"><button class="button bg-main" type="submit">提交</button></div>
                    </form>
                </div>
            </div>
        </div>
@endsection




