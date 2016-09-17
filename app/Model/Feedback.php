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
    public static function sel($len,$off){
         $res=self::orderBy('f_id','desc')->orderBy('f_uid','desc')->skip($off)->take($len)->get();
         if($res){

            return $res->toArray();
         }else{

            return $res;
         }
    }

    /**查询反馈信息条数
     * @return mixed
     */
    public static function selAll(){
        return self::count();
    }
    /**
     * 删除和批量删除一些数据
     * @return   int
     */
    public static function feedDel($arr){
        return self::whereIn('f_id',$arr)->delete();
    }
}
