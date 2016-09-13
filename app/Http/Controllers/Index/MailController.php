<?php
namespace App\Http\Controllers\Index;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Mail;

class MailController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    // 发送邮件测试
	public function send()
	{
	    $name = '校易聘';
	    $flag = Mail::send('emails.test',['name'=>$name],function($message){
	        $to = '616859204@qq.com';
	        $message ->to($to)->subject('我的天，邮件测试');
	    });
	    if($flag){
	        echo '发送邮件成功，请查收！';
	    }else{
	        echo '发送邮件失败，请重试！';
	    }
	}
}