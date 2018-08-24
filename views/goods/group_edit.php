
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- 满足有些用户在手机端访问的需要 -->

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <title>新建商品分组 - Bidcms开源电商</title>
    <!-- 线上环境 -->
        <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/css/component-min.css">    <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/plugins/jbox/jbox-min.css">

	<!-- diy css start-->
 <link rel="stylesheet" href="<?php echo API_STORE;?>statics/css/style.css">

	<link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/plugins/diy/diy-min.css">
<link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/plugins/uploadify/uploadify-min.css">
<link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/plugins/colorpicker/colorpicker.css">
<!-- diy css end-->

</head>
<body class="cp-bodybox">
<?php include "views/global_top.php";?>
<div class="container">
    <div class="inner clearfix">
        <div class="content-left fl">
         <?php include "views/global_nav.php";?>
		</div>
        <div class="content-right">
            <h1 class="content-right-title">新建商品分组</h1>

  <input type="hidden" name="content" value="<?php echo $info['content'];?>" id="j-initdata">
  <input type="hidden" class="j-pagetitle-ipt" value="新建商品分组">
  <input type="hidden" id="update_id" value="<?php echo $id;?>">
	<div class="diy clearfix">
		<div id="diy-phone">
			<div class="diy-phone-header">
				<i class="diy-phone-receiver"></i>
				<div class="diy-phone-title j-pagetitle">新建商品分组</div>
			</div>
			<div class="diy-phone-contain" id="diy-contain">
				<div class="nodrag"></div>
				<div class="drag"></div>
			</div>
			<i class="diy-phone-footer"></i>
		</div>

		<div id="diy-ctrl"></div>
	</div>

	<div class="diy-actions">
		<div class="diy-actions-addModules clearfix">
			<?php foreach($GLOBALS['widgets'] as $k=>$v){?>
			<a href="javascript:;" class="j-diy-addModule" data-type="<?php echo $k;?>"><i class="gicon-plus"></i><?php echo $v;?></a>
			<?php }?>
		</div>
		<div class="diy-actions-submit">
			<a href="javascript:;" class="btn btn-primary" id="j-savePage">保存</a>
			<a href="javascript:;" class="btn btn-primary" id="j-saveAndPrvPage">保存并预览</a>
		</div>
	</div>

        </div>
        <!-- end content-right -->

        <a href="javascript:;" class="btn-leftMenuFold" id="j-btn-leftMenuFold" ></a>
    </div>
</div>
<!-- end container -->

<!-- end footer -->
    <div class="fixedBar">
        <ul>
            <li class="shopManager3"><a href="javascript:;" data-target="#shop_3">商品管理</a></li><li class="shopManager4"><a href="javascript:;" data-target="#shop_4">分组管理</a></li><li class="shopManager5"><a href="javascript:;" data-target="#shop_5">批量导入</a></li>        </ul>
        <a href="javascript:;" class="fixedBar-btn" id="j-fixedBar-btn"></a>
    </div><a href="#" id="j-gotop" class="gotop" title="回到顶部"></a>
<!-- end gotop -->
<?php include "views/global_template.php";?>
<?php echo file_get_contents(API_STORE.'data/widget/cache.html');?>

<?php echo file_get_contents(API_STORE.'data/template/GoodsGroup/content.html');?>
<?php echo file_get_contents(API_STORE.'data/template/GoodsGroup/control.html');?>
<?php include "views/global_footer.php";?>

<!--end front template  -->
<!-- diy js start-->
<script src="<?php echo SITE_ROOT;?>statics/plugins/ueditor/diyUeditor-min.js"></script>
<script src="<?php echo SITE_ROOT;?>statics/plugins/uploadify/jquery.uploadify.min.js?ver=2554"></script>
<script src="<?php echo SITE_ROOT;?>statics/js/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo SITE_ROOT;?>statics/plugins/diy/diy-min.js"></script>
<script src="<?php echo API_STORE;?>data/template/GoodsGroup/common.js"></script>
<script src="<?php echo SITE_ROOT;?>statics/plugins/colorpicker/colorpicker.js"></script><!-- diy js end -->

<script src="<?php echo SITE_ROOT;?>statics/js/dist/Item/<?php echo $id>0?'edit':'add';?>_group.js"></script>

<!-- end session hint -->
</body>
</html>
<!-- 20170105 -->
