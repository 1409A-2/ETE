<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Mail;

class MailController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // 发送邮件测试
	public static function send($content,$email,$subject)
	{
	    $flag = Mail::send('email.send',['content'=>$content,'email'=>$email],function($message) use($email,$subject){
	        $message ->to($email)->subject($subject);
	    });

        return $flag;
	}
}