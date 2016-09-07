<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Expected extends Model
{
	protected $table = "expected";

    protected $guarded = [];


    protected $hidden = [];

    public $timestamps = false;


    //添加期望工作
    public static function expectedAdd($data){
    	return self::insertGetId($data);
    }

    //修改期望工作
    public static function expectedUp($where,$data){
        return self::where($where)->update($data);
    }

    //查看期望工作
    public static function Sel_One($where){
       $res=self::where($where)->first();
        if($res){
            return $res->toArray();
        }else{
            return $res;
        }
    }

    public  static  function  expectedDel($where){
        return self::where($where)->delete();
    }


}