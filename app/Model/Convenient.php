<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Convenient extends Model
{
    // 用户model
    protected $table = "convenient";

    protected $guarded = [];

    protected $primaryKey = 'ct_id';

    protected $hidden = [];

    public $timestamps = false;

    /**
     * 用户获取第三方的信息关联
     */
    public function user()
    {
        return $this->belongsTo('App\Model\User', 'ct_id', 'u_id');
    }

    /**
     * 添加一个用户第三方登录信息
     * @param  $data 用户的第三方信息
     */
    public static function addConven($data)
    {
        return self::insertGetId($data);
    }

    /**
     * 检测第三方用户登录
     * @param $data 当前用户的信息
     */
    public static function checkOnly($userKey)
    {
        $user_data = self::where('ct_openid', '=', $userKey)
            ->first();
        if($user_data!=null){
            $user_data = $user_data->toArray();
        }
        return $user_data;
    }

    /**
     * 修改微信绑定状态
     * @param $bool [u_status]
     */
    public static function weixin($data)
    {
        $user_data = self::where('ct_openid', '=', $data['ct_openid'])
            ->where('ct_type', '=', $data['ct_type'])
            ->first();
        if ($user_data==null) {
            $res = self::insertGetId($data);
        } else {
            $res =null;
        }
        return $res;
    }

    /**
     * 修改微信绑定状态(取消绑定)
     * @param $bool [u_status]
     */
    public static function weixinDel($id)
    {
        $data = self::where('u_id', '=', $id)
            ->select('ct_id')
            ->first();
        $res = self::whereIn('ct_id',$data)->delete();
        return $res;
    }
}