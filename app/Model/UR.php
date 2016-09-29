<?php

namespace App\Model;
use DB;
use Illuminate\Database\Eloquent\Model;

class UR extends Model
{
    protected $table = "u_r";


    public $timestamps = false;


    public static function selRole($data){
    	return self::insert($data);
    }

    public static function delOne($a_id){
    	return self::where('a_id',$a_id)->delete();
    }

    public static function selOne($a_id){
        return self::where('a_id',$a_id)->get()->toJson();
    }

    /**
     * 查询一个用户所有的权限id
     */
    public static function selPower($uid){
        return self::where('a_id',$uid)->join('r_p','u_r.r_id','=','r_p.r_id')->lists('p_id')->toArray();
    } 

}