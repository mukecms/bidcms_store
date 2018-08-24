<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- 满足有些用户在手机端访问的需要 -->

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <title>编辑店铺主页 - Bidcms开源电商</title>
    <!-- 线上环境 -->
	<link rel="stylesheet" href="statics/css/component-min.css">
	<link rel="stylesheet" href="statics/plugins/jbox/jbox-min.css">

	<!-- diy css start-->
  <link rel="stylesheet" href="<?php echo API_STORE;?>statics/css/style.css">
	<link rel="stylesheet" href="statics/plugins/swiper/swiper.min.css">
	<link rel="stylesheet" href="statics/plugins/diy/diy-min.css">
	<link rel="stylesheet" href="statics/plugins/uploadify/uploadify-min.css">
	<link rel="stylesheet" href="statics/plugins/colorpicker/colorpicker.css">
	<!-- diy css end-->
	<link rel="stylesheet" href="<?php echo API_STORE;?>data/template/<?php echo $tid;?>/style.css">
	<link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/css/Shop/edit_homepage.css">
	<style>
		.diy-ctrl-item::before{z-index: 9;}
		.diy-ctrl-item::after{z-index: 8;}
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
            <h1 class="content-right-title">编辑店铺主页<a class="gicon-info-sign" href="//www.wifenxiao.com/Index/help_show/lm/help/id/30.html" target="_blank"></a></h1>


			<div class="alert alert-info disable-del">为了保障会员访问速度,店铺首页做了缓存处理。后台装修后,手机端会有十分钟左右的延迟。</div>
			<input type="hidden" name="content" value="<?php echo $homepage['content'];?>" id="j-initdata">
			<input type="hidden" name="update_id" value="<?php echo $homepage['id'];?>" id="j-pageId">
			<input type="hidden" name="theme_id" value="<?php echo $tid;?>" id="j-themeId">
			<input type="hidden" name="bak_id" value="<?php echo $homepage_id;?>" id="j-bakId">
			<div class="diy clearfix">
				<div id="diy-phone">
					<div class="diy-phone-header">
						<i class="diy-phone-receiver"></i>
						<div class="diy-phone-title j-pagetitle">店铺主页</div>
					</div>
					<div class="diy-phone-contain" id="diy-contain">
						<div class="nodrag" ></div>
						<div class="drag"></div>
					</div>
					<i class="diy-phone-footer"></i>
				</div>

				<div id="diy-ctrl">
					<div class="diy-ctrl-item" data-origin="pagetitle" style="margin-top:85px;">
						<div class="formitems">
						    <label class="fi-name">页面标题：</label>
						    <div class="form-controls">
						        <input type="text" class="input j-pagetitle-ipt" value="店铺主页">
						    </div>
						</div>

						<div class="formitems">
								<label class="fi-name">页面布局：</label>
								<div class="form-controls">
									<div class="radio-group">
										<label><input type="radio" name="hasMargin" class="j-page-hasMargin" value="1">有边距</label>
										<label><input type="radio" name="hasMargin" class="j-page-hasMargin" value="0">无边距</label>
									</div>
								</div>
							</div>
						<div class="formitems">
							<label class="fi-name">页面背景色：</label>
							<div class="form-controls">
								<a href="javascript:;" class="colorPicker" id="j-page-backgroundColor" data-color="#F8F8F8">点击选择</a>
							</div>
						</div>
						
					</div>
				</div>
			</div>

			<div class="diy-actions">
				<div class="diy-actions-addModules clearfix">
					<a href="javascript:;" class="j-page-addModule" data-type="0"><i class="gicon-cog"></i>页面设置</a>
					<?php foreach($GLOBALS['widgets'] as $k=>$v){?>
					<a href="javascript:;" class="j-diy-addModule" data-type="<?php echo $k;?>"><i class="gicon-plus"></i><?php echo $v;?></a>
					<?php }?>
				</div>
				<div class="diy-actions-submit">
					<a href="javascript:;" class="btn btn-primary" id="j-savePage">保存</a>
					<a href="javascript:;" class="btn btn-success" id="j-saveAndPrvPage">保存并预览</a>
		            <a href="javascript:;" class="btn btn-warning" id="j-homeRecover">还原默认数据</a>
		            <a href="javascript:;" class="btn btn-warning" id="j-backups">装修数据备份</a>
				</div><!-- 技 -->
			</div>

        </div>
        <!-- end content-right -->

        <a href="javascript:;" class="btn-leftMenuFold" id="j-btn-leftMenuFold"></a>
    </div>
</div>
<!-- end container -->

<div class="fixedBar">
    <ul>
        <li class="shopManager0"><a href="javascript:;" data-target="#shop_0">店铺管理</a></li><li class="shopManager1"><a href="javascript:;" data-target="#shop_1">自定义专题</a></li>        </ul>
    <a href="javascript:;" class="fixedBar-btn" id="j-fixedBar-btn"></a>
</div>
<a href="#" id="j-gotop" class="gotop" title="回到顶部"></a>
<!-- end gotop -->


<?php include "views/global_template.php";?>
<?php echo file_get_contents(API_STORE.'data/widget/cache.html');?>

<script type="text/j-template" id="tpl_popup_selectBackups">
	<div class="Backups_list">
		<ul>
			<% if(lists.length){ %>
				<% _.each(lists,function(item){ %>
				<li>
					<h2 class="J-rename" data-id="<%= item.id %>"><%= item.name %><i class="edit-rename J-edit-rename"></i></h2>
					<p><%= item.add_time %></p>
					<div class="edit_Backups_action">
						<a href="index.php?con=shop&act=edit_home&hid=<%= item.id %>" class="btn btn-success" data-id="<%= item.id %>">读取</a>
						<a href="javascript:;" class="btn btn-danger J-delData" data-id="<%= item.id %>">删除</a>
					</div>
				</li>
				<% }) %>
			<% } else { %>
				<div class="J_noData" style="line-height:50px; text-align:center;font-size:18px;color:#ccc;">无备份数据</div>
			<% } %>
		</ul>
		<div class="add_Backups_action">
			<a href="javascript:;" class="add_Backups btn btn-primary J_add_Backups">新增备份</a>
		</div>
	</div>
</script>

<script type="text/j-template" id="tpl_popup_addBackups">
	<li>
		<h2 class="J-rename" data-id="<%= id %>"><%= name %><i class="edit-rename J-edit-rename"></i></h2>
		<p><%= add_time %></p>
		<div class="edit_Backups_action">
			<a href="index.php?con=shop&act=edit_home&hid=<%= id %>" class="btn btn-success J-getData" data-id="<%= id %>">读取</a>
			<a href="javascript:;" class="btn btn-danger J-delData" data-id="<%= id %>">删除</a>
		</div>
	</li>
</script>


<?php echo file_get_contents(API_STORE.'data/template/'.$tid.'/content.html');?>
<?php echo file_get_contents(API_STORE.'data/template/'.$tid.'/control.html');?>

<!--end front template  -->

<?php include "views/global_footer.php";?>

<!-- diy js start-->
<script src="<?php echo SITE_ROOT;?>statics/plugins/ueditor/diyUeditor-min.js"></script>
<script src="<?php echo SITE_ROOT;?>statics/plugins/uploadify/jquery.uploadify.min.js?ver=1657"></script>
<script src="<?php echo SITE_ROOT;?>statics/js/jquery-ui/jquery-ui.min.js"></script>

<script src="<?php echo SITE_ROOT;?>statics/plugins/diy/diy-min.js"></script>
<script src="<?php echo API_STORE;?>data/template/<?php echo $tid;?>/common.js"></script>
<script src="<?php echo SITE_ROOT;?>statics/plugins/colorpicker/colorpicker.js"></script><!-- diy js end -->
<script src="<?php echo SITE_ROOT;?>statics/js/dist/Shop/edit_homepage.js"></script>
<script>
	$(document).ready(function() {
		// 控制添加商品的图片显示高度，确保商品布局正常
		$('.b_mingoods,.mingoods').each(function(index, el) {
            var me = $(this),
                imgHeight = me.find('img').width();
            me.find('img').closest('a').height(imgHeight);
        });
        $('.board3').each(function(index, el) {
            var me = $(this);
            var bwidth = me.width();
            if(me.hasClass('small_board') || !me.hasClass('big_board')){
                me.children('span').attr('style', 'height:'+bwidth+'px !important;overflow:hidden;');
            }
            if(me.hasClass('big_board')){
                me.children('span').attr('style', 'height:'+(bwidth*2+9)+'px !important;overflow:hidden;');
            }
        });

	});
</script>



</body>
</html>
<!-- 20160922 -->
