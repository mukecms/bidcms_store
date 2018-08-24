
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- 满足有些用户在手机端访问的需要 -->

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <title>分销商等级 - Bidcms开源电商</title>
    <!-- 线上环境 -->
        <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/css/component-min.css">    <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/plugins/jbox/jbox-min.css">

    <style>
        .controls-input input{vertical-align: middle;}
        .formitems .fi-name{width:120px;}
        .form-controls{margin-left:130px;}
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
            <h1 class="content-right-title">分销商等级<a class="gicon-info-sign gicon_linkother" href="//www.wifenxiao.com/Index/help_show/lm/help/id/230.html" target="_blank"></a></h1>


    <a href="javascript:;" class="btn btn-success j-add ">添加分销商等级</a>
    <table class="wxtables mgt15">
        <colgroup>
            <col width="15%">
            <col width="13%">
            <col width="13%">
            <col width="13%">
            <col width="13%">
        </colgroup>
        <thead>
        <tr>
            <td>等级名称</td>
            <td>等级权重</td>
            <td>等级奖励金额/积分<i class="gicon-info-sign tips" data-trigger="hover" data-placement="left" data-content="达此等级后可一次性奖励分销商的金额和积分"></i></td>
            <td>等级奖励积分<i class="gicon-info-sign tips" data-trigger="hover" data-placement="left" data-content="到达此等级后每月最多可提现的次数和最大金额"></i></td>
            <td>操作</td>
        </tr>
        </thead>
        <tbody>
          <?php if(!empty($list)){?>
            <?php foreach($list as $v){?>
              <tr>
                  <td><?php echo $v['title'];?></td>
                  <td><?php echo $v['level'];?></td>
                  <td><?php echo $v['reward_money'];?>/<?php echo $v['reward_point'];?></td>
                  <td><?php echo $v['draw_num'];?>/<?php echo $v['draw_money'];?></td>
                  <td>
    	            	<a href="javascript:;" class="btn btn-mini btn-primary j-modify" data-title="<?php echo $v['title'];?>" data-level="<?php echo $v['level'];?>" data-id="<?php echo $v['id'];?>" data-money="<?php echo $v['reward_money'];?>" data-point="<?php echo $v['reward_point'];?>" data-drawnum="<?php echo $v['draw_num'];?>" data-draw="<?php echo $v['draw_money'];?>">编辑</a>
                    <a href="javascript:;" class="btn btn-mini btn-danger j-del"  data-id="<?php echo $v['id'];?>">删除</a>
    	            </td>
              </tr>
            <?php }?>
          <?php }else{?>
        <tr><td colspan="5">暂无信息</td></tr>
      <?php }?>
        </tbody>
    </table>

        </div>
        <!-- end content-right -->

        <a href="javascript:;" class="btn-leftMenuFold" id="j-btn-leftMenuFold" ></a>
    </div>
</div>
<!-- end container -->

<!--tip-->
<!-- end footer -->
    <div class="fixedBar">
        <ul>
            <li class="shopManager0"><a href="javascript:;" data-target="#shop_0">分销商管理</a></li>        </ul>
        <a href="javascript:;" class="fixedBar-btn" id="j-fixedBar-btn"></a>
    </div><a href="#" id="j-gotop" class="gotop" title="回到顶部"></a>
<!-- end gotop -->
<?php include "views/global_template.php";?>


    <script type="text/j-template" id="tpl_agent_rank_add">
        <div>
            <div class="formitems">
                <label class="fi-name">等级名称：</label>
                <div class="form-controls">
                    <input type="text" name="title" class="input mini">
                    <span class="fi-help-text"></span>
                </div>
            </div>
            <div class="formitems">
                <label class="fi-name">等级权重：</label>
                <div class="form-controls">
                    <input type="text" name="agent_level" class="input mini">
                    <span class="fi-help-text">分销等级权重，值越大越重要</span>
                </div>
            </div>
            
            <div class="formitems">
                <label class="fi-name">升到此等级奖励金额：</label>
                <div class="form-controls">
                    <input type="text" name="reward_money" class="input mini">
                    <span class="fi-help-text">发放到会员的账户余额</span>
                </div>
            </div>
            <div class="formitems">
                <label class="fi-name">升到此等级奖励积分：</label>
                <div class="form-controls">
                    <input type="text" name="reward_point" class="input mini">
                </div>
            </div>
            <div class="formitems">
                <label class="fi-name">每月提现次数：</label>
                <div class="form-controls">
                    <input type="text" name="draw_num" class="input mini">
                </div>
            </div>
            <div class="formitems">
                <label class="fi-name">每月最多提现佣金：</label>
                <div class="form-controls">
                    <input type="text" name="draw_money" class="input mini">
                    <span class="fi-help-text">该金额包含佣金提现到余额的金额</span>
                </div>
            </div>
        </div>
    </script>

    <script type="text/j-template" id="tpl_agent_rank_edit">
        <div>
            <div class="formitems">
                <label class="fi-name">等级名称：</label>
                <div class="form-controls">
                    <input type="text" name="title" class="input mini" value="<%= title %>">
                    <span class="fi-help-text"></span>
                </div>
            </div>
            <div class="formitems">
                <label class="fi-name">等级权重：</label>
                <div class="form-controls">
                    <input type="text" name="agent_level" class="input mini" value="<%= agent_level %>">
                    <span class="fi-help-text">分销等级权重，值越大越重要</span>
                </div>
            </div>
            
            <div class="formitems">
                <label class="fi-name">升到此等级奖励金额：</label>
                <div class="form-controls">
                    <input type="text" name="reward_money" class="input mini" value="<%= reward_money %>">
                    <span class="fi-help-text">发放到会员的账户余额</span>
                </div>
            </div>
            <div class="formitems">
                <label class="fi-name">升到此等级奖励积分：</label>
                <div class="form-controls">
                    <input type="text" name="reward_point" class="input mini" value="<%= reward_point %>">
                </div>
            </div>
            <div class="formitems">
                <label class="fi-name">每月提现次数：</label>
                <div class="form-controls">
                    <input type="text" name="draw_num" class="input mini" value="<%= draw_num %>">
                    <span class="fi-help-text">为空表示不限制</span>
                </div>
            </div>
            <div class="formitems">
                <label class="fi-name">每月最多提现佣金：</label>
                <div class="form-controls">
                    <input type="text" name="draw_money" class="input mini" value="<%= draw_money %>">
                    <span class="fi-help-text">该金额包含佣金提现到余额的金额</span>
                </div>
            </div>
        </div>
    </script>

<!--end front template  -->

<?php include "views/global_footer.php";?>


<!-- diy js start-->
<script src="<?php echo SITE_ROOT;?>statics/plugins/ueditor/diyUeditor-min.js"></script>
<script src="<?php echo SITE_ROOT;?>statics/plugins/uploadify/jquery.uploadify.min.js?ver=7377"></script>
<script src="<?php echo SITE_ROOT;?>statics/js/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo SITE_ROOT;?>statics/plugins/diy/diy-min.js"></script>
<script src="<?php echo SITE_ROOT;?>statics/plugins/colorpicker/colorpicker.js"></script><!-- diy js end -->
<script src="<?php echo SITE_ROOT;?>statics/js/dist/User/agent_rank.js"></script>

</body>
</html>
<!-- 20170105 -->
