<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Release extends Model
{
    protected $table = "release";

    protected $guarded = [];

    protected $primaryKey = 're_id';

    protected $hidden = [];

    public $timestamps = false;
    public static function selAs($c_id,$remuse_resele){
        return Release::Join('resume_reseale', 'release.re_id', '=', 'resume_reseale.re_id')
        ->Join('company', 'release.c_id', '=', 'company.c_id')
        ->Join('resume', 'resume_reseale.r_id', '=', 'resume.r_id')
        ->Join('education', 'resume.r_education', '=', 'education.ed_id')
        ->where('release.c_id','=',$c_id)        
        ->where('resume_reseale.remuse_resele','=',$remuse_resele)
        ->orderBy('rere_id','desc')
        ->get()        
        ->toArray();
    }

    public static function selRel($c_id,$remuse_resele,$read){
        return Release::Join('resume_reseale', 'release.re_id', '=', 'resume_reseale.re_id')
        ->Join('company', 'release.c_id', '=', 'company.c_id')
        ->Join('resume', 'resume_reseale.r_id', '=', 'resume.r_id')
        ->Join('education', 'resume.r_education', '=', 'education.ed_id')
        ->where('release.c_id','=',$c_id)
        ->where('resume_reseale.read','=',$read)
        ->where('resume_reseale.remuse_resele','=',$remuse_resele)
        ->orderBy('rere_id','desc')
        ->get()        
        ->toArray();
    }

    public static function selEd($c_id,$remuse_resele,$ed_name){
        return Release::Join('resume_reseale', 'release.re_id', '=', 'resume_reseale.re_id')
        ->Join('company', 'release.c_id', '=', 'company.c_id')
        ->Join('resume', 'resume_reseale.r_id', '=', 'resume.r_id')
        ->Join('education', 'resume.r_education', '=', 'education.ed_id')
        ->where('release.c_id','=',$c_id)
        ->where('resume.r_education','=',$ed_name)        
        ->where('resume_reseale.remuse_resele','=',$remuse_resele)
        ->orderBy('rere_id','desc')
        ->get()        
        ->toArray();
    }

    public static function selReled($c_id,$remuse_resele,$read,$ed_name){
        return Release::Join('resume_reseale', 'release.re_id', '=', 'resume_reseale.re_id')
        ->Join('company', 'release.c_id', '=', 'company.c_id')
        ->Join('resume', 'resume_reseale.r_id', '=', 'resume.r_id')
        ->Join('education', 'resume.r_education', '=', 'education.ed_id')
        ->where('release.c_id','=',$c_id)
        ->where('resume_reseale.read','=',$read)
        ->where('resume.r_education','=',$ed_name)  
        ->where('resume_reseale.remuse_resele','=',$remuse_resele)
        ->orderBy('rere_id','desc')
        ->get()        
        ->toArray();
    }
    //添加发布职位
    public static function addBacs($data){
        return Release::insertGetId($data);
    }

    //查看发布职位
    public static function selList($c_id){
        return Release::where($c_id)->get()->toArray();
    }

    //预览职位
    public static function selPreview($c_id){
        return Release::orderBy('re_id','desc')->where($c_id)->first()->toArray();
    }

    //用户查看的职位详情
    public static function selPreviews($c_id){
        return Release::where($c_id)->first()->toArray();
    }

    //查看各个职位的简历
    public static function selPr($c_id,$re_status){
        return Release::Join('company', 'release.c_id', '=', 'company.c_id')
        ->where('release.c_id','=',$c_id)
        ->where('release.re_status','=',$re_status)
        ->get()        
        ->toArray();
    }

    //修改职位上下线问题
    public static function upReStatus($data){
         return Release::where('re_id','=',$data['re_id'])->update($data);
    }

    //删除职位
    public static function delRelease($data){
       return Release::where('re_id','=',$data['re_id'])->delete(); 
    }

    //主页热门搜索职位
    public static function hotRelease(){
        $re=Release::get()->toArray();
        return $re[rand(0,count($re)-1)];
    }
    

    //主页热门薪资搜索职位
    public static function moery($where,$i_name,$min,$max){
        if($where==1){
            return Release::where('re_name','=',$i_name)->where('re_salarymin','>=',$min)->where('re_salarymax','<=',$max)->join('company','release.c_id','=','company.c_id')->get()->toArray();
        }else{
        return Release::where($where)->where('re_name','=',$i_name)->where('re_salarymin','>=',$min)->where('re_salarymax','<=',$max)->join('company','release.c_id','=','company.c_id')->get()->toArray();
        }
    }

    //主页热门薪资搜索职位分页查询
    public static function moerys($where,$i_name,$min,$max,$limit,$length){
        if($where==1){
            return Release::where('re_name','=',$i_name)->where('re_salarymin','>=',$min)->where('re_salarymax','<=',$max)->skip($limit)->take($length)->join('company','release.c_id','=','company.c_id')->get()->toArray();
        }else{
            return Release::where($where)->where('re_name','=',$i_name)->where('re_salarymin','>=',$min)->where('re_salarymax','<=',$max)->skip($limit)->take($length)->get()->toArray();
        }
    }
}