<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FriendShip extends Model
{
    protected $table = "friendship";

    protected $guarded = [];

    protected $hidden = [];

    protected $primaryKey="link_id";

    public $timestamps = false;

    /**
     * 查询全部的链接
     */
    public static function selFriendLink()
    {
        $data = self::orderBy('link_sort','asc')->get();
        if($data){
            return $data->toArray();
        }
        return $data;
    }

    /**
     * 添加友情链接
     */
    public static function insertData($insert_data)
    {
        return self::insert($insert_data);
    }

    /**
     * 查询一个
     */
    public static function selOnly($link_id)
    {
        $data = self::where('link_id',$link_id)->first();
        if($data){

            return $data->toArray();
        }

        return $data;
    }

    /**
     * 修改数据
     */
    public static function linkUp($data)
    {
        return self::where('link_id',$data['link_id'])->update($data);
    }

    /**
     * 删除数据
     */
    public static function delOne($car_id)
    {
        return self::where('link_id',$car_id)->delete();
    }

    /**
     * 删除一些数据
     */
    public static function delSome($car_id)
    {
        return self::whereIn('link_id',$car_id)->delete();
    }
}
