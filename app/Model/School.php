<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    // 用户model
    protected $table = "school";

    protected $guarded = [];

    protected $primaryKey = 's_id';

    protected $hidden = [];

    public $timestamps = false;

    /**
     *
     * @param  $data 教育背景的信息
     */
    public static function selAll($where)
    {
        return self::where($where)->get()->toArray();
    }

    /**查询
     * @param $where
     * @return mixed
     */
    public static function selOne($where)
    {
       $school=self::where($where)->first();
        if($school){
            return $school->toArray();
        }else{
            return $school;
        }
    }

    /**添加
     * @param $data
     * @return mixed
     */
    public static function addSchool($data){
        return self::insert($data);

    }

    /**修改
     * @param $data
     * @param $where
     * @return mixed
     */
    public static function updateSchool($data,$where){
        return self::where($where)->update($data);
    }


}
