<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>管理员后台</title>
    <link rel="stylesheet" href="/Public/admin/css/bootstrap.min.css" />
<link rel="stylesheet" href="/Public/admin/css/font-awesome.min.css" />

<link rel="stylesheet" href="/Public/admin/css/ace.min.css"/>

    <link rel="stylesheet" href="/Public/admin/css/nestable.css"/>
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
                    <h1>类目列表</h1>'
                    <?php
$messages = getMessages(); if(isset($messages)){ $type = $messages[0]['type']; $value = $messages[0]['value']; echo '<div class="alert alert-block alert-'.$type.'">
	<button type="button" class="close" data-dismiss="alert">
		<i class="ace-icon fa fa-times"></i>
	</button>提示：'.$value.'
    </div>'; } ?>

                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="dd" id="nestable">
                                    <ol class="dd-list">
                                        <?php if(is_array($cateList)): foreach($cateList as $key=>$cate): ?><li class="dd-item" data-id="<?php echo ($cate["cid"]); ?>">
                                            <div class="dd-handle">
                                                <?php echo ($cate["name"]); ?>
                                                <div class="pull-right action-buttons">
                                                    <a class="blue" href="/canmou/cate/edit?id=<?php echo ($cate["cid"]); ?>">
                                                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                    </a>
                                                    <a class="red" href="/canmou/cate/delete?id=<?php echo ($cate["cid"]); ?>">
                                                        <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <?php if($cate["children"] != null): ?><ol class="dd-list">
                                                <?php if(is_array($cate["children"])): foreach($cate["children"] as $key=>$va): ?><li class="dd-item item-blue2" data-id="<?php echo ($va["cid"]); ?>">
                                                    <div class="dd-handle"><?php echo ($va["name"]); ?>
                                                        <div class="pull-right action-buttons">
                                                            <a class="blue" href="/canmou/cate/edit?id=<?php echo ($va["cid"]); ?>">
                                                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                            </a>
                                                            <a class="red" href="/canmou/cate/delete?id=<?php echo ($va["cid"]); ?>">
                                                                <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </li><?php endforeach; endif; ?>
                                            </ol><?php endif; ?>
                                        </li><?php endforeach; endif; ?>
                                    </ol>

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


<script src="/Public/admin/js/jquery.nestable.min.js"></script>
<script type="text/javascript">
    jQuery(function($){
        $('#nestable').nestable({
            group: 1,
            maxDepth: 2
        }).on("change", function() {
            $.post('/canmou/cate/ajaxorder', {
                list: JSON.stringify($('#nestable').nestable('serialize'))
            }, function(data) {
                if (data){
                    alert('类目更新成功');
                }else{
                    alert('类目更新失败');
                };
            }, 'json');
        });
        $('.dd-handle a').on('mousedown', function(e){
            e.stopPropagation();
        });
    });
</script>
</body>
</html>