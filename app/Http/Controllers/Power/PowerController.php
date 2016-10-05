<?php

namespace App\Http\Controllers\Power;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Power;
use App\Model\Role;
use App\Model\UR;
use App\Model\RP;
header("content-type:text/html;charset=utf8");
class PowerController extends Controller
{
	//权限展示列表
    public function powerList(){
    	
    	$data['user_data']=Power::selectAll();
    	$data['count'] = count($data['user_data']);

    	return view('admin.power.power_list',$data);
    }

    public function powerAdd(){
        $users = new Power();
        $user_data = $users->selectAll();
        //print_r($user_data);die;
        $data = '';
        foreach($user_data as $key =>$value){
            if($value['level']<=1){
                $data['user_data'][] = $value;
            }
        }
        $data['count'] = count($data['user_data']);
        //print_r($data);die;

    	return view('admin.power.power_add',$data);
    }


    //权限添加
    public function powerInsert(Request $request){
    	$data=$request->all();
    	unset($data['_token']);
    	$power=Power::addOne($data);
    	if($power){

    		return redirect('powerList');
    	}else{

    		return redirect('powerAdd');
    	}
    }

    public function powerDel(Request $request){
        $p_id=$request->input('p_id');
        $res=Power::del(['p_id'=>$p_id]);
        RP::delPower($p_id);
        if($res){

            return redirect('powerList');
        }else{
            echo "<script>alert('删除失败');location.href='powerList'</script>";
        }
    }

    public function powerAllot(){
        $data['user_data']=Role::selectAll();
        $data['power_data']=Power::selectAll();
        $data['count']=count($data['power_data']);
        
        return view('admin.power.power_allot',$data);
    }

    public function setPro(Request $request){
        $data=$request->all();
        //print_r($data);die;
        unset($data['_token']);
        //print_r($data);
         $data_set='';
        foreach($data['r_id'] as $key => $val){
            $data_set[$key]['r_id'] = $data['u_id'];
            $data_set[$key]['p_id'] = $val;
        }
        $ur=RP::delOne($data['u_id']);
        $rp=Rp::setRole($data_set);
        if($rp){

            return redirect('SetPower_allot');
        }else{

            echo "<script>alert('分配失败');location.href='SetPower_allot'</script>";
        }
    }

    public function getPower(Request $request){
       
        echo RP::selOne($request->input('uid'));
    }

    public function powerUpd(Request $request){
        $p_id=$request->input('p_id');
       // $power=Power::selOne($p_id);
       // print_r($power);die;
        $data['user_data']=Power::selectAll();
        $data['count'] = count($data['user_data']);
        $data['data_all'] = Power::selOne($p_id);

        return view('admin.power.power_up',$data);

    }
    
    public function powerEdit(Request $request){
        $p_id=$request->input('p_id');
        $data['p_name']=$request->input('p_name');
        $data['p_route']=$request->input('p_route');
        $data['p_status']=$request->input('p_status');

        $power=Power::setUpd(['p_id'=>$p_id],$data);

        if($power){

            return redirect('powerList');
        }else{

            return redirect('powerEdit');
        }
    }

}
