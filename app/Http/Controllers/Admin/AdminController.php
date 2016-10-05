<?php

namespace App\Http\Controllers\Admin;

use App\Model\UR;
use Illuminate\Http\Request;
use Validator;
use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Admin;
use App\Model\Role;
use App\Model\Company;
use Session;
use App\Http\Controllers\Index\IndexController;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin()
    {
        //print_r(session('uid'));die;
        //Session::forget('uid');
        
        return view('admin.login.login'); 
    }

    public function adminLogin(Request $request){
    	$data=$request->all();
        $data['a_name']=$data['uname'];
    	$data['a_pwd']=md5($data['upwd']);
    	unset($data['_token']);
        unset($data['upwd']);
        unset($data['uname']);

    	$re=new Admin();
    	if($arr=$re->checkLog($data)){
    		unset($arr['upwd']);
    		session()->put('uid',$arr);

    		return redirect('adminIndex');
    	}else{

    		return redirect('admin');
    	}
    	
    }

    public function adminIndex(){
        // $user = Admin::find(1);
        // foreach ($user->roles as $role)
        // {
        //     $arr[] = $role->toArray();
        // }
        // print_r($arr);
        // $roleData = Role::find(2);
        // foreach ($roleData->auths as $auth)
        // {
        //     $list[] = $auth->toArray();
        // }
        // print_r($list);
        // die;
        return view("admin.admin.index");
    }

    public function adminUser(){
        return view("admin.admin.index");
    }

    /**
     * 注销登录
     */
    public function cancellation(){
        session()->forget('uid');
        //print_r($data);die;
        return redirect('admin');
    }

       //后台管理员列表
    public function manageList(Request $request){
        $rows=Admin::countAll();
        $length=3;
        $pages=ceil($rows/$length);
        //print_r($pages);die;
        $page=$request->get('page',1);
        $limit=($page-1)*$length;
        $admin_list=Admin::selAll($length,$limit);
        
        return view('admin.admin.manageList',['admin_list'=>$admin_list,'pages'=>$pages,'page'=>$page]);
    }

    public function manageAdd(){

        return view('admin.admin.manageAdd');
    }

    /**
     * [userAdd description]管理员添加
     * @return [type] [description]
     */
    public function userAdd(Request $request){
        //接收表单传值
        $data=$request->all();
        unset($data['_token']);
        $data['a_name']=$request->input('a_name');
        //print_r($data['a_name']);die;
        $data['a_pwd']=md5($data['a_pwd']);
        $data['a_repwd']=md5($data['a_repwd']);
        $data['a_nickname']=$request->input('a_nickname');
        $data['a_email']=$request->input('a_email');
        $res=Admin::addOne($data);
       
        if($res){
            
            return redirect('manageList');
        }else{
           
           return redirect('manageAdd');
        }

    }

    //修改用户信息---1/2
    public function userUpd(){
      $admin=session('uid');

      $data=Admin::selOne($admin['a_id']);
   
        return view('admin.admin.manageAdd',['data'=>$data]);
    }

    public function manageEdit(Request $request){

          $a_id=$request->input('a_id');

            $data['a_name']=$request->input('a_name');
            $data['a_nickname']=$request->input('a_nickname');
            $data['a_email']=$request->input('a_email');

            $res=Admin::userUpd(['a_id'=>$a_id],$data);

            if ($res) {
                   return redirect('manageList');
            } else {
                    return redirect('manageEdit');
            }

    }

    //删除用户信息
    public function userDel(Request $request){
        $a_id=$request->input('a_id');
        ///print_r($a_id);die;
        if($a_id==1){
            echo "<script>alert('管理员不能删除');location.href='manageList';</script>";
        }else{
            $res=Admin::userDel(['a_id'=>$a_id]);
            UR::delUser($a_id);
            if($res){

                return redirect('manageList');
            }else{
                echo "<script>alert('删除失败');location.href='manageList';</script>";
            }
        }
       
    }
	/**
     * 生成前台首页
     */
    public function homeIndexOut(){
        $index = new IndexController();
        ob_start();
        $fp =fopen("./index.html",'w');
        $content=$index->Index();
        fwrite($fp, $content);
        fclose($fp);
        echo "<script>alert('首页生成成功');location.href='adminIndex';</script>";
    }
}
