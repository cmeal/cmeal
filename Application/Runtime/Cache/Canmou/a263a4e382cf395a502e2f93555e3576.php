<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>管理员后台</title>
        <link rel="stylesheet" href="tp_ubive/Public/admin/css/bootstrap.min.css" />
<link rel="stylesheet" href="tp_ubive/Public/admin/css/font-awesome.min.css" />

<link rel="stylesheet" href="tp_ubive/Public/admin/css/ace.min.css"/>

	</head>
	<body class="no-skin">
    <div id="navbar" class="navbar navbar-default">
	<div class="navbar-container" id="navbar-container">
		<div class="navbar-header pull-left">
			<a href="index.php" class="navbar-brand">
				<small>
					Admin
				</small>
			</a>
		</div>

		<div class="navbar-buttons navbar-header pull-right" role="navigation">
			<ul class="nav ace-nav">
				<li class="light-blue">
					<a data-toggle="dropdown" href="#" class="dropdown-toggle">
						<img class="nav-user-photo" src="tp_ubive/Public/admin/images/user.jpg" alt="Photo" />
						<span class="user-info">
							<small>Welcome,</small>
							Jason
						</span>

						<i class="ace-icon fa fa-caret-down"></i>
					</a>

					<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
						<li>
							<a href="/admin/index/logout">
								<i class="ace-icon fa fa-power-off"></i>
								退出
							</a>
						</li>
					</ul>
				</li>

			</ul>
		</div>
	</div>
</div>

		<div class="main-container" id="main-container">
            <div id="sidebar" class="sidebar responsive">
	<ul class="nav nav-list">
		<li class="<?php if($action == 'index'): ?>active<?php endif; ?>">
			<a href="/canmou/index">
				<i class="menu-icon fa fa-desktop"></i>
				<span class="menu-text">首页</span>
			</a>
			<b class="arrow"></b>
		</li>

        <li class="hsub <?php if($action == 'user_list' OR $action == 'admin_list'): ?>active open<?php endif; ?>">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-building-o"></i>
                <span class="menu-text"> 用户管理</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="<?php if($action == 'user_list'): ?>active<?php endif; ?>">
                    <a href="/canmou/user/index">
                        <i class="menu-icon fa fa-caret-right"></i>
                        用户列表
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="<?php if($action == 'admin_list'): ?>active<?php endif; ?>">
                    <a href="/canmou/user/admin ">
                        <i class="menu-icon fa fa-caret-right"></i>
                        后台用户
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="<?php if($action == 'role_man'): ?>active<?php endif; ?>">
                    <a href="/canmou/user/role">
                        <i class="menu-icon fa fa-caret-right"></i>
                        角色管理
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

        <li class="hsub <?php if($action == 'product_list' OR $action == 'product_cate'): ?>active open<?php endif; ?>">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-list-alt"></i>
                <span class="menu-text"> 商品管理</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="<?php if($action == 'product_list'): ?>active<?php endif; ?>">
                    <a href="/canmou/product/index">
                        <i class="menu-icon fa fa-caret-right"></i>
                        商品列表
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="<?php if($action == 'product_cate'): ?>active<?php endif; ?>">
                    <a href="/canmou/cate/index">
                        <i class="menu-icon fa fa-caret-right"></i>
                        商品类目
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <li class="<?php if($action == 'shop_list'): ?>active<?php endif; ?>">
            <a href="/canmou/shop/index">
                <i class="menu-icon fa fa-pencil-square-o"></i>
                <span class="menu-text">店铺管理</span>
            </a>
            <b class="arrow"></b>
        </li>
        <li class="<?php if($action == 'ad_list'): ?>active<?php endif; ?>">
            <a href="/canmou/ad/index">
                <i class="menu-icon fa fa-picture-o"></i>
                <span class="menu-text">广告管理</span>
            </a>
            <b class="arrow"></b>
        </li>

	</ul>
</div>
<!--begin-->
<div class="main-content"> 
   	<div class="page-content"> 
    	<div class="page-content-area">
    		<div class="row">
    			<div class="col-xs-12">
				    <div class="col-sm-9 infobox-container">
						<div class="infobox infobox-green">
							<div class="infobox-icon">
								<i class="ace-icon fa fa-comments"></i>
							</div>
							<div class="infobox-data">
								<span class="infobox-data-number"><?php echo ((isset($pronum) && ($pronum !== ""))?($pronum):"0"); ?></span>
								<div class="infobox-content">产品总数量</div>
							</div>
						</div>
						<div class="infobox infobox-blue">
							<div class="infobox-icon">
								<i class="ace-icon fa fa-user"></i>
							</div>
							<div class="infobox-data">
								<span class="infobox-data-number"><?php echo ((isset($adminnum) && ($adminnum !== ""))?($adminnum):"0"); ?></span>
								<div class="infobox-content">后台用户总数量</div>
							</div>
						</div>
                        <div class="infobox infobox-red">
                            <div class="infobox-icon">
                                <i class="ace-icon fa fa-user"></i>
                            </div>
                            <div class="infobox-data">
                                <span class="infobox-data-number"><?php echo ((isset($usernum) && ($usernum !== ""))?($usernum):"0"); ?></span>
                                <div class="infobox-content">用户总数</div>
                            </div>
                        </div>
                        <div class="infobox infobox-orange">
                            <div class="infobox-icon">
                                <i class="ace-icon fa fa-user"></i>
                            </div>
                            <div class="infobox-data">
                                <span class="infobox-data-number"><?php echo ((isset($shopnum) && ($shopnum !== ""))?($shopnum):"0"); ?></span>
                                <div class="infobox-content">店铺总数</div>
                            </div>
                        </div>
                        <div class="infobox infobox-pink">
                            <div class="infobox-icon">
                                <i class="ace-icon fa fa-shopping-cart"></i>
                            </div>
                            <div class="infobox-data">
                                <span class="infobox-data-number"><?php echo ((isset($shopnum) && ($shopnum !== ""))?($shopnum):"0"); ?></span>
                                <div class="infobox-content">订单总数</div>
                            </div>
                        </div>
				    </div>
			    </div>
			</div>
    	</div>
    </div>
</div>
<!--end-->
			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							Application &copy; 2013-2014
						</span>
					</div>
				</div>
			</div>
		</div>
    <script src="tp_ubive/Public/admin/js/jquery.min.js"></script>
<script src="tp_ubive/Public/admin/js/bootstrap.min.js"></script>

<script src="tp_ubive/Public/admin/js/ace.min.js"></script>


</body>
</html>