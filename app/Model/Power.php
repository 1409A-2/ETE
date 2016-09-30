<?php

namespace App\Model;
use DB;
use Illuminate\Database\Eloquent\Model;

class Power extends Model
{
	protected $table = "power";

    protected $guarded = ['p_id'];

    protected $primaryKey = 'p_id';

    protected $hidden = [];

    public $timestamps = false;


    public static function addOne($data){
    	return self::insert($data);
    }

    //查询所有数据
    public static function selectAll(){
    	$data=Power::get()->toArray();
    	return Power::sel($data,$lev_id=0,$level=0);
    }

      /**
     * 处理递归
     * @ param $data 主数据
     * @ $lev_id=0 父级的id
     * @ $level=0 层
     */
    public static function sel($data,$lev_id=0,$level=0){
        static $lists=array();
        foreach ($data as $key => $v) {
            if($v['parent_id']==$lev_id){
                $v['level']=$level;
                $lists[]=$v;
                Power::sel($data,$v['p_id'],$level+1);
            }
        }
        return $lists;
    }
    /**
     * quanxian shanchu 
     */
    public static function del($where){
        return self::where($where)->delete();
    }

    /**
     * 根据路由查找p_id
     */
    public static function selPid($route){
        $p_id = self::where('p_route',$route)->select('p_id')->first();
        if($p_id){

          return $p_id->toArray()['p_id'];
        }else{

          return $p_id;
        }

    }

     //修改quanxian
   public static function setUpd($where,$data){
    
      return self::where($where)->update($data);
   }

   //查询权限信息
   public static function selOne($p_id){
      $data= self::where('p_id',$p_id)->select('p_id','p_name','p_route','p_status')->first();
      if($data){

        return $data->toArray();
      }else{
        
        return $data;
      }

   }

}