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

	/**
	 * 查询所有订阅信息
	 * @return  array()
	 */
	public static function selAll($len,$off){
		$res = self::skip($off)->take($len)->get();
		if($res){
			return $res->toArray();
		}else{
			return $res;
		}
	}

	/**
	 * 查询订阅数量
	 * @return  int
	 */
	public static function selNum(){
		return self::count();
	}

	/**
	 * 删除订阅信息
	 * @return  int
	 */
	public static function dele($u_id){
		return self::whereIn('u_id',$u_id)->delete();
	}
}

?>