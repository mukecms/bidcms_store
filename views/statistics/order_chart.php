
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- 满足有些用户在手机端访问的需要 -->

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <title>订单统计 - Bidcms开源电商</title>
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
        <?php include "views/global_nav.php";?>
		</div>
        <!-- end content-left -->

        <div class="content-right">
            <h1 class="content-right-title">订单统计<a class="gicon-info-sign gicon_linkother" href="javascript:;" target="_blank"></a></h1>


    <table class="wxtables data">
        <colgroup>
            <col width="25%">
            <col width="25%">
            <col width="25%">
            <col width="25%">
        </colgroup>
        <thead>
            <tr>
                <td colspan="4" class="left" style="font-size:14px;">实时统计</td>
            </tr>
        </thead>
        <tbody id="tBodyGetTotalCcount">
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
                <td colspan="4" class="left" style="font-size:14px;">往期统计</td>
            </tr>
        </thead>
        <tbody id="tBodyGetLastCount">
            <tr>
                <td>加载中...</td>
            </tr>
        </tbody>
    </table>


    <div class="chartWrap mgt40">
        <div class="chartTitle clearfix">
            <span class="c-text fl">订单笔数<a class="gicon-info-sign gicon_linkother" href="javascript:;" target="_blank"></a></span>
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
                <h2>订单笔数趋势图</h2>
            </div>
            <div class="cb-contain">
            	<div class="cbc-live clearfix">
            		<div class="cbc-live-width cbc-live-org fl">
            			<span><b class="ddzs_txt">近30天</b>订单数</span>
            			<strong id="ddzs_n">0</strong>
            		</div>
                    <div class="cbc-live-width cbc-live-blue fl">
                        <span><b class="ddzs_txt">近30天</b>付款订单数</span>
                        <strong id="ddpzs_n">0</strong>
                    </div>
            	</div>
            	<div class="table-loading" id="loading_chart_ddzs">
	            	<div class="progress">
						<div class="progress-bar progress-bar-warning progress-bar-striped active" style="width: 100%;"></div>
					</div>
            	</div>
            	<div id="chart_ddzs" class="mgt10 txtCenter j-chartPanel" style="display:none;width:920px; height:200px;"></div>
            </div>
        </div>
	</div>
    <div class="chartWrap mgt40">
        <div class="chartTitle clearfix">
            <span class="c-text fl">订单金额<a class="gicon-info-sign gicon_linkother" href="javascript:;" target="_blank"></a></span>
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
                <h2>订单金额趋势图</h2>
            </div>
            <div class="cb-contain">
                <div class="cbc-live clearfix">
                    <div class="cbc-live-width cbc-live-blue fl">
                        <span><b class="ddjr_txt">近30天</b>订单金额</span>
                        <strong id="ddjr_n">0</strong>
                    </div>
                    <div class="cbc-live-width cbc-live-blue fl">
                        <span><b class="ddjr_txt">近30天</b>付款订单金额</span>
                        <strong id="ddpjr_n">0</strong>
                    </div>
                </div>
                <div class="table-loading" id="loading_chart_ddjr">
                    <div class="progress">
                        <div class="progress-bar progress-bar-warning progress-bar-striped active" style="width: 100%;"></div>
                    </div>
                </div>
                <div id="chart_ddjr" class="mgt10 txtCenter j-chartPanel" style="display:none;width:920px; height:200px;"></div>
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
<script src="<?php echo SITE_ROOT;?>statics/js/dist/Statistics/order_charts.js"></script>


</body>
</html>
<!-- 20170105 -->
