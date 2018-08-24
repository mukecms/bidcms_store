
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- 满足有些用户在手机端访问的需要 -->

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <title>收款账号 - Bidcms开源电商</title>
    <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/css/component-min.css">    <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/plugins/jbox/jbox-min.css">
    <script type="text/javascript">
    <!--
		var URL_virChkb='index.php?con=system&act=pay';
    //-->
    </script>
</head>
<body class="cp-bodybox">
<!--[if lt IE 9]>
<div class="alert alert-danger disable-del txtCenter" id="tipLowIEVer">
    <h4>系统检测到您使用的浏览器版本过低，为达到更好的体验效果请升级您的浏览器，我们为您推荐：</h4>
    <p>
        <a href="https://www.google.com.hk/chrome/" target="_blank">Chrome浏览器</a>
        <a href="//www.firefox.com.cn/download/" target="_blank">Firefox浏览器</a>
        <a href="//www.maxthon.cn/" target="_blank">遨游浏览器</a>
        <a href="//se.360.cn/" target="_blank">360浏览器</a>
        <a href="//www.liebao.cn/" target="_blank">猎豹浏览器</a>
    </p>
</div>
<![endif]-->
<div class="header">
    <div class="inner clearfix">
        <div class="fl">
            <a href="/" class="header-logo" style="width:auto; margin-right:4px;">
                            <img src="<?php echo SITE_ROOT;?>statics/images/logo.jpg" width="auto" height="100%">            </a>
        </div>
        <!-- end logo -->

        <div class="header-nav fl">
            <ul class="header-nav-list clearfix"><?php include "views/global_top_nav.php";?></ul>
        </div>
        <!-- end header-nav -->

        <div class="fr">
            <ul class="header-ctrl clearfix">
                <li class="header-ctrl-item fl">
                    <a href="javascript:;" class="header-ctrl-item-parent">
                        <i class="gicon-user white"></i>
                        <i class="gicon-user"></i>
                        账户
                                            </a>
                    <ul class="header-ctrl-item-children">
                        <li><a href="//www.wifenxiao.com/NewNotice" target="_blank">更新日志</a></li>
                        <li><a href="//www.wifenxiao.com/Index/help_list/lm/help.html" target="_blank">帮助中心</a></li>
                        <li><a href="/System/shopInfo">设置</a></li>
                        <li><a href="/System/updatepwd">修改密码</a></li>
                        <li><a href="<?php echo SITE_ROOT;?>statics/logout">退出</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- end list -->
		<span class="account_inbox_switch fr"><a href="/System/notice_list" class="header_mail"><span class="act"></span></a></span>
        <span class="header-welcome fr ">
            <a href="javascript:;" title="17090310762" class="tips" data-trigger="hover" data-placement="top" data-content='<strong>版本：</strong><font style="color:red">免费版</font>'>17090310762</a>
                    </span>
        <!-- end header-welcome -->    </div>
</div>
<!-- end header -->

<div class="container">
    <div class="inner clearfix">
		<div class="content-left fl">
        <?php include "views/global_nav.php";?>
        </div>
        <div class="content-right">
            <h1 class="content-right-title">贝宝收款账号<a class="gicon-info-sign gicon_linkother" href="//www.wifenxiao.com/Index/help_show/lm/help/id/194.html" target="_blank"></a></h1>


    <div class="alert alert-info disable-del"><h4>提示</h4>设置贝宝收款账号后买家付款资金将会打入您的贝宝账号。</div>

    <div class="sysPanel">
        <div class="sysPanel-con">
            <div class="sysPanel-title">功能开关</div>
            <div class="sysPanel-tip">开启后，结算时可以使用贝宝支付</div>
        </div>
        <div class="vir-chkb j-vir-chkb">
            <div class="vir-chkb-actions clearfix">
                <a href="javascript:;" class="vir-chkb-enable">已开启</a>
                <a href="javascript:;" class="vir-chkb-disable">已关闭</a>
            </div>
            <input type="radio" name="is_beibao" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['is_beibao']==1?'checked':'';?>>
        </div>
    </div>

    <div class="sysPanel">
        <div class="sysPanel-con">
            <div class="sysPanel-title">设为默认</div>
            <div class="sysPanel-tip">是否设置贝宝支付为默认支付方式</div>
        </div>
        <div class="vir-chkb j-vir-chkb">
            <div class="vir-chkb-actions clearfix">
                <a href="javascript:;" class="vir-chkb-enable">已开启</a>
                <a href="javascript:;" class="vir-chkb-disable">已关闭</a>
            </div>
            <input type="radio" name="default_pay_type" class="ip-checkbox j-vir-checkbox" data-enableval="5" data-disableval="0" <?php echo $shopinfo['default_pay_type']==5?'checked':'';?>>
        </div>
    </div>

    <div class="sysPanel">
        <div class="formitems">
            <label class="fi-name"><span class="colorRed"></span>快速签约：</label>
            <div class="form-controls">
                <a href="https://www.paypal.com/cn/cgi-bin/webscr?cmd=_run-check-cookie-submit&redirectCmd=_registration-run" class="btn btn-warning btn-small" target="_blank">去贝宝</a>
                <span class="fi-help-text">签约时，请选择国内平台</span>
            </div>
        </div>

        <div class="formitems">
            <label class="fi-name"><span class="colorRed">*</span>贝宝账号：</label>
            <div class="form-controls">
                <input type="text" class="input xlarge j-account j-text-autosave" name="beibao_account" value="<?php echo $shopinfo['beibao_account'];?>">
                <span class="fi-help-text"></span>
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
