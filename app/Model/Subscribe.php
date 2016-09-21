<?php

namespace App\Model;
use DB;
use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
	protected $table = 'subscribe';

	protected $guarded = ['s_id'];
	public $timestamps = false;
	public static function add($data){
		return self::insert($data);
	}

	/**
	 * 查询用户的订阅信息
	 * @return  array()
	 */
	public static function sel($u_id){
		$res = self::where('u_id','=',$u_id)->first();
		if($res){
			return $res->toArray();
		}else{
			return $res;
		}
	}
	/**
	 * 删除用户订阅信息
	 * @return  int
	 */
	public static function del($u_id){
		return self::where('u_id','=',$u_id)->delete();
	}

	/**
	 * 修改订阅信息
	 * @return int
	 */
	public static function up($data){
		return self::where("u_id",'=',$data['u_id'])->update($data);
	}
}

?>