<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Industry;
use App\Model\Admin;
use App\Model\Company;
use Session;

class IndustryController extends Controller
{
    /**
     * 行业管理-行业列表
     * @return view
     */
    public function adminIndustryList(Request $request)
    {
        //总数
        $pages=count(Industry::sel());
        @$p=empty($request->input('p'))?1:$request->input('p');
        $page['page']=$p;
        //每页条数
        $len = 5;
        // 总页数
        $page['pages']=ceil($pages/$len);                               
        //上一页        
        $page['up'] = $p<=1? 1 :$p-1;
        //下一页
        $page['next'] = $p>=$page['pages']? $page['pages'] :$p+1;       
        //偏移量
        $off = ceil($p-1)*$len;
        $industry = Industry::selectPage($len,$off);
        $arr = Industry::sel();
        foreach ($industry as $k => $v) {
            if ($v['i_pid']==0) {
                $industry[$k]['i_pname']="";
            }
            foreach ($arr as $key => $val) {
                if ($v['i_pid']==$val['i_id']) {
                    $industry[$k]['i_pname']=$val['i_name'];
                }
            }
        }
        return view('admin.industry.industryList',['industry'=>$industry,'page'=>$page]);
    }

    /**
     * 行业管理-行业添加
     * @return view
     */
    public function adminIndustryAdd()
    {
        $industry = Industry::sel();
        foreach ($industry as $k => $v) {
            if ($v['level']==2) {
                unset($industry[$k]);
            }
        }
        return view('admin.industry.industryAdd',['industry'=>$industry]);
    }

    /**
     * 行业管理-行业添加
     * @return data
     */
    public function industryAddPro(Request $Request)
    {
        $data = $Request->all();
        unset($data['_token']);
        $res = Industry::add($data);
        if ($res) {
            return redirect('adminIndustryList');
        } else {
            return redirect('adminIndustryAdd');
        }
    }

    /**
     * 行业管理-删除行业
     * @return data
     */
    public function adminIndustryDel(Request $Request)
    {
        $i_id = $Request->input('i_id');
        if (!is_array($i_id)) {
            $i_id = array($i_id);
        }
        if (empty($i_id)) {
            echo "<script>alert('你没有要删除任何数据!');location.href='adminIndustryList'</script>";die;
        }

        $arr = Industry::sel();
        foreach ($arr as $key => $val) {
            foreach ($i_id as $k => $v) {
                if ($v==$val['i_pid']) {
                    echo "<script>alert('你所删除的行业还有子项，请先删除子项后再对其操作!');location.href='adminIndustryList'</script>";die;
                }
            }
        }
        if(Industry::delSome($i_id)){
            return redirect('adminIndustryList');
        }else{
            return redirect('adminIndustryList');
        }
    }

    /**
     * 行业管理-编辑行业
     */
    public function adminIndustryUp(Request $Request)
    {
        $i_id = $Request->input('i_id');
        $data = Industry::findOne($i_id);
        $industry = Industry::sel();
        if ($data['i_pid']==0) {
            $data['i_pname']="";
        }
        foreach ($industry as $key => $val) {
            if ($data['i_pid']==$val['i_id']) {
                $data['i_pname']=$val['i_name'];
            }
        }
        foreach ($industry as $k => $v) {
            if ($v['level']==2) {
                unset($industry[$k]);
            }
            if ($v['i_id']==$i_id) {
                unset($industry[$k]);
            }
            if ($v['i_pid']==$i_id) {
                unset($industry[$k]);
            }
        }
        return view('admin.industry.up',['data'=>$data,'industry'=>$industry]);
    }

    /**
     * 行业管理-编辑行业Pro
     */
    public function industryUpPro(Request $Request)
    {
        $data = $Request->all();
        unset($data['_token']);
        if (Industry::updata($data)) {
            return redirect('adminIndustryList');
        } else {
            return redirect('adminIndustryList');
        }
    }

    /**
     * 行业管理-热门设置
     */
    public function adminIndustryHot(Request $Request)
    {
        $i_id =$Request->input('i_id');
        $count = Industry::industryCount();
        $data = Industry::findOne($i_id);
        if ($data['i_hot']=='0') {
            if ($count>10) {
                $res = '热门设置最多10项，请您取消其他热门！';
                return $res;
            } 
            $data['i_hot']='1';
        } else {
            $data['i_hot']='0';
        }
        $res = Industry::updata($data);
        return $res;
    }
}
