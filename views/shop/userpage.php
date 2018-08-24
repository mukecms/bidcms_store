<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <title>会员主页 - Bidcms开源电商</title>
    <!-- 线上环境 -->
<link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/css/component-min.css">
<link rel="stylesheet" href="statics/plugins/jbox/jbox-min.css">

	<!-- diy css start-->
<link rel="stylesheet" href="<?php echo API_STORE;?>statics/css/style.css">
<link rel="stylesheet" href="statics/plugins/diy/diy-min.css">
<link rel="stylesheet" href="statics/plugins/uploadify/uploadify-min.css">
<link rel="stylesheet" href="statics/plugins/colorpicker/colorpicker.css">
<!-- diy css end-->
	<link rel="stylesheet" href="<?php echo API_STORE;?>data/template/UserCenter_style1/index.css">
	<link rel="stylesheet" href="<?php echo API_STORE;?>data/template/UserCenter_style2/index.css">
    <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/css/Shop/user_center.css">
    <style>
	.u-id-s2-links .link .num{right:18px;}
    </style>

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


    <h1 class="content-right-title">会员主页<a class="gicon-info-sign gicon_linkother" href="//www.wifenxiao.com/Index/help_show/lm/help/id/33.html" target="_blank"></a></h1>


	<textarea style="display:none;" name="content" id="j-initdata"><?php echo $content;?></textarea>
	<input type="hidden" name="template_id" value='1' id="j-pageID">

	<div class="diy clearfix">
		<div id="diy-phone">
			<div class="diy-phone-header">
				<i class="diy-phone-receiver"></i>
				<div class="diy-phone-title j-pagetitle">会员主页</div>
			</div>
			<div class="diy-phone-contain" id="diy-contain">
				<div class="nodrag"></div>
				<div class="drag"></div>
			</div>
			<i class="diy-phone-footer"></i>
		</div>

		<div id="diy-ctrl">
			<div class="diy-ctrl-item" data-origin="pagetitle" style="margin-top:85px;">
				<div class="formitems">
				    <label class="fi-name">页面标题：</label>
				    <div class="form-controls">
				        <input type="text" class="input j-pagetitle-ipt" value="会员主页">
				    </div>
				</div>
			</div>
		</div>
	</div>

	<div class="diy-actions">
		<div class="diy-actions-submit">
			<a href="javascript:;" class="btn btn-primary" id="j-savePage">保存更改</a>
			<a href="javascript:;" class="btn btn-success" id="j-changeTpl">更换模板</a>
		</div>

	</div>

</div>
<!-- end content-right -->
</div>
</div>
<!-- end container -->

<!-- end footer -->
<div class="fixedBar" style="right: 5px;">
	<ul>
		<li class="shopManager0 cur"><a href="javascript:;" data-target="#shop_0">店铺管理</a></li><li class="shopManager1"><a href="javascript:;" data-target="#shop_1">自定义专题</a></li>
	</ul>
	<a href="javascript:;" class="fixedBar-btn" id="j-fixedBar-btn"></a>
</div>
<!-- end gotop -->


<?php include "views/global_template.php";?>
<?php echo file_get_contents(API_STORE.'data/template/UserCenter_style1/content.html');?>
<?php echo file_get_contents(API_STORE.'data/template/UserCenter_style1/control.html');?>
<?php echo file_get_contents(API_STORE.'data/template/UserCenter_style2/content.html');?>
<?php echo file_get_contents(API_STORE.'data/template/UserCenter_style2/control.html');?>

<script type="text/j-template" id="tpl_popup_user_center_chagneTpl">
	<div class="templates clearfix">
		<a href="javascript:;" <%if(tplName=='UserCenter_style1'){%>class="cur"<%}%> data-tplname="UserCenter_style1">
			<div class="img">
				<img src="<?php echo API_STORE;?>data/template/UserCenter_style1/usercenter_tpl_1.jpg" alt="">
				<span></span>
			</div>
			<p>模板一</p>
		</a>
		<a href="javascript:;" <%if(tplName=='UserCenter_style2'){%>class="cur"<%}%> data-tplName="UserCenter_style2">
			<div class="img">
				<img src="<?php echo API_STORE;?>data/template/UserCenter_style2/usercenter_tpl_2.jpg" alt="">
				<span></span>
			</div>
			<p>模板二</p>
		</a>
	</div>
</script>

<!--end front template  -->

<?php include "views/global_footer.php";?>

<!-- diy js start-->
<script src="<?php echo SITE_ROOT;?>statics/plugins/ueditor/diyUeditor-min.js"></script>
<script src="<?php echo SITE_ROOT;?>statics/plugins/uploadify/jquery.uploadify.min.js?ver=803"></script>
<script src="<?php echo SITE_ROOT;?>statics/js/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo SITE_ROOT;?>statics/plugins/diy/diy-min.js"></script>
<script src="<?php echo SITE_ROOT;?>statics/plugins/colorpicker/colorpicker.js"></script><!-- diy js end -->
<script src="<?php echo SITE_ROOT;?>statics/js/dist/Shop/user_center.js"></script>

</body>
</html>
<!-- 20160505 -->
