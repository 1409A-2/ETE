<?php

namespace App\Model;
use DB;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
	protected $table = 'admin';

	protected $guarded = 'a_id';

	public $timestamps = false;

	public function checkLog(array $UserData){
		$arr=$this->where($UserData)->select('a_id','a_name')->first();
		if($arr){
			return $arr->toArray();
		}else{
			return false;
		}
	}

	  public static function addOne($data)
    {
        return self::insert($data);
    }
    /**
     * 查询所有用户信息
     */
    public static function countAll(){
    	return self::get()->count();
    }

    public static function selAll($length,$limit){
    	$data=self::select('a_id','a_name','a_pwd','a_repwd','a_nickname','a_email')->limit($length)->offset($limit)->orderby('a_id','ASC')->get();
    	  if($data){

            return $data->toArray();
        }
        return $data;
    } 
    //查询一个用户的信息
    public static function selOne($a_id){
    	
        $data=self::where('a_id',$a_id)
            ->select('a_id','a_name','a_nickname','a_email')
            ->first();

            if ($data) {

            	return $data->toArray();
            } else {

            	return $data;
            };
    }
    /**
     * 修改用户
     */
    public static function userUpd($where,$data){
    	  
    	return self::where($where)->update($data);

    }

    /**
     * 删除一个用户
     */
    
    public static function userDel($where){
    	return self::where($where)->delete();
    }
    
    //查询用户
    public static function selectAll(){
        return self::select('a_id','a_name')->get()->toArray();
    }
}

?>