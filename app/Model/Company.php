<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

	protected $table = "company";

    protected $guarded = [];

    protected $primaryKey = 'c_id';

    protected $hidden = [];

    public $timestamps = false;
    public static function Sel($c_id){
    	
    	return Company::where($c_id)->first()->toArray();
    }
    /**
     * 添加一条公司的信息
     */
    public static function addOne($insert_data)
    {
        return self::insertGetId($insert_data);
    }

    /**
     * 查询一个公司的信息
     */
    public static function selOne($c_id)
    {
        return self::where('c_id',$c_id)->first()->toArray();
    }

    /**
     * 修改一条公司的名称
     */
    public static function upName($update_data)
    {
        $u_id = session('u_id');
        $user_data = User::selOne($u_id);
        return self::where('c_id',$user_data['u_cid'])->update($update_data);
    }

    /**
     * 通过验证
     * @param $c_id 公司的id
     * @param $up_data 状态
     */
    public static function upStatus($c_id,$up_data)
    {
        return self::where('c_id',$c_id)->update($up_data);
    }

    /**
     * 修改公司的基本信息
     * @param  $c_id int 公司的id
     * @param  $up_data array 修改的信息（一维数组）
     * @return boolean
     */
    public static function upBase($c_id,$up_data)
    {
        return self::where('c_id',$c_id)->update($up_data);
    }

    /**
     * 修改公司的 ceo 信息
     * @param  $c_id int 公司的id
     * @param  $up_data array 修改的信息（一维数组）
     * @return boolean
     */
    public static function upCeo($up_data,$c_id)
    {
        return self::where('c_id',$c_id)->update($up_data);
    }
	//查询添加时间
    public static function Sel_Time($c_id){
        return self::where('company.c_id','=',$c_id)
        ->first()->toArray();
    }
}

