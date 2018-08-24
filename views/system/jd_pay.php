
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- 满足有些用户在手机端访问的需要 -->

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <title>京东支付收款账号 - Bidcms开源电商</title>
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
            <h1 class="content-right-title">京东支付收款账号<a class="gicon-info-sign gicon_linkother" href="//www.wifenxiao.com/Index/help_show/lm/help/id/188.html" target="_blank"></a></h1>


    <div class="alert alert-info disable-del"><h4>提示</h4>设置京东支付收款账号后买家付款资金将会直接打入您的京东支付账号。参考<a href="/System/jd_help" target="_blank" class="a_hover">操作指引</a></div>

    <div class="sysPanel">
        <div class="sysPanel-con">
            <div class="sysPanel-title">功能开启后，结算时可以使用京东支付</div>
            <div class="sysPanel-tip"></div>
        </div>
        <div class="vir-chkb j-vir-chkb">
            <div class="vir-chkb-actions clearfix">
                <a href="javascript:;" class="vir-chkb-enable">已开启</a>
                <a href="javascript:;" class="vir-chkb-disable">已关闭</a>
            </div>
            <input type="radio" name="is_bank" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['is_bank']==1?'checked':'';?>>
        </div>
    </div>

    <div class="sysPanel">
        <div class="sysPanel-con">
            <div class="sysPanel-title">设为默认</div>
            <div class="sysPanel-tip">是否设置京东为默认支付方式</div>
        </div>
        <div class="vir-chkb j-vir-chkb">
            <div class="vir-chkb-actions clearfix">
                <a href="javascript:;" class="vir-chkb-enable">已开启</a>
                <a href="javascript:;" class="vir-chkb-disable">已关闭</a>
            </div>
            <input type="radio" name="default_pay_type" class="ip-checkbox j-vir-checkbox"  data-enableval="3" data-disableval="0" <?php echo $shopinfo['default_pay_type']==3?'checked':'';?>>
        </div>
    </div>

    <div class="sysPanel">
        <div class="formitems">
            <label class="fi-name"><span class="colorRed"></span>快速签约：</label>
            <div class="form-controls">
                <a href="//www.chinabank.com.cn/index.jsp" class="btn btn-warning btn-small" target="_blank">去京东支付</a>
            </div>
        </div>
        <div class="formitems">
            <label class="fi-name"><span class="colorRed"></span>版本选择：</label>
            <div class="form-controls">
                <select name="version_sel" class="j-select-autosave">
                <option value="1" <?php echo $shopinfo['version_sel']==1?'selected':'';?>>
                        版本 1.0
                    </option>
                    <option value="2" <?php echo $shopinfo['version_sel']==2?'selected':'';?>>
                        版本 2.0
                    </option>
                                </select>
            </div>
        </div>
        <div class="formitems">
                <label class="fi-name"><span class="colorRed">*</span>MD5私钥：</label>
                <div class="form-controls">
                    <input type="text" class="input xlarge j-text-autosave j-pid" name="bank_secret" value="<?php echo $shopinfo['bank_secret'];?>">
                    <span class="fi-help-text">网银支付MD5私钥。请登录网银在线商户管理后台，在【安全中心-网银+密钥修改】中设置。</span>
                </div>
            </div>        <div class="formitems">
            <label class="fi-name"><span class="colorRed">*</span>RSA公钥下载：</label>
            <div class="form-controls">
                <a href="//cp.wifenxiao.com/Upload/47/89/4001109/pem//pub_4001109.pem">点击此处下载</a>
            </div>
        </div>
        <div class="formitems">
            <label class="fi-name"><span class="colorRed">*</span>商户号：</label>
            <div class="form-controls">
                <input type="text" class="input xlarge j-text-autosave j-account" name="bank_key" value="<?php echo $shopinfo['bank_key'];?>">
                <span class="fi-help-text"></span>
            </div>
        </div>
        <div class="formitems">
            <label class="fi-name"><span class="colorRed">*</span>DES密钥：</label>
            <div class="form-controls">
                <input type="text" class="input xlarge j-text-autosave j-pid" name="bank_des" value="<?php echo $shopinfo['bank_des'];?>">
                <span class="fi-help-text">网银支付DES密钥。请登录网银在线商户管理后台，在【安全中心-网银+密钥修改】中生成。</span>
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

<script src="<?php echo SITE_ROOT;?>statics/js/dist/System/alipayAccount.js"></script>






</body>
</html>
<!-- 20170105 -->
