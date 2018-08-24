
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- 满足有些用户在手机端访问的需要 -->

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <title>微信支付 - Bidcms开源电商</title>
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
        <div class="content-left fl">
        <?php include "views/global_nav.php";?>
        </div>
        <!-- end content-left -->

        <div class="content-right">
            <h1 class="content-right-title">微信支付<a class="gicon-info-sign gicon_linkother" href="//www.wifenxiao.com/Index/help_show/lm/help/id/66.html" target="_blank"></a></h1>


	<div class="alert alert-info disable-del"><h4>提示</h4>使用该功能需要开通微信支付功能。
        <a href="https://mp.weixin.qq.com/paymch/readtemplate?t=mp/business/faq2_tmpl" class="btn btn-warning btn-small" target="_blank">功能介绍</a>
        <a href="/System/wx_pay_guide.html" class="btn btn-success btn-small" target="_blank">开通指引</a>
    </div>

    <div class="sysPanel">
        <div class="sysPanel-con">
            <div class="sysPanel-title">功能开关</div>
            <div class="sysPanel-tip">开启后，结算时可以使用微信支付</div>
        </div>
        <div class="vir-chkb j-vir-chkb">
            <div class="vir-chkb-actions clearfix">
                <a href="javascript:;" class="vir-chkb-enable">已开启</a>
                <a href="javascript:;" class="vir-chkb-disable">已关闭</a>
            </div>
            <input type="radio" name="is_wx_pay" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['is_wx_pay']==1?'checked':'';?>>
        </div>
    </div>

    <div class="sysPanel">
        <div class="sysPanel-con">
            <div class="sysPanel-title">设为默认</div>
            <div class="sysPanel-tip">是否设置微信为默认支付方式</div>
        </div>
        <div class="vir-chkb j-vir-chkb">
            <div class="vir-chkb-actions clearfix">
                <a href="javascript:;" class="vir-chkb-enable">已开启</a>
                <a href="javascript:;" class="vir-chkb-disable">已关闭</a>
            </div>
            <input type="radio" name="default_pay_type" class="ip-checkbox j-vir-checkbox" data-enableval="2" data-disableval="0" <?php echo $shopinfo['default_pay_type']==2?'checked':'';?>>
        </div>
    </div>

    <div class="sysPanel">
        <div class="sysPanel-con">
            <div class="sysPanel-title">是否为财付通</div>
            <div class="sysPanel-tip">帐号是否为财付通</div>
        </div>
        <div class="vir-chkb j-vir-chkb">
            <div class="vir-chkb-actions clearfix">
                <a href="javascript:;" class="vir-chkb-enable">是</a>
                <a href="javascript:;" class="vir-chkb-disable">否</a>
            </div>
            <input type="radio" name="is_wx_cft" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['is_wx_cft']==1?'checked':'';?>>
        </div>
    </div>
	<div class="sysPanel">
		<div class="sysPanel-con">
			<div class="sysPanel-title">微信支付批量转账</div>
			<div class="sysPanel-tip">
				<p>开启功能后，会员，分销商微支付提现时，审核通过后，可以批量发放实现自动转账，开启前，请先开通企业付款,参考 <a href="/System/wx_help" target="_blank" class="btn btn-warning btn-small">操作指引</a></p>
				<p class="colorRed">手工转账者,请勿开通此功能。</p>
			</div>
		</div>
		<div class="vir-chkb j-vir-chkb">
			<div class="vir-chkb-actions clearfix">
				<a href="javascript:;" class="vir-chkb-enable">已开启</a>
				<a href="javascript:;" class="vir-chkb-disable">已关闭</a>
			</div>
			<input type="radio" name="wx_batch_pay" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['wx_batch_pay']==1?'checked':'';?>>
		</div>
	</div>
	<div class="sysPanel">
		<div class="formitems check_name">
			<label class="fi-name"><span class="colorRed"></span>姓名校验类型：</label>
			<div class="form-controls" style="padding-top:5px;">
				<label><input  name="check_wx_name" type="radio" class="j-radio-autosave" value="1" <?php echo $shopinfo['check_wx_name']==1?'checked':'';?>/>必须真实姓名一致</label>　　
				<label class="mgr10"><input  name="check_wx_name" type="radio" class="j-radio-autosave" value="2" <?php echo $shopinfo['check_wx_name']==2?'checked':'';?>/>已实名认证的用户，必须真实姓名一致</label>
				<label><input  name="check_wx_name" type="radio" class="j-radio-autosave" value="0" <?php echo $shopinfo['check_wx_name']==0?'checked':'';?>/>不检验真实姓名</label>
				<span class="j-autosavePanel"></span>
				<span class="fi-help-text">用于微信支付批量转账时，检验是否需要验证用户真实姓名</span>
			</div>
		</div>

	</div>
    <div class="sysPanel">
        <div class="formitems">
    		<label class="fi-name"><span class="colorRed">*</span>APPID：</label>
    		<div class="form-controls">
    			<input type="text" class="input xlarge j-text-autosave" name="wx_pay_appid" value="<?php echo $shopinfo['wx_pay_appid'];?>">
    			<span class="fi-help-text">微信公众号身份的唯一标识</span>
    		</div>
        </div>
    	<div class="formitems">
    		<label class="fi-name"><span class="colorRed">*</span>APPSECRET：</label>
    		<div class="form-controls">
    			<input type="text" class="input xlarge j-text-autosave" name="wx_pay_appsecret" value="<?php echo $shopinfo['wx_pay_appsecret'];?>">
    			<span class="fi-help-text">审核后在公众平台开启开发模式后可查看</span>
    		</div>
    	</div>
    	<div class="formitems">
    		<label class="fi-name"><span class="colorRed">*</span>MCHID：</label>
    		<div class="form-controls">
    			<input type="text" class="input xlarge j-text-autosave" name="wx_pay_mchid" value="<?php echo $shopinfo['wx_pay_mchid'];?>">
    			<span class="fi-help-text">微信支付商户号，审核通过后，在微信发送的邮件中查看。</span>
    		</div>
    	</div>
        <div class="formitems">
            <label class="fi-name"><span class="colorRed">*</span>KEY：</label>
            <div class="form-controls">
                <input type="text" class="input xlarge j-text-autosave" name="wx_pay_key" value="<?php echo $shopinfo['wx_pay_key'];?>">
                <span class="fi-help-text">商户支付密钥Key。请登录<a href="https://pay.weixin.qq.com">微信支付商户平台</a>，在【账户设置-安全设置-API安全】中设置。</span>
            </div>
        </div>
        <div class="formitems">
            <label class="fi-name">PAYSIGNKEY：</label>
            <div class="form-controls">
                <input type="text" class="input xlarge j-text-autosave" name="wx_paysignkey" value="<?php echo $shopinfo['wx_paysignkey'];?>">
                <span class="fi-help-text">财付通商户支付专用签名串PaySignKey。审核通过后，在微信发送的邮件中查看（财付通用户必填）</span>
            </div>
        </div>
		<div class="formitems">
			<label class="fi-name"><span class="colorRed"></span>apiclient_key：</label>
			<div class="form-controls" style="padding-top:5px;">
				<input class="input j-text-autosave" id="apiclient_keypath" name="wx_apiclient_key" placeholder="上传apiclient_key证书" type="text" value="<?php echo $shopinfo['wx_apiclient_key'];?>"><input value="上传" class="btn" onclick="upload('apiclient_key')" type="button">
			
			<span class="fi-help-text"  style="padding-top:5px;">apiclient_key.pem，登录商户平台－安全设置－API安全下载证书</span>
			</div>
		</div>
		<div class="formitems">
			<label class="fi-name"><span class="colorRed"></span>apiclient_cert：</label>
			<div class="form-controls" style="padding-top:5px;">
				<input class="input j-text-autosave" id="apiclient_certpath" name="wx_apiclient_cert" placeholder="上传apiclient_cert证书" type="text" value="<?php echo $shopinfo['wx_apiclient_cert'];?>"><input value="上传" class="btn" onclick="upload('apiclient_cert')" type="button">
			
			<span class="fi-help-text" style="padding-top:5px;">apiclient_cert.pem，登录商户平台－安全设置－API安全下载证书</span>
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
<?php include "views/global_footer.php";?>
<iframe id="tempform" name="tempform" style="display:none;"></iframe>
<div id="temparea" style="display:none;"></div>

<script type="text/javascript">
<!--
	function upload(field){
		str='<form id="'+field+'form" target="tempform" method="post" action="/tool/upload.php" enctype="multipart/form-data"><input id="'+field+'" name="'+field+'" style="display: none" type="file" value=""></form>';
		$("#temparea").html(str);
		$("#"+field).click();
	}
	$("#temparea").on("change","input[type='file']",function(){
		field=$(this).attr('id');
		$("#"+field+"path").val('上传中...');
		$(this).parent().submit();
	});
	function parseFile(file){
		$("#"+file.key+"path").val(file.name.replace('..',''));
		$("#"+file.key+"path").trigger("change");
	}
	function parseMsg(data){
		 HYD.hint("danger", data.msg);
		 $("#"+field+"path").val('');
	}
//-->
</script>



</body>
</html>
<!-- 20170105 -->
