<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    protected $table = "message";

    protected $guarded = [];

    protected $primaryKey = 'm_id';

    protected $hidden = [];

    public $timestamps = false;

    /**
     * 获取当前用户的消息的条数
     */
    public static function getMessage()
    {

        return self::where('u_id',session('u_id'))->where('m_status',0)->count('m_id');
    }

    /**
     * 获取所有的消息
     */
    public static function getAll()
    {
        $data = self::where('u_id',session('u_id'))->orderBy('m_time','desc');

        return $data->get()->toArray();
    }

    /**
     * 标为已读
     */
    public static function marketReading()
    {
        return self::where('u_id',session('u_id'))->update(['m_status'=>1]);
    }

    /**
     * 删除七天前已读的消息
     */
    public static function delMessage()
    {
        return self::where('m_status',1)->where('m_time','<',strtotime("-1 week"))->delete();
    }

    /**
     * 发送消息
     * @param $u_id 发给谁
     * @param $content 发什么
     * @param $type 类型（投递反馈 = 1， 系统消息 = 2 ，一拍信息 = 3）
     * @return int 1 or 0
     */
    public static function sendMessage($u_id,$content,$type)
    {
        return self::insert([
            'u_id' => $u_id,
            'm_content' => $content,
            'm_type' => $type,
            'm_time' => time()
        ]);
    }
}
