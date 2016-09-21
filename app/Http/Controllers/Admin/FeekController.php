<?php

namespace App\Http\Controllers\Admin;

use Mail;
use App\Model\Feedback;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
header("content-type:text/html;charset=utf-8");
class FeekController extends Controller
{
    /**
     * 反馈列表显示
     * @return HTML
     */
    public function feedBackList(Request $request)
    {
        $pages=Feedback::selAll(0);                  //总数
        $p=empty($request->input('p'))?1:$request->input('p');
        $page['page']=$p;
        $len = 6;
        $page['pages']=ceil($pages/$len);                               //每页条数
        $page['up'] = $p<=1? 1 :$p-1;                   //上一页
        $page['next'] = $p>=$page['pages']? $page['pages'] :$p+1;       //下一页
        $off = ceil($p-1)*$len;                 //偏移量
        $data= Feedback::sel(0,$len,$off);
        return view('admin.feedback.list',['data'=>$data,'page'=>$page]);
    }

    /**
     * 反馈信息删除
     * @return HTML
     */
    public function feedBackDel(Request $request){
        $id=$request->input('f_id');
        $p=$request->input('p',1);
        if(!is_array($id)){
            $arr[]=$id;
        }else{
            $arr=$id;
        }
        $re = Feedback::feedDel($arr); 
        if($re){
            return redirect('feedBackList?p='.$p);
        }
    }

    /**
     * 删除反馈确认后的信息
     */
    public function feedBackDele(Request $request){
        $id=$request->input('f_id');
        $p=$request->input('p',1);
        if(!is_array($id)){
            $arr[]=$id;
        }else{
            $arr=$id;
        }
        $re = Feedback::feedDel($arr); 
        if($re){
            return redirect('feedBackHandle?p='.$p);
        }
    }

    /**
     * 已经处理的反馈列表
     * @return HTML
     */
    public function feedBackHandle(Request $request)
    {
        $pages=Feedback::selAll(1);                  //总数
        $p=empty($request->input('p'))?1:$request->input('p');
        $page['page']=$p;
        $len = 6;
        $page['pages']=ceil($pages/$len);                               //每页条数
        $page['up'] = $p<=1? 1 :$p-1;                   //上一页
        $page['next'] = $p>=$page['pages']? $page['pages'] :$p+1;       //下一页
        $off = ceil($p-1)*$len;                 //偏移量
        $data= Feedback::sel(1,$len,$off);
        return view('admin.feedback.handle',['data'=>$data,'page'=>$page]);
    }

    /**
     * 发送邮件 接收到反馈
     */
    
    public function feedBackEmail(Request $request){
        $data=$request->input();
        $feed = Feedback::selOne($data['f_id']);
        $str=" 内容:".$feed['f_feedback']."\n 手机号：".$feed['f_tel']."\n 邮箱：".$feed['f_email'];
        $email=$feed['f_email'];
        $content = $data['f_name']."\n\n".$str;
        $rest = Mail::raw($content, function ($message) use($email) {
            $to = $email;
            $message ->to($to)->subject('校易聘认证邮件');
        });
        $re = Feedback::up($data['f_id'],1);
        if($re){
            return redirect('feedBackList');
        }else{
            return;
        }
    }
}
