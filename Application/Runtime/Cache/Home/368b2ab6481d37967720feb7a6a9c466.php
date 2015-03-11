<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <script type="text/javascript">
        var SITE_URL = "http://localhost";
        var REAL_SITE_URL = "http://localhost";
        var PRICE_FORMAT = '¥%s';
    </script>
    <title>餐谋长商城</title>
    <meta name="keywords" content="餐谋长商城, 健康食品, 生态农产品, 生鲜, 电商, 农场直供" />
    <link href="/Public/default/css/register.css" type="text/css" rel="stylesheet">
    <script src="/Public/default/js/jquery.js" type="text/javascript"></script>
    <script src="/Public/default/js/jquery.validate.js" type="text/javascript"></script>
</head>
<body>
<div align="center" class="top">
    <div class="logo" align="left">
        <a href="/"><img alt="优倍商城-有机 健康 原产地" title="返回首页" src="/Public/default/images/logo.png" height="100px" width="350px"/></a>
    </div>
</div>
<form id="fvmaskForm" name="fvmaskForm" onsubmit="return false;">
    <div id="fvmask">
        <div class="mask_bg"></div>
        <div class="main_panel">
            <div class="modal-header"><span data-dismiss="modal" class="close"></span>

                <h3>图片验证码</h3></div>
            <div class="img_wrapper mid"><img id="img_code" src="index.php?app=captcha&act=tokencaptcha&amp;32073"
                                              onclick="this.src = this.src + '&_=' + new Date().getTime()"/></div>
            <div class="img_reload">看不清换一张</div>
            <div class="mid t2_input">
                <input id="ticketin" class="input_kuang code-area errortip item val_m" type="text" autocomplete="off"
                       isrequired="true" name="ticketin" placeholder="请输入图形中的字符，不区分大小写"/>
                <span class="tips_field" style="width:200px;">
                	<label class="remind">请输入图片中的文字,点击图片可更换</label>
                </span>
                <span id="checking_ticket" style="left:175px;" class="checking"></span>
            </div>
            <div class="mid smt_wrapper sub_bg"><input class="no_bg" type="submit" value="提交" id="further_veri"/></div>
        </div>
    </div>
</form>
<div class="suc_content reg-account">
    <div class="suc_kuang">
        <div class="hei_513">
            <h4 class="h4_suc">注册帐号</h4>
            <p class="suc_p">优倍帐号能使用优倍商城、优倍网、优倍周边和优倍的其他服务。如果您已拥有优倍帐号，则可
                <a href="index.php?app=member&amp;act=login&amp;ret_url=http%3A%2F%2Fwww.ubive.com%2F"
                   class="cor_yellow">立即登录</a>
            </p>
            <div class="radio_quyu">
            </div>
            <form name="regByEmail" id="regByEmail" method="post" action=''>
                <dl class="login-dl clearfix">
                    <dt class="dt_l">电子邮箱：</dt>
                    <dd class="dd_r" id="emailInner">
                        <input type="text" name="email" id="emailInp" class="input_kuang val_m item errortip address"
                               value="" isrequired="true" autocomplete="off"/>
                    <span class="tips_field">
                        <label class="remind">请输入一个有效的电子邮箱地址</label>
                    </span>
                        <span id="checking_email" class="checking"></span>
                    </dd>
                    <dt class="dt_l">设置密码：</dt>
                    <dd class="dd_r dd_r_pos" id="pwdTd">
                        <input type="password" class="input_kuang item val_m errortip password" id="password"
                               name="password" isrequired="true" autocomplete="off"/>
                    <span class="tips_field">
                        <label class="remind">您的密码</label>
                    </span>
                    </dd>
                    <dt class="dt_l">确认密码：</dt>
                    <dd class="dd_r">
                        <input type="password" class="input_kuang val_m item errortip" name="repassword" id="repassword"
                               isrequired="true" autocomplete="off"/>
                    <span class="tips_field">
                        <label class="remind">重复输入您的密码</label>
                    </span>
                    </dd>
                    <dt class="dt_l" style="margin-top:10px;">验证码：</dt>
                    <dd class="dd_r" style="margin-top:10px;">
                        <input id="imginput" type="text" class="input_kuang val_m item errortip checkcode"
                               name="captcha" isrequired="true" autocomplete="off"/>
                        <img src="index.php?app=captcha&amp;32073"
                             onclick="this.src = this.src + '&_=' + new Date().getTime()" height="34px" title="点击换一张"/>
                    <span class="tips_field">
                        <label class="remind">请输入图片中的文字,点击图片可更换</label>
                    </span>
                        <span id="checking_captcha" style="left:115px;" class="checking"></span>
                    </dd>
                    <dt class="dt_l">&nbsp;</dt>
                    <dd class="dd_r la_height clearfix">
                        <div class="flt_l">
                            <input type="submit" name="regbyemailbtn" id="regbyemailbtn"
                                   class="short_button button orange" value="立即注册"/>
                        </div>
                    </dd>
                </dl>
            </form>
            <div class="agreement_area">
                <p class="p_cor_hui">点击“立即注册”，即表示您同意并愿意遵守优倍<a href="index.php?app=article&amp;act=system&amp;code=eula"
                                                              class="cor_yellow" target="_blank">用户协议</a>和<a
                        href="index.php?app=article&amp;act=system&amp;code=eula" class="cor_yellow" target="_blank">隐私政策</a>
                </p>
            </div>
            <div class="blank_area"></div>
        </div>
        <div align="center" class="suc_botm">
            <div class="backtohome">
                <a href="/">
                    <img alt="优倍商城-有机 健康 原产地" title="返回首页" src="/Public/default/images/home.png" width="36px" height="36px" border="0"/>
                </a>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(function () {
    $('#fvmaskForm').validate({
        errorPlacement: function (error, element) {
            var error_area = element.parent().find('.tips_field');
            error_area.html('');
            error_area.append(error);
        },
        success: function (label) {
            label.addClass('validate_right').text('.');
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass(errorClass).removeClass(validClass);
            $(element.form).find("label[for=" + element.id + "]").removeClass('validate_right');
        },
        submitHandler: function (form) {
            //form.submit();
            sendSMS();
            $('#fvmask').hide();
        },
        onkeyup: false,
        rules: {
            ticketin: {
                required: true,
                rangelength: [4, 4, 'utf-8'],
                remote: {
                    url: 'index.php?app=captcha&act=check_tokencaptcha&ajax=1',
                    type: 'get',
                    data: {
                        captcha: function () {
                            return $('#ticketin').val();
                        }
                    },
                    beforeSend: function () {
                        $('#checking_ticket').show();
                    },
                    complete: function () {
                        $('#checking_ticket').hide();
                    }
                }
            }
        },
        messages: {
            ticketin: {
                required: '请输入图片中的文字',
                rangelength: '验证码错误',
                remote: '验证码错误'
            }
        }
    });

    $('#regByEmail').validate({
        errorPlacement: function (error, element) {
            var error_area = element.parent().find('.tips_field');
            error_area.html('');
            error_area.append(error);
        },
        success: function (label) {
            label.addClass('validate_right').text('.');
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass(errorClass).removeClass(validClass);
            $(element.form).find("label[for=" + element.id + "]").removeClass('validate_right');
        },
        submitHandler: function (form) {
            form.submit();
        },
        onkeyup: false,
        rules: {
            email: {
                required: true,
                email: true,
                remote: {
                    url: 'index.php?app=member&act=check_user&ajax=1',
                    type: 'get',
                    data: {
                        user_name: function () {
                            return $('#emailInp').val();
                        }
                    },
                    beforeSend: function () {
                        $('#checking_email').show();
                    },
                    complete: function () {
                        $('#checking_email').hide();
                    }
                }
            },
            password: {
                required: true,
                minlength: 6
            },
            repassword: {
                required: true,
                equalTo: '#password'
            },
            captcha: {
                required: true,
                rangelength: [4, 4, 'utf-8'],
                remote: {
                    url: 'index.php?app=captcha&act=check_captcha&ajax=1',
                    type: 'get',
                    data: {
                        captcha: function () {
                            return $('#imginput').val();
                        }
                    },
                    beforeSend: function () {
                        $('#checking_captcha').show();
                    },
                    complete: function () {
                        $('#checking_captcha').hide();
                    }
                }
            }
        },
        messages: {
            email: {
                required: '您必须提供您的电子邮箱',
                email: '这不是一个有效的电子邮箱',
                remote: '您提供的用户名已存在'
            },
            password: {
                required: '您必须提供一个密码',
                minlength: '密码长度应在6-20个字符之间'
            },
            repassword: {
                required: '您必须再次确认您的密码',
                equalTo: '两次输入的密码不一致'
            },
            captcha: {
                required: '请输入图片中的文字',
                rangelength: '验证码错误',
                remote: '验证码错误'
            }
        }
    });

    $('#regByPhone').validate({
        errorPlacement: function (error, element) {
            var error_area = element.parent().find('.tips_field');
            error_area.html('');
            error_area.append(error);
        },
        success: function (label) {
            label.addClass('validate_right').text('.');
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass(errorClass).removeClass(validClass);
            $(element.form).find("label[for=" + element.id + "]").removeClass('validate_right');
        },
        submitHandler: function (form) {
            form.submit();
        },
        onkeyup: false,
        rules: {
            phoneNum: {
                required: true,
                rangelength: [11, 11, 'utf-8'],
                remote: {
                    url: 'index.php?app=member&act=check_user&ajax=1',
                    type: 'get',
                    data: {
                        user_name: function () {
                            return $('#phoneNum').val();
                        }
                    },
                    beforeSend: function () {
                        $('#checking_phone').show();
                    },
                    complete: function () {
                        $('#checking_phone').hide();
                    }
                }
            },
            phonecaptcha: {
                required: true,
                rangelength: [6, 6, 'utf-8'],
                remote: {
                    url: 'index.php?app=captcha&act=check_phonecaptcha&ajax=1',
                    type: 'get',
                    data: {
                        phone: function () {
                            return $('#phoneNum').val();
                        },
                        phonecaptcha: function () {
                            return $('#phonecaptcha').val();
                        }
                    },
                    beforeSend: function () {
                        $('#checking_phonecaptcha').show();
                    },
                    complete: function () {
                        $('#checking_phonecaptcha').hide();
                    }
                }
            },
            phonepassword: {
                required: true,
                minlength: 6
            },
            rephonepassword: {
                required: true,
                equalTo: '#phonepassword'
            }
        },
        messages: {
            phoneNum: {
                required: '请输入有效的手机号码',
                rangelength: '不是有效的手机号码',
                remote: '该手机已经注册了，请用此号码登录'
            },
            phonecaptcha: {
                required: '请输入短信验证码',
                rangelength: '验证码不正确',
                remote: '验证码不正确'
            },
            phonepassword: {
                required: '您必须提供一个密码',
                minlength: '密码长度应在6-20个字符之间'
            },
            rephonepassword: {
                required: '您必须再次确认您的密码',
                equalTo: '两次输入的密码不一致'
            }
        }
    });

    /* fvmask */
    $('.img_reload').click(function () {
        var t_src = $('#img_code').attr('src') + '&_=' + new Date().getTime();
        $('#img_code').attr('src', t_src);
    });

    $('.modal-header .close').click(function () {
        $('#fvmask').hide();
    });

    $("#sendRegister").bind('click', function () {
        var me = $(this);
        if (me.hasClass("noSend")) {
            return false;
        }
        var myAttr = me.attr('disabled');
        if (!!myAttr) {
            return false
        }
        ;
        var phoneValue = $("#phoneNum").val();
        var regnumber = /^(1[0-9]{10})$/
        if (phoneValue.length == 0 || phoneValue == null) {
            show_msg("请输入手机号码");
            $("#phoneNum").focus();
            return false;
        }
        else if (phoneValue.length != 11 || !regnumber.test(phoneValue)) {
            show_msg("输入的手机号码格式不正确！");
            $("#phoneNum").focus();
            return false;
        }
        $('#fvmask').show();
        reloadtokenimg();
        return false;
    });

    //tips show and hide
    $('#security_tips, #open_security_tips').click(function (e) {
        e.stopPropagation();
    });

    $(document.body).click(function () {
        $('#security_tips').hide();
    });

    //这个是选择表单部分
    $(".Mradio").bind("click", function () {
        var clickFor = $(this).attr("clickFor");
        $(".login-dl").hide();
        $(clickFor + " dl").show();
    });

    $("#tab2").click();
})();
</script>
<script src="/Public/default/js/register.js" type="text/javascript"></script>
<div align="center">
    <div align="center" class="footer">
        <ul class="links">
            <li class="copyright"><span>优倍商城版权所有-京ICP备12036892号</span></li>
        </ul>
    </div>
</div>
</body>
</html>