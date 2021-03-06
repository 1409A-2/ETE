<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

	protected $table = "company";

    protected $guarded = [];

    protected $primaryKey = 'c_id';

    protected $hidden = [];

    public $timestamps = false;
    public static function sel($c_id){

        $data = Company::where($c_id)->first();
        if($data){
            return $data->toArray();
        }
        return $data;
    }
    /**
     * 添加一条公司的信息
     */
    public static function addOne($insert_data)
    {
        return self::insertGetId($insert_data);
    }

    /**
     * 查询一个公司的信息
     */
    public static function selOne($c_id)
    {
        return self::where('c_id',$c_id)->first()->toArray();
    }

    /**
     * 修改一条公司的名称
     */
    public static function upName($update_data)
    {
        $u_id = session('u_id');
        $user_data = User::selOne($u_id);
        return self::where('c_id',$user_data['u_cid'])->update($update_data);
    }

    /**
     * 通过验证
     * @param $c_id 公司的id
     * @param $up_data 状态
     */
    public static function upStatus($c_id,$up_data)
    {
        return self::where('c_id',$c_id)->update($up_data);
    }

    /**
     * 修改公司的基本信息
     * @param  $c_id int 公司的id
     * @param  $up_data array 修改的信息（一维数组）
     * @return boolean
     */
    public static function upBase($c_id,$up_data)
    {
        return self::where('c_id',$c_id)->update($up_data);
    }

    /**
     * 修改公司的 ceo 信息
     * @param  $c_id int 公司的id
     * @param  $up_data array 修改的信息（一维数组）
     * @return boolean
     */
    public static function upCeo($up_data,$c_id)
    {
        return self::where('c_id',$c_id)->update($up_data);
    }
	//查询添加时间
    public static function selTime($c_id){
        return self::where('company.c_id','=',$c_id)
        ->first()->toArray();
    }

   /**
     * 修改公司的 intro 信息
     * @param  $c_id int 公司的id
     * @param  $intro string 介绍（一维数组）
     * @return boolean
     */
    public static function upIntro($intro,$c_id)
    {
        return self::where('c_id',$c_id)->update(['c_intro'=>$intro]);
    }

    /**
     * 修改邮箱
     */
    public static function upEmail($insert_data,$c_id)
    {
        return self::where('c_id',$c_id)->update($insert_data);
    }

    /**
     * 查询全部的公司
     */
    public static function selAll($industry,$length,$limit)
    {
        $data = self::where('c_industry','like','%'.$industry.'%')->where('c_email','!=','')->where('c_tel','!=','')->where('c_name','!=','')->where('c_shorthand','!=','')->select('c_id','c_shorthand','c_logo','c_industry')->limit($length)->offset($limit)->get();
        if($data){
            return $data->toArray();
        }
        return $data;
    }

    /**
     * 查询总条数
     */
    public static function selCount($industry)
    {
        return self::where('c_industry','like','%'.$industry.'%')->where('c_email','!=','')->where('c_tel','!=','')->where('c_name','!=','')->where('c_shorthand','!=','')->where('c_tel','!=','')->count('c_id');
    }

    /**
     * 查询搜索的总条数
     */
    public static function searchCount($c_name,$industry){
        return self::where('c_name','like','%'.$c_name.'%')
        ->where('c_industry','like','%'.$industry.'%')->count('c_id');
    }

    /**
     * 查询搜索公司数据
     */
    public static function searchAll($c_name,$industry,$length,$limit){
        $data = self::where('c_name','like','%'.$c_name.'%')
        ->where('c_industry','like','%'.$industry.'%')
        ->select('c_id','c_shorthand','c_logo','c_industry')->limit($length)->offset($limit)->get();
        if($data){
            return $data->toArray();
        }
        return $data;
    }

    /**
     * 查看符合订阅的职位和公司类型
     * @return  array()
     */
    public static function subQuery($min,$max,$data){
        $data = self::Join('release', 'release.c_id', '=', 'company.c_id')
                ->where(function ($query) use($min,$max) {
                    $query->orWhere('re_salarymax','=',$min)
                        ->orWhere('re_salarymin','=',$max)
                        ->orWhere('re_salarymin','>=',$min)
                        ->where('re_salarymax','<=',$max);
                })->where('c_industry','like','%'.$data['s_field'].'%')
                ->where('re_name','like','%'.$data['s_position'].'%')
                ->get();
        if($data){
            return $data->toArray();
        }else{
            return $data;
        }
    }

    /**
     * 查询公司的基本信息
     */
    public static function selBase($c_id)
    {
        $data = self::where('c_id',$c_id)
            ->select('c_shorthand','c_website','c_industry','c_desc','c_name','c_email','c_tel','c_status','c_address')
            ->first();
        if($data){

            return $data->toArray();
        }

        return $data;

    }
}

