<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- 满足有些用户在手机端访问的需要 -->

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <title>退换货申请审核 - Bidcms开源电商</title>
    <!-- 线上环境 -->
        <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/css/component-min.css">
        <link rel="stylesheet" href="statics/plugins/jbox/jbox-min.css">

	<link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/css/Order/lists.css">

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
            <h1 class="content-right-title">退换货申请审核<a class="gicon-info-sign gicon_linkother" href="//www.wifenxiao.com/Index/help_show/lm/help/id/48.html" target="_blank"></a></h1>


	<form action="" method="post" id="searchForm">
        <div class="table-searchbox-v2">
            <div class="row clearfix">
                <div class="col">
                    <span class="tbs-txt">收货人姓名：</span>
                    <input type="text" name="receiver_name" class="input" value="">
                </div>

                <div class="col">
                    <span class="tbs-txt">收货地址：</span>
                    <input type="text" placeholder="" class="input" name="receiver_address" value="">
                </div>
                <div class="col">
                    <span class="tbs-txt">收货人手机：</span>
                    <input type="text" name="receiver_mobile" class="input" value="">
                </div>
            </div>
            <div class="row clearfix">
              <div class="col">
                  <span class="tbs-txt">快递单号：</span>
                  <input type="text" placeholder="" class="input" name="express_no" value="">
              </div>
                <div class="col">
                    <span class="tbs-txt">订单号：</span>
                    <input type="text" name="mobile_orderno" class="input" value="">
                </div>
                <div class="col">
                    <span class="tbs-txt">下单时间：</span>
                    <input type="text" autocomplete="off" name="start_create_time" value="" placeholder="开始时间" class="input Wdate" onclick="WdatePicker({ dateFmt:'yyyy-MM-dd'})" style="width:88px;"><input type="text" autocomplete="off" name="end_create_time" value="" placeholder="结束时间" class="input Wdate" onclick="WdatePicker({ dateFmt:'yyyy-MM-dd'})" style="width:88px;">
                </div>
            </div>
            <div class="row clearfix">
                <div class="col">
                    <span class="tbs-txt"></span>
                    <button class="btn btn-primary"><i class="gicon-search white"></i>查询</button>
                </div>
            </div>
        </div>
    </form>
	<!-- <form action="" method="post"> -->
		<div class="tabs clearfix mgt15">
		    <a href="index.php?con=orders&act=exchange" class="<?php if(empty($status)){?>active<?php }?> tabs_a fl">所有申请(0)</a>
		    <a href="index.php?con=orders&act=exchange&status=1" class="<?php if(!empty($status)){?>active<?php }?> tabs_a fl">处理完成的申请(0)</a>
		    <!-- <div class="tables-searchbox pd0 fr">
				<input type="text" placeholder="输入买家手机号或者订单/退货编号进行搜索" class="input xlarge" name="val" value="">
			    <button class="btn btn-primary"><i class="gicon-search white"></i>查询</button>
			</div>  -->
		</div>
		<!-- end tabs -->

		<table class="wxtables table-order mgt20">
		    <colgroup>
		        <col width="30%">
				<col width="7%">
				<col width="25%">
				<col width="15%">
				<col width="7%">
        <col width="16%">
		    </colgroup>
		    <thead>
		        <tr>
					<td>商品</td>
					<td>退货金额</td>
          <td>退货信息</td>
					<td>买家信息</td>
					<td>退货状态</td>
					<td>操作</td>
		        </tr>
		    </thead>
        <tbody>
            <?php if($list['data']){?>
              <?php
              $status=array('-1'=>'拒绝退货','0'=>'待处理','1'=>'审核通过');
              foreach($list['data'] as $index=>$order){?>
              <tr><td colspan="6" style="background-color:#eee;"><input type="checkbox" value="<?php echo $order['id'];?>"/> <strong><?php echo date('Y-m-d',$order['updatetime']);?></strong> <?php echo $order['order_sn'];?></td></tr>
              <?php foreach($order['refund'] as $item){?>
              <tr id="list<?php echo $item['id'];?>">
                  <td style="width:300px;">
                  <?php if(isset($item['goods']) && count($item['goods'])>0){?>
                          <?php foreach($item['goods'] as $goods){?>
                          <div class="clearfix" style="margin-bottom:2px;">
                              <div style="float:left;margin-right:15px;width:60px;height:60px;background-image:url(<?php echo $goods['goods_thumb'];?>);background-size:cover;">
                              </div>
                              <div>
                                  <p><?php echo $goods['goods_name'];?></p>
                                  <p style="color:#888;"><?php echo $goods['sku_name'];?></p>
                              </div>
                          </div>
                          <?php }?>
                  <?php }?>
                  </td>
                  <td style="width:140px;"><?php echo $item['money'];?></td>
                  <td style="width:140px;"><?php echo $item['content'];?>
                    <?php if(!empty($v['imglist'])){?>
                      <div>
                        <?php foreach($v['imglist'] as $img){?>
                          <a href="<?php echo $img;?>" target="_blank">
                          <img src="<?php echo $img;?>" style="width:40px;height:40px;"/>
                          </a>&nbsp;
                        <?php }?>
                      </div>
                    <?php }?>
                  </td>
                  <td style="width:120px;">
                    <?php echo $order['receiver_name'];?><br/>手机：<?php echo $order['receiver_mobile'];?><br/>地址：<?php echo $order['address'];?>
                  </td>
                  <td><?php echo $status[$item['status']];?></td>
                  <td style="width:80px;">
                    <a href="javascript:;" data-id="<?php echo $item['id'];?>" class="btn btn-mini btn-primary j-refundOk" title="修改">审核</a>
                  </td>
              </tr>
            <?php }?>
            <?php }} else{?>
                <tr>
                    <td colspan="6">暂无信息</td>
                </tr>
            <?php }?>
        </tbody>
      </table>
            		<!-- end wxtables -->
		<div class="tables-btmctrl clearfix mgt10">
            <div class="fr">
                <div class="paginate">
                  <?php echo $pageinfo;?>
                </div>
                <!-- end paginate -->
            </div>
		</div>
		<!-- end tables-btmctrl -->
	<!-- </form> -->


        </div>
        <!-- end content-right -->
    </div>
</div>
<!-- end container -->

<!--gonggao-->

<!--tip-->
<!-- end footer -->
    <div class="fixedBar">
        <ul>
            <li class="shopManager6"><a href="javascript:;" data-target="#shop_6">订单管理</a></li><li class="shopManager0"><a href="javascript:;" data-target="#shop_0">营销活动订单</a></li><li class="shopManager7"><a href="javascript:;" data-target="#shop_7">售后服务</a></li>        </ul>
        <a href="javascript:;" class="fixedBar-btn" id="j-fixedBar-btn"></a>
    </div><a href="#" id="j-gotop" class="gotop" title="回到顶部"></a>
<!-- end gotop -->


<!--end front template  -->
<script type="text/j-template" id="tpl_order_refund">
    <div>
      <div class="formitems">
          <label class="fi-name"><span class="colorRed">*</span>操作：</label>
          <div class="form-controls">
              <div class="radio-group">
              <label><input type="radio" name="is_ok" value="1" checked>审核通过</label>
              <label><input type="radio" name="is_ok" value="-1">拒绝审核</label>
              </div>
          </div>
      </div>
        <div class="formitems">
            <label class="fi-name"><span class="colorRed">*</span>操作备注：</label>
            <div class="form-controls">
                  <textarea name="remark" class="textarea" style="width:270px;height:120px;"></textarea>
            </div>
        </div>
    </div>
</script>
<?php include "views/global_footer.php";?>
<script src="<?php echo SITE_ROOT;?>statics/js/dist/Order/lists.js"></script>
<script src="<?php echo SITE_ROOT;?>statics/plugins/My97DatePicker/WdatePicker.js"></script>

</body>
</html>
<!-- 20160728 -->
