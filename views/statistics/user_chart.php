
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- 满足有些用户在手机端访问的需要 -->

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <title>会员统计 - Bidcms开源电商</title>
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

        <div class="content-right">
            <h1 class="content-right-title">会员统计<a class="gicon-info-sign gicon_linkother" href="javascript:;" target="_blank"></a></h1>


    <div class="tabs clearfix nochange">
        <a href="index.php?con=statistics&act=user_chart" class="active tabs_a fl">会员增长</a>
        <a href="index.php?con=statistics&act=user_business_chart" class="tabs_a fl">会员业务</a>
        <a href="index.php?con=statistics&act=user_attr_chart" class="tabs_a fl">会员属性</a>
    </div>

    <table class="wxtables data mgt20">
        <colgroup>
            <col width="14.28%">
            <col width="14.28%">
            <col width="14.28%">
            <col width="14.28%">
            <col width="14.28%">
            <col width="14.28%">
            <col width="14.28%">
        </colgroup>
        <thead>
            <tr>
                <td colspan="7" class="left" style="font-size:14px;">会员实时统计</td>
            </tr>
        </thead>
        <tbody id="tBodyGetUserCount">
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
                <td colspan="4" class="left" style="font-size:14px;">往期会员结构统计</td>
            </tr>
        </thead>
        <tbody id="tBodyGetLastUserCount">
            <tr>
                <td>加载中...</td>
            </tr>
        </tbody>
    </table>

    <div class="chartWrap mgt40">
        <div class="chartTitle clearfix">
            <span class="c-text fl">新增会员/粉丝/分销商统计<a class="gicon-info-sign gicon_linkother" href="javascript:;" target="_blank"></a></span>
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
                <h2>新增会员/粉丝/分销商趋势图</h2>
            </div>
            <div class="cb-contain">
                <!-- <div class="cbc-live clearfix">
                    <div class="cbc-live-width cbc-live-org fl">
                        <span><b class="time_type_1">近30天</b>新增会员数（人）</span>
                        <strong id="hysl_n">0</strong>
                    </div>
                    <div class="cbc-live-width cbc-live-blue fl">
                        <span><b class="time_type_1">近30天</b>新增分销商数（人）</span>
                        <strong id="fxsl_n">0</strong>
                    </div>
                </div> -->
                <div class="table-loading" id="loading_chart_xzhy">
                    <div class="progress">
                        <div class="progress-bar progress-bar-warning progress-bar-striped active" style="width: 100%;"></div>
                    </div>
                </div>
                <div id="chart_xzhy" class="mgt10 txtCenter j-chartPanel" style="display:none;width:920px; height:200px;"></div>
            </div>
        </div>
    </div>

<!-- 饼图 -->
    <div class="chartWrap mgt20">
        <div class="chartTitle clearfix">
            <span class="c-text fl">饼图统计<a class="gicon-info-sign gicon_linkother" href="javascript:;" target="_blank"></a></span>
        </div>
        <div class="clearfix">
            <div class="chartBox chartBox-bdr chartBox-fullcolor mgt5 per50 fl">
                <div class="cb-title">
                    <h2>粉丝会员数量饼状图</h2>
                </div>
                <div class="cb-contain txtCenter">
                    <div class="table-loading" id="loading_chart_fshy">
                        <div class="progress">
                            <div class="progress-bar progress-bar-warning progress-bar-striped active" style="width: 100%;"></div>
                        </div>
                    </div>
                    <div id="chart_fshy" class="mgt10" style="display:none;width:520px; height:420px; display:inline-block"></div>
                </div>
            </div>

            <div class="chartBox chartBox-bdr chartBox-fullcolor mgt5 per50 fr">
                <div class="cb-title">
                    <h2>分销商数量饼状图</h2>
                </div>
                <div class="cb-contain txtCenter">
                    <div class="table-loading" id="loading_chart_agentnum">
                        <div class="progress">
                            <div class="progress-bar progress-bar-warning progress-bar-striped active" style="width: 100%;"></div>
                        </div>
                    </div>
                    <div id="chart_agentnum" class="mgt10" style="display:none;width:520px; height:420px; display:inline-block"></div>
                </div>
            </div>
        </div>

        <div class="clearfix mgt15">


            <div class="chartBox chartBox-bdr chartBox-fullcolor mgt5 per50 fr">
                <div class="cb-title">
                    <h2>多次购物会员数量饼状图</h2>
                </div>
                <div class="cb-contain txtCenter">
                    <div class="table-loading" id="loading_chart_dcgw">
                        <div class="progress">
                            <div class="progress-bar progress-bar-warning progress-bar-striped active" style="width: 100%;"></div>
                        </div>
                    </div>
                    <div id="chart_dcgw" class="mgt10" style="display:none;width:520px; height:420px; display:inline-block"></div>
                </div>
            </div>
                    </div>
    </div>
<!-- 饼图 end -->


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
<script src="<?php echo SITE_ROOT;?>statics/js/dist/Statistics/user_charts.js"></script>


</body>
</html>
<!-- 20170105 -->
