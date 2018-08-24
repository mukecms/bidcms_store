<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- 满足有些用户在手机端访问的需要 -->

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <title>编辑专题页面 - Bidcms开源电商</title>
    <!-- 线上环境 -->
        <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/css/component-min.css">
        <link rel="stylesheet" href="statics/plugins/jbox/jbox-min.css">

	<!-- diy css start-->
<link rel="stylesheet" href="<?php echo API_STORE;?>statics/mobile/css/style.css">

	<link rel="stylesheet" href="statics/plugins/diy/diy-min.css">
<link rel="stylesheet" href="statics/plugins/uploadify/uploadify-min.css">
<link rel="stylesheet" href="statics/plugins/colorpicker/colorpicker.css">
<!-- diy css end-->
	<style>
	.colorPicker {display: block;border: 1px solid #eee;}
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
            <h1 class="content-right-title">编辑专题页面</h1>


	<input type="hidden" name="content" value='<?php echo $info['content'];?>' id="j-initdata">
	<input type="hidden" name="template_id" value='<?php echo $info['id'];?>' id="j-pageID">

	<div class="diy clearfix">
		<div id="diy-phone">
			<div class="diy-phone-header">
				<i class="diy-phone-receiver"></i>
				<div class="diy-phone-title j-pagetitle">专题页面</div>
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
				        <input type="text" class="input j-pagetitle-ipt" value="<?php echo $info['title'];?>">
				    </div>
				</div>
                <div class="formitems">
                    <label class="fi-name">基础点赞数：</label>
                    <div class="form-controls">
                        <input type="text" class="input j-pagepraisenum">
                    </div>
                </div>
                <div class="formitems">
                    <label class="fi-name">展示图：</label>
                    <div class="form-controls">
                        <div class="imgnav j-title-selectimg">
                            <img class="j-view_pic-ipt" src="<?php echo $info['view_pic'];?>">
                            <span class="imgnav-reselect">重新选择</span>
                        </div>
                    </div>
                </div>
				<div class="formitems">
				    <label class="fi-name">分类：</label>
				    <div class="form-controls">
						<a href="javascript:;" class="btn btn-success btn-small j-addMgzCate">添加分类</a>
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

				<div class="formitems">
					<label class="fi-name">专题简介：</label>
					<div class="form-controls">
						<textarea id="j-excerpt" class="textarea" style="width:92%"></textarea>
						<span class="fi-help-text">在分享的时候显示</span>
					</div>
				</div>

				<div class="formitems">
					<label class="fi-name">分销名片：</label>
					<div class="form-controls">
						<div class="radio-group">
							<label><input type="radio" name="isShowShareCard" class="j-page-showShareCard" value="1">添加</label>
							<label><input type="radio" name="isShowShareCard" class="j-page-showShareCard" value="0" checked>不添加</label>
						</div>
						<span class="fi-help-text">开启添加，会在分销专题页面最后加上分销名片。</span>
					</div>
				</div>

				<div class="formitems">
					<label class="fi-name">是否开启推广：</label>
					<div class="form-controls">
						<div class="radio-group">
							<label><input type="radio" name="isOpenSpread" class="j-isOpenSpread" value="1">开启</label>
							<label><input type="radio" name="isOpenSpread" class="j-isOpenSpread" value="0" checked>关闭</label>
						</div>
					</div>
				</div>

				<div class="formitems j-show-spread" style="display:none;">
					<label class="fi-name">推广花费上限：</label>
					<div class="form-controls">
						<input type="text" class="input mini j-spreadTotalPoint" value="0"> 积分
						<span class="fi-help-text">您在这个专题上所花费的积分总数，这些积分将按照规则赠送给推广用户</span>
					</div>
				</div>

				<div class="formitems j-show-spread" style="display:none;">
					<label class="fi-name">每人获取积分上限：</label>
					<div class="form-controls">
						<input type="text" class="input mini j-spreadLimitPoint" value="0"> 积分
						<span class="fi-help-text">设置一个上限，防止推广用户刷积分</span>
					</div>
				</div>

				<div class="formitems j-show-spread" style="display:none;">
					<label class="fi-name">推广获得积分条件：</label>
					<div class="form-controls">
						<span>每</span>
						<input type="text" class="input mini j-spreadVisitCount" value="0">
						<span>访问量，可以获得</span>
						<input type="text" class="input mini j-spreadVisitCountPoint" value="0">
						<span>积分</span>
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
		</div>
	</div>

        </div>
        <!-- end content-right -->

        <a href="javascript:;" class="btn-leftMenuFold" id="j-btn-leftMenuFold"></a>
    </div>
</div>
<!-- end container -->

<?php include "views/global_template.php";?>
<?php echo file_get_contents(API_STORE.'data/widget/list.php');?>

<script type="text/j-template" id="tpl_add_edit_mgzCat_item">
	<% if(dataset.length){ %>
		<ul class="labelList clearfix j-mgzCateList">
			<% _.each(dataset,function(item){ %>
				<li>
			        <span><%= item.title %></span><i class="gicon-remove white j-delMgzCate"></i>
			    </li>
		    <% }) %>
	    </ul>
    <% } %>
</script>

<?php include "views/global_footer.php";?>
<!-- end footer -->


<!-- diy js start-->
<script src="<?php echo SITE_ROOT;?>statics/plugins/ueditor/diyUeditor-min.js"></script>
<script src="<?php echo SITE_ROOT;?>statics/plugins/uploadify/jquery.uploadify.min.js?ver=3915"></script>
<script src="<?php echo SITE_ROOT;?>statics/js/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo SITE_ROOT;?>statics/plugins/diy/diy-min.js"></script>
<script src="<?php echo SITE_ROOT;?>statics/plugins/colorpicker/colorpicker.js"></script><!-- diy js end -->
<script src="<?php echo SITE_ROOT;?>statics/js/dist/Shop/edit_magazine.js"></script>

</body>
</html>
<!-- 20160922 -->
