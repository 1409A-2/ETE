<?php

namespace App\Model;
use DB;
use Illuminate\Database\Eloquent\Model;

class RP extends Model
{
    protected $table = "r_p";


    public $timestamps = false;

    public static function setRole($data){

    	return self::insert($data);
    }

    public static function delOne($r_id){

    	return self::where('r_id',$r_id)->delete();
    }

    public static function selOne($uid){

        return self::where('r_id',$uid)->get()->toJson();
    }

    //查询一个角色所拥有的权限
    public static function selPower($r_id){
        return self::where('r_id',$r_id)->join('r_p','role.r_id','=','r_p.r_id')->lists('p_id')->toArray();
    }

}