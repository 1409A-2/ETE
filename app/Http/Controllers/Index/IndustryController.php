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
use App\Model\Beat;
use App\Model\Bc;
use App\Model\Industry;
use App\Model\Education;
use App\Model\Company;
use App\Model\Release;
use App\Model\User;
use App\Model\ResumeReseale;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use App\Http\Controllers\MailController;
use App\Http\Controllers\Index\MessageController;
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
            return redirect('/info');
        }else{
            $da=Company::selTime($company_c_id['u_cid']);
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
            $data=Company::selTime($company_c_id['u_cid']);
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

        $data['re_time']=time();
		// print_r($data);die;
        $company_c_id=User::selOne(session('u_id'));
        $c_id=$company_c_id['u_cid'];
        $da=Company::selTime($c_id);
        $date=date('Y-m-d',time());
        $time=strtotime($date);
        $my_time=date('Y-m-d',$da['out_time']);
        $my_time=strtotime($my_time);

        // echo $data['out_num'];
        if($da['out_num']<5){
            $out_num['out_num']=$da['out_num']+1;
            // if($da['out_num']==4){
                $out_num['out_time']=time();
            // }
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
                return 1;
            }else{
                return 0; 
            }
        }else{
            if($time==$my_time){
                return 2;
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
                    return 1;
                }else{
                    return 0;
                }
            }
        }    	
    }

    public function postOfficeIssue(){
        $company_c_id=User::selOne(session('u_id'));
        $data=Company::selTime($company_c_id['u_cid']);
    	return view('index.industry.postOffice_issue',['data'=>$data]);
    }

    //查看发布的职位
    public function postOfficeList(){
    	$company_c_id=User::selOne(session('u_id'));
        if($company_c_id['u_cid']==0||$company_c_id['u_cid']==1){
            return redirect('/info');
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
            return redirect('/info');
        }else{
            $c_id['c_id']=$company_c_id['u_cid'];
            $put=$request->input();
            if(isset($put)){
                $release=Release::selPreviews($put);
            }else{
                $release=Release::selPreview($c_id);
            }
        	$company=Company::sel($c_id);
        	return view('index.industry.postOffice_preview',['release'=>$release,'company'=>$company]);
        }
    }

    /*   ------------------------此处分割线----------------------*/
    //公司查看简历   //待处理
    public function pendingResume(Request $request){
        $read=$remuse_resele[0]=$request->input('rel',-1); 
        $ed_name=$request->input('rels','不限'); 
    	$company_c_id=User::selOne(session('u_id'));
        if($company_c_id['u_cid']==0||$company_c_id['u_cid']==1){

            return redirect('/info');
        }else{
            $c_id=$company_c_id['u_cid'];
            if($remuse_resele[0]==-1){
                $remuse_resele[0]=0;
                $remuse_resele[1]=1;
            }            
        	$release = Release::companyOne(['c_id'=>$c_id]);            
            $array=array();
            $i=0;
            foreach ($release as $k => $v) {
                $arr=array();
                $resume[$k] = ResumeReseale::resumeOut($remuse_resele,$v['re_id']);
                $data = Company::selOne($v['c_id']);
                if(!empty($resume[$k])){
                    foreach ($resume[$k] as $key => $value) {
                        $releas[$i]['release']=$v;
                        $releas[$i]['re_id']=$value['re_id'];
                        $releas[$i]['rere_id']=$value['rere_id'];
                        $releas[$i]['r_id']=$value['r_id'];
                        $releas[$i]['delivery_time']=$value['delivery_time'];
                        $releas[$i]['remuse_resele']=$value['remuse_resele'];
                        $releas[$i]['c_name']=$data['c_name'];
                        $releas[$i]['rere_content']=json_decode($value['rere_content'],true);  
                        $i++;                      
                    } 
                }                
            }
            if(!empty($releas)){
                foreach ($releas as $key => $value) {
                    if( $value['remuse_resele']!=$read && $read!=-1){
                        unset($releas[$key]);
                    }
                    if($ed_name!="不限"){
                        if($ed_name!=$value['rere_content']['school']['ed_id']){
                            unset($releas[$key]);
                        } 
                    }
                                   
                }
            }else{
                $releas='';
            }
            $education=Education::selTion();

        	return view('index.pendingresume.pendingresume',['resume'=>$releas,'read'=>$read,'education'=>$education,'ed_name'=>$ed_name]);
        }
    }

    //修改公司查看简历后状态
    public function unDetermined(Request $request){
    	$data=$request->input();
        $r = ResumeReseale::selOneFeed(['rere_id'=>$data['rere_id']]);
        $re_name = Release::work($r['re_id']);
        $u_id=Resume::resumeUser($r['r_id']);
        switch ($data['remuse_resele']) {
            case 2:
                $content="您好，您投递的<a style='font-size:18px;color:#91bece;' href='".env('APP_HOST')."postPreview?re_id='".$r['re_id'].">".$re_name."</a>职位，已经通过初试，请等待面试通知。";
                break;
            case 3:
                $content="您好，您投递的<a style='font-size:18px;color:#91bece;' href='".env('APP_HOST')."postPreview?re_id='".$r['re_id'].">".$re_name."</a>职位的面试通知已发送到你的邮箱，请注意查看你的邮箱。";
                break;
            case 4:
                $content="您好，您投递的<a style='font-size:18px;color:#91bece;' href='".env('APP_HOST')."postPreview?re_id='".$r['re_id'].">".$re_name."</a>职位的简历已经被pass。";
                break;
            case 6:
                $content="您好，您投递的<a style='font-size:18px;color:#91bece;' href='".env('APP_HOST')."postPreview?re_id='".$r['re_id'].">".$re_name."</a>职位的Offer已发送，请注意查收您的Offer。";
                break;
            default:
                $content="您好";
                break;
        }       
        MessageController::sendMessage($u_id,$content,1);
    	return ResumeReseale::upResumereseale($data);
    }

    //查看待定简历
    public function canInterviewResumes(Request $request){
        $ed_name=$request->input('rels','不限');       
    	$company_c_id=User::selOne(session('u_id'));
        if($company_c_id['u_cid']==0||$company_c_id['u_cid']==1){

            return redirect('/info');
        }else{
            $c_id=$company_c_id['u_cid'];
        	$remuse_resele[0]=2;
            $release = Release::companyOne(['c_id'=>$c_id]);            
            $array=array();
            $i=0;
            foreach ($release as $k => $v) {                
                $arr=array();
                $resume[$k] = ResumeReseale::resumeOut($remuse_resele,$v['re_id']);
                $data = Company::selOne($v['c_id']);
                if(!empty($resume[$k])){
                    foreach ($resume[$k] as $key => $value) {
                        $releas[$i]['release']=$v;
                        $releas[$i]['re_id']=$value['re_id'];
                        $releas[$i]['rere_id']=$value['rere_id'];
                        $releas[$i]['r_id']=$value['r_id'];
                        $releas[$i]['delivery_time']=$value['delivery_time'];
                        $releas[$i]['remuse_resele']=$value['remuse_resele'];
                        $releas[$i]['c_name']=$data['c_name'];
                        $releas[$i]['rere_content']=json_decode($value['rere_content'],true);  
                        $i++;                      
                    } 
                }                
            }
            if(!empty($releas)){
                foreach ($releas as $key => $value) {
                    if($ed_name!="不限"){
                        if($ed_name!=$value['rere_content']['school']['ed_id']){
                            unset($releas[$key]);
                        } 
                    }
                }
            }else{
                $releas='';
            }
            $education=Education::selTion();

        	return view('index.pendingresume.CanInterviewResumes',['resume'=>$releas,'education'=>$education,'ed_name'=>$ed_name]);
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
    	return 1;   	
    }

    //面试成功和发送邮件
    public function deterMinedEmail(Request $request){
		$data=$request->input();
		$rere_id=explode(',',$data['rere_id']);
		for($i=0;$i<count($rere_id);$i++){
    		$arr['rere_id']=$rere_id[$i];
			$r_id=ResumeReseale::selEmail($arr);
			$email=$r_id['r_email'];
	    	$content = $r_id['r_name']."您好，<br />感谢您投递".$data['c_name']."的".$data['i_name']."职位。您的简历我们已经收到，我们在处理您的简历。请你手机保持随时畅通，以方便我们联系你面试";
	        // echo $content;die;
	        $subject = $data['c_name']."人事部认证邮件";

        $rest = MailController::send($content,$email,$subject);
	        $arr['remuse_resele']=$data['remuse_resele'];
			ResumeReseale::upResumereseale($arr);
    	}
    	return 1;
		
    }
    //面试成功和发送邮件
    public function unDeterminedEmail(Request $request){
    	$data=$request->input();
    	$email=$data['email'];
    	$content = $data['r_name'].",您好!<br /><div style='text-indent:2em;'>感谢您投递".$data['c_name']."的".$data['i_name']."职位。您的简历我们已经收到，我们在处理您的简历。请你手机保持随时畅通，以方便我们联系你面试<br />";
        // echo $content;die;
        $subject = "校易聘企业认证邮件";
        $rest = MailController::send($content,$email,$subject);
        $arr['rere_id']=$data['rere_id'];
        $arr['remuse_resele']=$data['remuse_resele'];
        return ResumeReseale::upResumereseale($arr);
    }

    //发送Offer    
    public function undeterminedOffer(Request $request){
        $data=$request->input();
        $email=$data['email'];
        if(strpos($email,'qq')){
            $content = $data['r_name']."先生,您好！<br /><div style='text-indent:2em;'>这里是".$data['c_name']."人事部，恭喜你通过了".$data['i_name']."一职。现通知您于".date('Y-m-d',time()+24*3600)."上午9:00来公司入职。</div><br /><br />入职所需携带资料：<br /><br /> <a href=''>1.身份证及学历原件。</a><br /><br /> <a href=''>2.上一单位离职证明。</a><br /><br /> <a href=''>3.一寸照片2张。</a><br /><br /><br />公司地址：".$data['addr'];
        }else{
            $content = $data['r_name']."先生,您好！<br /><div style='text-indent:2em;'>这里是".$data['c_name']."人事部，恭喜你通过了".$data['i_name']."一职。现通知您于".date('Y-m-d',time()+24*3600)."上午9:00来公司入职<img src='".env('APP_HOST')."/style/images/gz.png'><img src='".env('APP_HOST')."/style/images/gz.png'><img src='".env('APP_HOST')."/style/images/gz.png'>。</div><br /><br />入职所需携带资料：<br /><br /> <a href=''>1.身份证及学历原件。</a><br /><br /> <a href=''>2.上一单位离职证明。</a><br /><br /> <a href=''>3.一寸照片2张。</a><br /><br /><br />公司地址：".$data['addr'];
        }     
        // echo $content;die;
        $subject = $data['c_name']."人事部认证邮件";
        $rest = MailController::send($content,$email,$subject);
        $arr['rere_id']=$data['rere_id'];
        $arr['remuse_resele']=$data['remuse_resele'];
        return ResumeReseale::upResumereseale($arr);
    }

    //查看已发送邮件的简历
    public function haveNoticeResumes(Request $request){
        $ed_name=$request->input('rels','不限');
    	$company_c_id=User::selOne(session('u_id'));
        if($company_c_id['u_cid']==0||$company_c_id['u_cid']==1){
            return redirect('/info');
        }else{
            $c_id=$company_c_id['u_cid'];
        	$remuse_resele[0]=3;
            $remuse_resele[1]=6;
        	$release = Release::companyOne(['c_id'=>$c_id]);            
            $array=array();
            $i=0;
            foreach ($release as $k => $v) {                
                $arr=array();
                $resume[$k] = ResumeReseale::resumeOut($remuse_resele,$v['re_id']);
                $data = Company::selOne($v['c_id']);
                if(!empty($resume[$k])){
                    foreach ($resume[$k] as $key => $value) {
                        $releas[$i]['release']=$v;
                        $releas[$i]['re_id']=$value['re_id'];
                        $releas[$i]['rere_id']=$value['rere_id'];
                        $releas[$i]['r_id']=$value['r_id'];
                        $releas[$i]['delivery_time']=$value['delivery_time'];
                        $releas[$i]['remuse_resele']=$value['remuse_resele'];
                        $releas[$i]['c_name']=$data['c_name'];
                        $releas[$i]['rere_content']=json_decode($value['rere_content'],true);  
                        $i++;                      
                    } 
                }                  
            }
            if(!empty($releas)){
                foreach ($releas as $key => $value) {
                    if($ed_name!=1&&$ed_name!="不限"){
                        if($ed_name!=$value['rere_content']['school']['ed_id']){
                            unset($releas[$key]);
                        } 
                    }                               
                }
            }else{
                $releas='';
            }
            $education=Education::selTion();
            // print_r($release);die;
        	return view('index.pendingresume.haveNoticeResumes',['resume'=>$releas,'education'=>$education,'ed_name'=>$ed_name]);
        }
    }

    //查看不合适的简历
    public function haveRefuseResumes(Request $request){
        $ed_name=$request->input('rels','不限');
    	$company_c_id=User::selOne(session('u_id'));
        if($company_c_id['u_cid']==0||$company_c_id['u_cid']==1){
            return redirect('/info');
        }else{
            $c_id['c_id']=$company_c_id['u_cid'];
        	$remuse_resele[0]=4;
            $release = Release::companyOne($c_id);            
            $array=array();
            $i=0;
            foreach ($release as $k => $v) {
                $arr=array();
                $resume[$k] = ResumeReseale::resumeOut($remuse_resele,$v['re_id']);
                $data = Company::selOne($v['c_id']);
                if(!empty($resume[$k])){
                    foreach ($resume[$k] as $key => $value) {
                        $releas[$i]['release']=$v;
                        $releas[$i]['re_id']=$value['re_id'];
                        $releas[$i]['rere_id']=$value['rere_id'];
                        $releas[$i]['r_id']=$value['r_id'];
                        $releas[$i]['delivery_time']=$value['delivery_time'];
                        $releas[$i]['remuse_resele']=$value['remuse_resele'];
                        $releas[$i]['c_name']=$data['c_name'];
                        $releas[$i]['rere_content']=json_decode($value['rere_content'],true);  
                        $i++;                      
                    } 
                }   
            }
            if(!empty($releas)){
                foreach ($releas as $key => $value) {
                    if($ed_name!=1&&$ed_name!="不限"){
                        if($ed_name!=$value['rere_content']['school']['ed_id']){
                            unset($releas[$key]);
                        } 
                    }                               
                }
            }else{
                $releas='';
            }
            $education=Education::selTion();
            // print_r($data);die;
        	return view('index.pendingresume.haveRefuseResumes',['resume'=>$releas,'education'=>$education,'ed_name'=>$ed_name]);
        }
    }


    //公司查看简历
    public function preview(Request $request){
        $arr['rere_id']=$request->input('rere_id');
        $u_id=$request->input('u_id');
        $r = ResumeReseale::selOneFeed(['rere_id'=>$arr['rere_id']]);
        $re_name = Release::work($r['re_id']);
        $content="您好，您投递的<a style='font-size:18px;color:#91bece;' href='".env('APP_HOST')."postPreview?re_id='".$r['re_id'].">".$re_name."</a>职位的简历正在被查看。";       
        if($request->input('remuse_resele')){

           $arr['remuse_resele']=$request->input('remuse_resele');
           $e=ResumeReseale::upResumereseale($arr); 
           if($e){
                MessageController::sendMessage($u_id,$content,1);
           }
           unset($arr['remuse_resele']);
        }
        $one=ResumeReseale::oneResume($arr['rere_id']);
        
        
        $resume=json_decode($one['rere_content'],true);

        $resume['r_id']=$resume['expected']['r_id'];       
        $data['resume']=$resume;                    //用户简历基本信息
        $data['works']=$resume['works'];            // 作品查询
        $data['porject']=$resume['porject'];        // 项目查询
        $data['expected']=$resume['expected'];      // 工作查询
        $data['school']=$resume['school'];          // 教育背景查询

        $data['re_re']=$arr;

        // print_r($data);die;

        return view('index.pendingresume.preview',$data);

    }

    //查看有效职位  positions
    public function positions(){
        $company_c_id=User::selOne(session('u_id'));
        if($company_c_id['u_cid']==0||$company_c_id['u_cid']==1){
            return redirect('/info');
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
            return redirect('/info');
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
        return Release::upReStatus($data);
    }
    //删除职位
    public function positionsDel(Request $request){
        $data = $request->except('_token');
        return Release::delRelease($data);
    }

    //简历详情的下载
    public function downloadResume(Request $request){
        $data=$request->input();
        ob_start();
        $fp =fopen("./".$data['r_id'].".html",'w');
        $content=self::previews($data);

        fwrite($fp, $content);
        $fps =file_get_contents("./".$data['r_id'].".html");
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
        unlink("./".$data['r_id'].".html");
    }

    //公司查看简历
    public static function previews($arr){

        /**
         * 个人简历
         */
        $data['resume']=Resume::selOne(['r_id'=>$arr['r_id']]);
        /**
         * 作品
         */
        $data['works']=Works::selAll(['r_id'=>$arr['r_id']]);

        /**
         * 项目
         */
        $data['porject']=Porject::selAll(['r_id'=>$arr['r_id']]);

        /**
         * 期望工作
         */
        $data['expected']=Expected::SelOne(['r_id'=>$arr['r_id']]);
        /**
         * 教育背景
         */
        $data['school']= School::selOne(['r_id'=>$arr['r_id']]);

       // print_r($data);die;
		$data['education'] = Education::selAll();
        if($arr['type']!=2){

            return view('index.resume.previews',$data);
        }else{

            return view('index.resume.preview',$data);
        }
    }

    //根据公司查询一拍信息
    public function companyAllBeat(){

        $company_c_id=User::selOne(session('u_id'));
        $companylist=Bc::selAllCompany($company_c_id['u_cid']);
        foreach ($companylist as $k => $v) {
             $i_id=explode(',',$v['b_professional']);
             $companylist[$k]['b_professional']=Industry::selBeat($i_id);
        }
        return view('index.pendingresume.companylist',['companylist'=>$companylist]);
    }

    //公司一拍发送Offer
    public function companyBeatEmail(Request $request){
        $company_c_id=User::selOne(session('u_id'));
        $data = Company::selOne($company_c_id['u_cid']);

        $u_id=$request->input('u_id');
        $content="您好，您<font color='#91bece' >一拍</font>职位的Offer已发送，请注意查收您的Offer。";
        MessageController::sendMessage($u_id,$content,3);

        $arr1['cb_bid']=$request->input('b_id');
        $arr1['bc_cid']=$company_c_id['u_cid'];
        $arr1['cb_cb']=$request->input('bc',2);        
        
        $arr=$request->input();
        unset($arr['u_id']);
        $email=$arr['email'];
        if(strpos($email,'qq')){
            $content = $arr['b_name']."先生,您好！<br /><div style='text-indent:2em;'>这里是".$data['c_name']."人事部，恭喜你通过了面试。现通知您于".date('Y-m-d',time()+24*3600)."上午9:00来公司入职.</dvi><br /><br />入职所需携带资料：<br /><br /> <a href=''>1.身份证。</a><br /><br /> <a href=''>2.上一单位离职证明。</a><br /><br /> <a href=''>3.一寸照片2张。</a><br /><br /><br />公司地址：".$data['c_address'];
        }else{
            $content = $arr['b_name']."先生,您好！<br /><div style='text-indent:2em;'>这里是".$data['c_name']."人事部，恭喜你通过了面试。现通知您于".date('Y-m-d',time()+24*3600)."上午9:00来公司入职<img src='".env('APP_HOST')."/style/images/gz.png'><img src='".env('APP_HOST')."/style/images/gz.png'><img src='".env('APP_HOST')."/style/images/gz.png'>.</dvi><br /><br />入职所需携带资料：<br /><br /> <a href=''>1.身份证。</a><br /><br /> <a href=''>2.上一单位离职证明。</a><br /><br /> <a href=''>3.一寸照片2张。</a><br /><br /><br />公司地址：".$data['c_address'];        
        }
        // echo $content;die;
        $subject = $data['c_name']."人事部认证邮件";
        $rest = MailController::send($content,$email,$subject);
        return $re = Bc::up($arr1);
    }



    //公司查看简历详情的下载
    public function companyResume(Request $request){
        $data=$request->input();
        ob_start();
        $fp =fopen("./company/".$data['rere_id'].".html",'w');
        $content=self::companyPreview($data);
        fwrite($fp, $content);
        $fps =file_get_contents("./company/".$data['rere_id'].".html");
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
        unlink("./company/".$data['rere_id'].".html");
    }

    //公司下载简历
    public function companyPreview($arr){
        $one=ResumeReseale::oneResume($arr['rere_id']);                
        $resume=json_decode($one['rere_content'],true);  //格式化json串
        $resume['r_id']=$resume['expected']['r_id'];       
        $data['resume']=$resume;                        //用户简历基本信息
        $data['works']=$resume['works'];                // 作品查询
        $data['porject']=$resume['porject'];            // 项目查询
        $data['expected']=$resume['expected'];          // 工作查询
        $data['school']=$resume['school'];              // 教育背景查询

        $data['re_re']=$arr;
        // print_r($arr);die;
        if($arr['type']!=2){

            return view('index.pendingresume.previews',$data);
        }else{

            return view('index.pendingresume.preview',$data);
        }
    }
}


