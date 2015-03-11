// JavaScript Document

$(function(){

    $('.topbar_select_list').mouseover(function(){
        $(this).find('ul').show();
    });

    $('.topbar_select_list').mouseout(function(){
        $(this).find('ul').hide();
    });

    $("#J_miniCart").mouseenter(showCartDetail);
    $("#J_miniCart").mouseleave(hideCartDetail);
    $("#J_miniCartList").mouseenter(clShow);
    $("#J_miniCartList").mouseleave(clHide);

    $("#mainsearch").mouseenter(function(){
        $(".mainsearch #submit").css({"background-color":"#ff5600","background-image":"url(/Public/default/images/search_btn_focus.png)","background-repeat":"no-repeat"});
    });

    $("#mainsearch").mouseleave(function(){
        var intxt = $("#keyword").val();
        if((intxt.length == 0 || password == null) && (document.activeElement.id != 'keyword'))
        {
            $(".mainsearch #submit").css({"background-color":"#ffffff","background-image":"url(/Public/default/images/search_btn.png)","background-repeat":"no-repeat"});
        }
    });
});
var timeOut;
function clShow(){
    //alert('showList');
    //此时清除超市 函数 然后不在重新获取数据
    clearTimeout(timeOut);

}
function clHide(){
    timeOut=setTimeout(closeDiv,500);
}
function showCartDetail(){
    show();
    clearTimeout(timeOut),
    $("#J_miniCart").hasClass("mini-cart-on")||$("#J_miniCart").addClass("mini-cart-on");

    getData();
}
function hideCartDetail(){
    timeOut=setTimeout(closeDiv,500);
}
function closeDiv(){
    var loadingStr = '<p class="loading">数据加载中，请稍后...</p>';
    $("#J_miniCart").removeClass("mini-cart-on"),
        $("#J_miniCartList").html(loadingStr).hide()
}
function show(){
    var loadingStr = '<p class="loading">数据加载中，请稍后...</p>';
    $("#J_miniCartList").show();
    $("#J_miniCartList").html(loadingStr).show();
}
function getData(){
    var url = 'index.php?app=cart&act=get_carts_ajax';

    $.get(url,function(data,status){
        if(status = "success"){
            var jsonObj = eval('('+data+')');
            if(0 != jsonObj.itemcounts){
                var num = $(".J_cartNum").text();
                var curQuantity = parseInt(jsonObj.quantity);
                $(".J_cartNum").text(num==null||num==''  ? "" :"("+curQuantity+")");

                listHtml="<ul>",
                    countHtml='<div class="count clearfix"><span class="total">共计'+jsonObj.quantity+'件商品<br><strong>合计：<em>'+jsonObj.amount+'元</em></strong></span><a  class="ubtn ubtn-primary" href="/index.php?app=cart">去购物车结算</a></div>';
                if(jsonObj.itemcounts>5){
                    var listHeight=335;
                    listHtml='<ul style="height:'+listHeight+'px;overflow-x:hidden;overflow-y:scroll">';
                }
                var cartItems = jsonObj.carts;
                for(var goodid in cartItems){
                    listHtml+= '<li class="clearfix" id="cart_item_'+cartItems[goodid]['goods_id']+'">'
                    +'<a  style="width:40px;height:40px;" href="/index.php?app=goods&id='+cartItems[goodid]['goods_id']+'" class="pic">'
                    +'<img  src="'+cartItems[goodid]['goods_image']+'" width="60" height="60">'
                    +'</a>'
                    +'<a  href="/index.php?app=goods&id='+cartItems[goodid]['goods_id']+'" class="name">'+cartItems[goodid]['goods_name']+'</a>'
                    +'<span class="price">'+cartItems[goodid]['price']+'元 x '+cartItems[goodid]['quantity']+'</span>'
                    +'<a class="btn-del delItem" href="javascript: void(0);" style="display:none">'
                    +'<i class="icon-common icon-common-close" onclick="drop_cart_item('+cartItems[goodid]['store_id']+','+cartItems[goodid]['goods_id']+');" ></i>'
                    +'</a>'
                    +'<div class="clear"></div>'
                    +'</li>';
                }

                listHtml+="</ul>",
                    $("#J_miniCartList").html(listHtml+countHtml)
            }else{
                $("#J_miniCartList").html('<p class="loading">购物车中还没有商品，赶紧选购吧！</p>');
                $(".J_cartNum").text("");
            }
        }
    })
}

function drop_cart_item(store_id, rec_id){
    var tr = $('#cart_item_' + rec_id);
    var amount_span = $('#cart' + store_id + '_amount');
    var cart_goods_kinds = $('#cart_goods_kinds');
    $.getJSON('index.php?app=cart&act=drop&rec_id=' + rec_id, function(result){
        alert("result : "+result);
        if(result.done){
            //删除成功
            if(result.retval.cart.quantity == 0){
                window.location.reload();    //刷新
            }
            else{
                tr.remove();        //移除
                amount_span.html(price_format(result.retval.amount));  //刷新总费用
                cart_goods_kinds.html(result.retval.cart.kinds);       //刷新商品种类
            }
        }
    });
}

//关闭首页顶部广告
function hidefirstpagetopad(){
    $("#divfirstpagetopad").fadeOut(300);
}