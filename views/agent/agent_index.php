
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- 满足有些用户在手机端访问的需要 -->

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <title>分销商管理 - Bidcms开源电商</title>
    <!-- 线上环境 -->
        <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/css/component-min.css">    <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/plugins/jbox/jbox-min.css">

    <style>
    .table-searchbox-v2 .row .col .tbs-txt{width: 100px;}
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
            <h1 class="content-right-title">分销商管理<a class="gicon-info-sign gicon_linkother" href="//www.wifenxiao.com/Index/help_show/lm/help/id/51.html" target="_blank"></a></h1>
			<div class="mgt10 alert alert-info disable-del">目前拥有 <span style="font-size:16px;"><?php echo $list['page'];?></span> 名分销商。</div>

			<div class="tablesWrap">
				<form action="" method="get" name="form1">
					<div class="table-searchbox-v2 mgb10">
						<div class="row clearfix">
							<div class="col">
								<span class="tbs-txt">姓名：</span>
								<input type="text" class="input" name="name" value="" placeholder="姓名/ID/手机/昵称">
							</div>
							<div class="col">
								<span class="tbs-txt">所属等级：</span>
								<select name="agent_rank_id" class="select">
									<option value="-1" selected>所有等级</option>
									<?php foreach($agent_rank as $k=>$v){?>
									  <option value="<?php echo $v['id'];?>"><?php echo $v['title'];?></option>
									<?php }?>
								</select>
							</div>
							<div class="col">
								<span class="tbs-txt">排序：</span>
								<select name="order" class="select">
									<option value="－1">选择排序</option>
									<option value="1" >下级人数排序</option>
									<option value="2" >订单笔数排序</option>
									<option value="3" >总消费金额排序</option>
									</foreach>
								</select>
							</div>
						</div>
						<div class="row clearfix">
							<div class="col">
								<span class="tbs-txt">申请时间：</span>
								<input type="text" autocomplete="off" name="start_time" value="" placeholder="开始时间" class="input mini Wdate" onclick="WdatePicker({ dateFmt:'yyyy-MM-dd'})">
								<input type="text" autocomplete="off" name="end_time" value="" placeholder="结束时间" class="input mini Wdate" onclick="WdatePicker({ dateFmt:'yyyy-MM-dd'})">

							</div>
							<div class="col">
							<span class="tbs-txt" >到期时间：</span>
								<input type="text" autocomplete="off" name="expire_time_start" value="" placeholder="开始时间" class="input mini Wdate" onclick="WdatePicker({ dateFmt:'yyyy-MM-dd'})">
								<input type="text" autocomplete="off" name="expire_time_end" value="" placeholder="结束时间" class="input mini Wdate" onclick="WdatePicker({ dateFmt:'yyyy-MM-dd'})">
							</div>

							<div class="col">
								<span class="tbs-txt">分销商时间：</span>
								<input type="text" autocomplete="off" name="agent_time_start" value="" placeholder="开始时间" class="input mini Wdate" onclick="WdatePicker({ dateFmt:'yyyy-MM-dd'})">
								<input type="text" autocomplete="off" name="agent_time_end" value="" placeholder="结束时间" class="input mini Wdate" onclick="WdatePicker({ dateFmt:'yyyy-MM-dd'})">
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

				<!-- end tables-searchbox -->
				<!-- end tables-searchbox -->
				<table class="wxtables">
					  <colgroup>
						  <col width="7%">
						  <col width="15%">
						  <col width="15%">
						  <col width="25%">
						  <col width="35%">
					  </colgroup>
					  <thead>
						  <tr>
							<td colspan="2">分销商</td>
							<td>统计</td>
							<td>时间</td>
							<td>操作</td>
						  </tr>
					  </thead>
					  <tbody>
						<?php foreach($list['data'] as $v){?>
						<tr>
							  <td>
								  <img src="<?php echo !empty($v['headimgurl'])?$v['headimgurl']:'/statics/images/yhtx.jpg';?>" alt="" width="60" height="60">
							  </td>
							  <td>
								  <p></p>
								  <p><?php echo $v['username'];?> (<?php echo $v['id'];?>)</p>
								  <p>等级：<span id="rank<?php echo $v['id'];?>"><?php echo $v['agent_level'];?></span></p>
								  <p>注册时间：<?php echo date('Y-m-d',$v['updatetime']);?></p>
							  </td>
							  <td>
								  <?php if(isset($amounts[$v['customer_id']])){?>
								  <p>消费: ¥<?php echo $amounts[$v['customer_id']]['buy_amount'];?></p>
								  <p>余额: ¥<?php echo $amounts[$v['customer_id']]['amount'];?></p>
								  <p>积分: <?php echo $amounts[$v['customer_id']]['point'];?></p>
								  <?php } else {?>
								  <p>消费: ¥0.00</p>
								  <p>余额: ¥0.00</p>
								  <p>积分: 0</p>
								  <?php }?>
							  </td>
							  <td>
								<p>邀请数: <?php echo $v['users'];?></p>
								<p>成为分销商时间：<?php echo date('Y-m-d',$v['reviewed_time']);?></p>
								<p>分销商到期：--</p>
							  </td>
							  <td>
							  <a href="javascript:;"  data-id="<?php echo $v['id'];?>" data-name="<?php echo $v['username'];?>" data-mobile="<?php echo $v['mobile'];?>" data-email="<?php echo $v['email'];?>" data-remark="<?php echo $v['remark'];?>"  class="btn btn-mini btn-primary j-edit">编辑</a>
							  <a href="javascript:;" class="btn btn-mini btn-danger j-del" data-id="<?php echo $v['id'];?>" >删除</a>
							  <a href="javascript:;" class="btn btn-mini btn-primary j-agentLevel" data-id="<?php echo $v['id'];?>" data-rank="<?php echo $v['agent_level'];?>" data-name="<?php echo $v['username'];?>">修改等级</a>
							  <a href="javascript:;" class="btn btn-mini btn-warning j-gavePoint" data-user_id="<?php echo $v['id'];?>" data-id="<?php echo $v['id'];?>" data-name="<?php echo $v['username'];?>" data-point="<?php echo $v['point'];?>">调整积分</a><br/>

							  <a href="javascript:;" class="btn btn-mini btn-warning j-balance" data-id="<?php echo $v['id'];?>" data-name="<?php echo $v['username'];?>" data-balance="<?php echo $v['amount'];?>">调整余额</a>
							  <a href="javascript:;" class="btn btn-mini btn-success j-redPack" data-user_id="<?php echo $v['id'];?>"  data-name="<?php echo $v['username'];?>">发红包</a>

							  <a href="javascript:;" class="btn btn-mini btn-success j-agent_time" data-id="<?php echo $v['id'];?>" data-start_time="<?php echo date('Y-m-d',$v['reviewed_time']);?>" data-end_time="<?php echo date('Y-m-d',$v['end_time']);?>">设置到期时间</a>

							  </td>
						  </tr>
						<?php }?>
						</tbody>
				  </table>
				<!-- end wxtables -->
				<div class="tables-btmctrl clearfix">
					<div class="mgb10 fl">
					</div>
					<div class="mgt10 fr">
						<div class="paginate">
						  <?php echo $pageinfo;?>
						</div>
						<!-- end paginate -->
					</div>
				</div>	    <!-- end tables-btmctrl -->
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


    <!-- end tpl_user_lists_setlevel -->

    <script type="text/j-template" id="tpl_user_lists_gavePoint">
        <div>
            <div class="formitems inline">
                <label class="fi-name">分销商昵称：</label>
                <div class="form-controls pdt3"><%= name %></div>
            </div>
            <div class="formitems inline">
                <label class="fi-name">当前积分：</label>
                <div class="form-controls pdt3"><%= now_point %></div>
            </div>
            <div class="formitems inline">
                <label class="fi-name"><span class="colorRed">*</span>增加或减少积分：</label>
                <div class="form-controls">
                    <input type="text" name="point" class="input mini">
                    <span>分</span>
                    <span class="fi-help-text"></span>
                </div>
            </div>
            <div class="formitems inline">
                <label class="fi-name">备注：</label>
                <div class="form-controls">
                    <textarea name="remark" class="textarea" style="width:270px;height:120px;"></textarea>
                </div>
            </div>
        </div>
    </script>
    <!-- end tpl_user_lists_gavePoint -->

    <script type="text/j-template" id="tpl_user_lists_redPack">
        <div>
            <div class="formitems inline">
                <label class="fi-name">分销商昵称：</label>
                <div class="form-controls pdt3"><%= name %></div>
            </div>
            <div class="formitems inline">
                <label class="fi-name"><span class="colorRed">*</span>红包金额：</label>
                <div class="form-controls">
                    <input type="text" name="total_amount" class="input mini">
                    <span>元</span>
                    <span class="fi-help-text">红包金额介于[1.00元，200.00元]之间</span>
                </div>
            </div>
            <div class="formitems inline">
                <label class="fi-name"><span class="colorRed">*</span>祝福语：</label>
                <div class="form-controls">
                    <input name="wishing" class="input large">
                    <span class="fi-help-text"></span>
                </div>
            </div>
        </div>
    </script>
    <!-- end tpl_user_lists_redPack -->

    <script type="text/j-template" id="tpl_user_detail_modify">
        <div>
            <div class="formitems">
                <label class="fi-name">分销商姓名：</label>
                <div class="form-controls">
                    <input type="text" name="name" class="input mini" value="<%= name %>">
                </div>
            </div>
            <div class="formitems">
                <label class="fi-name">手机号：</label>
                <div class="form-controls">
                    <input type="text" name="mobile" class="input mini" value="<%= mobile %>">
                </div>
            </div>
            <div class="formitems">
                <label class="fi-name">密码：</label>
                <div class="form-controls">
                    <input type="password" name="password" class="input mini">
                </div>
            </div>
            <div class="formitems">
                <label class="fi-name">邮箱：</label>
                <div class="form-controls">
                    <input type="text" name="email" class="input" value="<%= email %>">
                </div>
            </div>
        </div>
    </script>
    <!-- end tpl_user_rank_modify -->
    <script type="text/j-template" id="tpl_agent_lists_setlevel">
        <div>
            <div class="formitems inline">
                <label class="fi-name">分销商昵称：</label>
                <div class="form-controls pdt3">
                    <%=name %>
                </div>
            </div>
            <div class="formitems inline">
                <label class="fi-name">分销商等级：</label>
                <div class="form-controls">
                    <select name="agent_rank_id" class="select">
                    <?php foreach($agent_rank as $k=>$v){?>
                      <option value="<?php echo $v['id'];?>"><?php echo $v['title'];?></option>
                    <?php }?>
                    </select>
                </div>
            </div>
        </div>
    </script>

    <script type="text/j-template" id="tpl_agent_lists_alllevel">
        <div>
            <div class="formitems inline">
                <label class="fi-name">分销商等级：</label>
                <div class="form-controls">
                    <select name="agent_rank_id" class="select">
                    <?php foreach($agent_rank as $k=>$v){?>
                      <option value="<?php echo $v['id'];?>"><?php echo $v['title'];?></option>
                    <?php }?>
                    </select>
                </div>
            </div>
        </div>
    </script>

    <script type="text/j-template" id="tpl_user_lists_balance">
        <div>
            <div class="formitems inline">
                <label class="fi-name">分销商昵称：</label>
                <div class="form-controls pdt3"><%= name %></div>
            </div>
            <div class="formitems inline">
                <label class="fi-name">当前余额：</label>
                <div class="form-controls pdt3"><%= balance %></div>
            </div>
            <div class="formitems inline">
                <label class="fi-name"><span class="colorRed">*</span>增加或减少余额：</label>
                <div class="form-controls">
                    <input type="text" name="payment" class="input mini">
                    <span class="fi-help-text"></span>
                </div>
            </div>
            <div class="formitems inline">
                <label class="fi-name">备注：</label>
                <div class="form-controls">
                    <textarea name="balance_remark" class="textarea" style="width:270px;height:120px;"></textarea>
                </div>
            </div>
        </div>
    </script>


    <script type="text/j-template" id="tpl_user_lists_group">
        <div>
            <div class="formitems inline">
                <label class="fi-name">分组选择：</label>
                <div class="form-controls">
                    <select name="user_group_id" class="select">
                    </select>
                </div>
            </div>
        </div>
    </script>

    <script type="text/j-template" id="tpl_agent_time">
        <div>
            <div class="formitems">
                <label class="fi-name">开始时间：</label>
                <div class="form-controls">
                    <input type="text" placeholder="到期时间" class="input Wdate"  name="start_time" value="<%= starttime %>" onclick='WdatePicker({ dateFmt:"yyyy-MM-dd"})'>
                </div>
            </div>
			<div class="formitems">
                <label class="fi-name">到期时间：</label>
                <div class="form-controls">
                    <input type="text" placeholder="到期时间" class="input Wdate"  name="end_time" value="<%= endtime %>" onclick='WdatePicker({ dateFmt:"yyyy-MM-dd"})'>
                </div>
            </div>
        </div>
    </script>

    <script type="text/j-template" id="tpl_user_set_agent3">
        <div>
            <div class="formitems">
                确定设为门店？
            </div>
        </div>
    </script>

    <script type="text/j-template" id="tpl_user_set_agent2">
        <div>
            <div class="formitems">
                确定设为员工？
            </div>
        </div>
    </script>

<!--end front template  -->
<?php include "views/global_footer.php";?>

<script src="<?php echo SITE_ROOT;?>statics/plugins/My97DatePicker/WdatePicker.js"></script>
<script src="<?php echo SITE_ROOT;?>statics/js/dist/User/lists.js"></script>





</body>
</html>
<!-- 20170105 -->
