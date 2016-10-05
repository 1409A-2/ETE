@extends('admin.lar.public')
@section('title_admin', '角色添加')
@section('content_admin')

<p>
 @if(isset($role))
 <div class="tab-panel active" id="tab-set">
              
    <div class="tab">
        <div class="tab-body">
            <br />
            <div class="tab-panel active" id="tab-set">
                <form method="post" class="form-x" action="roleEdit">
                <input type="hidden" name="r_id" value="{{$role['r_id']}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="form-group">
                        <div class="label"><label for="r_name">角色名</label></div>
                        <div class="field">
                            <input type="text" class="input" id="r_name" name="r_name" value="{{$role['r_name']}}" size="50" placeholder="角色名" data-validate="required:请填写角色的名称" />
                        </div>
                    </div>

                    <div class="form-button"><button class="button bg-main" type="submit">提交</button></div>
                </form>
            </div>
        </div>
    </div>

 </div>
      @else 

       <div class="tab-panel active" id="tab-set">
              
    <div class="tab">
        <div class="tab-body">
            <br />
            <div class="tab-panel active" id="tab-set">
                <form method="post" class="form-x" action="role_addPro">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="form-group">
                        <div class="label"><label for="r_name">角色名</label></div>
                        <div class="field">
                            <input type="text" class="input" id="r_name" name="r_name" size="50" placeholder="角色名" data-validate="required:请填写角色的名称" />
                        </div>
                    </div>

                    <div class="form-button"><button class="button bg-main" type="submit">提交</button></div>
                </form>
            </div>
        </div>
    </div>

 </div>  
 @endif
</p>




@endsection