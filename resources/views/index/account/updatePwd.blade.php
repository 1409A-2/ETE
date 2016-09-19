@extends('index.lar.public')
@section('title', "修改密码-校易聘-最专业的互联网招聘平台")
@section('content')
<div id="container">
	<div class="user_bindSidebar">
        <dl id="user_sideBarmenu" class="user_sideBarmenu">
            <dt>
                <h3 style="padding-bottom:20px;padding-top:10px">帐号设置</h3>
            </dt>
            <dd><a href="accountBind.html">帐号绑定</a></dd>
            <dd><a class="hover" href="updatePwd.html">修改密码</a></dd>
        </dl>
    </div>
    <div class="content user_modifyContent">
        <dl class="c_section">
            <dt>
            	<h2><em></em>修改密码</h2>
            </dt>
            <dd>
            	<form id="updatePswForm" action="upPwdPro" method="post">
            		<table class="savePassword">
            			<tbody>
                            <tr>
                				<td>登录邮箱</td>
                				<td class="c7">
                                    <input type="hidden" name="u_id" value="{{$data['u_id']}}">
                                    <input type="hidden" name="u_email" value="{{$data['u_email']}}">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    {{$data['u_email']}}
                                </td>
                			</tr>
                			<tr>
                				<td class="label">当前密码</td>
                				<td>
                					<input type="password" maxlength="16" id="oldpassword" name="oldpassword">
                                </td>
                			</tr>
                			<tr>
                				<td class="label">新密码</td>
                				<td><input type="password" maxlength="16" id="newpassword" name="newpassword"></td>
                			</tr>
                			<tr>
                				<td class="label">确认密码</td>
                				<td>
                                    <input type="password" maxlength="16" id="comfirmpassword" name="comfirmpassword">
                                    <span id="updatePwd_beError" style="display:none;" class="error">
                                    </span>
                                </td>
                			</tr>
                			<tr>
                				<td>&nbsp;</td>
                				<td><input type="submit" value="保 存"></td>
                			</tr>
                		</tbody>
                    </table>
    			</form>
            </dd>
        </dl>
    </div>
</div>
<script>
$(document).ready(function(){
    // 修改密码
    $("#updatePswForm").submit( function () {
        var oldpassword = $('#oldpassword').val();
        var newpassword = $('#newpassword').val();
        var comfirmpassword = $('#comfirmpassword').val();
        if (oldpassword=='') {
            var str = '旧密码不得为空！';
            $('#updatePwd_beError').attr('style','');
            $('#updatePwd_beError').text('');
            $('#updatePwd_beError').append(str);
            return false;
        } else {
            if (newpassword=='') {
                var str = '新密码不得为空！';
                $('#updatePwd_beError').attr('style','');
                $('#updatePwd_beError').text('');
                $('#updatePwd_beError').append(str);
                return false;
            } else {
                if (newpassword!=comfirmpassword) {
                    var str = '两次密码不一致！';
                    $('#updatePwd_beError').attr('style','');
                    $('#updatePwd_beError').text('');
                    $('#updatePwd_beError').append(str);
                    return false;
                } else {
                    if (newpassword==oldpassword) {
                        var str = '新旧密码不能一样！';
                        $('#updatePwd_beError').attr('style','');
                        $('#updatePwd_beError').text('');
                        $('#updatePwd_beError').append(str);
                        return false;
                    } else {
                        $('#updatePwd_beError').attr('style','display:none;');
                        $('#updatePwd_beError').text('');
                        return true;
                    }
                }
            }
        }
    });
});
</script>
@endsection