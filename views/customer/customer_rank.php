
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- 满足有些用户在手机端访问的需要 -->

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <title>会员等级 - Bidcms开源电商</title>
    <!-- 线上环境 -->
        <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/css/component-min.css">    <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/plugins/jbox/jbox-min.css">

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
            <h1 class="content-right-title">会员等级<a class="gicon-info-sign gicon_linkother" href="//www.wifenxiao.com/Index/help_show/lm/help/id/53.html" target="_blank"></a></h1>



    <a href="javascript:;" class="btn btn-success j-add">添加会员等级</a>
	<table class="wxtables mgt15">
	    <colgroup>
	        <col width="20%">
	        <col width="15%">
	        <col width="15%">
	        <col width="15%">
	        <col width="22%">
	        <col width="13%">
	    </colgroup>
	    <thead>
	        <tr>
	            <td>等级名称</td>
	            <td>交易额</td>
	            <td>交易次数</td>
	            <td>会员折扣</td>
	            <td>特权说明</td>
	            <td>操作</td>
	        </tr>
	    </thead>
	    <tbody>
          <?php foreach($list as $k=>$v){?>
            <tr>
	            <td><?php echo $v['title'];?></td>
                <td><?php echo $v['amount'];?></td>
                <td><?php echo $v['trades'];?></td>
	            <td><?php echo $v['discount'];?></td>
	            <td><?php echo $v['content'];?></td>
	            <td>
	            	<a href="javascript:;" class="btn btn-mini btn-primary j-modify" data-amount="<?php echo $v['amount'];?>" data-count="<?php echo $v['trades'];?>" data-level="<?php echo $v['level'];?>" data-alias="<?php echo $v['title'];?>" data-discount="<?php echo $v['discount'];?>" data-id="<?php echo $v['id'];?>" data-point="<?php echo $v['point'];?>" data-content="<?php echo $v['content'];?>">编辑</a>
                    <a href="javascript:;" class="btn btn-mini btn-danger j-del"  data-id="<?php echo $v['id'];?>">删除</a>
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
            <li class="shopManager8"><a href="javascript:;" data-target="#shop_8">会员管理</a></li>        </ul>
        <a href="javascript:;" class="fixedBar-btn" id="j-fixedBar-btn"></a>
    </div><a href="#" id="j-gotop" class="gotop" title="回到顶部"></a>
<!-- end gotop -->


    <script type="text/j-template" id="tpl_user_rank_add">
        <div>

            <div class="formitems">
                <label class="fi-name">等级名称：</label>
                <div class="form-controls">
                    <input type="text" name="alias" class="input">
                </div>
            </div>
            <div class="formitems">
                <label class="fi-name">等级权重：</label>
                <div class="form-controls">
                    <input type="text" name="level" class="input">
                    <span class="fi-help-text">分销等级权重，值越大级别越高</span>
                </div>
            </div>
            <div class="formitems">
                <label class="fi-name">交易额：</label>
                <div class="form-controls">
                    <input type="text" name="amount" class="input mini">
                    <span class="fi-help-text">满足条件之一：交易额</span>
                </div>
            </div>
            <div class="formitems">
                <label class="fi-name">交易次数：</label>
                <div class="form-controls">
                    <input type="text" name="count" class="input mini">
                    <span class="fi-help-text">满足条件之一：交易次数</span>
                </div>
            </div>
            <div class="formitems">
                <label class="fi-name">会员折扣：</label>
                <div class="form-controls">
                    <input type="text" name="discount" class="input mini">
                    <span>折</span>
                    <span class="fi-help-text">请输入0.1~10之间的数字,值为空代表不设置折扣</span>
                </div>
            </div>
			<div class="formitems">
                <label class="fi-name">消费送积分：</label>
                <div class="form-controls">
                    <input type="text" name="point" class="input mini">
                    <span>（积分/元）</span>
                    <span class="fi-help-text">每消费1元可获得多少积分，请输入大于0.01的数值</span>
                </div>
            </div>
			<div class="formitems">
                <label class="fi-name">特权说明：</label>
                <div class="form-controls">
                    <textarea name="content" class="textarea mini" style="width:200px;"></textarea>
                </div>
            </div>
        </div>
    </script>
<script type="text/j-template" id="tpl_user_rank_modify">
	<div>
    <div class="formitems">
        <label class="fi-name">等级名称：</label>
        <div class="form-controls">
            <input type="text" name="alias" class="input" value="<%= alias %>">
        </div>
    </div>
    <div class="formitems">
        <label class="fi-name">等级权重：</label>
        <div class="form-controls">
            <input type="text" name="level" class="input" value="<%= level %>">
            <span class="fi-help-text">分销等级权重，值越大级别越高</span>
        </div>
    </div>
		<div class="formitems">
			<label class="fi-name">交易额：</label>
			<div class="form-controls">
				<input type="text" name="amount" class="input mini" value="<%= amount %>">
				<span class="fi-help-text">满足条件之一：交易额</span>
			</div>
		</div>
		<div class="formitems">
			<label class="fi-name">交易次数：</label>
			<div class="form-controls">
				<input type="text" name="count" class="input mini" value="<%= count %>">
				<span class="fi-help-text">满足条件之一：交易次数</span>
			</div>
		</div>
		<div class="formitems">
			<label class="fi-name">会员折扣：</label>
			<div class="form-controls">
				<input type="text" name="discount" class="input mini" value="<%= discount %>">
				<span>折</span>
				<span class="fi-help-text">请输入0.1~10之间的数字,值为空代表不设置折扣</span>
			</div>
		</div>
		<div class="formitems">
			<label class="fi-name">消费送积分：</label>
			<div class="form-controls">
				<input type="text" name="point" class="input mini" value="<%= point %>">
				<span>（积分/元）</span>
				<span class="fi-help-text">每消费1元可获得多少积分，请输入大于0.01的数值</span>
			</div>
		</div>
		<div class="formitems">
			<label class="fi-name">特权说明：</label>
			<div class="form-controls">
				<textarea name="content" class="textarea mini" style="width:200px;"><%= content %></textarea>
			</div>
		</div>
	</div>
</script>
<!-- end tpl_user_rank_modify -->

<!--end front template  -->
<?php include "views/global_footer.php";?>

<script src="<?php echo SITE_ROOT;?>statics/js/dist/User/rank.js"></script>


</body>
</html>
<!-- 20170105 -->
