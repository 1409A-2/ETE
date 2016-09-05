<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ResumeReseale extends Model
{
	protected $table = "resume_reseale";

    protected $guarded = [];

    protected $primaryKey = 'rere_id';

    protected $hidden = [];

    public $timestamps = false;
    public static function Up($data){
    	if(@$data['remuse_resele']==5){
    		return ResumeReseale::where('rere_id','=',$data['rere_id'])->delete();
    	}else{
    		return ResumeReseale::where('rere_id','=',$data['rere_id'])->update($data);
    	}    	
    }

    //查询信息
    public static function Sel_Email($data){
    	return ResumeReseale::Join('resume', 'resume_reseale.r_id', '=', 'resume.r_id')->where('rere_id','=',$data['rere_id'])->first()->toArray();
    	
    }
    //查询每个职位的简历数量
    public static function countPreview($re_id){
        return ResumeReseale::where('re_id','=',$re_id)->count();
    }

    //查看投递到的简历
    public static function SelAll($data){
        return ResumeReseale::join('resume', 'resume_reseale.r_id', '=', 'resume.r_id')
        ->join('enclosure', 'resume.r_id', '=', 'enclosure.r_id')
        ->join('school', 'enclosure.r_id', '=', 'school.r_id')
        ->join('expected', 'resume_reseale.r_id', '=', 'expected.r_id')
        ->join('education', 'school.ed_id', '=', 'education.ed_id')
        ->join('users', 'resume.u_id', '=', 'users.u_id')
        ->where('rere_id','=',$data['rere_id'])->first()->toArray();
    }
    //查看简历中项目经验
    public static function SelAlls($data){
        return ResumeReseale::select('p_name','p_duties','p_start_time','p_end_time')
        ->join('works', 'resume_reseale.r_id', '=', 'works.r_id')
        ->join('porject', 'resume_reseale.r_id', '=', 'porject.r_id')
        ->where('rere_id','=',$data['rere_id'])->get()->toArray();
    }
    //查看简历中项目经验
    public static function SelAllW($data){
        return ResumeReseale::select('w_url','w_name')
        ->join('works', 'resume_reseale.r_id', '=', 'works.r_id')
        ->where('rere_id','=',$data['rere_id'])->get()->toArray();
    }
    
}