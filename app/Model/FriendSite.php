<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FriendSite extends Model
{
    protected $table = "friendsite";

    protected $guarded = [];

    protected $hidden = [];

    protected $primaryKey="link_id";

    public $timestamps = false;

    /**
     * 查询全部的网站
     */
    public static function selSite()
    {
        $data = self::get();
        if($data){
            return $data->toArray();
        }
        return $data;
    }

    /**
     * 添加一条数据
     * @param $data 要添加的数据
     * @return boolean
     */
    public static function siteAdd($data)
    {
        return self::insert($data);
    }

    /**
     * 查询一条数据
     */
    public static function selOnly($site_id)
    {
        $data = self::where('site_id',$site_id)->first();
        if($data){
            return $data->toArray();
        }
        return $data;
    }

    /**
     * 修改数据
     */
    public static function carouselUp($data)
    {
        return self::where('site_id',$data['site_id'])->update($data);
    }

    /**
     * 删除数据
     */
    public static function delOne($site_id)
    {
        return self::where('site_id',$site_id)->delete();
    }

    /**
     * 查询一些数据
     */
    public static function selSome($site_id)
    {
        $carousel = self::whereIn('site_id',$site_id)->get();

        if($carousel){

            return $carousel->toArray();
        }

        return $carousel;
    }

    /**
     * 删除一些数据
     */
    public static function delSome($car_id)
    {
        return self::whereIn('site_id',$car_id)->delete();
    }

    /**
     * 职位搜索页面的推荐网站
     */
    public static function selJump($limit)
    {
        return self::limit($limit)->get()->toArray();
    }
}
