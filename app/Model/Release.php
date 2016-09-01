<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Release extends Model
{
	protected $table = "release";

    protected $guarded = [];

    protected $primaryKey = 're_id';

    protected $hidden = [];

    public $timestamps = false;
    public static function sel(){
    	$c_id['c_id'] =1; 
    	// return Release::select('c_id')->groupBy('c_id')->get()->toArray();
    }

    //添加发布新闻
    public static function add($data){
    	return Release::insertGetId($data);
    }
}