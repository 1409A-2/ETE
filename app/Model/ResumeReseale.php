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
    public static function upResumereseale($data){
    	if(@$data['remuse_resele']==5){
    		return ResumeReseale::where('rere_id','=',$data['rere_id'])->delete();
    	}else{
    		return ResumeReseale::where('rere_id','=',$data['rere_id'])->update($data);
    	}    	
    }


    /**查询
     * @param $where
     * @return mixed
     */
    public static function selRe($where){
        $res=self::join('resume','resume_reseale.r_id','=','resume.r_id')
            ->join('release','resume_reseale.re_id','=','release.re_id')
            ->join('education','release.re_education','=','education.ed_id')
            ->join('company','release.c_id','=','company.c_id')
            ->where($where)->first();
        if($res){
            return $res->toArray();
        }else{
            return $res;
        }

    }

    /**查询
     * @param $where
     * @return mixed
     */
    public static function selRes($where){
        $res=self::join('resume','resume_reseale.r_id','=','resume.r_id')
            ->join('release','resume_reseale.re_id','=','release.re_id')
            ->join('company','release.c_id','=','company.c_id')
            ->where($where)->first();
        if($res){
            return $res->toArray();
        }else{
            return $res;
        }

    }


    public  static  function selOne($where){
        $res=self::where($where)->select('r_id')->first();
        if($res){
            return $res->toArray();
        }else{
            return $res;
        }
    }


    /**查询所有 个人
     * @param $where
     * @return mixed
     */
    public static function selWhole($where){
        $res=self::where($where)->get();
        if($res){
            return $res->toArray();
        }else{
            return $res;
        }

    }

    /**添加
     * @param $data
     * @return mixed
     */
    public static  function reAdd($data){
        return self::insert($data);
    }



    //查询信息
    public static function selEmail($data){
    	return ResumeReseale::Join('resume', 'resume_reseale.r_id', '=', 'resume.r_id')->where('rere_id','=',$data['rere_id'])->first()->toArray();
    	
    }
    //查询每个职位的简历数量
    public static function countPreview($re_id){
        return ResumeReseale::where('re_id','=',$re_id)->count();
    }

    //查看投递到的简历
    public static function selAll($data){
        $res=ResumeReseale::join('resume', 'resume_reseale.r_id', '=', 'resume.r_id')
        ->join('enclosure', 'resume.r_id', '=', 'enclosure.r_id')
        ->join('expected', 'resume_reseale.r_id', '=', 'expected.r_id')
        ->join('users', 'resume.u_id', '=', 'users.u_id')
        ->where('rere_id','=',$data['rere_id'])->first();
        if($res){
            return $res->toArray();
        }else{
            return $res;
        }
    }
    //查看简历中项目经验
    public static function selAlls($data){
        return ResumeReseale::select('p_name','p_duties','p_start_time','p_end_time')
        ->join('works', 'resume_reseale.r_id', '=', 'works.r_id')
        ->join('porject', 'resume_reseale.r_id', '=', 'porject.r_id')
        ->where('rere_id','=',$data['rere_id'])->get()->toArray();
    }
    //查看简历中项目经验
    public static function selAllW($data){
        return ResumeReseale::select('w_url','w_name')
        ->join('works', 'resume_reseale.r_id', '=', 'works.r_id')
        ->where('rere_id','=',$data['rere_id'])->get()->toArray();
    }

    /**删除
     * @param $id
     * @return 1
     */
    public static function userDel($id){
        return self::whereIn('r_id',$id)->delete();
    }

}