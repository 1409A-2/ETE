<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    // 用户model
    protected $table = "resume";

    protected $guarded = [];

    protected $primaryKey = 'r_id';

    protected $hidden = [];

    public $timestamps = false;

    /**简历的信息
     * @return mixed
     */
    public static function selAll()
    {
        return self::get()->toArray();
    }

    /**查询
     * @param $where
     * @return mixed
     */
    public static function selOne($where){
        $res=self::where($where)->first();
        if($res){
            return $res->toArray();
        }else{
            return $res;
        }
    }
    /**查询单个
     * @param $where
     * @return mixed
     */
    public static function selFind($where,$find){
        $res=self::where($where)->select($find)->first();
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
    public static function  addResume($data){
        return self::insertGetId($data);

    }

    /**修改
     * @param $data
     * @param $where
     * @return mixed
     */
    public static function updateResume($data,$where){
        return self::where($where)->update($data);
    }
    /**删除
     * @param $u_id
     * @return 1
     */
    public static function userDel($id){
        return self::whereIn('u_id',$id)->delete();
    }

    /**查询
     * @param $where
     * @return mixed
     */
    public static function userUid($where){
        $res=self::select('r_id')->where('u_id','=',$where)->first();
        if($res){
            $re= $res->toArray();
            return $re['r_id'];
        }else{
            return $res;
        }
        
    }
    /**
     * 查询用户id
     */
    public static function resumeUser($where){
        $res=self::select('u_id')->where('r_id','=',$where)->first();
        if($res){
            $re= $res->toArray();
            return $re['u_id'];
        }else{
            return $res;
        }
    }

}
