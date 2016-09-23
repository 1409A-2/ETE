@extends('index.lar.public')
<script src="{{env('APP_HOST')}}/style/js/jq.js" type="text/javascript"></script>
@section('content')

    <div id="container">

        <div class="clearfix">
            <div class="content_l">
                <div class="fl" id="resume_name">
                    <div class="nameShow fl">
                        <h1 title="@if($res['r_name']){{$res['r_name']}} @else 匿名 @endif 的简历">@if($res['r_name']){{$res['r_name']}} @else
                                匿名 @endif 的简历</h1>
                        | <a target="_bank" href="{{url('previewList')}}/{{$res['r_id']}}">预览</a>
                    </div>

                </div>
                <!--end #resume_name-->
                <div class="fr c5" id="lastChangedTime">最后一次更新：<span>
                @if($res['r_time'])
                            {{date('Y-m-d H:i:s',$res['r_time'])}}
                        @else
                            暂无
                        @endif
                
                </span>
                </div>
                <!--end #lastChangedTime-->
                <div id="resumeScore">
                    <div class="score fl">
                        <canvas height="120" width="120" id="doughnutChartCanvas"
                                style="width: 120px; height: 120px;"></canvas>
                        <div style="" class="scoreVal"><span>{{$sum}}</span>分</div>
                    </div>
                </div>
                <!--end #resumeScore-->

                <div class="profile_box" id="basicInfo">
                    <h2>基本信息</h2>
                    <span class="c_edit"></span>

                    <div class="basicShow">
            			            			<span>@if($res['r_name']){{$res['r_name']}} @else姓名 @endif
                                                    |  @if($res['r_sex']==0)男@else女@endif
                                                    |
                                                    @if($res['r_education'])
                                                        @foreach($education as $v)
                                                            @if($res['r_education']==$v['ed_id']){{$v['ed_name']}} @endif
                                                        @endforeach

                                                    @else
                                                        学历
                                                    @endif
                                                    <br>
                                                    @if($res['r_photo'])
                                                        {{$res['r_photo']}} |
                                                    @else
                                                        手机号
                                                    @endif
                                                    @if($res['r_email'])
                                                        {{$res['r_email']}}
                                                    @else
                                                        邮箱
                                                    @endif

                                                    <br>
                                                    @if($res['r_status'])
                                                        @if($res['r_status']==0)
                                                            我目前已离职，可快速到岗
                                                           @elseif($res['r_status']==1)
                                                            我目前正在职，正考虑换个新环境
                                                        @elseif($res['r_status']==2)
                                                            我暂时不想找工作
                                                        @elseif($res['r_status']==3)
                                                            我是应届毕业生
                                                            @endif
                                                        @else
                                                        目前状态
                                                    @endif
            			</span>

                            <div class="m_portrait">
                            <div></div>
                            @if($res['r_img'])
                                <img width="120" height="120" alt="jason" src="{{env('APP_HOST')}}/{{$res['r_img']}}">
                            @else
                                <img width="120" height="120" alt="jason"
                                     src="{{env('APP_HOST')}}/style/images/default_headpic.png"/>
                            @endif

                        </div>
                    </div>
                    <!--end .basicShow-->

                    <div class="basicEdit dn">
                        <form id="profileForm">
                            <input type="hidden" value="{{csrf_token()}}" id="editToken">
                            <table>
                                <tbody>
                                <tr>
                                    <td valign="top">
                                        <span class="redstar">*</span>
                                    </td>
                                    <td>
                                        <input type="text" placeholder="姓名" value="{{$res['r_name'] or ''}}" name="name"
                                               id="name">
                                    </td>
                                    <td valign="top"></td>
                                    <td>
                                        <ul class="profile_radio clearfix reset">

                                            <li @if($res['r_sex']==0)   class="current" @endif>
                                                男<em></em>
                                                <input type="radio" name="gender" value="0">
                                            </li>
                                            <li  @if($res['r_sex']==1)   class="current" @endif>
                                                女<em></em>
                                                <input type="radio" name="gender" value="1">
                                            </li>

                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top">
                                        <span class="redstar">*</span>
                                    </td>
                                    <td>
                                        @if($res['r_education'])
                                            <input type="hidden" id="topDegree"
                                                   value="@foreach ($education as $v) @if ($res['r_education']==$v['ed_id']){{$v['ed_name']}} @endif @endforeach"
                                                   name="topDegree">
                                            <input type="button"
                                                   value="@foreach ($education as $v) @if ($res['r_education']==$v['ed_id']){{$v['ed_name']}} @endif @endforeach"
                                                   id="select_topDegree"
                                                   class="profile_select_190 profile_select_normal">
                                        @else


                                            <input type="hidden" id="topDegree" value="--请选择--" name="topDegree">
                                            <input type="button" value="--请选择--" id="select_topDegree"
                                                   class="profile_select_190 profile_select_normal">
                                        @endif
                                        <div class="boxUpDown boxUpDown_190 dn" id="box_topDegree"
                                             style="display: none;">
                                            <ul>
                                                @foreach($education as $v)
                                                    <li>{{$v['ed_name']}}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top">
                                        <span class="redstar">*</span>
                                    </td>
                                    <td colspan="3">
                                        <input type="text" placeholder="手机号码" value="{{$res['r_photo']}}" name="tel"
                                               id="tel">
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top">
                                        <span class="redstar">*</span>
                                    </td>
                                    <td colspan="3">
                                        <input type="text" placeholder="接收面试通知的邮箱" value="{{$res['r_email']}}"
                                               name="email" id="email">
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top"></td>
                                    <td colspan="3">
                                        <input type="hidden" id="currentState" value="" name="currentState">
                                        <input type="button"
                                               value="@if($res['r_status']==0)我目前已离职，可快速到岗@elseif($res['r_status']==1)我目前正在职，正考虑换个新环境@elseif($res['r_status']==2)我暂时不想找工作@elseif($res['r_status']==3)我是应届毕业生@endif"
                                               id="select_currentState"
                                               class="profile_select_410 profile_select_normal">

                                        <div class="boxUpDown boxUpDown_410 dn" id="box_currentState"
                                             style="display: none;">
                                            <ul>
                                                <li>我目前已离职，可快速到岗</li>
                                                <li>我目前正在职，正考虑换个新环境</li>
                                                <li>我暂时不想找工作</li>
                                                <li>我是应届毕业生</li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td colspan="3">
                                        <input type="submit" value="保 存" class="btn_profile_save">
                                        <a class="btn_profile_cancel" href="javascript:;">取 消</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </form>
                        <!--end #profileForm-->

                        <div class="new_portrait">
                            <div class="portrait_upload" id="portraitNo">
                                <span>上传自己的头像</span>
                            </div>
                            <div class="portraitShow dn" id="portraitShow">
                                <img width="120" id="myimg" height="120" src="">
                                <span>更换头像</span>
                            </div>
                            <input type="file" value="" title="支持jpg、jpeg、gif、png格式，文件小于5M"
                                   onchange="img_check(this,'educationUpload','headPic');" name="headPic" id="headPic"
                                   class="myfiles">
                            <!-- <input type="hidden" id="headPicHidden" /> -->
                            <em>
                                尺寸：120*120px <br>
                                大小：小于5M
                            </em>
                            <span style="display:none;" id="headPic_error" class="error"></span>
                        </div>
                    </div>
                    <!--end .basicEdit-->
                    <input type="hidden" id="nameVal" value="{{$res['r_name']}}">
                    <input type="hidden" id="genderVal" value="{{$res['r_sex']}}">
                    @if($res['r_education'])
                        <input type="hidden" id="topDegreeVal"
                               value=" @foreach ($education as $v) @if ($res['r_education']==$v['ed_id']){{$v['ed_name']}} @endif @endforeach">
                    @else
                        <input type="hidden" id="topDegreeVal" value="--请选择--">
                    @endif
                    <input type="hidden" id="currentStateVal"
                           value="@if($res['r_status']==0)我目前已离职，可快速到岗@elseif($res['r_status']==1)我目前正在职，正考虑换个新环境@elseif($res['r_status']==2)我暂时不想找工作@elseif($res['r_status']==3)我是应届毕业生@else--请选择--@endif">
                    <input type="hidden" id="emailVal" value="{{$res['r_email']}}">
                    <input type="hidden" id="telVal" value="{{$res['r_photo']}}">
                    <input type="hidden" id="pageType" value="1">
                </div>
                <!--end #basicInfo-->

                <div class="profile_box" id="expectJob">
                    <h2>期望工作</h2>
                    <span class="c_edit dn"></span>
                    @if($expected)
                        <span class="c_edit"></span>

                        <div class="expectShow">
                            <span>  北京，全职，月薪{{$expected['re_salarymin']}}k-{{$expected['re_salarymax']}}k，职位(<font
                                        color="red">{{$expected['ex_name']}}</font>)</span>
                            <br/> <a href="javascript:;"
                                     style="font-size: 14px;" onclick="expectedDel({{$expected['r_id']}})">删除</a>
                        </div><!--end .expectShow-->

                        <div class="expectEdit dn">
                            <form id="expectForm">
                                <table>
                                    <tbody>

                                    <tr>
                                        <td>
                                            <input type="text" name="expectPosition"
                                                   id="expectPosition">
                                        </td>
                                        <td>
                                            <input type="text" placeholder="最低月薪" value="{{$expected['re_salarymin']}}"
                                                   id="salaryMin"
                                                   name="salaryMin">
                                            <b>K</b>
                                            <input type="text" placeholder="最高月薪" value="{{$expected['re_salarymax']}}"
                                                   id="salaryMax"
                                                   name="salaryMax">
                                            <b>K</b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <input type="submit" value="保 存" class="btn_profile_save">
                                            <a class="btn_profile_cancel" href="javascript:;">取 消</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </form>
                            <!--end #expectForm-->
                        </div><!--end .expectEdit-->
                        <div class="expectAd dn">
                            <form id="expectForm">
                                <table>
                                    <tbody>

                                    <tr>
                                        <td>
                                            <input type="text" placeholder="期望职位，如：产品经理" value="" name="expectPosition"
                                                   id="expectPosition">
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" placeholder="最低月薪" value="" id="salaryMin"
                                                   name="salaryMin"><span>K</span></td>
                                        <td><input type="text" placeholder="最高月薪" value="" id="salaryMax"
                                                   name="salaryMax"><span>K</span></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <input type="submit" value="保 存" class="btn_profile_save">
                                            <a class="btn_profile_cancel" href="javascript:;">取 消</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </form>
                            <!--end #expectForm-->
                        </div>
                        <div class="expectAdd pAdd dn">
                            填写准确的期望工作能大大提高求职成功率哦…<br>
                            快来添加期望工作吧！
                            <span>添加期望工作</span>
                        </div>
                    @else
                        <div class="expectShow"></div>
                        <div class="expectAd dn">
                            <form id="expectForm">
                                <table>
                                    <tbody>

                                    <tr>
                                        <td>
                                            <input type="text" placeholder="期望职位，如：产品经理" value="" name="expectPosition"
                                                   id="expectPosition">
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" placeholder="最低月薪" value="" id="salaryMin"
                                                   name="salaryMin"><span>K</span></td>
                                        <td><input type="text" placeholder="最高月薪" value="" id="salaryMax"
                                                   name="salaryMax"><span>K</span></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <input type="submit" value="保 存" class="btn_profile_save">
                                            <a class="btn_profile_cancel" href="javascript:;">取 消</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </form>
                            <!--end #expectForm-->
                        </div><!--end .expectEdit-->
                        <div class="expectEdit dn">
                            <form id="expectForm">
                                <table>
                                    <tbody>

                                    <tr>
                                        <td>
                                            <input type="text" placeholder="期望职位，如：产品经理" value="" name="expectPosition"
                                                   id="expectPosition">
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" placeholder="最低月薪" value="" id="salaryMin"
                                                   name="salaryMin"><span>K</span></td>
                                        <td><input type="text" placeholder="最高月薪" value="" id="salaryMax"
                                                   name="salaryMax"><span>K</span></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <input type="submit" value="保 存" class="btn_profile_save">
                                            <a class="btn_profile_cancel" href="javascript:;">取 消</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </form>
                            <!--end #expectForm-->
                        </div>
                        <div class="expectAdd pAdd">
                            填写准确的期望工作能大大提高求职成功率哦…<br>
                            快来添加期望工作吧！
                            <span>添加期望工作</span>
                        </div><!--end .expectAdd-->
                    @endif
                    <input type="hidden" id="expectJobVal" value="">
                    <input type="hidden" id="expectCityVal" value="">
                    <input type="hidden" id="typeVal" value="">
                    <input type="hidden" id="expectPositionVal" value="{{$expected['ex_name']}}">
                    <input type="hidden" id="expectSalaryVal" value="">
                </div>

                <div class="profile_box" id="projectExperience">
                    <h2>项目经验</h2>
                    @if($porject)
                        <span class="c_add"></span>

                        <div class="projectShow">


                            @foreach($porject as $v)

                                <ul class="plist clearfix">
                                    <li class="noborder">
                                        <div class="projectList">
                                            <div class="f16 mb10">{{$v['p_name']}},{{$v['p_duties']}}
                                                <span class="c9">
		            									            								（{{date('Y.m',$v['p_start_time'])}}
                                                    -{{date('Y.d',$v['p_end_time'])}}）
                                                    <a href="javascript:;" class="porjectDel" pid="{{$v['p_id']}}"
                                                       style="font-size: 14px;">删除</a>
                                                    <br/>
                                                    <?php echo mb_substr($v['p_desc'],0,15,'UTF-8')?>
                                                    {{--<span pid="{{$v['p_id']}}" class="c_edit"></span>--}}
		            									            						</span>
                                            </div>
                                            <div class="dl1"></div>
                                        </div>
                                    </li>
                                </ul>
                                <hr/>
                            @endforeach
                        </div>
                        <div class="projectEdit dn">
                            <form class="projectForm">
                                <input type="hidden" id="project_token" value="{{csrf_token()}}"/>
                                <table>
                                    <tbody>
                                    <tr>
                                        <td valign="top">
                                            <span class="redstar">*</span>
                                        </td>
                                        <td>
                                            <input type="text" placeholder="项目名称" name="projectName"
                                                   class="projectName">
                                        </td>
                                        <td valign="top">
                                            <span class="redstar">*</span>
                                        </td>
                                        <td>
                                            <input type="text" placeholder="担任职务，如：产品负责人" name="thePost"
                                                   class="thePost">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="top">
                                            <span class="redstar">*</span>
                                        </td>
                                        <td>
                                            <div class="fl">
                                                <input type="hidden" class="projectYearStart" value=""
                                                       name="projectYearStart">
                                                <input type="button" value="开始年份"
                                                       class="profile_select_139 profile_select_normal select_projectYearStart">

                                                <div class="box_projectYearStart  boxUpDown boxUpDown_139 dn"
                                                     style="display: none;">
                                                    <ul>
                                                        @for($i=2016;$i>1969;$i--)
                                                            <li>{{$i}}</li>
                                                        @endfor
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="fl">
                                                <input type="hidden" class="projectMonthStart" value=""
                                                       name="projectMonthStart">
                                                <input type="button" value="开始月份"
                                                       class="profile_select_139 profile_select_normal select_projectMonthStart">

                                                <div style="display: none;"
                                                     class="box_projectMonthStart boxUpDown boxUpDown_139 dn">
                                                    <ul>
                                                        @for($i=01;$i<13;$i++)
                                                            <li>{{$i}}</li>
                                                        @endfor
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="clear"></div>
                                        </td>
                                        <td valign="top">
                                            <span class="redstar">*</span>
                                        </td>
                                        <td>
                                            <div class="fl">
                                                <input type="hidden" class="projectYearEnd" value=""
                                                       name="projectYearEnd">
                                                <input type="button" value="结束年份"
                                                       class="profile_select_139 profile_select_normal select_projectYearEnd">

                                                <div class="box_projectYearEnd  boxUpDown boxUpDown_139 dn"
                                                     style="display: none;">
                                                    <ul>
                                                        <li>至今</li>
                                                        @for($i=2016;$i>1969;$i--)
                                                            <li>{{$i}}</li>
                                                        @endfor
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="fl">
                                                <input type="hidden" class="projectMonthEnd" value=""
                                                       name="projectMonthEnd">
                                                <input type="button" value="结束月份"
                                                       class="profile_select_139 profile_select_normal select_projectMonthEnd">

                                                <div style="display: none;"
                                                     class="box_projectMonthEnd boxUpDown boxUpDown_139 dn">
                                                    <ul>
                                                        @for($i=01;$i<13;$i++)
                                                            <li>{{$i}}</li>
                                                        @endfor
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="clear"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="top"></td>
                                        <td colspan="3">
                                            <textarea class="projectDescription s_textarea" name="projectDescription"
                                                      placeholder="项目描述"></textarea>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td valign="top"></td>
                                        <td colspan="3">
                                            <input type="submit" value="保 存" class="btn_profile_save">
                                            <a class="btn_profile_cancel" href="javascript:;">取 消</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <input type="hidden" value="" class="projectId">
                            </form>
                        </div>
                        <div class="projectEd dn"></div>
                        <div class="projectAdd pAdd dn">
                            项目经验是用人单位衡量人才能力的重要指标哦！<br>
                            来说说让你难忘的项目吧！
                            <span>添加项目经验</span>
                        </div>
                    @else
                        <div class="c_edit dn"></div>
                        <div class="projectShow dn"></div>
                        <div class="projectEdit dn">
                            <form class="projectForm">
                                <input type="hidden" id="project_token" value="{{csrf_token()}}"/>
                                <table>
                                    <tbody>
                                    <tr>
                                        <td valign="top">
                                            <span class="redstar">*</span>
                                        </td>
                                        <td>
                                            <input type="text" placeholder="项目名称" name="projectName"
                                                   class="projectName">
                                        </td>
                                        <td valign="top">
                                            <span class="redstar">*</span>
                                        </td>
                                        <td>
                                            <input type="text" placeholder="担任职务，如：产品负责人" name="thePost"
                                                   class="thePost">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="top">
                                            <span class="redstar">*</span>
                                        </td>
                                        <td>
                                            <div class="fl">
                                                <input type="hidden" class="projectYearStart" value=""
                                                       name="projectYearStart">
                                                <input type="button" value="开始年份"
                                                       class="profile_select_139 profile_select_normal select_projectYearStart">

                                                <div class="box_projectYearStart  boxUpDown boxUpDown_139 dn"
                                                     style="display: none;">
                                                    <ul>
                                                        @for($i=2016;$i>1969;$i--)
                                                            <li>{{$i}}</li>
                                                        @endfor
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="fl">
                                                <input type="hidden" class="projectMonthStart" value=""
                                                       name="projectMonthStart">
                                                <input type="button" value="开始月份"
                                                       class="profile_select_139 profile_select_normal select_projectMonthStart">

                                                <div style="display: none;"
                                                     class="box_projectMonthStart boxUpDown boxUpDown_139 dn">
                                                    <ul>
                                                        @for($i=01;$i<13;$i++)
                                                            <li>{{$i}}</li>
                                                        @endfor
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="clear"></div>
                                        </td>
                                        <td valign="top">
                                            <span class="redstar">*</span>
                                        </td>
                                        <td>
                                            <div class="fl">
                                                <input type="hidden" class="projectYearEnd" value=""
                                                       name="projectYearEnd">
                                                <input type="button" value="结束年份"
                                                       class="profile_select_139 profile_select_normal select_projectYearEnd">

                                                <div class="box_projectYearEnd  boxUpDown boxUpDown_139 dn"
                                                     style="display: none;">
                                                    <ul>
                                                        <li>至今</li>
                                                        @for($i=2016;$i>1969;$i--)
                                                            <li>{{$i}}</li>
                                                        @endfor
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="fl">
                                                <input type="hidden" class="projectMonthEnd" value=""
                                                       name="projectMonthEnd">
                                                <input type="button" value="结束月份"
                                                       class="profile_select_139 profile_select_normal select_projectMonthEnd">

                                                <div style="display: none;"
                                                     class="box_projectMonthEnd boxUpDown boxUpDown_139 dn">
                                                    <ul>
                                                        @for($i=01;$i<13;$i++)
                                                            <li>{{$i}}</li>
                                                        @endfor
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="clear"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="top"></td>
                                        <td colspan="3">
                                            <textarea class="projectDescription s_textarea" name="projectDescription"
                                                      placeholder="项目描述"></textarea>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td valign="top"></td>
                                        <td colspan="3">
                                            <input type="submit" value="保 存" class="btn_profile_save">
                                            <a class="btn_profile_cancel" href="javascript:;">取 消</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <input type="hidden" value="" class="projectId">
                            </form>

                        </div>
                        <div class="projectAdd pAdd">
                            项目经验是用人单位衡量人才能力的重要指标哦！<br>
                            来说说让你难忘的项目吧！
                            <span>添加项目经验</span>
                        </div><!--end .projectAdd-->
                    @endif
                </div>


                <div class="profile_box" id="educationalBackground">
                    <h2>教育背景<span>（投递简历时必填）</span></h2>


                    @if($school)
                        <span class="c_edit"></span>
                        <div class="educationalShow">

                           <span>学校名称——   <b>{{$school['s_name']}}</b>   <br/>最高学历——<b>
                                   @foreach($education as $v)
                                       @if($school['ed_id']==$v['ed_id'])
                                           {{$v['ed_name']}}
                                       @endif
                                   @endforeach
                               </b> <br>
                               专业———— <b>  {{$school['s_major']}}</b> <br/> 在校历程—— <b> {{date('Y',$school['s_start_time'])}}
                                   —{{date('Y',$school['s_end_time'])}} </b><br>
                               <a href="javascript:;" onclick="schoolDel({{$school['r_id']}})"
                                  style="font-size: 14px;">删除</a>
                               </span>
                        </div>

                        <div class="educationalEdit dn">
                            <form class="educationalForm">
                                <input type="hidden" value="{{csrf_token()}}" id="resubmitTokens">
                                <table>
                                    <tbody>
                                    <tr>
                                        <td valign="top">
                                            <span class="redstar">*</span>
                                        </td>
                                        <td>
                                            <input type="text" placeholder="学校名称" value="{{$school['s_name']}}"
                                                   name="schoolName">
                                        </td>
                                        <td valign="top">
                                            <span class="redstar">*</span>
                                        </td>
                                        <td>
                                            <input type="hidden" class="degree" value="学历" name="degree">

                                            <input type="button"
                                                   value="学历"
                                                   class="profile_select_287 profile_select_normal  select_degree">

                                            <div class="box_degree boxUpDown boxUpDown_287" style="display: none;">
                                                <ul>
                                                    @foreach($education as $v)
                                                        <li>{{$v['ed_name']}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="top">
                                            <span class="redstar">*</span>
                                        </td>
                                        <td>
                                            <input type="text" placeholder="专业名称" value="{{$school['s_major']}}"
                                                   name="professionalName">
                                        </td>
                                        <td valign="top">
                                            <span class="redstar">*</span>
                                        </td>
                                        <td>
                                            <div class="fl">
                                                <input type="hidden" class="schoolYearStart" value=""
                                                       name="schoolYearStart">
                                                <input type="button" value="开始年份"
                                                       class="profile_select_139 profile_select_normal select_schoolYearStart">

                                                <div class="box_schoolYearStart boxUpDown boxUpDown_139 dn"
                                                     style="display: none;">
                                                    <ul>
                                                        @for($i=2016;$i>1969;$i--)
                                                            <li>{{$i}}</li>
                                                        @endfor
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="fl">
                                                <input type="hidden" class="schoolYearEnd" value="结束年份"
                                                       name="schoolYearEnd">
                                                <input type="button" value="结束年份"
                                                       class="profile_select_139 profile_select_normal select_schoolYearEnd">

                                                <div class="box_schoolYearEnd  boxUpDown boxUpDown_139 dn"
                                                     style="display: none;">
                                                    <ul>
                                                        @for($i=2016;$i>1969;$i--)
                                                            <li>{{$i}}</li>
                                                        @endfor
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="clear"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="3">
                                            <input type="submit" value="保 存" class="btn_profile_save">
                                            <a class="btn_profile_cancel" href="javascript:;">取 消</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <input type="hidden" class="eduId" value="">
                            </form>
                        </div>
                        <div class="educationalAd dn">
                            <form class="educationalForm">
                                <input type="hidden" value="{{csrf_token()}}" id="resubmitTokens">
                                <table>
                                    <tbody>
                                    <tr>
                                        <td valign="top">
                                            <span class="redstar">*</span>
                                        </td>
                                        <td>
                                            <input type="text" placeholder="学校名称" name="schoolName" class="schoolName">
                                        </td>
                                        <td valign="top">
                                            <span class="redstar">*</span>
                                        </td>
                                        <td>
                                            <input type="hidden" class="degree" value="学历" name="degree">
                                            <input type="button" value="学历"
                                                   class="profile_select_287 profile_select_normal select_degree">


                                            <div class="box_degree boxUpDown boxUpDown_287 dn" style="display: none;">
                                                <ul>
                                                    @foreach($education as $v)
                                                        <li>{{$v['ed_name']}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="top">
                                            <span class="redstar">*</span>
                                        </td>
                                        <td>
                                            <input type="text" placeholder="专业名称" name="professionalName"
                                                   class="professionalName">
                                        </td>
                                        <td valign="top">
                                            <span class="redstar">*</span>
                                        </td>
                                        <td>
                                            <div class="fl">
                                                <input type="hidden" class="schoolYearStart" value=""
                                                       name="schoolYearStart">
                                                <input type="button" value="开始年份"
                                                       class="profile_select_139 profile_select_normal select_schoolYearStart">

                                                <div class="box_schoolYearStart boxUpDown boxUpDown_139 dn"
                                                     style="display: none;">
                                                    <ul>
                                                        @for($i=2016;$i>1969;$i--)
                                                            <li>{{$i}}</li>
                                                        @endfor
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="fl">
                                                <input type="hidden" class="schoolYearEnd" value=""
                                                       name="schoolYearEnd">
                                                <input type="button" value="结束年份"
                                                       class="profile_select_139 profile_select_normal select_schoolYearEnd">

                                                <div class="box_schoolYearEnd  boxUpDown boxUpDown_139 dn"
                                                     style="display: none;">
                                                    <ul>
                                                        @for($i=2016;$i>1969;$i--)
                                                            <li>{{$i}}</li>
                                                        @endfor
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="clear"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="3">
                                            <input type="submit" value="保 存" class="btn_profile_save">
                                            <a class="btn_profile_cancel" href="javascript:;">取 消</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <input type="hidden" class="eduId" value="">
                            </form>
                            <!--end .educationalForm-->
                        </div>
                        <div class="educationalAdd pAdd dn">
                            教育背景可以充分体现你的学习和专业能力，<br>
                            且完善后才可投递简历哦！
                            <span>添加教育经历</span>
                        </div>

                    @else
                        <span class="c_edit dn"></span>
                        <div class="educationalShow dn"></div>
                        <div class="educationalEdit dn">
                            <form class="educationalForm">
                                <input type="hidden" value="{{csrf_token()}}" id="resubmitTokens">
                                <table>
                                    <tbody>
                                    <tr>
                                        <td valign="top">
                                            <span class="redstar">*</span>
                                        </td>
                                        <td>
                                            <input type="text" placeholder="学校名称" name="schoolName" class="schoolName">
                                        </td>
                                        <td valign="top">
                                            <span class="redstar">*</span>
                                        </td>
                                        <td>
                                            <input type="hidden" class="degree" value="学历" name="degree">
                                            <input type="button" value="学历"
                                                   class="profile_select_287 profile_select_normal select_degree">


                                            <div class="box_degree boxUpDown boxUpDown_287 dn" style="display: none;">
                                                <ul>
                                                    @foreach($education as $v)
                                                        <li>{{$v['ed_name']}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="top">
                                            <span class="redstar">*</span>
                                        </td>
                                        <td>
                                            <input type="text" placeholder="专业名称" name="professionalName"
                                                   class="professionalName">
                                        </td>
                                        <td valign="top">
                                            <span class="redstar">*</span>
                                        </td>
                                        <td>
                                            <div class="fl">
                                                <input type="hidden" class="schoolYearStart" value=""
                                                       name="schoolYearStart">
                                                <input type="button" value="开始年份"
                                                       class="profile_select_139 profile_select_normal select_schoolYearStart">

                                                <div class="box_schoolYearStart boxUpDown boxUpDown_139 dn"
                                                     style="display: none;">
                                                    <ul>
                                                        @for($i=2016;$i>1969;$i--)
                                                            <li>{{$i}}</li>
                                                        @endfor
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="fl">
                                                <input type="hidden" class="schoolYearEnd" value=""
                                                       name="schoolYearEnd">
                                                <input type="button" value="结束年份"
                                                       class="profile_select_139 profile_select_normal select_schoolYearEnd">

                                                <div class="box_schoolYearEnd  boxUpDown boxUpDown_139 dn"
                                                     style="display: none;">
                                                    <ul>
                                                        @for($i=2016;$i>1969;$i--)
                                                            <li>{{$i}}</li>
                                                        @endfor
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="clear"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="3">
                                            <input type="submit" value="保 存" class="btn_profile_save">
                                            <a class="btn_profile_cancel" href="javascript:;">取 消</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <input type="hidden" class="eduId" value="">
                            </form>
                            <!--end .educationalForm-->
                        </div><!--end .educationalEdit-->
                        <div class="educationalAd dn">
                            <form class="educationalForm">
                                <input type="hidden" value="{{csrf_token()}}" id="resubmitTokens">
                                <table>
                                    <tbody>
                                    <tr>
                                        <td valign="top">
                                            <span class="redstar">*</span>
                                        </td>
                                        <td>
                                            <input type="text" placeholder="学校名称" name="schoolName" class="schoolName">
                                        </td>
                                        <td valign="top">
                                            <span class="redstar">*</span>
                                        </td>
                                        <td>
                                            <input type="hidden" class="degree" value="学历" name="degree">
                                            <input type="button" value="学历"
                                                   class="profile_select_287 profile_select_normal select_degree">


                                            <div class="box_degree boxUpDown boxUpDown_287 dn" style="display: none;">
                                                <ul>
                                                    @foreach($education as $v)
                                                        <li>{{$v['ed_name']}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="top">
                                            <span class="redstar">*</span>
                                        </td>
                                        <td>
                                            <input type="text" placeholder="专业名称" name="professionalName"
                                                   class="professionalName">
                                        </td>
                                        <td valign="top">
                                            <span class="redstar">*</span>
                                        </td>
                                        <td>
                                            <div class="fl">
                                                <input type="hidden" class="schoolYearStart" value=""
                                                       name="schoolYearStart">
                                                <input type="button" value="开始年份"
                                                       class="profile_select_139 profile_select_normal select_schoolYearStart">

                                                <div class="box_schoolYearStart boxUpDown boxUpDown_139 dn"
                                                     style="display: none;">
                                                    <ul>
                                                        @for($i=2016;$i>1969;$i--)
                                                            <li>{{$i}}</li>
                                                        @endfor
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="fl">
                                                <input type="hidden" class="schoolYearEnd" value=""
                                                       name="schoolYearEnd">
                                                <input type="button" value="结束年份"
                                                       class="profile_select_139 profile_select_normal select_schoolYearEnd">

                                                <div class="box_schoolYearEnd  boxUpDown boxUpDown_139 dn"
                                                     style="display: none;">
                                                    <ul>
                                                        @for($i=2016;$i>1969;$i--)
                                                            <li>{{$i}}</li>
                                                        @endfor
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="clear"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="3">
                                            <input type="submit" value="保 存" class="btn_profile_save">
                                            <a class="btn_profile_cancel" href="javascript:;">取 消</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <input type="hidden" class="eduId" value="">
                            </form>
                            <!--end .educationalForm-->
                        </div>

                        <div class="educationalAdd pAdd ">
                            教育背景可以充分体现你的学习和专业能力，<br>
                            且完善后才可投递简历哦！
                            <span>添加教育经历</span>
                        </div>
                    @endif
                </div>
                <!--end #educationalBackground-->

                <div class="profile_box" id="selfDescription">
                    <h2>自我描述</h2>
                    <input type="hidden" value="{{csrf_token()}}" id="desc_token"/>
                    <span class="c_edit dn"></span>
                    @if($res['r_desc'])
                        <div class="descriptionShow ">

                            {{$res['r_desc']}}

                        </div> <span class="c_edit"></span>
                        <div class="descriptionEdit dn">
                            <form class="descriptionForm">
                                <table>
                                    <tbody>
                                    <tr>
                                        <td colspan="2">
                                            <textarea class="selfDescription s_textarea" name="selfDescription"
                                                      placeholder=""></textarea>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <input type="submit" value="保 存" class="btn_profile_save">
                                            <a class="btn_profile_cancel" href="javascript:;">取 消</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </form>
                            <!--end .descriptionForm-->
                        </div>
                    @else
                        <span class="c_edit dn"></span>
                        <div class="descriptionShow "></div>
                        <div class="descriptionEdit dn">
                            <form class="descriptionForm">
                                <table>
                                    <tbody>
                                    <tr>
                                        <td colspan="2">
                                            <textarea class="selfDescription s_textarea" name="selfDescription"
                                                      placeholder=""></textarea>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <input type="submit" value="保 存" class="btn_profile_save">
                                            <a class="btn_profile_cancel" href="javascript:;">取 消</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </form>
                            <!--end .descriptionForm-->
                        </div>
                        <div class="descriptionAdd pAdd">
                            描述你的性格、爱好以及吸引人的经历等，<br>
                            让企业了解多元化的你！
                            <span>添加自我描述</span>
                        </div>


                    @endif
                </div>

                <div class="profile_box" id="worksShow">
                    <h2>作品展示</h2>

                    @if($works)
                        <span class="c_add"></span>

                        <div class="workShow">
                            @foreach($works as $v)


                                <div class="workList c7">
                                    <div class="f16">网址：<a target="_blank" href="{{$v['w_url']}}">{{$v['w_url']}}</a>
                                        <a href="javascript:;" class="workDel" wid="{{$v['w_id']}}"    style="font-size: 14px;">删除</a>
                                    </div>
                                    <p>{{$v['w_desc']}} </p>
                                </div>
                                <hr/>
                            @endforeach
                        </div>
                        <div class="workEdit dn">
                            <form class="workForm">
                                <input type="hidden" value="{{csrf_token()}}" id="token_work"/>
                                <table>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <input type="text" placeholder="请输入作品链接" id="workLink" name="workLink"
                                                   class="workLink">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <textarea maxlength="100" class="workDescription s_textarea"
                                                      id="workDescription" name="workDescription"
                                                      placeholder="请输入说明文字"></textarea>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="submit" value="保 存" class="btn_profile_save">
                                            <a class="btn_profile_cancel" href="javascript:;">取 消</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <input type="hidden" class="showId" value="">
                            </form>
                            <!--end .workForm-->
                        </div>
                        <div class="workAd dn">
                            <form class="workForm">
                                <input type="hidden" value="{{csrf_token()}}" id="token_work"/>
                                <table>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <input type="text" placeholder="请输入作品链接" name="workLink" class="workLink">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <textarea maxlength="100" class="workDescription s_textarea"
                                                      name="workDescription" placeholder="请输入说明文字"></textarea>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="submit" value="保 存" class="btn_profile_save">
                                            <a class="btn_profile_cancel" href="javascript:;">取 消</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <input type="hidden" class="showId" value="">
                            </form>
                            <!--end .workForm-->
                        </div>
                        <div class="workAdd pAdd dn">
                            好作品会说话！<br>
                            快来秀出你的作品打动企业吧！
                            <span>添加作品展示</span>
                        </div>
                    @else
                        <div class="c_add dn"></div>
                        <div class="workShow"></div>
                        <div class="workEdit dn">
                            <form class="workForm">
                                <input type="hidden" value="{{csrf_token()}}" id="token_work"/>
                                <table>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <input type="text" placeholder="请输入作品链接" name="workLink" class="workLink">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <textarea maxlength="100" class="workDescription s_textarea"
                                                      name="workDescription" placeholder="请输入说明文字"></textarea>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="submit" value="保 存" class="btn_profile_save">
                                            <a class="btn_profile_cancel" href="javascript:;">取 消</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <input type="hidden" class="showId" value="">
                            </form>
                            <!--end .workForm-->
                        </div>
                        <div class="workAd dn">
                            <form class="workForm">
                                <input type="hidden" value="{{csrf_token()}}" id="token_work"/>
                                <table>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <input type="text" placeholder="请输入作品链接" name="workLink" class="workLink">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <textarea maxlength="100" class="workDescription s_textarea"
                                                      name="workDescription" placeholder="请输入说明文字"></textarea>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="submit" value="保 存" class="btn_profile_save">
                                            <a class="btn_profile_cancel" href="javascript:;">取 消</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <input type="hidden" class="showId" value="">
                            </form>
                            <!--end .workForm-->
                        </div>
                        <div class="workAdd pAdd">
                            好作品会说话！<br>
                            快来秀出你的作品打动企业吧！
                            <span>添加作品展示</span>
                        </div>
                    @endif

                </div>
                <input type="hidden" id="resumeId" value="{{$res['r_id']}}">
            </div>
            <!--end .content_l-->
            <div class="content_r">
                <div class="mycenterR" id="myInfo">
                    <h2>我的信息</h2>
                    <!--  <a target="_blank" href="collections.html">我收藏的职位</a>
                     <br>
                     <a target="_blank" href="subscribe.html">我订阅的职位</a>
                     <br/> -->
                    <a target="_blank" href="{{url('remuseShow')}}">已投递的简历</a>
                </div>
                <!--end #myInfo-->

                {{--<div class="mycenterR" id="myResume">--}}
                {{--<h2>我的附件简历--}}
                {{--<a title="上传附件简历" href="#uploadFile" class="inline cboxElement">上传简历</a>--}}
                {{--</h2>--}}

                {{--<div class="resumeUploadDiv">--}}
                {{--暂无附件简历--}}
                {{--</div>--}}
                {{--</div>--}}
                <!--end #myResume-->

                {{--<div class="mycenterR" id="resumeSet">--}}
                {{--<h2>投递简历设置 <span>修改设置</span></h2>--}}
                {{--<!-- -1 (0=附件， 1=在线， 其他=未设置) -->--}}
                {{--<div class="noSet set0 dn">默认使用<span>附件简历</span>进行投递</div>--}}
                {{--<div class="noSet set1 dn">默认使用<span>在线简历</span>进行投递</div>--}}
                {{--<div class="noSet">暂未设置默认投递简历</div>--}}
                {{--<input type="hidden" class="defaultResume" value="-1">--}}

                {{--<form class="dn" id="resumeSetForm">--}}
                {{--<label><input type="radio" value="1" class="resume1"--}}
                {{--name="resume">默认使用<span>在线简历</span>进行投递</label>--}}
                {{--<label><input type="radio" value="0" class="resume0"--}}
                {{--name="resume">默认使用<span>附件简历</span>进行投递</label>--}}
                {{--<span class="setTip error"></span>--}}

                {{--<div class="resumeTip">设置后投递简历时将不再提醒</div>--}}
                {{--<input type="submit" value="保 存" class="btn_profile_save">--}}
                {{--<a class="btn_profile_cancel" href="javascript:;">取 消</a>--}}
                {{--</form>--}}
                {{--</div>--}}
                <!--end #resumeSet-->

                {{--<div class="mycenterR" id="myShare">--}}
                    {{--<h2>当前每日投递量：10个</h2>--}}
                    {{--<a target="_blank" href="h/share/invite.html">邀请好友，提升投递量</a>--}}
                {{--</div>--}}
                <!--end #myShare-->


            </div>
            <!--end .content_r-->
        </div>

        <input type="hidden" id="userid" name="userid" value="{{$res['r_id']}}">

        <!-------------------------------------弹窗lightbox ----------------------------------------->
        <div style="display:none;">
            <!-- 上传简历 -->
            <div class="popup" id="uploadFile">
                <table width="100%">
                    <tbody>
                    <tr>
                        <td align="center">
                            <form>
                                <input type="hidden" value="{{csrf_token()}}" id="popup_token"/>
                                <a class="btn_addPic" href="javascript:void(0);">
                                    <span>选择上传文件</span>
                                    <input type="file"
                                           onchange="file_check(this,'{{url('enclosureAdd')}}','resumeUpload')"
                                           class="filePrew" id="resumeUpload" name="newResume" size="3"
                                           title="支持word、pdf、ppt、txt、wps格式文件，大小不超过10M" tabindex="3">
                                </a>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td align="left">支持word、pdf、ppt、txt、wps格式文件<br>文件大小需小于10M</td>
                    </tr>
                    <tr>
                        <td align="left" style="color:#dd4a38; padding-top:10px;">注：若从其它网站下载的word简历，请将文件另存为.docx格式后上传
                        </td>
                    </tr>
                    <tr>
                        <td align="center"><img width="55" height="16" alt="loading" style="visibility: hidden;"
                                                id="loadingImg" src="style/images/loading.gif"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!--/#uploadFile-->

            <!-- 简历上传成功 -->
            <div class="popup" id="uploadFileSuccess">
                <h4>简历上传成功！</h4>
                <table width="100%">
                    <tbody>
                    <tr>
                        <td align="center"><p>你可以将简历投给你中意的公司了。</p></td>
                    </tr>
                    <tr>
                        <td align="center"><a class="btn_s" href="javascript:;">确&nbsp;定</a></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!--/#uploadFileSuccess-->

            <!-- 没有简历请上传 -->
            <div class="popup" id="deliverResumesNo">
                <table width="100%">
                    <tbody>
                    <tr>
                        <td align="center"><p class="font_16">你在拉勾还没有简历，请先上传一份</p></td>
                    </tr>
                    <tr>
                        <td align="center">
                            <form>
                                <a class="btn_addPic" href="javascript:void(0);">
                                    <span>选择上传文件</span>
                                    <input type="file"
                                           onchange="file_check(this,'h/nearBy/updateMyResume.json','resumeUpload1')"
                                           class="filePrew" id="resumeUpload1" name="newResume" size="3"
                                           title="支持word、pdf、ppt、txt、wps格式文件，大小不超过10M">
                                </a>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">支持word、pdf、ppt、txt、wps格式文件，大小不超过10M</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!--/#deliverResumesNo-->

            <!-- 上传附件简历操作说明-重新上传 -->
            <div class="popup" id="fileResumeUpload">
                <table width="100%">
                    <tbody>
                    <tr>
                        <td>
                            <div class="f18 mb10">请上传标准格式的word简历</div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="f16">
                                操作说明：<br>
                                打开需要上传的文件 - 点击文件另存为 - 选择.docx - 保存
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <a title="上传附件简历" href="#uploadFile" class="inline btn cboxElement">重新上传</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!--/#fileResumeUpload-->

            <!-- 上传附件简历操作说明-重新上传 -->
            <div class="popup" id="fileResumeUploadSize">
                <table width="100%">
                    <tbody>
                    <tr>
                        <td>
                            <div class="f18 mb10">上传文件大小超出限制</div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="f16">
                                提示：<br>
                                单个附件不能超过10M，请重新选择附件简历！
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <a title="上传附件简历" href="#uploadFile" class="inline btn cboxElement">重新上传</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!--/#deliverResumeConfirm-->

        </div>
        <!------------------------------------- end ----------------------------------------->

        <script src="{{env('APP_HOST')}}/style/js/Chart.min.js" type="text/javascript"></script>
        <script src="{{env('APP_HOST')}}/style/js/profile.min.js" type="text/javascript"></script>
        <!-- <div id="profileOverlay"></div> -->
        <div class="" id="qr_cloud_resume" style="display: none;">
            <div class="cloud">
                <img width="134" height="134" src="">
                <a class="close" href="javascript:;"></a>
            </div>
        </div>

        <div class="clear"></div>
        <input type="hidden" value="{{csrf_token()}}" id="resubmitToken">
        <a rel="nofollow" title="回到顶部" id="backtop" style="display: none;"></a>
    </div>

@endsection

{{--基本信息验证--}}

<script type="text/javascript">
    var URL='{{url('/')}}';
    $(function () {
        $('#noticeDot-1').hide();
        $('#noticeTip a.closeNT').click(function () {
            $(this).parent().hide();
        });
    });
    var index = Math.floor(Math.random() * 2);
    var ipArray = new Array('42.62.79.226', '42.62.79.227');

    var CallCenter = {
        init: function (url) {
            var _websocket = new WebSocket(url);
            _websocket.onopen = function (evt) {
                console.log("Connected to WebSocket server.");
            };
            _websocket.onclose = function (evt) {
                console.log("Disconnected");
            };
            _websocket.onmessage = function (evt) {
                //alert(evt.data);
                var notice = jQuery.parseJSON(evt.data);
                if (notice.status[0] == 0) {
                    $('#noticeDot-0').hide();
                    $('#noticeTip').hide();
                    $('#noticeNo').text('').show().parent('a').attr('href', ctx + '/mycenter/delivery.html');
                    $('#noticeNoPage').text('').show().parent('a').attr('href', ctx + '/mycenter/delivery.html');
                } else {
                    $('#noticeDot-0').show();
                    $('#noticeTip strong').text(notice.status[0]);
                    $('#noticeTip').show();
                    $('#noticeNo').text('(' + notice.status[0] + ')').show().parent('a').attr('href', ctx + '/mycenter/delivery.html');
                    $('#noticeNoPage').text(' (' + notice.status[0] + ')').show().parent('a').attr('href', ctx + '/mycenter/delivery.html');
                }
                $('#noticeDot-1').hide();
            };
            _websocket.onerror = function (evt) {
                console.log('Error occured: ' + evt);
            };
        }
    };
    //    CallCenter.init(url);
</script>

<div id="cboxOverlay" style="display: none;"></div>
<div id="colorbox" class="" role="dialog" tabindex="-1" style="display: none;">
    <div id="cboxWrapper">
        <div>
            <div id="cboxTopLeft" style="float: left;"></div>
            <div id="cboxTopCenter" style="float: left;"></div>
            <div id="cboxTopRight" style="float: left;"></div>
        </div>
        <div style="clear: left;">
            <div id="cboxMiddleLeft" style="float: left;"></div>
            <div id="cboxContent" style="float: left;">
                <div id="cboxTitle" style="float: left;"></div>
                <div id="cboxCurrent" style="float: left;"></div>
                <button type="button" id="cboxPrevious"></button>
                <button type="button" id="cboxNext"></button>
                <button id="cboxSlideshow"></button>
                <div id="cboxLoadingOverlay" style="float: left;"></div>
                <div id="cboxLoadingGraphic" style="float: left;"></div>
            </div>
            <div id="cboxMiddleRight" style="float: left;"></div>
        </div>
        <div style="clear: left;">
            <div id="cboxBottomLeft" style="float: left;"></div>
            <div id="cboxBottomCenter" style="float: left;"></div>
            <div id="cboxBottomRight" style="float: left;"></div>
        </div>
    </div>
    <div style="position: absolute; width: 9999px; visibility: hidden; display: none;"></div>
</div>
<script>

    function img_check(a, b, c) {
        var myimg = $('#myimg');
        var a = $("#" + c);
        var _token = $("#resubmitToken").val();
        this.AllowExt = ".jpg,.gif,.jpeg,.png,.pjpeg", this.FileExt = a.val().substr(a.val().lastIndexOf(".")).toLowerCase(), 0 != this.AllowExt && -1 == this.AllowExt.indexOf(this.FileExt) ? errorTips("只支持jpg、gif、png、jpeg格式，请重新上传", "上传头像") : ($("#" + c + "_error").text("").hide(), $.ajaxFileUpload({
            url: b,
            secureuri: !1,
            fileElementId: c,
            data: {headPic: a.val(), _token: _token},
            dataType: "json",
            success: function (msg) {
                if (msg != 0) {

                    myimg.attr('src', msg.responseText);
                } else {
                    location.href = 'resumeList'
                }
            },
            error: function (msg) {
                if (msg != 0) {
                    myimg.attr('src', msg.responseText);
                } else {
                    location.href = 'resumeList';
                }
            }
        }))
    }
    /**
     * 删除 期望工作
     * @param id
     */
    function expectedDel(id){
        $.ajax({
            type:'GET',
            url:"{{url('expectedDel')}}",
            data:{expectedId:id},
            success:function(msg){
                if(msg==1){
                $('#expectJob .expectShow').addClass('dn');
                $('#expectJob .c_edit').addClass('dn');
                $('#expectJob .expectAdd').removeClass('dn');
                }else{
                    $('#expectJob h2').html('删除失败')
                }
            }
        })
    }
    /**
     * 删除 教育背景
     * @param id
     */
    function schoolDel(id){
        $.ajax({
            type:'GET',
            url:"{{url('schoolDel')}}",
            data:{schoolId:id},
            success:function(msg){
                if(msg==1){
                    $('#educationalBackground .educationalShow').addClass('dn');
                    $('#educationalBackground .c_edit').addClass('dn');
                    $('#educationalBackground .educationalAdd').removeClass('dn');
                }else{
                    $('#educationalBackground h2').html('删除失败')
                }
            }
        })
    }
    /**
     * 删除 作品
     * @param id
     */
    $(function () {

        $(document).delegate('.workDel', 'click', function () {
            var wid = $(this).attr('wid');
            _this = $(this)
            $.ajax({
                type: 'GET',
                url: "{{url('worksDel')}}",
                data: {workId: wid},
                success: function (msg) {
                    if (msg == 1) {
                        $('#worksShow .workShow').addClass('dn');
                        $('#worksShow .c_add').addClass('dn');
                        $('#worksShow .workAdd').removeClass('dn');
                    } else if (msg == 2) {
                        _this.parents('.workList').remove();
                    } else {
                        $('#worksShow h2').html('删除失败')
                    }
                }
            })
        })

        $(document).delegate('.porjectDel', 'click', function () {
            var pid = $(this).attr('pid');
            _this = $(this)
            $.ajax({
                type: 'GET',
                url: "{{url('porjectDel')}}",
                data: {porjectId: pid},
                success: function (msg) {
                    if (msg == 1) {
                        $('#projectExperience .projectShow').addClass('dn');
                        $('#projectExperience .c_add').addClass('dn');
                        $('#projectExperience .projectAdd').removeClass('dn');
                    } else if (msg == 2) {
                        _this.parents('.plist ').remove();
                    } else {
                        $('#projectExperience h2').html('删除失败')
                    }
                }
            })
        })

        {{--$(document).delegate('#projectExperience .c_edit','click',function(){--}}
            {{--var pid=$(this).attr('pid');--}}
            {{--var token='{{csrf_token()}}';--}}
            {{--$.ajax({--}}
                {{--type: 'GET',--}}
                {{--url: "{{url('porjectSel')}}",--}}
                {{--data: {pid: pid},--}}
                {{--dataType:'json',--}}
                {{--success: function (msg) {--}}
                   {{--html=''--}}
                    {{--html+='<form class="projectForm">';--}}
                    {{--html+='<input type="hidden" name="porjectId" id="porjectId" value='+msg['p_id']+'>'--}}
                    {{--html+='<input type="hidden" name="project_token" id="project_token" value="'+token+'"/>';--}}
                    {{--html+='<table><tbody><tr> <td valign="top">';--}}
                    {{--html+='<span class="redstar">*</span></td> <td>';--}}
                    {{--html+='<input type="text" value='+msg['p_name']+' placeholder="项目名称" name="projectName" class="projectName">';--}}
                    {{--html+='</td> <td valign="top"> <span class="redstar">*</span> </td> <td>';--}}
                    {{--html+='<input type="text" placeholder="担任职务，如：产品负责人" value='+msg['p_duties']+' name="thePost" class="thePost">';--}}
                    {{--html+='</td> </tr> <tr> <td valign="top"> <span class="redstar">*</span> </td> <td> <div class="fl">';--}}
                    {{--html+='<input type="hidden" class="projectYearStart" value="" name="projectYearStart">';--}}
                    {{--html+='<input type="button" value="开始年份"class="profile_select_139 profile_select_normal select_projectYearStart">';--}}
                    {{--html+='<div class="box_projectYearStart  boxUpDown boxUpDown_139 dn"style="display: none;"> <ul>';--}}
                    {{--for(var i=2016; i>1969; i--){--}}
                     {{--html+='<li>'+i+'</li>'--}}
                    {{--}--}}
                    {{--html+='</ul> </div> </div> <div class="fl"> <input type="hidden" class="projectMonthStart" value="" name="projectMonthStart">';--}}
                    {{--html+='<input type="button" value="开始月份"class="profile_select_139 profile_select_normal select_projectMonthStart">';--}}
                    {{--html+='<div style="display: none;"class="box_projectMonthStart boxUpDown boxUpDown_139 dn"> <ul>';--}}
                    {{--for(var v=1; v<13; v++){--}}
                        {{--html+='<li>'+v+'</li>'--}}
                    {{--}--}}
                    {{--html+='</ul></div></div><div class="clear"></div> </td> <td valign="top"> <span class="redstar">*</span> </td> <td> <div class="fl">';--}}
                    {{--html+='<input type="hidden" class="projectYearEnd" value="" name="projectYearEnd">';--}}
                    {{--html+='<input type="button" value="结束年份" class="profile_select_139 profile_select_normal select_projectYearEnd">';--}}
                    {{--html+='<div class="box_projectYearEnd  boxUpDown boxUpDown_139 dn"style="display: none;">';--}}
                    {{--html+='<ul> <li>至今</li>';--}}
                    {{--for(var i=2016; i>1969; i--){--}}
                        {{--html+='<li>'+i+'</li>'--}}
                    {{--}--}}
                    {{--html+='</ul></div> </div> <div class="fl"> <input type="hidden" class="projectMonthEnd" value="" name="projectMonthEnd">';--}}
                    {{--html+='<input type="button" value="结束月份" class="profile_select_139 profile_select_normal select_projectMonthEnd">';--}}
                    {{--html+='<div style="display: none;"class="box_projectMonthEnd boxUpDown boxUpDown_139 dn"> <ul>';--}}
                    {{--for(var v=1; v<13; v++){--}}
                        {{--html+='<li>'+v+'</li>'--}}
                    {{--}--}}
                    {{--html+='</ul></div></div><div class="clear"></div></td></tr><tr><td valign="top"></td><td colspan="3">'--}}
                    {{--html+='<textarea class="projectDescription s_textarea" name="projectDescription" placeholder="项目描述">'+msg['p_desc']+'</textarea>';--}}
                    {{--html+='</td> </tr><tr><td valign="top"></td><td colspan="3">';--}}
                    {{--html+='<input type="submit" value="保 存" class="btn_profile_save">';--}}
                    {{--html+='<a class="btn_profile_cancel" href="javascript:;">取 消</a>';--}}
                    {{--html+='</td> </tr> </tbody> </table> <input type="hidden" value="" class="projectId"> </form>'--}}
                    {{--$('#projectExperience .projectShow').addClass('dn');--}}
                    {{--$('#projectExperience .c_add').addClass('dn');--}}
                    {{--$('#projectExperience .projectEd').removeClass('dn').html(html);--}}
                    {{--$('#projectExperience .projectShow').addClass('dn');--}}
                {{--}--}}
            {{--})--}}
        {{--})--}}
    })
</script>