


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- 满足有些用户在手机端访问的需要 -->

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <title>发布商品 - Bidcms开源电商</title>
    <!-- 线上环境 -->
        <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/css/component-min.css">
        <link rel="stylesheet" href="statics/plugins/jbox/jbox-min.css">

    <!-- diy css start-->
<link rel="stylesheet" href="<?php echo API_STORE;?>statics/mobile/css/style.css">

    <link rel="stylesheet" href="statics/plugins/diy/diy-min.css">
<link rel="stylesheet" href="statics/plugins/uploadify/uploadify-min.css">
<link rel="stylesheet" href="statics/plugins/colorpicker/colorpicker.css">
<!-- diy css end-->
    <style>
    .goods-details-block {
        padding: 30px 0;
        background: #e5e5e5;
        text-align: center;
        color: #666;
        }
    .goods-details-block h4 {
        margin: 0;
        font-size: 16px;
        line-height: 24px;
    }
    .goods-details-block p {
        margin: 0;
        font-size: 14px;
        line-height: 24px;
    }
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
            <h1 class="content-right-title">发布商品</h1>


    <ul class="wizard">
        <li class="wizard-item complete">
            <dl class="wizard-item-content">
                <dt class="wizard-ic-step">
                    <span class="wizard-icstp-num">1</span>
                    <span class="wizard-icstp-title">选择商品类目</span>
                </dt>
                <dd class="wizard-ic-desc"></dd>
            </dl>
        </li>
        <li class="wizard-item complete">
            <dl class="wizard-item-content">
                <dt class="wizard-ic-step">
                    <span class="wizard-icstp-num">2</span>
                    <span class="wizard-icstp-title">编辑商品信息</span>
                </dt>
                <dd class="wizard-ic-desc"></dd>
            </dl>
        </li>
        <li class="wizard-item process">
            <dl class="wizard-item-content">
                <dt class="wizard-ic-step">
                    <span class="wizard-icstp-num">3</span>
                    <span class="wizard-icstp-title">编辑商品详情</span>
                </dt>
            </dl>
        </li>
    </ul>

    <input type="hidden" name="content" value='<?php echo $info['content'];?>' id="j-initdata">

    <input type="hidden" name="template_id" value='<?php echo $id;?>' id="j-pageID">

    <div class="diy clearfix mgt20">
        <div id="diy-phone">
            <div class="diy-phone-header">
                <i class="diy-phone-receiver"></i>
                <div class="diy-phone-title j-pagetitle">商品详情</div>
            </div>
            <div class="diy-phone-contain" id="diy-contain">
                <div class="goods-details-block">
                    <h4>基本信息区</h4>
                    <p>固定样式，显示商品主图、价格等信息</p>
                </div>
                <div class="nodrag"></div>
                <div class="drag"></div>
            </div>
            <i class="diy-phone-footer"></i>
        </div>

        <div id="diy-ctrl"></div>
    </div>
    <div class="diy-actions">

        <div class="diy-actions-submit">
            <a href="?con=goods&act=add_step2&id=<?php echo $id;?>" class="btn">上一步</a>
            <a href="javascript:;" class="btn btn-primary" id="j-savePage">保存</a>
            <a href="?con=goods" class="btn btn-default">返回列表</a>
        </div>
    </div>
        </div>
        <!-- end content-right -->

        <a href="javascript:;" class="btn-leftMenuFold" id="j-btn-leftMenuFold"></a>
    </div>
</div>
<!-- end container -->


<?php include "views/global_template.php";?>
<?php echo file_get_contents(API_STORE.'data/widget/1/content.html');?>
<?php echo file_get_contents(API_STORE.'data/widget/1/control.html');?>
<?php include "views/global_footer.php";?>

<!-- diy js start-->
<script src="<?php echo SITE_ROOT;?>statics/plugins/ueditor/diyUeditor-min.js"></script>
<script src="<?php echo SITE_ROOT;?>statics/plugins/uploadify/jquery.uploadify.min.js?ver=8497"></script>
<script src="<?php echo SITE_ROOT;?>statics/js/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo SITE_ROOT;?>statics/plugins/diy/diy-min.js"></script>
<script src="<?php echo SITE_ROOT;?>statics/plugins/colorpicker/colorpicker.js"></script><!-- diy js end -->
<script src="<?php echo SITE_ROOT;?>statics/js/dist/Item/add_step3.js"></script>
</body>
</html>
<!-- 20160922 -->
