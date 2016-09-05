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

    
}