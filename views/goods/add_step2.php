<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- 满足有些用户在手机端访问的需要 -->

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <title>发布商品 - Bidcms开源电商</title>
    <!-- 线上环境 -->
        <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/css/component-min.css">
        <link rel="stylesheet" href="statics/plugins/jbox/jbox-min.css">

    <link rel="stylesheet" href="statics/plugins/uploadify/uploadify-min.css">
    <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/css/Item/add_step2.css">
    <style>
        .first_floor{
            line-height: 28px;
        }
        .formitems .fi-name{
            width: 150px;
        }
        .form-controls{
            margin-left: 160px;
        }
        .input.moreMini{
            width: 60px;
        }
        .newWidth .formitems .fi-name{
            width: 90px;
        }
        .newWidth .form-controls{
            margin-left: 90px;
        }
    </style>

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
            <h1 class="content-right-title">发布商品</h1>


<ul class="wizard">
    <li class="wizard-item complete">
        <dl class="wizard-item-content">
            <dt class="wizard-ic-step">
                <span class="wizard-icstp-num">1</span>
                <span class="wizard-icstp-title">编辑商品信息</span>
            </dt>
            <dd class="wizard-ic-desc"></dd>
        </dl>
    </li>
    <li class="wizard-item process">
        <dl class="wizard-item-content">
            <dt class="wizard-ic-step">
                <span class="wizard-icstp-num">2</span>
                <span class="wizard-icstp-title">编辑商品详情</span>
            </dt>
            <dd class="wizard-ic-desc"></dd>
        </dl>
    </li>
    <li class="wizard-item">
        <dl class="wizard-item-content">
            <dt class="wizard-ic-step">
                <span class="wizard-icstp-num">3</span>
                <span class="wizard-icstp-title">查看商品信息</span>
            </dt>
        </dl>
    </li>
</ul>
<form action="index.php" method="post" id="add_step2">
<input type="hidden" value="1" name="commit"/>
<input type="hidden" value="add_step2" name="act"/>
<input type="hidden" value="goods" name="con"/>
<input type="hidden" value="0" name="next"/>
<input type="hidden" id="j-goodsid" name="update_id" value='<?php echo $info['id'];?>'>


<div class="panel-single panel-single-light mgt20">
    <h3 class="cst_h3 mgb20">商品信息</h3>
    <div class="formitems">
        <label class="fi-name"><span class="colorRed">*</span>商品名：</label>
        <div class="form-controls">
            <input type="text" class="input xxlarge J_goods_name" name="title" value="<?php echo $info['title'];?>">
            <span class="fi-help-text">商品名最多64个字符</span>
        </div>
    </div>

     <div class="formitems wb_buy">
        <label class="fi-name">外部购买地址：</label>
        <div class="form-controls">
            <select name="platform" id="buy_method" class="select" style="width:100px;">
            <option value="0">本地添加</option>
            <option value="tb">淘宝</option>
            <option value="tm">天猫</option>
            </select>
            <input type="text" id="buy_url" class="input xxlarge" name="buy_url" value="<?php echo $info['buy_url'];?>">
            <span class="fi-help-text">如果是外部购买时请输入购买地址</span>
        </div>
    </div>
    <div class="formitems">
        <label class="fi-name">商品分类：</label>
        <div class="form-controls pdt3">
            <div>
                <select name="cat_id" class="select">
				<option value="0">顶级分类</option>
                <?php if($cate_list){foreach($cate_list as $k=>$v){?>
                <option <?php echo $v['id']==$info['cat_id']?'selected':'';?> value="<?php echo $v['id'];?>"><?php echo str_repeat("&nbsp;&nbsp;",$v['cat_level']);?><?php echo $v['cat_name'];?></option>
                <?php }}?>
                </select>
				<span class="setfxs-pic">
                 &nbsp; <a href="javascript:;" class="btn btn-primary bhaide"><i class="gicon-edit white"></i>添加分类</a>
                <div class="setfxs-box">
                    <table class="wxtables tables-form">
                        <colgroup>
                            <col width="30%">
                            <col width="70%">
                        </colgroup>
                        <tr>
                            <td class="tables-form-title">分类名称</td>
                            <td>
                                <input type="text" class="input mini" id="newclass" value=""><a href="javascript:;" class="btn btn-primary" id="addclass">添加</a>
                            </td>
                        </tr>
                        </table>
                </div>
            </div>
        </div>
    </div>
    <div class="formitems">
        <label class="fi-name">商品分组：</label>
        <div class="form-controls pdt3">
            
                <select name="group_id" class="select">
				<option value="0">默认分组</option>
                <?php if($group_list){foreach($group_list as $k=>$v){?>
                <option <?php echo $v['id']==$info['group_id']?'selected':'';?> value="<?php echo $v['id'];?>-<?php echo $v['title'];?>"><?php echo $v['title'];?></option>
                <?php }}?>
                </select>
				<span class="setfxs-pic">
                 &nbsp; <a href="javascript:;" class="btn btn-primary J-edit-setfxs bhaide"><i class="gicon-edit white"></i>添加分组</a>
                <div class="setfxs-box">
                    <table class="wxtables tables-form">
                        <colgroup>
                            <col width="30%">
                            <col width="70%">
                        </colgroup>
                        <tr>
                            <td class="tables-form-title">分组名称</td>
                            <td>
                                <input type="text" class="input mini" id="newgroup" value=""><a href="javascript:;" class="btn btn-primary" id="addgroup">添加</a>
                            </td>
                        </tr>
                        </table>
                </div>
            </span>
        </div>
    </div>

    <div class="formitems">
        <label class="fi-name">排序：</label>
        <div class="form-controls">
            <input type="text" class="input mini" name="serial"  value="<?php echo $info['serial'];?>">

            <span class="fi-help-text">序号大的排在前面</span>
        </div>
    </div>
    <div class="formitems">
        <label class="fi-name">副标题：</label>
        <div class="form-controls">
            <input type="text" class="input xxlarge" name="slogan" value="<?php echo $info['slogan'];?>">
            <span class="fi-help-text">分享商品时显示。使用该功能，需要将www.bidcms.com设为微信JS接口安全域名。<a href="/System/jssdk_guide" target="_blank" class="btn btn-mini btn-warning">操作步骤</a></span>
        </div>
    </div>

    <div class="formitems">
        <label class="fi-name"><span class="colorRed">*</span>原价：</label>
        <div class="form-controls">
            <input type="text" class="input mini" name="original_price"  value="<?php echo $info['original_price'];?>">
            <span>元</span>

            <span class="fi-help-text"></span>
        </div>
    </div>

    <div class="formitems">
        <label class="fi-name"><span class="colorRed">*</span>现价：</label>
        <div class="form-controls">
            <input type="text" class="input mini" name="price"  value="<?php echo $info['price'];?>">
            <span>元</span>
            <span class="setfxs-pic">
                 &nbsp; <a href="javascript:;" class="btn btn-primary J-edit-setfxs bhaide"><i class="gicon-edit white"></i>编辑会员等级价格</a>
                <div class="setfxs-box">
                    <table class="wxtables tables-form">
                        <colgroup>
                            <col width="30%">
                            <col width="70%">
                        </colgroup>
                        <?php foreach($rank_list as $k=>$v){?>
                        <tr>
                            <td class="tables-form-title"><?php echo $v['title'];?></td>
                            <td>
                                <input type="text" class="input mini" name="rank_price[<?php echo $k;?>]" value="<?php echo isset($rank_price[$k])?$rank_price[$k]:0;?>">元
                            </td>
                        </tr>
                        <?php }?>
                        </table>
                </div>
            </span>
            <!--end--><!-- 技 -->
            <span class="fi-help-text"></span>
        </div>
    </div>
	<div class="formitems">
        <label class="fi-name"><span class="colorRed">*</span>积分兑换商品：</label>
        <div class="form-controls">
            <div class="radio-group">
                <label><input type="radio" value="0" name="is_point" <?php echo $info['is_point']==0?'checked':'';?>>非积分兑换</label>
                <label><input type="radio" value="1" name="is_point" <?php echo $info['is_point']==1?'checked':'';?>>全额兑换</label>
                <label><input type="radio" value="2" name="is_point" <?php echo $info['is_point']==2?'checked':'';?>>部分兑换</label>
            </div>
            购买所需积分：<input type="text" class="input mini" name="buy_need_points" value="<?php echo intval($info['buy_need_points']);?>">
            <span class="fi-help-text">购买该商品需要的积分</span>
        </div>
    </div>
    <div class="formitems">
        <label class="fi-name"><span class="colorRed">*</span>总库存：</label>
        <div class="form-controls">
            <input type="text" class="input mini" id="j-totalStock" name="num" value="<?php echo $info['num'];?>">
            <span><input type="text" class="input xmini" name="unit" placeholder="单位" value="<?php echo $info['unit'];?>"></span>
            <span class="fi-help-text"></span>
        </div>
    </div>
    <div class="formitems">
        <label class="fi-name">上传图片：</label>
        <div class="form-controls pdt5 j-imglistPanel">
            <ul class="img-list clearfix">
                <li class="img-list-add j-addimg">+</li>
            </ul>
            <input type="hidden" name="file_path" class="j-imglist-dataset" value="<?php echo $info['pictures'];?>">
            <span class="fi-help-text">建议上传尺寸640px * 640px</span>
        </div>
    </div>
	<div class="formitems">
		<label class="fi-name"><span class="colorRed"></span>添加配件：</label>
		<div class="form-controls">
			<div class="goods-lists js-goods-lists">
			  <ul class="img-list clearfix">
				  <li class="img-list-add j-addgoods">+</li>
			  </ul>
			</div>
			<textarea style="display:none;" id="j-fixings" name="fixings"><?php echo $info['fixings'];?></textarea>
			<span class="fi-help-text"></span>
		</div>
	</div>
    <div class="formitems mgt5">
        <label class="fi-name">商家编码：</label>
        <div class="form-controls">
            <input type="text" class="input j-code-ipt" value="<?php echo $info['goods_no'];?>" name="goods_no">
            <span class="fi-help-text colorRed">如需ERP对接，商家编码必须填写</span>
        </div>
    </div>
</div>
<!-- end 商品信息 -->

<div class="panel-single panel-single-light mgt20 j-emptyhide newWidth">
    <h3 class="cst_h3 mgb20">库存/规格(<span class="colorRed">如需ERP对接，商品编号必须填写</span>)</h3>
        <div class="formitems">
        <label class="fi-name">商品规格：</label>
        <div class="form-controls normsPanel goods_norms">

            <a href="javascript:;" class="sku-add" id="j-addNorms" title="添加规格">+</a>
            <input type="hidden" id="j-normsVal" name="norms" value='<?php echo $skus['norms'];?>'>
            <input type="hidden" id="j-propsVal" name="props" value='<?php echo $skus['props'];?>'>
			<input type="hidden" id="js-colorImg" name="sku_color_img" value='<?php echo $skus['color_img'];?>'>
			<input type="hidden" id="j-skuVal" name="sku_props" value='<?php echo $skus['sku_props'];?>'>
        </div>
    </div>
    <div class="formitems" id="j-skuImgWrapper" style="display:none;">
		<div class="imgsku">
			<label class="fi-name"><span class="colorRed">*</span>商品图片：</label>
			<div class="form-controls" id="j-skuImg"></div>
		</div>
    </div>
	
    <div class="formitems">
        <label class="fi-name"><span class="colorRed">*</span>商品库存：</label>
        <div class="form-controls" id="j-skuPanel">
            
        </div>
        <div class="form-controls pdt10">
            <a href="javascript:;" class="btn btn-success" id="j-lotSetStock">批量设置库存</a>
            <a href="javascript:;" class="btn btn-success" id="j-lotSetPrice">批量设置价格</a>
            <a href="javascript:;" class="btn btn-success" id="j-lotSetVipPrice">批量设置会员价</a>
        </div>
    </div>
</div>
<!-- end 库存/规格 -->
<div class="panel-single panel-single-light mgt20 j-commission">
    <h3 class="cst_h3 mgb20">佣金设置</h3>
	<div class="formitems">
        <label class="fi-name"><span class="colorRed">*</span>分销商返佣：</label>
        <div class="form-controls">
            <div class="radio-group">
                <label><input type="radio" value="1" name="is_fx_commission">开启</label>
                <label><input type="radio" value="0" name="is_fx_commission" checked="">关闭</label>
            </div>
        </div>
    </div>
    <div class="formitems">
        <label class="fi-name" style="width:160px;">直属上级能拿到的佣金：</label>
        <div class="form-controls">
            <input type="text" class="input mini" name="directly_money" value="<?php echo floatval($goods_setting['directly_money']);?>">
            <span>元
        </div>
    </div>
    <div class="formitems">
        <label class="fi-name" style="width:160px;">二级上级能拿到的佣金：</label>
        <div class="form-controls">
            <input type="text" class="input mini" name="superior_money" value="<?php echo floatval($goods_setting['superior_money']);?>">
            <span>元
        </div>
    </div>
	<div class="formitems">
        <label class="fi-name" style="width:160px;">三级上级能拿到的佣金：</label>
        <div class="form-controls">
            <input type="text" class="input mini" name="three_money" value="<?php echo floatval($goods_setting['three_money']);?>">
            <span>元            
        </div>
    </div>    
	
	<div class="formitems">
	<span class="fi-help-text" style="margin-left:30px;">金额和比例都为0.00或空表示采用<a href="/index.php?con=system&act=setting" class="colorBlue" target="_blank">系统设置</a>的提成比例计算佣金，关闭后，将不给分销商返佣。</span>
	</div>
</div>
<div class="panel-single panel-single-light mgt20 j-commission">
    <h3 class="cst_h3 mgb20">积分设置</h3>
	<div class="formitems">
        <label class="fi-name"><span class="colorRed">*</span>消费送积分：</label>
        <div class="form-controls">
            <div class="radio-group">
                <label><input type="radio" value="1" name="is_fx_point" <?php echo $goods_setting['is_fx_point']==1?'checked':'';?>>开启</label>
                <label><input type="radio" value="0" name="is_fx_point" <?php echo $goods_setting['is_fx_point']==0?'checked':'';?>>关闭</label>
            </div>
        </div>
    </div>
    <div class="formitems">
        <label class="fi-name" style="width:160px;">消费送积分：</label>
        <div class="form-controls">
            <input type="text" class="input mini" name="self_point" value="<?php echo intval($goods_setting['self_point']);?>">
            为0或空表示采用<a href="/index.php?con=system&act=points" class="colorBlue" target="_blank">积分设置</a>的比例计算。
        </div>
    </div>
	<div class="formitems">
        <label class="fi-name" style="width:160px;">直属上级能拿到的积分：</label>
        <div class="form-controls">
            <input type="text" class="input mini" name="directly_point" value="<?php echo intval($goods_setting['directly_point']);?>">
            
        </div>
    </div>
    <div class="formitems">
        <label class="fi-name" style="width:160px;">二级上级能拿到的积分：</label>
        <div class="form-controls">
            <input type="text" class="input mini" name="superior_point" value="<?php echo intval($goods_setting['superior_point']);?>">
            <span>
        </div>
    </div>
	<div class="formitems">
        <label class="fi-name" style="width:160px;">三级上级能拿到的积分：</label>
        <div class="form-controls">
            <input type="text" class="input mini" name="three_point" value="<?php echo intval($goods_setting['three_point']);?>">
            <span>
        </div>
    </div>    
	
	<div class="formitems">
		<span class="fi-help-text" style="margin-left:30px;">关闭后，消费后将不会送积分。</span>
	</div>
</div>
<div class="panel-single panel-single-light mgt20 j-showinhyd">
    <h3 class="cst_h3 mgb20">物流及其它</h3>
	
	<div class="formitems">
        <label class="fi-name"><span class="colorRed">*</span>物流费用：</label>
        <div class="form-controls">
            <label><input type="radio" value="0" name="freight" <?php echo $goods_setting['freight']==0?'checked':'';?>>包邮</label>
			<label><input type="radio" value="1" name="freight" <?php echo $goods_setting['freight']==1?'checked':'';?>>固定费用
			<input type="text" class="input mini" name="freight1" value="<?php echo $goods_setting['freight']==1?$goods_setting['freight_val']:0;?>"></label>
			<label><input type="radio" value="2" name="freight" <?php echo $goods_setting['freight']==2?'checked':'';?>>运费模板
			<select name="freight2" class="select" style="width:100px;">
			<?php foreach($freight_list as $k=>$v){?>
            <option value="<?php echo $v['id'];?>" <?php echo $goods_setting['freight']==2 && $goods_setting['freight_val']==$v['id']?'selected':'';?>><?php echo $v['title'];?></option>
			<?php }?>
            </select>
			</label>
            <span class="fi-help-text">三种运费方式至少选择一个，默认为包邮</span>
        </div>
    </div>
    <div class="formitems">
        <label class="fi-name"><span class="colorRed">*</span>货到付款：</label>
        <div class="form-controls">
            <div class="radio-group">
                <label><input type="radio" value="1" name="is_cod">是</label>
                <label><input type="radio" value="2" name="is_cod">否</label>
                <label><input type="radio" value="0" name="is_cod" checked="">系统设置</label>
            </div>
            <span class="fi-help-text"></span>
        </div>
    </div>
    <div class="formitems">
        <label class="fi-name"><span class="colorRed">*</span>隐藏库存：</label>
        <div class="form-controls">
            <div class="radio-group">
                <label><input type="radio" class="j-feight" value="1" name="hide_stock" checked="">是</label>
                <label><input type="radio" class="j-feight" value="0" name="hide_stock">否</label>
            </div>
            <span class="fi-help-text"></span>
        </div>
    </div>
    <div class="formitems">
        <label class="fi-name"><span class="colorRed">*</span>每人限购：</label>
        <div class="form-controls">
            <input type="text" class="input mini" name="quota" value="<?php echo $info['quota'];?>">
            <span class="fi-help-text">0代表不限购</span>
        </div>
    </div>
	<div class="formitems inline">
        <label class="fi-name"><span class="colorRed">*</span>会员等级折扣：</label>
        <div class="form-controls">
            <div class="radio-group">
                <label><input type="radio" value="1" name="join_level_discount" checked="">开启</label>
                <label><input type="radio" value="0" name="join_level_discount">关闭</label>
            </div>
            <span class="fi-help-text"></span>
        </div>
    </div>
    
    <div class="formitems inline">
        <label class="fi-name"><span class="colorRed">*</span>购物需提供身份证：</label>
        <div class="form-controls">
            <div class="radio-group">
                <label><input type="radio" value="1" name="is_buy_card">是</label>
                <label><input type="radio" value="2" name="is_buy_card">否</label>
                <label><input type="radio" value="0" name="is_buy_card" checked="">系统设置</label>
            </div>
            <span class="fi-help-text"></span>
        </div>
    </div>
    <div class="formitems inline">
        <label class="fi-name"><span class="colorRed">*</span>显示销量：</label>
        <div class="form-controls">
            <div class="radio-group">
                <label><input type="radio" value="1" name="is_show_sale">是</label>
                <label><input type="radio" value="2" name="is_show_sale">否</label>
                <label><input type="radio" value="0" name="is_show_sale" checked="">系统设置</label>
            </div>
            <span class="fi-help-text"></span>
        </div>
    </div>
</div>

<div class="panel-single panel-single-light mgt20 txtCenter">
    <a href="index.php?con=goods" class="btn">商品列表</a>
    <a href="javascript:;" class="btn btn-primary j-submit" data-next="0">保存</a>
	<a href="javascript:;" class="btn btn-primary j-submit" data-next="1">保存并下一步</a>
	<?php if($info['id']>0){?>
	<a href="?con=goods&act=add_step3&id=<?php echo $info['id'];?>" class="btn btn-success">商品详情</a>
	<?php }?>
</div>
</form>

<div id="setfxs-box-overlay"></div>

        </div>
        <!-- end content-right -->

        <a href="javascript:;" class="btn-leftMenuFold" id="j-btn-leftMenuFold"></a>
    </div>
</div>
<!-- end container -->

<!--gonggao-->

<div class="fixedBar">
	<ul>
		<li class="shopManager3"><a href="javascript:;" data-target="#shop_3">商品管理</a></li><li class="shopManager4"><a href="javascript:;" data-target="#shop_4">分组管理</a></li><li class="shopManager5"><a href="javascript:;" data-target="#shop_5">批量导入</a></li>        </ul>
	<a href="javascript:;" class="fixedBar-btn" id="j-fixedBar-btn"></a>
</div><a href="#" id="j-gotop" class="gotop" title="回到顶部"></a>
<!-- end gotop -->


<!-- end tpl_popup_selectBackups-->

<script type="text/j-template" id="tpl_add_step2_lotSetStock">
	<div class="formitems">
		<label class="fi-name">批量库存值：</label>
		<div class="form-controls">
			<input type="text" placeholder="请输入您要设置的库存值" name="lotSetStock" class="input" value="0">
		</div>
	</div>
</script>
<!-- end 批量设置库存 -->

<script type="text/j-template" id="tpl_add_step2_lotSetPrice">
	<div class="formitems">
		<label class="fi-name">批量设置原价：</label>
		<div class="form-controls">
			<input type="text" placeholder="请输入您要设置的价格" name="o_price" class="input" value="0">
		</div>
	</div>
	<div class="formitems">
		<label class="fi-name">批量设置现价：</label>
		<div class="form-controls">
			<input type="text" placeholder="请输入您要设置的价格" name="price" class="input" value="0">
		</div>
	</div>
		</script>
<!-- end 批量设置价格 -->


<script type="text/j-template" id="tpl_add_step2_imgList">
	<ul class="img-list clearfix">
		<% _.each(dataset,function(item,index){ %>
		<li data-index="<%=index%>">
			<span class="img-move img-move-left"></span>
			<span class="img-move img-move-right"></span>
			<span class="img-list-btndel j-delimg"><i class="gicon-trash white"></i></span>
			<span class="img-list-overlay"></span>
			<img src="<%= item %>">
		</li>
		<% }) %>
		<li class="img-list-add j-addimg">+</li>
	</ul>
	<input type="hidden" name="file_path" class="j-imglist-dataset" value="<%= str_dataset %>">
	<span class="fi-help-text">建议上传尺寸640px * 640px</span>
</script>
<!-- end tpl_add_step2_imgList -->

<script type="text/j-template" id="tpl_add_step2_normslist">
	<% _.each(dataset,function(item,index){%>
	<dl class="normslist" data-index="<%= index %>" data-id="<%= item.id %>">
		<dt class="clearfix">
			<input type="text" class="fl input mini j-normsName" value="<%= item.name %>" maxlength="4" data-Originalname="<%= item.name %>" data-Originalid="<%= item.id %>">
			<span class="fi-help-text"></span>
			<a href="javascript:;" class="fr j-delNorms" title="移除"><i class="gicon-trash"></i>移除</a>
		</dt>
		<dd class="clearfix skuitemPanel">
			<% if(item.props.length){ %>
			<ul class="labelList labelList-sku clearfix fl">
				<% _.each(item.props,function(val,index){ %>
				<li><span><%= props[val] %></span><i class="gicon-remove white j-delNormsVal" data-index="<%= index %>"  data-vid="<%= val %>"></i></li>
				<% }) %>
			</ul>
			<% } %>
			<input type="text" class="input mini fl j-addNormsVal-ipt">
			<a href="javascript:;" class="btn btn-primary btn-small j-addNormsVal">添加</a>
		</dd>
	</dl>
	<% }) %>
</script>
<!-- end tpl_add_step2_normslist -->

<script type="text/j-template" id="tpl_add_step2_sku">
	<table class="wxtables wxtables-sku">
		<thead>
		<tr>
			<% _.each(norms,function(item,index){ %>
				<td><%= item.name %></td>
			<% }) %>
			<td>原价</td>
			<td>现价</td>
			<td>库存</td>
			<td>商品编码</td>
			<td>销量</td>
			<td>设置会员价</td>
		</tr>
		</thead>
		<tbody>
		<% for(var key in sku){ %>
		<tr data-key="<%= key %>">
				<% _.each(sku[key].props,function(id,item){ %>
					<td><%= props[id] %></td>
				<% }) %>

			<td>
				<input type="text" class="input moreMini j-price-modify" data-name="o_price" value="<%= sku[key].o_price %>">元<br/>
			</td>
			<td>
				<input type="text" class="input moreMini j-price-modify" data-name="price" value="<%= sku[key].price %>">元<br/>
			</td>
			<td><input type="text" class="input moreMini j-price-modify" data-name="stock" value="<%= sku[key].stock %>"></td>
			<td><input type="text" class="input moreMini j-price-modify" data-name="code" value="<%= sku[key].code %>"></td>
			<td ><%= sku[key].salenum %></td>
			<td width="60">
				<span class="setfxs-pic options">
					<a href="javascript:;" class="btn J-options-slideToggle">设置</a>
					<div class="setfxs-box">
						<table class="wxtables tables-form">
							<colgroup>
								<col width="30%">
								<col width="70%">
							</colgroup>
							<?php foreach($rank_list as $k=>$v){?>
							<tr>
								<td class="tables-form-title"><?php echo $v['title'];?></td>
								<td>
									<input type="text" data-num="<?php echo $k;?>" class="input mini" name="sku_rank_price[<%= sku[key].rank_props %>][<?php echo $k;?>]" value="<%= sku[key].rank_price[<?php echo $k;?>] %>">元
								</td>
							</tr>
							<?php }?>
						</table>
					</div>
				</span>
			</td>
		</tr>
		<% } %>
		</tbody>
	</table>
</script>
<!-- end tpl_add_step2_sku -->

<script type="text/j-template" id="tpl_item_class">
   <div class="categoryP">
	   <div class="category">
		   <% _.each(data,function(row1){ %>
		   <div class="first_floor j-chang-firstfloor">
				   <span class="j-first_floor gicon-plus"></span>
				   <label for="">
					   <input type="checkbox" class="t1" value="<%= row1.id %>"/>
					   <span><%= row1.class_name %></span>
				   </label>
					   <% _.each(row1.child,function(row2){ %>
					   <div class="mid_floor j-change">
						   <span class="j-mid_floor gicon-plus"></span>
						   <label for="">
							   <input type="checkbox" class="t2" value="<%= row2.id %>"   />
							   <span><%= row2.class_name %></span>
						   </label>
						   <% _.each(row2.child,function(row3){ %>
							   <div class="last_floor j-midchange">
								   <label for="">
									   <input type="checkbox" class="t3" value="<%= row3.id %>"  />
									   <span><%= row3.class_name %></span>
								   </label>
							   </div>
							   <% }) %>
					   </div>
			   <% }) %>
			   </div>
		   <% }) %>
	   </div>
   </div>
</script>
<!-- end tpl_add_step2_sku -->

<!-- sku Img  -->
<script type="text/j-template" id="tpl_imgskulist">
	<table class="wxtables wxtables-sku newtable">
		<tbody>
		<% _.each(data,function(item){ %>
			<tr>
				<td><span><%= item.sku_name %></span></td>
				<td><span class="imgwrapper spanpd10"><img src="<%= item.sku_img%>" width="100%" alt=""></span><input type="hidden" name="" value="<%= item.sku_id %>"></td>
				<td width="100"><span class="spanpd10"><a href="javascript:;" title="选择图片" data-skuId="<%= item.sku_id %>" class="btn btn-primary j-getskuimg">选择图片</a></span></td>
			</tr>
		<% }) %>
		</tbody>
	</table>
</script>

<!-- sku color custom  -->
<script type="text/j-template" id="tpl_skuColorCustom">
	<li class="custom-list">
		<input class="J_addCheckbox" type="checkbox" name="" value="<%= data.key %>" checked>
		<input class="mini input J_custom_name" type="text" name="" data-v="<%= data.key %>" value="" placeholder="其他<%= data.name %>" maxlength="30">
	</li>
</script>
<script type="text/j-template" id="tpl_goods_lists">
	<%var ids=[];%>
	<ul class="img-list clearfix">
		<% if (data.length){ %>
			<% _.each(data,function(goods){ %>
				<li data-item="<%= goods.item_id %>" style="position:relative;">
					<span class="img-move img-move-left"></span>
					<span class="img-move img-move-right"></span>
					<span class="img-list-btndel j-delgoods"><i class="gicon-trash white"></i></span>
					<span class="img-list-overlay"></span>
					<% if(goods.is_compress){ %>
						<img src="<%= goods.pic %>80x80">
					<% }else{ %>
						<img src="<%= goods.pic %>">
					<% } %>
					<input type="text" data-id="<%= goods.item_id %>" value="<%= goods.price %>" style="width:60px;left:0px;position:absolute;bottom:0px;border:0px;text-align:center;"/>
				</li>
				<%ids.push(goods.item_id)%>
			<% }) %>
		<% } %>
		<li class="img-list-add j-addgoods">+</li>
	</ul>
</script>

<!--end front template  -->

<?php include "views/global_template.php";?>
<?php include "views/global_footer.php";?>
<script src="<?php echo SITE_ROOT;?>statics/plugins/uploadify/jquery.uploadify.min.js?ver=6998"></script>
<script src="<?php echo SITE_ROOT;?>statics/js/dist/Item/add_step2.js"></script>
<script src="<?php echo SITE_ROOT;?>statics/plugins/My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript">
<!--
	var goods_id='<?php echo $info["id"];?>';
	if(goods_id>0){
		var goods_setting=<?php echo json_encode($goods_setting);?>;
		function initSettingData(id){
			if(goods_setting){
				$("input[name='"+id+"']").each(function(i){
					if($(this).val()==goods_setting[id]){
						$(this).attr('checked',true);
					} else {
						$(this).removeAttr('checked');
					}
				});
			}
		}
		initSettingData("is_cod");
		initSettingData("hide_stock");
		initSettingData("join_level_discount");
		initSettingData("is_buy_card");
		initSettingData("is_show_sale");
		initSettingData("is_fx_commission");
		initSettingData("is_fx_point");
	}
//-->
</script>
<script src="<?php echo SITE_ROOT;?>statics/js/dist/Item/add_step2_skucust.js"></script>
<script>
var platform="<?php echo $info['platform'];?>";
var goods_list=<?php echo isset($info['fixings'])?$info['fixings']:'[]';?>;
$(function(){
	function o(t) {
		var list = $(".js-goods-lists"),
			i = $("#tpl_goods_lists").html(),
			a = $(_.template(i, {
				data: t
			}));
		list.html(a);
		$("#j-fixings").val(JSON.stringify(t));
	};
	o(goods_list);
	$(".js-goods-lists").on("change", "input", function() {
		for(i in goods_list){
			if(goods_list[i].item_id==$(this).data('id')){
				goods_list[i].price=$(this).val();
				break;
			}
		}
		o(goods_list);
    }),
	$(document).on("click", ".j-delgoods", function() {
		var t = $(this).parents("li").index();
		return goods_list.splice(t, 1), o(goods_list), !1
    }),
	$(document).on("click", ".j-addgoods", function() {
		$.selectGoods({
			selectMod: 2,
			selectIds: '0',
			callback: function(t, n) {
				"[object object]" == Object.prototype.toString.call(t).toLowerCase() ? goods_list.push(t) : "[object array]" == Object.prototype.toString.call(t).toLowerCase() && (goods_list = goods_list.concat(t)), o(goods_list)
			}
		})
    }),
	$("#addclass").click(function(){
		parent_id=$("select[name='cat_id']");
		cate_name=$("#newclass").val();
		$.post('index.php?con=goods&act=edit_cate',{commit:1,parent_id:parent_id.val(),class_name:cate_name,class_img:"",serial:0,link:""},function(data){
			if(data.status==1){
				parent_id.append('<option value="'+data.id+'" selected>'+cate_name+'</option>');
			}
		},'json');
	});
	$("#addgroup").click(function(){
		parent_id=$("select[name='group_id']");
		group_name=$("#newgroup").val();
		$.post('index.php?con=goods&act=group_edit',{commit:1,title:group_name,content:""},function(data){
			if(data.status==1){
				parent_id.append('<option value="'+data.id+'-'+group_name+'" selected>'+group_name+'</option>');
			}
		},'json');
	});
	$('.bhaide').on('click',function() {
		if($(this).data('open')==1){
			$(this).data('open',0);
			$(this).parent().children('.setfxs-box').slideUp();
		} else {
			$(this).data('open',1);
			$(this).parent().children('.setfxs-box').slideDown();
		}
	});
	// 商品图片排序
	// 图片左移
	$(document).on('click','.img-list>li .img-move-left',function(){
		var me = $(this);
		var curindex = me.closest('li').index();
		var html = me.closest('li');
		var str = '';
		if(curindex!=0){
			curindex--;
			me.closest('ul').find('li').eq(curindex).before(html);
			me.closest('ul').find('li').not('.img-list-add').each(function(index, el) {
				var imgsrc=$(this).children('img').attr('src');
				str += imgsrc + ','
			});
			str = str.substring(0,str.length-1)
			$('.j-imglist-dataset[name=file_path]').val(str);
		};
	});
	// 图片右移
	$(document).on('click','.img-list>li .img-move-right',function(){
		var me = $(this),
			len = me.closest('ul').find('li').length-1;
		var curindex = me.closest('li').index();
		var str = '';
		var html = me.closest('li');
		if(curindex!=(len-1)){
			curindex++;
			me.closest('ul').find('li').eq(curindex).after(html);
			me.closest('ul').find('li').not('.img-list-add').each(function(index, el) {
				var imgsrc=$(this).children('img').attr('src');
				str += imgsrc + ','
			});
			str = str.substring(0,str.length-1)
			$('.j-imglist-dataset[name=file_path]').val(str);
		};
	})

	//限制字数
	$('.J_goods_name').keyup(function(){
		var len= $(this).val().length;

		if( len > 64){
			var str = $('.J_goods_name').val().substr(0,64);
			$('.J_goods_name').val(str);
		}
	})
	
	  $("#buy_method").find("option[value='"+platform+"']").attr("selected",true);
	  function init_buy(){
		if($('#buy_method').val()=="0"){
			$("#buy_url").hide();
		} else {
			$("#buy_url").show();
		}
	  }
	//确认价格改变
	$('#buy_method').change(function(){
        init_buy()

	});
	init_buy();
});
</script>
<!-- 启 -->




</body>
</html>
<!-- 20160922 -->
