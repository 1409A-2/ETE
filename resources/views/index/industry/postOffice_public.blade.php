<input type="hidden" id="url" value="{{$_SERVER['REQUEST_URI']}}">
<script>
    $(function(){
        url=$('#url').val();
        url=url.substr(1)
        if(url=='postOffice'){

        }else{
          $("a[href="+url+"]").parent().attr("class","current");  
        }
        
    })
</script>
    <div class="sidebar">
            <a class="btn_create" href="postOffice">发布新职位</a>
            <dl class="company_center_aside">
                <dt>我收到的简历</dt>
                <dd>
                    <a href="pendingResume">待处理简历</a>
                </dd>
                <dd>
                    <a href="canInterviewResumes">待定简历</a>
                </dd>
                <dd>
                    <a href="haveNoticeResumes">已通知面试简历</a>
                </dd>
                <dd>
                    <a href="haveRefuseResumes">不合适简历</a>
                </dd>
                <!-- <dd class="btm">
                    <a href="autoFilterResumes.html">自动过滤简历</a>
                </dd> -->
            </dl>
            <dl class="company_center_aside">
                <dt>我发布的职位</dt>
                <dd>
                    <a href="positions">有效职位</a>
                </dd>
                <dd>
                    <a href="positionsdown">已下线职位</a>
                </dd>
            </dl>
        </div>