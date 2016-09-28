<?php

namespace App\Http\Controllers\Index;
use App\Model\BC;
use App\Model\Beat;
use App\Model\Company;
use App\Model\Industry;
use App\Model\Porject;
use App\Model\Resume;
use App\Model\School;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;

class BeatController extends Controller
{

    /**         一拍首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function beatIndex()
    {
        $id = session('u_id');
        $beat = Beat::beatSel(['b_uid' => $id]);
        if ($beat) {
            return redirect('beatCenter');
        } else {
            return view('index.beat.beatIndex');
        }
    }

    /**申请一拍页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function beatInfo()
    {

        //查询所有行业
        $industry = Industry::sel();
        $parent = 0;
        foreach ($industry as $key => $val) {
            if ($val['level'] == 0) {
                $new_industry[$val['i_id']] = $val;
                $parent = $val['i_id'];
                $father[] = $val;
            }

            if ($val['level'] == 2) {
                $new_industry[$parent]['son'][] = $val;
            }
        }

        $id = session('u_id');
        $r_id = Resume::userUid($id);
        $porject = Porject::selOne(['r_id' => $r_id]);
            return view('index.beat.beatInfo', [
                'porject' => $porject,
                'industry' => $new_industry,
                'father' => $father
            ]);
        }



    /** 一拍个人中心
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function beatCenter(){

        $id=session('u_id');
        $img=Resume::selFind(['u_id'=>$id],'r_img');
//        print_r($img);die;
        $beat=Beat::beatOne(['b_uid'=>$id]);
        $bc=BC::invitedSel(['cb_bid'=>$beat['b_id']]);

//        print_r($beat);die;
        if($beat)
        {
            return view(
                'index.beat.beatCenter',
                [
                    'beat'=>$beat,
                    'img'=>$img,
                    'bc'=>$bc
                ]);
        } else {
            return redirect('beatIndex');
        }
    }

    /**我的履历
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function beatProfile(){
        $id=session('u_id');
        $resume=Resume::selOne(['u_id'=>$id]);
        $school=School::selOne(['r_id'=>$resume['r_id']]);
        $porject=Porject::selAll(['r_id'=>$resume['r_id']]);

        $beat=Beat::beatOne(['b_uid'=>$id]);
        if($beat)
        {
            return view('index.beat.beatProfile',[
                'beat'=>$beat,
                'resume'=>$resume,
                'school'=>$school,
                'porject'=>$porject
            ]);
        } else {
            return redirect('beatIndex');
        }

    }

    /** 我的邀约
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function beatInvited(){

        $id=session('u_id');
        $beat=Beat::beatOll(['b_uid'=>$id]);
         if(empty($beat)){
           return redirect('beatCenter');
         }
        $bc_cid=BC::selOll(['cb_bid'=>$beat['b_id']]);
      
        foreach ($bc_cid as $v) {

            //所有邀约
            $company['cb'][]=Company::selOne($v['bc_cid']);
            $time['cb'][]=$v['cb_time'];
            $bc_id['cb'][]=$v['bc_id'];
            $num['cb']=count($company['cb']);

            //未处理邀约
            if ($v['cb_cb']==2) {

                $company['cb2'][]=Company::selOne($v['bc_cid']);
                $time['cb2'][]=$v['cb_time'];
                $bc_id['cb2'][]=$v['bc_id'];
                $num['cb2']=count($company['cb2']);
            }
            //收到发送Offer
            if ($v['cb_cb']==3) {

                $company['cb3'][]=Company::selOne($v['bc_cid']);
                $time['cb3'][]=$v['cb_time'];
                $bc_id['cb3'][]=$v['bc_id'];
                $num['cb3']=count($company['cb3']);
            }
            //不合适
            if ($v['cb_cb']==4) {

                $company['cb4'][]=Company::selOne($v['bc_cid']);
                $time['cb4'][]=$v['cb_time'];
                $bc_id['cb4'][]=$v['bc_id'];
                $num['cb4']=count($company['cb4']);
            }
            //同意邀约
            if ($v['cb_cb']==5) {

                $company['cb5'][]=Company::selOne($v['bc_cid']);
                $time['cb5'][]=$v['cb_time'];
                $bc_id['cb5'][]=$v['bc_id'];
                $num['cb5']=count($company['cb5']);
            }
            //安排见面
            if ($v['cb_cb']==6) {

                $company['cb6'][]=Company::selOne($v['bc_cid']);
                $time['cb6'][]=$v['cb_time'];
                $bc_id['cb6'][]=$v['bc_id'];
                $num['cb6']=count($company['cb6']);
            }
            //拒绝邀约
            if ($v['cb_cb']==7) {

                $company['cb7'][]=Company::selOne($v['bc_cid']);
                $time['cb7']=$v['cb_time'];
                $bc_id['cb7'][]=$v['bc_id'];
                $num['cb7']=count($company['cb7']);
            }
            //我的Offer
            if ($v['cb_cb']==9) {

                $company['cb9'][]=Company::selOne($v['bc_cid']);
                $time['cb9']=$v['cb_time'];
                $bc_id['cb9'][]=$v['bc_id'];
                $num['cb9']=count($company['cb9']);
            }

        }

        return view('index.beat.beatInvited',[
            'company'=>$company,
            'num'=>$num,
            'time'=>$time,
            'bc_id'=>$bc_id,
            'bc_cid'=>$bc_cid
        ]);
    }

    /** 对我的邀约进行操作
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function invitedUp(Request $request){

        $bc_id=$request->input('bc_id');
        $cb_cb=$request->input('cb_cb');
        if(empty($bc_id)||empty($cb_cb)){
            return redirect('beatCenter');
        }
        return BC::invitedUp(['bc_id'=>$bc_id],['cb_cb'=>$cb_cb]);

    }

    /** 删除我的邀约
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
     */
    public function  invitedDel(Request $request){
        $bc_id=$request->input('bc_id');
        if(empty($bc_id)){
            return redirect('beatCenter');
        }
        return BC::invitedDel(['bc_id'=>$bc_id]);
    }


    /**我的Offer
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
//    public function beatReward(){
//        return view('index.beat.beatReward');
//    }






    // 查询用户的一拍信息
    public function companyBeat(){
        $companylist=Beat::selAll();
        $company_c_id=User::selOne(session('u_id'));
        foreach ($companylist as $k => $v) {
            $i_id=explode(',',$v['b_professional']);
            $companylist[$k]['b_professional']=Industry::selBeat($i_id);
            $companylist[$k]['level']=Bc::sel($company_c_id['u_cid'],$v['b_id']);
        }
        return view('index.beat.companylist',['companylist'=>$companylist]);
    }
    //公司邀约简历
    public function beatYes(Request $request){
        $arr['cb_bid']=$request->input('b_id');
        $company_c_id=User::selOne(session('u_id'));
        $arr['bc_cid']=$company_c_id['u_cid'];
        $arr['cb_cb']=$request->input('bc',2);
        if($arr['cb_cb']==2){
            $re = Bc::cbCb($arr);
        }else{
            $re = Bc::up($arr);
        }
        if($re){
            return 1;
        }else{
            return 0;
        }
    }



    /** 一拍攻略  注册前
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function beatRaiders()
    {
        return view('index.beat.beatRaiders');
    }

    /**个人 取消一拍的原因
     * @param Request $request
     * @return mixed
     */
    public function beatReason(Request $request){

        $data['b_reason']=$request->input('reason');
        $data['b_state']=2;
        $beat_id=$request->input('beat_id');
        return Beat::beatUp(['b_id'=>$beat_id],$data);
    }

    /**  一拍攻略 注册后
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function beatRaider(){

        return view('index.beat.beatRaider');
    }
    /**  申请一拍的后台
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function beatPro(Request $request)
    {

        $beat['b_name'] = $request->input('userName');//真实姓名
        $beat['b_sex'] = $request->input('beatSex');  //姓别
        $beat['b_workyear'] = $request->input('workYear');  //工作年限

        $professional_content = $request->input('professional_content');//期望工作
        $professional = '';
        foreach ($professional_content as $k => $v) {
            $professional .= ',' . $v;
        }
        $beat['b_field'] =  $request->input('field');//期望工作父级
        $beat['b_professional'] = substr($professional, 1);//期望工作的字符串Id
        $beat['b_phone'] = $request->input('phoneNumber');  //手机号
        $beat['b_email'] = $request->input('email');  //邮箱
        $beat['b_salary_start'] = $request->input('salary_start');  //最低期望月薪
        $beat['b_salary_end'] = $request->input('salary_end');  //最高期望月薪

        $beat['b_current_salary'] = $request->input('currentSalary');  //当前薪资
        $beat['b_paidmonth'] = $request->input('paidMonth');  //发薪月数
        $beat['b_status'] = $request->input('jobIntention');  //求职意向
        $beat['b_desc'] = $request->input('beat_content');  //自我介绍
        $beat['b_uid'] = session('u_id');                   //登录人
        $res = Beat::beatAdd($beat);
        if ($res) {
            return redirect('beatIndex');
        } else {
            return redirect('beatIndex');
        }

    }

    /**验证验证码是否匹配
     * @param Request $request
     */
    public function codePro(Request $request)
    {
        $code = $request->input('phoneCodes');
        $phoneNumber = Cookie::get('phoneNumber');
        if ($code == $phoneNumber) {
            return 'true';
        } else {
            return 'false';
        }
    }

    /**
     * 手机验证码
     */
    public function beatPhone(Request $request)
    {
        $phoneNumber = $request->input('phoneNumber');
        $target = "http://106.ihuyi.cn/webservice/sms.php?method=Submit";
        $mobile_code = $this->random(4, 1);
        $post_data = "account=cf_hu080&password=123456&mobile=" . $phoneNumber . "&content=" . rawurlencode("您的验证码是：" . $mobile_code . "。请不要把验证码泄露给其他人。");
//密码可以使用明文密码或使用32位MD5加密
        $gets = $this->xml_to_array($this->Post($post_data, $target));
        if ($gets['SubmitResult']['code'] == 2) {
            Cookie::queue('phoneNumber', $mobile_code, 300);
        }
        return $gets['SubmitResult']['msg'];

    }

//--------------------发送短信开始-------------
    function Post($curlPost, $url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_NOBODY, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $curlPost);
        $return_str = curl_exec($curl);
        curl_close($curl);
        return $return_str;
    }

    function xml_to_array($xml)
    {
        $reg = "/<(\w+)[^>]*>([\\x00-\\xFF]*)<\\/\\1>/";
        if (preg_match_all($reg, $xml, $matches)) {
            $count = count($matches[0]);
            for ($i = 0; $i < $count; $i++) {
                $subxml = $matches[2][$i];
                $key = $matches[1][$i];
                if (preg_match($reg, $subxml)) {
                    $arr[$key] = $this->xml_to_array($subxml);
                } else {
                    $arr[$key] = $subxml;
                }
            }
        }
        return $arr;
    }

    function random($length = 6, $numeric = 0)
    {
        PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
        if ($numeric) {
            $hash = sprintf('%0' . $length . 'd', mt_rand(0, pow(10, $length) - 1));
        } else {
            $hash = '';
            $chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789abcdefghjkmnpqrstuvwxyz';
            $max = strlen($chars) - 1;
            for ($i = 0; $i < $length; $i++) {
                $hash .= $chars[mt_rand(0, $max)];
            }
        }
        return $hash;
    }

    //--------------------------发送短信结束----------------
}
