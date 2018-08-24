<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- 满足有些用户在手机端访问的需要 -->

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <title>所有订单 - Bidcms开源电商</title>
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
            <h1 class="content-right-title">所有订单<a class="gicon-info-sign gicon_linkother" href="//www.wifenxiao.com/Index/help_show/lm/help/id/46.html" target="_blank"></a>
			</h1>

			<form action="" method="post" id="searchForm">
				<div class="table-searchbox-v2">
					<div class="row clearfix">
						<div class="col">
							<span class="tbs-txt">收货人姓名：</span>
							<input type="text" name="receiver_name" class="input" value="">
						</div>
						<div class="col">
							<span class="tbs-txt">快递单号：</span>
							<input type="text" placeholder="" class="input" name="express_no" value="">
						</div>
						<div class="col">
							<span class="tbs-txt">收货地址：</span>
							<input type="text" placeholder="" class="input" name="receiver_address" value="">
						</div>
					</div>
					<div class="row clearfix">
						<div class="col">
							<span class="tbs-txt">收货人手机：</span>
							<input type="text" name="receiver_mobile" class="input" value="">
						</div>
						<div class="col">
							<span class="tbs-txt">配送方式：</span>
							<select name="shipping_type" class="select">
								<option value="" selected>--请选择--</option>
								<option value="1" >快递</option>
								<option value="2" >EMS</option>
								<option value="3" >平邮</option>
								<option value="4" >自提</option>
								<option value="5" >门店配送</option>
							</select>
						</div>

						<div class="col">
							<span class="tbs-txt">下单时间：</span>
							<input type="text" autocomplete="off" name="start_create_time" value="" placeholder="开始时间" class="input Wdate" onclick="WdatePicker({ dateFmt:'yyyy-MM-dd'})" style="width:88px;"><input type="text" autocomplete="off" name="end_create_time" value="" placeholder="结束时间" class="input Wdate" onclick="WdatePicker({ dateFmt:'yyyy-MM-dd'})" style="width:88px;">
						</div>
					</div>
					<div class="row clearfix">
						<div class="col">
							<span class="tbs-txt">订单号：</span>
							<input type="text" name="mobile_orderno" class="input" value="">
						</div>
						<div class="col col">
							<span class="tbs-txt">会员ID：</span>
							<input type="text" placeholder="" class="input" name="user_id" value="">
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

			<div class="tabs clearfix mgt15 tabs-width order-numbers">
				<a href="index.php?con=orders" class="tabs_a fl order orderall">所有订单(<span class="order-number">0</span>)</a>
				<a href="index.php?con=orders&status=0" class=" tabs_a fl order0">待付款(<span class="order-number">0</span>)</a>
				<a href="index.php?con=orders&status=1" class=" tabs_a fl order1">待发货(<span class="order-number">0</span>)</a>
				<a href="index.php?con=orders&status=2" class=" tabs_a fl order2">待收货(<span class="order-number">0</span>)</a>
				<a href="index.php?con=orders&status=3" class=" tabs_a fl order3">交易完成(<span class="order-number">0</span>)</a>
				<a href="index.php?con=orders&status=-3" class=" tabs_a fl order-3">已关闭(<span class="order-number">0</span>)</a>
				<a href="index.php?con=orders&status=-2" class=" tabs_a fl order-2">已退款(<span class="order-number">0</span>)</a>
				<a href="index.php?con=orders&status=-1" class=" tabs_a fl order-1">已取消(<span class="order-number">0</span>)</a>
			</div>
        <!-- end tabs -->
        <div class="grounp_chenge_box">
            <span class="grtt">每页显示订单数量:</span>
            <a class="intem intem10" href="<?php echo $url;?>&page_size=10">10</a>
            <a class="intem intem20" href="<?php echo $url;?>&page_size=20">20</a>
            <a class="intem intem40" href="<?php echo $url;?>&page_size=40">40</a>
            <a class="intem intem50" href="<?php echo $url;?>&page_size=50">50</a>
        </div>
        <table class="wxtables table-order mgt20">

            <thead>
                <tr>
                    <td>商品</td>
                    <td>收货信息</td>
                    <td>付款信息</td>
                    <td>买家留言</td>
                    <td>状态</td>
                    <td>操作</td>
                </tr>
            </thead>
            <tbody>
				<?php if($list['data']){?>
                <?php foreach($list['data'] as $index=>$item){?>
      					<tr><td colspan="6" style="background-color:#eee;"><input type="checkbox" value="<?php echo $item['id'];?>"/> <strong><?php echo date('Y-m-d',$item['updatetime']);?></strong> <?php echo $item['order_sn'];?></td></tr>
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
                                <p style="color:#888;">￥<?php echo $goods['current_price'];?> X <?php echo $goods['num'];?></p>
                            </div>
                        </div>
                        <?php }?>
      					<?php }?>
      					</td>
      					<td style="width:140px;"><?php echo $item['receiver_name'];?><br/>手机：<?php echo $item['receiver_mobile'];?><br/>地址：<?php echo $item['address'];?></td>
                <td style="width:120px;">
      						￥<?php echo $item['payable'];?><br/>
      						<span style="color:#888;">含运费:￥<?php echo $item['post_price'];?></span>
      					</td>
                    <td><?php echo $item['content'];?></td>
                    <td style="width:80px;">
						            <?php echo $GLOBALS['pay_status'][$item['pay_status']];?><br/>
                        <?php echo $GLOBALS['order_status'][$item['order_status']];?>
                    </td>
                    <td style="width:250px;">
						             <a href="javascript:;" data-id="<?php echo $item['id'];?>" class="btn btn-mini btn-primary j-modify" title="修改">修改价格</a>
                         <a href="javascript:;" data-id="<?php echo $item['id'];?>" data-selfid="0" data-express="<?php echo $item['express_id'];?>" data-no="<?php echo $item['express_no'];?>" data-name="<?php echo $item['express_name'];?>" class="btn btn-mini btn-success j-order-deliver"><?php echo $item['express_id']>0?'修改快递':'标记发货';?></a>
                        <a href="javascript:;" data-id="<?php echo $item['id'];?>"  class="btn btn-mini btn-danger j-confirm-order" title="修改">标记收货</a>
                        <a href="javascript:;" data-id="<?php echo $item['id'];?>" data-name='<?php echo $item['receiver_name'];?>' data-mobile='<?php echo $item['receiver_mobile'];?>' data-address='<?php echo $item['address'];?>' class="btn btn-mini btn-primary j-update-address" title="修改">修改收货地址</a>
                        <a href="javascript:;" data-id="<?php echo $item['id'];?>" class="btn btn-mini btn-danger j-item-sku" title="修改">更改商品规格</a>


                    </td>
                </tr>
                <?php }} else{?>
                    <tr>
                        <td colspan="6">暂无信息</td>
                    </tr>
                <?php }?>
                </tbody>
        </table>

		<hr>
            <div class="mgt10">
                <div class="paginate">
                <?php echo $pageinfo;?>
                </div>
            </div>
        <!-- end wxtables -->
                <!-- end tables-btmctrl -->
    </form>

    <form action="/Order/print_invoice" method="post" id="ids">
        <input type="hidden" name="ids" value="">
    </form>




        </div>
        <!-- end content-right -->
    </div>
</div>
<!-- end container -->

<!--gonggao-->

<!-- end footer -->
<div class="fixedBar">
	<ul>
		<li class="shopManager6"><a href="javascript:;" data-target="#shop_6">订单管理</a></li><li class="shopManager0"><a href="javascript:;" data-target="#shop_0">营销活动订单</a></li><li class="shopManager7"><a href="javascript:;" data-target="#shop_7">售后服务</a></li>
	</ul>
	<a href="javascript:;" class="fixedBar-btn" id="j-fixedBar-btn"></a>
</div><a href="#" id="j-gotop" class="gotop" title="回到顶部"></a>
<!-- end gotop -->


    <script type="text/j-template" id="tpl_getExpressInfo">
        <div class="mob-express">
            <iframe src="//m.kuaidi100.com/index_all.html?type=<%=expname%>&postid=<%=postid%>" width="100%" height="600" frameborder="0" class="mob-express-iframe"></iframe>
        </div>
    </script>
    <!-- end 获取物流 -->

    <!-- deliver start -->
    <script type="text/j-template" id="tpl_order_lists_deliver">
    <div>
        <div class="formitems">
            <label class="fi-name"><span class="colorRed">*</span>自提：</label>
            <div class="form-controls">
                <div class="radio-group">
                <label><input type="radio" name="is_self_take" value="0" <% if(!self_id){%>checked<%}%>>否</label>
                <label><input type="radio" name="is_self_take" value="1" <% if(self_id){%>checked<%}%>>是</label>
                </div>
            </div>
        </div>
        <div class="formitems J_select_address hide">
            <label class="fi-name"><span class="colorRed">*</span>自提地址：</label>
            <div class="form-controls">
                <select name="self_address_id" class="select">
                    <option value="-1" selected>请选择</option>
                    <?php foreach($self_address as $k=>$v){?>
                    <option value="<?php echo $v['id'];?>"><?php echo $v['name'];?></option>
                    <?php }?>
                </select>
                <span class="fi-help-text"></span>
            </div>
        </div>
        <div class="formitems J_express_company">
            <label class="fi-name"><span class="colorRed">*</span>物流公司：</label>
            <div class="form-controls">
                <select name="deliver_wuliu" class="select send_deliver">
                    <option value="" selected>请选择</option>
                    <?php foreach($GLOBALS['freight_company'] as $k=>$v){?>
                    <option value="<?php echo $k;?>"  <% if(express == <?php echo $k;?>){ %>selected<% } %>><?php echo $v;?></option>
                    <?php }?>
                </select>
                <span class="fi-help-text"></span>
            </div>
        </div>
        <div class="formitems hide express_class">
            <label class="fi-name"><span class="colorRed"></span>快递公司：</label>
            <div class="form-controls">
                <input type="text" name="express_name" class="input" value="<%= express_name %>">
                <span class="fi-help-text"></span>
            </div>
        </div>
        <div class="formitems J_express_no">
            <label class="fi-name"><span class="colorRed">*</span>快递/取货号：</label>
                <div class="form-controls">
                    <input type="text" name="deliver_number" class="input"  value="<%= express_no %>">
                <span class="fi-help-text"></span>
            </div>
        </div>

    </script>
    <!-- deliver end -->



    <!-- deliver start -->
    <script type="text/j-template" id="tpl_order_lists_print">
        <div>
            <div class="formitems">
                <label class="fi-name"><span class="colorRed">*</span>快递单模板：</label>
                <div class="form-controls">
                    <select name="print_tpl" class="select">
                    </select>
                </div>
            </div>
        </div>
    </script>

    <!-- print_elect start -->
    <script type="text/j-template" id="tpl_order_print_elect">
        <div>
            <div class="formitems">
                <label class="fi-name"><span class="colorRed">*</span>电子面单模板：</label>
                <div class="form-controls">
                    <select name="print_elect_tpl" class="select">

                    </select>
                </div>
            </div>
        </div>
    </script>

    <script type="text/j-template" id="tpl_order_lists_address">
        <div>
            <div class="formitems">
                <label class="fi-name"><span class="colorRed"></span>收货人姓名：</label>
                <div class="form-controls">
                    <input type="text" name="name" class="input" value="<%= name %>">
                    <span class="fi-help-text"></span>
                </div>
            </div>
            <div class="formitems">
                <label class="fi-name"><span class="colorRed">*</span>收货人手机号：</label>
                <div class="form-controls">
                    <input type="text" name="mobile" class="input" value="<%= mobile %>">
                    <span class="fi-help-text"></span>
                </div>
            </div>
            <div class="formitems">
                <label class="fi-name"><span class="colorRed">*</span>收货人地址详情：</label>
                <div class="form-controls">
                    <input type="text" name="address" class="input" value="<%= address %>">
                    <span class="fi-help-text"></span>
                </div>
            </div>
        </div>
    </script>
    <!-- batch_address end -->
    <script type="text/j-template" id="tpl_order_lists_sku">
        <div class="modifyPanel">
            <ul class="goodsList">
                <% _.each(data,function(item){ %>
                <li>
                    <a href="javascript:;" title="<%= item.goods_name %>">
                        <div class="goodsList-img">
                            <img src="<%= item.goods_thumb %>" alt="<%= item.goods_name %>">
                        </div>
                        <div class="goodsList-info">
                            <p><%= item.goods_name %></p>
                            <span>&yen;<%= item.current_price %></span>
                            <span class="colorGray">数量：<%= item.num %></span>
                        </div>
                    </a>
                    <% if(item.arr_sku.length){ %>
                    <div class="formitems">
                        <div class="form-controls">
                            <select name="sku_id[]" class="select">
                                <%_.each(item.arr_sku,function(sku){ %>
                                <span class="colorGray"><option value="<%= sku.sku_id %>-<%= sku.sku_name%>" <% if(item.sku_id ==  sku.sku_id){ %>selected<% }%>><%= sku.sku_name%></option></span>
                                <% }); %>
                            </select>
                            <input type="hidden" name="item_id[]" value="<%= item.id %>">
                            <span class="fi-help-text"></span>
                        </div>
                    </div>
                    <% } %>
                </li>
                <% }); %>
            </ul>
        </div>
    </script>

    <script type="text/j-template" id="tpl_order_del">
        <div>
            <div class="formitems">
                删除后将不可恢复，是否继续？
            </div>
            <div class="formitems">
                <label>备注：</label>
                <div class="form-controls" style="margin-left:45px;margin-top:-15px;">
                    <textarea name="del_remark" class="textarea" style="width:270px;height:120px;"></textarea>
                </div>
            </div>
        </div>
    </script>
    <!-- deliver end -->
    <script type="text/j-template" id="tpl_order_lists_modify">
	<div class="modifyPanel">
		<ul class="goodsList">
			<% _.each(dataset,function(goods){ %>
				<li>
					<a href="<%= goods.href %>" target="_blank" title="<%= goods.title %>">
						<div class="goodsList-img">
							<img src="<%= goods.img %>" alt="<%= goods.title %>">
						</div>
						<div class="goodsList-info">
							<p><%= goods.title %></p>
							<span>&yen;<%= goods.price %></span>
							<span class="colorGray"><%= goods.sku %></span>
							<span class="colorGray">数量：<%= goods.num %></span>
						</div>
					</a>
				</li>
			<% }); %>
		</ul>
		<ul class="orderInfo pdt20">

			<li class="formitems inline">
				<label class="fi-name">涨价或减价：</label>
			    <div class="form-controls">
					<input type="text" class="input mini j-modify-riseOrDrop" value="<%= riseOrDrop %>">
			    </div>
			</li>
			<li class="formitems inline">
				<label class="fi-name">运费：</label>
			    <div class="form-controls">
					<div class="radio-group">
			            <label><input type="radio" name="freight" class="j-modify-freight" value="0" <% if(freight==0){ %> checked <% } %> >免运费</label>
			            <label><input type="radio" name="freight" class="j-modify-freight" value="1" <% if(freight>0){ %> checked <% } %>>自定义</label>
			        </div>
			        <div class="custom_yunfei inline-block">
		            	<input type="text" class="input j-modify-freightipt" value="<%= freight %>" style="width:50px;" <% if(freight==0){ %> disabled <% } %>>
		            	<span>元</span>
		            </div>
			    </div>
			</li>
			<li class="formitems inline">
				<label class="fi-name">商品总价：</label>
			    <div class="form-controls pdt3">
			    	&yen;<span class="ftsize20"><%= orderPrice %></span>
			    </div>
			</li>
			<li class="formitems inline">
				<label class="fi-name">应支付：</label>
			    <div class="form-controls pdt3">
			    	&yen;<span class="j-modify-ptout-realPrice ftsize20 colorRed"><%= realPrice %></span>
            <span class="j-modify-ptout-freight colorGray">
			    		<% if(freight==0){ %>
				    		(包邮)
				    	<% } else { %>
				    		(包含<%= freight %>元邮费)
				    	<% }%>
			    	</span>
			    </div>
			</li>
      <% if(coupon){ %>
      <li class="formitems inline">
        <label class="fi-name">优惠券：</label>
          <div class="form-controls pdt3">“<%= coupon.title %>” 用券后可再减<span class="ftsize20 colorRed"> <%= coupon.money %> </span>元 </div>
      </li>
      <% } %>
		</ul>
	</div>
</script>
<!-- end tpl_order_lists_modify -->

<!--end front template  -->
<?php include "views/global_footer.php";?>


<script src="<?php echo SITE_ROOT;?>statics/js/dist/Order/lists.js"></script>
<script src="<?php echo SITE_ROOT;?>statics/plugins/My97DatePicker/WdatePicker.js"></script>
<script>
	$(function(){
		var status='<?php echo $order_status;?>';
		var page_size='<?php echo $page_size;?>';
		$(".order"+status).addClass('active');
		$(".intem"+page_size).addClass('cur');
		$.post("index.php?con=orders&act=numbers", {}, function(data){
			if(data.status){
				var number = data.data;
				for(i in number){
					$(".order"+i).find('span').html(number[i]);
				}
			}
		}, "json");


		//获取物流信息
		$('.logistics_box').hover(function(){
			var id = $(this).find('.infor_logistics').data("id"),
				oid = $(this).find('.infor_logistics').data("oid");
			$('.infor_logistics_box').empty();
			$.post('index.php?con=orders&act=getExpress',{id:id,oid:oid},function(data){
				if(data.status == 1){
					var datas = data.data;
					var html = '';
						html +='<p class="courier"><em class="name">'+datas.express_name+'</em><em class="number">运单号：'+datas.order_no+'</em></p><ul class="address">';
						$.each(datas.result.list,function(n,value){console.log(value);
							if(n == 0){
								html +='<li class="current"><span class="place" >'+value.status+'</span><span class="time">'+value.time+'</span><i class="symbol"></i>';
							}else{
								html +='<li><span class="place" >'+value.status+'</span><span class="time">'+value.time+'</span><i class="symbol"></i>';
							}
						})
					html += '<ul>';
					$('.infor_logistics_box').html(html);
				}else{
					var html = '';
					html +='<p class="courier"><em class="name">抱歉，暂无查询记录</em></p>';
					$('.infor_logistics_box').html(html);
				}
			});
			$(this).children('.infor_logistics_box').show();
			$(this).children('.arrow-top').show();
		},function(){
			$(this).children('.infor_logistics_box').hide();
			$(this).children('.arrow-top').hide();
		});
	})
</script>

</body>
</html>
<!-- 20160728 -->
