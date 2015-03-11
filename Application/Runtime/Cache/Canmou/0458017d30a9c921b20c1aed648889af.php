<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>管理员后台</title>
    <link rel="stylesheet" href="/Public/admin/css/bootstrap.min.css" />
<link rel="stylesheet" href="/Public/admin/css/font-awesome.min.css" />

<link rel="stylesheet" href="/Public/admin/css/ace.min.css"/>

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
						<img class="nav-user-photo" src="/Public/admin/images/user.jpg" alt="Photo" />
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
                <div class="page-header">
                    <b><h1>
                            <?php if(isset($ad)): ?>编辑广告
                                <?php else: ?>
                                添加广告<?php endif; ?>
                        </h1></b>
                </div>
                <?php
$messages = getMessages(); if(isset($messages)){ $type = $messages[0]['type']; $value = $messages[0]['value']; echo '<div class="alert alert-block alert-'.$type.'">
	<button type="button" class="close" data-dismiss="alert">
		<i class="ace-icon fa fa-times"></i>
	</button>提示：'.$value.'
    </div>'; } ?>

                <div class="row">
                    <div class="col-xs-12">
                        <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="col-sm-2 control-label no-padding-right" for="form-field-1">广告名称</label>
                                <div class="col-sm-8">
                                    <input type="text" id="form-field-1" class="col-xs-10 col-sm-6" name="name" value="<?php echo ($ad["name"]); ?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label no-padding-left" for="form-field-1">广告描述
                                </label>
                                <div class="col-sm-8">
                                    <input type="text" id="form-field-1" class="col-xs-10 col-sm-6" name="desc" value="<?php echo ($ad["desc"]); ?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label no-padding-left" for="form-field-1">图片
                                </label>
                                <div class="col-sm-8">
                                    <?php if($ad): ?><img src="<?php echo ($ad["img"]); ?>" width="190px" height="120px"><?php endif; ?>
                                    <input type="file" name="image_path" accept="image/*">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label no-padding-left" for="form-field-1">目标链接地址
                                </label>
                                <div class="col-sm-8">
                                    <input type="text" id="form-field-1" class="col-xs-10 col-sm-6" name="url" value="<?php echo ($ad["url"]); ?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label no-padding-left" for="form-field-1">类型
                                </label>
                                <div class="col-sm-8">
                                    <input type="text" id="form-field-1" class="col-xs-10 col-sm-6" name="type" value="<?php echo ($ad["type"]); ?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 no-padding-right control-label">状态</label>
                                <div class="radio">
                                    <?php if($ad["status"] == '0'): ?><label>
                                            <input type="radio" name="status" class="ace"  value="1"/>
                                            <span class="lbl">启用</span>
                                        </label>
                                        <label>
                                            <input type="radio" name="status" checked="checked" class="ace" value="0"/>
                                            <span class="lbl">禁用</span>
                                        </label>
                                        <?php else: ?>
                                        <label>
                                            <input type="radio" name="status" class="ace" checked="checked" value="1"/>
                                            <span class="lbl">启用</span>
                                        </label>
                                        <label>
                                            <input type="radio" name="status" class="ace"  value="0"/>
                                            <span class="lbl">禁用</span>
                                        </label><?php endif; ?>
                                </div>
                            </div>
                            <div class="clearfix form-actions">
                                <div class="col-md-offset-3 col-md-9">
                                    <button class="btn btn-info" type="submit">提交</button> &nbsp; &nbsp; &nbsp;
                                    <a href="/canmou/cate/index">
                                        <button class="btn" type="button">返回</button>
                                    </a>
                                </div>
                            </div>
                        </form>
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
<script src="/Public/admin/js/jquery.min.js"></script>
<script src="/Public/admin/js/bootstrap.min.js"></script>

<script src="/Public/admin/js/ace.min.js"></script>


</body>
</html>