<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	protected $table = "company";

    protected $guarded = [];

    protected $primaryKey = 'c_id';

    protected $hidden = [];

    public $timestamps = false;
    public static function Sel($c_id){
    	
    	return Company::where($c_id)->first()->toArray();
    }


}