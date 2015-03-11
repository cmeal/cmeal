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
</head>
<body>
<div align="center" class="top">
    <div class="logo" align="left">
        <a href="/"><img alt="优倍商城-有机 健康 原产地" title="返回首页" src="/Public/default/images/logo.png" height="100px" width="350px"/></a>
    </div>
</div>
<div align="center" class="suc_content">
    <div class="suc_kuang">
        <div align="center" class="login_input_area">
            <div class="login_con">
                <form method="post" id="login_form">
                    <div class="shake-area" id="shake_area" style="z-index:200;">
                        <div class="notice_area">
                            <span id="span_error_info" class="error"></span>
                        </div>
                        <div class="enter-area" style="z-index:30;">
                            <input type="text" class="enter-item first-enter-item" id="user_name" name="user_name"
                                   value="" placeholder="手机号码/邮箱/用户名"/>
                            <span class="inputicon inputicon_user"></span>
                            <span onclick="$('#security_tips').toggle();" title="点击查看帐号安全指示"
                                  class="prevnum_info check_tips"
                                  style="width:auto; display:inline; position: absolute; cursor: pointer; right:10px;top:6px;"
                                  id="open_security_tips"></span>

                            <div style="padding:20px;left:0px;top:-80px;display:none;z-index:100;position:absolute;background:rgb(236,236,236);border:1px solid #d9d9d9;width:290px;text-align:left;"
                                 id="security_tips">
                                <div style="position:absolute;right:10px;top:10px;cursor:pointer;"
                                     onclick="$('#security_tips').hide();">关闭
                                </div>
                                <h1 style="font-size:24px;">登录账号提示</h1>

                                <p><b style="font-weight:bold;">帐号安全提示</b></p>
                                <ol style="list-style-type:decimal;list-style-position:inside;line-height:20px;">
                                    <li>可以使用手机号码、电子邮箱登录，也可以直接输入用户名登录。</li>
                                    <li>输入手机号码或邮箱后系统提示没有此用户，可能是还没有完成绑定，请登陆后进行绑定。</li>
                                    <li>如果忘记了用户名，建议输入手机号码或常用邮箱试试。</li>
                                    <li>用户名正确，但想不起来密码了，请点击下面的“忘记密码”进行密码重置。</li>
                                    <li>如果确信曾经用过优倍商城，但用户名和密码都不记得了，请联系客服找回。</li>
                                    <li>请及时更新绑定的手机、邮箱，确保手机，邮箱是你本人正常使用的。</li>
                                </ol>
                            </div>

                        </div>
                        <div class="enter-area" style="z-index:20;">
                            <input type="password" class="enter-item last-enter-item" id="password" name="password"
                                   placeholder="密码"/>
                            <span class="inputicon inputicon_pwd"></span>
                        </div>
                    </div>
                    <div class="button_area">
                        <input class="button orange" type="button" name="Submit" id="Submit" value="立即登录"/>
                        <span style="left:110px;top:15px;" class="checking"></span>
                    </div>
                    <div class="ng-foot clearfix">
                        <div class="ng-link-area">
                          <span id="custom_display_64">
                            <a href="" target="_blank">忘记密码？</a>
                          </span>
                        </div>
                    </div>
                      <span id="custom_display_128">
                        <a href="/user/register"
                           class="button">注册账户</a>
                      </span>
                </form>
            </div>
            <div class="blank_area10"></div>
            <div class="blank_area50"></div>
        </div>
        <div align="center" class="suc_botm">
            <div class="backtohome">
                <a href="/">
                    <img alt="优倍商城-有机 健康 原产地" title="返回首页" src="/Public/default/images/home.png" width="36px" height="36px"
                                 border="0"/>
                </a>
            </div>
        </div>
    </div>
</div>
<script>
    var re_flag;
    $(function() {
//$("#login_form").submit(checkForm);
        $('#Submit').click(function () {
            re_flag = 200;
            if (!checkForm()) return;
            var me = $(this);
            me.time = 0;
            (function () {
                me.attr("disabled", "true");
                me.parent().find('.checking').show();
                if (re_flag == 200) {
                    if (me.time < 80) {
                        me.time++;
                        window.setTimeout(arguments.callee, 100);
                        return;
                    }
                    else {
                        show_error('网络超时，请重试！');
                    }
                }
                else if (re_flag == 10) {
                    $("#login_form").submit();
                    return;
                }
                me.removeAttr("disabled");
                me.parent().find('.checking').hide();
                return;
            })();
        });

        $('#security_tips, #open_security_tips').click(function (e) {
            e.stopPropagation();
        });

        $(document.body).click(function () {
            $('#security_tips').hide();
        });

    });

    function show_error(msg) {
        $("#span_error_info").css("display", 'block');
        $("#span_error_info").html(msg);
        window.setTimeout(hideError, 10000);
    }
    function hideError() {
        $("#span_error_info").css("display", 'none');
    }
    function user_auth(name, pwd) {
        $.ajax({
            url: "index.php?app=member&act=user_auth",
            type: "GET",
            data: {name: name, pwd: pwd},
            success: function (data) {
            re_flag = 100;
            //eval函数接收一个参数s，如果s不是字符串，则直接返回s。否则执行s语句。如果s语句执行结果是一个值，则返回此值，否则返回undefined
            //需要特别注意的是对象声明语法“{}”并不能返回一个值，需要用括号括起来才会返回值
            var jsonobj = eval('(' + data + ')');
            switch (jsonobj.ret) {
                case '0':
                    re_flag = 10;
                    return;
                case '1':
                    show_error(jsonobj.msg);
                    $("#user_name").addClass('error').focus();
                    return;
                case '2':
                    show_error(jsonobj.msg);
                    $("#user_name").addClass('error').focus();
                    return;
                case '3':
                    show_error(jsonobj.msg);
                    $("#password").addClass('error').focus();
                    return;
            }
        }
        });
        return;
    }

    function checkForm() {
        var user_name = $("#user_name").val();
        var password = $("#password").val();
        $("#user_name").removeClass('error');
        $("#password").removeClass('error');
        if (user_name.length == 0) {
            show_error("请输入登录名");
            $("#user_name").addClass('error').focus();
            return false;
        } else if (user_name.length < 2) {
            show_error("输入的登录名不正确");
            $("#user_name").addClass('error').focus();
            return false;
        } else if (password.length == 0 || password == null) {
            show_error("请输入密码");
            $("#password").addClass('error').focus();
            return false;
        } else if (password.length < 6 || password == null) {
            show_error("密码输入不正确");
            $("#password").addClass('error').focus();
            return false;
        }
        user_auth(user_name, password);
        return true;
    }
</script>
    <div align="center">
        <div align="center" class="footer">
            <ul class="links">
                <li class="copyright"><span>商城版权所有</span></li>
            </ul>
        </div>
    </div>
</body>
</html>