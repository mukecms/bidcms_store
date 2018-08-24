
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- 满足有些用户在手机端访问的需要 -->

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <title>支付宝收款账号 - Bidcms开源电商</title>
    <!-- 线上环境 -->
    <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/css/component-min.css">
 <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/plugins/jbox/jbox-min.css">
    <script type="text/javascript">
    <!--
		var URL_virChkb='index.php?con=system&act=pay';
    //-->
    </script>
</head>
<body class="cp-bodybox">
<?php include "views/global_top.php";?>

<div class="container">
    <div class="inner clearfix">
        <div class="content-left fl" >
		<?php include "views/global_nav.php";?>
        </div>
        <!-- end content-left -->

        <div class="content-right">
            <h1 class="content-right-title">支付宝收款账号<a class="gicon-info-sign gicon_linkother" href="//www.wifenxiao.com/Index/help_show/lm/help/id/65.html" target="_blank"></a></h1>


	<div class="alert alert-info disable-del"><h4>提示</h4>
		申请此接口须填写网站地址，网址必须通过ICP备案，网站备案主体需要与支付宝账户主体名称一致。具体可以联系在线客服
    </div>

    <div class="sysPanel">
		<div class="sysPanel-con">
			<div class="sysPanel-title">功能开关</div>
			<div class="sysPanel-tip">开启后，结算时可以使用支付宝支付</div>
		</div>
		<div class="vir-chkb j-vir-chkb">
			<div class="vir-chkb-actions clearfix">
				<a href="javascript:;" class="vir-chkb-enable">已开启</a>
				<a href="javascript:;" class="vir-chkb-disable">已关闭</a>
			</div>
			<input type="radio" name="is_alipay" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['is_alipay']==1?'checked':'';?>>
		</div>
	</div>

	<div class="sysPanel">
		<div class="sysPanel-con">
			<div class="sysPanel-title">设为默认</div>
			<div class="sysPanel-tip">是否设置支付宝为默认支付方式</div>
		</div>
		<div class="vir-chkb j-vir-chkb">
			<div class="vir-chkb-actions clearfix">
				<a href="javascript:;" class="vir-chkb-enable">是</a>
				<a href="javascript:;" class="vir-chkb-disable">否</a>
			</div>
			<input type="radio" name="default_pay_type" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['default_pay_type']==1?'checked':'';?>>
		</div>
	</div>
	<div class="sysPanel">
		<div class="sysPanel-con">
			<div class="sysPanel-title">支付宝批量转账</div>
			<div class="sysPanel-tip">
				<p>开启功能后，会员，分销商支付宝提现时，审核通过后，可以批量发放实现自动转账，开启前，请先 <a href="https://b.alipay.com/order/appInfo.htm?salesPlanCode=2011052500326597&channel=ent" class="btn btn-warning btn-small" target="_blank">去支付宝签约</a></p>
				<p class="colorRed">手工转账者,请勿开通此功能。</p>
			</div>
		</div>
		<div class="vir-chkb j-vir-chkb">
			<div class="vir-chkb-actions clearfix">
				<a href="javascript:;" class="vir-chkb-enable">已开启</a>
				<a href="javascript:;" class="vir-chkb-disable">已关闭</a>
			</div>
			<input type="radio" name="batch_auto_pay" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['batch_auto_pay']==1?'checked':'';?>>
		</div>
	</div>
	<div class="sysPanel">
		<div class="formitems">
	        <label class="fi-name"><span class="colorRed"></span>快速签约：</label>
	        <div class="form-controls">
	            <a href="https://b.alipay.com/signing/productDetail.htm?productId=I1011000290000001001" class="btn btn-warning btn-small" target="_blank">去支付宝</a>
	        </div>
	    </div>

		<div class="formitems">
			<label class="fi-name"><span class="colorRed">*</span>支付宝账号：</label>
			<div class="form-controls">
				<input type="text" class="input xlarge j-account j-text-autosave" name="alipay_account" value="<?php echo $shopinfo['alipay_account'];?>">
				<span class="fi-help-text"></span>
			</div>
		</div>
		<div class="formitems">
			<label class="fi-name"><span class="colorRed">*</span>支付宝账号姓名：</label>
			<div class="form-controls">
				<input type="text" class="input xlarge j-name j-text-autosave" name="alipay_name" value="<?php echo $shopinfo['alipay_name'];?>">
				<span class="fi-help-text"></span>
			</div>
		</div>
		<div class="formitems">
			<label class="fi-name"><span class="colorRed">*</span>PID：</label>
			<div class="form-controls">
				<input type="text" class="input xlarge j-pid j-text-autosave" name="alipay_partner" value="<?php echo $shopinfo['alipay_partner'];?>">
				<span class="fi-help-text">成功申请支付宝接口后获取到的PID</span>
			</div>
		</div>
		<div class="formitems">
			<label class="fi-name"><span class="colorRed">*</span>KEY：</label>
			<div class="form-controls">
				<input type="text" class="input xlarge j-key j-text-autosave" name="alipay_key" value="<?php echo $shopinfo['alipay_key'];?>">
				<span class="fi-help-text">成功申请支付宝接口后获取到的Key</span>
			</div>
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
            <li class="shopManager21"><a href="javascript:;" data-target="#shop_21">系统设置</a></li><li class="shopManager22"><a href="javascript:;" data-target="#shop_22">域名管理</a></li><li class="shopManager23"><a href="javascript:;" data-target="#shop_23">在线客服</a></li><li class="shopManager24"><a href="javascript:;" data-target="#shop_24">微信设置</a></li><li class="shopManager25"><a href="javascript:;" data-target="#shop_25">素材库</a></li><li class="shopManager26"><a href="javascript:;" data-target="#shop_26">短信</a></li><li class="shopManager27"><a href="javascript:;" data-target="#shop_27">物流管理</a></li><li class="shopManager29"><a href="javascript:;" data-target="#shop_29">系统日志</a></li>        </ul>
        <a href="javascript:;" class="fixedBar-btn" id="j-fixedBar-btn"></a>
    </div><a href="#" id="j-gotop" class="gotop" title="回到顶部"></a>
<!-- end gotop -->


<!--end front template  -->


<?php include "views/global_footer.php";?>


</body>
</html>
<!-- 20170105 -->
