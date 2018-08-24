<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- 满足有些用户在手机端访问的需要 -->

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <title>商品分组列表 - Bidcms开源电商</title>
    <!-- 线上环境 -->
        <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/css/component-min.css">
        <link rel="stylesheet" href="statics/plugins/jbox/jbox-min.css">

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
            <h1 class="content-right-title">商品分组列表<a class="gicon-info-sign gicon_linkother" href="//www.wifenxiao.com/Index/help_show/lm/help/id/43.html" target="_blank"></a></h1>


	<form action="index.php?con=goods&act=group" method="post" >
		<div class="clearfix mgt20">
	        <a href="<?php echo $edit_url;?>" class="btn btn-success fl">新建分组</a>
	        <div class="fr">
	            <input type="text" placeholder="分组名称" class="input" name="title" value="">
	            <button class="btn btn-primary"><i class="gicon-search white"></i>查询</button>
	        </div>
		</div>
		<table class="wxtables mgt15">
		    <colgroup>
		        <col width="2%">
		        <col width="25%">
		        <col width="25%">
		        <col width="27%">
		        <col width="21%">
		    </colgroup>
		    <thead>
		        <tr>
		            <td><i class="icon_check"></i></td>
		            <td>分组名称</td>
		            <td>商品数量</td>
		            <td>创建时间</td>
		            <td>操作</td>
		        </tr>
		    </thead>
		    <tbody>
		    <?php if($list){?>
		    <?php foreach($list as $k=>$v){?>
		    <tr>
	            <td>
	                <input class="checkbox table-ckbs" data-id="<?php echo $v['id'];?>" type="checkbox">
	            </td>
	            <td><?php echo $v['title'];?></td>
	            <td><?php echo $v['goods_count'];?></td>
	            <td><?php echo date('Y-m-d H:i:s',$v['updatetime']);?></td>
	            <td>
	                <a href="<?php echo $edit_url;?>&id=<?php echo $v['id'];?>" class="btn btn-mini btn-primary" title="修改">编辑</a>
	                <a href="javascript:;" class="btn btn-mini btn-danger j-del" title="删除" data-id="<?php echo $v['id'];?>">删除</a>
	                <a href="<?php echo API_STORE;?>m.php?act=group&id=<?php echo $v['id'];?>&shopid=<?php echo $v['shop_id'];?>" class="btn btn-mini btn-success" title="复制地址" target="_blank">预览</a>
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
            <li class="shopManager3"><a href="javascript:;" data-target="#shop_3">商品管理</a></li><li class="shopManager4"><a href="javascript:;" data-target="#shop_4">分组管理</a></li><li class="shopManager5"><a href="javascript:;" data-target="#shop_5">批量导入</a></li>        </ul>
        <a href="javascript:;" class="fixedBar-btn" id="j-fixedBar-btn"></a>
    </div><a href="#" id="j-gotop" class="gotop" title="回到顶部"></a>
<!-- end gotop -->

<!--end front template  -->
<?php include "views/global_footer.php";?>


<script src="<?php echo SITE_ROOT;?>statics/js/dist/Item/list_group.js"></script>

</body>
</html>
<!-- 20160728 -->
