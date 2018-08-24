
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- 满足有些用户在手机端访问的需要 -->

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <title>成为分销商等级设置 - Bidcms开源电商</title>
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
            <h1 class="content-right-title">成为分销商等级设置<a class="gicon-info-sign gicon_linkother" href="//www.wifenxiao.com/Index/help_show/lm/help/id/198.html" target="_blank"></a></h1>


    <div class="sysPanel">
        <div class="sysPanel-con">
            <div class="sysPanel-title">功能开关</div>
            <div class="sysPanel-tip">开启功能后，申请成为分销商将会设置成为指定的分销商等级</div>
        </div>
        <div class="vir-chkb j-vir-chkb">
            <div class="vir-chkb-actions clearfix">
                <a href="javascript:;" class="vir-chkb-enable">已开启</a>
                <a href="javascript:;" class="vir-chkb-disable">已关闭</a>
            </div>
            <input type="radio" name="is_agent_rank" class="ip-checkbox j-vir-checkbox" >
        </div>
    </div>
    <div class="sysPanel">
        <div class="formitems">
            <label class="fi-name"><span class="colorRed">*</span>指定分销商等级：</label>
            <div class="form-controls">
                <select name="set_agent_rank" id="rank" class="select j-select-autosave">

                </select>
                <span class="fi-help-text"></span>
            </div>
        </div>
        <div class="formitems">
            <div class="form-controls" style="margin-left:120px;">
                <a href="javascript:;" class="btn btn-primary js-save-btn">保存</a>
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
<script type="text/javascript">
<!--
	var rank=<?php echo json_encode($rank);?>;
	var current_rank="<?php echo $shopinfo['set_agent_rank'];?>";
	var html='<option value="-1">--请选择--</option>';
	for(i in rank){
		if(current_rank==rank[i].id){
			html+='<option value="'+rank[i].id+'" selected>'+rank[i].title+'</option>';
		} else {
			html+='<option value="'+rank[i].id+'">'+rank[i].title+'</option>';
		}
	}
	$("#rank").html(html);
//-->
</script>
</body>
</html>
<!-- 20170105 -->
