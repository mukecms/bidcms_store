
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- 满足有些用户在手机端访问的需要 -->

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
	<title>添加快递单模板 - Bidcms开源电商</title>
    <!-- 线上环境 -->
	<link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/css/component-min.css">
	<link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/plugins/jbox/jbox-min.css">

    <!-- diy css start-->
	<link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/mobile/css/style.css">

	<link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/plugins/diy/diy-min.css">
	<link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/plugins/uploadify/uploadify-min.css">
	<link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/plugins/colorpicker/colorpicker.css">
	<!-- diy css end-->
	<link rel="stylesheet" type="text/css" href="<?php echo SITE_ROOT;?>statics/js/jquery-ui/jquery.ui.resizable-min.css">
	<link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/css/System/delivery.css">
	<style>
		.default-height { height: 500px;}
	</style>

</head>
<body class="cp-bodybox">
<?php include "views/global_top.php";?>

<div class="container">
    <div class="inner clearfix">
        <div class="content-left fl" >
		<?php include "views/global_nav.php";?>
        </div>
        <!-- end content-left -->

        <div class="content-right">
            <h1 class="content-right-title">添加快递单模板</h1>


<div class="alert alert-danger" id="hack_fixie67" style="display:none;"><strong>提示</strong>系统检测到您使用的浏览器版本过低，如果功能无法正常使用，请尝试升级您的浏览器。</div>
<div class="express-settingbox">
	<form id="J_FormExpress" action="" method="post">
    <input type="hidden" name="commit" value="1">
  	<input type="hidden" name="con" value="freight">
  	<input type="hidden" name="act" value="add_delivery">
    <input type="hidden" name="update_id" value="<?php echo $info['id'];?>">
		<div class="formitems" style="vertical-align: top; display: inline-block; margin-left: 0;">
			<label class="fi-name" style="width: 80px;"><span class="colorRed">*</span>物&nbsp;流&nbsp;公&nbsp;司：</label>
			<div class="form-controls" style="margin-left: 90px;">
				<select class="select small" name="shipping_company_id" id="J_ShippingCompanyId">
					<option value="">--请选择--</option>
          <?php foreach($GLOBALS['freight_company'] as $k=>$v){?>
            <option value="<?php echo $k;?>"><?php echo $v;?></option>
          <?php }?>
        </select>
				<span class="fi-help-text hide"></span>
			</div>
		</div>
		<div class="formitems" style="vertical-align: top; display: inline-block; margin-left: 10px;">
			<label class="fi-name" style="width: 80px;"><span class="colorRed">*</span>模&nbsp;板&nbsp;名&nbsp;称：</label>
			<div class="form-controls" style="margin-left: 90px;">
				<input type="text" placeholder="" name="print_temp_name" value="<?php echo $info['title'];?>" id="J_PrintTempName" class="input"/>
				<span class="fi-help-text hide"></span>
			</div>
		</div>
		<div class="formitems">
			<label class="fi-name" style="width: 80px;"><span class="colorRed">*</span>快递单尺寸：</label>
			<div class="form-controls" style="vertical-align: top; display: inline-block; margin-left: 10px;">
				<label>长</label>
				<input type="text" placeholder="" class="input mini" name="printing_paper_width" value="<?php echo $info['paper_width'];?>" id="printing_paper_width" />
				<span class="fi-help-text hide"></span>
			</div>
			<div class="form-controls" style="vertical-align: top; display: inline-block; margin-left: 0;">
				<label>宽</label>
				<input type="text" placeholder="" class="input mini" name="printing_paper_height" value="<?php echo $info['paper_height'];?>" id="printing_paper_height" />
				<span class="fi-help-text hide"></span>
			</div>
			<div class="form-controls" style="vertical-align: top; display: inline-block; margin-left: 0; overflow: hidden;">
				<input type="hidden" name="img_url" id="J_ImgUrl" value="<?php echo $info['img_url'];?>"  />
                <a href="javascript:;" class="btn btn-primary" id="j-selectImgs">上传底图</a>
				<span class="fi-help-text hide"></span>
			</div>
			<span class="fi-help-text">此处设置快递单的实际尺寸，单位0.1mm，如长120mm，则设置1200<br/>
                选择打印项注意: 商品名称/数量/编码/规格的文本框宽高,请设置大点，否者可能会打印信息不全
            </span>
		</div>
	</form>
    <select id="slt_opts" class="select">
        <option value="">请选择打印项</option>
        <option value="ordersn">订单 - 订单号</option><option value="realname2">收货人 - 姓名</option><option value="province2">收货人 - 省份</option><option value="address2">收货人 - 地址</option><option value="zipcode2">收货人 - 邮编</option><option value="mobile2">收货人 - 手机</option><option value="sitename">网店名称</option><option value="address">发货人 - 地址</option><option value="tel">发货人 - 电话</option><option value="year">年</option><option value="month">月</option><option value="day">日</option><option value="city2">收货人 - 城市</option><option value="district2">收货人 - 地区</option><option value="itemattr">商品规格</option><option value="itemcode">商品编码</option><option value="itemname">商品名称</option><option value="itemsn">商品货号</option><option value="itemnum">商品数量</option><option value="cardnumber">收货人 - 身份证号</option><option value="itemweight">商品重量</option><option value="itemtotalfee">商品总价</option>    </select>
    <select id="slt_fontsize" class="select small">
        <option value="">字体大小</option>
        <option value="10">10px</option>
        <option value="12">12px</option>
        <option value="14">14px</option>
        <option value="16">16px</option>
        <option value="18">18px</option>
        <option value="20">20px</option>
        <option value="22">22px</option>
        <option value="24">24px</option>
    </select>

    <select id="slt_letterSpacing" class="select small">
        <option value="">文字间距</option>
        <option value="0">0px</option>
        <option value="2">2px</option>
        <option value="4">4px</option>
        <option value="6">6px</option>
        <option value="8">8px</option>
        <option value="10">10px</option>
        <option value="12">12px</option>
        <option value="14">14px</option>
        <option value="16">16px</option>
        <option value="18">18px</option>
    </select>

    <span>右偏移：</span><input type="text" class="input" id="ipt_posLeft" style="width:50px;"><span>px</span>
    <span>下偏移：</span><input type="text" class="input" id="ipt_posTop" style="width:50px;"><span>px</span>
    <a href="javascript:;" id="ckb_fontbold" class="ckb-font" title="加粗"><i class="expicon bold"></i></a>
    <a href="javascript:;" id="ckb_fontitalic" class="ckb-font" title="斜体"><i class="expicon italic"></i></a>
</div>

<div id="express-editor">
    <div class="textarea-item" id="ordersn">
        <textarea name="ordersn" data-item_config="<?php echo $print_items['ordersn'];?>" data-tip_value="订单 - 订单号" >订单 - 订单号</textarea>
        <a href="javascript:;" title="移除" class="textarea-item-del"><i class="exp-ctrl-icon remove"></i></a>
        <a href="javascript:;" title="移动" class="textarea-item-move"><i class="exp-ctrl-icon move"></i></a>
    </div><div class="textarea-item" id="realname2">
        <textarea name="realname2" data-item_config="<?php echo $print_items['realname2'];?>" data-tip_value="收货人 - 姓名">收货人 - 姓名</textarea>
        <a href="javascript:;" title="移除" class="textarea-item-del"><i class="exp-ctrl-icon remove"></i></a>
        <a href="javascript:;" title="移动" class="textarea-item-move"><i class="exp-ctrl-icon move"></i></a>
    </div><div class="textarea-item" id="province2">
        <textarea name="province2" data-item_config="<?php echo $print_items['province2'];?>" data-tip_value="收货人 - 省份">收货人 - 省份</textarea>
        <a href="javascript:;" title="移除" class="textarea-item-del"><i class="exp-ctrl-icon remove"></i></a>
        <a href="javascript:;" title="移动" class="textarea-item-move"><i class="exp-ctrl-icon move"></i></a>
    </div><div class="textarea-item" id="address2">
        <textarea name="address2" data-item_config="<?php echo $print_items['address2'];?>" data-tip_value="收货人 - 地址">收货人 - 地址</textarea>
        <a href="javascript:;" title="移除" class="textarea-item-del"><i class="exp-ctrl-icon remove"></i></a>
        <a href="javascript:;" title="移动" class="textarea-item-move"><i class="exp-ctrl-icon move"></i></a>
    </div><div class="textarea-item" id="zipcode2">
        <textarea name="zipcode2" data-item_config="<?php echo $print_items['zipcode2'];?>" data-tip_value="收货人 - 邮编">收货人 - 邮编</textarea>
        <a href="javascript:;" title="移除" class="textarea-item-del"><i class="exp-ctrl-icon remove"></i></a>
        <a href="javascript:;" title="移动" class="textarea-item-move"><i class="exp-ctrl-icon move"></i></a>
    </div><div class="textarea-item" id="mobile2">
        <textarea name="mobile2" data-item_config="<?php echo $print_items['mobile2'];?>" data-tip_value="收货人 - 手机">收货人 - 手机</textarea>
        <a href="javascript:;" title="移除" class="textarea-item-del"><i class="exp-ctrl-icon remove"></i></a>
        <a href="javascript:;" title="移动" class="textarea-item-move"><i class="exp-ctrl-icon move"></i></a>
    </div><div class="textarea-item" id="sitename">
        <textarea name="sitename" data-item_config="<?php echo $print_items['sitename'];?>" data-tip_value="网店名称">网店名称</textarea>
        <a href="javascript:;" title="移除" class="textarea-item-del"><i class="exp-ctrl-icon remove"></i></a>
        <a href="javascript:;" title="移动" class="textarea-item-move"><i class="exp-ctrl-icon move"></i></a>
    </div><div class="textarea-item" id="address">
        <textarea name="address" data-item_config="<?php echo $print_items['address'];?>" data-tip_value="发货人 - 地址">发货人 - 地址</textarea>
        <a href="javascript:;" title="移除" class="textarea-item-del"><i class="exp-ctrl-icon remove"></i></a>
        <a href="javascript:;" title="移动" class="textarea-item-move"><i class="exp-ctrl-icon move"></i></a>
    </div><div class="textarea-item" id="tel">
        <textarea name="tel" data-item_config="<?php echo $print_items['tel'];?>" data-tip_value="发货人 - 电话">发货人 - 电话</textarea>
        <a href="javascript:;" title="移除" class="textarea-item-del"><i class="exp-ctrl-icon remove"></i></a>
        <a href="javascript:;" title="移动" class="textarea-item-move"><i class="exp-ctrl-icon move"></i></a>
    </div><div class="textarea-item" id="year">
        <textarea name="year" data-item_config="<?php echo $print_items['year'];?>" data-tip_value="年">年</textarea>
        <a href="javascript:;" title="移除" class="textarea-item-del"><i class="exp-ctrl-icon remove"></i></a>
        <a href="javascript:;" title="移动" class="textarea-item-move"><i class="exp-ctrl-icon move"></i></a>
    </div><div class="textarea-item" id="month">
        <textarea name="month" data-item_config="<?php echo $print_items['month'];?>" data-tip_value="月">月</textarea>
        <a href="javascript:;" title="移除" class="textarea-item-del"><i class="exp-ctrl-icon remove"></i></a>
        <a href="javascript:;" title="移动" class="textarea-item-move"><i class="exp-ctrl-icon move"></i></a>
    </div><div class="textarea-item" id="day">
        <textarea name="day" data-item_config="<?php echo $print_items['day'];?>" data-tip_value="日">日</textarea>
        <a href="javascript:;" title="移除" class="textarea-item-del"><i class="exp-ctrl-icon remove"></i></a>
        <a href="javascript:;" title="移动" class="textarea-item-move"><i class="exp-ctrl-icon move"></i></a>
    </div><div class="textarea-item" id="city2">
        <textarea name="city2" data-item_config="<?php echo $print_items['city2'];?>" data-tip_value="收货人 - 城市">收货人 - 城市</textarea>
        <a href="javascript:;" title="移除" class="textarea-item-del"><i class="exp-ctrl-icon remove"></i></a>
        <a href="javascript:;" title="移动" class="textarea-item-move"><i class="exp-ctrl-icon move"></i></a>
    </div><div class="textarea-item" id="district2">
        <textarea name="district2" data-item_config="<?php echo $print_items['district2'];?>" data-tip_value="收货人 - 地区">收货人 - 地区</textarea>
        <a href="javascript:;" title="移除" class="textarea-item-del"><i class="exp-ctrl-icon remove"></i></a>
        <a href="javascript:;" title="移动" class="textarea-item-move"><i class="exp-ctrl-icon move"></i></a>
    </div><div class="textarea-item" id="itemattr">
        <textarea name="itemattr" data-item_config="<?php echo $print_items['itemattr'];?>" data-tip_value="商品规格">商品规格</textarea>
        <a href="javascript:;" title="移除" class="textarea-item-del"><i class="exp-ctrl-icon remove"></i></a>
        <a href="javascript:;" title="移动" class="textarea-item-move"><i class="exp-ctrl-icon move"></i></a>
    </div><div class="textarea-item" id="itemcode">
        <textarea name="itemcode" data-item_config="<?php echo $print_items['itemcode'];?>" data-tip_value="商品编码">商品编码</textarea>
        <a href="javascript:;" title="移除" class="textarea-item-del"><i class="exp-ctrl-icon remove"></i></a>
        <a href="javascript:;" title="移动" class="textarea-item-move"><i class="exp-ctrl-icon move"></i></a>
    </div><div class="textarea-item" id="itemname">
        <textarea name="itemname" data-item_config="<?php echo $print_items['itemname'];?>" data-tip_value="商品名称">商品名称</textarea>
        <a href="javascript:;" title="移除" class="textarea-item-del"><i class="exp-ctrl-icon remove"></i></a>
        <a href="javascript:;" title="移动" class="textarea-item-move"><i class="exp-ctrl-icon move"></i></a>
    </div><div class="textarea-item" id="itemsn">
        <textarea name="itemsn" data-item_config="<?php echo $print_items['itemsn'];?>" data-tip_value="商品货号">商品货号</textarea>
        <a href="javascript:;" title="移除" class="textarea-item-del"><i class="exp-ctrl-icon remove"></i></a>
        <a href="javascript:;" title="移动" class="textarea-item-move"><i class="exp-ctrl-icon move"></i></a>
    </div><div class="textarea-item" id="itemnum">
        <textarea name="itemnum" data-item_config="<?php echo $print_items['itemnum'];?>" data-tip_value="商品数量">商品数量</textarea>
        <a href="javascript:;" title="移除" class="textarea-item-del"><i class="exp-ctrl-icon remove"></i></a>
        <a href="javascript:;" title="移动" class="textarea-item-move"><i class="exp-ctrl-icon move"></i></a>
    </div><div class="textarea-item" id="cardnumber">
        <textarea name="cardnumber" data-item_config="<?php echo $print_items['cardnumber'];?>" data-tip_value="收货人 - 身份证号">收货人 - 身份证号</textarea>
        <a href="javascript:;" title="移除" class="textarea-item-del"><i class="exp-ctrl-icon remove"></i></a>
        <a href="javascript:;" title="移动" class="textarea-item-move"><i class="exp-ctrl-icon move"></i></a>
    </div><div class="textarea-item" id="itemweight">
        <textarea name="itemweight" data-item_config="<?php echo $print_items['itemweight'];?>" data-tip_value="商品重量">商品重量</textarea>
        <a href="javascript:;" title="移除" class="textarea-item-del"><i class="exp-ctrl-icon remove"></i></a>
        <a href="javascript:;" title="移动" class="textarea-item-move"><i class="exp-ctrl-icon move"></i></a>
    </div><div class="textarea-item" id="itemtotalfee">
        <textarea name="itemtotalfee" data-item_config="<?php echo $print_items['itemtotalfee'];?>" data-tip_value="商品总价">商品总价</textarea>
        <a href="javascript:;" title="移除" class="textarea-item-del"><i class="exp-ctrl-icon remove"></i></a>
        <a href="javascript:;" title="移动" class="textarea-item-move"><i class="exp-ctrl-icon move"></i></a>
    </div>
    <!-- 底图开始 -->
	<div class="default-height">
		<img id="J_ExpressBG" <?php if(empty($info['img_url'])){?>style="display: none;"<?php }?>/>
    <!--<img src="<?php echo SITE_ROOT;?>statics/images/shipping/ship_sf.jpg" style="width:740px;" alt="">-->
	</div>
    <!-- 底图结束 -->
</div>

<div class="mgt15">
    <a href="javscript:;" class="btn btn-primary" id="btn_confirm"><i class="gicon-check white"></i>确定</a>
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
<?php include "views/global_template.php";?>
<?php include "views/global_footer.php";?>
<script src="<?php echo SITE_ROOT;?>statics/plugins/ueditor/diyUeditor-min.js"></script>
<script src="<?php echo SITE_ROOT;?>statics/plugins/uploadify/jquery.uploadify.min.js?ver=1589"></script>
<script src="<?php echo SITE_ROOT;?>statics/js/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo SITE_ROOT;?>statics/plugins/diy/diy-min.js"></script>
<script src="<?php echo SITE_ROOT;?>statics/plugins/colorpicker/colorpicker.js"></script><!-- diy js end -->
 <script type="text/javascript" src="<?php echo SITE_ROOT;?>statics/js/jquery-ui-1.10.4/jquery-ui.min.js"></script>

<script src="<?php echo SITE_ROOT;?>statics/js/dist/System/add_delivery.js"></script>

</body>
</html>
<!-- 20170105 -->
