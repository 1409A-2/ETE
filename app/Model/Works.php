<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Works extends Model
{
    // 用户model
    protected $table = "works";

    protected $guarded = [];

    protected $primaryKey = 'w_id';

    protected $hidden = [];

    public $timestamps = false;

    /**
     *
     * @param  $data 作品的信息
     */
    public static function sel_All($where)
    {
        return self::where($where)->get()->toArray();
    }


    //添加作品
    public static function  addWorks($data){
        return self::insert($data);

    }
        //修改
    public  static  function updateWorks($data,$where){
        return self::where($where)->update($data);
    }

    //删除
    public static function delWorks($where){
        return self::where($where)->delete();
    }


}
