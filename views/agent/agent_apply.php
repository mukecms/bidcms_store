
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- 满足有些用户在手机端访问的需要 -->

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <title>分销商审核 - Bidcms开源电商</title>
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
            <h1 class="content-right-title">分销商审核<a class="gicon-info-sign gicon_linkother" href="//www.wifenxiao.com/Index/help_show/lm/help/id/50.html" target="_blank"></a></h1>


    <div class="tablesWrap">
        <form action="" method="post" name="form1">
        <div class="tables-searchbox">
            <input type="text" class="input mini" name="agent_name" value="" placeholder="姓名/ID">
            <input type="text" class="input mini" name="nickname" value="" placeholder="微信昵称">
            <input type="text" class="input" name="mobile" value="" placeholder="手机号码">
            <input type="text" autocomplete="off" name="start_time" value="" placeholder="申请时间" class="input Wdate" onclick="WdatePicker({ dateFmt:'yyyy-MM-dd'})">
            <span class="mgr5">至</span>
            <input type="text" autocomplete="off" name="end_time" value="" placeholder="申请时间" class="input Wdate" onclick="WdatePicker({ dateFmt:'yyyy-MM-dd'})">
            <button class="btn btn-primary"><i class="gicon-search white"></i>查询</button>
        </div>
        </form>
        <!-- end tables-searchbox -->
        <table class="wxtables">
            <colgroup>
                <col width="5%">
                <col width="10%">
				<col width="10%">
                <col width="15%">
                <col width="15%">
                <col width="15%">
                <col width="10%">
				<col width="20%">
            </colgroup>
            <thead>
                <tr>
                    <td><i class="icon_check"></i></td>
                    <td>申请人</td>
					<td>手机号码</td>
                    <td>详细地址</td>
                    <td>申请时间</td>
					<td>审核时间</td>
                    <td>状态</td>
                    <td>操作</td>
                </tr>
            </thead>
            <tbody>
              <?php if($list['data']){
			  $status=array('0'=>'审核中','1'=>'审核通过','-1'=>'审核拒绝');
			  ?>
                <?php foreach($list['data'] as $k=>$v){?>
                  <tr>
                      <td></td>
                      <td><?php echo $v['username'];?></td>
					  <td><?php echo $v['mobile'];?></td>
                      <td><?php echo $v['address'];?></td>
                      <td><?php echo date('Y-m-d',$v['updatetime']);?></td>
					  <td><?php echo $v['reviewed_time']>0?date('Y-m-d',$v['reviewed_time']):'';?></td>
                      <td><?php echo $status[$v['status']];?></td>
                      <td>
					  <?php if($v['status']==0){?>
                       <a href="javascript:;"  data-id="<?php echo $v['id'];?>" class="btn btn-mini btn-success j-pass">通过审核</a>
                      <a href="javascript:;" class="btn btn-mini btn-danger j-npass" data-id="<?php echo $v['id'];?>" >拒绝申请</a>
					  <?php }?>
					  </td>
                  </tr>
                <?php }?>
              <?php } else {?>
                <tr><td colspan="10">暂无信息</td></tr>
              <?php }?>
            </tbody>
        </table>
        <!-- end wxtables -->
                <!-- end tables-btmctrl -->
    </div>
    <!-- end tablesWrap -->

        </div>
        <!-- end content-right -->

        <a href="javascript:;" class="btn-leftMenuFold" id="j-btn-leftMenuFold" ></a>
    </div>
</div>
<!-- end container -->


<!-- end footer -->
<div class="fixedBar">
    <ul>
        <li class="shopManager0"><a href="javascript:;" data-target="#shop_0">分销商管理</a></li>        </ul>
    <a href="javascript:;" class="fixedBar-btn" id="j-fixedBar-btn"></a>
</div><a href="#" id="j-gotop" class="gotop" title="回到顶部"></a>
<!-- end gotop -->

<script type="text/j-template" id="tpl_apply_pass">
	<div>
    <div class="formitems inline">
        <label class="fi-name">分销商等级：</label>
            <select name="agent_rank_id" class="select">
            <?php foreach($rank_list as $k=>$v){?>
              <option value="<?php echo $k;?>"><?php echo $v['title'];?></option>
            <?php }?>
            </select>
    </div>

    <div class="formitems">
            <label class="fi-name">开始时间：</label>
            <input type="text" autocomplete="off" name="start_time" value="" placeholder="开始时间" class="input Wdate" onclick="WdatePicker({ dateFmt:'yyyy-MM-dd'})">
    </div>
    <div class="formitems">
            <label class="fi-name">到期时间：</label>
            <input type="text" autocomplete="off" name="end_time" value="" placeholder="到期时间" class="input Wdate" onclick="WdatePicker({ dateFmt:'yyyy-MM-dd'})">
    </div>
    <div class="formitems">
            <label class="fi-name">备注（选填）：</label>
            <input type="text" name="remark" class="input" value="" />
    </div>
</script>

<script type="text/j-template" id="tpl_apply_nopass_remark">
    <div>
        <div class="formitems">
            <label>确定不通过审核？</label>
        </div>
        <div class="formitems">
            <div>
                <label>备注（选填）：</label>
                <input type="text" name="remark" class="input" value="" />
            </div>
        </div>
</script>
<script type="text/j-template" id="tpl_apply_nopassAll_remark">
    <div>
        <div class="formitems">
            <label>确定批量不通过审核？</label>
        </div>
        <div class="formitems">
            <div>
                <label>备注（选填）：</label>
                <input type="text" name="remark" class="input" value="" />
            </div>
        </div>
</script>

<!--end front template  -->

<?php include "views/global_footer.php";?>

<script src="<?php echo SITE_ROOT;?>statics/plugins/My97DatePicker/WdatePicker.js"></script>
<script src="<?php echo SITE_ROOT;?>statics/js/dist/User/apply_lists.js"></script>

<!-- end session hint -->

</body>
</html>
<!-- 20170105 -->
