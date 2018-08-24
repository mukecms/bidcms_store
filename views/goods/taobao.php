


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- 满足有些用户在手机端访问的需要 -->

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <title>商品列表 - Bidcms开源电商</title>
    <!-- 线上环境 -->
        <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/css/component-min.css">
        <link rel="stylesheet" href="statics/plugins/jbox/jbox-min.css">

<!-- diy css start-->
<link rel="stylesheet" href="<?php echo API_STORE;?>statics/mobile/css/style.css">

    <link rel="stylesheet" href="statics/plugins/diy/diy-min.css">
<link rel="stylesheet" href="statics/plugins/uploadify/uploadify-min.css">
<link rel="stylesheet" href="statics/plugins/colorpicker/colorpicker.css">
<!-- diy css end-->
<link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/css/Item/lists.css">
<style>
    #albums{z-index:999998;}
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
            <h1 class="content-right-title">商品列表<a class="gicon-info-sign gicon_linkother" href="//www.wifenxiao.com/Index/help_show/lm/help/id/40.html" target="_blank"></a></h1>


    <a href="index.php?con=goods&act=add_step2" class="btn btn-success">发布商品</a>
    <a href="index.php?plugin=taobao" target="_blank" class="btn btn-danger">淘宝联盟</a>
    <form action="" method="post">
        <div class="tables-searchbox newcearchbox">
            <select name="group_id" class="select small newselect">
                <option value="-1" selected>所有分组</option>
                <?php foreach($group_list as $group){?>
                <option value="<?php echo $group['id'];?>" ><?php echo $group['title'];?></option>
                <?php }?>
            </select>
            <input type="text" placeholder="商品名称" class="input small" name="title" value="">
            <input type="text" placeholder="商家编码" class="input mini" name="goods_no" value="">
            <button class="btn btn-primary" style="line-height:26px;"><i class="gicon-search white"></i>查询</button>
            <a href="/Item/item_export" class="btn btn-warning"><i class="gicon-share white"></i>商品导出</a>
            <input type="hidden" value="" class="is_repurchase">
        </div>
        <div class="tabs clearfix mgt10">
            <a href="/Item/lists/item_status/onsale" class="active tabs_a fl">出售中(1)</a>
                        <a href="/Item/lists/item_status/onsku" class=" tabs_a fl">仓库中(1)</a>
            <a href="/Item/lists/item_status/outstock" class=" tabs_a fl">已售罄(1)</a>
            <a href="/Item/lists/item_status/warn" class=" tabs_a fl">警戒(1)</a>
                    </div>
        <div class="grounp_chenge_box fr">
            <span class="grtt">每页显示商品数量:</span>
            <a class="intem  cur " href="javascript:;">10</a>
            <a class="intem  " href="javascript:;">20</a>
            <a class="intem  " href="javascript:;">40</a>
            <a class="intem  " href="javascript:;">50</a>
        </div>
    </form>
        <!-- end tabs -->

        <table class="wxtables mgt10">
           <colgroup>
                <col width="2%">
                <col width="8%">
                <col width="38%">
                <col width="15%">
                <col width="17%">
                <col width="20%">
            </colgroup>
            <thead>
                <tr class="po_list">
                    <td><i class="icon_check"></i></td>
                    <td colspan="2">商品<span></span></td>
                    <td>排序<span></span></td>
                    <td>创建时间
                      <span>
                            <a href="/Item/lists/item_status/onsale/create_time/up" class="up "><b></b></a>
                            <a></a>
                            <a href="/Item/lists/item_status/onsale/create_time/down" class="down "><b></b></a>
                        </span>
                    </td>
                    <td>操作<span></span></td>
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
                            <a href="mobile/index.php?con=item&id=<?php echo $item['id'];?>" class="block" target="_blank" title="<?php echo $item['goods_name'];?>">
                                <div class="table-item-img"><img src="<?php echo $item['goods_thumb'];?>" alt=""></div>
                            </a>
                        </div>
                    </td>
                    <td>
                        <div class="goodswrap">
                            <a href="mobile/index.php?con=item&id=<?php echo $item['id'];?>" class="block" target="_blank" title="<?php echo $item['goods_name'];?>">
                                <div class="table-item-info" style="width:100%;">
                                    <p><?php echo $item['goods_name'];?></p>
                                    <span class="price">&yen;<?php echo $item['goods_discounted_price'];?></span>
                                </div>
                            </a>
                        </div>

                        
                    </td>
                    <td>
                        <div class="serialwrap">
                            <span><?php echo $item['serial'];?></span>
                        </div>
                    </td>
                    <td><?php echo date('Y-m-d H:i:s',$item['updatetime']);?></td>
                    <td>
                    <a href="index.php?con=goods&act=add&id=<?php echo $item['id'];?>" class="btn btn-mini btn-primary width" title="修改">编辑</a>
                    <a href="javascript:;" class="btn btn-mini btn-danger j-del" title="删除" data-id="<?php echo $item['id'];?>">删除</a>
                    </td>
                </tr>
                <?php }}?>
                </tbody>
            <!-- 技 -->
        </table>
        <!-- end wxtables -->
        <div class="tables-btmctrl clearfix">
            <div class="mgb10">
                <a href="javascript:;" class="btn btn-primary btn_table_selectAll">全选</a>
                <a href="javascript:;" class="btn btn-primary btn_table_Cancle">取消</a>
                <a href="javascript:;" class="btn btn-primary btn_table_offshelf">下架</a>
                <a href="javascript:;" class="btn btn-primary btn_table_delAll">删除</a>
            </div>
            <hr>
            <div class="mgt10">
                <div class="paginate">
                <?php echo $pageinfo;?>
                </div>
            </div>
        </div>
        <!-- end tables-btmctrl -->


        </div>
        <!-- end content-right -->

        <a href="javascript:;" class="btn-leftMenuFold" id="j-btn-leftMenuFold"></a>
    </div>
</div>
<!-- end container -->


<?php include "views/global_footer.php";?>
<script src="<?php echo SITE_ROOT;?>statics/js/dist/Item/lists.js?v=2017061659333656423412123"></script>
</body>
</html>
<!-- 20160922 -->
