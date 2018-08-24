<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <title>首页 - Bidcms开源电商</title>
    <!-- 线上环境 -->
    <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/css/component-min.css">
    <link rel="stylesheet" href="statics/plugins/jbox/jbox-min.css">

    <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/css/Shop/home.css">

</head>
<body class="cp-bodybox">
<?php include "views/global_top.php";?>

<div class="container">
<div class="inner clearfix">
<div class="content-left fl">
	<?php include "global_nav.php";?>
</div>
<!-- end content-left -->

<div class="content-right">


    <h1 class="content-right-title">欢迎您！</h1>


    <!-- <div class="alert alert-info disable-del"><strong>为迎接双十一，打造更稳定快速的运行环境，系统启用新的个性二级域名（只需3步，<a href="statics/open_second_level_domain.html" target="_blank" class="colorRed">查看操作步骤</a>），截止11月30日。感谢支持！</strong></div> -->

    <div class="alert alert-warning disable-del">注：首页统计数据30分钟更新一次。</div>


    <div class="zh_infor_box" data-type="index.php?con=api&act=getTongJi" id="getTongJi">
        加载中...
    </div>

    <table class="wxtables data mgt15">
        <colgroup>
			<col width="25%">
			<col width="25%">
			<col width="25%">
			<col width="25%">
        </colgroup>
        <thead>
            <tr>
                <td colspan="4" class="left" style="font-size:14px;">数据统计</td>
            </tr>
        </thead>
        <tbody id="tBodyGetTotalCcount">
            <tr>
                <td>加载中...</td>
            </tr>
        </tbody>
    </table>
    <div class="chartWrap mgt15 clearfix">
        <div class="chartBox chartBox-bdr chartBox-fullcolor per50 fl">
            <div class="cb-title">
                <h2>订单笔数趋势图</h2>
            </div>
            <div class="cb-contain">
            	<div class="cbc-live clearfix">
            		<div class="cbc-live-today fl">
            			<span>今日订单数（笔）</span>
            			<strong id="ddzs_t">0</strong>
            		</div>
            		<div class="cbc-live-yesterday fl">
            			<span>昨日订单数（笔）</span>
            			<strong id="ddzs_y">0</strong>
            		</div>
            	</div>
            	<div class="table-loading" id="loading_chart_ddzs">
	            	<div class="progress">
						<div class="progress-bar progress-bar-warning progress-bar-striped active" style="width: 100%;"></div>
					</div>
            	</div>
            	<div id="chart_ddzs" class="mgt10 txtCenter" style="display:none;width:442px; height:200px;"></div>
            </div>
        </div>
        <div class="chartBox chartBox-bdr chartBox-fullcolor per50 fr">
            <div class="cb-title">
                <h2>分销订单笔数趋势图</h2>
            </div>
            <div class="cb-contain">
            	<div class="cbc-live clearfix">
            		<div class="cbc-live-today fl">
            			<span>今日分销订单数（笔）</span>
            			<strong id="fxddzs_t">0</strong>
            		</div>
            		<div class="cbc-live-yesterday fl">
            			<span>昨日分销订单数（笔）</span>
            			<strong id="fxddzs_y">0</strong>
            		</div>
            	</div>
            	<div class="table-loading" id="loading_chart_fxddzs">
	            	<div class="progress">
						<div class="progress-bar progress-bar-warning progress-bar-striped active" style="width: 100%;"></div>
					</div>
            	</div>
            	<div id="chart_fxddzs" class="mgt10 txtCenter" style="display:none;width:442px; height:200px;"></div>
            </div>
        </div>
    </div>

    <div class="chartWrap mgt15 clearfix">
        <div class="chartBox chartBox-bdr chartBox-fullcolor per50 fl">
            <div class="cb-title">
                <h2>订单金额统计</h2>
            </div>
            <div class="cb-contain">
            	<div class="table-loading" id="loading_chart_ddje">
	            	<div class="progress">
						<div class="progress-bar progress-bar-warning progress-bar-striped active" style="width: 100%;"></div>
					</div>
            	</div>
            	<div id="chart_ddje" class="mgt10 txtCenter" style="display:none;width:442px; height:250px;"></div>
            </div>
        </div>
        <div class="chartBox chartBox-bdr chartBox-fullcolor per50 fr">
            <div class="cb-title">
                <h2>订单统计</h2>
            </div>
            <div class="cb-contain">
            	<div class="table-loading" id="loading_chart_ddtjpei">
	            	<div class="progress">
						<div class="progress-bar progress-bar-warning progress-bar-striped active" style="width: 100%;"></div>
					</div>
            	</div>
            	<div id="chart_ddtjpei" class="mgt10 txtCenter" style="display:none;width:442px; height:250px;"></div>
            </div>
        </div>
    </div>
    <div class="chartWrap mgt15 clearfix">
        <div class="chartBox chartBox-bdr chartBox-fullcolor">
            <div class="cb-title">
                <h2>最近15分钟实时PV情况</h2>
            </div>
            <div class="cb-contain">
                <div class="table-loading" id="loading_chart_mmpv">
                    <div class="progress">
                        <div class="progress-bar progress-bar-warning progress-bar-striped active" style="width: 100%;"></div>
                    </div>
                </div>
                <div id="chart_mmpv" class="mgt10 txtCenter" style="display:none;width:920px; height:200px;"></div>
            </div>
        </div>
    </div>    <div class="chartWrap mgt15 clearfix">
        <div class="chartBox chartBox-bdr per50 fl">
            <div class="cb-title">
                <h2>上月佣金真实排名</h2>
            </div>
            <div class="cb-contain" style="padding:0;">
                <table class="chart-table">
                    <colgroup>
                        <col width="7%">
                        <col width="25%">
                        <col width="20%">
                        <col width="18%">
                        <col width="18%">
                    </colgroup>
                    <thead>
                    <tr>
                        <td></td>
                        <td>昵称/手机号</td>
                        <td>收入佣金</td>
                        <td>佣金余额</td>
                        <td>排名</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr><td colspan="4" class="txtCenter">暂无信息</td></tr>
                                            </tbody>
                </table>
            </div>
        </div>
        <div class="chartBox chartBox-bdr per50 fr">
            <div class="cb-title">
                <h2>总佣金真实排名</h2>
            </div>
            <div class="cb-contain" style="padding:0;">
                <table class="chart-table">
                    <colgroup>
                        <col width="7%">
                        <col width="20%">
                        <col width="18%">
                        <col width="18%">
                        <col width="18%">
                    </colgroup>
                    <thead>
                    <tr>
                        <td></td>
                        <td>昵称/手机号</td>
                        <td>收入佣金</td>
                        <td>佣金余额</td>
                        <td>排名</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr><td colspan="4" class="txtCenter">暂无信息</td></tr>
                                            </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="chartWrap mgt15 clearfix">
        <div class="chartBox chartBox-bdr per50 fl">
            <div class="cb-title">
                <h2>会员上月积分真实排名</h2>
            </div>
            <div class="cb-contain" style="padding:0;" data-type="index.php?con=api&act=getUserPrevMonthPointTopSort">
                <div style="padding: 10px">
                    加载中...
                </div>
            </div>
        </div>
        <div class="chartBox chartBox-bdr per50 fr">
            <div class="cb-title">
                <h2>会员当前积分真实排名</h2>
            </div>
            <div class="cb-contain" style="padding:0;" data-type="index.php?con=api&act=getUserCurrentPointTopSort">
                <div style="padding: 10px">
                    加载中...
                </div>
            </div>
        </div>
    </div>

    <div class="fxslist">
        <div class="fxstitle"><span></span>最近1分钟内完成订单交易的商家</div>
        <div class="fxsmain">
            <!-- 滚动主要部分 -->
            <div class="fxsitem clearfix">
                <!-- 列表 -->
				<?php foreach($shop as $item){?>
                <div class="fxsinfo fl">
                        <div class="fxsimg"><img src="//image.wifenxiao.com/69/a3/4000285/2016-05/572ac31935bcc.jpg@!w640" width="82" height="82" alt=""><span class="enterprise">企业版</span></div>
                        <p>博冠联盟专营店</p>
                        <!-- 商家二维码 -->
                        <div class="fxscode ">
                            <div class="fxscodewrap">
                                <!-- 小箭头 -->
                                <i class="caretArr"></i>
                                <i class="caretArr caretTop"></i>
                                <!-- 二维码 -->
                                <img src="<?php echo API_ROOT;?>tool/qrcode.php?link=<?php echo urlencode(SITE_ROOT.'mobile/index.php?shopid='.$v['id']);?>" alt="">
                            </div>
                        </div>
               </div>
			   <?php }?>
			</div>
            <!-- 滚动焦点 -->
            <div class="fxspageicon">
                <span class="cur"></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- 续费弹窗 -->
    <div class="renew_overlay"></div>
    <div id="renew_box" class="renew_box_con">
        <span class="renew_ico">续费</span>
        <i class="close_box J_close_box">×</i>
        <div class="renew_box_top">
            <h2>续费客服：</h2>
            <div class="chat_mode">
                <a href="tencent://message/?uin=80068726" class="qq_chat"><img src="<?php echo SITE_ROOT;?>statics/images/qq_chat.png" /></a>
                <a href="tencent://message/?uin=80068562" class="qq_chat"><img src="<?php echo SITE_ROOT;?>statics/images/qq_chat.png" /></a>
                <a href="//www.taobao.com/webww/ww.php?ver=3&touid=%E6%B7%98%E5%BA%97%E9%80%9A&siteid=cntaobao&status=1&charset=utf-8" target="_blank" class="ww_chat"><img src="<?php echo SITE_ROOT;?>statics/images/ww_chat.png" /></a>
            </div>
        </div>
        <div class="renew_box_mid">
            <form action="" method="post">
                <h2>续费方式：</h2>
                <p class="renew_type"><label></label><span>支付宝账户：vr21xt@163.com</span></p>
                <p><label>付款金额：</label><input type="text" name="renew_price" placeholder="续费金额，联系客服专员"/></p>
                <p><label>付款说明：</label><input type="text" name="renew_info" placeholder="如需备注，请填写备注信息"/></p>
                <p>
                   <a href="javascript:;" class="pay_btn">确认支付</a>
                </p>
            </form>
        </div>
        <div class="renew_box_bottom">
            <img src="<?php echo SITE_ROOT;?>statics/images/JH_bank.png" />
            <span class="tip">对公银行账号，请联系客服专员</span>
        </div>
    </div>


</div>
<!-- end content-right -->
</div>
</div>
<!-- end container -->

<!-- end footer -->
<div class="fixedBar">
        <ul>
            <li class="shopManager0"><a href="javascript:;" data-target="#shop_0">店铺管理</a></li><li class="shopManager1"><a href="javascript:;" data-target="#shop_1">自定义专题</a></li><li class="shopManager3"><a href="javascript:;" data-target="#shop_3">商品管理</a></li><li class="shopManager6"><a href="javascript:;" data-target="#shop_6">订单管理</a></li><li class="shopManager8"><a href="javascript:;" data-target="#shop_8">会员管理</a></li><li class="shopManager0"><a href="javascript:;" data-target="#shop_0">分销商管理</a></li><li class="shopManager14"><a href="javascript:;" data-target="#shop_14">分销财务</a></li>        </ul>
    </div>
    <a href="#" id="j-gotop" class="gotop" title="回到顶部"></a>
<!-- end gotop -->

<?php include "global_footer.php";?>
<script src="<?php echo SITE_ROOT;?>statics/plugins/Highcharts-4.0.3/highcharts.js?v=4.0.3"></script>
    <script src="<?php echo SITE_ROOT;?>statics/js/dist/Shop/home.js"></script>


</body>
</html>
<!-- 20160505 -->
