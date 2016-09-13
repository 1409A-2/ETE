<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Validator;
use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\User;
use App\Model\Company;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkCompany(Request $request)
    {
        //
        $u_id = session('u_id');
        $user_data = User::selOne($u_id);
        if($request->get('update',0)==1){
            $company_data = Company::selOne($user_data['u_cid']);
            if($company_data['c_status']==0){

                return $this->companyTel($request->get('update',0));
            }else{

                return redirect('/info');
            }
        }
        if($user_data['u_cid']==0){

            return redirect('/');
        }elseif($user_data['u_cid']==1){

            return $this->companyTel($request->get('update',0));
        }else{
            $company_data = Company::selOne($user_data['u_cid']);
            if($company_data['c_name']==''){

                return $this->companyFullname();
            }else{
                if($company_data['c_status']==0){

                    return $this->companySend();
                }elseif($company_data['c_status']==1){

                    return $this->success();
                }else{

                    return redirect('/');
                }
            }
        }
    }

    /**
     * 公司信息的完善
     */
    public function companyTel($update)
    {
        $company_data = '';
        if($update==1){
            $u_id = session('u_id');
            $user_data = User::selOne($u_id);
            $company_data = Company::selOne($user_data['u_cid']);
        }

        return view('index.info.bindstep1',['company_data'=>$company_data]);
    }

    /**
     * 公司详细信息
     */
    public function companyEmail(Request $request)
    {
        $u_id = session('u_id');
        $user_data = User::selOne($u_id);

        $company_data = $request->except('_token');

        $validator = Validator::make($company_data, [
            'contact' => 'required|max:1',
            'receiveEmail' => 'required',
        ]);

        $insert_data['c_email'] = $company_data['receiveEmail'];
        $insert_data['c_tel'] = $company_data['contact'];

        if($company_data['update']==0){
            $c_id = Company::addOne($insert_data);

            $re = User::upCompany($c_id);
        }else{
            $re = Company::upEmail($insert_data,$user_data['u_cid']);
        }

        echo 1;
    }

    /**
     * 填写公司的名称
     */
    public function companyFullname()
    {
        return view('index.info.bindStep2');
    }

    /**
     * 公司的名称
     */
    public function companyName(Request $request)
    {
        $company_data = $request->except('_token');

        $validator = Validator::make($company_data, [
            'companyName' => 'required',
        ]);

        $update_data['c_name'] = $company_data['companyName'];

        $c_id = Company::upName($update_data);

        echo $c_id;
    }

    /**
     * 验证邮箱
     */
    public function companySend()
    {
        $u_id = session('u_id');
        $user_data = User::selOne($u_id);
        $data['company_data'] = Company::selOne($user_data['u_cid']);

        return view('index.info.bindStep3',$data);
    }

    /**
     * 发送邮件
     */
    public function sendMail()
    {
        $u_id = session('u_id');
        $user_data = User::selOne($u_id);
        if($user_data['u_cid']==0||$user_data['u_cid']==1){
            echo 0;die;
        }
        $company_data = Company::selOne($user_data['u_cid']);
        $token = base64_encode($u_id.'|'.$user_data['u_cid'].'|1');
        /*Mail::raw("请激活的你的发布招聘的资格,猛戳》》 <br/> <a href='http://www.ete.com'>http://www.ete.com</a>", function ($m) {
            $m->to('594513729@qq.com', '校易聘')->subject('激活你的公司');
        });*/

        $rest = Mail::raw("请激活的你的发布招聘的资格,进入此网址进行激活》》 ".env('APP_HOST')."/adopt?token=$token", function ($message) use($company_data) {
            $to = $company_data['c_email'];
            $message ->to($to)->subject('校易聘注册认证邮件');
        });

        echo $rest;
    }

    /**
     * 验证通过
     */
    public function adoptVerify(Request $request)
    {
        $token = base64_decode($request->get('token'));

        $token = explode('|',$token);

        $up_data['c_status'] = $token[2];
        $c_id = $token[1];

        Company::upStatus($c_id,$up_data);

        return view('index.info.adopt');
    }

    /**
     * 成功创建公司
     */
    public function success()
    {
        $u_id = session('u_id');
        $user_data = User::selOne($u_id);
        $company_data = Company::selOne($user_data['u_cid']);
        $up_data['c_status'] = 2;

        Company::upStatus($company_data['c_id'],$up_data);

        return view('index.info.success');
    }
}
