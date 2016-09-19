<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Model\Release;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\User;
use App\Model\Company;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AccountController extends Controller
{
	/**
	 * 账号设置-绑定账号
	 * @return [view]
	 */
	public function accountBind()
	{
		if (!empty(session('u_id'))&&!empty(session('u_email'))) {
			$u_id = session('u_id');
			$data = User::findOnly($u_id);
	        return view('index.account.accountBind',['data'=>$data]);
        }
        return redirect('/');
	}

	/**
	 * 账号设置-绑定账号Pro
	 * @return [data]
	 */
	public function accountPro(Request $Request)
	{
		if (!empty(session('u_id'))&&!empty(session('u_email'))) {
			$data['r_openid'] = $Request->input('user');
			$data['u_id'] = session('u_id');
			$res = User::weixin($data);
			if ($res) {
				echo "<script>alert('绑定成功，您现在已经可以使用微信登陆！');location='/accountBind.html';</script>";
			} else {
				echo "<script>alert('绑定失败，请您联系客服或核实信息后再次尝试！');location='/accountBind.html';</script>";
			}
        } else {
	        return redirect('/');
        }
	}

	/**
	 * 账号设置-解除绑定账号Pro
	 * @return [data]
	 */
	public function unAccount()
	{
		if (!empty(session('u_id'))&&!empty(session('u_email'))) {
			$data['r_openid'] = "";
			$data['u_id'] = session('u_id');
			$res = User::weixin($data);
			if ($res) {
				echo "<script>alert('解绑成功，您已经成功取消微信绑定！');location='/accountBind.html';</script>";
			} else {
				echo "<script>alert('解绑失败，请您联系客服或核实信息后再次尝试！');location='/accountBind.html';</script>";
			}
        } else {
	        return redirect('/');
        }
	}
	
	/**
	 * 账号设置-修改密码
	 * @return [view]
	 */
	public function updatePwd()
	{
		if (!empty(session('u_id'))&&!empty(session('u_email'))) {
			$u_id = session('u_id');
			$data = User::findOnly($u_id);
			return view('index.account.updatePwd',['data'=>$data]);
        }
        return redirect('/');
	}

	/**
	 * 修改密码upPwdPro
	 */
	public function upPwdPro(Request $Request)
	{
		$data = $Request->all();
		unset($data['_token']);
		$pwd = md5($data['oldpassword']);
		$user_data = User::findOnly($data['u_id']);
		if ($user_data['u_pwd']==$pwd) {
			$data['u_pwd']=$data['newpassword'];
			$res = User::upPwd($data);
			if ($res) {
				echo "<script>alert('修改成功，请重新登陆！');location='/loginOut.html';</script>";
			} else {
				echo "<script>alert('修改失败，请核对信息后重新尝试！');location='/updatePwd.html';</script>";
			}
		} else {
			echo "<script>alert('旧密码错误，请核对后再次尝试！');location='/updatePwd.html';</script>";
		}
	}
}