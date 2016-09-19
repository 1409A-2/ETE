<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Validator;
use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\User;
use App\Model\Resume;
use App\Model\Enclosure;
use App\Model\Expected;
use App\Model\Porject;
use App\Model\ResumeReseale;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminUser(){
        return view("admin.admin.index");
    }

    /**
     * 用户列表 后台管理用户
     *
     * @param int $comment_id 评论id
     * @param int $user_id 用户id
     * @return array() array(成功or失败,数据)
     */
    public function adminUserList(Request $request){
        $pages=User::selAll();                  //总数
        @$p=empty($request->input('p'))?1:$request->input('p');
        $page['page']=$p;
        $len = 5;
        $page['pages']=ceil($pages/$len);                               //每页条数
        $page['up'] = $p<=1? 1 :$p-1;                   //上一页
        $page['next'] = $p>=$page['pages']? $page['pages'] :$p+1;       //下一页
        $off = ceil($p-1)*$len;                 //偏移量
        $user=User::selPage($len,$off);
        // print_r($user);die;
        return view('admin.user.userlist',['users'=>$user,'page'=>$page]);
    }

    /**
     * 用户列表 删除用户
     *
     * @param int $u_id 用户id
     * @return string string(成功or失败)
     */
    public function adminUserDel(Request $request){
        $id=$request->input('u_id');
        if(!is_array($id)){
            $arr[]=$id;
        }else{
            $arr=$id;
        }
        for($i=0;$i<count($arr);$i++){
            @$rid[$i]=Resume::userUid($arr[$i]);
        }        
        $re=User::userDel($arr);
        @$res=Resume::userDel($arr);        
        // print_r($rid);die;
        @$res=Enclosure::userDel($rid);
        @$res=Expected::userDel($rid);
        @$res=Porject::userDel($rid);
        @$res=ResumeReseale::userDel($rid);
        if($re){
            return redirect('/adminUserList');
        }else{
            return 0;
        }
    }   
}
