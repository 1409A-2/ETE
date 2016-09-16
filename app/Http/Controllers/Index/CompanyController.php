<?php

namespace App\Http\Controllers\Index;

use App\Model\Lable;
use App\Model\Product;
use Illuminate\Http\Request;
use App\Model\Release;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\User;
use App\Model\Company;
use Symfony\Component\HttpFoundation\RedirectResponse;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $u_id = session('u_id');
        $page = $request->get('page',1);
        $industry = $request->get('industry','');
        if(!$u_id){

            return $this->companyList($page,$industry);
        }


        $user_data = User::selOne($u_id);
        if($user_data['u_cid']==0){
            return $this->companyList($page,$industry);
        }elseif($user_data['u_cid']==1){

            return redirect('/info');
        }else{
            $company_data = Company::selOne($user_data['u_cid']);
            if($company_data['c_name']==''){
                return redirect('/info');
            }else{
                if($company_data['c_status']==0){

                    return redirect('/info');
                }elseif($company_data['c_status']==1){

                    return redirect('/info');
                }else{
                    if(empty($company_data['c_shorthand'])||empty($company_data['c_website'])||empty($company_data['c_industry'])||empty($company_data['c_logo'])||empty($company_data['c_desc'])){
                        
                        return redirect('detailed');
                    }else{
                        return $this->companyInfo();
                    }

                }
            }
        }


    }

    /**
     * 公司列表
     */
    public function companyList($page=1,$industry)
    {
        $rows = Company::selCount($industry);
        $length = 15;
        //$page = $request->get('page',1);
        $pages = ceil($rows/$length);
        $limit = ($page-1)*$length;
        $company_data = Company::selAll($industry,$length,$limit);

        foreach($company_data as $key=>$val){
            $company_data[$key]['industry'] = explode(',',$val['c_industry']);
            unset($company_data[$key]['c_industry']);
            $company_data[$key]['lable_data'] = Lable::selLable($val['c_id']);
            $company_data[$key]['release_data'] = Release::selList(['c_id'=>$val['c_id']]);
        }

        return view('index.company.companylist',[
            'company_data'=>$company_data,
            'page' => $page,
            'pages' =>$pages,
            'industry' => $industry
        ]);
    }

    /**
     *公司详情
     */
    public function companyInfo()
    {
        $u_id = session('u_id');
        $user_data = User::selOne($u_id);
        $all_data['company_data'] = Company::selOne($user_data['u_cid']);
        $all_data['product_data'] = Product::selProduct($user_data['u_cid']);
        $all_data['lable_data'] = Lable::selLable($user_data['u_cid']);
        /*$all_data['industry_data'] = explode(',',$all_data['company_data']['c_industry']);
        unset($all_data['company_data']['c_industry']);*/
        //print_r($all_data);die;
        return view('index.company.myhome',$all_data);
    }

    /**
     * 公司的信息
     */
    public function enterpriseInfo(Request $request)
    {
        $c_id = $request->get('c_id');
        $all_data['company_data'] = Company::selOne($c_id);
        $all_data['product_data'] = Product::selProduct($c_id);
        $all_data['lable_data'] = Lable::selLable($c_id);
        /*$all_data['industry_data'] = explode(',',$all_data['company_data']['c_industry']);
        unset($all_data['company_data']['c_industry']);*/
        //print_r($all_data);die;
        return view('index.company.companyinfo',$all_data);
    }
}
