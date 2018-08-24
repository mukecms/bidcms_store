<!DOCTYPE html><html lang="en"><head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<!-- 满足有些用户在手机端访问的需要 -->

<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />
<title>提货点管理 - Bidcms开源电商</title>
<link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/css/component-min.css">
<link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/plugins/jbox/jbox-min.css">
</head>
<body class="cp-bodybox">
<?php include "views/global_top.php";?>
<div class="container">
<div class="inner clearfix">
<div class="content-left fl">
<?php include "views/global_nav.php";?>
</div>
<div class="content-right">
<h1 class="content-right-title">提货点管理<a class="gicon-info-sign gicon_linkother" href="//www.wifenxiao.com/Index/help_show/lm/help/id/220.html" target="_blank"></a></h1>

<div class="alert alert-info disable-del"><h4>提示</h4>此处地址用于自提时的选择地址</div>
<a href="index.php?con=freight&act=add_address" class="btn btn-success">添加自提地址</a>
<form action="" method="post">
<div class="clearfix mgt10">
<input type="text" placeholder="联系人/手机号" class="input" name="title" value="">
<input type="text" autocomplete="off" name="start_create_time" value="" placeholder="创建时间" class="input Wdate" onclick="WdatePicker({ dateFmt:'yyyy-MM-dd'})">
<span class="mgr5">至</span>
<input type="text" autocomplete="off" name="end_create_time" value="" placeholder="创建时间" class="input Wdate" onclick="WdatePicker({ dateFmt:'yyyy-MM-dd'})">
<button class="btn" style="line-height:26px;"><i class="gicon-search"></i>查询</button>
</div>
</form>
<!-- end tabs -->
<table class="wxtables mgt10">
<colgroup>
<col width="2%">
<col width="20%">
<col width="20%">
<col width="30%">
<col width="28%">
</colgroup>
<thead>
<tr class="po_list">
<td></td>
<td>联系人</td>
<td>手机号</td>
<td>详细地址</td>
<td>操作</td>
</tr>
</thead>
<tbody>
<?php if(!empty($list)){?>
  <?php foreach($list as $k=>$v){?>
  <tr>
    <td></td>
    <td><?php echo $v['name'];?></td>
    <td><?php echo $v['mobile'];?></td>
    <td><?php echo $v['address'];?></td>
    <td>
      <a href="index.php?con=freight&act=add_address&id=<?php echo $v['id'];?>" class="btn btn-mini btn-primary width" title="修改">编辑</a>
      <a href="javascript:;" class="btn btn-mini btn-danger j-del" title="删除" data-id="<?php echo $v['id'];?>">删除</a>
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
<div class="fl">
</div>
<div class="fr">
<div class="paginate">
</div>
<!-- end paginate -->
</div>
</div>
<!-- end tables-btmctrl -->
</div>
<!-- end content-right -->
<a href="javascript:;" class="btn-leftMenuFold" id="j-btn-leftMenuFold" ></a>
</div></div><!-- end container --><!-- end footer -->
<div class="fixedBar">
<ul>
<li class="shopManager21"><a href="javascript:;" data-target="#shop_21">系统设置</a></li><li class="shopManager22"><a href="javascript:;" data-target="#shop_22">域名管理</a></li><li class="shopManager23"><a href="javascript:;" data-target="#shop_23">在线客服</a></li><li class="shopManager24"><a href="javascript:;" data-target="#shop_24">微信设置</a></li><li class="shopManager25"><a href="javascript:;" data-target="#shop_25">素材库</a></li><li class="shopManager26"><a href="javascript:;" data-target="#shop_26">短信</a></li><li class="shopManager27"><a href="javascript:;" data-target="#shop_27">物流管理</a></li><li class="shopManager29"><a href="javascript:;" data-target="#shop_29">系统日志</a></li>
</ul>
<a href="javascript:;" class="fixedBar-btn" id="j-fixedBar-btn"></a>
</div><a href="#" id="j-gotop" class="gotop" title="回到顶部"></a><!-- end gotop -->
<?php include "views/global_footer.php";?>
<script src="<?php echo SITE_ROOT;?>statics/plugins/My97DatePicker/WdatePicker.js"></script>
<script src="<?php echo SITE_ROOT;?>statics/js/dist/System/self_address.js"></script>
</body></html><!-- 20170105 -->
