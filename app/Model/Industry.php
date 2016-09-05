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
}
