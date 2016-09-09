<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Enclosure extends Model
{
	protected $table = "enclosure";

    protected $guarded = [];


    protected $hidden = [];

    public $timestamps = false;

    /**删除
     * @param $id
     * @return 1
     */
    public static function userDel($id){
        return self::whereIn('r_id',$id)->delete();
    }

}