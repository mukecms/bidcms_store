
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- 满足有些用户在手机端访问的需要 -->

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <title>修改密码 - Bidcms开源电商</title>

        <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/css/component-min.css">
        <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/plugins/jbox/jbox-min.css">

</head>
<body class="cp-bodybox">
<?php include "views/global_top.php";?>

<div class="container">
    <div class="inner clearfix">
        <div class="content-left fl">
        <?php include "views/global_nav.php";?>
        </div>

        <div class="content-right">
            <h1 class="content-right-title">修改密码</h1>


        <div class="sysPanel">
        <form action="index.php" method="POST">
		<input type="hidden" name="commit" value="1">
		<input type="hidden" name="con" value="system">
		<input type="hidden" name="act" value="updatepwd">
            <div class="formitems">
                <label class="fi-name"><span class="colorRed">*</span>新密码：</label>
                <div class="form-controls">
                    <input type="password" class="input" name="password" value="">
                    <span class="fi-help-text">密码不能少于6位数！</span>
                </div>
            </div>
            <div class="formitems">
                <label class="fi-name"><span class="colorRed">*</span>重复密码：</label>
                <div class="form-controls">
                    <input type="password" class="input" name="repass" value="">
                    <span class="fi-help-text"></span>
                </div>
            </div>

        	<div class="mgl120">
        		<input type="button" class="btn btn-primary" name="st" value="保存" onclick="return ajaxFrom()" >
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

<script src="<?php echo SITE_ROOT;?>statics/js/ajax_form.js"></script>

</body>
</html>
<!-- 20170105 -->
