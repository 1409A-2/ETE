@extends('admin.lar.public')
@section('title_admin', '管理员添加')
@section('content_admin')

<p>
    @if(isset($data))
            <div class="tab-panel active" id="tab-set">
                <form method="post" class="form-x" action="manageEdit">
                <input type="hidden" name="a_id" value="{{$data['a_id']}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="form-group">
                        <div class="label"><label for="uname">用户名</label></div>
                        <div class="field">
                            <input type="text" value="{{$data['a_name']}}" class="input" id="a_name" name="a_name" size="50" placeholder="用户名" data-validate="required:请填写用户的名称,length#>=5:账号长度不符合要求" />
                        </div>
                    </div>
        
                    <div class="form-group">
                        <div class="label"><label for="nickname">昵称</label></div>
                        <div class="field">
                            <input type="text" value="{{$data['a_nickname']}}" class="input" id="a_nickname" name="a_nickname" size="50" placeholder="昵称" data-validate="required:请填写昵称" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="label"><label for="email">邮箱</label></div>
                        <div class="field">
                            <input type="text" value="{{$data['a_email']}}" class="input" id="a_email" name="a_email" size="50" placeholder="邮箱" data-validate="required:请填邮箱,a_email:请填写正确的邮箱形式 如123@qq.com" />
                        </div>
                    </div>

                    <div class="form-button"><button class="button bg-main" type="submit">提交</button></div>
                </form>
            </div>
            @else
<div class="tab-panel active" id="tab-set">
                <form method="post" class="form-x" action="admin_addPro">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="form-group">
                        <div class="label"><label for="uname">用户名</label></div>
                        <div class="field">
                            <input type="text" class="input" id="a_name" name="a_name" size="50" placeholder="用户名" data-validate="required:请填写用户的名称,length#>=5:账号长度不符合要求" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="label"><label for="pwd">密码</label></div>
                        <div class="field">
                            <input type="password" class="input" id="a_pwd" name="a_pwd" size="50" placeholder="密码" data-validate="required:请填写密码,length#>=6:密码长度不符合要求" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="label"><label for="dopwd">确认密码</label></div>
                        <div class="field">
                            <input type="password" class="input" id="a_repwd" name="a_repwd" size="50" placeholder="确认密码" data-validate="required:请确认密码,repeat#a_pwd:确认密码和密码不一致" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="label"><label for="nickname">昵称</label></div>
                        <div class="field">
                            <input type="text" class="input" id="a_nickname" name="a_nickname" size="50" placeholder="昵称" data-validate="required:请填写昵称" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="label"><label for="email">邮箱</label></div>
                        <div class="field">
                            <input type="text" class="input" id="a_email" name="a_email" size="50" placeholder="邮箱" data-validate="required:请填邮箱,a_email:请填写正确的邮箱形式 如123@qq.com" />
                        </div>
                    </div>

                    <div class="form-button"><button class="button bg-main" type="submit">提交</button></div>
                </form>
            </div>
            @endif
	</p>


@endsection