<?php

namespace App\Http\Controllers\Index;
use App\Model\Expected;
use App\Model\Porject;
use App\Model\Resume;
use App\Model\School;
use App\Model\Works;
use Validator;
use Session;
use Redirect;
use DB;
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
        $company_c_id=User::selOne(session('u_id'));
        if($company_c_id['u_cid']==0||$company_c_id['u_cid']==1){
            return Redirect::to('/info');
        }else{
            $da=Company::sel_Time($company_c_id['u_cid']);
            $date=date('Y-m-d',time());
            $time=strtotime($date);
            $my_time=date('Y-m-d',$da['out_time']);
            $my_time=strtotime($my_time);
            if($time!=$my_time){
                if($da['out_time']!=1){
                    $out_num['out_time']=1;
                    $out_num['out_num']=0;
                    Company::upBase($company_c_id['u_cid'],$out_num);
                }                
            }
            $data=Company::sel_Time($company_c_id['u_cid']);
            $c_id['c_id']=$company_c_id['u_cid'];
            // print_r($company_c_id);die;
        	$industry=Industry::sel();
        	$education=Education::selTion();
        	$company=Company::sel($c_id);
        	return view('index.industry.postOffice',['industry'=>$industry,'education'=>$education,'company'=>$company,'data'=>$data]);
        }
    }

    //发布成功后添加入库
    public function postOfficeAdd(Request $request){
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

        switch($highestEducation)
        {
            case "大专":
                $data['r_education']=1;
                break;
            case "本科":
                $data['r_education']=2;
                break;
            case "硕士":
                $data['r_education']=3;
                break;
            case "博士":
                $data['r_education']=4;
                break;
            case "其他":
                $data['r_education']=5;
                break;
        }

        $data['re_time']=time();
		// print_r($data);die;
        $company_c_id=User::selOne(session('u_id'));
        $c_id=$company_c_id['u_cid'];
        $da=Company::sel_Time($c_id);
        $date=date('Y-m-d',time());
        $time=strtotime($date);
        $my_time=date('Y-m-d',$da['out_time']);
        $my_time=strtotime($my_time);

        // echo $data['out_num'];
        if($da['out_num']<5){
            $out_num['out_num']=$da['out_num']+1;
            if($da['out_num']==4){
                $out_num['out_time']=time();
            }
        try{
        DB::beginTransaction();
            Company::upBase($c_id,$out_num);
            $re=Release::addBacs($data);
        DB::commit(); 
        }catch (\Exception $e) {
                echo "<script>alert('错误');location.href='postOffice'</script>";
                DB::rollBack(); 
        } 
            if($re){
                echo 1;
            }else{
                echo 0;
            }
        }else{
            if($time==$my_time){
                echo 2;
            }else{
                $out_num['out_num']=1;
                $out_num['out_time']=time();
            try{
            DB::beginTransaction();
                Company::upBase($c_id,$out_num);
                $re=Release::addBacs($data);
            DB::commit(); 
            }catch (\Exception $e) {
                    echo "<script>alert('错误');location.href='postOffice'</script>";
                    DB::rollBack(); 
            }
                if($re){
                    echo 1;
                }else{
                    echo 0;
                }
            }
        }
        
        // print_r($data);die;
    	
    }

    public function postOfficeIssue(){
        $company_c_id=User::selOne(session('u_id'));
        $data=Company::sel_Time($company_c_id['u_cid']);
    	return view('index.industry.postOffice_issue',['data'=>$data]);
    }

    //查看发布的职位
    public function postOfficeList(){
    	$company_c_id=User::selOne(session('u_id'));
        if($company_c_id['u_cid']==0||$company_c_id['u_cid']==1){
            return Redirect::to('/info');
        }else{
            $c_id['c_id']=$company_c_id['u_cid'];;
        	$release=Release::selList($c_id);
        	// print_r($release);die;
        	return view('index.industry.postOffice_list',['release'=>$release]);
        }
    }

    //职位预览
    public function postOfficePreview(Request $request){
    	$company_c_id=User::selOne(session('u_id'));
        if($company_c_id['u_cid']==0||$company_c_id['u_cid']==1){
            return Redirect::to('/info');
        }else{
            $c_id['c_id']=$company_c_id['u_cid'];
            $put=$request->input();
            if(isset($put)){
                $release=Release::selPreviews($put);
            }else{
                $release=Release::selPreview($c_id);
            }
        	$company=Company::sel($c_id);
//        	 print_r($release);die;
        	return view('index.industry.postOffice_preview',['release'=>$release,'company'=>$company]);
        }
    }

    /*   ------------------------此处分割线----------------------*/
    //公司查看简历   //待处理
    public function pendingResume(Request $request){
        $read=$request->input('rel'); 
        $ed_name=$request->input('rels'); 
    	$company_c_id=User::selOne(session('u_id'));
        if($company_c_id['u_cid']==0||$company_c_id['u_cid']==1){

            return Redirect::to('/info');
        }else{
            $c_id=$company_c_id['u_cid'];
        	$remuse_resele=0;
        	$resume=Release::selAs($c_id,$remuse_resele);
            if(!@isset($ed_name)||$ed_name==1){
                if(!@isset($read)||$read==-1){
                    $read=-1;
                    $resume=Release::selAs($c_id,$remuse_resele);
                }else{
                    $resume=Release::selRel($c_id,$remuse_resele,$read);
                }
                $ed_name=1; 
            }else{
                if(!@isset($read)||$read==-1){
                    $read=-1;
                    $resume=Release::selEd($c_id,$remuse_resele,$ed_name);
                }else{
                    $resume=Release::selReled($c_id,$remuse_resele,$read,$ed_name);
                }
            } 
            
            $education=Education::selTion();
//        print_r($resume);die;

        	return view('index.pendingresume.pendingresume',['resume'=>$resume,'read'=>$read,'education'=>$education,'ed_name'=>$ed_name]);
        }
    }

    //修改公司查看简历后状态
    public function unDetermined(Request $request){
    	$data=$request->input();
    	echo ResumeReseale::upResumereseale($data);
    }

    //查看待定简历
    public function canInterviewResumes(Request $request){
        $read=$request->input('rel'); 
        $ed_name=$request->input('rels');       
    	$company_c_id=User::selOne(session('u_id'));
        if($company_c_id['u_cid']==0||$company_c_id['u_cid']==1){

            return Redirect::to('/info');
        }else{
            $c_id=$company_c_id['u_cid'];
        	$remuse_resele=2;
            if(!@isset($ed_name)||$ed_name==1){
                if(!@isset($read)||$read==-1){
                    $read=-1;
                    $resume=Release::selAs($c_id,$remuse_resele);
                }else{
                    $resume=Release::selRel($c_id,$remuse_resele,$read);
                }
                $ed_name=1; 
            }else{
                if(!@isset($read)||$read==-1){
                    $read=-1;
                    $resume=Release::selEd($c_id,$remuse_resele,$ed_name);
                }else{
                    $resume=Release::selReled($c_id,$remuse_resele,$read,$ed_name);
                }
            }   
            $education=Education::selTion();
        	// print_r($resume);die;

        	return view('index.pendingresume.CanInterviewResumes',['resume'=>$resume,'read'=>$read,'education'=>$education,'ed_name'=>$ed_name]);
        }
    }
    //执行待定与不合适
    public function deterMined(Request $request){
    	$data=$request->input();
    	$rere_id=explode(',',$data['rere_id']);
    	// print_r($rere_id);die;
    	for($i=0;$i<count($rere_id);$i++){
    		$arr['rere_id']=$rere_id[$i];
    		$arr['remuse_resele']=$data['remuse_resele'];
			ResumeReseale::upResumereseale($arr);
    	}
    	echo 1;   	
    }

    //面试成功和发送邮件
    public function deterMinedEmail(Request $request){
		$data=$request->input();
		$rere_id=explode(',',$data['rere_id']);
		for($i=0;$i<count($rere_id);$i++){
    		$arr['rere_id']=$rere_id[$i];
			$r_id=ResumeReseale::selEmail($arr);
			$email=$r_id['r_email'];
	    	$content = $r_id['r_name']."您好，\n感谢您投递".$data['c_name']."的".$data['i_name']."职位。您的简历我们已经收到，我们会在7个工作日内处理您的简历。通知你面试";
	        // echo $content;die;
	        $rest = Mail::raw($content, function ($message) use($email) {
	            $to = $email;
	            $message ->to($to)->subject('校易聘认证邮件');
	        });
	        $arr['remuse_resele']=$data['remuse_resele'];
			ResumeReseale::upResumereseale($arr);
    	}
    	echo 1;
		
    }
    //面试成功和发送邮件
    public function unDeterminedEmail(Request $request){
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
        echo ResumeReseale::upResumereseale($arr);
    }

    //查看已发送邮件的简历
    public function haveNoticeResumes(Request $request){
        $read=$request->input('rel');
        $ed_name=$request->input('rels');
    	$company_c_id=User::selOne(session('u_id'));
        if($company_c_id['u_cid']==0||$company_c_id['u_cid']==1){
            return Redirect::to('/info');
        }else{
            $c_id=$company_c_id['u_cid'];
        	$remuse_resele=1;
        	$resume=Release::selAs($c_id,$remuse_resele);
            if(!@isset($ed_name)||$ed_name==1){
                if(!@isset($read)||$read==-1){
                    $read=-1;
                    $resume=Release::selAs($c_id,$remuse_resele);
                }else{
                    $resume=Release::selRel($c_id,$remuse_resele,$read);
                }
                $ed_name=1; 
            }else{
                if(!@isset($read)||$read==-1){
                    $read=-1;
                    $resume=Release::selEd($c_id,$remuse_resele,$ed_name);
                }else{
                    $resume=Release::selReled($c_id,$remuse_resele,$read,$ed_name);
                }
            }
            $education=Education::selTion();
        	// print_r($resume);die;

        	return view('index.pendingresume.haveNoticeResumes',['resume'=>$resume,'read'=>$read,'education'=>$education,'ed_name'=>$ed_name]);
        }
    }

    //查看不合适的简历
    public function haveRefuseResumes(Request $request){
        $read=$request->input('rel');
        $ed_name=$request->input('rels');
    	$company_c_id=User::selOne(session('u_id'));
        if($company_c_id['u_cid']==0||$company_c_id['u_cid']==1){
            return Redirect::to('/info');
        }else{
            $c_id['c_id']=$company_c_id['u_cid'];
        	$remuse_resele=3;
        	$resume=Release::selAs($c_id,$remuse_resele);
            if(!@isset($ed_name)||$ed_name==1){
                if(!@isset($read)||$read==-1){
                    $read=-1;
                    $resume=Release::selAs($c_id,$remuse_resele);
                }else{
                    $resume=Release::selRel($c_id,$remuse_resele,$read);
                }
                $ed_name=1; 
            }else{
                if(!@isset($read)||$read==-1){
                    $read=-1;
                    $resume=Release::selEd($c_id,$remuse_resele,$ed_name);
                }else{
                    $resume=Release::selReled($c_id,$remuse_resele,$read,$ed_name);
                }
            } 
            $education=Education::selTion();
        	// print_r($resume);die;

        	return view('index.pendingresume.haveRefuseResumes',['resume'=>$resume,'read'=>$read,'education'=>$education,'ed_name'=>$ed_name]);
        }
    }

    //公司查看简历
    public function preview(Request $request){
        $arr=$request->input();
        $arr['read']=1;

        ResumeReseale::upResumereseale($arr);

        $data['re_re']=$arr;
        $r_id=ResumeReseale::selOne(['rere_id'=>$arr['rere_id']]);
        /**
         * 个人简历
         */
        $data['resume']=Resume::sel_One(['r_id'=>$r_id['r_id']]);
        /**
         * 作品
         */
        $data['works']=Works::selAll(['r_id'=>$r_id['r_id']]);

        /**
         * 项目
         */
        $data['porject']=Porject::selAll(['r_id'=>$r_id['r_id']]);

        /**
         * 期望工作
         */
        $data['expected']=Expected::SelOne(['r_id'=>$r_id['r_id']]);



        /**
         * 教育背景
         */
        $data['school']= School::selOne(['r_id'=>$r_id['r_id']]);


        return view('index.resume.preview',$data);

    }

    //查看有效职位  positions
    public function positions(){
        $company_c_id=User::selOne(session('u_id'));
        if($company_c_id['u_cid']==0||$company_c_id['u_cid']==1){
            return Redirect::to('/info');
        }else{
            $c_id['c_id']=$company_c_id['u_cid'];
            $re_status=0;
            $release=Release::selPr($c_id['c_id'],$re_status);
            $count_preview = '';
            foreach ($release as $k => $v) {
                $count_preview[$v['re_id']]=ResumeReseale::countPreview($v['re_id']);
            }
            // print_r($release);die;
            return view('index.pendingresume.positions',['release'=>$release,'count'=>$count_preview]);
        }
    }

    //查看下线职位  positionsdown
    public function positionsDown(){
        $company_c_id=User::selOne(session('u_id'));
        if($company_c_id['u_cid']==0||$company_c_id['u_cid']==1){
            return Redirect::to('/info');
        }else{
            $c_id['c_id']=$company_c_id['u_cid'];
            $re_status=1;
            $release=Release::selPr($c_id['c_id'],$re_status);
            $count_preview = '';
            foreach ($release as $k => $v) {
                $count_preview[$v['re_id']]=ResumeReseale::countPreview($v['re_id']);
            }
            // print_r($release);die;
            return view('index.pendingresume.positionsdown',['release'=>$release,'count'=>$count_preview]);
        }
    }
    //修改职位上下线问题
    public function positionsType(Request $request){
        $data = $request->except('_token');
        echo Release::upReStatus($data);
    }
    //删除职位
    public function positionsDel(Request $request){
        $data = $request->except('_token');
        echo Release::delRelease($data);
    }

    //简历详情的下载
    public function downloadResume(Request $request){
        $data=$request->input();
        ob_start();
        $fp =fopen("./".$data['rere_id'].".html",'w');
        $content=self::previews($data);
        fwrite($fp, $content);
        $fps =file_get_contents("./".$data['rere_id'].".html");
        print_r($fps);
        if($data['type']==1){
            header('Content-Type:doc/docx');
            header('Content-Disposition:attachment; filename="'.$data['name'].'的简历.doc"');
        }elseif($data['type']==2){
            header('Content-Type:html');
            header('Content-Disposition:attachment; filename="'.$data['name'].'的简历.html"');
        }else{
            header('Content-Type:pdf');
            header('Content-Disposition:attachment; filename="'.$data['name'].'的简历.pdf"');
        }
        
        fclose($fp);
        unlink("./".$data['rere_id'].".html");
    }

    //公司查看简历
    public static function previews($arr){

        $r_id=ResumeReseale::selOne(['rere_id'=>$arr['rere_id']]);
//        print_r($r_id);die;
        /**
         * 个人简历
         */
        $data['resume']=Resume::sel_One(['r_id'=>$r_id['r_id']]);
        /**
         * 作品
         */
        $data['works']=Works::selAll(['r_id'=>$r_id['r_id']]);

        /**
         * 项目
         */
        $data['porject']=Porject::selAll(['r_id'=>$r_id['r_id']]);

        /**
         * 期望工作
         */
        $data['expected']=Expected::SelOne(['r_id'=>$r_id['r_id']]);



        /**
         * 教育背景
         */
        $data['school']= School::selOne(['r_id'=>$r_id['r_id']]);

//        print_r($data);die;
        if($arr['type']!=2){

            return view('index.resume.previews',$data);
        }else{

            return view('index.resume.preview',$data);
        }
    }
}
