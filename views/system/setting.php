
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- 满足有些用户在手机端访问的需要 -->

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <title>分销商佣金设置 - Bidcms开源电商</title>

        <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/css/component-min.css">    <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/plugins/jbox/jbox-min.css">

</head>
<body class="cp-bodybox">
<?php include "views/global_top.php";?>

<div class="container">
    <div class="inner clearfix">
        <div class="content-left fl">
        <?php include "views/global_nav.php";?>
        </div>
        <div class="content-right">
            <h1 class="content-right-title">分销商佣金设置<a class="gicon-info-sign gicon_linkother" href="//www.wifenxiao.com/Index/help_show/lm/help/id/195.html" target="_blank"></a></h1>


    <div class="alert alert-info disable-del"><h4>提示</h4>佣金比例不设置或只设置直属上级佣金比例时，分销中心不显示分销商下级，只设置直属上级和二级上级佣金比例时，只显示分销商一级下级。<br>三级佣金比例累计不可以超过订单金额的50%。</div>

    <div class="sysPanel">
		<div class="sysPanel-con">
			<div class="sysPanel-title">分销内购</div>
			<div class="sysPanel-tip">
				<p>启用后，分销商购买商品自己可以拿一级佣金，自己的上级拿二级佣金；</p>
				<p>未启用时，分销商购买商品时自己是拿不到佣金的，自己的上级可以拿一级佣金</p>
			</div>
		</div>
		<div class="vir-chkb j-vir-chkb">
			<div class="vir-chkb-actions clearfix">
				<a href="javascript:;" class="vir-chkb-enable">已开启</a>
				<a href="javascript:;" class="vir-chkb-disable">已关闭</a>
			</div>
			<input type="radio" name="is_fenxiao_ins" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['is_fenxiao_ins']==1?'checked':'';?>>
		</div>
	</div>

	<div class="sysPanel">
		<div class="formitems">
			<label class="fi-name" style="width: 120px;"><span class="colorRed">*</span>直属上级佣金比例：</label>
			<div class="form-controls">
				<input type="text" class="input mini j-text-autosave j-pid" name="directly_online_ratio" value="<?php echo $shopinfo['directly_online_ratio'];?>">%
				<span class="fi-help-text">分销商推荐买家购买后能拿到的佣金比例</span>
			</div>
		</div>

		<div class="formitems">
			<label class="fi-name" style="width: 120px;"><span class="colorRed">*</span>二级上级佣金比例：</label>
			<div class="form-controls">
				<input type="text" class="input mini j-text-autosave j-pid" name="superior_online_ratio" value="<?php echo $shopinfo['superior_online_ratio'];?>">%
				<span class="fi-help-text">分销商推荐买家购买后，分销商的上级分销商能拿到的佣金比例</span>
			</div>
		</div>

	    <div class="formitems">
	        <label class="fi-name" style="width: 120px;"><span class="colorRed">*</span>三级上级佣金比例：</label>
	        <div class="form-controls">
	            <input type="text" class="input mini j-text-autosave j-pid" name="three_online_ratio" value="<?php echo $shopinfo['three_online_ratio'];?>">%
	            <span class="fi-help-text">分销商推荐买家购买后，分销商上级的上级能拿到的佣金比例</span>
	        </div>
	    </div>

	    <!--<div class="formitems">
            <div class="form-controls" style="margin-left:120px;">
                <a href="javascript:;" class="btn btn-primary js-save-btn">保存</a>
            </div>
        </div>-->
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
            <li class="shopManager21"><a href="javascript:;" data-target="#shop_21">系统设置</a></li><li class="shopManager22"><a href="javascript:;" data-target="#shop_22">域名管理</a></li><li class="shopManager23"><a href="javascript:;" data-target="#shop_23">在线客服</a></li><li class="shopManager24"><a href="javascript:;" data-target="#shop_24">微信设置</a></li><li class="shopManager25"><a href="javascript:;" data-target="#shop_25">素材库</a></li><li class="shopManager26"><a href="javascript:;" data-target="#shop_26">短信</a></li><li class="shopManager27"><a href="javascript:;" data-target="#shop_27">物流管理</a></li><li class="shopManager29"><a href="javascript:;" data-target="#shop_29">系统日志</a></li>        </ul>
        <a href="javascript:;" class="fixedBar-btn" id="j-fixedBar-btn"></a>
    </div><a href="#" id="j-gotop" class="gotop" title="回到顶部"></a>
<!-- end gotop -->
<?php include "views/global_footer.php";?>

<script src="<?php echo SITE_ROOT;?>statics/js/ajax_form.js"></script>

</body>
</html>
<!-- 20170105 -->
