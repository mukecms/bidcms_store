<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- 满足有些用户在手机端访问的需要 -->

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <title>评价管理 - Bidcms开源电商</title>
    <!-- 线上环境 -->
        <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/css/component-min.css">
        <link rel="stylesheet" href="statics/plugins/jbox/jbox-min.css">

	<link rel="stylesheet" href="statics/plugins/fancybox/source/jquery.fancybox-min.css?v=2.1.5">
	<link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/css/Comment/lists.css">
	<style>
	.wxtables .btn{min-width:50px;}
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
            <h1 class="content-right-title">评价管理<a class="gicon-info-sign gicon_linkother" href="//www.wifenxiao.com/Index/help_show/lm/help/id/49.html" target="_blank"></a></h1>


	
	<div class="tablesWrap">
        <form action="" method="post">
	    <div class="tables-searchbox">
	    	<span>评价时间：</span>
	        <input type="text" autocomplete="off" class="input Wdate" name="start_time" value="" onclick="WdatePicker({ dateFmt:'yyyy-MM-dd H:mm:ss'})">
	        <span class="mgr5">至</span>
	        <input type="text" autocomplete="off" class="input Wdate" name="end_time" value="" onclick="WdatePicker({ dateFmt:'yyyy-MM-dd H:mm:ss'})">
	        <button class="btn btn-primary"><i class="gicon-search white"></i>查询</button>  
	    </div>
        </form>
	    <!-- end tables-searchbox -->
	    <table class="wxtables">
	        <colgroup>
	        <col width="10%">
	        <col width="20%">
	        <col width="40%">
          <col width="10%">
	        <col width="20%">
	        </colgroup>
	        <thead>
	            <tr>
                  <td></td>
	                <td>商品</td>
	                <td>评价</td>
                  <td>日期</td>
	                <td>操作</td>
	            </tr>
	        </thead>
	        <tbody>
          <?php if(!empty($list['data'])){?>
            <?php foreach($list['data'] as $k=>$v){?>
              <tr id="comment<?php echo $v['id'];?>">
                  <td><img src="<?php echo $v['goods']['goods_thumb'];?>" style="width:80px;height:80px"/></td>
	                <td><?php echo $v['goods']['goods_name'];?>
                    <p><?php echo $v['goods']['sku_name'];?>&nbsp;</p>
                    <p>￥<?php echo $v['goods']['current_price'];?>x<?php echo $v['goods']['num'];?></p>
                  </td>
	                <td><?php echo $v['content'];?>
                    <?php if(!empty($v['imglist'])){?>
                      <div>
                        <?php foreach($v['imglist'] as $img){?>
                          <a href="<?php echo $img;?>" target="_blank">
                          <img src="<?php echo $img;?>" style="width:40px;height:40px;"/>
                          </a>&nbsp;
                        <?php }?>
                      </div>
                    <?php }?>
                    <p id="reply<?php echo $v['id'];?>">回复：&nbsp;<strong style="color:#ff0000;"><?php echo $v['reply'];?></strong></p></td>
                  <td><?php echo $v['updatetime'];?></td>
	                <td>
                    <a href="javascript:;" data-id="<?php echo $v['id'];?>" class="btn btn-mini btn-primary j-replay" title="修改">回复</a>
                    <a href="javascript:;" data-id="<?php echo $v['id'];?>" class="btn btn-mini btn-success j-hide"><?php echo $v['is_hide']==1?'显示':'隐藏';?>评论</a>
                    <a href="javascript:;" data-id="<?php echo $v['id'];?>" class="btn btn-mini btn-danager j-del">删除评论</a>

                  </td>
	            </tr>
            <?php }?>
          <?php } else {?>
            <tr><td colspan="5">暂无信息</td></tr>
          <?php }?>
          </tbody>
	    </table>
	    <!-- end wxtables -->
	    <div class="tables-btmctrl clearfix">
	        <div class="fl"></div>
            <div class="fr">
                <div class="paginate">
                  <?php echo $pageinfo;?>
                </div>
                <!-- end paginate -->
            </div><!-- 技 -->
	    </div>
	    <!-- end tables-btmctrl -->
	</div>
	<!-- end tablesWrap -->

        </div>
        <!-- end content-right -->
    </div>
</div>
<!-- end container -->

<!--gonggao-->
<script type="text/j-template" id="tpl_jbox_simple">
	<div class="mgt30"><%= content %></div>
</script>

<script type="text/j-template" id="tpl_comment_lists_replay">
	<div class="formitems">
	    <div class="form-controls" style="margin:0">
	        <textarea name="" id="" class="textarea"></textarea>
	        <span class="fi-help-text"></span>
	    </div>
	</div>
</script>

<!--tip-->
    <div class="fixedBar">
        <ul>
            <li class="shopManager6"><a href="javascript:;" data-target="#shop_6">订单管理</a></li><li class="shopManager0"><a href="javascript:;" data-target="#shop_0">营销活动订单</a></li><li class="shopManager7"><a href="javascript:;" data-target="#shop_7">售后服务</a></li>        </ul>
        <a href="javascript:;" class="fixedBar-btn" id="j-fixedBar-btn"></a>
    </div><a href="#" id="j-gotop" class="gotop" title="回到顶部"></a>
<!-- end gotop -->


<!--end front template  -->
<?php include "views/global_footer.php";?>


<script src="<?php echo SITE_ROOT;?>statics/plugins/My97DatePicker/WdatePicker.js"></script>
<script src="<?php echo SITE_ROOT;?>statics/plugins/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
<script src="<?php echo SITE_ROOT;?>statics/js/dist/Comment/lists.js"></script>


</body>
</html>
<!-- 20160728 -->
