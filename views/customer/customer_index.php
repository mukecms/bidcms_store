
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- 满足有些用户在手机端访问的需要 -->

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <title>会员列表 - Bidcms开源电商</title>
    <!-- 线上环境 -->
        <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/css/component-min.css">    <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/plugins/jbox/jbox-min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo SITE_ROOT;?>statics/modulesCss/progress.css">
    <style>
    .select.mini.new{ width:140px;}
    .slect_diy{
        display: inline-block;
        width: 80px;
        height: 30px;
    }
    .slect_diy select{
        width:80px;
        padding: 4px 0px;
        border: 1px solid #ccc;
        line-height: normal;
        font-size: 12px;
        vertical-align: middle;
        color: #000;
        border-radius: 4px;
        background: #fff;
    }
    .slect_province{
        padding: 4px 5px;
        border: 1px solid #ccc;
        line-height: normal;
        font-size: 12px;
        vertical-align: middle;
        color: #000;
        border-radius: 4px;
        background: #fff;    }
    </style>

</head>
<body class="cp-bodybox">
<?php include "views/global_top.php";?>

<div class="container">
    <div class="inner clearfix">
        <div class="content-left fl">
        <?php include "views/global_nav.php";?>
        </div>

        <div class="content-right">
            <h1 class="content-right-title">会员列表<a class="gicon-info-sign gicon_linkother" href="//www.wifenxiao.com/Index/help_show/lm/help/id/52.html" target="_blank"></a></h1>


    <div class="alert alert-info disable-del">目前拥有 <span style="font-size:16px;"><?php echo $list['page']['count'];?></span> 名会员。</div>    <input type="hidden" id="user_list_code" value="12654">
    <div class="tablesWrap">
        <form action="" method="get" name="form1">
            <div class="table-searchbox-v2 mgb10">
                <div class="row clearfix">
                    <div class="col">
                        <span class="tbs-txt">姓名：</span>
                        <input type="text" class="input" name="name" value="" placeholder="姓名/ID/昵称/手机">
                    </div>

                    <div class="col">
                        <span class="tbs-txt">所属等级：</span>
                        <select name="rank_id" class="select">
                            <option value="-1" selected>所有等级</option>
							<?php foreach($customer_rank as $k=>$v){?>
							  <option value="<?php echo $v['id'];?>"><?php echo $v['title'];?></option>
							<?php }?>
						</select>
                    </div>

                    <div class="col">
                        <span class="tbs-txt">会员状态：</span>
                        <select name="is_user_del" class="select">
                            <option value="0" selected>正常会员</option>
                            <option value="1" >已删除会员
                            </option>
                        </select>
                    </div>
                </div>
                <div class="row clearfix">
                  <div class="col">
                      <span class="tbs-txt">所属省市：</span>
                      <select name="province" class="J_province slect_province select mini">
                          <option value="0" selected>所有省份</option>
                          <option value="110000" >北京市</option><option value="120000" >天津市</option><option value="130000" >河北省</option><option value="140000" >山西省</option><option value="150000" >内蒙古自治区</option><option value="210000" >辽宁省</option><option value="220000" >吉林省</option><option value="230000" >黑龙江省</option><option value="310000" >上海市</option><option value="320000" >江苏省</option><option value="330000" >浙江省</option><option value="340000" >安徽省</option><option value="350000" >福建省</option><option value="360000" >江西省</option><option value="370000" >山东省</option><option value="410000" >河南省</option><option value="420000" >湖北省</option><option value="430000" >湖南省</option><option value="440000" >广东省</option><option value="450000" >广西壮族自治区</option><option value="460000" >海南省</option><option value="500000" >重庆市</option><option value="510000" >四川省</option><option value="520000" >贵州省</option><option value="530000" >云南省</option><option value="540000" >西藏自治区</option><option value="610000" >陕西省</option><option value="620000" >甘肃省</option><option value="630000" >青海省</option><option value="640000" >宁夏回族自治区</option><option value="650000" >新疆维吾尔自治区</option><option value="710000" >台湾</option><option value="810000" >香港特别行政区</option><option value="820000" >澳门特别行政区</option><option value="990000" >海外</option>                        </select>
                      <div class="J-city slect_diy">
                          <select name="city_id" class="select mini s_city">
                              <option value="0" selected>所有城市</option>
                          </select>
                          <span class="fi-help-text"></span>
                      </div>
                  </div>
                    <div class="col">
                        <span class="tbs-txt">排序：</span>
                        <select name="order" class="select">
                            <option value="-1">--请选择--</option>
                            <option value="2" >总积分排序</option>
                            <option value="1" >总消费金额排序</option>
                            </foreach>
                        </select>
                    </div>
                    <div class="col">
                        <span class="tbs-txt">注册时间：</span>
                        <input type="text" autocomplete="off" name="start_time" value="" placeholder="开始时间"
                           class="input mini Wdate" onclick="WdatePicker({ dateFmt:'yyyy-MM-dd'})">
                        <input type="text" autocomplete="off" name="end_time" value="" placeholder="结束时间"
                           class="input mini Wdate" onclick="WdatePicker({ dateFmt:'yyyy-MM-dd'})">
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col">
                        <span class="tbs-txt"></span>
                        <button class="btn btn-primary" style="vertical-align:-2px;"><i class="gicon-search white"></i>查询</button>
                    </div>
                </div>
            </div>
        </form>

	    <!-- end tables-searchbox -->
	    <table class="wxtables">
            <colgroup>
                <col width="5%">
				<col width="15%">
				<col width="10%">
                <col width="10%">
				<col width="10%">
                <col width="40%">
            </colgroup>
            <thead>
                <tr>
                    <td colspan="2">会员</td>
					<td>注册时间</td>
                    <td colspan="2">统计</td>
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
                        <p> <?php echo $v['username'];?> (<?php echo $v['id'];?>)</p>
                        <p>等级：<?php echo $v['level'];?></p>
                    </td>
					<td>
                        <?php echo date('Y-m-d',$v['updatetime']);?>
					</td>
					<?php if(isset($amounts[$v['id']])){?>
                    <td>
                        <p>消费: ¥<?php echo $amounts[$v['id']]['buy_amount'];?></p>
                        <p>余额: ¥<?php echo $amounts[$v['id']]['amount'];?></p>
                    </td>
					<td>
                        <p>积分: <?php echo $amounts[$v['id']]['point'];?></p>
						<p>消息: <?php echo $amounts[$v['id']]['mail'];?></p>
                    </td>
					<?php } else {?>
					 <td>
                        <p>消费: ¥0.00</p>
                        <p>余额: ¥0.00</p>
                    </td>
					<td>
                        <p>积分: 0</p>
						<p>消息: 0</p>
                    </td>
					<?php }?>
                    <td>
                    <a href="javascript:;"  data-id="<?php echo $v['id'];?>" data-name="<?php echo $v['username'];?>" data-mobile="<?php echo $v['mobile'];?>" data-email="<?php echo $v['email'];?>" data-remark="<?php echo $v['remark'];?>"  class="btn btn-mini btn-primary j-edit">编辑</a>
                    <a href="javascript:;" class="btn btn-mini btn-primary j-setLevel" data-id="<?php echo $v['id'];?>" data-rank="<?php echo $v['level'];?>" data-name="<?php echo $v['username'];?>">修改等级</a>
					<a href="javascript:;" class="btn btn-mini btn-warning j-balance" data-id="<?php echo $v['id'];?>" data-name="<?php echo $v['username'];?>" data-balance="<?php echo $amounts[$v['id']]['amount'];?>">调整余额</a>
					<a href="javascript:;" class="btn btn-mini btn-danger j-del" data-id="<?php echo $v['id'];?>" >删除</a>
                    <a href="javascript:;" class="btn btn-mini btn-warning j-gavePoint" data-user_id="<?php echo $v['id'];?>" data-id="<?php echo $v['id'];?>" data-name="<?php echo $v['username'];?>" data-point="<?php echo $amounts[$v['id']]['point'];?>">调整积分</a>
					<br/>
					<a href="javascript:;" class="btn btn-mini btn-success j-redPack" data-user_id="<?php echo $v['id'];?>"  data-name="<?php echo $v['username'];?>">发红包</a>
                    
                    <a href="javascript:;" class="btn btn-mini btn-primary j-sendUmp" data-user_id="<?php echo $v['id'];?>"  data-name="<?php echo $v['username'];?>">发优惠券</a>
                    <a href="javascript:;" class="btn btn-mini btn-warning j-resetPassword" data-id="<?php echo $v['id'];?>" >重置支付密码</a>
                    <a href="javascript:;" class="btn btn-mini btn-success j-sendLetter" data-id="<?php echo $v['id'];?>" >发站内信</a>
                    </td>
                </tr>
              <?php }?>
              </tbody>
        </table>
	    <!-- end wxtables -->
        <div class="tables-btmctrl clearfix">
	    	<div class="mgb10">
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
<div class="fixedBar">
    <ul>
        <li class="shopManager8"><a href="javascript:;" data-target="#shop_8">会员管理</a></li>        </ul>
    <a href="javascript:;" class="fixedBar-btn" id="j-fixedBar-btn"></a>
</div><a href="#" id="j-gotop" class="gotop" title="回到顶部"></a>
<!-- end gotop -->


<script type="text/j-template" id="tpl_user_lists_setlevel">
<div>
	<div class="formitems inline">
		<label class="fi-name">会员昵称：</label>
		<div class="form-controls pdt3"><%= name %></div>
	</div>
	<div class="formitems inline">
		<label class="fi-name">会员等级：</label>
		<div class="form-controls">
			<select name="rank" class="select">
                <?php foreach($customer_rank as $k=>$v){?>
				  <option value="<?php echo $v['id'];?>"><?php echo $v['title'];?></option>
				<?php }?>
            </select>
		</div>
	</div>
</div>
</script>
<!-- end tpl_user_lists_setlevel -->
<script type="text/j-template" id="tpl_user_lists_alllevel">
        <div>
            <div class="formitems inline">
                <label class="fi-name">会员等级：</label>
                <div class="form-controls">
                    <select name="rank" class="select">
                        <?php foreach($customer_rank as $k=>$v){?>
						  <option value="<?php echo $v['id'];?>"><?php echo $v['title'];?></option>
						<?php }?>
                    </select>
                </div>
            </div>
        </div>
    </script>
    <!-- end tpl_user_lists_setlevel -->
<script type="text/j-template" id="tpl_user_lists_gavePoint">
<div>
	<div class="formitems inline">
		<label class="fi-name">会员姓名：</label>
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

<script type="text/j-template" id="tpl_user_detail_modify">
    <div>
        <div class="formitems">
            <label class="fi-name">买家姓名：</label>
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
        <div class="formitems">
            <label class="fi-name">备注：</label>
            <div class="form-controls">
                <input type="text" name="user_remark" class="input" value="<%= user_remark %>">
            </div>
        </div>
    </div>
</script>


<!-- end tpl_user_rank_modify -->

<script type="text/j-template" id="tpl_user_lists_balance">
        <div>
            <div class="formitems inline">
                <label class="fi-name">会员姓名：</label>
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

<script type="text/j-template" id="tpl_user_lists_ump">
        <div>
            <div class="formitems inline">
                <label class="fi-name">会员等级：</label>
                <div class="form-controls">
                    <select name="rank_id" class="select">
                        <option value="0">请选择</option>
                        <?php foreach($customer_rank as $k=>$v){?>
						  <option value="<?php echo $v['id'];?>"><?php echo $v['title'];?></option>
						<?php }?>
                    </select>
                    <span class="fi-help-text">选择会员等级时会按会员等级发放，不选按选中会员发放</span>
                </div>
            </div>
            <div class="formitems inline">
                <label class="fi-name">选择优惠券：</label>
                <div class="form-controls">
                    <select name="coupon_id" class="select">
					<?php foreach($coupons as $k=>$v){?>
					<option value="<?php echo $v['id'];?>"><?php echo $v['title'];?></option>
					<?php }?>
                    </select>
                </div>
            </div>
            <div class="formitems inline">
                <label class="fi-name">数量：</label>
                <div class="form-controls">
                    <input type="text" name="coupon_num" class="input mini" value="1">
                    <span class="fi-help-text"></span>
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

<script type="text/j-template" id="tpl_user_lists_pwd">
    <div>
        <div class="formitems inline">
            <label class="fi-name">密码：</label>
            <div class="form-controls pdt3"><input name="password" class="input"></div>
        </div>
    </div>
</script>
    <!-- end tpl_user_lists_setlevel -->
<script type="text/j-template" id="tpl_user_send_letter">
    <div>
        <div class="formitems">
            <label class="fi-name">发送内容：</label>
            <div class="form-controls">
                <textarea name="content" id="" class="textarea small"></textarea>
            </div>
        </div>
    </div>
</script>

<script type="text/j-template" id="tpl_user_reborn_user">
    <div>
        <div class="formitems">
            确定批量恢复已删除会员？
        </div>
    </div>
</script>

<script type="text/j-template" id="tpl_user_deepdel_user">
        <div>
            <div class="formitems">
                确定批量彻底删除会员？
            </div>
        </div>
    </script>

<script type="text/j-template" id="tpl_user_lists_redPack">
        <div>
            <div class="formitems inline">
                <label class="fi-name">会员昵称：</label>
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
<script type="text/j-template" id="tpl_user_lists_Point">
    <div>
        <div class="formitems inline">
            <label class="fi-name"><span class="colorRed">*</span>增加或减少积分：</label>
            <div class="form-controls">
                <input type="text" name="point" class="input mini">
                <span>分</span>
                <span class="fi-help-text"></span>
            </div>
        </div>
        <div class="formitems inline">
            <label class="fi-name"><span class="colorRed">*</span>统一调整到：</label>
            <div class="form-controls">
                <input type="text" name="fix_point" class="input mini">
                <span>分</span>
                <span class="fi-help-text">设置统一调整后,增加或减少积分设置将无效</span>
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
<script type="text/j-template" id="tpl_user_lists_all_balance">
    <div>
        <div class="formitems inline">
            <label class="fi-name"><span class="colorRed">*</span>增加或减少余额：</label>
            <div class="form-controls">
                <input type="text" name="balance" class="input mini">
                <span></span>
                <span class="fi-help-text"></span>
            </div>
        </div>
        <div class="formitems inline">
            <label class="fi-name"><span class="colorRed">*</span>统一调整到：</label>
            <div class="form-controls">
                <input type="text" name="fix_balance" class="input mini">
                <span></span>
                <span class="fi-help-text">设置统一调整后,增加或减少余额设置将无效</span>
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

<!--end front template  -->

<?php include SYSTEM_PATH."/views/global_footer.php";?>

<script src="<?php echo SITE_ROOT;?>statics/plugins/My97DatePicker/WdatePicker.js"></script>
<script src="<?php echo SITE_ROOT;?>statics/js/dist/User/lists.js"></script>


</body>
</html>
<!-- 20170105 -->
