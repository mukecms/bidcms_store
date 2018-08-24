
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <title>店铺导航 - Bidcms开源电商</title>
    <!-- 线上环境 -->
        <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/css/component-min.css">
        <link rel="stylesheet" href="statics/plugins/jbox/jbox-min.css">

	<!-- diy css start-->
<link rel="stylesheet" href="<?php echo API_STORE;?>statics/css/style.css">

	<link rel="stylesheet" href="statics/plugins/diy/diy-min.css">
<link rel="stylesheet" href="statics/plugins/uploadify/uploadify-min.css">
<link rel="stylesheet" href="statics/plugins/colorpicker/colorpicker.css">
<!-- diy css end-->
	<link rel="stylesheet" href="<?php echo API_STORE;?>statics/css/Shop/navigation.css">

</head>
<body class="cp-bodybox">
<?php include "views/global_top.php";?>

<div class="container">
<div class="inner clearfix">
<div class="content-left fl"><?php include "views/global_nav.php";?></div>
<!-- end content-left -->

<div class="content-right">


    <h1 class="content-right-title">店铺导航<a class="gicon-info-sign gicon_linkother" href="//www.wifenxiao.com/Index/help_show/lm/help/id/34.html" target="_blank"></a></h1>


	<input type="hidden" name="content" value="<?php echo $content;?>" id="j-initdata">
	<input type="hidden" name="template_id" value='<?php echo $info['id'];?>' id="j-pageID">

	<div class="diy clearfix">
		<div id="diy-phone">
			<div class="diy-phone-header">
				<i class="diy-phone-receiver"></i>
				<div class="diy-phone-title">导航设置</div>
			</div>
			<div class="diy-phone-contain" id="diy-contain">
				<div class="nodrag"></div>
				<!-- <div class="drag"></div> -->
			</div>
			<i class="diy-phone-footer"></i>
		</div>

		<div id="diy-ctrl"></div>
	</div>

	<div class="diy-actions">
		<div class="diy-actions-submit">
			<a href="javascript:;" class="btn btn-primary" id="j-savePage">保存</a>
		</div>
	</div>



</div>
<!-- end content-right -->
</div>
</div>
<!-- end container -->

<!--gonggao-->
<!-- end footer -->
    <div class="fixedBar" style="right: 5px;">
	<ul>
		<li class="shopManager0 cur"><a href="javascript:;" data-target="#shop_0">店铺管理</a></li><li class="shopManager1"><a href="javascript:;" data-target="#shop_1">自定义专题</a></li>
	</ul>
	<a href="javascript:;" class="fixedBar-btn" id="j-fixedBar-btn"></a>
</div>
<!-- end gotop -->


<?php include "views/global_template.php";?>
<?php echo file_get_contents (API_STORE.'data/widget/Navigation/content.html');?>
<?php echo file_get_contents (API_STORE.'data/widget/Navigation/control.html');?>
<?php include "views/global_footer.php";?>
<!-- diy js start-->
<script src="<?php echo SITE_ROOT;?>statics/plugins/ueditor/diyUeditor-min.js"></script>
<script src="<?php echo SITE_ROOT;?>statics/plugins/uploadify/jquery.uploadify.min.js?ver=4898"></script>
<script src="<?php echo SITE_ROOT;?>statics/js/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo SITE_ROOT;?>statics/plugins/diy/diy-min.js"></script>
<script src="<?php echo SITE_ROOT;?>statics/plugins/colorpicker/colorpicker.js"></script><!-- diy js end -->
<script src="<?php echo SITE_ROOT;?>statics/js/dist/Shop/navigation.js"></script>



</body>
</html>
<!-- 20160505 -->
