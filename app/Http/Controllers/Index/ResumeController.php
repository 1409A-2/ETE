<?php

namespace App\Http\Controllers\Index;

use App\Model\Expected;
use App\Model\Porject;
use App\Model\Resume;
use App\Model\ResumeReseale;
use App\Model\School;
use App\Model\User;
use App\Model\Works;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Germey\Geetest\CaptchaGeetest;
use App\Model\Education;

class ResumeController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, CaptchaGeetest;

    /**  我的简历的首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function index()
    {
        //$sum是判断简历能给打多少分
        $sum = '';

        //查询出学历表所有数据
        $education = Education::selAll();
        $u_id = session('u_id'); //用户Id
        $user = User::selOne($u_id);
        if ($user['u_cid'] != 0) {
            return redirect('/');
        }

        //根据用户查询所有简历信息
        $res = Resume::selOne(['u_id' => $u_id]);
        if ($res) {
            if ($res['r_img']) {
                $sum += 5;
            }

            if ($res['r_desc']) {
                $sum += 5;
            }
            $sum += 15;
        }

        //根据简历Id查询出所有作品
        if ($works = Works::selAll(['r_id' => $res['r_id']])) {
            $sum += 20;
        };

        //根据简历Id查询出所有项目
        if ($porject = Porject::selAll(['r_id' => $res['r_id']])) {
            $sum += 20;
        };

        //根据简历id查询出期望的工作
        if ($expected = Expected::SelOne(['r_id' => $res['r_id']])) {
            $sum += 15;
        }

        //根据简历id查询出教育背景
        if ($school = School::selOne(['r_id' => $res['r_id']])) {
            $sum += 20;
        };
        session()->put('sum', $sum);
        //赋值到表单页面,传对应的值
        return view('index.resume.resume', [
            'education' => $education,
            'res' => $res,
            'school' => $school,
            'works' => $works,
            'porject' => $porject,
            'expected' => $expected,
            'sum' => $sum
        ]);
    }


    /** 添加简历的基本信息
     * @param Request $request
     * @return mixed
     */
    public function educationPro(Request $request)
    {

//        return json_encode($request->input());
        //自带表单验证

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'sex' => 'required',
            'highestEducation' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }


        //接收表单传值
        $data['r_name'] = $request->input('name');
        $data['r_sex'] = $request->input('sex');
        $highestEducation = $request->input('highestEducation');
        //判断学历
        $education = Education::selAll();

        //判断学历

        foreach ($education as $k => $v) {
            if ($highestEducation == $v['ed_name']) {
                $data['r_education'] = $v['ed_id'];
            }
        }
        $data['r_email'] = $request->input('email');
        $data['r_photo'] = $request->input('phone');
        $status = $request->input('status');
        //判断目前状态
        switch ($status) {
            case "我目前已离职，可快速到岗":
                $data['r_status'] = 0;
                break;
            case "我目前正在职，正考虑换个新环境":
                $data['r_status'] = 1;
                break;
            case "我暂时不想找工作":
                $data['r_status'] = 2;
                break;
            case "我是应届毕业生":
                $data['r_status'] = 3;
                break;
        }
        $data['r_time'] = time();
        $data['u_id'] = $request->session()->get('u_id');

           $re=Resume::updateResume($data, ['u_id' => $data['u_id']]);
            if($re==1){
                $resume=Resume::selOne(['u_id' => $data['u_id']]);
                $resume['r_education']=$highestEducation;
                $resume['r_status']=$status;
                return json_encode($resume);
            }else{
                return 0;
            }

    }

    /** 上传头像
     * @param Request $request
     */
    public function educationUpload(Request $request)
    {
//        return $_FILES['headPic']['tmp_name'];die;
        //获取用户id
        $u_id = $request->session()->get('u_id');

        $resume = Resume::selOne(['u_id' => $u_id]);

        //拼接图片地址
        $data['r_img'] = 'uploads/' . session('u_email') . rand(0, 999) . '.jpg';
        move_uploaded_file($_FILES['headPic']['tmp_name'], $data['r_img']);
        //判断图片是否存在,进行删除替换
        if (file_exists($resume['r_img'])) {
            unlink($resume['r_img']);
        };
        $res = Resume::updateResume($data, ['u_id' => $u_id]);

        if ($res) {
            return $data['r_img'];
        } else {
            return $data['r_img'];
        }

    }

    /**  教育背景的添加
     * @param Request $request
     * @return $this
     */
    public function schoolPro(Request $request)
    {
        //自带表单的验证
        $validator = Validator::make($request->all(), [
            'schoolName' => 'required',
            'education' => 'required',
            'professional' => 'required',
            'startYear' => 'required',
            'endYear' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $sc_data=$request->input();
        //接收表单的值
        $data['s_name'] = $request->input('schoolName');
        $ed_name = $request->input('education');
        $education = Education::selAll();

        //判断学历

        foreach ($education as $k => $v) {
            if ($ed_name == $v['ed_name']) {
                $data['ed_id'] = $v['ed_id'];
            }
        }

        $data['s_major'] = $request->input('professional');
        $data['s_start_time'] = strtotime($request->input('startYear') . '-01-01');
        $data['s_end_time'] = strtotime($request->input('endYear') . '-01-01');
        $res = Resume::selOne(['u_id' => session('u_id')]);
        $data['r_id'] = $res['r_id'];

        $school = School::selOne(['r_id' => $res['r_id']]);

        //判断是修改还是添加
        if ($school) {
            $res = School::updateSchool($data, ['r_id' => $res['r_id']]);
            if ($res) {
                return json_encode($sc_data);
            } else {
                return 0;
            }
        } else {
            $res = School::addSchool($data);
            if ($res) {
               return json_encode($sc_data);
            } else {
                return 0;
            }
        }
    }

    /**删除教育背景
     * @param Request $request
     * @return mixed
     */
    public function schoolDel(Request $request){

        $id=$request->input('schoolId');
        return  School::delSchool(['r_id'=>$id]);

    }

    /** 添加简历中的个人描述
     * @param Request $request
     * @return $this
     */
    public function educationDesc(Request $request)
    {
        //表单自带验证
        $validator = Validator::make($request->all(), [
            'myRemark' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        //接收表单的值
        $data['r_desc'] = $request->input('myRemark');
        $data['r_time'] = time();
        $r_id = $request->input('id');
        $res = Resume::updateResume($data, ['r_id' => $r_id]);

        //判断是否修改成功
        if ($res) {
            return json_encode($data);
        } else {
            return 0;
        }
    }

    /**   *添加作品
     * @param Request $request
     * @return array|string
     */
    public function worksAdd(Request $request)
    {
        //表单自带验证

        $validator = Validator::make($request->all(), [
            'url' => 'required',
            'workName' => 'required',
            'wsid' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        //接收表单的值
        $data['w_url'] = $request->input('url');
        $data['w_desc'] = $request->input('workName');
        $data['r_id'] = $request->input('wsid');
        $res = Works::addWorks($data);
        //判断是否添加成功
        if ($res) {
           return json_encode(Works::selAll(['r_id'=>$data['r_id']]));
        } else {
            return 0;
        }
    }

    /**     删除个人的作品
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function worksDel(Request $request)
    {
        $id=$request->input('workId');
        $re = Works::delWorks(['w_id' => $id]);
        if ($re == 1) {
            $res = Resume::selOne(['u_id' => session('u_id')]);
            if ($works = Works::selAll(['r_id' => $res['r_id']])) {
                return 2;
            }else{
                return 1;
            }
        } else {
            return 0;
        }
    }


    /** * 添加项目
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function porjectAdd(Request $request)
    {
        //表单自带验证
        $validator = Validator::make($request->all(), [
            'projectName' => 'required',
            'positionName' => 'required',
            'startYear' => 'required',
            'startMonth' => 'required',
            'endYear' => 'required',
            'projectRemark' => 'required',
            'projectid' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
//        $porjectId=$request->input('porjectId');
        //接收表单的值
        $data['p_name'] = $request->input('projectName');//项目名称
        $data['p_duties'] = $request->input('positionName');//担任职务
        $data['p_start_time'] = strtotime($request->input('startYear') . '-' . $request->input('startMonth'));//项目开始年月
        $data['p_end_time'] = ($request->input('endYear') == '至今') ? time() : strtotime($request->input('endYear') . '-' . $request->input('endMonth'));//项目结束年月
        $data['p_desc'] = $request->input('projectRemark');//项目描述
        $data['r_id'] = $request->input('projectid');//对应简历的Id
//        if (isset($porjectId)) {
//
//            $res = Porject::updateProject($data,['p_id'=>$porjectId]);
//                if ($res) {
//                    return json_encode($data);
//                } else {
//                    return 0;
//                }
//
//        } else {

        $res = Porject::addProject($data);

        if ($res) {

            return json_encode(Porject::selAll(['r_id'=>$data['r_id']]));
        } else {

            return 0;
//        }
        }
    }

    public function porjectSel(Request $request){
         $pid= $request->input('pid');

        return json_encode(Porject::selOne(['p_id'=>$pid]));


    }


    /**   * 删除项目
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function porjectDel(Request $request)
    {
        $id=$request->input('porjectId');
        $re = Porject::delPorject(['p_id' => $id]);
        if ($re == 1) {
            $res = Resume::selOne(['u_id' => session('u_id')]);
            if ($porject = Porject::selAll(['r_id' => $res['r_id']])) {
               return  2;
            }else{
                return 1;
            }
        } else {
            return 0;
        }
    }

    /**添加(修改)期望工作
     * @param Request $request
     * @return mixed
     */
    public function expectedAdd(Request $request)
    {
        //自带验证
        $validator = Validator::make($request->all(), [
            'positionName' => 'required',
            'salaryMin' => 'required',
            'salaryMax' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        //接收表单的值
        $data['ex_name'] = $request->input('positionName');
        $data['re_salarymin'] = $request->input('salaryMin');
        $data['re_salarymax'] = $request->input('salaryMax');
        $data['r_id'] = $request->input('id');
        $res = Expected::SelOne(['r_id' => $data['r_id']]);
        if ($res) {
            $expected=Expected::expectedUp(['r_id' => $data['r_id']], $data);
            if($expected){
                return json_encode(Expected::selOne(['r_id'=>$data['r_id']]));
            }else{
                return 0;
            }
        } else {
                Expected::expectedAdd($data);
                return json_encode(Expected::selOne(['r_id'=>$data['r_id']]));

        }
    }

    /**删除期望工作
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function expectedDel(Request $request)
    {
        $id=$request->input('expectedId');
         return Expected::expectedDel(['r_id' => $id]);


    }

    /**投递简历
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function remusePro($id)
    {
        $resume = Resume::selOne(['u_id' => session('u_id')]);
        $data['r_id'] = $resume['r_id'];//简历的id
        $data['re_id'] = $id; //职位id
        $data['delivery_time'] = time();
        $res = ResumeReseale::reAdd($data);
        if ($res == 1) {
            return redirect('remuseShow');
        } else {
            return "<script>alert('投递失败');history.go(-1)</script>";
        }
    }


    /**已投递简历状态
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function remuseShow()
    {

        $resume = Resume::selOne(['u_id' => session('u_id')]);
        $re_all = ResumeReseale::selWhole(['r_id' => $resume['r_id']]);

        if ($re_all) {
            foreach ($re_all as $k => $v) {
                //查询出当前投递的简历
                $arr[] = ResumeReseale::selRes(['resume_reseale.rere_id' => $v['rere_id']]);
            }

            foreach ($arr as $ke => $ve) {
                //全部投递的简历
                $reList['all'][] = $ve;
                $num['all']=count($reList['all']);
                //投递成功
                if($ve['remuse_resele']==0){
                    $reList['remuse_0'][]=$ve;
                    $num['go']=count($reList['remuse_0']);
                }
                //查看过的简历
                if($ve['remuse_resele']==1){
                    $reList['remuse_1'][]=$ve;
                    $num['read']=count($reList['remuse_1']);
                }
                //简历初试通过
                if($ve['remuse_resele']==2){
                    $reList['remuse_2'][]=$ve;
                    $num['yes']=count($reList['remuse_2']);
                }
                //通知面试
                if($ve['remuse_resele']==3||$ve['remuse_resele']==6){
                    $reList['remuse_3'][]=$ve;                    
                    $num['ok']=count($reList['remuse_3']);
                }
                
                //不合格
                if($ve['remuse_resele']==4){
                    $reList['remuse_4'][]=$ve;
                    $num['pass']=count($reList['remuse_4']);
                }
            }

        } else {
            $reList[] = '';
        }


        return view('index.resume.delivery', [
            'reList' => $reList,
            'num'=>$num
        ]);
    }


    /**简历预览
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function previewList($id)
    {

        //个人简历信息查询
        $data['resume'] = Resume::selOne(['r_id' => $id]);

        // 作品查询
        $data['works'] = Works::selAll(['r_id' => $id]);

        // 项目查询
        $data['porject'] = Porject::selAll(['r_id' => $id]);

        //工作查询
        $data['expected'] = Expected::SelOne(['r_id' => $id]);

        //教育背景查询
        $data['school'] = School::selOne(['r_id' => $id]);

        return view('index.resume.preview', $data);
    }

}
