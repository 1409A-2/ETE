<?php

namespace App\Http\Controllers\Index;

use App\Model\Carousel;
use App\Model\FriendShip;
use App\Model\Industry;
use App\Model\Lable;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Model\User;
use App\Model\Release;
use App\Model\Company;
use App\Model\Resume;
use Mail;
use DB;

header("content-type:text/html;charset=utf8");

class IndexController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(Request $Request){
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
 for($i=1;$i<=$num;$i++){
            $temp='';
            foreach ($two_industry[$i] as $v){
                $v=$v['i_name'];
                $temp[]=$v;
            }
            $temp=array_unique($temp);//去掉重复的字符串,也就是重复的一维数组
            foreach ($temp as $k => $v){
                if($two_industry[$i][$k]['i_name']==$v){
                    $there_industry[$i][$k]=$two_industry[$i][$k];
                }
            }
        }
        $hot=Release::hotRelease();
        $userKey = $Request->input('user');
        if (!empty($userKey)) {
            $checkRest = User::checkOnly($userKey);
            if (!empty($checkRest)) {
                session()->put('u_id', $checkRest['u_id']);
                session()->put('u_email', $checkRest['u_email']);
            } else {
                return view('index.index.WeixinRegister',['userKey'=>$userKey]);
            }
        }

        $carousel = Carousel::selCarousel();
        $friend = FriendShip::selFriendLink();

        return  view('index.index.test',['count'=>$num,'two_industry'=>$two_industry,'industry'=>$industry,'nav_industry'=>$new_industry,'carousel'=>$carousel,'hot'=>$hot,'friend_link'=>$friend]);
    }

    //跳转职业详情
    public function jump(Request $request){

        $type_selected=$request->input('type_selected');
        if($type_selected=="公司"){
            $c_name=$request->get('c_name','');
            $industry=$request->get('industry','');
            $rows = Company::searchCount($c_name,$industry);
            $length = 6;
            $page = $request->get('page',1);
            $pages = ceil($rows/$length);
            $limit = ($page-1)*$length;
            $company_data = Company::searchAll($c_name,$industry,$length,$limit);

            foreach($company_data as $key=>$val){
                $company_data[$key]['industry'] = explode(',',$val['c_industry']);
                unset($company_data[$key]['c_industry']);
                $company_data[$key]['lable_data'] = Lable::selLable($val['c_id']);
                // $company_data[$key]['release_data'] = Release::selList(['c_id'=>$val['c_id']]);
                    $company_data[$key]['release_data']='';
            }
            // print_r($company_data);die;
            return view('index.index.companylist',[
                'company_data'=>$company_data,
                'page' => $page,
                'pages' =>$pages,
                'industry' => $industry,
                'c_name' =>$c_name
            ]);
        }else{
            $i_name = $request->input('i_name');
            @$k = $request->input('k');
            @$education = $request->input('education');
            if(empty($education)){
                $where=1;
                $education ='';
            }else{
                $where=array('re_education'=>$education);
            }
            if(empty($k)){
                if(empty($education)){
                    $row = DB::table('release')->where('re_status','=','0')->where('re_name','like','%'.$i_name.'%')->count('re_id');
                }else{
                    $row = DB::table('release')->where('re_status','=','0')->where('re_name','like','%'.$i_name.'%')->where($where)->count('re_id');
                }
                $length = 6;
                $pages = ceil($row/$length);
                $page = $request->get('page',1);
                $limit = ($page-1)*$length;
                if(empty($education)){
                    $list=DB::table('release')
                        ->where('re_status','=','0')->where('re_name','like','%'.$i_name.'%')
                        ->join('company','release.c_id','=','company.c_id')
                        ->limit($length)->offset($limit)->get();
                }else{
                    $list=DB::table('release')
                        ->where('re_status','=','0')->where($where)->where('re_name','like','%'.$i_name.'%')
                        ->join('company','release.c_id','=','company.c_id')
                        ->limit($length)->offset($limit)->get();
                }

                $str=json_encode($list);
                $data=json_decode($str,true);
                $k='';
                foreach($data as $key => $v) {
                    $data[$key]['label'] = Lable::selLable($v['c_id']);
                }
            }
            else{
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
                $moery = Release::moery($where,$i_name,$arr[0],$arr[1]);
                $row = count($moery);
                $length = 6;
                $pages = ceil($row/$length);
                $page = $request->get('page',1);
                $limit = ($page-1)*$length;
                $data=Release::moerys($where,$i_name,$arr[0],$arr[1],$limit,$length);
                foreach($data as $key => $v) {
                    $data[$key]['label'] = Lable::selLable($v['c_id']);
                }
            }
            // print_r($data);die;
            return view('index.index.ShowList',[
                'arr'=>$data,
                'education'=>$education,
                'k'=>$k,'i_name'=>$i_name,
                'pages'=>$pages,
                'page'=>$page
            ]);
        }
        
    }

    // 第三方登陆整合
    public function registerWeixin(){
        return view('index.index.WeixinRegister');
    }

    // ajax第三方整合验证
    public function registerProne(Request $Request){
        $data = $Request->all();
        unset($data['_token']);
        $email = $data['u_email'];
        $reslut = User::findOne($data);
        if ($reslut) {
            echo json_encode(500);
            exit;
        }
        $data['u_pwd'] = md5($data['u_pwd']);
        $data['u_resign'] = time();
        $data['u_cid'] = $data['type'];
        unset($data['type']);
        $res = User::addUser($data);
        if ($res) {
            if($data['u_cid']==0){
                $user['r_email']=$email;
                $user['u_id']=$res;
                Resume::addResume($user);
            }
            $arr['content'] = '欢迎注册校易聘，请点击或复制以下网址到浏览器里直接打开以便完成注册：'.env('APP_HOST').'/email?email='.$data["u_email"];
            $rest = Mail::raw($arr['content'], function ($message) use($email) {
                $to = $email;
                $message ->to($to)->subject('校易聘注册认证邮件');
            });
            if ($rest) {
                echo json_encode($data['r_openid']);
                exit;
            } else {
                echo json_encode($rest);
                exit;
            }
        } else {
            echo json_encode($res);
            exit;
        }
    }
    //职位详情
    public function postPreview(Request $request){
        $put=$request->input();
        $release=Release::selPreviews($put);

        $company=Company::sel(['c_id'=>$release['c_id']]);
        // print_r($release);die;
        return view('index.index.postOffice_preview',['release'=>$release,'company'=>$company]);
    }
}
