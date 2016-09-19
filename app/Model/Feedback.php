<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    // 用户model
    protected $table = "feedback";

    protected $guarded = [];

    protected $primaryKey = 'f_id';

    protected $hidden = [];

    public $timestamps = false;

    /** * 添加反馈信息
     * @param $data
     * @return mixed
     */
    public static function backAdd($data){
        return self::insert($data);

    }

    /** * 查询反馈信息
     * @return mixed
     */
    public static function sel($f_status,$len,$off){
         $res=self::where('f_status','=',$f_status)->orderBy('f_time','desc')->orderBy('f_id','desc')->orderBy('f_uid','desc')->skip($off)->take($len)->get();
         if($res){

            return $res->toArray();
         }else{

            return $res;
         }
    }

    /**查询反馈信息条数
     * @return mixed
     */
    public static function selAll($f_status){
        return self::where('f_status','=',$f_status)->count();
    }
    /**
     * 删除和批量删除一些数据
     * @return   int
     */
    public static function feedDel($arr){
        return self::whereIn('f_id',$arr)->delete();
    }
    /**
     * 查询单条反馈信息
     * @return array()
     */
    public static function selOne($f_id){
        return self::where('f_id','=',$f_id)->first()->toArray();
    }
    /**
     * 修改反馈信息
     * @return   [description]
     */
    public static function up($f_id,$f_status){
        return self::where('f_id','=',$f_id)->update(['f_status'=>$f_status]);
    }
}
