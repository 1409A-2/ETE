<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    // �û�model
    protected $table = "education";

    protected $guarded = [];

    protected $primaryKey = 'ed_id';

    protected $hidden = [];

    public $timestamps = false;

    /**
     *
     * @param  $data ѧ������Ϣ
     */
    public static function sel_All()
    {
        return self::get()->toArray();
    }


    //���
    public static function addEducation($data){
        return self::insert($data);

    }
    //�޸�
    public  static  function updateEducation($data,$u_id){
        return self::where('u_id',$u_id)->update($data);
    }
    public static function sel_Tion(){
        return Education::get()->toArray();
    }

}
