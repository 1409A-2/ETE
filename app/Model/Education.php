<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
	protected $table = "education";

    protected $guarded = [];

    protected $primaryKey = 'i_id';

    protected $hidden = [];

    public $timestamps = false;
    public static function sel(){
    	return Education::get()->toArray();
    }
}