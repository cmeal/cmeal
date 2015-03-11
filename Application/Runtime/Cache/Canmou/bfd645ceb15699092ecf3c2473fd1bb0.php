<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>管理员后台</title>
    <link rel="stylesheet" href="/Public/admin/css/bootstrap.min.css" />
<link rel="stylesheet" href="/Public/admin/css/font-awesome.min.css" />

<link rel="stylesheet" href="/Public/admin/css/ace.min.css"/>

    <link rel="stylesheet" href="/Public/admin/css/webuploader.css"/>
    <link rel="stylesheet" href="/Public/admin/css/uploaderstyle.css"/>
    <link rel="stylesheet" href="/Public/admin/css/dropzone.css"/>
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
                            <?php if(isset($product)): ?>编辑商品
                                <?php else: ?>添加商品<?php endif; ?></h1></b>
                </div>
                <?php
$messages = getMessages(); if(isset($messages)){ $type = $messages[0]['type']; $value = $messages[0]['value']; echo '<div class="alert alert-block alert-'.$type.'">
	<button type="button" class="close" data-dismiss="alert">
		<i class="ace-icon fa fa-times"></i>
	</button>提示：'.$value.'
    </div>'; } ?>

                <div class="row">
                    <div class="col-xs-12">
                        <form class="form-horizontal row-border" id="validate"  method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="files" id="files" value="">
                            <input type="hidden" name="cover" id="cover" value="<?php echo ($product["main_image"]); ?>">
                            <div class="form-group">
                                <label class="col-sm-2 control-label no-padding-right" for="form-field-1">商品标题</label>
                                <div class="col-sm-10">
                                    <input type="text" id="form-field-1" class="col-xs-10 col-sm-6" name="title" value="<?php echo ($product["title"]); ?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label no-padding-left" for="form-field-1">商品类别
                                </label>
                                <div class="col-sm-3">
                                    <select name="cid" class="form-control" id="form-field-select-1" >
                                        <?php if($product["cid"] != '0' AND $product["cid"] != null): ?><option value="<?php echo ($product["cid"]); ?>"><?php echo ($product["cate_name"]); ?></option>
                                            <?php else: ?>
                                            <option value="">请选择</option><?php endif; ?>

                                        <?php if(is_array($cates)): $i = 0; $__LIST__ = $cates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?><option value="<?php echo ($cate["cid"]); ?>"><?php echo ($cate["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label no-padding-left" for="form-field-1">店主
                                </label>
                                <div class="col-sm-3">
                                    <select class="form-control" id="form-field-select-1" name="shop_id">
                                        <?php if($product["shop_id"] != '0' AND $product["shop_id"] != null): ?><option value="<?php echo ($product["shop_id"]); ?>"><?php echo ($product["shop_name"]); ?></option>
                                            <?php else: ?>
                                            <option value="">请选择</option><?php endif; ?>
                                        <?php if(is_array($shops)): $i = 0; $__LIST__ = $shops;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$shop): $mod = ($i % 2 );++$i;?><option value="<?php echo ($shop["sid"]); ?>"><?php echo ($shop["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label no-padding-left" for="form-field-1">成本价格
                                </label>
                                <div class="col-sm-6">
                                    <input type="number" id="form-field-1" class="col-xs-10 col-sm-6" name="cost" value="<?php echo ($product["cost"]); ?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label no-padding-left" for="form-field-1">销售价格
                                </label>
                                <div class="col-sm-6">
                                    <input type="number" id="form-field-1" class="col-xs-10 col-sm-6" name="sell_price" value="<?php echo ($product["sell_price"]); ?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label no-padding-left" for="form-field-1">销售单位
                                </label>
                                <div class="col-sm-2">
                                    <select class="form-control" id="form-field-select-1" name="pro_size">
                                        <?php if($product["pro_size"] != '0' AND $product["pro_size"] != null): ?><option value="<?php echo ($product["pro_size"]); ?>"><?php echo ($product["pro_size"]); ?></option>
                                            <?php else: ?>
                                            <option value="">请选择</option><?php endif; ?>
                                        <?php if(is_array($size)): foreach($size as $key=>$s): ?><option value="<?php echo ($s); ?>"><?php echo ($s); ?></option><?php endforeach; endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label no-padding-left" for="form-field-1">会员价格
                                </label>
                                <div class="col-sm-6">
                                    <input type="number" id="form-field-1" class="col-xs-10 col-sm-6" name="vip_price" value="<?php echo ($product["vip_price"]); ?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label no-padding-left" for="form-field-1">详情
                                </label>
                                <div class="col-sm-10">
                                    <link rel="stylesheet" type="text/css" href="/Public/admin/js/umeditor/themes/default/css/umeditor.min.css"/>
                                    <!-- 加载编辑器的容器 -->
                                    <!-- 从数据库中取出文章内容打印到此处 -->
                                    <script id="myEditor" name="body" type="text/plain" style="height:300px;width:700px"><?php echo ($product["body"]); ?></script>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">
                                    商品图片：
                                </label>
                                <div class="col-md-8">
                                    <div class="dropzone"></div>
                                    <p class="help-block">
                                        仅限上传图片
                                    </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 no-padding-right control-label">状态</label>
                                <div class="radio">
                                    <?php if($product["status"] == '0'): ?><label>
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
                            <div class="form-group form-actions">
                                <label class="col-md-3 control-label hidden-xs"></label>
                                <div class="col-md-9">
                                    <input type="submit" value="保存" class="btn btn-primary submit-all">
                                    <a href="" class="btn">返回商品列表</a>
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



<script src="/Public/admin/js/dropzone/dropzone.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var b=JSON.stringify(<?php echo (json_encode($product["files"])); ?>);
//        console.log(<?php echo (json_encode($product["files"])); ?>);
//        console.log(b);
        $('#files').val(b);

        var dDropzone = $('.dropzone');
        if (dDropzone.length) {
            var coverFile='<?php echo ($product["main_image"]); ?>';
            try {
                dDropzone.dropzone({
                    paramName: "files",
                    url: "/canmou/product/fileupload",
                    autoProcessQueue: false,
                    uploadMultiple: true,
                    parallelUploads: 10,
                    maxFilesize: 2,
                    // maxFiles: 10,
                    addRemoveLinks : true,
                    acceptedFiles: ".jpeg,.jpg,.png,.gif,.JPEG,.JPG,.PNG,.GIF",
                    dictResponseError: '上传文件发生错误',
                    dictRemoveFile: '删除',
                    dictMaxFilesExceeded: '上传失败，超过上传限制',
                    init: function() {
                        var myDropzone = this;
                        myDropzone.on('addedfile', function(file) {
                            var btnSetCover = $('<a class="dz-cover">设为首图</a>');
                            if(file.name==coverFile){
                                btnSetCover.addClass('selected');
                            }
                            btnSetCover.click(function(e) {
                                dDropzone.find('> div.dz-preview > a.dz-cover.selected').removeClass('selected');
                                $(this).addClass('selected');
                                coverFile = file.name;
                            });
                            $(file.previewElement).append(btnSetCover);
                        });
                        myDropzone.on('successmultiple', function(files, response) {

                            //console.log(response);//response is json type
                            var file = $.parseJSON(response);//php encode a array,this is object or is a array
                            var oldfile = $.parseJSON($('#files').val());
                            if(oldfile==null){
                                oldfile=new Array();
                            }
                            //console.log(file);
                            for(i in file){
                                if(file[i]){
                                    oldfile.push(file[i]);
                                }
                                if(i==coverFile){
                                    $('#cover').val(file[i]);//find the main img
                                }
                            }
                            //encode method,encode a array//php decode method.after is a array
                            $('#files').val(JSON.stringify(oldfile));
                            $('#validate').submit();
                        });
                        myDropzone.on('removedfile', function(file) {
//                            var files = $.parseJSON($('#files').val()), newfiles = [], i;
                            var files = $.parseJSON($('#files').val()),newfiles = [],i;
                            console.log(files);
                            for (i in files) {
                                if(files[i]!=file.name){
                                    newfiles.push(files[i]);
                                }
                            }
                            var a = JSON.stringify(newfiles);
                            $('#files').val(JSON.stringify(newfiles));
                        });
                        <?php if(is_array($product[files])): foreach($product[files] as $key=>$pro): ?>var fname="<?php echo ($pro); ?>";
                            var mockFile = {name:fname,size:"1024"};
                            myDropzone.emit("addedfile", mockFile);
                            myDropzone.emit("thumbnail", mockFile, "/Public/upload/pro_img/<?php echo ($pro); ?>" );<?php endforeach; endif; ?>
                        $(".submit-all").click(function(e){
                            e.preventDefault();
//                                    var result = $('#validate').valid();
                            if (myDropzone.getQueuedFiles().length) {
                                myDropzone.processQueue();
                            } else {
//                                $('#cover').val(coverFile);
                                $('#validate').submit();
                            }
                        });
                    }
                });
            } catch(e) {
                alert('批量上传图片不支持老版本浏览器，请更换浏览器重试');
            }
        };
    });
</script>
<!-- 配置文件 -->
<script type="text/javascript" src="/Public/admin/js/umeditor/umeditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/Public/admin/js/umeditor/umeditor.min.js"></script>
<!-- 实例化编辑器 -->
<script type="text/javascript">
    var um = UM.getEditor('myEditor');
</script>
</body>
</html>