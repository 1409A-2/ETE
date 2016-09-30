<?php

namespace App\Model;
use DB;
use Illuminate\Database\Eloquent\Model;

class Auth extends Model
{

	protected $table = 'auth';

    protected $guarded = [];

    protected $primaryKey = 'au_id';

    protected $hidden = [];

    public $timestamps = false;

}

?>