<?php

namespace App\Http\Controllers\Admin;


use App\Model\Company;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class EnterpriseController extends Controller
{

    /**  点击企业管理看到的页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function enterpriseIndex() {

        return view('admin.enterprise.index');
    }

    /** 企业列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function enterpriseList() {

        $company = Company::companyAll();

        return view('admin.enterprise.list',['company'=>$company]);
    }
}
