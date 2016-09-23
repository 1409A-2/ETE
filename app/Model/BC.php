<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class BC extends Model
{
	protected $table = 'bc';

	protected $guarded = ['b_id'];
    public $timestamps = false;
	/**
     * 公司邀约添加数据入库
     */
    public static function cbCb($arr){
        return self::insert($arr);
    }

    public static function sel($bc_cid,$b_id){
    	$bc_bid=self::where('bc_cid','=',$bc_cid)->where('cb_bid','=',$b_id)->first();
    	if($bc_bid){
    		return 1;
    	}else{
    		return $bc_bid;
    	}
    }

    /**
     * 根据公司查询投递的一拍信息
     * @param $where
     * @return mixed
     */
    public static function selAllCompany($where){
        $res=self::join('beat','bc.cb_bid','=','beat.b_id')->where('bc_cid','=',$where)->get();
        if($res){
            return $res->toArray();
        }else{
            return $res;
        }
    }

    /**
     * 修改公司和一拍状态
     */
    public static function up($arr){
        return self::where("cb_bid",'=',$arr['cb_bid'])->where('bc_cid','=',$arr['bc_cid'])->update($arr);
    }
}

?>