<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CollectedPosition extends Model
{
    protected $table = "collected_position";

    protected $guarded = [];

    protected $primaryKey = 'col_id';

    protected $hidden = [];

    /**
     * 查询当前用户是否收藏这个职位
     */
    public static function selOnlyPosition($u_id,$re_id)
    {
        $data = self::where('u_id',$u_id)->where('re_id',$re_id)->first();
        if($data){

            return $data->toJson();
        }

        return $data;
    }

    /**
     * 添加一条收藏
     */
    public static function inserCollection($data)
    {
        return self::insert($data);
    }

    /**
     * 删除一条收藏
     */
    public static function delCollection($data)
    {
        return self::where($data)->delete();
    }

    /**
     * 查询当前用户所有收藏的职位
     */
    public static function selCollected($u_id)
    {
        return self::where('u_id',$u_id)
            ->join('release','collected_position.re_id','=','release.re_id')
            ->join('company','release.c_id','=','company.c_id')
            ->select('release.re_id','c_logo','c_shorthand','c_desc','company.c_id',
                're_name','re_education','re_time','re_salarymin','re_salarymax','re_welfare','re_address','re_status','col_id')
            ->get();
    }
}
