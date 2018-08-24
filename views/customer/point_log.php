
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- 满足有些用户在手机端访问的需要 -->

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <title>积分日志 - Bidcms开源电商</title>
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
            <h1 class="content-right-title">积分日志<a class="gicon-info-sign gicon_linkother" href="//www.wifenxiao.com/Index/help_show/lm/help/id/.html" target="_blank"></a></h1>


    <div class="alert alert-info disable-del">送出总积分 <span style="font-size:16px;">10</span>。客户签到次数 <span style="font-size:16px;">1</span>。签到送出积分 <span style="font-size:16px;">10</span>。</div>
    <div class="tablesWrap mgt15">
        <form action="" method="GET">
            <div class="tables-searchbox">
                <input type="text" class="input small" name="title" value="" placeholder="昵称／手机号">
                <input type="text" autocomplete="off" name="start_time" value="" class="input Wdate" placeholder="开始时间" onclick="WdatePicker({ dateFmt:'yyyy-MM-dd'})">
                <span class="mgr5">至</span>
                <input type="text" autocomplete="off" name="end_time" value="" class="input Wdate" placeholder="结束时间" onclick="WdatePicker({ dateFmt:'yyyy-MM-dd'})">
                <button class="btn btn-primary" name="st" value="3"><i class="gicon-search white"></i>查询</button>

            </div>
        </form>
        <!-- end tables-searchbox -->
        <table class="wxtables">
            <colgroup>
                <col width="3%">
                <col width="12%">
                <col width="8%">
                <col width="8%">
                <col width="8%">
                <col width="21%">
                <col width="20%">
                <col width="20%">
            </colgroup>
            <thead>
            <tr>
                <td></td>
                <td>昵称／手机号</td>
                <td>变动前</td>
                <td>变动积分</td>
                <td>变动后</td>
                <td>类型</td>
                <td>创建时间</td>
                <td>备注</td>
            </tr>
            </thead>
            <tbody>
              <?php foreach($list['data'] as $k=>$v){?>
                <tr>
                <td></td>
                <td><?php echo $v['username'];?></td>
                <td><?php echo $v['old_point'];?></td>
                <td class="txtCenter">
                <span class="colorGreen ft-num"><?php echo $v['point'];?></span>
                </td>
                <td><?php echo $v['end_point'];?></td>
                <td><?php echo $v['type'];?></td>
                <td><?php echo date("Y-m-d H:i",$v['updatetime']);?></td>
                <td><?php echo $v['content'];?></td>
                </tr>
              <?php }?>
           </tbody>
        </table>
        <!-- end wxtables -->
        <div class="tables-btmctrl clearfix">

            <div class="fr">
                <div class="paginate">
				<?php echo $pageinfo;?>
                </div>
                <!-- end paginate -->
            </div>
        </div>
        <!-- end tables-btmctrl -->
    </div>
    <!-- end tablesWrap -->

        </div>
        <!-- end content-right -->

        <a href="javascript:;" class="btn-leftMenuFold" id="j-btn-leftMenuFold" ></a>
    </div>
</div>
<!-- end container -->
<?php include "views/global_footer.php";?>
<!--gonggao-->

    <script src="<?php echo SITE_ROOT;?>statics/plugins/My97DatePicker/WdatePicker.js"></script>



</body>
</html>
<!-- 20170105 -->
