<?php

namespace App\Model;
use DB;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    /**
     * 用户角色
     */
    public function roles()
    {
        return $this->belongsToMany('App\Model\Role', 'admin_role', 'a_id', 'ro_id');
    }

	protected $table = 'admin';

	protected $guarded = ['a_id'];

    protected $primaryKey = 'a_id';
	
	public function checkLog(array $UserData){
		$arr=$this->where($UserData)->select('a_id','a_name')->first();
		if($arr){
			return $arr->toArray();
		}else{
			return false;
		}
	}
}

?>