<?php

namespace App\Http\Controllers\Index;

use App\Model\Porject;
use App\Model\Resume;
use App\Model\School;
use App\Model\Works;
use DB;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Session;
use Germey\Geetest\CaptchaGeetest;
use App\Model\Education;

class ResumeController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, CaptchaGeetest;
    // 我的简历首页
    public function index(){
        $sum='';
        $education= Education::sel_All(); //学历
        $works=Works::sel_All(); //作品
        if($works){
            $sum+=20;
        }
        $porject=Porject::sel_All();//项目
        if($porject){
            $sum+=20;
        }
        $u_id=Session::get('u_id'); //用户Id
        $res=Resume::sel_One($u_id); //简历
        if($res){
            if($res['r_img']){
                $sum+=5;
            }
            $sum+=15;
        }

        $school= School::where('r_id',$res['r_id'])->first()->toArray();//教育背景
        if($school){
            $sum+=20;
        }
    	return  view('index.resume.resume',[
            'education'=>$education,
            'res'=>$res,
            'school'=>$school,
            'works'=>$works,
            'porject'=>$porject,
            'sum'=>$sum
        ]);
    }


    /**
     * @param Request $request
     * @return mixed简历的基本信息
     */
    public  function  educationPro(Request $request){
            $data['r_name']=$request->input('name');
            $data['r_sex']=$request->input('sex');
            $highestEducation=$request->input('highestEducation');
        if($highestEducation=="大专"){
            $data['r_education']=1;
        }elseif($highestEducation=="本科"){
            $data['r_education']=2;
        }elseif($highestEducation=="硕士"){
            $data['r_education']=3;
        }elseif($highestEducation=="博士"){
            $data['r_education']=4;
        }elseif($highestEducation=="其他"){
            $data['r_education']=5;
        }
            $data['r_email']=$request->input('email');
            $data['r_photo']=$request->input('phone');
            $status=$request->input('status');
        if($status=='我目前已离职，可快速到岗'){
            $data['r_status']=0;
        }elseif($status=='我目前正在职，正考虑换个新环境'){
            $data['r_status']=1;
        }elseif($status=='我暂时不想找工作'){
            $data['r_status']=2;
        }elseif($status=='我是应届毕业生'){
            $data['r_status']=3;
        }
        $data['r_time']=time();
        $data['u_id']=$request->session()->get('u_id');

//        print_r($data);die;
            $res=Resume::sel_One($data['u_id']);
//        print_r($res);die;
        if($res){
            return Resume::updateResume($data,['u_id'=>$data['u_id']]);
        }else{
            return Resume::addResume($data);
        }
    }


    public  function educationUpload(Request $request){
        $u_id= $request->session()->get('u_id');
        $data['r_img']='./uploads/'.session('u_email').'.jpg';

        if(file_exists($data['r_img'])){
            unlink($data['r_img']);
        }
            move_uploaded_file($_FILES['headPic']['tmp_name'],$data['r_img']);


        Resume::updateResume($data,['u_id'=>$u_id]);

    }

    /**
     * 教育背景添加
     */
    public  function schoolPro(Request $request){

       $data['s_name']=$request->input('schoolName');
        $education=$request->input('education');
        if($education=="大专"){
            $data['ed_id']=1;
        }elseif($education=="本科"){
            $data['ed_id']=2;
        }elseif($education=="硕士"){
            $data['ed_id']=3;
        }elseif($education=="博士"){
            $data['ed_id']=4;
        }elseif($education=="其他"){
            $data['ed_id']=5;
        }

       $data['s_major']=$request->input('professional');
       $data['s_start_time']=strtotime($request->input('startYear'));
       $data['s_end_time']=strtotime($request->input('endYear'));
        $res=Resume::sel_One(session('u_id'));
        $data['r_id']=$res['r_id'];

        $school=School::sel_One(['r_id'=>$res['r_id']]);
        if($school){
            return School::updateSchool($data,['r_id'=>$res['r_id']]);
        }else{
            return School::addSchool($data);
        }
    }

/**
 * 简历 自我描述
 */

    public  function  educationDesc(Request $request){
            $data['r_desc']=$request->input('myRemark');
            $data['r_time']=time();
            $r_id=$request->input('id');
           return Resume::updateResume($data,['r_id'=>$r_id]);
    }

    /**
     * @param Request $request
     * @return array|string
     * 简历的作品
     */
    public  function  worksAdd(Request $request){
        $data['w_url']=$request->input('url');
        $data['w_desc']=$request->input('workName');
        $data['r_id']=$request->input('wsid');
       $res=Works::addWorks($data);
        if($res==1){
            return redirect('jianli.html');
        }else{
            return redirect('jianli.html');
        }
    }

//删除作品
    public  function worksDel($id){
        $res= Works::delWorks(['w_id'=>$id]);
        if($res==1){
            return redirect('jianli.html');
        }else{
            return redirect('jianli.html');
        }
    }


    //添加项目

    public  function  porjectAdd(Request $request){
        $data['p_name']=$request->input('projectName');//项目名称
        $data['p_duties']=$request->input('positionName');//担任职务
        $data['p_start_time']=strtotime($request->input('startYear').'-'.$request->input('startMonth'));
        $data['p_end_time']=($request->input('endYear')=='至今')?time():strtotime($request->input('endYear').'-'.$request->input('endMonth'));
        $data['p_desc']=$request->input('projectRemark');
        $data['r_id']=$request->input('projectid');
        $res=Porject::addProject($data);
            if($res==1){
                return redirect('jianli.html');
            }else{
                return redirect('jianli.html');
            }
    }
    //删除项目
    public  function porjectDel($id){
        $res= Porject::delPorject(['p_id'=>$id]);
        if($res==1){
            return redirect('jianli.html');
        }else{
            return redirect('jianli.html');
        }
    }

}
