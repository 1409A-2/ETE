<?php

namespace App\Model;
use DB;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';

    protected $guarded = 'r_id';

    public $timestamps = false;

    //添加角色
    public static function addOne($data){
        return self::insert($data);
    }

    //查询所有列表
    public static function conut(){
        return self::get()->count();
    }

    public static function selAll($length,$limit){
        $data=self::select('r_id','r_name')->orderBy('r_id','ASC')->limit($length)->offset($limit)->get();
        if($data){

            return $data->toArray();
        }
        return $data;
    }

    //删除一个角色
    public static function roleDel($where){
        return self::where($where)->delete();
    }

    //查询一个角色信息
    public static function selOne($r_id){
        $data=self::where('r_id',$r_id)->select('r_id','r_name')->first();

        if($data){

            return $data->toArray();
        }else{

            return $data;
        }
    }

    //修改角色
    public static function roleUpd($where,$data){

        return self::where($where)->update($data);
    }

    //查询角色
    public static function selectAll(){
        return self::select('r_id','r_name')->get()->toArray();
    }
}