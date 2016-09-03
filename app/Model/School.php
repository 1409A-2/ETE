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
    public static function sel_All()
    {
        return self::get()->toArray();
    }

    public static function sel_One($where)
    {
        return self::where($where)->first()->toArray();
    }
    //添加
    public static function  addSchool($data){
        return self::insert($data);

    }
        //修改
    public  static  function updateSchool($data,$where){
        return self::where($where)->update($data);
    }


}
