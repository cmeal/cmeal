//注册表单验证
var tokenflag = 0;

function sendSMS(){
    var me = $("#sendRegister");
    me.addClass("noSend");
    var xhr = $.ajax({
        url:"index.php?app=member&act=send_captcha&rand="+Math.random(),
        dataType:'text',
        type:'POST',
        data:{
            phone: function(){
                return $("#phoneNum").val();
            },
            from: "register",
            tokencaptcha: function(){
                return $("#ticketin").val();
            }
        },
        statusCode: {
            '403': function(){
                show_msg("您的操作频率过快，请稍后再试。");
            }
        },
        success:function(data){
            me.removeClass("noSend");
            data = eval("(" + data.substring(data.indexOf("{")<0?data.indexOf("["):data.indexOf("{")) + ")");
            //data = $.parseJSON(data.replace('&&&START&&&',''));
            //alert(data.ret);
            if (data.ret==0){
                var phoneValue = $("#phoneNum").val();
                var reg = /(\d{3})\d{5}(\d{3})/;
                var t_phoneValue = phoneValue.replace(reg,"$1*****$2");
                show_msg("系统已向号码为（"+t_phoneValue+"）的手机发了一条短信，请注意接收。");
                me.attr("disabled","true");
                me.addClass("noSend");
                me.time=60;
                ;(function(){
                    if (me.time>1){
                        me.time--;
                        me.addClass("en-width").val("再次获取("+me.time+")");
                        setTimeout(arguments.callee,1000);
                    }else{
                        me.removeClass("en-width").val("获取验证码");
                        if($('#phoneNum').val()){
                            me.removeClass("noSend");
                            me.removeAttr("disabled");
                        }
                    }
                })();
                /*禁止连续发送*/
            }else if(data.ret=="2"){
                show_msg("操作过于频繁，请稍后再试！");
                /*手机号码已被注册*/
            }else if(data.ret=="3"){
                show_msg("您输入的手机号码已被注册，请换一个试试，或<a href='{url app=member&act=login&ret_url=$ret_url}' class='cor_yellow'>直接登录</a>");
            }else if(data.ret=="11"){
                show_msg("输入的图片验证码不正确");
                /*手机号码已被注册*/
            }else{
                //custom tip
                show_msg("未知网络异常");
            }
        }
    });
}

function show_msg(msg){
    $("#phone_tips_field").html(msg);
}

function reloadtokenimg(){
    if(tokenflag > 0)
    {
        var t_src = $('#img_code').attr('src') + '&_=' + new Date().getTime();
        $('#img_code').attr('src',t_src);
        $("#ticketin").val('');
        $("#fvmask .tips_field").html("<label class='remind'>请输入图片中的文字,点击图片可更换</label>");
    }
    tokenflag++;
}