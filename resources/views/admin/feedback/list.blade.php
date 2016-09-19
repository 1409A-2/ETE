@extends('admin.lar.public')
@section('title_admin', '用户反馈')
@section('content_admin')

<style>
    body #email {  
        border:3px solid #000;
        border-color:#000;    
        border-width:0;
        border-radius: 3px;
        transition: height 0.5s ease-out;
        z-index:99999;
        left: 50%;
        display: none;
        position:fixed;
        background: #F0FFFF;
        padding: 10px 10px;
    }
</style>
<script>
$(function(){
    $(document).delegate("#goEmial",'click',function(){
        fid=$(this).attr('fid');
        $('#f_id').val(fid);
        $("#email").css('display','block');
    })
})
    
</script>
<div id="email">
        <form action="feedBackEmail" method="get">
            <h2 style="color:black">邮件内容:</h2>
            <textarea name="f_name" id="" cols="40" rows="5">您好，
            我是校易聘工作人员，今日收到您的反馈，由于您的电话处于关机状态，无法拨通。
            </textarea>
            <input type="hidden" id="f_id" name="f_id" value=""><br />
            <input type="submit" class="button border-green button-little" value="发送">
       </form>
    </div>
<form action="feedBackDel" method="get">
    <div class="panel admin-panel">
        <div class="panel-head"><strong>反馈列表</strong></div>
        <div class="padding border-bottom">
            <input type="button" class="button button-small checkall" name="checkall" checkfor="f_id[]" value="全选" />
            <input type="submit" id="border-yellow" class="button button-small border-yellow" value="批量删除" />
        </div>
        <table class="table table-hover">
            <tr><th width="245">选择</th><th width="400">反馈信息</th><th width="*">手机号码</th><th width="*">邮箱</th><th width="150">操作</th></tr>
            @foreach($data as $v)
                <tr>
                    <td><input type="checkbox" name="f_id[]" value="{{$v['f_id']}}" /></td>
                    <td>{{$v['f_feedback']}}</td>
                    <td>{{$v['f_tel']}}</td>
                    <td>{{$v['f_email']}}</td>
                    <td>
                        <a class="button border-yellow button-little" href="feedBackDel?f_id={{$v['f_id']}}" >删除</a>
                        <a class="button border-green button-little" fid="{{$v['f_id']}}" id="goEmial" >发送邮件</a>
                    </td>
                </tr>
            @endforeach
        </table>
        <div class="panel-foot text-center">
            <ul class="pagination"><li>
                @if($page['page']==1)
                    <a href="javascript:;">上一页</a>
                @else
                    <a href="feedBackList?p={{$page['up']}}">上一页</a>
                @endif
            </li></ul>
            <ul class="pagination pagination-group">
                @for($i=($page['page']-2);$i<=($page['page']+2);$i++)
                    @if($i<1)
                    <?php continue  ?>
                    @endif
                    @if($i>$page['pages'])
                    <?php continue  ?>
                    @endif                                      
                    <li><a href="feedBackList?p={{$i}}">{{$i}}</a></li>
                @endfor
            </ul>
            <ul class="pagination"><li>
                @if($page['page']==$page['pages'])
                    <a href="javascript:;">下一页</a>
                @else
                    <a href="feedBackList?p={{$page['next']}}">下一页</a>
                @endif
            </li></ul>
        </div>
    </div>
    </form>
@endsection

