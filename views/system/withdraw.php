
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- 满足有些用户在手机端访问的需要 -->

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <title>提现设置 - Bidcms开源电商</title>
    <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/css/component-min.css">
	<link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/plugins/jbox/jbox-min.css">
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
        <!-- end content-left -->

        <div class="content-right">
            <h1 class="content-right-title">提现设置<a class="gicon-info-sign gicon_linkother" href="//www.wifenxiao.com/Index/help_show/lm/help/id/196.html" target="_blank"></a></h1>


    <div class="sysPanel">
        <div class="sysPanel-con">
            <div class="sysPanel-title">余额和佣金提现设置分开</div>
            <div class="sysPanel-tip">如果选择“是”，佣金和余额的提现条件要分开设置。</div>
        </div>
        <div class="vir-chkb j-vir-chkb">
            <div class="vir-chkb-actions clearfix">
                <a href="javascript:;" class="vir-chkb-enable">是</a>
                <a href="javascript:;" class="vir-chkb-disable">否</a>
            </div>
            <input type="radio" name="is_tx_config" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['is_tx_config']==1?'checked':'';?>>
        </div>
    </div>
<!--<div class="alert alert-info disable-del"><h4>提示</h4>设置分销商提现金额之后，用户提现只能提取该金额；提现提示信息将会显示在佣金提现和余额提现页</div>-->
    <div class="sysPanel">
        <div class="sysPanel-divider"><span> 佣金，余额提现设置</span></div>
            <div class="formitems">
                <label class="fi-name" ><span class="colorRed">*</span>提现方式：</label>
                <div class="form-controls">
                    <div class="radio-group">
                        <label><input type="radio" class="j-radio-autosave" name="is_draw_int" value="0" <?php echo $shopinfo['is_draw_int']==0?'checked':'';?>>全额提现</label>
                        <label><input type="radio" class="j-radio-autosave" name="is_draw_int" value="1" <?php echo $shopinfo['is_draw_int']==1?'checked':'';?>>整额提现</label>
                    </div>
                    <span class="fi-help-text" ></span>
                </div>
            </div>
        	<div class="formitems hide draw1">
        		<label class="fi-name"><span class="colorRed">*</span>提现的整数倍数：</label>
        		<div class="form-controls">
        			<input type="text" class="input mini j-pid j-text-autosave" name="withdraw_multiple" value="<?php echo $shopinfo['withdraw_multiple'];?>">元
        			<span class="fi-help-text">提现金额为此值的整数倍数。如：此值为50　则可提现50，100，……</span>
        		</div>
        	</div>
            <div class="formitems hide draw2">
                <label class="fi-name"><span class="colorRed">*</span>最低提现金额：</label>
                <div class="form-controls">
                    <input type="text" class="input mini j-pid j-text-autosave" name="withdraw_start_amount" value="<?php echo $shopinfo['withdraw_start_amount'];?>">元
                    <span class="fi-help-text">提现金额将不小于此值才能提现</span>
                </div>
                <label class="fi-name">提现百分比：</label>
                <div class="form-controls">
                    <input type="text" class="input mini j-pid j-text-autosave" name="withdraw_percentage" value="<?php echo $shopinfo['withdraw_percentage'];?>">%
                    <span class="fi-help-text">可提现金额的百分比，为0表示不做限制</span>
                </div>
            </div>
            <div class="formitems">
                <label class="fi-name">提现手续费比例：</label>
                <div class="form-controls">
                    <input type="text" class="input mini j-pid j-text-autosave" name="withdraw_proportion" value="<?php echo $shopinfo['withdraw_multiple'];?>">%
                    <span class="fi-help-text">为0表示不收手续费</span>
                </div>
            </div>
            <div class="formitems">
                <label class="fi-name"><span class="colorRed">*</span>提现提示信息：</label>
                <div class="form-controls">
                    <textarea name="draw_alert" id="" class="textarea small j-text-autosave"><?php echo $shopinfo['draw_alert'];?></textarea>
                    <span class="fi-help-text"></span>
                </div>
            </div>
            <div class="formitems">
                <label class="fi-name"><span class="colorRed">*</span>提现支持账户：</label>

                <div class="form-controls">
                    <div class="checkbox-group">
                        <label><input type="checkbox" name="withdraw_type" value="1" class="j-checkbox-autosave">支付宝</label>
                        <label><input type="checkbox" name="withdraw_type" value="2" class="j-checkbox-autosave">微信支付</label>
                        <label><input type="checkbox" name="withdraw_type" value="3" class="j-checkbox-autosave">网银支付</label>
                    </div>
                    <span class="fi-help-text"></span>
                </div>
            </div>
            <div class="formitems">
                <label class="fi-name"><span class="colorRed">*</span>提现申请时间：</label>
                <div class="form-controls">
                    <div class="radio-group">
                        <label><input type="radio" name="withdraw_specify_time" class="j-radio-autosave" value="0" <?php echo $shopinfo['withdraw_specify_time']==0?'checked':'';?> >任意时间</label>
                        <label><input type="radio" name="withdraw_specify_time" class="j-radio-autosave" value="1" <?php echo $shopinfo['withdraw_specify_time']==1?'checked':'';?>>特定时间</label>
                    </div>
                    <span class="fi-help-text"></span>
                </div>
            </div>
            <div class="formitems showTimeChoice">
                <label class="fi-name"><span class="colorRed">*</span>特定提现时间：</label>
                <div class="form-controls">
                    <div class="checkbox-group">
                        <label><input type="checkbox" name="week_type" class="j-checkbox-autosave" value="1" >周一</label>
                        <label><input type="checkbox" name="week_type" class="j-checkbox-autosave" value="2" >周二</label>
                        <label><input type="checkbox" name="week_type" class="j-checkbox-autosave" value="3" >周三</label>
                        <label><input type="checkbox" name="week_type" class="j-checkbox-autosave" value="4" >周四</label>
                        <label><input type="checkbox" name="week_type" class="j-checkbox-autosave" value="5" >周五</label>
                        <label><input type="checkbox" name="week_type" class="j-checkbox-autosave" value="6" >周六</label>
                        <label><input type="checkbox" name="week_type" class="j-checkbox-autosave" value="7" >周日</label>
                    </div>
                    <div class="mgt10">
                        <span class="tbs-txt">时间：</span>
                            <input type="text" autocomplete="off" name="start_withdrawals_time" value="<?php echo $shopinfo['start_withdrawals_time'];?>" placeholder="开始时间" class="input j-text-autosave" style="width:58px;">~
                            <input type="text" autocomplete="off" name="end_withdrawals_time" value="<?php echo $shopinfo['end_withdrawals_time'];?>" placeholder="结束时间" class="input j-text-autosave" style="width:58px;">
                    </div>
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

<script src="<?php echo SITE_ROOT;?>statics/js/ajax_form.js"></script>
<script>
	var withdraw_type="b,<?php echo $shopinfo['withdraw_type'];?>,e";
	var week_type="b,<?php echo $shopinfo['week_type'];?>,e";
	$(function(){
		$("input[name=is_tx_config]").change(function(){
			setTimeout(function(){
				window.location.reload();
			},800);
		});
		$("input[name='week_type']").each(function(i){
			if(week_type.indexOf(','+$(this).val()+',')>0){
				$(this).attr("checked",true);
			}
		});
		$("input[name='withdraw_type']").each(function(i){
			if(withdraw_type.indexOf(','+$(this).val()+',')>0){
				$(this).attr("checked",true);
			}
		});
	})
</script>




</body>
</html>
<!-- 20170105 -->
