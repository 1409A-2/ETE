<?php

namespace App\Http\Controllers\Index;
use Validator;
use Session;
use Redirect;
use App\Model\Industry;
use App\Model\Education;
use App\Model\Company;
use App\Model\Release;
use App\Model\User;
use App\Model\ResumeReseale;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Mail;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
header('content-type:text/html;charset=utf-8');
class IndustryController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function postOffice(){    	
        $company_c_id=User::selOne(Session::get('u_id'));
        if($company_c_id['u_cid']==0||$company_c_id['u_cid']==1){
            return Redirect::to('/info');
        }else{
            $c_id['c_id']=$company_c_id['u_cid'];
            // print_r($company_c_id);die;
        	$industry=Industry::Sel();
        	$education=Education::Sel();
        	$company=Company::Sel($c_id);
        	return view('index.industry.postOffice',['industry'=>$industry,'education'=>$education,'company'=>$company]);
        }
    }

    //发布成功后添加入库
    public function postOffice_add(Request $request){
    	$data = $request->except('_token');
    	$validator=Validator::make($data, [
		    'i_name' => 'required',
		    're_name' => 'required',
		    're_depart' => 'required',
		    're_salarymin' => 'required|min:1',
		    're_salarymax' => 'required|max:100',
		    're_education' => 'required',
		    're_welfare' => 'required',
		    're_address' => 'required',
		    'c_id' => 'required',
		    're_desc'=>'required'
		]);
		if ($validator->fails()) {
            return redirect('postOffice')
                        ->withErrors($validator);
        }
        $data['re_time']=time();
		// print_r($data);die;
    	$re=Release::Add($data);
    	if($re){
    		echo 1;
    	}else{
    		echo 0;
    	}
    }

    public function postOffice_issue(){
    	return view('index.industry.postOffice_issue');
    }

    //查看发布的职位
    public function postOffice_list(){
    	$c_id['c_id']=Session::get('u_id');
    	$release=Release::Sel_List($c_id);
    	// print_r($release);die;
    	return view('index.industry.postOffice_list',['release'=>$release]);
    }

    //职位预览
    public function postOffice_preview(){
    	$c_id['c_id']=Session::get('u_id');
    	$release=Release::Sel_Preview($c_id);
    	$company=Company::Sel($c_id);
    	// print_r($release);die;
    	return view('index.industry.postOffice_preview',['release'=>$release,'company'=>$company]);
    }

    /*   ------------------------此处分割线----------------------*/
    //公司查看简历   //待处理
    public function PendingResume(){
    	$c_id=Session::get('u_id');
    	$remuse_resele=0;
    	$resume=Release::sel($c_id,$remuse_resele); 
    	// print_r($resume);die;   	
    	return view('index.pendingresume.pendingresume',['resume'=>$resume]);
    }

    //修改公司查看简历后状态
    public function Nndetermined(Request $request){
    	$data=$request->input();
    	echo ResumeReseale::Up($data);
    }

    //查看待定简历
    public function CanInterviewResumes(){
    	$c_id=Session::get('u_id');
    	$remuse_resele=2;
    	$resume=Release::sel($c_id,$remuse_resele); 
    	// print_r($resume);die;   	
    	return view('index.pendingresume.CanInterviewResumes',['resume'=>$resume]);
    }
    //执行待定与不合适
    public function Nndetermineds(Request $request){
    	$data=$request->input();
    	$rere_id=explode(',',$data['rere_id']);
    	// print_r($rere_id);die;
    	for($i=0;$i<count($rere_id);$i++){
    		$arr['rere_id']=$rere_id[$i];
    		$arr['remuse_resele']=$data['remuse_resele'];
			ResumeReseale::Up($arr);
    	}
    	echo 1;   	
    }

    //面试成功和发送邮件
    public function NndeterminedsEmail(Request $request){
		$data=$request->input();
		$rere_id=explode(',',$data['rere_id']);
		for($i=0;$i<count($rere_id);$i++){
    		$arr['rere_id']=$rere_id[$i];
			$r_id=ResumeReseale::Sel_Email($arr);
			$email=$r_id['r_email'];
	    	$content = $r_id['r_name']."您好，\n感谢您投递".$data['c_name']."的".$data['i_name']."职位。您的简历我们已经收到，我们会在7个工作日内处理您的简历。通知你面试";
	        // echo $content;die;
	        $rest = Mail::raw($content, function ($message) use($email) {
	            $to = $email;
	            $message ->to($to)->subject('校易聘认证邮件');
	        });
	        $arr['remuse_resele']=$data['remuse_resele'];
			ResumeReseale::Up($arr);
    	}
    	echo 1;
		
    }
    //面试成功和发送邮件
    public function NndeterminedEmail(Request $request){
    	$data=$request->input();
    	$email=$data['email'];
    	$content = $data['r_name']."您好，\n感谢您投递".$data['c_name']."的".$data['i_name']."职位。您的简历我们已经收到，我们会在7个工作日内处理您的简历。通知你面试";
        // echo $content;die;
        $rest = Mail::raw($content, function ($message) use($email) {
            $to = $email;
            $message ->to($to)->subject('校易聘认证邮件');
        });
        $arr['rere_id']=$data['rere_id'];
        $arr['remuse_resele']=$data['remuse_resele'];
        echo ResumeReseale::Up($arr);
    }

    //查看已发送邮件的简历
    public function haveNoticeResumes(){
    	$c_id=Session::get('u_id');
    	$remuse_resele=1;
    	$resume=Release::sel($c_id,$remuse_resele); 
    	// print_r($resume);die;   	
    	return view('index.pendingresume.haveNoticeResumes',['resume'=>$resume]);
    }

    //查看不合适的简历
    public function haveRefuseResumes(){
    	$c_id=Session::get('u_id');
    	$remuse_resele=3;
    	$resume=Release::sel($c_id,$remuse_resele); 
    	// print_r($resume);die;   	
    	return view('index.pendingresume.haveRefuseResumes',['resume'=>$resume]);
    }

    //公司查看简历
    public function preview(){
        return view('index.pendingresume.preview');
    }

}
