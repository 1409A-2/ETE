<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    // 用户model
    protected $table = "users";

    protected $guarded = ['geetest_challenge', 'geetest_validate', 'geetest_seccode'];

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
     * 查询一个用户的所有信息
     */
    public static function selOne($u_id)
    {
        $data =  self::where('u_id',$u_id)
            ->select('u_cid')
            ->first();
        if($data){
            return $data->toArray();
        }
        return $data;
    }

    /**
     * 修改关联公司
     */
    public static function upCompany($c_id)
    {
        return self::where('u_id',session('u_id'))->update(['u_cid'=>$c_id]);
    }

    /**
     * 查询全部用户信息
     */
    public static function selAll(){
        $user_data = self::where('u_cid','=',0)->count();
        return $user_data;
    }

    /**
     * 查询分页数据
     */
    public static function selPage($len,$off){
        $user_data = self::where('u_cid','=',0)->skip($off)->take($len)->get();
        if($user_data!=null){
            $user_data = $user_data->toArray();
        }
        return $user_data;
    }

    /**
     * 删除用户信息
     */
    public static function userDel($id){
        return self::whereIn('u_id',$id)->delete();
    }

	/**
     * 检测第三方用户登录
     * @param $data 当前用户的信息
     */
    public static function checkOnly($userKey)
    {
        $user_data = self::where('r_openid', '=', $userKey)
            ->first();
        if($user_data!=null){
            $user_data = $user_data->toArray();
        }
        return $user_data;
    }
    
    /**
     * 检测用户是否存在
     * @param $data 当前用户的信息
     */
    public static function checkOne($data)
    {
        $user_data = self::where('u_email', '=', $data['u_email'])->first();
        if($user_data!=null){
            $user_data = $user_data->toArray();
        }
        return $user_data;
    }

    /**修改密码
     * @return data
     */
    public static function upPwd($data)
    {
        $user_data = self::where('u_email','=',$data['u_email'])->first();
        if ($user_data!=null) {
            $pwd = md5($data['u_pwd']);
            $user_data = $user_data->toArray();
            return self::where('u_id','=',$user_data['u_id'])->update(['u_pwd'=>$pwd]);
        } else {
            return false;
        }
    }

    /**
     * 查询一个用户的所有信息
     */
    public static function findOnly($u_id)
    {
        $data =  self::where('u_id',$u_id)
            ->first();
        if($data){
            return $data->toArray();
        }
        return $data;
    }

    /**
     * 修改微信绑定状态
     * @param $bool [u_status]
     */
    public static function weixin($data)
    {
        $mod = self::where('u_id', '=', $data['u_id'])
            ->first();
        if ($mod != null) {
            $list = $mod->toArray();
            if ($list['r_openid']=="") {
                $mod->r_openid = $data['r_openid'];
                $res = $mod->save();
            } else {
                $mod->r_openid = '';
                $res = $mod->save();
            }
        } else {
            $res = null;
        }
        return $res;
    }
}
