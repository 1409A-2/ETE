<?php

namespace App\Http\Controllers\Index;

use App\Model\Industry;
use App\Model\Release;
use App\Model\Company;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Session;
use Request;
use DB;
use App\Model\User;

header("content-type:text/html;charset=utf8");

class IndexController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index(){
        //查询所有行业
        $industry=industry::sel();
        //print_r($industry);die;
        $new_industry='';
        $parent=0;
        foreach($industry as $key => $val) {
            if ($val['level']==0){
                $new_industry[$val['i_id']] = $val;
                $parent = $val['i_id'];
            }

            if($val['level']==2){
                $new_industry[$parent]['son'][] = $val;
            }
        }
        // print_r($new_industry);die;
        $num = count($new_industry);
        $two_industry='';
        for($i=1;$i<=$num;$i++){
            for($k=0;$k<10;$k++){
                $two_industry[$i][]=$new_industry[$i]['son'][rand($i,count($new_industry[$i]['son'])-1)];
            }
        }
        // print_r($two_industry);die;
        $i=0;
        foreach($industry as $key => $val) {
            if ($val['level']==1){
                $hid_industry[$i] = $val;
                $parent = $i;
                $i++;
            }
            if($val['level']==2){
                $hid_industry[$parent]['son'][] = $val;
            }
        }
        unset($industry);
        //print_r($hid_industry);die
        $u_id = Session::get('u_id');
        $u_email = Session::get('u_email');
        return  view('index.index.test',['count'=>$num,'two_industry'=>$two_industry,'industry'=>$hid_industry,'nav_industry'=>$new_industry,'u_id'=>$u_id,'u_email'=>$u_email]);
    }

    //跳转职业详情
    public function jump(){
        $i_name=Request::input('i_name');
        $row = DB::table('release')->where('re_name',$i_name)->count('re_id');
        $length = 6;
        $pages = ceil($row/$length);
        $page = Request::get('page',1);
        $limit = ($page-1)*$length;

        $list=DB::table('release')
            ->where('re_name',$i_name)
            ->join('company','release.c_id','=','company.c_id')
            ->limit($length)->offset($limit)->get();
        $str=json_encode($list);
        $arr=json_decode($str,true);
        // print_r($arr);die;
        return view('index.index.ShowList',['arr'=>$arr,'i_name'=>$i_name,'pages'=>$pages,'page'=>$page]);
    }

    //职位详情
    public function postPreview(){



        $put=Request::input();
        $release=Release::selPreviews($put);

        $company=Company::sel(['c_id'=>$release['c_id']]);
        // print_r($release);die;
        return view('index.index.postOffice_preview',['release'=>$release,'company'=>$company]);
    }
}
