<?php

namespace App\Http\Controllers\Index;

use App\Model\Carousel;
use App\Model\Industry;
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
        $userKey = $Request->input('user');
        if (!empty($userKey)) {
            $checkRest = User::checkOnly($userKey);
            if (!empty($checkRest)) {
                Session::put('u_id', $checkRest['u_id']);
                Session::put('u_email', $checkRest['u_email']);
            } else {
                Session::put('u_id','0');
                Session::put('u_email', $userKey);
                return view('index.index.WeixinRegister',['userKey'=>$userKey]);
            }
        }

        $carousel = Carousel::selCarousel();

        return  view('index.index.test',['count'=>$num,'two_industry'=>$two_industry,'industry'=>$industry,'nav_industry'=>$new_industry,'carousel'=>$carousel]);
    }

    //跳转职业详情
    public function jump(Request $request){
        $i_name = $request->input('i_name');
        $row = DB::table('release')->where('re_name',$i_name)->count('re_id');
        $length = 6;
        $pages = ceil($row/$length);
        $page = $request->get('page',1);
        $limit = ($page-1)*$length;

        $list=DB::table('release')
            ->where('re_name',$i_name)
            ->join('company','release.c_id','=','company.c_id')
            ->limit($length)->offset($limit)->get();
        $str=json_encode($list);
        $arr=json_decode($str,true);

        return view('index.index.ShowList',['arr'=>$arr,'i_name'=>$i_name,'pages'=>$pages,'page'=>$page]);
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
