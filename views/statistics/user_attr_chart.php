
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- 满足有些用户在手机端访问的需要 -->

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <title>会员属性 - Bidcms开源电商</title>
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
            <h1 class="content-right-title">会员属性<a class="gicon-info-sign gicon_linkother" href="javascript:;" target="_blank"></a></h1>


    <div class="tabs clearfix nochange">
		<a href="index.php?con=statistics&act=user_chart" class="tabs_a fl">会员增长</a>
        <a href="index.php?con=statistics&act=user_business_chart" class="tabs_a fl">会员业务</a>
        <a href="index.php?con=statistics&act=user_attr_chart" class="active tabs_a fl">会员属性</a>
    </div>

	<div class="user_content clearfix">
		<div id="userMain" class="fl" style="width: 600px;height:400px;"></div>
		<div class="fl user_table">
            <div class="thead clearfix">
                <span style="width:28%">省份</span>
                <span style="width:62%">用户数</span>
            </div>
	        <div class="tbody">
	            <ul>
	            	<li style="text-align:center; line-height:50px;">加载中....</li>
	            </ul>
	        </div>
		</div>
	</div>

	<div class="userchartWrap mgt20">
        <div class="userchartBox">
            <div class="cb-title">
                <h2>性别分布比例</h2>
            </div>
            <div class="cb-contain txtCenter">
                <div class="table-loading" id="loading_chart_xbfb">
                    <div class="progress">
                        <div class="progress-bar progress-bar-warning progress-bar-striped active" style="width: 100%;"></div>
                    </div>
                </div>
                <div id="chart_xbfb" class="mgt10" style="display:none;width:720px; height:620px;display:inline-block"></div>
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

<script type="text/j-template" id="tpl_user_table_lists">
	<% if(dataset.length){ %>
		<% _.each(dataset,function(item){ %>
		<li>
			<div class="pro_name fl">
			<%= item.name %>
			</div>

			<div class="pro_user fl">
				<span class="user_num"><%= item.value %></span>
				<div class="user_pro"><span class="pro_bar" style="width:<%= item.rate %>%"></span></div>
			</div>
		</li>
		<% }) %>
	<% } else {%>
		<li>暂无数据</li>
	<% } %>
</script>
<script type="text/j-template" id="tpl_user_table_city">
		<div class="pro_name_tips">
				<div class="tips_city">
					<p>城市</p>
					<ul>
					<% if(dataset.length){ %>
						<% _.each(dataset,function(item){ %>
						<li><%=item.city%></li>
						<% }) %>
					<% } else {%>
					<li>暂无数据</li>
					<% } %>
					</ul>
				</div>
				<div class="tips_vip">
					<p>会员数</p>
					<ul>
					<% if(dataset.length){ %>
						<% _.each(dataset,function(item){ %>
						<li><%=item.count%></li>
						<% }) %>
					<% } else {%>
					<li>暂无数据</li>
					<% } %>
					</ul>
				</div>
				<div class="close_list"><span>&times</span></div>
			</div>
</script>

<!--end front template  -->
<?php include "views/global_footer.php";?>
<script src="<?php echo SITE_ROOT;?>statics/plugins/Highcharts-4.0.3/highcharts.js?v=4.0.3"></script>
<script src="<?php echo SITE_ROOT;?>statics/plugins/echarts/echarts.min.js?v=4.0.3"></script>
<script src="<?php echo SITE_ROOT;?>statics/js/dist/Statistics/user_attr_charts.js"></script>


</body>
</html>
<!-- 20170105 -->
