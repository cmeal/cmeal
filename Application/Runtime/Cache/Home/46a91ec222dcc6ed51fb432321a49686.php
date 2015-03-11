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
    <link href="Public/default/css/header.css" type="text/css" rel="stylesheet">
    <link href="Public/default/css/base.css" type="text/css" rel="stylesheet">
    <link href="Public/default/css/footer.css" type="text/css" rel="stylesheet">
    <link href="Public/default/css/catalog.css" type="text/css" rel="stylesheet">
    <link href="Public/default/css/ubmall.css" type="text/css" rel="stylesheet">

    <script src="Public/default/js/jquery.js" type="text/javascript"></script>
    <script src="Public/default/js/ubmall.js" type="text/javascript"></script>
    <script src="Public/default/js/nav.js" type="text/javascript"></script>
    <script src="Public/default/js/select.js" type="text/javascript"></script>
    <script src="Public/default/js/footer.js" type="text/javascript"></script>
    <script src="Public/default/js/headtop.js" type="text/javascript"></script>

</head>
<body>
<div style="width:100%;min-width:1150px;" align="center">
    <div style="display:none" id="flagindex">1</div>
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
    <div style="position:relative;z-index:100;width:1150px;" align="left">
        <div style="width:100%;height:35px;"></div>
        <!--big ad-->
        <!--/big ad-->

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

        <!--navbar-->
        <div id="mainnavbar" align="center">
<div id="mainnavbarcontent">
<div class="leftmenuinfo">
    <ul class="subnav">
        <li class="line" id="select_list_category">
            <a class="z_index" id="z_index_category" href="index.php?app=category">全部商品分类
                <img class="tri" id="ico_down" width="9" height="5" src="Public/default/images/ico_down_white.png" style="display: none;"/>
            </a>
            <div class="float_list" id="float_list_category" style="display: block;">
                <div class="module_common_category">
                    <div id="AllSort">
                        <?php if(is_array($categories)): $i = 0; $__LIST__ = $categories;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?><dl>
                            <dt id="EFF_dt_<?php echo ($cate["name"]); ?>">
                                <a href="1" target="_blank"><?php echo ($cate["name"]); ?></a>

                            </dt>
                            <?php if($cate["children"] != null): ?><dd class="noDis" id="EFF_dd_<?php echo ($cate["name"]); ?>">
                                    <?php if(is_array($cate["children"])): $i = 0; $__LIST__ = $cate["children"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i;?><span>
                                            <a href="" target="_blank">
                                                <?php echo ($c["name"]); ?></a><br>
                                        </span><?php endforeach; endif; else: echo "" ;endif; ?>
                                </dd><?php endif; ?>
                            </dl><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <div class="hover">
                <a href="index.php">
                    <span>首页</span>
                </a>
            </div>
        </li>
        <li>
            <div class="link">
                <a href="">
                    <span>商城文化</span>
                </a>
            </div>
        </li>
        <li>
            <div class="link">
                <a href="">
                    <span>企业文化</span>
                </a>
            </div>
        </li>
        <li>
            <div class="link">
                <a href="">
                    <span>风雪商城</span>
                </a>
            </div>
        </li>
        <li>
            <div class="link">
                <a href="">
                    <span>行业资讯</span>
                </a>
            </div>
        </li>
    </ul>
</div>
</div>
</div>
<script src="Public/default/js/headbottom.js" type="text/javascript"></script>
        <!--/navbar-->

        <!--ads   class content_v1 index_top_area-->
        <div class="content_v1 index_top_area">
    <div class="left" area="top_left" widget_type="area">
        <div id="_widget_211" name="gcategory_list_mao" widget_type="widget" class="widget">
            <div style="height:360px;"></div>
        </div>
    </div>
    <div class="right">
        <div id="module_middle" area="cycle_image" widget_type="area">
            <div id="_widget_698" name="cycle_image" widget_type="widget" class="widget">
                <div class="ad_cycle">
                    <div class="line"></div>
                    <div class="number">
                        <ul>
                            <?php if(is_array($ads)): foreach($ads as $k=>$ad): ?><li class="<?php if($k+1 == 1): ?>nonce<?php else: ?>initial<?php endif; ?>" target_src="<?php echo ($ad["image_link"]); ?>" target_link="<?php echo ($ad["url_link"]); ?>" alt="<?php echo ($k+1); ?>">
                                    <?php echo ($k+1); ?>
                                </li><?php endforeach; endif; ?>
                        </ul>
                    </div>
                    <div class="number_bg"></div>
                    <a href="" class="listpic" target="_blank">
                        <img src="<?php echo ($ads[0]['image_link']); ?>" width="670" height="360" style="">
                    </a>
                </div>
            </div>
        </div>
        <div id="module_right" area="top_right" widget_type="area">
            <div id="_widget_166" name="image_ad" widget_type="widget" class="widget">
                <div class="base_top_right image_ad_area">
                    <a href="" target="_blank">
                        <img src="Public/default/images/001.gif" width="250px" height="129px">
                    </a>
                </div>
            </div>
            <div id="_widget_907" name="register_and_apply" widget_type="widget" class="widget">
                <div class="base_top_right login_reg_area">
                    <a class="login" href="">
                        <div class="login_base_btn" id="mao_login" style="margin-left:12px;"
                             onmousemove="btLoginFocus()" onmouseout="focusOut()">登录
                        </div>
                    </a>
                    <a class="login" href="index.php?app=member&amp;act=register">
                        <div class="login_base_btn" id="mao_regist" style="margin-left:11px;"
                             onmousemove="btRegistFocus()" onmouseout="focusOut()">注册
                        </div>
                    </a>
                    <a class="login" href="index.php?app=apply" target="_blank">
                        <div class="login_base_btn" id="mao_join" style="margin-left:11px;" onmousemove="btJoinFocus()"
                             onmouseout="focusOut()">免费开店
                        </div>
                    </a>
                </div>

            </div>

            <div id="_widget_244" name="notice" widget_type="widget" class="widget">
                <div class="base_top_right last_news module_common_v1">
                    <div class="title_artical_type_v1">
                        <h3>最新动态</h3>
                        <a href="" target="_blank"
                           class="title_right">查看更多&gt;&gt;</a>

                        <div class="clear"></div>
                    </div>
                    <div class="module_common_content module_last_news">
                        <ul>

                            <li>
                                <a href="" target="_blank">庄主之家下单及配送流程调整公告
                                </a>
                            </li>
                            <li>
                                <a href="" target="_blank">庄主之家在线商城试运营！
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>
<script type="text/javascript">
    var tId;
    startScroll();
    $(function () {
        $('.ad_cycle li').each(function () {
            $(this).click(function () {
                slideHere($(this));
            }).mouseover(function () {
                console.log('mouseover');
                stopHere($(this));
            }).mouseout(function () {
                startScroll();
            });
        });
        $('.listpic').each(function () {
            $(this).mouseover(function () {
                stopScroll();
            }).mouseout(function () {
                startScroll();
            });
        });
    });
    function startScroll() {
        tId = setInterval(function () {
            var nextImg = $('.nonce').next('.initial');
            if (nextImg.length == 0) {
                nextImg = $($('.ad_cycle li')[0]);
            }
            slideHere($(nextImg));
        }, 1000);
    }
    function stopScroll() {
        clearInterval(tId);
    }
    function slideHere(imgObj) {
        $('.ad_cycle li').removeClass('nonce');
        $('.ad_cycle li').addClass('initial');
        imgObj.removeClass('initial');
        imgObj.addClass('nonce');
        if ($('.ad_cycle img').length) {
            $('.ad_cycle img')
                    .attr('src', imgObj.attr('target_src'))
                    .css('display', 'none')
                    .fadeIn('slow')
                    .parent().attr('href', imgObj.attr('target_link'))
                    .attr('target', '_blank');
        }
    }
    function stopHere(imgObj) {
        slideHere(imgObj);
        stopScroll();
    }
</script>
<script  type="text/javascript">
    function btLoginFocus(){
        $("#mao_login").css({"background":"#ff3400"});
    }
    function btRegistFocus(){
        $("#mao_regist").css({"background":"#ff3400"});
    }
    function btJoinFocus(){
        $("#mao_join").css({"background":"#ff3400"});
    }
    function focusOut(){
        $(".login_base_btn").css({"background":"#ff5600"});
    }
</script>
        <!--/ads-->
        <div class="clear"></div>
        <!--pro list class content_v1-->
        <div class="content_v1" area="top_down" widget_type="area">
    <!--floor-->
    <?php if(is_array($products_list)): $k = 0; $__LIST__ = $products_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pro): $mod = ($k % 2 );++$k; if($pro["pro_list"] != null): ?><div id="" name="my_goods_module" widget_type="widget" class="widget">
            <div class="module_common_v1">
                <div class="title_artical_type_v1">
                    <a href="" target="_blank" style="float:left;">
                        <h3><?php echo ($k); ?>F - <?php echo ($pro["cate_name"]); ?></h3></a>
                    <span style="float:left;font-size:15px;height:100%;width:12px;display:block;"></span>
                </div>

                <div class="module_common_content module_goods">
                    <ul>
                        <?php if(is_array($pro["pro_list"])): $i = 0; $__LIST__ = $pro["pro_list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$p): $mod = ($i % 2 );++$i;?><li>
                                <div class="lioutdiv">
                                    <div class="ligooddiv" align="center">
                                        <div class="goodsimgdiv" style="">
                                            <a href="" target="_blank">
                                                <img style="margin-top:1px;" src="/Public/upload/pro_img/<?php echo ($p["main_image"]); ?>" width="140" height="140" alt="赣南脐橙">
                                            </a>
                                        </div>
                                        <div class="name" align="left">
                                            <a style="text-align:left;" href="" target="_blank">
                                                <?php echo ($p["title"]); ?>
                                            </a>
                                        </div>
                                        <div class="bottomgoodsinfo">
                                            <div class="leftinfo">
                                                <font color="#ff5600" size="3" style="font-weight:bold">¥<?php echo ($p["sell_price"]); ?></font>
                                                <font class="unit">/<?php echo ($p["pro_size"]); ?></font>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                </div>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>

                        <div class="clear"></div>
                    </ul>
                    <div class="clear"></div>
                </div>

            </div>
        </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
    <!--/floor-->
</div>
        <!--/pro list-->
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
</div>
</body>
</html>