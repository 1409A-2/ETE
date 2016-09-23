<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Beat extends Model
{
	protected $table = 'beat';

	protected $guarded = 'b_id';
    public $timestamps = false;

    /** 添加入库
     * @param $data
     * @return mixed
     */
	public static function beatAdd($data){
        return self::insert($data);
	}

    /**查询出当前是正在申请一拍
     * @param $where
     * @return mixed
     */
    public static function beatSel($where){
        $res=self::where($where)->first();
        if($res){
            return $res->toArray();
        }else{
            return $res;
        }
    }


    
}

?>