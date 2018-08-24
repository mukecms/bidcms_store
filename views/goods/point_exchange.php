
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- 满足有些用户在手机端访问的需要 -->

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <title>积分兑换商品列表 - Bidcms开源电商</title>
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
            <h1 class="content-right-title">积分兑换商品列表<a class="gicon-info-sign gicon_linkother" href="//www.wifenxiao.com/Index/help_show/lm/help/id/243.html" target="_blank"></a></h1>

    <a href="index.php?con=goods&act=add" class="btn btn-success">添加商品</a>

    <div class="tablesWrap mgt15">
        <div class="tabs clearfix mgt15">
            <a href="index.php?con=goods&act=point_exchange&type=1" class="active tabs_a fl">兑换中</a>
            <a href="index.php?con=goods&act=point_exchange&type=2" class=" tabs_a fl">仓库中</a>
        <form action="" method="GET">
            <div class="tables-searchbox pd0 fr">
                <input type="text" class="input small" name="title" value="" placeholder="商品名称" style="margin-bottom:3px;">
                <span style="margin-right:5px;"><button class="btn btn-primary"><i class="gicon-search white"></i>查询</button>
                <a href="/Ump/order_list" class="btn btn-warning fr">订单列表</a></span>
            </div>
        </form>
        </div>
        <!-- end tables-searchbox -->
        <table class="wxtables mgt15">
           <colgroup>
                <col width="5%">
                <col width="35%">
                <col width="10%">
                <col width="10%">
                <col width="10%">
                <col width="15%">
                <col width="15%">
            </colgroup>
            <thead>
            <tr>
                <td></td>
                <td>商品</td>
                <td>所需积分</td>
                <td>发送总数</td>
                <td>已兑换数</td>
                <td>更新时间</td>
                <td>操作</td>
            </tr>
            </thead>
            <tbody>
              <?php if($list['data']){?>
              <?php foreach($list['data'] as $index=>$item){?>
              <tr id="list<?php echo $item['id'];?>">
                  <td>
                      <input type="checkbox" class="checkbox table-ckbs"  data-id="<?php echo $item['id'];?>" >
                  </td>
                  <td>
                      <div class="goodswrap">
                          <a href="mobile/index.php?con=item&id=<?php echo $item['id'];?>" class="block" target="_blank" title="<?php echo $item['title'];?>">
                              <div class="table-item-img" style="float:left;"><img src="<?php echo $item['thumb'];?>" alt=""></div>
                              <div class="table-item-info" style="margin-left:15px;float:left;">
                                  <p><?php echo $item['title'];?></p>
                              </div>
                          </a>
                      </div>
                  </td>
                  <td>
                      <div class="serialwrap">
                          <span><?php echo $item['buy_need_points'];?></span>
                      </div>
                  </td>
                  <td>
                      <div class="serialwrap">
                          <span><?php echo $item['num'];?></span>
                      </div>
                  </td>
                  <td>
                      <div class="serialwrap">
                          <span><?php echo $item['sale_num'];?></span>
                      </div>
                  </td>
                  <td><?php echo date('Y-m-d H:i:s',$item['updatetime']);?></td>
                  <td>
                      <a href="index.php?con=goods&act=add&id=<?php echo $item['id'];?>" class="btn btn-mini btn-primary width" title="修改">编辑</a>
                      <a href="javascript:;" class="btn btn-mini btn-danger j-del" title="删除" data-id="<?php echo $item['id'];?>">删除</a>
                      </td>
              </tr>
            <?php }} else {?>
              <tr><td colspan="7">暂无信息</td></tr>
            <?php }?>
            </tbody>
        </table>
        <!-- end wxtables -->
        <div class="tables-btmctrl clearfix">

                <div class="fl">
                    <a href="javascript:;" class="btn btn-primary btn_table_selectAll">全选</a>
                    <a href="javascript:;" class="btn btn-primary btn_table_Cancle">取消</a>
                    <a href="javascript:;" class="btn btn-primary j-disabledAll" data-dz="1">批量上架</a>
                </div>

            <div class="fr">
                <div class="paginate">
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
