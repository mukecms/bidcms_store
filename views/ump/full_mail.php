
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- 满足有些用户在手机端访问的需要 -->

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <title>满额包邮设置 - Bidcms开源电商</title>
    <!-- 线上环境 -->
        <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/css/component-min.css">    <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/plugins/jbox/jbox-min.css">

    <style>
        .formitems .fi-name{width: 130px;}
        .form-controls{margin-left: 140px;}
        .rule{position: relative;}
        .rule-del{position: absolute;width:16px;height:16px;right:4px;top: 5px;z-index: 1;}
    </style>

</head>
<body class="cp-bodybox">
<?php include "views/global_top.php";?>

<div class="container">
    <div class="inner clearfix">
        <div class="content-left fl" >
<?php include "views/global_nav.php";?>
</div>

        <div class="content-right">
            <h1 class="content-right-title">满额包邮设置<a class="gicon-info-sign gicon_linkother" href="//www.wifenxiao.com/Index/help_show/lm/help/id/240.html" target="_blank"></a></h1>


    <div class="sysPanel">
        <div class="sysPanel-con">
            <div class="sysPanel-title">满额包邮</div>
            <div class="sysPanel-tip">开启后，用户单笔订单满额后即可包邮</div>
        </div>
        <div class="vir-chkb j-vir-chkb">
            <div class="vir-chkb-actions clearfix">
                <a href="javascript:;" class="vir-chkb-enable">已开启</a>
                <a href="javascript:;" class="vir-chkb-disable">已关闭</a>
            </div>
            <input type="radio" name="is_full_mail" class="ip-checkbox j-vir-checkbox" >
        </div>
    </div>

    <div class="sysPanel">
        <div class="formitems">
            <label class="fi-name"><span class="colorRed">*</span>包邮所需订单金额：</label>
            <div class="form-controls">
                <input type="text" class="input j-text-autosave" name="full_mail_money" value="">
                <span class="fi-help-text">请设定数字参数，全场包邮请填写0</span>
            </div>
        </div>
    </div>

        </div>
        <!-- end content-right -->

        <a href="javascript:;" class="btn-leftMenuFold" id="j-btn-leftMenuFold" ></a>
    </div>
</div>
<!-- end container -->
<?php include "views/global_footer.php";?>
<!--gonggao-->

</body>
</html>
<!-- 20170105 -->
