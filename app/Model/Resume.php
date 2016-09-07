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

    /**简历的信息
     * @return mixed
     */
    public static function sel_All()
    {
        return self::get()->toArray();
    }

    /**查询
     * @param $where
     * @return mixed
     */
    public  static  function sel_One($where){
        $res=self::where($where)->first();
        if($res){
            return $res->toArray();
        }else{
            return $res;
        }
    }

    /**添加
     * @param $data
     * @return mixed
     */
    public static function  addResume($data){
        return self::insert($data);

    }

    /**修改
     * @param $data
     * @param $where
     * @return mixed
     */
    public  static  function updateResume($data,$where){
        return self::where($where)->update($data);
    }


}
