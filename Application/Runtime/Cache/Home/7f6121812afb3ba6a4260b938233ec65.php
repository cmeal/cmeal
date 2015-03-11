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
    <script src="Public/default/js/jquery.js" type="text/javascript"></script>
    <script src="Public/default/js/ubmall.js" type="text/javascript"></script>
    <script src="Public/default/js/select.js" type="text/javascript"></script>
    <script src="Public/default/js/footer.js" type="text/javascript"></script>
    <script src="Public/default/js/headtop.js" type="text/javascript"></script>

    <link href="Public/default/css/shop.css" type="text/css" rel="stylesheet">
    <link href="Public/default/css/footer.css" type="text/css" rel="stylesheet">
    <link href="Public/default/css/header.css" type="text/css" rel="stylesheet">
    <link href="Public/default/css/base.css" type="text/css" rel="stylesheet">
    <link href="Public/default/css/jqzoom.css" type="text/css" rel="stylesheet">

    <script src="Public/default/js/jquery.jqzoom.js" type="text/javascript"></script>
</head>
<body>
<div style="width:100%;min-width:1150px;" align="center">
    <!--topbar-->
    <!--top 顶部固定-->
<div id="topbar" align="center">
    <div id="topbarcontent">
        <div class="leftmenuinfo">
            您好,&nbsp;<a href="">游客</a>&nbsp;,欢迎光临餐谋长商城
            [<a href="">登录</a>]
            [<a href="">免费注册</a>]
        </div>
        <div class="rightmenuinfo" align="right">
            <ul class="subnav">
                <li class="line"><a href="index.php?app=article&amp;code=help">帮助中心</a></li>
                <li class="line"><a href="index.php?app=message&amp;act=newpm">站内消息</a></li>
                <li class="topbar_select_list select_list" id="select_list">
                    <a class="z_index" href="index.php?app=member">我的餐谋长</a>
                    <ul class="float_list" id="float_list" style="display: none;">
                        <li><a href="index.php?app=buyer_order">我的订单</a></li>
                        <li><a href="index.php?app=my_favorite">我的收藏</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
    <!--/topbar-->
    <div style="position: relative; z-index: 100; width: 1150px;" align="left" ectype="jqzoom_relative">
        <div style="width:100%;height:45px;"></div>
        <!--head-->
        <div id="head">
    <h1 title="">
        <a href="">
            <img alt="" src="Public/default/images/logo.png" height="100px" width="350px">
        </a>
    </h1>
    <div class="headercart">
        <div class="theadicon">
            <div class="theadicon_img03">
            </div>
            <div class="theadicon_img02">
            </div>
            <div class="theadicon_img01">
            </div>
        </div>
    </div>
    <div style="width:10px;height:20px;float:right;"></div>
    <div class="mainsearch" id="mainsearch" align="center" style="background:#ff5600;padding-top:2px;">
        <div style="height:42px;width:456px;background:#ffffff;">
            <form method="GET" action="">
                <div class="searchtype">
                    <ul class="searchtypeul">
                        <p id="searchgood">搜商品</p>
                        <p id="searchshop" style="display: none;">搜店铺</p>
                    </ul>
                </div>
                <div class="searchinput">
                    <input type="text" name="keyword" id="keyword" value="" placeholder="土猪" class="textsearchinput">
                </div>
                <div class="searchbut" id="divsearchbt">
                    <input type="submit" name="Submit" value="" id="submit" style="">
                </div>
            </form>
        </div>
    </div>
</div>
        <!--/head-->
        <!--path-->
        <!--/path-->
        <div id="nav" style="border:#000 0px solid;">
            <div class="banner" style="border:#000 0px solid">
                <a href="index.php?app=store&amp;id=54565">
                    <img src="data/files/store_54565/other/store_banner.jpg" style="border:#000 0px solid;" width="1150"
                         height="120">
                </a></div>
            <div class="nav_bg"></div>
        </div>
        <div class="content_blank_area10"></div>
        <div class="content_blank_area10"></div>

        <!--content-->

        <div id="content">
            <!--left shop info-->
            <!--商品详细页，进入店铺页面 左边的店铺信息-->
<div id="left">
    <div class="user">
        <div class="user_photo" style="border:#f00 0px solid">
            <h2>店铺名称</h2>
            <div class="photo">
                <a href="">
                    <img src="/Public/upload/shop_img/<?php echo ($shop["image"]); ?>" width="100" height="100">
                </a>
            </div>
        </div>
        <div class="user_data" style="border:#000 0px solid;margin-top:20px;margin-left:11px;">
            <table class="table table-bordered" style="table-layout:fixed">
                <tbody>
                <tr>
                    <td width="60">店主</td>
                    <td>
                        <div style="word-break:break-all;"><?php echo ($shop["name"]); ?></div>
                    </td>
                </tr>
                <tr>
                    <td>创店时间</td>
                    <td><?php echo (date("Y-m-d H:m:s",$shop["name"])); ?></td>
                </tr>
                <tr>
                    <td>联系电话</td>
                    <td><?php echo ($shop["telephone"]); ?></td>
                </tr>
                <tr>
                    <td>客服QQ</td>
                    <td><?php echo ($shop["qq"]); ?></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="index_btn" align="center" style="border:#F00 0px solid;height:30px;width:184px;margin-left:11px;margin-bottom:14px;">
            <a class="join_in" style="float:left;width:85px;height:34px;text-align:center;line-height:34px;background:#ccc;"
               href="javascript:collect_store(54565)">
                <div class="mao_btn" id="store_farm" style="color:#000;" onmousemove="btStoreFocus();"
                     onmouseout="focusOut()">收藏店铺
                </div>
            </a>
            <a class="join_in" style="float:right;background:#ccc;width:85px;height:34px;text-align:center;line-height:34px;"
               target="_blank" href="index.php?app=message&amp;act=send&amp;to_id=54565">
                <div class="mao_btn" id="send_msg" style="color:#000;">进入店铺
                </div>
            </a>
        </div>
            <div class="clear"></div>
    </div>
</div>
            <!--/left shop info-->
            <!--right product info-->
            <div id="right">
    <div>
        <div class="ware_info" style="border: 0px solid rgb(0, 204, 0); position: relative;"
             ectype="jqzoom_relative">
            <div class="ware_pic">
                <div class="big_pic">
                    <a href="javascript:;">
                        <span class="jqzoom">
                            <img src="/Public/upload/pro_img/<?php echo ($product["main_image"]); ?>" width="360" height="360" style="border-radius:4px;"
                                jqimg="/Public/upload/pro_img/<?php echo ($product["main_image"]); ?>" alt="">
                        </span>
                    </a>
                </div>
                <div class="bottom_btn">
                    <!--<a class="collect" href="javascript:collect_goods(1887);" title="收藏该商品"></a>-->
                    <div class="left_btn"></div>
                    <div class="right_btn"></div>
                    <div class="ware_box">
                        <ul id="goodsPicList">
                            <li class="ware_pic_hover"
                                bigimg="data/files/store_54565/goods_158/201501061019188371.jpg"><img
                                    src="data/files/store_54565/goods_158/small_201501061019188371.jpg" width="55"
                                    height="55"></li>
                            <li bigimg="data/files/store_54565/goods_157/201501061019178985.jpg"><img
                                    src="data/files/store_54565/goods_157/small_201501061019178985.jpg" width="55"
                                    height="55"></li>
                        </ul>
                    </div>
                </div>
                <script>
                    $(function () {
                        var btn_list_li = $("#btn_list > li");
                        btn_list_li.hover(function () {
                            $(this).find("ul:not(:animated)").slideDown("fast");
                        }, function () {
                            $(this).find("ul").slideUp("fast");
                        });
                    });
                </script>
            </div>

            <div class="ware_text">
                <h1 class="ware_title"><?php echo ($product["title"]); ?></h1>

                <div class="blank_area10"></div>
                <div class="rate">
                    <div class="one_line_desc_highline">
                        餐谋长价：&nbsp;
                    <span class="fontColor3" ectype="goods_price">¥<?php echo ($product["sell_price"]); ?></span>
                    <span><font color="#666" style="font-size:12px;">/<?php echo ($product["pro_size"]); ?></font></span>
                    </div>
                    <div class="one_line_desc">
                        品牌<span style="color:#FFF">名称</span>：&nbsp;优倍范
                    </div>
                </div>
                <div class="handle">
                    <ul>
                        <li class="handle_title">购买数量：</li>
                        <li class="amount_area" style="padding:0px 5px 0 5px;">
                            <a href="javascript:void(0);" hidefocus="" class="amount_reduce reduce_radius"></a>
                            <input type="text" class="amount_input" name="" id="quantity" value="1">
                            <a href="javascript:void(0);" hidefocus="" class="amount_increase increase_radius"></a>

                            <div class="clear"></div>
                        </li>
                        <li style="padding-top: 5px;">
                            件（库存<span class="stock" ectype="goods_stock">977</span>件）
                        </li>
                    </ul>
                </div>

                <ul class="ware_btn">
                    <div class="ware_cen" style="display:none;border:#c0c0c0 1px solid;">
                        <div class="ware_center" style="border:#F00 0px solid;">
                            <h1 style="border-bottom:#ccc 1px solid;">
                                <span class="dialog_title">商品已成功添加到购物车</span>
                                    <span class="close_link" title="关闭" onmouseover="this.className = 'close_hover'"
                                          onmouseout="this.className = 'close_link'" onclick="slideUp_fn();"></span>
                            </h1>

                            <div class="ware_cen_btn">
                                <p class="ware_text_p">购物车内共有 <span class="bold_num">3</span> 种商品 共计 <span
                                        class="bold_mly">658.00</span></p>

                                <p class="ware_text_btn">
                                    <input type="submit" class="btn1" name="" value="查看购物车"
                                           onclick="location.href='http://www.ubive.com/index.php?app=cart'">
                                    <input type="submit" class="btn2" name="" value="继续挑选商品"
                                           onclick="$('.ware_cen').css({'display':'none'});">
                                </p>
                            </div>
                        </div>
                        <div class="ware_cen_bottom"></div>
                    </div>

                    <!--<li class="btn_c1" title="立刻购买"><a href="#"></a></li>-->
                    <div>
                        <a class="btn_c2" href="javascript:buy();" id="goodsDetailAddCartBtn">加入购物车</a>
                        <a class="btn_c3" href="javascript:buy_to_cart();">立即购买</a>

                        <div class="clear"></div>
                    </div>
                </ul>
            </div>

            <div class="clear"></div>
        </div>
    </div>
    <div class="blank_area10"></div>
    <a name="module"></a>
    <ul class="user_menu" style="border:#000 0px solid;">
        <div class="ornament1"></div>
        <div class="ornament2"></div>
        <li><a class="active" href="index.php?app=goods&amp;id=1887#module"><span>商品详情</span></a></li>
    </ul>
    <div class="blank_area10"></div>
    <div class="option_box">
        <div class="default"><?php echo ($product["body"]); ?></div>
    </div>
    <div class="clear"></div>
</div>
            <!--/right product info-->
            <div class="clear"></div>
        </div>
        <!--/content-->
        <div class="clear"></div>
    </div>
    <div class="footer_margin" style="background-color:#fff;"></div>
    <div class="footer_margin" style="background-color:#fff;"></div>
    <!--footer-->
    <div id="outfooter">
    <!--客服-->
    <!--
    <div class="bottomfix useropinion" id="useropinion" align="center" onmousemove="useropinionfocus()"
         onmouseout="useropinionunfocus()">
        <div id="opinion_point" align="center" style="display: none;">
            <a href="" target="_blank">
                在线<br>客服</a>
        </div>
    </div>-->
    <!--/客服-->
    <!--置顶-->
    <div class="bottomfix gotop" id="gotop" onmousemove="gotopfocus()" onmouseout="gotopunfocus()" onclick="gotop()"
         style="display: block;">
        <div id="toptext" style="display: none;">回顶部</div>
    </div>
    <!--/置顶-->
    <div id="footer">
        <div style="width:1150px;height:70px;background-color:#f5f5f5" align="center">
            <div style="width:980px;height:100%;position:relative;">

                <div class="tfoot_icon_list" align="center">
                    <ul>
                        <li class="icon01"></li>
                        <li class="icon02"></li>
                        <li class="icon03"></li>
                        <li class="icon04"></li>
                        <li class="icon05"></li>
                    </ul>
                </div>

            </div>

        </div>
        <div style="width:100%;height:2px;background-color:#e2e2e2;margin-top:15px;"></div>
        <div class="div_footer_out">
            <div class="div_footer_in">
                <dl>
                    <dt>食品安全</dt>
                    <dd><a href="" target="_blank">极品食材</a></dd>
                    <dd><a href="" target="_blank">产品朔源</a></dd>
                    <dd><a href="http://www.ubive.com/index.php?app=article&amp;act=view&amp;article_id=67"
                           target="_blank">生态自然</a></dd>
                    <dd><a href="" target="_blank">有机认证</a></dd>
                    <dd><a href="" target="_blank">绿色食品</a></dd>
                    <dd><a href="" target="_blank">食品检测</a></dd>
                    <dd><a href="" target="_blank">无公害产品</a></dd>
                </dl>
                <dl>
                    <dt>新手教程</dt>
                    <dd>
                        <a href="http://e.weibo.com/ubive?ref=http%3A%2F%2Fwww.ubive.com%2F" target="_blank">
                            购物流程
                        </a>
                    </dd>
                    <dd>
                        <a style="cursor:pointer">注册登录</a>
                    </dd>
                    <dd><a onclick="" title="" style="cursor:pointer">账户充值</a></dd>
                    <dd><a title="" style="cursor:pointer">如何提货</a></dd>
                    <dd><a  title="" style="cursor:pointer">会员政策</a></dd>
                    <dd><a title="" style="cursor:pointer">金融扶持</a></dd>
                    <dd><a title="" style="cursor:pointer">资金互助</a></dd>
                </dl>
                <dl>
                    <dt>配送方式</dt>
                    <dd><a href="http://www.ubive.com/index.php?app=article&amp;act=view&amp;article_id=19"
                           target="_blank">全程冷链</a></dd>
                    <dd><a href="http://www.ubive.com/index.php?app=article&amp;act=view&amp;article_id=20"
                           target="_blank">配送范围</a></dd>
                    <dd><a href="http://www.ubive.com/index.php?app=article&amp;act=view&amp;article_id=13"
                           target="_blank">运费标准</a></dd>
                    <dd><a href="http://www.ubive.com/index.php?app=article&amp;act=view&amp;article_id=13"
                           target="_blank">GPS定位跟踪</a></dd>
                </dl>
                <dl>
                    <dt>支付方式</dt>
                    <dd style="color:#574d55;font-size:12px;">货到付款</dd>
                    <dd style="color:#574d55;font-size:12px;">在线支付</dd>
                    <dd style="color:#574d55;font-size:12px;">账户余额支付</dd>
                </dl>
                <dl>
                    <dt>售后服务</dt>
                    <dd style="color:#574d55;font-size:12px;">退换货政策</dd>
                    <dd style="color:#574d55;font-size:12px;">退换货流程</dd>
                    <dd style="color:#574d55;font-size:12px;">退款</dd>
                    <dd style="color:#574d55;font-size:12px;">投诉建议</dd>
                    <dd style="color:#574d55;font-size:12px;">担保机制</dd>
                </dl>
                <dl>
                    <dt>帮助信息</dt>
                    <dd style="color:#574d55;font-size:12px;">安全食品采购指南</dd>
                    <dd style="color:#574d55;font-size:12px;">常见问题</dd>
                    <dd style="color:#574d55;font-size:12px;">电子优惠券的使用</dd>
                    <dd style="color:#574d55;font-size:12px;">礼品卡</dd>
                </dl>
            </div>
        </div>
        <div style="width:100%;height:2px;background-color:#e2e2e2"></div>
        <ul>
            <li>
                <a target="_blank" href="">关于我们</a>　|　 <a target="_blank" href="">联系我们</a>　|
                <a target="_blank" href="">服务条款</a>　|　 <a target="_blank" href="">友情链接</a>　|　
                <a target="_blank" href="">网站地图</a>　|　 <a target="_blank" href="">帮助中心</a>
            </li>
            <li>餐谋长版权所有</li>
        </ul>

        </div>
        <!--站长统计-->
        <!--/站长统计-->
    </div>
</div>
    <!--/footer-->
</div>
<script type="text/javascript" src="Public/default/js/goodsinfo.js"
        charset="utf-8"></script>
<script type="text/javascript" src="Public/default/js/mlselection.js"
        charset="utf-8"></script>
<script type="text/javascript">
    $(function () {
        $('.amount_reduce').click(function () {
            me = $(this);
            element = me.parent('li').find('input');
            var val = Number(element.val());
            if (val > 1) {
                val = val - 1;
            }
            element.val(val);
            element.keyup();
        });
        $('.amount_increase').click(function () {
            me = $(this);
            element = me.parent('li').find('input');
            var val = Number(element.val());
            if (val < 200) {
                val = val + 1;
            }
            element.val(val);
            element.keyup();
        });
        $('.visitorregionname').click(addressselectiondialog);
        $('.visitorregionname, #span_price_refer_tip').click(function (e) {
            e.stopPropagation();
        });
        $(document.body).click(function () {
            $('#price_refer_tips').hide();
        });
    });
    /* buy */
    function buy() {
        if (goodsspec.getSpec() == null) {
            alert(lang.select_specs);
            return;
        }
        var spec_id = goodsspec.getSpec().id;
        var quantity = $("#quantity").val();
        if (quantity == '') {
            alert(lang.input_quantity);
            return;
        }
        if (parseInt(quantity) < 1) {
            alert(lang.invalid_quantity);
            return;
        }
        add_to_cart(spec_id, quantity);
    }

    /*立即购买*/
    function buy_to_cart() {
        if (goodsspec.getSpec() == null) {
            alert(lang.select_specs);
            return;
        }
        var spec_id = goodsspec.getSpec().id;

        var quantity = $("#quantity").val();
        if (quantity == '') {
            alert(lang.input_quantity);
            return;
        }
        if (parseInt(quantity) < 1) {
            alert(lang.invalid_quantity);
            return;
        }
        buy_add_to_cart(spec_id, quantity);
    }
    function buy_add_to_cart(spec_id, quantity) {
        var url = SITE_URL + '/index.php?app=cart&act=add';
        $.getJSON(url, {'spec_id': spec_id, 'quantity': quantity}, function (data) {
            if (data.done) {
                window.location.href = SITE_URL + '/index.php?app=cart';
            }
            else {
                alert(data.msg);
            }
        });
    }

    /* add cart */
    function add_to_cart(spec_id, quantity) {
        var url = SITE_URL + '/index.php?app=cart&act=add';
        $.getJSON(url, {'spec_id': spec_id, 'quantity': quantity}, function (data) {
            if (data.done) {
                var b = $("#goodsDetailAddCartBtn");
                var c = $("<img>"), d = b.offset().top - 166, e = b.offset().left, f = $("#J_miniCart").offset().top + 20, g = $("#J_miniCart").offset().left + 60,
                    h = $("#goodsPicList").find("li").eq(0).find("img").attr("src");
                c.css({
                    display: "block",
                    width: "160px",
                    height: "160px",
                    position: "absolute",
                    top: d,
                    left: e,
                    "z-index": "1000",
                    border: "2px solid #f60"
                });
                c.attr("src", h);
                c.appendTo("body").animate({
                    top: f,
                    left: g,
                    width: "20px",
                    height: "20px"
                }, 400, "linear", function () {
                    c.remove();
                    var num = $(".J_cartNum").text();
                    var curQuantity = parseInt(num.substring(1, num.length - 1)) + parseInt(quantity);
                    $(".J_cartNum").text(num == null || num == '' ? "(" + parseInt(quantity) + ")" : "(" + curQuantity + ")");
                });
            }
            else {
                alert(data.msg);
            }
        });
    }
    function showAnim() {

    }
    var specs = new Array();
    specs.push(new spec(1975, '', '', 566.00, 977));
    var specQty = 0;
    var defSpec = 1975;
    var goodsspec = new goodsspec(specs, specQty, defSpec);
    //]]>
</script>
</body>
</html>