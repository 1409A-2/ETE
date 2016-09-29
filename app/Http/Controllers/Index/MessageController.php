<?php

namespace App\Http\Controllers\Index;

use App\Model\Message;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MessageController extends Controller{

    /**
     * 获取消息
     * @return int
     */
    public function getMessage()
    {
        return Message::getMessage();
    }

    /**
     * 消息列表
     * @return view
     */
    public function messageList(Request $request)
    {
        //删除消息
        $tag = $request->get('tag',0);
        Message::delMessage();
        $message_data = Message::getAll();


        return view('index.message.message_list',['message_data'=>$message_data,'tag'=>$tag]);
    }

    /**
     * 标为已读
     */
    public function reading()
    {

        return Message::marketReading();
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
        return Message::sendMessage($u_id,$content,$type);
    }
}