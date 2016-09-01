<?php

namespace App\Http\Controllers\Index;
use Validator;
use App\Model\Industry;
use App\Model\Education;
use App\Model\Company;
use App\Model\Release;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
header('content-type:text/html;charset=utf-8');
class IndustryController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function postOffice(){
    	$industry=Industry::sel();
    	$education=Education::sel();
    	$company=Company::sel();
    	// $release=Release::sel();
    	// print_r($company);die;
    	return view('index.industry.postOffice',['industry'=>$industry,'education'=>$education,'company'=>$company]);
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
		// print_r($data);die;
    	$re=Release::add($data);
    	if($re){
    		echo 1;
    	}else{
    		echo 0;
    	}
    }

    public function postOffice_issue(){
    	echo '发布成功';
    }

}
