
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- 满足有些用户在手机端访问的需要 -->

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <title>会员业务 - Bidcms开源电商</title>
    <!-- 线上环境 -->
        <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/css/component-min.css">
		<link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/plugins/jbox/jbox-min.css">

	<link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/css/Statistics/charts.css">

</head>
<body class="cp-bodybox">
<?php include "views/global_top.php";?>

<div class="container">
    <div class="inner clearfix">
        <div class="content-left fl" >
                    <dl class="left-menu shop_0 sub_jytj">
                    <dt>
                        <i class="icon-menu jytj"></i>
                        <span id="shop_0" data-id="0">交易数据</span>
                    </dt>
                    <dd class="subshop_0 ">
                            <a href="/Statistics/order_chart" >订单统计</a>
                                                    </dd>                </dl><dl class="left-menu shop_0 sub_hytj">
                    <dt>
                        <i class="icon-menu hytj"></i>
                        <span id="shop_0" data-id="0">会员数据</span>
                    </dt>
                    <dd class="subshop_0 ">
                            <a href="/Statistics/user_chart" >会员分析</a>
                                                    </dd>                </dl><dl class="left-menu shop_0 sub_yxtj">
                    <dt>
                        <i class="icon-menu yxtj"></i>
                        <span id="shop_0" data-id="0">营销数据</span>
                    </dt>
                    <dd class="subshop_0 ">
                            <a href="/Statistics/point_chart" >积分统计</a>
                                                    </dd><dd class="subshop_1 ">
                            <a href="/Statistics/coupon_chart" >优惠券统计</a>
                                                    </dd>                </dl>        </div>
        <!-- end content-left -->

        <div class="content-right">
            <h1 class="content-right-title">会员业务<a class="gicon-info-sign gicon_linkother" href="javascript:;" target="_blank"></a></h1>


    <div class="tabs clearfix nochange">
		<a href="index.php?con=statistics&act=user_chart" class="tabs_a fl">会员增长</a>
        <a href="index.php?con=statistics&act=user_business_chart" class="active tabs_a fl">会员业务</a>
        <a href="index.php?con=statistics&act=user_attr_chart" class="tabs_a fl">会员属性</a>
    </div>

    <table class="wxtables data mgt20">
        <colgroup>
            <col width="25%">
            <col width="25%">
            <col width="25%">
            <col width="25%">
        </colgroup>
        <thead>
            <tr>
                <td colspan="4" class="left" style="font-size:14px;">业务会员实时统计</td>
            </tr>
        </thead>
        <tbody id="tBodyGetAgentOrder">
            <tr>
                <td>加载中...</td>
            </tr>
        </tbody>
    </table>

    <table class="wxtables data mgt20">
        <colgroup>
            <col width="25%">
            <col width="25%">
            <col width="25%">
            <col width="25%">
        </colgroup>
        <thead>
            <tr>
                <td colspan="4" class="left" style="font-size:14px;">往期业务会员统计</td>
            </tr>
        </thead>
        <tbody id="tBodyGetLastAgentDataOrder">
            <tr>
                <td>加载中...</td>
            </tr>
        </tbody>
    </table>

    <table class="wxtables data mgt20">
        <colgroup>
            <col width="14.28%">
            <col width="14.28%">
            <col width="14.28%">
            <col width="14.28%">
            <col width="14.28%">
            <col width="14.28%">
        </colgroup>
        <thead>
            <tr>
                <td colspan="6" class="left" style="font-size:14px;">佣金实时统计</td>
            </tr>
        </thead>
        <tbody id="tBodyGetUserCommission">
            <tr>
                <td>加载中...</td>
            </tr>
        </tbody>
    </table>

    <table class="wxtables data mgt20">
        <colgroup>
            <col width="25%">
            <col width="25%">
            <col width="25%">
            <col width="25%">
        </colgroup>
        <thead>
            <tr>
                <td colspan="4" class="left" style="font-size:14px;">往期佣金统计</td>
            </tr>
        </thead>
        <tbody id="tBodyGetLastUserCommission">
            <tr>
                <td>加载中...</td>
            </tr>
        </tbody>
    </table>

    <div class="chartWrap mgt40">
        <div class="chartTitle clearfix">
            <span class="c-text fl">购物会员统计<a class="gicon-info-sign gicon_linkother" href="javascript:;" target="_blank"></a></span>
            <div class="search-box">
               <div class="form-inline clearfix">
                    <div class="t-list fl">
                        <label class="tbs-txt" style="width:80px; font-weight:normal;">筛选日期：</label>
                        <input type="text" name="start_time" class="input mini Wdate" id="start_time" value="" autocomplete="off" class="Wdate" onclick="WdatePicker({ dateFmt:'yyyy-MM-dd'})">
                        <span class="fi-text">至</span>
                        <input type="text" name="end_time" class="input mini Wdate" id="end_time" value="" autocomplete="off" class="Wdate" onclick="WdatePicker({ dateFmt:'yyyy-MM-dd'})">
                    </div>
                    <div class="t-list fl">
                        <button class="btn btn-primary j-serch" type="button"><i class="gicon-search white"></i>查询</button>
                    </div>
                </div>
            </div>
            <div class="chartselect fr" id="Order">
                <ul id="orderdata" class="nav-tabs clearfix">
                    <li data-val="day" class="active">日</li>
                    <li data-val="week">周</li>
                    <li data-val="month">月</li>
                    <li data-val="quarter">季</li>
                    <li data-val="year">年</li>
                </ul>
            </div>
        </div>
        <div class="chartBox chartBox-bdr chartBox-fullcolor mgt5">
            <div class="cb-title">
                <h2>购物会员趋势图</h2>
            </div>
            <div class="cb-contain">
                <!-- <div class="cbc-live clearfix">
                    <div class="cbc-live-width cbc-live-org fl">
                        <span><b id="time_type_2">近30天</b>购物会员数（人）</span>
                        <strong id="gwhy_n">0</strong>
                    </div>
                </div> -->
                <div class="table-loading" id="loading_chart_gwhy">
                    <div class="progress">
                        <div class="progress-bar progress-bar-warning progress-bar-striped active" style="width: 100%;"></div>
                    </div>
                </div>
                <div id="chart_gwhy" class="mgt10 txtCenter j-chartPanel" style="display:none;width:920px; height:200px;"></div>
            </div>
        </div>
    </div>

    <div class="chartWrap mgt40">
        <div class="chartTitle clearfix">
            <span class="c-text fl">分销商业务人数和提现人数统计<a class="gicon-info-sign gicon_linkother" href="javascript:;" target="_blank"></a></span>
            <div class="search-box">
               <div class="form-inline clearfix">
                    <div class="t-list fl">
                        <label class="tbs-txt" style="width:80px; font-weight:normal;">筛选日期：</label>
                        <input type="text" name="start_time" class="input mini Wdate" id="start_time" value="" autocomplete="off" class="Wdate" onclick="WdatePicker({ dateFmt:'yyyy-MM-dd'})">
                        <span class="fi-text">至</span>
                        <input type="text" name="end_time" class="input mini Wdate" id="end_time" value="" autocomplete="off" class="Wdate" onclick="WdatePicker({ dateFmt:'yyyy-MM-dd'})">
                    </div>
                    <div class="t-list fl">
                        <button class="btn btn-primary j-serch" type="button"><i class="gicon-search white"></i>查询</button>
                    </div>
                </div>
            </div>
            <div class="chartselect fr" id="Order">
                <ul id="orderdata" class="nav-tabs clearfix">
                    <li data-val="day" class="active">日</li>
                    <li data-val="week">周</li>
                    <li data-val="month">月</li>
                    <li data-val="quarter">季</li>
                    <li data-val="year">年</li>
                </ul>
            </div>
        </div>
        <div class="chartBox chartBox-bdr chartBox-fullcolor mgt5">
            <div class="cb-title">
                <h2>分销商业务人数和提现人数趋势图</h2>
            </div>
            <div class="cb-contain">
                <div class="table-loading" id="loading_chart_fxyw">
                    <div class="progress">
                        <div class="progress-bar progress-bar-warning progress-bar-striped active" style="width: 100%;"></div>
                    </div>
                </div>
                <div id="chart_fxyw" class="mgt10 txtCenter j-chartPanel" style="display:none;width:920px; height:200px;"></div>
            </div>
        </div>
    </div>

    <div class="chartWrap mgt40">
        <div class="chartTitle clearfix">
            <span class="c-text fl">分销商业务佣金和提现金额统计<a class="gicon-info-sign gicon_linkother" href="javascript:;" target="_blank"></a></span>
            <div class="search-box">
               <div class="form-inline clearfix">
                    <div class="t-list fl">
                        <label class="tbs-txt" style="width:80px; font-weight:normal;">筛选日期：</label>
                        <input type="text" name="start_time" class="input mini Wdate" id="start_time" value="" autocomplete="off" class="Wdate" onclick="WdatePicker({ dateFmt:'yyyy-MM-dd'})">
                        <span class="fi-text">至</span>
                        <input type="text" name="end_time" class="input mini Wdate" id="end_time" value="" autocomplete="off" class="Wdate" onclick="WdatePicker({ dateFmt:'yyyy-MM-dd'})">
                    </div>
                    <div class="t-list fl">
                        <button class="btn btn-primary j-serch" type="button"><i class="gicon-search white"></i>查询</button>
                    </div>
                </div>
            </div>
            <div class="chartselect fr" id="Order">
                <ul id="orderdata" class="nav-tabs clearfix">
                    <li data-val="day" class="active">日</li>
                    <li data-val="week">周</li>
                    <li data-val="month">月</li>
                    <li data-val="quarter">季</li>
                    <li data-val="year">年</li>
                </ul>
            </div>
        </div>
        <div class="chartBox chartBox-bdr chartBox-fullcolor mgt5">
            <div class="cb-title">
                <h2>分销商业务佣金和提现金额趋势图</h2>
            </div>
            <div class="cb-contain">
                <div class="table-loading" id="loading_chart_fxtx">
                    <div class="progress">
                        <div class="progress-bar progress-bar-warning progress-bar-striped active" style="width: 100%;"></div>
                    </div>
                </div>
                <div id="chart_fxtx" class="mgt10 txtCenter j-chartPanel" style="display:none;width:920px; height:200px;"></div>
            </div>
        </div>
    </div>


    <div class="chartWrap mgt20">

    	<div class="clearfix mgt15">

            <div class="chartBox chartBox-bdr chartBox-fullcolor mgt5 per50 fr">
                <div class="cb-title">
                    <h2>购物会员数量饼状图</h2>
                </div>
                <div class="cb-contain txtCenter">
                    <div class="table-loading" id="loading_chart_buynum">
                        <div class="progress">
                            <div class="progress-bar progress-bar-warning progress-bar-striped active" style="width: 100%;"></div>
                        </div>
                    </div>
                    <div id="chart_buynum" class="mgt10" style="display:none;width:520px; height:420px; display:inline-block"></div>
                </div>
            </div>
            <div class="chartBox chartBox-bdr chartBox-fullcolor mgt5 per50 fl">
                <div class="cb-title">
                    <h2>重复购物会员数量饼状图</h2>
                </div>
                <div class="cb-contain txtCenter">
                    <div class="table-loading" id="loading_chart_cfgw">
                        <div class="progress">
                            <div class="progress-bar progress-bar-warning progress-bar-striped active" style="width: 100%;"></div>
                        </div>
                    </div>
                    <div id="chart_cfgw" class="mgt10" style="display:none;width:520px; height:420px; display:inline-block"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="chartWrap mgt15 clearfix">
        <div class="chartBox chartBox-bdr per50 fl">
            <div class="cb-title">
                <h2>会员积分排行榜</h2>
            </div>
            <div class="cb-contain" style="padding:0;" data-type="/Statistics/user_most_point_top">
                <div id="user_most_point_top">
                    加载中...
                </div>
            </div>
        </div>
        <div class="chartBox chartBox-bdr per50 fr">
            <div class="cb-title">
                <h2>会员余额排行榜</h2>
            </div>
            <div class="cb-contain" style="padding:0;" data-type="/Statistics/user_balance_top">
                <div id="user_balance_top">
                    加载中...
                </div>
            </div>
        </div>
    </div>

    <div class="chartWrap mgt15 clearfix">
        <div class="chartBox chartBox-bdr per50 fl">
            <div class="cb-title">
                <h2>分销商佣金总额排行榜</h2>
            </div>
            <div class="cb-contain" style="padding:0;" data-type="/Statistics/user_agent_commission_top">
                <div id="user_agent_commission_top">
                    加载中...
                </div>
            </div>
        </div>
        <div class="chartBox chartBox-bdr per50 fr">
            <div class="cb-title">
                <h2>分销商佣金余额排行榜</h2>
            </div>
            <div class="cb-contain" style="padding:0;" data-type="/Statistics/user_left_commission_top">
                <div id="user_left_commission_top">
                    加载中...
                </div>
            </div>
        </div>
    </div>

    <div class="chartWrap mgt15 clearfix">
        <div class="chartBox chartBox-bdr per50 fl">
            <div class="cb-title">
                <h2>购物笔数排行榜</h2>
            </div>
            <div class="cb-contain" style="padding:0;" data-type="/Statistics/user_most_buy_num_top">
                <div id="user_most_buy_num_top">
                    加载中...
                </div>
            </div>
        </div>
        <div class="chartBox chartBox-bdr per50 fr">
            <div class="cb-title">
                <h2>购物金额排行榜</h2>
            </div>
            <div class="cb-contain" style="padding:0;" data-type="/Statistics/user_most_buy_price_top">
                <div id="user_most_buy_price_top">
                    加载中...
                </div>
            </div>
        </div>
    </div>

    <div class="chartWrap mgt15 clearfix">
        <div class="chartBox chartBox-bdr per50 fl">
            <div class="cb-title">
                <h2>分销商佣金提现排行榜</h2>
            </div>
            <div class="cb-contain" style="padding:0;" data-type="/Statistics/user_tx_price_top">
                <div id="user_tx_price_top">
                    加载中...
                </div>
            </div>
        </div>
        <div class="chartBox chartBox-bdr per50 fr">
            <div class="cb-title">
                <h2>上月消费排行榜</h2>
            </div>
            <div class="cb-contain" style="padding:0;" data-type="/Statistics/user_consume_top">
                <div id="user_consume_top">
                    加载中...
                </div>
            </div>
        </div>
    </div>

        </div>
        <!-- end content-right -->

        <a href="javascript:;" class="btn-leftMenuFold" id="j-btn-leftMenuFold" ></a>
    </div>
</div>
<!-- end container -->

<!-- end footer -->
    <div class="fixedBar">
        <ul>
            <li class="shopManager0"><a href="javascript:;" data-target="#shop_0">交易数据</a></li><li class="shopManager0"><a href="javascript:;" data-target="#shop_0">会员数据</a></li><li class="shopManager0"><a href="javascript:;" data-target="#shop_0">营销数据</a></li>        </ul>
        <a href="javascript:;" class="fixedBar-btn" id="j-fixedBar-btn"></a>
    </div><a href="#" id="j-gotop" class="gotop" title="回到顶部"></a>
<!-- end gotop -->


<!--end front template  -->
<?php include "views/global_footer.php";?>

<script src="<?php echo SITE_ROOT;?>statics/plugins/My97DatePicker/WdatePicker.js"></script>
<script src="<?php echo SITE_ROOT;?>statics/plugins/Highcharts-4.0.3/highcharts.js?v=4.0.3"></script>
<script src="<?php echo SITE_ROOT;?>statics/js/dist/Statistics/charts.js"></script>
<script src="<?php echo SITE_ROOT;?>statics/js/dist/Statistics/user_business_charts.js"></script>


</body>
</html>
<!-- 20170105 -->
