<?php

namespace App\Http\Controllers\Index;

use App\Model\Lable;
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
    public function index()
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
                if($company_data['c_status']==0){
                    return redirect('/info');
                }elseif($company_data['c_status']==1){
                    return redirect('/info');
                }else{
                    if(empty($company_data['c_shorthand'])||empty($company_data['c_website'])||empty($company_data['c_industry'])||empty($company_data['c_logo'])||empty($company_data['c_desc'])){
                        return $this->Info1();
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
    public function Info1()
    {

        $u_id = session('u_id');
        $user_data = User::selOne($u_id);
        $company_data = Company::selOne($user_data['u_cid']);

        return view('index.detailed.info01',['company_data'=>$company_data]);
    }

    /**
     * 第一个递交
     */
    public function Info1Pro(Request $request)
    {
        $u_id = session('u_id');
        $user_data = User::selOne($u_id);
        //上传logo
        $document = $_SERVER['DOCUMENT_ROOT'];
        $destinationPath = "/style/upload/logo";
        $fileName = $request->get('name').'_logo_'.time().'.png';
//        $gbk_filename = iconv ($fileName , 'UTF-8', 'GBK' );
        $gbk_filename = mb_convert_encoding ( $fileName,'GBK','UTF-8');
        if ($request->hasFile('myfiles')) {
            if ($request->file('myfiles')->isValid()){
                $request->file('myfiles')->move($document.$destinationPath, $gbk_filename);
            }
        }

        $up_data['c_shorthand'] = $request->get('name');
        $up_data['c_website'] = $request->get('website');
        $up_data['c_industry'] = $request->get('select_industry_hidden');
        $up_data['c_logo'] = $destinationPath.$fileName;
        $up_data['c_desc'] = $request->get('temptation');
        // print_r($up_data);
        if(Company::upBase($user_data['u_cid'],$up_data)){
            return redirect('/detailed_info2');
        }
    }

    /**
     * 公司标签
     */
    public function Info2()
    {
        return view('index.detailed.info02');
    }

    /**
     * 添加标签
     */
    public function info2Pro(Request $request)
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
        echo Lable::insertData($insert_lables);

    }

    /**
     * 创始团队
     */
    public function Info3()
    {
        return view('index.detailed.info03');
    }

    /**
     * 创始团队
     */
    public function info3Pro(Request $request)
    {
        $u_id = session('u_id');
        $user_data = User::selOne($u_id);

        $up_data['c_ceo'] = $request->get('leaderInfosname');
        $up_data['ceo_desc'] = $request->get('leaderInfosremark');

        Company::upCeo($up_data,$user_data['u_cid']);

        return redirect('detailed_info4');
    }

    /**
     * 产品
     */
    public function Info4()
    {
        echo "this is four";
    }
}
