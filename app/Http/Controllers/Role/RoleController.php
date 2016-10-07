<?php

namespace App\Http\Controllers\Role;

use App\Model\RP;
use Illuminate\Http\Request;
use Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Role;
use App\Model\Admin;
use App\Model\UR;
use DB;
header("content-type:text/html;charset=utf-8");
class RoleController extends Controller
{
    public function roleList(Request $request){
    	$countAll=Role::count();
    	//print_r($countAll);die;
    	$length=3;
    	$pages=ceil($countAll/$length);
    	$page=$request->input('page',1);
    	$limit=($page-1)*$length;
    	$role_list=Role::selAll($length,$limit);
    	return view('admin.role.role_list',[
    		'role_list'=>$role_list,
    		'pages'=>$pages,
    		'page'=>$page
    	]);
    }

    public function roleAdd(){
    	return view('admin.role.role_add');
    }
    //角色添加
    public function addPro(Request $request){
    	$data=$request->all();
    	unset($data['_token']);
    	$data['r_name']=$request->input('r_name');
    	//print_r($data);
    	$res=Role::addOne($data);
    	if($res){

    		return redirect('roleList');
    	}else{
    		return redirect('roleAdd');
    	}
    }

    //删除一个角色
    public function roleDel(Request $request){
    	$r_id=$request->input('r_id');
    	//print_r($r_id);
    	$res=Role::roleDel(['r_id'=>$r_id]);
        UR::delRole($r_id);
        RP::delRole($r_id);
    	if($res){

    		return redirect('roleList');
    	}else{
    		echo "<script>alert('删除失败');location.href='roleList'</script>";
    	}
    }
    //修改角色1--2
    public function roleUpd(Request $request){
        $r_id=$request->input('r_id');
        $role=Role::selOne($r_id);

        return view('admin.role.role_add',['role'=>$role]);
    }
    //修改角色2---2
    public function roleEdit(Request $request){
        $r_id=$request->input('r_id');
        $data['r_name']=$request->input('r_name');
        $role=Role::roleUpd(['r_id'=>$r_id],$data);

        if($role){

            return redirect('roleList');
        }else{

            return redirect('roleEdit');
        }
    }

    //分配角色
    public function allotRole(){
        $data['admin_list']=Admin::selectAll();
        $data['role_list']=Role::selectAll();
        return view('admin.role.allot_role',$data);
    }

    public function setPro(Request $request){
        $data=$request->all();
        //print_r($data);die;
        unset($data['_token']);
        //print_r($data);
        $new_data='';
        foreach($data['r_id'] as $k=>$v){
            $new_data[$k]['a_id']=$data['a_id'];
            $new_data[$k]['r_id']=$v;
        }
        
       $userRole=UR::selRole($new_data);
       if($userRole){
            return redirect('allotRole');
       }else{
            echo "分配失败";
       }
    }

    //获取用户选中的角色
    public function getRole(Request $request){
       $a_id = $request->input('a_id');

       return UR::selOne($a_id);

    }
 

}
