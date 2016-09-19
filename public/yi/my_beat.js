$(function () {

    //期望工作--开始
    window.onload = function () {
        var $li = $('#tipshow li');
        var $ul = $('#diy ul');

        $li.click(function () {
            var $this = $(this);
            var $t = $this.index();
            $li.removeClass('active');
            $this.addClass('active');
            $ul.siblings('ul').removeClass('active');
            $ul.eq($t).addClass('active');
        })
    }

    //选择期望工作
    $('#diy ul li').click(function () {

        var $this = $(this);
        var classname = $this.find('label').attr('class');
        if (classname == 'radio-expectPosition') {
            $this.find('label').addClass('checked');
            $this.find('input').attr('checked', 'checked')
        } else {
            $this.find('label').removeClass('checked');
            $this.find('input').removeAttr('checked')
        }
    })

    //--期望工作结束--

    //发送短信
    $(document).delegate('#phoneCode', 'click', function () {

        var phoneNumber = $('#phoneNumber').val();
        if (phoneNumber == '') {
//            alert('手机号不能为空')
            $('#phoneError').html('手机号不能为空')
            return false;
        }
        $.ajax({
            type: 'get',
            url: 'beatPhone',
            data: {phoneNumber: phoneNumber},
            success: function (msg) {
            }
        });
        var wait = 60;

        function time(o) {
            if (wait == 0) {
                o.removeAttribute("disabled");
                o.value = "获取验证码";
                wait = 60;
            } else {
                o.setAttribute("disabled", true);
                o.value = wait + "秒后可重新发送";
                wait--;
                setTimeout(function () {
                        time(o)
                    },
                    1000)
            }
        };
        time(this)
    })

    //发送短信结束--


    //鼠标滑过显示自我介绍模板
    $('#intro_content').mousemove(function () {
        $('.self-intro-demo').css('display', 'block');
    })

    $('#intro_content').mouseleave(function () {
        $('.self-intro-demo').css('display', 'none');
    })

    //自我介绍显示模板结束


//显示滑过介绍    1  2   3   4
    $('.item').mousemove(function () {
        $(this).find('div').show();
    })

    $('.item').mouseleave(function () {
        $(this).find('div').hide();
    })

// 滑过介绍结束   1  2  3   4

    //验证登录
    $('#beatHome').validate({
        rules: {
            userName: {
                required: true,
                minlength: 2
            },
            beatSex: {
                required: true
            },
            field: {
                required: true
            },
            workYear: {
                required: true
            },
            phoneNumber: {
                required: true
            },
            phoneCodes: {
                required: true,
                remote: {
                    url: "codePro",     //后台处理程序
                    type: "get"
                }
            },
            email: {
                required: true,
                email: true
            },
            salary_start: {
                required: true,
                digits: true,
                max: 100,
                pk: 'salary_end'
            },
            salary_end: {
                required: true,
                digits: true,
                vs: 'salary_start',
                end: 'salary_start'
            },
            currentSalary: {
                digits: true
            },
            paidMonth: {
                max: 24
            },
            jobIntention: {
                required: true
            },
            beat_content: {
                required: true,
                rangelength: [30, 200]
            }
        },
        messages: {
            userName: {
                required: "<font color='red'>账号必填</font>",
                minlength: "<font color='red'>不能小于2位</font>"
            },
            beatSex: {
                required: "<font color='red'>请选择性别</font>"
            },
            field: {
                required: "<font color='red'>请选择期望工作</font>"
            },
            workYear: {
                required: "<font color='red'>请选择项目经验</font>"
            },
            phoneNumber: {
                required: "<font color='red'>请输入手机号</font>"
            },
            phoneCodes: {
                required: "<font color='red'>请输入验证码</font>",
                remote: "<font color='red'>验证码不正确</font>"

            },
            email: {
                required: "<font color='red'>请输入邮箱</font>",
                email: "<font color='red'>请输入一个正确的邮箱</font>"
            },
            salary_start: {
                required: "<font color='red'>最低期望月薪</font>",
                digits: "<font color='red'>必须是整数</font>",
                max: "<font color='red'>必须是1~100整数</font>"
            },
            salary_end: {
                required: "<font color='red'>最高期望月薪</font>",
                digits: "<font color='red'>必须是整数</font>"

            },
            currentSalary: {
                digits: "<font color='red'>必须是整数</font>"
            },
            paidMonth: {
                max: "<font color='red'>1~24个月</font>"
            },
            jobIntention: {
                required: "<font color='red'>请选择求职意向</font>"
            },
            beat_content: {
                required: "<font color='red'>请填写自我介绍</font>",
                rangelength: "<font color='red'>自我介绍应在30-200字</font>"
            }
        }
    })

    jQuery.validator.addMethod("pk", function (a, b, c) {
        var vs = $('input[name=' + c + ']').val();
        if (vs > a * 2) {
            return false;
        } else {
            return true;
        }
    }, $.validator.format("<font color='red'>最高月薪不能大于最低月薪的2倍</font>"));


    jQuery.validator.addMethod("vs", function (a, b, c) {
        var vs = $('input[name=' + c + ']').val();
        if (vs * 2 < a) {
            return false;
        } else {
            return true;
        }
    }, $.validator.format("<font color='red'>最高月薪不能大于最低月薪的2倍</font>"));

    jQuery.validator.addMethod("end", function (a, b, c) {
        var vs = $('input[name=' + c + ']').val();
        if (vs > a) {
            return false;
        } else {
            return true;
        }
    }, $.validator.format("<font color='red'>最高月薪不能低于最低月薪</font>"));

})