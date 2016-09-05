<?php

namespace App\Http\Controllers\Index;

use DB;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Session;
use Germey\Geetest\CaptchaGeetest;
use App\Model\User;

class LoginController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, CaptchaGeetest;
    // 登陆
    public function login(){
    	return  view('index.login.login');
    }

    // 登陆ajax验证
    public function loginPro(Request $Request)
    {
    	$data = $Request->all();
		unset($data['_token']);
		$data['u_pwd'] = md5($data['u_pwd']);

    	$list = User::checkLog($data);
        if ($list)
        {
			if ($data['status'] != 0) {
				//使用put方法直接创建Session变量
			    Session::put('u_id', $list['u_id']);
			    Session::put('u_email', $list['u_email']);
			    echo "0";
			} else {
				//使用put方法直接创建Session变量
			    Session::put('u_id', $list['u_id'], 3600*24*7 );
			    Session::put('u_email', $list['u_email'], 3600*24*7 );
			    echo "1";
			}
			
        } else {
        	echo "2";
        }
    }

    // 注册
    public function register(){
    	return view('index.login.register');
    }

    // 注册ajax验证
    public function registerPro(Request $Request)
    {
    	$data = $Request->all();
		print_r($data);die;
		unset($data['_token']);
		$data['u_pwd'] = md5($data['u_pwd']);
		$data['u_resign'] = time();
		$data['u_cid'] = $data['type'];
        unset($data['type']);
		$res = User::addUser($data);
    	if ($res) {
    		echo json_encode($res);
    	} else {
    		echo json_encode($res);
    	}
    }
}
