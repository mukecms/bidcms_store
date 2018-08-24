
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- 满足有些用户在手机端访问的需要 -->

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <title>积分比例设置 - Bidcms开源电商</title>

        <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/css/component-min.css">    <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/plugins/jbox/jbox-min.css">
    <script type="text/javascript">
    <!--
		var URL_virChkb='index.php?con=system&act=setting';
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
            <h1 class="content-right-title">积分设置<a class="gicon-info-sign gicon_linkother" href="//www.wifenxiao.com/Index/help_show/lm/help/id/197.html" target="_blank"></a></h1>

            <div class="sysPanel">
                <div class="sysPanel-con">
                    <div class="sysPanel-title">积分名称</div>
                    <div class="sysPanel-tip">
                        <label><input name="point_name" type="text" class="input mini j-text-autosave" value="<?php echo $shopinfo['point_name'];?>"></label>
                    </div>
                </div>
            </div>
            <div class="sysPanel">
                <div class="sysPanel-con">
                    <div class="sysPanel-title">积分比例</div>
                    <div class="sysPanel-tip">
                        <label>消费1元送 <input name="point_rate" type="text" class="input mini j-text-autosave" value="<?php echo $shopinfo['point_rate'];?>">积分</label>
                    </div>
                </div>
            </div>
            <div class="sysPanel">
                <div class="sysPanel-con">
                    <div class="sysPanel-title">关注送积分</div>
                    <div class="sysPanel-tip">
                        <label><input name="point_subscibe" type="text" class="input mini j-text-autosave" value="<?php echo $shopinfo['point_subscibe'];?>">积分</label>
                    </div>
                </div>
            </div>
            <div class="sysPanel">
                <div class="sysPanel-con">
                    <div class="sysPanel-title">分享送积分</div>
                    <div class="sysPanel-tip">
                        <label><input name="point_share" type="text" class="input mini j-text-autosave" value="<?php echo $shopinfo['point_share'];?>">积分</label>
                    </div>
                </div>
            </div>
            <div class="sysPanel">
                <div class="sysPanel-con">
                    <div class="sysPanel-title">充值送积分</div>
                    <div class="sysPanel-tip">
                        每充值
                        <input name="recharge_point_amount" type="number" class="input mini j-text-autosave" value="<?php echo $shopinfo['recharge_point_amount'];?>">
                        元，送
                        <input name="recharge_point_num" type="number" class="input mini j-text-autosave" value="<?php echo $shopinfo['recharge_point_num'];?>">
                        积分
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



































</body>
</html>
<!-- 20170105 -->
