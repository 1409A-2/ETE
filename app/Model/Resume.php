<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    // 用户model
    protected $table = "resume";

    protected $guarded = [];

    protected $primaryKey = 'r_id';

    protected $hidden = [];

    public $timestamps = false;

    /**
     *
     * @param  $data 学历的信息
     */
    public static function sel_All()
    {
        return self::get()->toArray();
    }

    /**
     * @param $u_id
     * @return mixed
     */
    public  static  function sel_One($u_id){
        $data = self::where('u_id',$u_id)->first();
        if($data){
            return $data->toArray();
        }
        return $data;
    }


    //添加
    public static function  addResume($data){
        return self::insert($data);

    }
        //修改
    public  static  function updateResume($data,$where){
        return self::where($where)->update($data);
    }


}
