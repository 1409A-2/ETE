<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // 用户model
    protected $table = "product";

    protected $guarded = [];

    protected $primaryKey = 'pr_id';

    protected $hidden = [];

    public $timestamps = false;

    /**
     * 添加多条产品
     */
    public static function insertProduct($up_data)
    {
        return self::insert($up_data);
    }

    /**
     * 查询所有产品
     * @param $c_id 公司的id
     * @return array
     */
    public static function selProduct($c_id)
    {
        $data = self::where('c_id',$c_id)->get();
        if($data){
            return $data->toArray();
        }
        return $data;
    }

    /**
     * 查询一个产品
     */
    public static function oneProduct($c_id,$pr_id)
    {
        $data = self::where('c_id',$c_id)->where('pr_id',$pr_id)->first();
        if($data){
            return $data->toArray();
        }
        return $data;
    }

    /**
     * 添加多条产品
     */
    public static function upProduct($up_data,$pr_id)
    {
        return self::where('pr_id',$pr_id)->update($up_data);
    }
}
