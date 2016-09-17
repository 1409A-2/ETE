<?php

namespace App\Http\Controllers\Admin;

use App\Model\Feedback;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;

class FeekController extends Controller
{
    /**
     * 反馈列表显示
     * @return HTML
     */
    public function feedBackList(Request $request)
    {
        $pages=Feedback::selAll();                  //总数
        $p=empty($request->input('p'))?1:$request->input('p');
        $page['page']=$p;
        $len = 6;
        $page['pages']=ceil($pages/$len);                               //每页条数
        $page['up'] = $p<=1? 1 :$p-1;                   //上一页
        $page['next'] = $p>=$page['pages']? $page['pages'] :$p+1;       //下一页
        $off = ceil($p-1)*$len;                 //偏移量
        $data= Feedback::sel($len,$off);
        return view('admin.feedback.list',['data'=>$data,'page'=>$page]);
    }

    /**
     * 反馈信息删除
     * @return HTML
     */
    public function feedBackDel(Request $request){
        $id=$request->input('f_id');
        if(!is_array($id)){
            $arr[]=$id;
        }else{
            $arr=$id;
        }
        $re = Feedback::feedDel($arr); 
        if($re){
            return redirect('feedBackList');
        }
    }
}
