
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- 满足有些用户在手机端访问的需要 -->

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <title>资金管理 - Bidcms开源电商</title>
    <!-- 线上环境 -->
        <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/css/component-min.css">    <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/plugins/jbox/jbox-min.css">
</head>
<body class="cp-bodybox">
<?php include "views/global_top.php";?>

<div class="container">
    <div class="inner clearfix">
        <div class="content-left fl" >
            <?php include "views/global_nav.php";?>
        </div>

        <div class="content-right">
            <h1 class="content-right-title">资金明细<a class="gicon-info-sign gicon_linkother" href="//www.wifenxiao.com/Index/help_show/lm/help/id/55.html" target="_blank"></a></h1>



    <div class="tablesWrap">
        <form action="" method="post" name="form1">
            <div class="tables-searchbox">
                <input type="text" class="input" name="mobile" value='' placeholder="昵称/手机号/会员ID">
                <input type="text" class="input" name="alipay_account" value='' placeholder="帐号">
                <input type="text" autocomplete="off" name="start_time" value='' placeholder="申请日期" class="input Wdate" onclick="WdatePicker({ dateFmt:'yyyy-MM-dd H:mm:ss'})">
                <span class="mgr5">至</span>
                <input type="text" autocomplete="off" name="end_time" value='' placeholder="申请日期" class="input Wdate" onclick="WdatePicker({ dateFmt:'yyyy-MM-dd H:mm:ss'})">
                <button class="btn btn-primary J_search"><i class="gicon-search white"></i>查询</button>
                            </div>
        </form>
        <!-- end tables-searchbox -->
        <input type="hidden" name="withdraw_proportion" value="">
        <input type="hidden" name="withdraw_balance_proportion" value="">
        <table class="wxtables">
         	<colgroup>
               <col width="10%">
                <col width="10%">
                <col width="15%">
				<col width="15%">
                <col width="20%">
                <col width="15%">
                <col width="15%">
            </colgroup>
            <thead>
            <tr>
				<td>操作类型</td>
                <td>昵称</td>
                <td>备注</td>
                <td>申请金额<br/>（元）</td>
                <td>提现收款信息</td>
                <td>申请时间</td>
                <td>操作</td>
            </tr>
            </thead>
            <tbody>
			<?php if($list['data']){?>
			<?php foreach($list['data'] as $k=>$v){
			$uinfo=json_decode($v['info']);
			?>
				<tr>
				<td><?php echo $v['type'];?></td>
                <td><?php echo $v['username'];?>(<?php echo $v['uid'];?>)</td>
				<td><?php echo $v['content'];?></td>
                <td><?php echo $v['amount'];?></td>
                <td>
				<?php if(substr($v['type'],0,4)=='CASH'){?>
				<?php echo $uinfo->type;?> <?php echo $uinfo->alipay_account;?> <?php echo $uinfo->name;?>
				<?php }?>
				</td>
                
                <td><?php echo date('Y-m-d H:i:s',$v['updatetime']);?><?php if($v['trade_time']){?><br/><?php echo date('Y-m-d H:i:s',$v['trade_time']);?><?php }?></td>
				<td>
					<?php if($v['type']=='CASHREJECT'){?>
					<strong style="color:#ff0000;">申请已驳回</strong>
					<?php } elseif($v['type']=='CASHAUDIT'){?>
					<a href="javascript:;" data-id="<?php echo $v['id'];?>" data-money="<?php echo $v['amount'];?>" data-account="<?php echo $uinfo->alipay_account;?>" data-name="<?php echo $uinfo->name;?>" data-time="<?php echo date('Y-m-d H:i:s',$v['updatetime']);?>" data-paymoney="<?php echo $v['pay_amount'];?>" data-redpack="1" class="btn btn-success j-pay-record">提现发放</a>
					<?php } elseif($v['type']=='CASHFREEZE'){?>
					<a href="javascript:;" data-id="<?php echo $v['id'];?>" data-money="<?php echo $v['amount'];?>" data-account="<?php echo $uinfo->alipay_account;?>" data-name="<?php echo $uinfo->name;?>" data-time="<?php echo date('Y-m-d H:i:s',$v['updatetime']);?>" data-moneytype="<?php echo $uinfo->type;?>" data-redpack="0" class="btn btn-primary j-pay-audit">审核通过</a>
					<a href="javascript:;" data-id="<?php echo $v['id'];?>" class="btn btn-danger j-reject">申请驳回</a>
					<?php }?>
				</td>
				</tr>
			<?php }?>
			<?php } else {?>
            <tr><td colspan="8">暂无信息</td></tr>
			<?php }?>
            </tbody>
        </table>
        <!-- end wxtables -->
		<div class="tables-btmctrl clearfix">
            <div class="mgt10 fl">
                
            </div>
            <div class="mgt10 fr">
                <div class="paginate">
                <?php echo $pageinfo;?>
                </div>
            </div>
        </div>
        <!-- end tables-btmctrl -->
    </div>




        </div>
        <!-- end content-right -->

        <a href="javascript:;" class="btn-leftMenuFold" id="j-btn-leftMenuFold" ></a>
    </div>
</div>
<!-- end container -->
<?php include "views/global_footer.php";?>
<!--gonggao-->


<script type="text/j-template" id="tpl_apply_list_pay_record">
<div>
    <div class="formitems inline">
        <label class="fi-name">申请日期：</label>
        <div class="form-controls pdt3"><%= time %></div>
    </div>
    <div class="formitems inline">
        <label class="fi-name">申请金额：</label>
        <div class="form-controls pdt3"><%= money %></div>
    </div>
    <div class="formitems inline">
        <label class="fi-name">实际支付金额：</label>
        <div class="form-controls pdt3"><%= pay_money %></div>
    </div>
    <div class="formitems inline">
        <label class="fi-name">收款帐号：</label>
        <div class="form-controls pdt3"><%= account %></div>
    </div>
    <div class="formitems inline">
        <label class="fi-name">收款人：</label>
        <div class="form-controls pdt3"><%= name %></div>
    </div>

    <div class="formitems inline">
        <label class="fi-name"><span class="colorRed">*</span>流水号：</label>
        <div class="form-controls">
            <input type="text" name="running_number" value="<%= number %>" class="input large">
        </div>
    </div>
    <div class="formitems inline">
        <label class="fi-name">支付日期：</label>
        <div class="form-controls pdt3">
            <input type="text" autocomplete="off" name="trade_time" value="2017-01-25 14:54:34" placeholder="支付日期" class="input Wdate" onclick="WdatePicker({ dateFmt:'yyyy-MM-dd H:mm:ss'})">
        </div>
    </div>
    <% if (redpack == 1) { %>
    <div class="formitems inline">
        <label class="fi-name"><span class="colorRed">*</span>以微信红包发放：</label>
        <div class="form-controls" style="padding-top:5px;">
            <input type="radio" name="is_red_pack" value="0" checked>否&nbsp;&nbsp;
            <input type="radio" name="is_red_pack" value="1">是
            <span class="fi-help-text">红包金额介于[1.00元，200.00元]之间</span>
        </div>
    </div>
    <% } %>
    <div class="formitems inline">
        <label class="fi-name"></label>
        <div class="form-controls" style="padding-top:5px;">
            <span class="fi-help-text colorRed">*批量转账会有延迟，请与实际到账，核对无误后再发放。</span>
        </div>
    </div>
    <div class="formitems inline">
        <div class="form-controls radio-group mgl20">
            <label>
                <input type="checkbox" class="checkbox table-ckbs" name="is_check" value="1">
                我已经确认对账，正确无误
            </label>
        </div>
    </div>
</div>
</script>

<script type="text/j-template" id="tpl_apply_list_pay_audit">
        <div>
            <div class="formitems inline">
                <label class="fi-name">申请日期：</label>
                <div class="form-controls pdt3"><%= time %></div>
            </div>
            <div class="formitems inline">
                <label class="fi-name">申请金额：</label>
                <div class="form-controls pdt3">
                    <%= money %>
                </div>
            </div>
            <div class="formitems inline">
                <label class="fi-name"><span class="colorRed">*</span>实际支付金额：</label>
                <div class="form-controls">
                    <input type="text" name="pay_money" value="<%= act_money %>" class="input">
                    <span class="fi-help-text"></span>
                </div>
            </div>
            <div class="formitems inline">
                <label class="fi-name">收款帐号：</label>
                <div class="form-controls pdt3"><%= account %></div>
            </div>
            <div class="formitems inline">
                <label class="fi-name">收款人：</label>
                <div class="form-controls pdt3"><%= name %></div>
            </div>
        </div>
    </script>

<script type="text/j-template" id="tpl_apply_list_pay_one">
        <div>
            <div class="formitems inline">
                <label class="fi-name">本次总打款：</label>
                <div class="form-controls pdt3"><%= money %></div>
            </div>
            <div class="formitems inline">
                <label class="fi-name">总计收款人数：</label>
                <div class="form-controls pdt3"><%= num %></div>
            </div>
            <p>&nbsp;</p>
            <div class="formitems inline">
                <label class="fi-name" style="width:60px;color:red;">注：</label>
                <div class="form-controls pdt3" style="margin-left: 60px; color:red;">
                    <% if(type == 2){ %>
                    <p>1:给同一个实名用户付款，单笔单日限额2W/2W</p>
                    <p>2:给同一个非实名用户付款，单笔单日限额2000/2000</p>
                    <p>3:一个商户同一日付款总额限额100W</p>
                    <p>4:每次付款后需要等待10分钟方能再次提交付款</p>
                    <% }else{ %>
                    <p>1:打款后需要5至10分钟后到帐</p>
                    <p>2:每次付款最多付给1000个收款者</p>
                    <p>3:单笔金额小于50万</p>
                    <p>4:每次付款后需要等待10分钟方能再次提交付款</p>
                    <% } %>
                </div>
            </div>
            <div class="formitems inline">
                <div class="radio-group mgl20">
                    <label>
                        <input type="checkbox" class="checkbox table-ckbs" name="is_check" value="1">
                        我已经确认对账，正确无误
                    </label>
                </div>
            </div>
        </div>
    </script>

<script type="text/j-template" id="tpl_apply_list_reject">
	<div>
		<div class="formitems inline">
			<label class="fi-name">驳回理由：</label>
			<div class="form-controls pdt3">
				<textarea name="reason" id="" class="textarea small"></textarea>
			</div>
		</div>
	</div>
</script>

<script type="text/j-template" id="tpl_textTips">
        <div class="formitems mgt10">
            <div><%= content %></div>
            <div class="radio-group">
                <span class="fi-help-text colorRed">*批量转账会有延迟，请与实际到账，核对无误后再发放。</span>
                <label><input type="checkbox" class="checkbox table-ckbs" name="is_check" value="1">我已经确认对账，正确无误</label>
            </div>
        </div>
    </script>


<!--end front template  -->



<script src="<?php echo SITE_ROOT;?>statics/plugins/My97DatePicker/WdatePicker.js"></script>


</body>
</html>
<!-- 20170105 -->
