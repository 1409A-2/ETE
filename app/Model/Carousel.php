<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    protected $table = "carousel";

    protected $guarded = [];

    protected $primaryKey = 'car_id';

    protected $hidden = [];

    public $timestamps = false;

    /**
     * 添加一条数据
     * @param $data 要添加的数据
     * @return boolean
     */
    public static function carouselAdd($data)
    {
        return self::insert($data);
    }

    /**
     * 查询全部的图片
     */
    public static function selCarousel()
    {
        $data = self::orderBy('car_sort','asc')->get();
        if($data){
            return $data->toArray();
        }
        return $data;
    }

    /**
     * 查询一条数据
     */
    public static function selOnly($car_id)
    {
        $data = self::where('car_id',$car_id)->first();
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
        return self::where('car_id',$data['car_id'])->update($data);
    }

    /**
     * 删除数据
     */
    public static function delOne($car_id)
    {
        return self::where('car_id',$car_id)->delete();
    }

    /**
     * 查询一些数据
     */
    public static function selSome($car_id)
    {
        $carousel = self::whereIn('car_id',$car_id)->get();

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
        return self::whereIn('car_id',$car_id)->delete();
    }
}
