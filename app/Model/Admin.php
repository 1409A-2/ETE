<?php

namespace App\Model;
use DB;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
	protected $table = 'admin';

	protected $guarded = ['uid'];

	public function checkLog(array $UserData){
		$arr=$this->where($UserData)->select('uid','uname')->first();
		if($arr){
			return $arr->toArray();
		}else{
			return false;
		}
	}
}

?>