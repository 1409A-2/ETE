<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Porject extends Model
{
    // 用户model
    protected $table = "porject";

    protected $guarded = [];

    protected $primaryKey = 'p_id';

    protected $hidden = [];

    public $timestamps = false;

    /**
     *
     * @param  $data 学历的信息
     */
    public static function sel_All($where)
    {
        return self::where($where)->get()->toArray();
    }

    /**
     * @param $u_id
     * @return mixed
     */
    public  static  function sel_One($where){
        return self::where($where)->first()->toArray();
    }


    //添加
    public static function  addProject($data){
        return self::insert($data);

    }
        //修改
    public  static  function updateProject($data,$where){
        return self::where($where)->update($data);
    }

    //删除
    public static function delPorject($where){
        return self::where($where)->delete();
    }

}
