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
     *作品的信息
     * @param  $data
     */
    public static function sel_All($where)
    {
        return self::where($where)->get()->toArray();
    }


    /** * 添加作品
     * @param $data
     * @return mixed
     */

    public static function  addWorks($data){
        return self::insert($data);

    }

    /**   修改
     * @param $data
     * @param $where
     * @return mixed
     */
    public  static  function updateWorks($data,$where){
        return self::where($where)->update($data);
    }

    /**  删除
     * @param $where
     * @return mixed
     */
    public static function delWorks($where){
        return self::where($where)->delete();
    }


}
