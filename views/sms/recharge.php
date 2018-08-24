
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- 满足有些用户在手机端访问的需要 -->

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <title>短信充值 - Bidcms开源电商</title>

        <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/css/component-min.css">    <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/plugins/jbox/jbox-min.css">


    <style>
        .packages{border-radius: 1px;  font-size: 13px;   padding: 4px 8px; background-color: #fff; border: 1px solid #ccc; width:220px;}
        .smscount{float:right; margin:20px;}
        .J-total{font-size:18px; color:#FF0000;}
    </style>


</head>
<body class="cp-bodybox">
<?php include "views/global_top.php";?>

<div class="container">
    <div class="inner clearfix">
        <div class="content-left fl">
        <?php include "views/global_nav.php";?>
        </div>
        <div class="content-right">
            <h1 class="content-right-title">短信充值<a class="gicon-info-sign gicon_linkother" href="//www.wifenxiao.com/Index/help_show/lm/help/id/215.html" target="_blank"></a></h1>


    <div class="alert alert-info" style="line-height: 25px; height:30px;">当前可用短信数量：<span class="colorRed ftsize18">8</span> 条</div>


    <table width="100%" class="wxtables mgt15">
        <colgroup>
            <col width="20%">
            <col width="60%">
            <col width="20%">

        </colgroup>
        <thead>
        <tr>
            <td>充值项目</td>
            <td>套餐类型</td>
            <td>金额</td>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>短信增值包</td>
            <td>

                <select class="packages J-select" name="pay_type">
                    <option value="0|0">请选择套餐</option>
                    <option value="1|100">A套餐：1000条/100元</option><option value="2|500">B套餐：6200条/500元</option><option value="3|2000">C套餐：28500条/2000元</option><option value="4|5000">D套餐：76800条/5000元</option><option value="5|10000">E套餐：166600条/10000元</option>                </select>

            </td>
            <td><span class="J-total">0</span></td>
        </tr>

        </tbody>
    </table>

    <div class="smscount" style="margin-right:0;">
        <a href="javascript:;" class="btn btn-warning j-recharge" data-id="0">立即充值</a>
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

















    <script type="text/j-template" id="tpl_recharge">
        <div class="formitems">
            <label class="fi-name">充值项目：</label>
            <div class="form-controls pdt5"><span class="colorBlue"><%= name %></span></div>
        </div>
        <div class="formitems">
            <label class="fi-name">金额：</label>
            <div class="form-controls pdt3">
                &yen; <span class="colorRed ftsize18 bold"><%= price %></span>
                <span class="fi-help-text">确定后使用支付宝付款</span>
            </div>
        </div>
        <div class="txtCenter mgt15">
            <a href="<%= url %>" target="_blank" class="btn btn-primary j-alipay">去支付宝付款</a>
        </div>
    </script>
    <!-- end tpl_recharge -->














    <script src="<?php echo SITE_ROOT;?>statics/js/dist/System/recharge.js"></script>






</body>
</html>
<!-- 20170105 -->
