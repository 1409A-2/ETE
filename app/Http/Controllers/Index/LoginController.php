<?php

namespace App\Http\Controllers\Index;

use App\Model\Resume;
use DB;
use App\Http\Controllers\MailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Germey\Geetest\CaptchaGeetest;
use App\Model\User;
use App\Model\Convenient;
use Mail;
header("Access-Control-Allow-Origin:*");
class LoginController extends BaseController
{
    use CaptchaGeetest;
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    // 登陆
    public function login(Request $request){
        $userKey = $request->input('user');
        $ct_type = $request->input('ct_type');
        if (!empty($userKey)) {
            $con_data = Convenient::checkOnly($userKey);
            if ($con_data) {
                $checkRest = User::findOnly($con_data['u_id']);
                session()->put('u_id', $checkRest['u_id']);
                session()->put('u_email', $checkRest['u_email']);
            } else {

                return view('index.index.WeixinRegister',['userKey'=>$userKey,'ct_type'=>$ct_type]);
            }
        }
        if (!empty(session('u_id'))&&!empty(session('u_email'))) {
            return redirect('/');
        }

    	return  view('index.login.login');
    }

    // 登陆ajax验证
    public function loginPro(Request $Request)
    {
        $data = $Request->all();
        unset($data['_token']);
        $data['u_pwd'] = md5($data['u_pwd']);
        $Request = $this->validate($Request, [
            'geetest_challenge' => 'required|geetest',
        ], [
            'geetest' => Config::get('geetest.server_fail_alert')
        ]);
        if ($Request) {
            return json_decode($Request);
        }
    	$list = User::checkLog($data);
        if ($list)
        {
			if ($data['status'] == 1) {
				//使用put方法直接创建Session变量
			    session()->put('u_id', $list['u_id']);
			    session()->put('u_email', $list['u_email']);
			    return 0;
			} else {
				//使用put方法直接创建Session变量
			    session()->put('u_id', $list['u_id'], 3600*24*7 );
			    session()->put('u_email', $list['u_email'], 3600*24*7 );
			    return 1;
			}
			
        } else {
        	return 2;
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
        $Request = $this->validate($Request, [
            'geetest_challenge' => 'required|geetest',
        ], [
            'geetest' => Config::get('geetest.server_fail_alert')
        ]);
        if ($Request) {
            return json_decode($Request);
        }
        unset($data['geetest_challenge']);
        unset($data['geetest_validate']);
        unset($data['geetest_seccode']);

        $reslut = User::findOne($data);
        if ($reslut) {
            return 500;
        }
		$data['u_pwd'] = md5($data['u_pwd']);
		$data['u_resign'] = time();
        $data['u_cid'] = $data['type'];
        unset($data['type']);
		$res = User::addUser($data);
    	if ($res) {
            if($data['u_cid']==0){
                $user['r_email']=$email;
                $user['u_id']=$res;
                Resume::addResume($user);
            }
            $u_id = session('u_id');
            $user_data = User::findOnly($u_id);
            $enEmail = base64_encode($email);
            $content = "欢迎注册校易聘：<br/>请验证你的邮箱以便正常访问网站,进入此网址进行激活》》 <a href='".env('APP_HOST')."/email?email=$enEmail'>这里激活</a>";
            $subject = "校易聘注册认证邮件";
            $rest = MailController::send($content,$email,$subject);
            if ($rest) {
                $content = "欢迎注册校易聘：您的验证邮件已经发送，请您尽快验证，以方便我们更好的为您服务。";
                MessageController::sendMessage($res,$content,2);
            }
            session()->put('u_id', $res);
            session()->put('u_email', $email);
            return json_encode($res);
    	} else {
    		return json_encode($res);
    	}
    }

    /**邮箱验证
     * @param Request $Request
     */
    public function email(Request $Request)
    {
        $deEmail = $Request->input('email');
        $email = base64_decode($deEmail);
        $res = User::emailStatus($email);
        if ($res) {
            echo "<script>alert('恭喜您，邮箱验证成功！');location='login.html';</script>";
        } else {
            echo "<script>alert('您的邮箱已经验证成功，请勿反复验证！');location='login.html';</script>";
        }
    }

    /**退出
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function loginOut()
    {
        session()->forget('u_id');
        session()->forget('u_email');

        return redirect('/');
    }

    /**找回密码-账号确认
     * @return view
     */
    public function pwdBack()
    {
        return view('index.login.back');
    }

    // 账号是否存在ajax验证
    public function backPro(Request $Request)
    {
        $data = $Request->all();
        unset($data['_token']);
        $Request = $this->validate($Request, [
            'geetest_challenge' => 'required|geetest',
        ], [
            'geetest' => Config::get('geetest.server_fail_alert')
        ]);
        if ($Request) {
            return json_decode($Request);
        }
        $list = User::checkOne($data);
        if ($list)
        {
            $email = $list['u_email'];
            $enEmail = base64_encode($email);
            $content = "校易聘密码找回，请点击<a href='".env('APP_HOST')."/newPwd.html?email=$enEmail'>这里找回</a>";
            $subject = "校易聘密码找回系统";
            $rest = MailController::send($content,$email,$subject);
            
            if ($rest) {
                return 0;
            } else {
                return 1;
            }
        } else {
            return 2;
        }
    }

    /**
     * 密码找回-邮箱提示
     * @return view
     */
    public function twoPwd()
    {
        return view('index.login.twoPwd');
    }

    /**找回密码-重置密码
     * @return view
     */
    public function newPwd(Request $Request)
    {
        $deEmail = $Request->input('email');
        $email = base64_decode($deEmail);
        return view('index.login.newPwd',['email'=>$email]);
    }

    /**重置密码newPro
     * @return data
     */
    public function newPro(Request $Request)
    {
        $data = $Request->all();
        unset($data['_token']);
        $res = User::upPwd($data);
        return redirect('/resPwd.html?res='.$res);
    }

    /**
     * 找回密码-修改完成
     * @return view
     */
    public function resPwd(Request $Request)
    {
        $res = $Request->input('res');
        return view('index.login.resPwd',['res'=>$res]);
    }
}
