<!DOCTYPE html><html lang="en"><head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<!-- 满足有些用户在手机端访问的需要 -->
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />
<title>运费模板 - Bidcms开源电商</title>
<link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/css/component-min.css">
<link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/plugins/jbox/jbox-min.css">
<style>
.wxtables .btn{min-width:50px;}
</style></head><body class="cp-bodybox">
<?php include "views/global_top.php";?>
<div class="container">
<div class="inner clearfix">
<div class="content-left fl">
<?php include "views/global_nav.php";?>
</div>
<div class="content-right">
<h1 class="content-right-title">运费模板<a class="gicon-info-sign gicon_linkother" href="//www.wifenxiao.com/Index/help_show/lm/help/id/217.html" target="_blank"></a></h1>
<a href="index.php?con=freight&act=add_tpl" class="btn btn-success">添加运费模板</a>
<form action="" method="post">
  <table class="wxtables mgt15">
  <colgroup>
  <col width="20%">
  <col width="20%">
  <col width="20%">
  <col width="40%">
  </colgroup>
  <thead>
    <tr>
    <td>模板标题</td><td>快递公司</td><td>状态</td><td class="txtCenter">操作</td>
    </tr>
  </thead>
<tbody>
<?php if(empty($list)){?>
<tr><td colspan="4">暂无信息</td></tr>
<?php } else {?>
  <?php foreach($list as $k=>$v){?>
  <tr id="tpl<?php echo $v['id'];?>">
  <td><?php echo $v['title'];?></td><td><?php echo $freight_company[$v['company_id']];?></td>
  <td><?php echo $v['status']==1?'启用':'关闭';?></td>
  <td class="txtCenter">
  <a href="index.php?con=freight&act=add_tpl&id=<?php echo $v['id'];?>" class="btn btn-mini btn-primary" title="修改">编辑</a>
  <a href="javascript:;" class="btn btn-mini btn-danger j-del" data-id="<?php echo $v['id'];?>" title="删除">删除</a>
  </td>
  </tr>
<?php }?>
<?php }?>
</tbody>
</table>		<!-- end wxtables -->
		<!-- end tables-btmctrl -->
</form>
</div>
<!-- end content-right -->
<a href="javascript:;" class="btn-leftMenuFold" id="j-btn-leftMenuFold" ></a>
</div></div><!-- end container -->
<div class="fixedBar">
<ul>
<li class="shopManager21"><a href="javascript:;" data-target="#shop_21">系统设置</a></li><li class="shopManager22"><a href="javascript:;" data-target="#shop_22">域名管理</a></li><li class="shopManager23"><a href="javascript:;" data-target="#shop_23">在线客服</a></li><li class="shopManager24"><a href="javascript:;" data-target="#shop_24">微信设置</a></li><li class="shopManager25"><a href="javascript:;" data-target="#shop_25">素材库</a></li><li class="shopManager26"><a href="javascript:;" data-target="#shop_26">短信</a></li><li class="shopManager27"><a href="javascript:;" data-target="#shop_27">物流管理</a></li><li class="shopManager29"><a href="javascript:;" data-target="#shop_29">系统日志</a></li>
</ul>
<a href="javascript:;" class="fixedBar-btn" id="j-fixedBar-btn"></a>
</div>
<a href="#" id="j-gotop" class="gotop" title="回到顶部"></a><!-- end gotop -->
<?php include "views/global_footer.php";?>
<script src="<?php echo SITE_ROOT;?>statics/js/dist/System/freight.js"></script> 
</body></html><!-- 20170105 -->
