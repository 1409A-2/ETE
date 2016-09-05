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
    public static function Sel($c_id,$remuse_resele){    	
    	return Release::Join('resume_reseale', 'release.re_id', '=', 'resume_reseale.re_id')
        ->Join('company', 'release.c_id', '=', 'company.c_id')
        ->Join('resume', 'resume_reseale.r_id', '=', 'resume.r_id')
        ->Join('school', 'resume.r_id', '=', 'school.r_id')
        ->Join('users', 'resume.u_id', '=', 'users.u_id')
        ->Join('education', 'resume.r_education', '=', 'education.ed_id')
        ->where('release.c_id','=',$c_id)        
        ->where('resume_reseale.remuse_resele','=',$remuse_resele)
        ->orderBy('rere_id','desc')
        ->get()        
        ->toArray();
    }

    public static function Sel_Rel($c_id,$remuse_resele,$read){       
        return Release::Join('resume_reseale', 'release.re_id', '=', 'resume_reseale.re_id')
        ->Join('company', 'release.c_id', '=', 'company.c_id')
        ->Join('resume', 'resume_reseale.r_id', '=', 'resume.r_id')
        ->Join('school', 'resume.r_id', '=', 'school.r_id')
        ->Join('users', 'resume.u_id', '=', 'users.u_id')
        ->Join('education', 'resume.r_education', '=', 'education.ed_id')
        ->where('release.c_id','=',$c_id)
        ->where('resume_reseale.read','=',$read)
        ->where('resume_reseale.remuse_resele','=',$remuse_resele)
        ->orderBy('rere_id','desc')
        ->get()        
        ->toArray();
    }

    public static function Sel_ed($c_id,$remuse_resele,$ed_name){       
        return Release::Join('resume_reseale', 'release.re_id', '=', 'resume_reseale.re_id')
        ->Join('company', 'release.c_id', '=', 'company.c_id')
        ->Join('resume', 'resume_reseale.r_id', '=', 'resume.r_id')
        ->Join('school', 'resume.r_id', '=', 'school.r_id')
        ->Join('users', 'resume.u_id', '=', 'users.u_id')
        ->Join('education', 'resume.r_education', '=', 'education.ed_id')
        ->where('release.c_id','=',$c_id)
        ->where('resume.r_education','=',$ed_name)        
        ->where('resume_reseale.remuse_resele','=',$remuse_resele)
        ->orderBy('rere_id','desc')
        ->get()        
        ->toArray();
    }

    public static function Sel_Rel_ed($c_id,$remuse_resele,$read,$ed_name){       
        return Release::Join('resume_reseale', 'release.re_id', '=', 'resume_reseale.re_id')
        ->Join('company', 'release.c_id', '=', 'company.c_id')
        ->Join('resume', 'resume_reseale.r_id', '=', 'resume.r_id')
        ->Join('school', 'resume.r_id', '=', 'school.r_id')
        ->Join('users', 'resume.u_id', '=', 'users.u_id')
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
    public static function Add($data){
    	return Release::insertGetId($data);
    }

    //查看发布职位
    public static function Sel_List($c_id){
        return Release::where($c_id)->get()->toArray();
    }

    //预览职位
    public static function Sel_Preview($c_id){
        return Release::orderBy('re_id','desc')->where($c_id)->first()->toArray();
    }

    //查看各个职位的简历
    public static function Sel_Pr($c_id,$re_status){
        return Release::Join('company', 'release.c_id', '=', 'company.c_id')
        ->where('release.c_id','=',$c_id)
        ->where('release.re_status','=',$re_status)
        ->get()        
        ->toArray();
    }

    //修改职位上下线问题
    public static function Up_re_status($data){
         return Release::where('re_id','=',$data['re_id'])->update($data);
    }

    //删除职位
    public static function Del($data){
       return Release::where('re_id','=',$data['re_id'])->delete(); 
    }
}