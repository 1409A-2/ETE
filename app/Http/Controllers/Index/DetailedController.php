<?php

namespace App\Http\Controllers\Index;

use App\Model\Lable;
use App\Model\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\User;
use App\Model\Company;

class DetailedController extends Controller
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
        $user_data = User::selOne($u_id);
        if($user_data['u_cid']==0){

            return redirect('/');
        }elseif($user_data['u_cid']==1){

            return redirect('/info');
        }else{
            $company_data = Company::selOne($user_data['u_cid']);
            if($company_data['c_name']==''){

                return redirect('/info');
            }else{
                if($company_data['c_status'] != 2){

                    return redirect('/info');
                }else{
                    if($request->get('update')==1){

                        return $this->detailedBase($request->get('url'));
                    }
                    if(empty($company_data['c_shorthand'])||empty($company_data['c_website'])||empty($company_data['c_industry'])||empty($company_data['c_logo'])||empty($company_data['c_desc'])||empty($company_data['c_address'])){

                        return $this->detailedBase();
                    }else{

                        return redirect('postOffice');
                    }

                }
            }
        }
    }

    /**
     * 公司的详细信息
     */
    public function detailedBase($url='')
    {
        $u_id = session('u_id');
        $user_data = User::selOne($u_id);
        $company_data = Company::selOne($user_data['u_cid']);

        return view('index.detailed.info01',['company_data'=>$company_data,'url'=>$url]);
    }

    /**
     * 第一个递交
     */
    public function basePro(Request $request)
    {
        $u_id = session('u_id');
        $user_data = User::selOne($u_id);
        $company_data = Company::selOne($user_data['u_cid']);
        //上传logo
        $document = $_SERVER['DOCUMENT_ROOT'];
        $destination_path = "/style/upload/logo";
        $file_name = $request->get('name').'_logo_'.time().'.png';
//        $gbk_filename = iconv ($fileName , 'UTF-8', 'GBK' );
        $gbk_filename = mb_convert_encoding ( $file_name,'GBK','UTF-8');
        if ($request->hasFile('myfiles')) {
            if ($request->file('myfiles')->isValid()){
                $file = "";
                @unlink($document.$company_data['c_logo']);
                $request->file('myfiles')->move($document.$destination_path, $gbk_filename);
            }
        }

        $up_data['c_shorthand'] = $request->get('name');
        $up_data['c_website'] = $request->get('website');
        $up_data['c_industry'] = $request->get('select_industry_hidden');
        $up_data['c_address'] = $request->get('positionAddress');
        if(isset($file)){
            $up_data['c_logo'] = $destination_path.'/'.$file_name;
        }
        $up_data['c_desc'] = $request->get('temptation');
        // print_r($up_data);
        if(Company::upBase($user_data['u_cid'],$up_data)){
            if($request->get('url')!=''){

                return redirect($request->get('url'));
            }

            return redirect('/detailed_info2');
        }
    }

    /**
     * 公司标签
     */
    public function detailedLabel(Request $request)
    {
        $url = $request->get('url','');
        $u_id = session('u_id');
        $user_data = User::selOne($u_id);
        $lab_data = Lable::selLable($user_data['u_cid']);
        //print_r($lab_data);die;

        return view('index.detailed.info02',['lab_data'=>$lab_data,'url'=>$url]);
    }

    /**
     * 添加标签
     */
    public function labelPro(Request $request)
    {
        $u_id = session('u_id');
        $user_data = User::selOne($u_id);
        $lable = $request->get('labels');
        if($lable == ''){
            echo 1;die;
        }
        $lables = explode(',',$lable);
        $insert_lables = '';
        foreach($lables as $key=>$val){
            $insert_lables[$key]['lab_name'] = $val;
            $insert_lables[$key]['c_id'] = $user_data['u_cid'];
        }
        Lable::delCompany($user_data['u_cid']);

        if(Lable::insertData($insert_lables)){

            return 1;
        }

        return 0;

    }

    /**
     * 创始团队
     */
    public function detailedTeam(Request $request)
    {
        $url = $request->get('url','');
        $u_id = session('u_id');
        $user_data = User::selOne($u_id);
        $company_data = Company::selOne($user_data['u_cid']);
        return view('index.detailed.info03',[
            'company_data' => $company_data,
            'url' => $url
        ]);
    }

    /**
     * 创始团队
     */
    public function teamPro(Request $request)
    {
        $u_id = session('u_id');
        $user_data = User::selOne($u_id);

        $up_data['c_ceo'] = $request->get('leaderInfosname');
        $up_data['ceo_desc'] = $request->get('leaderInfosremark');

        Company::upCeo($up_data,$user_data['u_cid']);

        if($request->get('url','')!=''){
            return redirect($request->get('url',''));
        }

        return redirect('detailed_info4');
    }

    /**
     * 产品
     */
    public function detailedProduct(Request $request)
    {
        $url = $request->get('url','');
        $pr_id = $request->get('pr_id','');
        $u_id = session('u_id');
        $user_data = User::selOne($u_id);
        $product_data = Product::oneProduct($user_data['u_cid'],$pr_id);

        return view('index.detailed.info04',[
            'product_data' => $product_data,
            'url' => $url
        ]);
    }

    /**
     * 公司介绍
     */
    public function detailedIntro(Request $request)
    {
        $url = $request->get('url','');
        $u_id = session('u_id');
        $user_data = User::selOne($u_id);
        $company_data = Company::selOne($user_data['u_cid']);

        return view('index.detailed.info05',[
            'company_data' => $company_data,
            'url' => $url
        ]);
    }

    /**
     * 添加产品
     */
    public function productPro(Request $request)
    {
        $pr_id = $request->get('pr_id');
        if($pr_id != ''){
            $u_id = session('u_id');
            $user_data = User::selOne($u_id);
            $company_data = Product::oneProduct($user_data['u_cid'],$pr_id);
        }
        $u_id = session('u_id');
        $user_data = User::selOne($u_id);
        $data = $request->except(['_token','resubmitToken','companyId','productInfos']);
        for($i=0;$i<count($data['product']);$i++){
            if($data['product'][$i] != '' && $data['productUrl'][$i] != '' && $data['myfiles'][$i] != '' && $data['productProfile'][$i] != ''){
                if ($data['myfiles'][$i]->isValid()){

                    $destination_path = "/style/upload/product";
                    $file_name = $user_data['u_cid'].$i.time()."_product.jpg";
                    $data['myfiles'][$i]->move($_SERVER['DOCUMENT_ROOT'].$destination_path, $file_name);;
                    $up_data['pr_name'] = $data['product'][$i];
                    $up_data['pr_desc'] = $data['productProfile'][$i];
                    $up_data['pr_website'] = $data['productUrl'][$i];
                    $up_data['pr_pic'] = $destination_path.'/'.$file_name;
                    $up_data['c_id'] = $user_data['u_cid'];
                    if($pr_id != ''){
                        @unlink($_SERVER['DOCUMENT_ROOT'].$company_data['pr_pic']);
                        Product::upProduct($up_data,$pr_id);
                    }else{
                        Product::insertProduct($up_data);
                    }
                }
            }else{
                if($pr_id != ''){
                    $up_data['pr_name'] = $data['product'][$i];
                    $up_data['pr_desc'] = $data['productProfile'][$i];
                    $up_data['pr_website'] = $data['productUrl'][$i];
                    Product::upProduct($up_data,$pr_id);
                }
            }
        }
        if($request->get('url','')!=''){

            return redirect($request->get('url',''));
        }

        return redirect('detailed_info5');
    }

    /**
     * 添加简介
     */
    public function introPro(Request $request)
    {
        $u_id = session('u_id');
        $user_data = User::selOne($u_id);
        $intro = $request->get('companyProfile');
        $url = $request->get('url','');
        if($intro!=''){
            Company::upIntro($intro,$user_data['u_cid']);
        }
        if($url != ''){

            return redirect($url);
        }

        return redirect('postOffice');
    }

}
