
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- 满足有些用户在手机端访问的需要 -->

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <title>佣金排名设置 - Bidcms开源电商</title>
    <!-- 线上环境 -->
        <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/css/component-min.css">    <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/plugins/jbox/jbox-min.css">

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
            <h1 class="content-right-title">佣金排名设置<a class="gicon-info-sign gicon_linkother" href="//www.wifenxiao.com/Index/help_show/lm/help/id/231.html" target="_blank"></a></h1>


    <div class="sysPanel">
        <div class="sysPanel-con">
            <div class="sysPanel-title">功能开关</div>
            <div class="sysPanel-tip">添加的数据将会参与到分销商佣金排名。</div>
        </div>
        <div class="vir-chkb j-vir-chkb">
            <div class="vir-chkb-actions clearfix">
                <a href="javascript:;" class="vir-chkb-enable">已开启</a>
                <a href="javascript:;" class="vir-chkb-disable">已关闭</a>
            </div>
            <input type="radio" name="display_agent_sort" class="ip-checkbox j-vir-checkbox" checked>
        </div>
    </div>
    <div class="sysPanel">
        <div class="sysPanel-con">
            <div class="sysPanel-title">按月显示</div>
            <div class="sysPanel-tip">开启后，佣金排名按月显示，关闭后，佣金排名按周显示</div>
        </div>
        <div class="vir-chkb j-vir-chkb">
            <div class="vir-chkb-actions clearfix">
                <a href="javascript:;" class="vir-chkb-enable">已开启</a>
                <a href="javascript:;" class="vir-chkb-disable">已关闭</a>
            </div>
            <input type="radio" name="display_sort_type" class="ip-checkbox j-vir-checkbox" checked>
        </div>
    </div>
    <div class="mgb10 mgt20"><a href="javascript:;" class="btn btn-success J_add_sort">添加分销商排名</a></div>
    <div class="tablesWrap">
        <table class="wxtables">
            <colgroup>
                <col width="5%">
                <col width="45%">
                <col width="25%">
                <col width="25%">
            </colgroup>
            <thead>
            <tr>
                <td></td>
                <td>姓名</td>
                <td>收入佣金</td>
                <td align="center">操作</td>
            </tr>
            </thead>
            <tbody>
            <tr>
                    <td colspan="4">暂无信息</td>
                </tr>
                            </tbody>
        </table>
        <!-- end wxtables -->
                <!-- end tables-btmctrl -->
    </div>    <!-- end tablesWrap -->

        </div>
        <!-- end content-right -->

        <a href="javascript:;" class="btn-leftMenuFold" id="j-btn-leftMenuFold" ></a>
    </div>
</div>
<!-- end container -->

<!-- end footer -->
    <div class="fixedBar">
        <ul>
            <li class="shopManager0"><a href="javascript:;" data-target="#shop_0">分销商管理</a></li>        </ul>
        <a href="javascript:;" class="fixedBar-btn" id="j-fixedBar-btn"></a>
    </div><a href="#" id="j-gotop" class="gotop" title="回到顶部"></a>
<!-- end gotop -->


    <script type="text/j-template" id="tpl_agent_edit">
        <div>
            <div class="formitems inline">
                <label class="fi-name">分销商姓名：</label>
                <div class="form-controls pdt3">
                    <input type="text" name="user_name" class="input mini" value="<%= name %>">
                    <span class="fi-help-text"></span>
                </div>
            </div>
            <div class="formitems inline">
                <label class="fi-name"><span class="colorRed">*</span>收入佣金：</label>
                <div class="form-controls">
                    <input type="text" name="commission" class="input mini" value="<%= sort %>">
                    <span class="fi-help-text"></span>
                </div>
            </div>
        </div>
    </script>

    <script type="text/j-template" id="tpl_agent_add">
            <div class="formitems inline">
                <label class="fi-name">分销商姓名：</label>
                <div class="form-controls pdt3">
                    <input type="text" name="user_name" class="input mini">
                    <span class="fi-help-text"></span>
                </div>
            </div>
            <div class="formitems inline">
                <label class="fi-name"><span class="colorRed">*</span>收入佣金：</label>
                <div class="form-controls">
                    <input type="text" name="commission" class="input mini">
                    <span class="fi-help-text"></span>
                </div>
            </div>
    </script>


<!--end front template  -->

<?php include "views/global_footer.php";?>


<script src="<?php echo SITE_ROOT;?>statics/plugins/My97DatePicker/WdatePicker.js"></script>
<script src="<?php echo SITE_ROOT;?>statics/js/dist/User/agent_sort.js"></script>
<script>
$(function(){
    $("input[name=display_agent_sort]").change(function(){
        setTimeout(function(){
            window.location.reload();
        },800);
    });
});
</script>

<!-- end session hint -->
<script>

    //获取装修模块下滑动商品布局的高度
    $(function(){
        var setSliderHeight = function() {
            $(".J_sliderGoods").each(function(){
                var $this = $(this),
                    liwidth =$this.find("li").width(),
                    liheight = $this.find("li").height();

                $this.css({
                    "height":liheight
                })
                .find("li").css("width",liwidth-2);

            })
        };

        setSliderHeight();
    })

    </script>

</body>
</html>
<!-- 20170105 -->
