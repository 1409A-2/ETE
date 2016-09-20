<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Lable extends Model
{
    //
    protected $table = "lable";

    protected $guarded = [];

    protected $primaryKey = 'lab_id';

    protected $hidden = [];

    public $timestamps = false;

    /**
     * 添加公司的lable
     * @param $insert_lables array 要添加的标签数据
     * @return boolean
     */
    public static function insertData($insert_lables)
    {
        return self::insert($insert_lables);
    }

    /**
     * 删除公司的lable
     * @param $c_id int 要删除的公司id
     * @return boolean
     */
    public static function delCompany($c_id)
    {
        return self::where('c_id',$c_id)->delete();
    }

    /**
     * 添加公司的lable
     * @param $c_id int 公司id
     * @return boolean
     */
    public static function selLable($c_id)
    {
        $data = self::where('c_id',$c_id)->get();
        if($data){
            return $data->toArray();
        }
        return $data;
    }

    /**
     * 添加公司的lable
     * @param $c_id int 公司id
     * @return boolean
     */
    public static function selLableLimit($c_id)
    {
        $data = self::where('c_id',$c_id)->limit(3)->get();
        if($data){
            return $data->toArray();
        }
        return $data;
    }
}
