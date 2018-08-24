
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- 满足有些用户在手机端访问的需要 -->

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <title>绑定域名 - Bidcms开源电商</title>

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
            <h1 class="content-right-title">绑定域名<a class="gicon-info-sign gicon_linkother" href="//www.wifenxiao.com/Index/help_show/lm/help/id/202.html" target="_blank"></a></h1>


    <div class="sysPanel">
        <form action="index.php" method="POST" id="from1">
			<input type="hidden" name="commit" value="1">
			<input type="hidden" name="con" value="system">
			<input type="hidden" name="act" value="domain">
            <div class="formitems">
                <label class="fi-name"><span class="colorRed">*</span>域名：</label>
                <div class="form-controls">
                    //<input type="text" class="input xlarge" name="domain_name" value="<?php echo $info['name'];?>">
                    <span class="fi-help-text">域名解析前请先备案，
                    <a href="https://beian.aliyun.com" target="_blank"><span style="font-size: 12px;color:#428bca;">还没备案?点击前往备案</span></a>。                        如有问题，请咨询
                        <a target="_blank" href="//wpa.qq.com/msgrd?v=3&uin=2559009123&site=qq&menu=yes"><img border="0" src="//wpa.qq.com/pa?p=2:80038753:41" alt="点击这里给我发消息" title="点击这里给我发消息"></a>
                    <a target="_blank" href="//wpa.qq.com/msgrd?v=3&uin=253947468&site=qq&menu=yes"><img border="0" src="//wpa.qq.com/pa?p=2:10064887:41" alt="点击这里给我发消息" title="点击这里给我发消息"></a></span>
                </div>
            </div>
            <div class="formitems">
                <label class="fi-name"><span class="colorRed"></span>公安部备案号：</label>
                <div class="form-controls">
                    <input type="text" class="input large" name="beian_no" value="<?php echo $info['beian_no'];?>">
                    <span class="fi-help-text"></span>
                </div>
            </div>
            <div class="formitems">
                <label class="fi-name"><span class="colorRed">*</span>工信部备案号：</label>
                <div class="form-controls">
                    <input type="text" class="input large" name="icp_number" value="<?php echo $info['icp_number'];?>">
                    <a href="https://beian.aliyun.com" target="_blank"><span style="font-size: 12px;color:#428bca;">还没备案?点击前往备案</span></a>
					<span class="fi-help-text"></span>
                </div>
            </div>
            <div class="formitems">
                <label class="fi-name"><span class="colorRed"></span>状态：</label>
                <div class="form-controls" style="line-height: 28px;">
					<span class="label <?php echo $status_color[$info['status']];?>"><?php echo $status[$info['status']];?></span>
					<span class="fi-help-text" style="display:inline-block;color:#428bca;">
                    联系电话：<strong>13001199690</strong> 咨询审核进度</span>
                    <span class="fi-help-text"></span>
                </div>
            </div>
            <div class="formitems inline">
                <div class="form-controls">
                    <div class="checkbox-group">
                        <label><input type="checkbox" name="chk_know_unbind" value="1"> 我已知晓绑定后不可以再解绑</label>
                        <span class="fi-help-text j-chk_know_unbind-tip"></span>
                    </div>
                </div>
            </div>
            <div class="mgl120 mgt10">
			<input type="button" class="btn btn-primary submit" value="提交" >
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
<script type="text/javascript" src="<?php echo SITE_ROOT;?>statics/js/ajax_form.js"></script>
<script>
	$(function(){
		$(".submit").click(function(){
			var $ip=$("input[name=chk_know_unbind]");
			if($ip.is(":checked")){
				ajaxFrom();
				return true;
			}
			else{
				$(".j-chk_know_unbind-tip").addClass("error").text("请已知晓绑定后不可以再解绑");
				return false;
			}
		});
	})
</script>






</body>
</html>
<!-- 20170105 -->
