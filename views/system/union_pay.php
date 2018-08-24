
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- 满足有些用户在手机端访问的需要 -->

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <title>银联支付收款账号 - Bidcms开源电商</title>
    <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/css/component-min.css">    <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/plugins/jbox/jbox-min.css">
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
        <div class="content-right">
            <h1 class="content-right-title">银联支付收款账号<a class="gicon-info-sign gicon_linkother" href="//www.wifenxiao.com/Index/help_show/lm/help/id/188.html" target="_blank"></a></h1>


    <div class="alert alert-info disable-del"><h4>提示</h4>设置银联支付收款账号后买家付款资金将会直接打入您的银联支付账号。参考<a href="/System/yl_help" target="_blank" class="a_hover">操作指引</a></div>

    <div class="sysPanel">
        <div class="sysPanel-con">
            <div class="sysPanel-title">功能开启后，结算时可以使用银联支付</div>
            <div class="sysPanel-tip">&nbsp</div>
        </div>
        <div class="vir-chkb j-vir-chkb">
            <div class="vir-chkb-actions clearfix">
                <a href="javascript:;" class="vir-chkb-enable">已开启</a>
                <a href="javascript:;" class="vir-chkb-disable">已关闭</a>
            </div>
            <input type="radio" name="is_union_pay" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['is_union_pay']==1?'checked':'';?>>
        </div>
    </div>

    <div class="sysPanel">
        <div class="sysPanel-con">
            <div class="sysPanel-title">设为默认</div>
            <div class="sysPanel-tip">是否设置银联支付为默认支付方式</div>
        </div>
        <div class="vir-chkb j-vir-chkb">
            <div class="vir-chkb-actions clearfix">
                <a href="javascript:;" class="vir-chkb-enable">已开启</a>
                <a href="javascript:;" class="vir-chkb-disable">已关闭</a>
            </div>
            <input type="radio" name="default_pay_type" class="ip-checkbox j-vir-checkbox"  data-enableval="6" data-disableval="0" <?php echo $shopinfo['default_pay_type']==6?'checked':'';?>>
        </div>
    </div>

    <div class="sysPanel">
        <div class="formitems">
            <label class="fi-name"><span class="colorRed"></span>快速签约：</label>
            <div class="form-controls">
                <a href="https://open.unionpay.com/ajweb/product/detail?id=66" class="btn btn-warning btn-small" target="_blank">去银联支付</a>
            </div>
        </div>
        <div class="formitems">
            <label class="fi-name"><span class="colorRed">*</span>商户号：</label>
            <div class="form-controls">
                <input type="text" class="input xlarge j-text-autosave j-account" name="union_key" value="<?php echo $shopinfo['union_key'];?>">
                <span class="fi-help-text"></span>
            </div>
        </div>
        <div class="formitems">
            <label class="fi-name"><span class="colorRed">*</span>私钥证书密码：</label>
            <div class="form-controls">
                <input type="text" class="input xlarge j-text-autosave j-account" name="union_key_cert" value="<?php echo $shopinfo['union_key_cert'];?>">
                <span class="fi-help-text"></span>
            </div>
        </div>
        <form action="" method="POST"  enctype="multipart/form-data">
        <div class="formitems">
            <label class="fi-name"><span class="colorRed"></span>上传私钥证书：</label>
            <div class="form-controls" style="padding-top:5px;">
                <input class="input j-text-autosave" id="unionppath" name="union_private_key" placeholder="选择上传私钥证书" type="text" value="<?php echo $shopinfo['union_private_key'];?>"><input value="上传" class="btn" onclick="upload('unionp')" type="button">
            </div>
            <span class="fi-help-text"  style="padding-top:5px;">
                私钥证书是使用业务发给你们的入网参数信息通知邮件中的授权码和参考号www.cfca.com.cn下载证书，然后从IE浏览器=工具-internet选项-内容-证书-个人目录下导出
			</span>
            </div>
            <div class="mgl120">
                <input type="submit" value="上传" class="btn btn-primary btn-small">
            </div>
        </form>
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


<script src="<?php echo SITE_ROOT;?>statics/js/dist/System/alipayAccount.js"></script>

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
