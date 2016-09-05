<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    // 用户model
    protected $table = "users";

    protected $guarded = [];

    protected $primaryKey = 'u_id';

    protected $hidden = [];

    public $timestamps = false;

    /**
     * 添加一个用户
     * @param  $data 用户的信息
     */
    public static function addUser($data)
    {
        return self::insertGetId($data);
    }


    /**
     * 查看用户是否存在
     * @param $bool [查看用户是否存在]
     */
    public static function findOne($data)
    {
        $user_data = self::where('u_email', '=', $data['u_email'])->first();
        if ($user_data!=null) {
            $res = 1;
        } else {
            $res = null;
        }
        return $res;
    }

    /**
     * 检测用户登录
     * @param $data 当前用户的信息
     */
    public static function checkLog($data)
    {
        $user_data = self::where('u_email', '=', $data['u_email'])
            ->where('u_pwd', '=' , $data['u_pwd'])
            ->first();
        if($user_data!=null){
            $user_data = $user_data->toArray();
        }
        return $user_data;
    }

    /**
     * 修改邮箱状态
     * @param $bool [u_status]
     */
    public static function emailStatus($email)
    {
        $mod = self::where('u_email', '=', $email)
            ->where('u_status', '=' , '0')
            ->first();
        if ($mod != null) {
            $mod->u_status = '1';
            $res = $mod->save();
        } else {
            $res = null;
        }
        return $res;
    }
 /**
     * 查询一个用户的所欲信息
     */
    public static function selOne($u_id)
    {
        return self::where('u_id',$u_id)
            ->select('u_name','u_cid')
            ->first()->toArray();
    }

    /**
     * 修改关联公司
     */
    public static function upCompany($c_id)
    {
        return self::where('u_id',session('u_id'))->update(['u_cid'=>$c_id]);
    }

    /**
     * 查询一个用户的所欲信息
     */
    public static function selOne($u_id)
    {
        return self::where('u_id',$u_id)
            ->select('u_name','u_cid')
            ->first()->toArray();
    }

    /**
     * 修改关联公司
     */
    public static function upCompany($c_id)
    {
        return self::where('u_id',session('u_id'))->update(['u_cid'=>$c_id]);
    }


}
