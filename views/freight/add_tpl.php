
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- 满足有些用户在手机端访问的需要 -->

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <title>添加运费模板 - Bidcms开源电商</title>
    <!-- 线上环境 -->
        <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/css/component-min.css">
		<link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/plugins/jbox/jbox-min.css">

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
            <h1 class="content-right-title">添加运费模板</h1>


<form action="index.php" method="POST" id="form1">
  <input type="hidden" value="freight" name="con"/>
  <input type="hidden" value="add_tpl" name="act"/>
  <input type="hidden" value="<?php echo $info['id'];?>" name="update_id"/>
  <input type="hidden" value="1" name="commit"/>
    <div class="formitems">
        <label class="fi-name"><span class="colorRed">*</span>模板标题：</label>
        <div class="form-controls">
            <input type="text" class="input" name="title" value="<?php echo $info['title'];?>">
            <span class="fi-help-text"></span>
        </div>
    </div>
    <div class="formitems">
        <label class="fi-name"><span class="colorRed">*</span>快递公司：</label>
        <div class="form-controls">
            <select class="select" name="company_id">
                <option value="0">请选择</option>
                <?php foreach($freight_company as $k=>$v){?>
                  <option value="<?php echo $k;?>"><?php echo $v;?></option>
                <?php }?>
              </select>
                <span class="fi-help-text"></span>
        </div>
    </div>
    <div class="formitems">
        <label class="fi-name"><span class="colorRed">*</span>计价方式：</label>
        <div class="form-controls">
            <div class="radio-group">
                <label><input type="radio" name="type" value="1" checked="checked" />按件数</label>
                <label><input type="radio" name="type" value="2" />按重量</label>
                <label><input type="radio" name="type" value="3" />按体积</label>
            </div>
        </div>
    </div>
    <div class="formitems">
        <label class="fi-name"><span class="colorRed">*</span>区域限售：</label>
        <div class="form-controls">
            <div class="radio-group">
                <label><input type="radio" name="is_regional_sale" value="0" checked="checked" />不支持</label>
                <label><input type="radio" name="is_regional_sale" value="1" />支持</label>
            </div>
        </div>
        <span class="fi-help-text">如果支持区域限售，宝贝只能在设置了运费的指定地区城市销售</span>
    </div>
    <div class="formitems J_express">
        <label class="fi-name J_m1"><span class="colorRed">*</span>快递件数设置：</label>
        <label class="fi-name J_m2" style="display:none;"><span class="colorRed">*</span>快递重量设置：</label>
        <label class="fi-name J_m3" style="display:none;"><span class="colorRed">*</span>快递体积设置：</label>
        <div class="form-controls" style="vertical-align: top; display: inline-block; margin-left: 15px;">
            <label class="J_m1" style="vertical-align: baseline;">首件件数：</label>
            <label class="J_m2" style="vertical-align: baseline;display:none;">首重重量：</label>
            <label class="J_m3" style="vertical-align: baseline;display:none;">首体积：</label>
            <input name="content[express][start]" id="express_start" class="input mini" />
            <span class="J_m1 fi-help-text">单位：件</span>
            <span class="J_m2 fi-help-text" style="display:none;">单位：千克</span>
            <span class="J_m3 fi-help-text" style="display:none;">单位：m³</span>
        </div>
        <div class="form-controls" style="vertical-align: top; display: inline-block; margin-left: 0;">
            <label class="J_m1" style="vertical-align: baseline;">续件件数：</label>
            <label class="J_m2" style="vertical-align: baseline;display:none;">续重重量：</label>
            <label class="J_m3" style="vertical-align: baseline;display:none;">续体积：</label>
            <input name="content[express][plus]" id="express_plus" class="input mini" />
            <span class="J_m1 fi-help-text">单位：件</span>
            <span class="J_m2 fi-help-text" style="display:none;">单位：千克</span>
            <span class="J_m3 fi-help-text" style="display:none;">单位：m³</span>
        </div>
    </div>
    <div class="formitems J_express">
        <label class="fi-name"><span class="colorRed">*</span>快递配送费用：</label>
        <div class="form-controls" style="vertical-align: top; display: inline-block; margin-left: 15px;">
            <label class="J_m1" style="vertical-align: baseline;">首件费用：</label>
            <label class="J_m2" style="vertical-align: baseline;display:none;">首重费用：</label>
            <label class="J_m3" style="vertical-align: baseline;display:none;">首体积费用：</label>
            <input type="text" placeholder="" class="input mini" name="content[express][postage]" id="express_postage" />
            <span class="fi-help-text">单位：元，最多2位小数</span>
        </div>
        <div class="form-controls" style="vertical-align: top; display: inline-block; margin-left: 0;">
            <label class="J_m1" style="vertical-align: baseline;">续件费用：</label>
            <label class="J_m2" style="vertical-align: baseline;display:none;">续重费用：</label>
            <label class="J_m3" style="vertical-align: baseline;display:none;">续体积费用：</label>
            <input type="text" placeholder="" class="input mini" name="content[express][postage_plus]" id="express_postage_plus" />
            <span class="fi-help-text">单位：元，最多2位小数</span>
        </div>
    </div>

    <div class="formitems J_ems">
        <label class="fi-name J_m1"><span class="colorRed">*</span>EMS件数设置：</label>
        <label class="fi-name J_m2" style="display:none;"><span class="colorRed">*</span>EMS重量设置：</label>
        <label class="fi-name J_m3" style="display:none;"><span class="colorRed">*</span>EMS体积设置：</label>
        <div class="form-controls" style="vertical-align: top; display: inline-block; margin-left: 15px;">
            <label class="J_m1" style="vertical-align: baseline;">首件件数：</label>
            <label class="J_m2" style="vertical-align: baseline;display:none;">首重重量：</label>
            <label class="J_m3" style="vertical-align: baseline;display:none;">首体积：</label>
            <input name="content[ems][start]" id="ems_start" class="input mini" />
            <span class="J_m1 fi-help-text">单位：件</span>
            <span class="J_m2 fi-help-text" style="display:none;">单位：千克</span>
            <span class="J_m3 fi-help-text" style="display:none;">单位：m³</span>
        </div>
        <div class="form-controls" style="vertical-align: top; display: inline-block; margin-left: 0;">
            <label class="J_m1" style="vertical-align: baseline;">续件件数：</label>
            <label class="J_m2" style="vertical-align: baseline;display:none;">续重重量：</label>
            <label class="J_m3" style="vertical-align: baseline;display:none;">续体积：</label>
            <input name="content[ems][plus]" id="ems_plus" class="input mini" />
            <span class="J_m1 fi-help-text">单位：件</span>
            <span class="J_m2 fi-help-text" style="display:none;">单位：千克</span>
            <span class="J_m3 fi-help-text" style="display:none;">单位：m³</span>
        </div>
    </div>
    <div class="formitems J_ems">
        <label class="fi-name"><span class="colorRed">*</span>EMS配送费用：</label>
        <div class="form-controls" style="vertical-align: top; display: inline-block; margin-left: 15px;">
            <label class="J_m1" style="vertical-align: baseline;">首件费用：</label>
            <label class="J_m2" style="vertical-align: baseline;display:none;">首重费用：</label>
            <label class="J_m3" style="vertical-align: baseline;display:none;">首体积费用：</label>
            <input type="text" placeholder="" class="input mini" name="content[ems][postage]" id="ems_postage" />
            <span class="fi-help-text">单位：元，最多2位小数</span>
        </div>
        <div class="form-controls" style="vertical-align: top; display: inline-block; margin-left: 0;">
            <label class="J_m1" style="vertical-align: baseline;">续件费用：</label>
            <label class="J_m2" style="vertical-align: baseline;display:none;">续重费用：</label>
            <label class="J_m3" style="vertical-align: baseline;display:none;">续体积费用：</label>
            <input type="text" placeholder="" class="input mini" name="content[ems][postage_plus]" id="ems_postage_plus" />
            <span class="fi-help-text">单位：元，最多2位小数</span>
        </div>
    </div>
    <div class="formitems J_surface">
        <label class="fi-name J_m1"><span class="colorRed">*</span>平邮件数设置：</label>
        <label class="fi-name J_m2" style="display:none;"><span class="colorRed">*</span>平邮重量设置：</label>
        <label class="fi-name J_m3" style="display:none;"><span class="colorRed">*</span>平邮体积设置：</label>
        <div class="form-controls" style="vertical-align: top; display: inline-block; margin-left: 15px;">
            <label class="J_m1" style="vertical-align: baseline;">首件件数：</label>
            <label class="J_m2" style="vertical-align: baseline;display:none;">首重重量：</label>
            <label class="J_m3" style="vertical-align: baseline;display:none;">首体积：</label>
            <input name="content[surface][start]" id="surface_start" class="input mini" />
            <span class="J_m1 fi-help-text">单位：件</span>
            <span class="J_m2 fi-help-text" style="display:none;">单位：千克</span>
            <span class="J_m3 fi-help-text" style="display:none;">单位：m³</span>
        </div>
        <div class="form-controls" style="vertical-align: top; display: inline-block; margin-left: 0;">
            <label class="J_m1" style="vertical-align: baseline;">续件件数：</label>
            <label class="J_m2" style="vertical-align: baseline;display:none;">续重重量：</label>
            <label class="J_m3" style="vertical-align: baseline;display:none;">续体积：</label>
            <input name="content[surface][plus]" id="surface_plus" class="input mini" />
            <span class="J_m1 fi-help-text">单位：件</span>
            <span class="J_m2 fi-help-text" style="display:none;">单位：千克</span>
            <span class="J_m3 fi-help-text" style="display:none;">单位：m³</span>
        </div>
    </div>
    <div class="formitems J_surface">
        <label class="fi-name"><span class="colorRed">*</span>平邮配送费用：</label>
        <div class="form-controls" style="vertical-align: top; display: inline-block; margin-left: 15px;">
            <label class="J_m1" style="vertical-align: baseline;">首件费用：</label>
            <label class="J_m2" style="vertical-align: baseline;display:none;">首重费用：</label>
            <label class="J_m3" style="vertical-align: baseline;display:none;">首体积费用：</label>
            <input type="text" placeholder="" class="input mini" name="content[surface][postage]" id="surface_postage" />
            <span class="fi-help-text">单位：元，最多2位小数</span>
        </div>
        <div class="form-controls" style="vertical-align: top; display: inline-block; margin-left: 0;">
            <label class="J_m1" style="vertical-align: baseline;">续件费用：</label>
            <label class="J_m2" style="vertical-align: baseline;display:none;">续重费用：</label>
            <label class="J_m3" style="vertical-align: baseline;display:none;">续体积费用：</label>
            <input type="text" placeholder="" class="input mini" name="content[surface][postage_plus]" id="surface_postage_plus" />
            <span class="fi-help-text">单位：元，最多2位小数</span>
        </div>
    </div>
    <div class="formitems J_store">
        <label class="fi-name J_m1"><span class="colorRed">*</span>门店件数设置：</label>
        <label class="fi-name J_m2" style="display:none;"><span class="colorRed">*</span>门店重量设置：</label>
        <label class="fi-name J_m3" style="display:none;"><span class="colorRed">*</span>门店体积设置：</label>
        <div class="form-controls" style="vertical-align: top; display: inline-block; margin-left: 15px;">
            <label class="J_m1" style="vertical-align: baseline;">首件件数：</label>
            <label class="J_m2" style="vertical-align: baseline;display:none;">首重重量：</label>
            <label class="J_m3" style="vertical-align: baseline;display:none;">首体积：</label>
            <input id="store_start" name="content[store][start]" class="input mini" />
            <span class="J_m1 fi-help-text">单位：件</span>
            <span class="J_m2 fi-help-text" style="display:none;">单位：千克</span>
            <span class="J_m3 fi-help-text" style="display:none;">单位：m³</span>
        </div>
        <div class="form-controls" style="vertical-align: top; display: inline-block; margin-left: 0;">
            <label class="J_m1" style="vertical-align: baseline;">续件件数：</label>
            <label class="J_m2" style="vertical-align: baseline;display:none;">续重重量：</label>
            <label class="J_m3" style="vertical-align: baseline;display:none;">续体积：</label>
            <input id="store_plus" name="content[store][plus]" class="input mini" />
            <span class="J_m1 fi-help-text">单位：件</span>
            <span class="J_m2 fi-help-text" style="display:none;">单位：千克</span>
            <span class="J_m3 fi-help-text" style="display:none;">单位：m³</span>
        </div>
    </div>
    <div class="formitems J_store">
        <label class="fi-name"><span class="colorRed">*</span>门店配送费用：</label>
        <div class="form-controls" style="vertical-align: top; display: inline-block; margin-left: 15px;">
            <label class="J_m1" style="vertical-align: baseline;display:none">首件费用：</label>
            <label class="J_m2" style="vertical-align: baseline;">首重费用：</label>
            <label class="J_m3" style="vertical-align: baseline;display:none">首体积费用：</label>
            <input type="text" placeholder="" class="input mini" name="content[store][postage]" id="store_postage" value=""/>
            <span class="fi-help-text">单位：元，最多2位小数</span>
        </div>
        <div class="form-controls" style="vertical-align: top; display: inline-block; margin-left: 0;">
            <label class="J_m1" style="vertical-align: baseline;display:none">续件费用：</label>
            <label class="J_m2" style="vertical-align: baseline;">续重费用：</label>
            <label class="J_m3" style="vertical-align: baseline;display:none">续体积费用：</label>
            <input type="text" placeholder="" class="input mini" name="content[store][postage_plus]" id="store_postage_plus" value="" />
            <span class="fi-help-text">单位：元，最多2位小数</span>
        </div>
    </div>
    <div class="formitems">
        <label class="fi-name"><span class="colorRed">*</span>满额包邮：</label>
        <div class="form-controls">
            <div class="radio-group">
                <label><input type="radio" name="is_full_mail" value="1">启用</label>
                <label><input type="radio" name="is_full_mail" value="0" checked>禁用</label>
            </div>
        </div>
    </div>
    <div class="formitems">
        <label class="fi-name"><span class="colorRed">*</span>包邮所需金额：</label>
        <div class="form-controls">
            <input type="text" class="input" name="full_mail_money">
            <span class="fi-help-text"></span>
        </div>
    </div>
    <div class="formitems">
        <label class="fi-name"><span class="colorRed">*</span>启用：</label>
        <div class="form-controls">
            <div class="radio-group">
                <label><input type="radio" name="status" value="1" checked="checked" />是</label>
                <label><input type="radio" name="status" value="0" />否</label>
            </div>
        </div>
    </div>

	<div class="mgl120">
		<input type="submit" class="btn btn-primary" name="st" value="保存">
	</div>
</form>

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
<!--end front template  -->

<script src="<?php echo SITE_ROOT;?>statics/js/dist/System/add_freight.js"></script>
<script>
var info=<?php echo json_encode($info);?>;
if(info && info.id>0){
  $("input[name='type']").each(function(){
    if($(this).val()==info.type){
      $(this).attr("checked",true);
    } else {
      $(this).attr("checked",false);
    }
  });
  $("input[name='is_regional_sale']").each(function(){
    if($(this).val()==info.is_regional_sale){
      $(this).attr("checked",true);
    } else {
      $(this).attr("checked",false);
    }
  });
  var shipping_type=JSON.parse(info.content);
  for(i in shipping_type){
	  $("#"+i+"_start").val(shipping_type[i].start);
      $("#"+i+"_plus").val(shipping_type[i].plus);
      $("#"+i+"_postage").val(shipping_type[i].postage);
      $("#"+i+"_postage_plus").val(shipping_type[i].postage_plus);
  }
  $('select[name="company_id"] option[value="'+info.company_id+'"]').attr('selected',true);
  $("input[name='is_full_mail']").each(function(){
    if($(this).val()==info.is_full_mail){
      $(this).attr("checked",true);
    } else {
      $(this).attr("checked",false);
    }
  });
  $("input[name='status']").each(function(){
    if($(this).val()==info.status){
      $(this).attr("checked",true);
    } else {
      $(this).attr("checked",false);
    }
  });
  $("input[name='full_mail_money']").val(info.full_mail_money);
}

</script>
<!-- end session hint -->
</body>
</html>
<!-- 20170105 -->
