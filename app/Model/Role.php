<?php

namespace App\Model;
use DB;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * 用户权限
     */
    public function auths()
    {
        return $this->belongsToMany('App\Model\Auth', 'role_auth', 'ro_id', 'au_id');
    }

	protected $table = 'role';

    protected $guarded = [];

    protected $primaryKey = 'ro_id';

    protected $hidden = [];

    public $timestamps = false;

}

?>