<?php

namespace App\Http\Controllers\Admin;

use Mail;
use App\Model\Subscribe;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
header("content-type:text/html;charset=utf-8");
class SubscribeController extends Controller
{
	//后台管理订阅功能
	public function adminSubscribe(Request $request){
		$pages=Subscribe::selNum();
		$p=empty($request->input('p'))?1:$request->input('p');
        $page['page']=$p;
        $len = 6;
        $page['pages']=ceil($pages/$len);                               //每页条数
        $page['up'] = $p<=1? 1 :$p-1;                   //上一页
        $page['next'] = $p>=$page['pages']? $page['pages'] :$p+1;       //下一页
        $off = ceil($p-1)*$len;                 //偏移量
        $subscribe= Subscribe::selAll($len,$off);
		return view('admin.subscribe.subscribe',['subscribe'=>$subscribe,'page'=>$page]);
	}

	//删除订阅信息  //发邮件通知用户
	public function subscribeDelete(Request $request){
		$id=$request->input('u_id');
		$p=$request->input('p',1);
        if(!is_array($id)){
            $arr[]=$id;
        }else{
            $arr=$id;
        }
		for($i=0;$i<count($arr);$i++){
       		$data = Subscribe::sel($arr[$i]);
			Mail::send('admin.subscribe.subscribes',['data'=>$data], function ($message) use ($data) {
	        	$message->to($data['s_email'])->subject('校易聘订阅通知');
	        });
		}

        $re = Subscribe::dele($arr);
        if($re){
            return redirect('adminSubscribe?p='.$p);
        }
	}

}