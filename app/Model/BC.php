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
/**
 * [sel description]
 * @param  [type] $bc_cid [description]
 * @param  [type] $b_id   [description]
 * @return [type]         [description]
 */
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

    /** 查询全部公司
     * @param $where
     * @return mixed
     */
    public static function selOll($where){
        $res = self::where($where)->get();
        if ($res) {

            return $res->toArray();
        } else {

            return $res;
        }
    }

    /** 修改我的邀约状态
     * @param $where
     * @param $update
     * @return mixed
     */
    public static function invitedUp($where,$update){

        return self::where($where)->update($update);
    }

    /** 删除我的邀约
     * @param $where
     * @return mixed
     */
    public static function invitedDel($where){
        return self::where($where)->delete();
    }

    public static function invitedSel($where){

        $res=self::where($where)->get();

        if ($res) {

            return $res->toArray();
        }else{

            return $res;
        }
    }

}

?>