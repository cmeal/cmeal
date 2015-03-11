$(function()
{
    $('.searchtypeul').mouseover(searchtypeover).mouseout(searchtypeout);
    $("#searchgood").click(clicksearchgood);
    $("#searchshop").click(shiftsearch);
});

function searchtypeover(){
    $("#searchshop").css("display","block");
}
function searchtypeout(){
    $("#searchshop").css("display","none");
}

function clicksearchgood(){
    var goodsdis = $("#searchshop").css("display");
    $("#searchshop").css("display",goodsdis == "none" ? "block":"none");
}
function shiftsearch(){
    var type = $(".searchinput #act").val();
    $(".searchinput #act").val(type == "index" ? "store" : "index");
    $("#searchshop").css("display","none");
    $("#searchgood").html(type == "index" ? "搜店铺" : "搜商品");
    $("#searchshop").html(type == "index" ? "搜商品" : "搜店铺" );
    /**
     $("#searchshop").attr("title",type == "index" ? "搜商品" : "搜索店铺");
     $("#searchgood").attr("title",type == "index" ? "搜索店铺" : "搜索商品");
     **/
}