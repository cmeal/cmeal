// JavaScript Document
var isIe = (document.all) ? true : false;
var pointContent = '商城上线不久，欢迎各位吐槽或者建议';
var pointTel = '请输入你的联系方式，以便与您取得联系(选填)';
var pointValid = '请输入验证码';
//ajax是否已经弹框
var haveAlert = false;
function showHideBack(){
    var bWidth = parseInt(document.documentElement.scrollWidth);
    var bHeight = parseInt(document.documentElement.scrollHeight);

    var back = document.createElement("div");
    back.id = "pagebackgroung";
    var styleStr = "top:0px;left:0px;position:absolute;z-index:100001;background:#666;width:"
        + bWidth + "px;height:" + bHeight + "px;";
    styleStr += (isIe) ? "filter:alpha(opacity=40);" : "opacity:0.40;";
    back.style.cssText = styleStr;
    document.body.appendChild(back);
}
function showweixin(){
    showHideBack();
    var mesW = document.createElement("div");
    mesW.id = "ubiveWindow";
    mesW.className = "ubiveWindow";
    var centerHtml = '';
    var titleHtml = '';
    var pointHtml = '';
    centerHtml = '<div align="center" id="weixinimage"><img width="380px" height="380px" src="http://www.ubive.com/themes/mall/default/styles/default/images/ubivemweixin.jpg"/></div>';
    pointHtml = '<div align="center" id="fallowubive" >【手机下单，更便捷】打开微信，对准下方二维码“扫一扫”即可。</div>';

    titleHtml = '<div class="farmetitletext">优倍商城微信入口，微信上的优倍商城</div>';

    mesW.innerHTML = '<div class="recordcontact"  >'
    + '<div class="ubiveframetitle">'
    + titleHtml
    + '<div class="close">'
    + '<a onclick="closeWindow()"></a>'
    + '</div>'
    + '</div>'
    + '<div class="showinfo" align="center" style="width: 100%;height:295px;border:#f00 0px solid">   '
    + pointHtml
    + centerHtml

    + '</div>'

    + '</div>'

    + '</div>'
    + '</div>';

    document.body.appendChild(mesW);
}
function showubivelive(){
    showHideBack();
    var mesW = document.createElement("div");
    mesW.id = "ubiveWindow";
    mesW.className = "ubiveWindow";
    var centerHtml = '';
    var titleHtml = '';
    var pointHtml = '';
    centerHtml = '<div align="center" id="weixinimage"><img width="360px" height="360px" src="http://www.ubive.com/themes/mall/default/styles/default/images/ubivelive_piccode.png"/></div><a href="http://www.ubive.com/index.php?app=article&act=view&article_id=30" target="_blank">时景秀秀是什么?</a><div style="width:360px;margin-top:10px;"><div style="font-size:16px;font-weight:bold;color:#ff3400;float:left">提示：默认登录密码 123456</div><div style="float:right;height:16px;line-height:16px;"><a href="http://www.ubive.com/index.php?app=my_store" target="_blank">立即修改</a></div></div>';


    titleHtml = '<div class="farmetitletext">时景秀秀二维码(Android)</div>';

    mesW.innerHTML = '<div class="recordcontact"  >'
    + '<div class="ubiveframetitle">'
    + titleHtml
    + '<div class="close">'
    + '<a onclick="closeWindow()"></a>'
    + '</div>'
    + '</div>'
    + '<div class="showinfo" align="center" style="width: 100%;height:295px;border:#f00 0px solid">   '

    + centerHtml

    + '</div>'

    + '</div>'

    + '</div>'
    + '</div>';

    document.body.appendChild(mesW);
}
function showopinion(){
    showHideBack();
    var mesW = document.createElement("div");
    mesW.id = "ubiveWindow";
    mesW.className = "ubiveWindow";
    mesW.style.width='500px';      //DIV宽度
    mesW.style.height='356px';      //DIV高度

    var textarea = '';
    var input = '';
    var valid = '';
    var bottom = '';
    var titleHtml = '<div class="ubiveframetitle">'
        +' <div class="farmetitletext">给优倍商城提建议</div>'
        +' <div class="close">'
        +'	<a onclick="closeWindow()"></a>'
        +'</div>'
        +' </div>';

    textarea = '<textarea id="opinion_content" name="opinion_content"rows="6" '
    +'onblur="blurTextarea(this)" '
    +'onfocus="focusTextarea(this)">'
    + pointContent
    +'</textarea>';
    input = '<input id="opinion_tel"  value="请输入你的联系方式，以便与您取得联系(选填)" '
    +'onFocus="focusInput(this)"  '
    +'onBlur="blurInput(this)" />';

    valid = '<div id="opinion_div_valid">'
    +'<input id="opinion_valid" onFocus="focusInput(this)" onBlur="blurInput(this)"  value="请输入验证码"/>'
    +'<div id="divvalidimg" >  '
    +'<img id="verifyImg" width="100%" height="100%" onclick="changevalide()" title="点击更换" '
    +'style="cursor:pointer;" src="http://web.ubive.com/index/index/identifycode" />'
    +'</div>'
    +'</div>';

    bottom ='<div id="opinion_bottom">'
    +'<div style="float:left;margin-top:10px;">'
    +' <a href="http://wpa.qq.com/msgrd?v=3&amp;uin=1993686800&amp;Site=优倍卡专售&amp;Menu=yes" target="_blank" title="联系客服">'
    +' <img src="http://wpa.qq.com/pa?p=1:1993686800:4" alt="联系客服">'
    +' </a></div>'
    +'<div id="opinion_error_info">说点什么吧</div>'
    +'<button id="opinion_submit" onclick="sumnit_opinion()">提交</button>'
    +'</div>';
    mesW.innerHTML = '<div class="recordcontact">'
    + titleHtml
    + '<div class="showinfo" align="center" style="width:100%;height:230px;"> '
    + textarea
    + input
    + valid
    + bottom
    +' </div> </div>';
    document.body.appendChild(mesW);
}
function closeWindow() {
    if ($('#pagebackgroung') != null) {
        document.getElementById('pagebackgroung').parentNode
            .removeChild(document.getElementById('pagebackgroung'));
    }
    if ($('#ubiveWindow') != null) {
        document.getElementById('ubiveWindow').parentNode.removeChild(document
            .getElementById('ubiveWindow'));
    }
}
function getValueById(id){
    return $('#'+id).val();
}

function sumnit_opinion(){
    $("#opinion_submit").attr('disabled',true);//让按钮不可用

    var content =getValueById('opinion_content');
    var tel = getValueById('opinion_tel');
    var valid = getValueById('opinion_valid');
    $('#opinion_error_info').css("color","#f5f5f5");
    setTimeout(function(){

        if(content=='' || content==undefined || content==null || content==pointContent){
            $('#opinion_error_info').css("color","#f00");
            $("#opinion_submit").attr('disabled',false);
            return;
        }else if(content.length>=500){
            $('#opinion_error_info').css("color","#f00");
            $('#opinion_error_info').html('输入内容太长了');
            $("#opinion_submit").attr('disabled',false);
            return;
        }else{
            $('#opinion_error_info').css("color","#000");
            if(tel == pointTel ){
                tel = '';
            }
            $('#opinion_error_info').html('正在提交中..');
            uploadOpinion(content,tel);
        }

    },200);

}
function uploadOpinion(content,tel){
    var url = '/index.php';
    var geturl = url+"?app=feedback&content="+content+"&tel="+tel;
    geturl=encodeURI(encodeURI(geturl));
    $.get(geturl, function(data,status){
        $('#opinion_error_info').css("color","#f5f5f5");
        if(status=="success"){
            var jsonobj=eval('('+data+')');
            switch(jsonobj.ret){
                case 0:
                    alert("感谢您对优倍商城的支持，我们将尽快处理你对优倍商城的建议!");
                    closeWindow();
                    return;
                case 1:
                    alert("反馈失败，请稍后重试");
                    return;
                case 2:
                    alert("说点什么吧");
                    return;
            }
        }else{
            alert("反馈失败，请稍后重试");
        }
    });
}

function blurTextarea(obj){
    if(obj.value == ''){
        obj.style.color = '#ACA899';
        obj.value = pointContent;
    }
}

function focusTextarea(obj){
    if(obj.value == pointContent){
        obj.value ='';
        obj.style.color = '#000000';
    }
}

function blurInput(obj){
    if(!obj.value){
        obj.value=obj.defaultValue;
        obj.style.color='#999';
    }
}


function focusInput(obj){
    if(obj.value==obj.defaultValue){
        obj.value='';
        obj.style.color='#000'
    }
}

function useropinionfocus(){
    $("#opinion_point").css({"display":"block"});
}
function useropinionunfocus(){
    $("#opinion_point").css({"display":"none"});
}
function gotopfocus(){
    $("#toptext").css({"display":"block"});
}
function gotopunfocus(){
    $("#toptext").css({"display":"none"});
}
function changevalide() {
    var timenow = new Date().getTime();
    document.getElementById('verifyImg').src = 'http://web.ubive.com/index/index/identifycode/'
    + timenow;
}

function gotop(){
    $('body,html').animate({scrollTop:0},450);
}
function movemouse() {
    $(window).scroll(function () {
        var scroll_top = $(document).scrollTop();
        if (scroll_top != 0) {
            $("#gotop").show();
        }else{
            $("#gotop").hide();
        }
    });
}
movemouse();