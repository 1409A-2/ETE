<style>
    .a{text-decoration:none;color:#FFF;font-size: 28px;}
</style>
        <div class="qm_ad_conversation_wrap">
            
            <div class="qm_con_body_content" style="overflow:auto;*overflow-y:hidden;*position:relative;padding-bottom:34px;">
                <div id="contentDiv0" style="background:#fff;padding-bottom:20px;zoom:1;position:relative;z-index:1;"
                     class="qm_bigsize qm_converstaion_body body qmbox qqmail_webmail_only"
                     onclick="getTop().preSwapLink(event, 'spam', 'ZC0320-h_JPiocQdyrKZjBnoW~kf69');">
                    <table style="margin:0 auto;color:#555; font:16px/26px '微软雅黑','宋体',Arail; " border="0"
                           cellpadding="0" cellspacing="0" width="640">
                        <tbody>
                        <tr>
                            <td style="height:62px; background-color:#019875; padding:10px 0 0 10px;"><a class="a" 
                                    href="huqingtao.com"
                                    target="_blank">校易聘
                                </a> </td>
                        </tr>
                        <tr style="background-color:#fff;">
                            <td style="padding:0px 38px;">
                                <div>
                                    亲爱的
                                    <span style="color:#019875;"><a target="_blank" href="mailto:1448938869@qq.com">{{$data['s_email']}}</a></span>，你好!
                                </div>
                                <div style="text-indent:2em;">
                                    你在
                                    <a target="_blank"
                                       href="huqingtao.com"
                                       style="color:#019875;">校易聘</a>上订阅了"
                                    <span style="color:#019875;">{{$data['s_position']}}</span>"相关职位信息，经我们精心的挑选，现将筛选结果发送给你，希望我们的邮件能够对你有所帮助。祝职业更上一层楼！
                                </div>
                                <div style="text-indent:2em;">
                                </div>
                                <div style="MARGIN-BOTTOM: 10px; HEIGHT: 30px; TEXT-ALIGN: right; MARGIN-TOP: 10px">
                                    <span style="FONT-SIZE: 10pt; COLOR: #c0c0c0">成功就是日复一日那一点点小小努力的积累。</span>
                                </div>
                                <div
                                    style="border-bottom:1px solid #e6e6e6; font-weight:bold; margin:20px 0 0 0; padding-bottom:5px;">
                                    以下是你订阅的职位：
                                </div>
                                <ul style="list-style:none; margin:0; padding:0;">
                                    <ul style="list-style:none; margin:0; padding:0;">
                                    @foreach($sub as $v)
                                        <li style="list-style:none;padding:15px 10px 15px 0;border-bottom:1px solid #e6e6e6; overflow:hidden;">
                                            <a href="{{env('APP_HOST')}}/postPreview?re_id={{$v['re_id']}}" target="_blank">
                                               <img src="{{env('APP_HOST')}}/{{$v['c_logo']}}" style="border:none; float:left; margin-right:15px;" height="80" width="80"> 
                                               <!-- <span style="display:block;border:none;height:80px;width:80px;float:left;margin-right:15px;background:url('{{env('APP_HOST')}}/{{$v['c_logo']}}')"> </span> -->
                                               </a>
                                            <div>
                                                <a href="{{env('APP_HOST')}}/postPreview?re_id={{$v['re_id']}}" style="float:left; color:#019875; text-decoration:underline;" target="_blank">{{$v['re_name']}}</a>
                                                <a href="{{env('APP_HOST')}}/postPreview?re_id={{$v['re_id']}}" style="float:right; color:#019875; text-decoration:underline;" target="_blank">查看详情</a>
                                                <br>
                                                <div style="font-weight:700;">
                                                    {{$v['c_name']}}
                                                </div>
                                                <div>
                                                    {{$data['s_address']}}/{{$v['c_industry']}}/{{$data['s_type']}}/{{$v['re_salarymin']}}k-{{$v['re_salarymax']}}k
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                    </ul>
                                </ul>
                                <a href="http://www.ete.com/jump?type_selected=1&i_name="
                                   style="float:right; text-decoration:underline; font-weight:700; margin:7px 0;color:#019875;" target="_blank">查看所有职位</a></td>
                        </tr>
                        <tr style="background-color:#fff;margin-top:0px;">
                            <td>

                                <div
                                    style="color:#c5c5c5; font-size:12px; border-top:1px solid #e6e6e6; padding:7px 0; line-height:20px;width:564px;margin:0 auto;">
                                    如果你并未发过此请求，可能是因为其他用户在重置密码时而误输入了你的邮箱地址而使你收到了这封邮件，你可以放心忽略此封邮件，无需进行任何操作。
                                </div>
                                <div
                                    style="font-size:12px; color:#999;line-height:20px;border-top:1px solid #e6e6e6;padding:10px 0;width:564px;margin:0 auto;">
                                    如有任何问题，可以与我们联系，我们将尽快为你解答。
                                    <br> Email：<a target="_blank" href="15910397400@163.com">15910397400@163.com</a> ，电话：<span style="border-bottom:1px dashed #ccc;z-index:1" t="7"
                                                         onclick="return false;" data="">11111111</span>，QQ:<span
                                        style="border-bottom:1px dashed #ccc;z-index:1" t="7" onclick="return false;"
                                        data="88888888">88888888</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="line-height:30px;text-align:right;font-size:14px;"> 为保证邮箱正常接收，请将<a
                                    target="_blank" href="mailto:15910397400@163.com">15910397400@163.com</a>添加进你的通讯录
                            </td>
                        </tr>
                        </tbody>
                    </table>
            </div>
        </div>

