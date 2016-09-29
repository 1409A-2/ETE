<?php

namespace App\Http\Controllers\Admin;

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
