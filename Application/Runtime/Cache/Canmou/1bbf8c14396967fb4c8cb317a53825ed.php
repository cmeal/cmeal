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
                <div class="row">
                    <div class="col-xs-12">
                        <h3 class="header smaller lighter blue">店铺列表</h3>
                        <?php
$messages = getMessages(); if(isset($messages)){ $type = $messages[0]['type']; $value = $messages[0]['value']; echo '<div class="alert alert-block alert-'.$type.'">
	<button type="button" class="close" data-dismiss="alert">
		<i class="ace-icon fa fa-times"></i>
	</button>提示：'.$value.'
    </div>'; } ?>

                        <div>
                            <div id="sample-table-2_wrapper" class="dataTables_wrapper form-inline no-footer">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <a href="/canmou/shop/add">
                                            <button class="btn btn-info">添加店铺</button>
                                        </a>
                                    </div>
                                    <div class="col-xs-6">
                                    </div>
                                </div>
                                <table id="sample-table-2" class="table table-striped table-bordered table-hover dataTable no-footer">
                                    <thead>
                                    <tr role="row">
                                        <th width="60px" class="center sorting_disabled">
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace">
                                                <span class="lbl"></span>
                                            </label>
                                        </th>
                                        <th>店铺名称</th>
                                        <th width="200px">店铺描述</th>
                                        <th width="180px">店铺地址</th>
                                        <th width="180px">添加时间</th>
                                        <th width="80px">状态</th>
                                        <th width="100px">操作</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php if(is_array($shops)): $i = 0; $__LIST__ = $shops;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$shop): $mod = ($i % 2 );++$i;?><tr role="row" class="even">
                                            <td class="center">
                                                <label class="position-relative">
                                                    <input type="checkbox" class="ace">
                                                    <span class="lbl"></span>
                                                </label>
                                            </td>
                                            <td><?php echo ($shop['name']); ?></td>
                                            <td><?php echo ($shop['desc']); ?></td>
                                            <td><?php echo ($shop['address']); ?></td>
                                            <td><?php echo (date("Y-m-d H:m:s",$shop['created'])); ?></td>
                                            <td>
                                                <?php if($shop['status'] == 1): ?><span class="label label-sm label-info">启用</span>
                                                    <?php else: ?>
                                                    <span class="label label-sm label-warning">禁用</span><?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="hidden-sm hidden-xs action-buttons">
                                                    <a class="green" href="/canmou/shop/edit?id=<?php echo ($shop['sid']); ?>" >
                                                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                    </a>
                                                    <!--delete action-->
                                                    <a class="green" href="/canmou/shop/delete?id=<?php echo ($shop['sid']); ?>" >
                                                        <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="dataTables_info" id="sample-table-2_info" role="status" aria-live="polite">
                                            共<?php echo ((isset($count) && ($count !== ""))?($count):0); ?>条记录
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                    </div>
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
<script src="/Public/admin/js/jquery.min.js"></script>
<script src="/Public/admin/js/bootstrap.min.js"></script>

<script src="/Public/admin/js/ace.min.js"></script>


</body>
</html>