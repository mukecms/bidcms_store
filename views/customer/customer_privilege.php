
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- 满足有些用户在手机端访问的需要 -->

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <title>会员权益 - Bidcms开源电商</title>
    <!-- 线上环境 -->
        <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/css/component-min.css">
        <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/plugins/jbox/jbox-min.css">

	<!-- diy css start-->
<link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/mobile/css/style.css">

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
        <!-- end content-left -->

        <div class="content-right">
            <h1 class="content-right-title">会员权益<a class="gicon-info-sign gicon_linkother" href="//www.wifenxiao.com/Index/help_show/lm/help/id/54.html" target="_blank"></a></h1>


  <textarea style="display:none;" name="content" id="j-initdata"><?php echo $content;?></textarea>

	<div class="diy clearfix">
		<div id="diy-phone">
			<div class="diy-phone-header">
				<i class="diy-phone-receiver"></i>
				<div class="diy-phone-title">会员权益</div>
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
		<div class="diy-actions-submit">
			<a href="javascript:;" class="btn btn-primary" id="j-savePage">保存</a>
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
            <li class="shopManager8"><a href="javascript:;" data-target="#shop_8">会员管理</a></li>
        </ul>
        <a href="javascript:;" class="fixedBar-btn" id="j-fixedBar-btn"></a>
    </div><a href="#" id="j-gotop" class="gotop" title="回到顶部"></a>
<!-- end gotop -->


<?php include "views/global_template.php";?>
<!-- end tpl_popup_selectBackups-->
<?php include "views/global_footer.php";?>

<?php echo file_get_contents(API_STORE.'data/widget/1/content.html');?>
<?php echo file_get_contents(API_STORE.'data/widget/1/control.html');?>
	<!-- diy js start-->
 	<script src="<?php echo SITE_ROOT;?>statics/plugins/ueditor/diyUeditor-min.js"></script>
	<script src="<?php echo SITE_ROOT;?>statics/plugins/uploadify/jquery.uploadify.min.js?ver=1555"></script>
	<script src="<?php echo SITE_ROOT;?>statics/js/jquery-ui/jquery-ui.min.js"></script>
	<script src="<?php echo SITE_ROOT;?>statics/plugins/diy/diy-min.js"></script>
	<script src="<?php echo SITE_ROOT;?>statics/plugins/colorpicker/colorpicker.js"></script><!-- diy js end -->
	<script src="<?php echo SITE_ROOT;?>statics/js/dist/User/privilege.js"></script>



</body>
</html>
<!-- 20170105 -->
