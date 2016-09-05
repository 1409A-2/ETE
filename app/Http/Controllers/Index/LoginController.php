<?php

namespace App\Http\Controllers\Index;

use App\Model\Resume;
use DB;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Session;
use Germey\Geetest\CaptchaGeetest;
use App\Model\User;
use Mail;

class LoginController extends BaseController
{
    use CaptchaGeetest;
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
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
			if ($data['status'] == 1) {
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
		unset($data['_token']);
        $email = $data['u_email'];
        $reslut = User::findOne($data);
        if ($reslut) {
            echo json_encode(500);
            exit;
        }
		$data['u_pwd'] = md5($data['u_pwd']);
		$data['u_resign'] = time();
        $data['u_cid']=$data['type'];
        unset($data['type']);
        $res= User::addUser($data);

    	if ($res) {
            $user['r_email']=$email;
            $user['u_id']=$res;
            Resume::addResume($user);
            $arr['content'] = '欢迎注册校易聘，请点击或复制以下网址到浏览器里直接打开以便完成注册：'.env('APP_HOST').'/email?email='.$data["u_email"];
            $rest = Mail::raw($arr['content'], function ($message) use($email) {
                $to = $email;
                $message ->to($to)->subject('校易聘注册认证邮件');
            });
            if ($rest) {
                echo json_encode($rest);
                exit;
            } else {
                echo json_encode($rest);
                exit;
            }
    	} else {
    		echo json_encode($res);
            exit;
    	}
    }

    // 邮箱验证
    public function email(Request $Request)
    {
        $email = $Request->input('email');
        $res = User::emailStatus($email);
        if ($res) {
            echo "<script>alert('恭喜您，邮箱验证成功！');location='login.html';</script>";
        } else {
            echo "<script>alert('您的邮箱已经验证成功，请勿反复验证！');location='login.html';</script>";
        }
    }

    public function loginOut()
    {
        Session::forget('u_id');
        Session::forget('u_email');
        return redirect('/');
    }
}
