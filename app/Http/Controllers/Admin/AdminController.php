<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Validator;
use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Admin;
use App\Model\Company;
use Session;

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

    public function adminLogin(Request $request)
    {

    	$data=$request->all();
        $data['a_name']=$data['uname'];
    	$data['a_pwd']=md5($data['upwd']);
    	unset($data['_token']);
        unset($data['upwd']);
        unset($data['uname']);

    	$re=new Admin();
    	if ($arr=$re->checkLog($data)) {
    		unset($arr['upwd']);
    		Session::put('uid',$arr);
    		return redirect('adminIndex');

    	} else {

    		return redirect('admin');
    	}
    	
    }
    public function adminIndex()
    {

        return view("admin.admin.index");
    }
}
