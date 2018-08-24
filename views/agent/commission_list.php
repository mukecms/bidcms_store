
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- 满足有些用户在手机端访问的需要 -->

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <title>分销商佣金列表 - Bidcms开源电商</title>
    <!-- 线上环境 -->
        <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/css/component-min.css">    <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/plugins/jbox/jbox-min.css">



</head>
<body class="cp-bodybox">
<?php include "views/global_top.php";?>

<div class="container">
    <div class="inner clearfix">
        <div class="content-left fl" >
            <?php include "views/global_nav.php";?>
        </div>

        <div class="content-right">
            <h1 class="content-right-title">分销商佣金列表<a class="gicon-info-sign gicon_linkother" href="//www.wifenxiao.com/Index/help_show/lm/help/id/237.html" target="_blank"></a></h1>



    <div class="tablesWrap">
        <form action="/Dist/commission_list" method="post" name="form1" id="form1">
            <div class="tables-searchbox">
                <input type="text" class="input" name="mobile" value='' placeholder="昵称/手机号/会员ID">
                <input type="text" class="input" name="start_commission" value='' placeholder="剩余佣金">
                <span class="mgr5">至</span>
                <input type="text" class="input" name="end_commission" value='' placeholder="剩余佣金">
                <select name="commission" class="select">
                    <option value="-1" selected>佣金排序</option>
                        <option value="1" >升</option>
                        <option value="2" >降</option>
                    </foreach>
                </select>
                <button class="btn btn-primary J_search"><i class="gicon-search white"></i>查询</button>
                            </div>
        </form>
        <!-- end tables-searchbox -->
        <table class="wxtables">
           <colgroup>
                <col width="8%">
                <col width="8%">
                <col width="8%">
				<col width="8%">
                <col width="16%">
                <col width="16%">
				<col width="16%">
                <col width="15%">
            </colgroup>
            <thead>
            <tr>
                <td>订单ID</td>
                <td>商品ID</td>
				<td>分销商ID</td>
                <td>佣金</td>
                <td>订单状态</td>
				<td>结算状态</td>
				<td>备注</td>
                <td class="txtCenter">操作</td>
            </tr>
            </thead>
            <tbody>
			<?php if($list['data']){
			$bstatus=array('0'=>'未结算','-1'=>'关闭分佣','1'=>'已结算');
			?>
			<?php foreach($list['data'] as $k=>$v){?>
			 <tr>
				<td><?php echo $v['order_id'];?></td>
                <td><?php echo $v['goods_id'];?></td>
				<td><?php echo $v['customer_id'];?></td>
                <td><span id="commission<?php echo $v['id'];?>"><?php echo $v['commission']/100;?></span></td>
                <td><?php echo $GLOBALS['order_status'][$v['order_status']];?><br/><?php echo date('y-m-d H:i:s',$v['updatetime']);?></td>
				<td><?php echo $bstatus[$v['balance_status']];?><?php if($v['balance_status']!=0){?><br/><?php echo date('y-m-d H:i:s',$v['balance_time']);?><?php }?></td>
				<td><?php echo $v['content'];?></td>
                <td class="txtCenter">
				<?php if($v['balance_status']==0){?>
				<button class="btn btn-mini btn-danger j-del" data-id="<?php echo $v['id'];?>">关闭分佣</button>
				<a href="javascript:;" class="btn btn-mini btn-primary j-commission" data-id="<?php echo $v['id'];?>" data-oid="<?php echo $v['order_id'];?>" data-gid="<?php echo $v['goods_id'];?>" data-uid="<?php echo $v['customer_id'];?>" data-commission="<?php echo $v['commission'];?>">调整佣金</a>
				<?php }?>
				</td>
				</tr>
			<?php }?>
			<?php } else {?>
            <tr><td colspan="8">暂无信息</td></tr>
			<?php }?>
            </tbody>
        </table>
        <!-- end wxtables -->
                <!-- end tables-btmctrl -->
    </div>




        </div>
        <!-- end content-right -->

        <a href="javascript:;" class="btn-leftMenuFold" id="j-btn-leftMenuFold" ></a>
    </div>
</div>
<!-- end container -->

<script type="text/j-template" id="tpl_user_lists_commission">
	<div>
		<div class="formitems inline">
			<label class="fi-name">分销商ID：</label>
			<div class="form-controls pdt3"><%= uid %></div>
		</div>
		<div class="formitems inline">
			<label class="fi-name">订单ID：</label>
			<div class="form-controls pdt3"><%= oid %></div>
		</div>
		<div class="formitems inline">
			<label class="fi-name">商品ID：</label>
			<div class="form-controls pdt3"><%= gid %></div>
		</div>
		<div class="formitems inline">
			<label class="fi-name">当前佣金：</label>
			<div class="form-controls pdt3"><%= commission %></div>
		</div>
		<div class="formitems inline">
			<label class="fi-name"><span class="colorRed">*</span>调整为：</label>
			<div class="form-controls">
				<input type="text" name="commission" class="input mini">
				<span class="fi-help-text"></span>
			</div>
		</div>
		<div class="formitems inline">
			<label class="fi-name">备注：</label>
			<div class="form-controls"><input type="text" name="content" value="" class="input"/></div>
		</div>
	</div>
</script>
<script type="text/j-template" id="tpl_del_commission">
	<div>
		<div class="formitems inline">
			<label class="fi-name">关闭分佣理由：</label>
			<div class="form-controls pdt3">
				<textarea name="content" id="" class="textarea small"></textarea>
			</div>
		</div>
	</div>
</script>

<?php include "views/global_footer.php";?>


<!--end front template  -->

<script type="text/javascript">
<!--
	$(".j-del").click(function() {
		var t = $(this),
			n = t.data("id"),
			e = _.template($("#tpl_del_commission").html(), {}),
			a = $(e);
			$remark = a.find("textarea[name='content']");
		return $.jBox.show({
			width: 400,
			title: "关闭分佣",
			content: a,
			btnOK: {
				onBtnClick: function(t) {
					$.jBox.close(t);
					
					$.ajax({
						url: "index.php?con=agent&act=commission&v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							commit:1,
							id:n,
							commission:-1,
							remark:$remark.val()
						},
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(t) {
							1 == t.status ? (HYD.hint("success", "恭喜您，操作成功！"), setTimeout(function() {
								window.location.reload();
							}, 1e3)) : HYD.hint("danger", "对不起，操作失败：" + t.msg), $.jBox.hideloading()
						}
					})
				}
			}
		}), !1
	}),
	$(".j-commission").click(function() {
		var t = $(this),
			n = t.data("id"),
			e = t.data("commission");
		defaults = {
			uid: t.data("uid"),
			oid: t.data("oid"),
			gid: t.data("gid"),
			commission: e/100
		};
		var a = _.template($("#tpl_user_lists_commission").html(), defaults),
			o = $(a),
			i = o.find("input[name='commission']");
		return $remark = o.find("input[name='content']"), 
			$.jBox.show({
			width: 500,
			title: "修改佣金",
			content: o,
			btnOK: {
				onBtnClick: function(t) {
					return val_rank = parseFloat(i.val()), val_remark = $remark.val(), isNaN(val_rank) ? void HYD.FormShowError(i, "请输入合法金额" + val_remark) : ($.jBox.close(t), void $.ajax({
						url: "index.php?con=agent&act=commission&v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							commit:1,
							id: n,
							commission: val_rank,
							remark: val_remark
						},
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(t) {
							1 == t.status ? (HYD.hint("success", "恭喜您，设置成功！"), setTimeout(function() {
								$("#commission"+n).text(val_rank);
							}, 1e3)) : HYD.hint("danger", "对不起，设置失败：" + t.msg), $.jBox.hideloading()
						}
					}))
				}
			}
		}), !1
	})
//-->
</script>

</body>
</html>
<!-- 20170105 -->
