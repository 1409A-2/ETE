<?php

namespace App\Model;
use DB;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
	protected $table = 'admin';

	protected $guarded = ['a_id'];

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