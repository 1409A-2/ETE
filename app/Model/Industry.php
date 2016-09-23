<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
	protected $table = "industry";

    protected $guarded = [];

    protected $primaryKey = 'i_id';

    protected $hidden = [];

    public $timestamps = false;
	//查询行业数据
    public static function sel(){
    	 $industry=Industry::get()->toArray();
    	 return Industry::level($industry,$i_pid=0,$level=0);
    }

    //递归处理行业数据
    public static function level($industry,$i_pid=0,$level=0){
    	static $arr=array();
    	//循环处理
    	foreach ($industry as $k => $v) {
    		if($v['i_pid']==$i_pid){
    			$v['level']=$level;
    			$arr[]=$v;
    			Industry::level($industry,$v['i_id'],$level+1);
    		}
    	}
    	return $arr;
    }

    /**
     * 查询分页数据
     */
    public static function selPage($len,$off){
        $user_data = self::skip($off)->take($len)->get();
        if($user_data!=null){
            $user_data = $user_data->toArray();
        }
        return $user_data;
    }

    /**
     * 新增行业
     */
    public static function add($data){
        return self::insertGetId($data);
    }

    /**
     * 删除一些数据
     */
    public static function delSome($i_id)
    {
        return self::whereIn('i_id',$i_id)->delete();
    }

    /**
     * 查询单条数据
     */
    public static function findOne($i_id)
    {
        $data = self::where('i_id','=',$i_id)->first();
        if ($data!=null) {
            $data = $data->toArray();
        }
        return $data;
    }

    /**
     * 修改数据
     */
    public static function updata($data)
    {
        return self::where('i_id',$data['i_id'])->update($data);
    }

    /**
     * 查询分页数据
     */
    public static function selectPage($len,$off){
        $user_data = self::skip($off)->take($len)->get();
        if($user_data!=null){
            $user_data = $user_data->toArray();
            $list = self::level($user_data);
            foreach ($list as $k=>$v) {
                foreach ($user_data as $key => $val) {
                    if ($v['i_id']==$val['i_id']) {
                        $arr[] = $v;
                    }
                }
            }
        }
        foreach ($arr as $ak => $av) {
            if($ak>4){
                unset($arr[$ak]);
            }
        }
        return $arr;
    }
    /**
     * 行业管理-统计总数
     */
    public static function industryCount()
    {
        $arr = self::where('i_hot','1')->get();
        if ($arr!=null) {
            $arr->toArray();
            $count = count($arr);
        }
        return $count;
    }

    /** 查询出需要的名称
     * @param $where
     * @return mixed
     */
    public static function findAll($where){

        return self::where($where)->select('i_name')->get()->toArray();

    }


    /** 查询出需要的名称
     * @param $where
     * @return mixed
     */
    public static function findOll($where){

        return self::where($where)->select('i_name')->first()->toArray();

    }
}
