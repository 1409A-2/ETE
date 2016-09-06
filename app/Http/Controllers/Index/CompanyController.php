<?php

namespace App\Http\Controllers\Index;

use App\Model\Lable;
use App\Model\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\User;
use App\Model\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Index()
    {
        //
        $u_id = session('u_id');
        if(!$u_id){
            return $this->companyList();
        }
        $user_data = User::selOne($u_id);
        if($user_data['u_cid']==0){
            return $this->companyList();
        }else{
            return $this->companyInfo();
        }

    }

    /**
     * 公司列表
     */
    public function companyList()
    {
        return view('index.company.companylist');
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
}
