
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- 满足有些用户在手机端访问的需要 -->

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <title>分销申请设置 - Bidcms开源电商</title>

        <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/css/component-min.css">    <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/plugins/jbox/jbox-min.css">
    <script type="text/javascript">
    <!--
		var URL_virChkb='index.php?con=system&act=setting';
    //-->
    </script>
    <!-- diy css start-->
<link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/mobile/css/style.css">

	<link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/plugins/diy/diy-min.css">
<link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/plugins/uploadify/uploadify-min.css">
<link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/plugins/colorpicker/colorpicker.css">
<!-- diy css end-->
    <style>
        .formitems .fi-name{width: 115px!important;}
        .form-controls{margin-left: 115px!important;}
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
            <h1 class="content-right-title">分销申请设置<a class="gicon-info-sign gicon_linkother" href="//www.wifenxiao.com/Index/help_show/lm/help/id/198.html" target="_blank"></a></h1>


    <div class="sysPanel">
        <div class="sysPanel-con">
            <div class="sysPanel-title">申请需满足条件</div>
            <div class="sysPanel-tip">开启后，需满足<a href="/System/audit">自动审核</a>条件才能提交申请。</div>
        </div>
        <div class="vir-chkb j-vir-chkb">
            <div class="vir-chkb-actions clearfix">
                <a href="javascript:;" class="vir-chkb-enable">已开启</a>
                <a href="javascript:;" class="vir-chkb-disable">已关闭</a>
            </div>
            <input type="radio" name="need_apply_condition" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['need_apply_condition']==1?'checked':'';?>>
        </div>
    </div>

    <div class="sysPanel">
        <div class="sysPanel-con">
            <div class="sysPanel-title">申请页显示条件</div>
            <div class="sysPanel-tip">开启后，分销申请页面将显示<a href="/System/audit">自动审核</a>条件。</div>
        </div>
        <div class="vir-chkb j-vir-chkb">
            <div class="vir-chkb-actions clearfix">
                <a href="javascript:;" class="vir-chkb-enable">已显示</a>
                <a href="javascript:;" class="vir-chkb-disable">已隐藏</a>
            </div>
            <input type="radio" name="display_apply_condition" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['display_apply_condition']==1?'checked':'';?>>
        </div>
    </div>

    <div class="sysPanel">
        <div class="sysPanel-con">
            <div class="sysPanel-title">申请类型</div>
            <div class="sysPanel-tip">开启后，申请分销商需选择是企业或个人</div>
        </div>
        <div class="vir-chkb j-vir-chkb">
            <div class="vir-chkb-actions clearfix">
                <a href="javascript:;" class="vir-chkb-enable">已开启</a>
                <a href="javascript:;" class="vir-chkb-disable">已关闭</a>
            </div>
            <input type="radio" name="need_apply_type" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['need_apply_type']==1?'checked':'';?>>
        </div>
    </div>

    <div class="sysPanel">
        <div class="sysPanel-con">
            <div class="sysPanel-title">申请协议</div>
            <div class="sysPanel-tip">开启后，申请分销商需同意申请协议方可申请</div>
        </div>
        <div class="vir-chkb j-vir-chkb">
            <div class="vir-chkb-actions clearfix">
                <a href="javascript:;" class="vir-chkb-enable">已开启</a>
                <a href="javascript:;" class="vir-chkb-disable">已关闭</a>
            </div>
            <input type="radio" name="need_apply_agreement" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['need_apply_agreement']==1?'checked':'';?>>
        </div>
    </div>

    <div class="sysPanel">
        <div class="sysPanel-divider"><span>满足申请条件显示页面</span></div>
        <div class="formitems">
            <label class="fi-name">手机号码：</label>
            <div class="form-controls" style="padding-top:5px;">
                <label><input name="apply_mobile" type="checkbox" class="j-checkbox-autosave" value="1" <?php echo strpos('a'.$shopinfo['apply_mobile'],'1')>0?'checked':'';?>/>显示</label>　　
                <label><input name="apply_mobile" type="checkbox" class="j-checkbox-autosave" value="2" <?php echo strpos('a'.$shopinfo['apply_mobile'],'2')>0?'checked':'';?>/>必填</label>
                <span class="j-autosavePanel"></span>
            </div>
        </div>
        <div class="formitems">
            <label class="fi-name">地址信息：</label>
            <div class="form-controls" style="padding-top:5px;">
                <label><input name="apply_address" type="checkbox" class="j-checkbox-autosave" value="1" <?php echo strpos('a'.$shopinfo['apply_address'],'1')>0?'checked':'';?>/>显示</label>　　
                <label><input name="apply_address" type="checkbox" class="j-checkbox-autosave" value="2" <?php echo strpos('a'.$shopinfo['apply_address'],'2')>0?'checked':'';?>/>必填</label>
                <span class="j-autosavePanel"></span>
            </div>
        </div>
        <div class="formitems">
            <label class="fi-name">微信号：</label>
			<?php $apply_weixin=explode(',',$shopinfo['apply_weixin']);?>
            <div class="form-controls" style="padding-top:5px;">
                <label><input name="apply_weixin" type="checkbox" class="j-checkbox-autosave" value="1" <?php echo strpos('a'.$shopinfo['apply_weixin'],'1')>0?'checked':'';?>/>显示</label>　　
                <label><input name="apply_weixin" type="checkbox" class="j-checkbox-autosave" value="2" <?php echo strpos('a'.$shopinfo['apply_weixin'],'2')>0?'checked':'';?>/>必填</label>
                <span class="j-autosavePanel"></span>
            </div>
        </div>

        <div class="formitems">
            <label class="fi-name">头部标题：</label>
            <div class="form-controls">
                <input type="text" class="input j-text-autosave" name="apply_head_title" value="<?php echo $shopinfo['apply_head_title'];?>">
                <span class="fi-help-text">默认显示“分销申请”</span>
            </div>
        </div>
        <!-- <div class="formitems">
            <label class="fi-name">申请页标题：</label>
            <div class="form-controls">
                <input type="text" class="input" name="apply_title" value="申请分销">
                <span class="fi-help-text">默认显示“申请分销”</span>
            </div>
        </div>
        <div class="formitems">
            <label class="fi-name">页面副标题：</label>
            <div class="form-controls">
                <input type="text" class="input" name="apply_subtitle" value="快速分销拿佣金">
                <span class="fi-help-text">默认显示“快速分销拿佣金”</span>
            </div>
        </div> -->
        <div class="formitems">
            <label class="fi-name"><span class="colorRed">*</span>背景图：</label>
			<?php $background=!empty($shopinfo['apply_background'])?$shopinfo['apply_background']:'/statics/mobile/images/apply_head.jpg';?>
            <div class="form-controls pdt5 j-imglistPanel">
                <ul class="img-list clearfix">
                    <li class="img-list-add j-addgoods"><img src="<?php echo $background;?>"/></li>
                </ul>
                <input type="hidden" name="apply_background" class="j-imglist-dataset j-text-autosave" value="<?php echo $background;?>">
                <span class="fi-help-text"><a href="javasecript:;" class="tips" data-trigger="hover" data-placement="top" data-content='<img src="<?php echo SITE_ROOT;?>statics/mobile/images/apply_head.jpg" width="375px;" height="125px;">'>鼠标放上可以查看例图</a></span>
                <span class="fi-help-text">建议尺寸：750px*250px</span>
            </div>
        </div>
        <div class="formitems">
            <label class="fi-name">分销商特权一：</label>
            <div class="form-controls">
                <input type="text" class="input j-text-autosave" name="agent_privilege_one" value="<?php echo $shopinfo['agent_privilege_one'];?>">
                <span class="fi-help-text">默认显示“独立微店”；<a href="javasecript:;" class="tips" data-trigger="hover" data-placement="top" data-content='<img src="<?php echo SITE_ROOT;?>statics/images/apply_privilege.png">'>查看例图</a></span>
            </div>
        </div>
        <div class="formitems">
            <label class="fi-name">特权补充一：</label>
            <div class="form-controls">
                <input type="text" class="input j-text-autosave" name="privilege_one_supply" value="<?php echo $shopinfo['privilege_one_supply'];?>">
                <span class="fi-help-text">默认显示“拥有自己的微店及分销名片”</span>
            </div>
        </div>
        <div class="formitems">
            <label class="fi-name">分销商特权二：</label>
            <div class="form-controls">
                <input type="text" class="input j-text-autosave" name="agent_privilege_two" value="<?php echo $shopinfo['agent_privilege_two'];?>">
                <span class="fi-help-text">默认显示“分销拿佣金”</span>
            </div>
        </div>
        <div class="formitems">
            <label class="fi-name">特权补充二：</label>
            <div class="form-controls">
                <input type="text" class="input j-text-autosave" name="privilege_two_supply" value="<?php echo $shopinfo['privilege_two_supply'];?>">
                <span class="fi-help-text">默认显示“微店卖出商品，您可以获得佣金”</span>
            </div>
        </div>
        <div class="formitems">
            <label class="fi-name">特权补充三：</label>
            <div class="form-controls">
                <input type="text" class="input j-text-autosave" name="privilege_three_supply" value="<?php echo $shopinfo['privilege_three_supply'];?>">
                <span class="fi-help-text">默认显示“分销佣金由厂家统一设置”</span>
            </div>
        </div>
        <div class="formitems">
            <label class="fi-name">申请说明：</label>
            <div class="form-controls">
                <textarea class="textarea small j-text-autosave" name="apply_illustrate"><?php echo $shopinfo['apply_illustrate'];?></textarea>
                <span class="fi-help-text"><a href="javasecript:;" class="tips" data-trigger="hover" data-placement="top" data-content='<img src="<?php echo SITE_ROOT;?>statics/images/home/illustrate.png">'>鼠标放上可以查看例图</a></span>
            </div>
        </div>
        <div class="formitems">
            <label class="fi-name">默认到期天数：</label>
            <div class="form-controls">
                <input type="text" class="input mini j-text-autosave" name="default_agent_end" value="<?php echo $shopinfo['default_agent_end'];?>">天
                <span class="fi-help-text">会员成为分销商时自动计算到期时间</span>
            </div>
        </div>
        <div class="formitems agreement">
            <label class="fi-name">申请协议正文：</label>
            <div class="form-controls" id="form-controls">
                <textarea id="content" name="apply_agreement" class="j-text-autosave"><?php echo $shopinfo['apply_agreement'];?></textarea>
            </div>
        </div>
        <div class="sysPanel-divider"><span>未满足申请条件显示页面</span></div>
        <div class="formitems">
            <label class="fi-name"><span class="colorRed">*</span>背景图：</label>
            <div class="form-controls pdt5 j-imglistPanel">
                <ul class="img-list clearfix">
                    <li class="img-list-add j-addgoods">+</li>
                </ul>
                <input type="hidden" name="not_apply_background" class="j-imglist-dataset j-text-autosave" value="<?php echo $shopinfo['not_apply_background'];?>">
                <span class="fi-help-text">建议图片大小：700*460</span>
            </div>
        </div>
        <div class="formitems">
            <label class="fi-name"><span class="colorRed">*</span>字体大小：</label>
            <div class="form-controls pdt5">
                <input type="text" class="input mini j-text-autosave" name="not_apply_font_size" value="<?php echo $shopinfo['not_apply_font_size'];?>"> px
            </div>
        </div>
        <div class="formitems">
            <label class="fi-name"><span class="colorRed">*</span>字体颜色：</label>
            <div class="form-controls pdt5 clearfix">
                <div class="colorPicker fl" id="" data-name="" data-color="#ccc" style="background-color: ">颜色选择</div>
                <input type="hidden" name="not_apply_font_color" class="font_color j-text-autosave" value="<?php echo $shopinfo['not_apply_font_color'];?>"/>
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
<!-- diy js start-->
<script src="<?php echo SITE_ROOT;?>statics/plugins/ueditor/diyUeditor-min.js"></script>
<script src="<?php echo SITE_ROOT;?>statics/plugins/uploadify/jquery.uploadify.min.js?ver=2848"></script>
<script src="<?php echo SITE_ROOT;?>statics/js/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo SITE_ROOT;?>statics/plugins/diy/diy-min.js"></script>
<script src="<?php echo SITE_ROOT;?>statics/plugins/colorpicker/colorpicker.js"></script><!-- diy js end -->
<!-- 实例化编辑器 -->
<script type="text/javascript">
	$(function(){
		var ue = UE.getEditor('content', {
			autoHeight: false,
			initialFrameHeight:300,
			initialFrameWidth:700
		});

		var ueTimer=null;

		ue.addListener('blur',function(){
			if(ueTimer) clearTimeout(ueTimer);

			ueTimer=setTimeout(function(){
				$("textarea[name=apply_agreement]").val(ue.getContent()).change();
			},1000);
		});
	});

	//添加图片
	$(document).on("click", ".j-addgoods", function() {
		var $self=$(this);

		HYD.popbox.ImgPicker(function(data) {
			var imgsrc=data[0];
			$self.parents(".j-imglistPanel").find(".j-imglist-dataset").val(imgsrc).change();

			if(imgsrc){
				$self.empty().append("<img src='"+imgsrc+"'/>");
			}else{
				$self.empty().append("+");
			}
		});
	});

	//颜色选择器
	;(function(){
		var $colorPicker= $(".colorPicker"),
			name = $colorPicker.data("name"),
			color = $colorPicker.data("color");

		$colorPicker.ColorPicker({
			color: color,
			onShow: function(colpkr) {
				$(colpkr).fadeIn(100);
				return false;
			},
			onHide: function(colpkr) {
				$(colpkr).fadeOut(100);
				$colorPicker.siblings(".j-text-autosave").change();
				return false;
			},
			onChange: function(hsb, hex, rgb) {
				var hex = '#' + hex;
				$colorPicker.css("background-color", hex);
				$(".font_color").val(hex);
			}
		});
	})();
</script>






</body>
</html>
<!-- 20170105 -->
