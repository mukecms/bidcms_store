
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- 满足有些用户在手机端访问的需要 -->

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <title>快钱支付收款账号 - Bidcms开源电商</title>

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
            <h1 class="content-right-title">快钱支付收款账号<a class="gicon-info-sign gicon_linkother" href="//www.wifenxiao.com/Index/help_show/lm/help/id/188.html" target="_blank"></a></h1>


    <div class="alert alert-info disable-del"><h4>提示</h4>设置快钱支付收款账号后买家付款资金将会直接打入您的快钱支付账号。参考<a href="/System/kq_help" target="_blank" class="a_hover">操作指引</a></div>

    <div class="sysPanel">
        <div class="sysPanel-con">
            <div class="sysPanel-title">功能开启后，结算时可以使用快钱支付</div>
            <div class="sysPanel-tip">&nbsp</div>
        </div>
        <div class="vir-chkb j-vir-chkb">
            <div class="vir-chkb-actions clearfix">
                <a href="javascript:;" class="vir-chkb-enable">已开启</a>
                <a href="javascript:;" class="vir-chkb-disable">已关闭</a>
            </div>
            <input type="radio" name="is_bill_pay" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['is_bill_pay']==1?'checked':'';?>>
        </div>
    </div>

    <div class="sysPanel">
        <div class="sysPanel-con">
            <div class="sysPanel-title">设为默认</div>
            <div class="sysPanel-tip">是否设置快钱为默认支付方式</div>
        </div>
        <div class="vir-chkb j-vir-chkb">
            <div class="vir-chkb-actions clearfix">
                <a href="javascript:;" class="vir-chkb-enable">已开启</a>
                <a href="javascript:;" class="vir-chkb-disable">已关闭</a>
            </div>
            <input type="radio" name="default_pay_type" class="ip-checkbox j-vir-checkbox"  data-enableval="7" data-disableval="0"  <?php echo $shopinfo['default_pay_type']==7?'checked':'';?>>
        </div>
    </div>

    <div class="sysPanel">
        <div class="formitems">
            <label class="fi-name"><span class="colorRed"></span>快速签约：</label>
            <div class="form-controls">
                <a href="https://www.99bill.com/z/shoujizhifu.html" class="btn btn-warning btn-small" target="_blank">去快钱支付</a>
            </div>
        </div>
        <div class="formitems">
            <label class="fi-name"><span class="colorRed">*</span>用户编号：</label>
            <div class="form-controls">
                <input type="text" class="input xlarge j-text-autosave j-pid" name="bill_key" value="<?php echo $shopinfo['bill_key'];?>">
                <span class="fi-help-text">商户使用快钱账户Email以及密码登陆快钱网站www.99bill.com之后,依次点击【账户管理】“账号欢迎页”的中上位置显示了快钱的“用户编号+01”。</span>
            </div>
        </div>
        <div class="formitems">
            <label class="fi-name"><span class="colorRed">*</span>上传公钥证书：</label>
            <div class="form-controls" style="padding-top:5px;">
                <input class="input j-text-autosave" id="publicpath" name="bill_public_key" placeholder="选择上传私钥证书" type="text" value="<?php echo $shopinfo['bill_public_key'];?>"><input value="上传" class="btn" onclick="upload('public')" type="button">
				 <span class="fi-help-text">点击【安全设置】-【商户证书】“快钱证书下载-RSA证书”下载第一个证书。</span>
            </div>
        </div>
        <div class="formitems">
            <label class="fi-name"><span class="colorRed">*</span>上传私钥证书：</label>
            <div class="form-controls" style="padding-top:5px;">
                <input class="input j-text-autosave" id="privatepath" name="bill_private_key" placeholder="选择上传私钥证书" type="text" value="<?php echo $shopinfo['bill_private_key'];?>"><input value="上传" class="btn" onclick="upload('private')" type="button">
				<span class="fi-help-text">
				   点击【安全设置】-【商户证书】“证书工具下载”获取证书，上传99bill-rsa.pem文件。
				</span>
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
<iframe id="tempframe" name="tempframe" style="display:none;"></iframe>
<div id="temparea" style="display:none;"></div>

<script src="<?php echo SITE_ROOT;?>statics/js/dist/System/alipayAccount.js"></script>
<script type="text/javascript">
<!--
	function upload(field){
		str='<form id="'+field+'form" target="tempframe" method="post" action="/tool/upload.php" enctype="multipart/form-data"><input id="'+field+'" name="'+field+'" style="display: none" type="file" value=""></form>';
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
