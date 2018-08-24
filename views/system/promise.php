
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- 满足有些用户在手机端访问的需要 -->

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <title>服务承诺 - Bidcms开源电商</title>

        <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/css/component-min.css">    <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/plugins/jbox/jbox-min.css">

<link rel="stylesheet" type="text/css" href="<?php echo SITE_ROOT;?>statics/css/System/promise.css">
<link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/plugins/uploadify/uploadify-min.css">

</head>
<body class="cp-bodybox">
<?php include "views/global_top.php";?>

<div class="container">
    <div class="inner clearfix">
        <div class="content-left fl">
        <?php include "views/global_nav.php";?>
        </div>
        <div class="content-right">
            <h1 class="content-right-title">服务承诺<a class="gicon-info-sign gicon_linkother" href="#" target="_blank"></a>
<!-- 连接需要修改 -->
</h1>


	<div class="alert alert-info disable-del">
		<h4>服务承诺功能：</h4>
        <p>1.服务承诺，即商家对客户承诺能做到的服务和服务质量。请商家根据实际情况开启相应的服务承诺。</p>
        <p>2.服务承诺开启后，买家即可在手机端看到相应的服务承诺和服务承诺介绍。</p>
	</div>
    <a href="javascript:;" class="btn btn-success j-addpromise">新增服务承诺</a>

	    <table class="wxtables">
	    <colgroup>
		    <col width="15%">
	        <col width="10%">
	        <col width="50%">
	        <col width="10%">
	        <col width="12%">
	    </colgroup>
	    <thead>
	        <tr>
	            <td>服务名称</td>
	            <td>LOGO</td>
	            <td>承诺说明</td>
	            <td>是否开启</td>
	            <td>操作</td>
	        </tr>
	    </thead>

	    <tbody class="promise_tobdy">
		<?php foreach($list as $k=>$v){?>
			<tr>
	            <td>
	                <?php echo $v['name'];?>
	            </td>
	            <td><img src="<?php echo $v['image'];?>" class="goods-image" style="vertical-align:top;"></td>
	            <td><?php echo $v['desc'];?></td>
	            <td>
	              	<div class="sysPanel sysPanel-table">
		              	<div class="vir-chkb j-vir-chkb">
			            	<div class="vir-chkb-actions clearfix disable" style="display: block;">
			                <a href="javascript:;" class="vir-chkb-enable" style="display: block;">已开启</a>
			                <a href="javascript:;" class="vir-chkb-disable" style="display: none;">已关闭</a>
	            			</div>
	            			<input type="checkbox" class="ip-checkbox j-vir-checkbox" <?php echo $v['status']==1?'checked':'';?>>
	            			<input type="hidden" data-name="id" value="<?php echo $v['id'];?>" class="j-vir-formdata">
	       				</div>
       				</div>
	            </td>
	            <td>
	                <a href="javascript:;" class="btn btn-mini btn-primary btn_compile" title="修改" data-name="<?php echo $v['name'];?>" data-logo="<?php echo $v['image'];?>" data-excerpt="<?php echo $v['desc'];?>" data-id="<?php echo $v['id'];?>">编辑</a>
	                <a href="javascript:;" class="btn btn-mini btn-danger btn_del" title="删除" data-id="<?php echo $v['id'];?>">删除</a>
	            </td>
	        </tr>
		<?php }?>
	    </tbody>
	</table>

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

<script type="text/j-template" id="Goods_promised">
<%_.each(dataset,function(item){%>
	<tr>
		<td>
			<%=item.name%>
		</td>
		<td><img src="<%item.logo%>" class="goods-image"></td>
		<td><%=item.excerpt%></td>
		<td>
		<div class="sysPanel sysPanel-table">
			<div class="vir-chkb j-vir-chkb">
				<div class="vir-chkb-actions clearfix">
				<a href="javascript:;" class="vir-chkb-enable">已开启</a>
				<a href="javascript:;" class="vir-chkb-disable">已关闭</a>
				</div>
				<input type="checkbox" name="is_open" class="ip-checkbox j-vir-checkbox">
				<input type="hidden" data-name="id" value="1" class="j-vir-formdata">
			</div>
		</div>
		</td>
		<td>
			<a href="javascript:;" class="btn btn_compile" title="修改" data-name="服务名称" data-logo="" data-excerpt="" data-id="1">编辑</a>
			<a href="javascript:;" class="btn btn_del" title="删除">删除</a>
		</td>
	</tr>
<%})%>
</script>
<script type="text/j-template" id="promised_rule">
			<div class="promised_rule_name">
				<div class="formitems inline">
				<label class="fi-name"><span class="colorRed"></span>服务名称：</label>
				<div class="form-controls">
					<input type="text" placeholder="请填写服务名称" class="input input_promised" value="<%=name%>" >
				</div>
				</div>
			</div>

			<div class="promised_rule_image">
				<div class="formitems inline">
				<label class="fi-name"><span class="colorRed"></span>LOGO:</label>
				<div class="form-controls pdt5">
					<ul class="img-list clearfix">
						<li class="img-list-add j-addgoods">
						<%if(img.length){%>
							<img src="<%=img%>" style="vertical-align: top;">
						<%}else{%>
							<span>+</span>
						<%}%>
						</li>
					</ul>
					<input type="hidden" value="" class="j-verify">
					<span class="fi-help-text">建议尺寸：200px*200px，大小不超过1M</span>
				</div>
			</div>

			<div class="formitems inline">
				<label class="fi-name"><span class="colorRed"></span>服务描述：</label>
				<div class="form-controls">
					<textarea name="" id="" class="textarea" placeholder="请填写服务描述"><%=excerpt%></textarea>
				</div>
			</div>
</script>

<?php include "views/global_footer.php";?>

<script src="<?php echo SITE_ROOT;?>statics/js/dist/System/promise_add.js"></script>
<script src="<?php echo SITE_ROOT;?>statics/plugins/uploadify/jquery.uploadify.min.js?ver=1606"></script>

</body>
</html>
<!-- 20170105 -->
