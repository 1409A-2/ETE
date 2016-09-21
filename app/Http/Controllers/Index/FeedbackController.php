<?php

namespace App\Http\Controllers\Index;

use Mail;
use Storage;
use Illuminate\Http\Request;
use App\Model\Company;
use App\Model\Subscribe;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class FeedbackController extends Controller
{

        //订阅职位
    public function subscribe(){
        $u_email=session('u_email','');
        $u_id=session('u_id','');
        $subscribe = Subscribe::sel($u_id);
        return view('index.subscribe.subscribe',['u_email'=>$u_email,'u_id'=>$u_id,'subscribe'=>$subscribe]);
    }

    // 订阅职位完成
    public function subscribeEmail(Request $request){
        $data=$request->input();
        unset($data['_token']);
        $data['s_time']=time();
        $subscribe = Subscribe::sel($data['u_id']);
        if(empty($subscribe)){
        	Subscribe::add($data);
        }else{
        	Subscribe::up($data);
        }
        if(empty($subscribe)){
        	@$k=$request->input('s_salary');
	        if(strpos($k, '-')){
	            $ks=explode('-',$k);
	            for($i=0;$i<count($ks);$i++){
	                $arr[$i]=substr($ks[$i],0,strpos($ks[$i],'k'));
	            }
	        } else {
	            $arr[0]=substr($k,0, strpos($k, 'k'));
	            if($arr[0]==2){
	                $arr[1]=$arr[0];
	                $arr[0]=0;
	            }else{
	                $arr[1]=100;
	            }
	        }
	        $sub=Company::subQuery($arr[0],$arr[1],$data);
	           
	        Mail::send('index.subscribe.subscribes',['data'=>$data,'sub'=>$sub], function ($message) use ($data) {
	        	$message->to($data['s_email'])->subject('校易聘订阅通知');
	        });
        }else{
        	$time_sql=date('Y-m-d',time());
	        $time_sql=strtotime($time_sql);
	        $time_input=date('Y-m-d',$subscribe['s_time']);
	        $time_input=strtotime($time_input);
	  		if($time_input!=$time_sql){	
	  			@$k=$request->input('s_salary');
		        if(strpos($k, '-')){
		            $ks=explode('-',$k);
		            for($i=0;$i<count($ks);$i++){
		                $arr[$i]=substr($ks[$i],0,strpos($ks[$i],'k'));
		            }
		        } else {
		            $arr[0]=substr($k,0, strpos($k, 'k'));
		            if($arr[0]==2){
		                $arr[1]=$arr[0];
		                $arr[0]=0;
		            }else{
		                $arr[1]=100;
		            }
		        }
		        $sub=Company::subQuery($arr[0],$arr[1],$data);
		           
		        Mail::send('index.subscribe.subscribes',['data'=>$data,'sub'=>$sub], function ($message) use ($data) {
		        	$message->to($data['s_email'])->subject('校易聘订阅通知');
		        });
	  		}
        }
        

        
    
    }

    public function subscribeDel(Request $request){
    	$u_id=$request->input('id');
    	return Subscribe::del($u_id);
    }
}
