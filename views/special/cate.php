
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- 满足有些用户在手机端访问的需要 -->

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <link rel="shortcut icon" href="/favicon.ico">
    <title>专题分类列表 - Bidcms开源电商</title>
    <!-- 线上环境 -->
        <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/css/component-min.css">
         <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/plugins/jbox/jbox-min.css">

    <!-- diy css start-->

    <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/plugins/diy/diy-min.css">
    <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/plugins/uploadify/uploadify-min.css">
    <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/plugins/colorpicker/colorpicker.css">
    <!-- diy css end-->
    <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/css/Item/list_class.css">

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
            <h1 class="content-right-title">专题分类列表<a class="gicon-info-sign gicon_linkother" href="//www.wifenxiao.com/Index/help_show/lm/help/id/37.html" target="_blank"></a></h1>

            <div class="clearfix">
                <a href="javascript:;" class="btn btn-success fl j-editClass" title="添加分类" data-id="0" data-title="" data-pid="0" data-img="" data-serial="0" data-link="" >添加分类</a>

                <div class="fr">
                    <input type="text" placeholder="分类名称" class="input" name="class_name" value="">
                    <button class="btn btn-primary"><i class="gicon-search white"></i>查询</button>
                </div>
            </div>
            <table class="wxtables mgt15">
            <colgroup>
                <col width="2%">
                <col width="20%">
                <col width="20%">
                <col width="20%">
                <col width="20%">
            </colgroup>
            <thead>
            <tr>
                <td><i class="icon_check"></i></td>
                <td>分类名称</td>
                <td>排序</td>
                <td>创建时间</td>
                <td>操作</td>
            </tr>
            </thead>
            <tbody>
              <?php foreach ($list['data'] as $key => $v) {?>
                <tr>
                      <td>
                          <input type="checkbox" class="checkbox table-ckbs" data-id="<?php echo $v['id'];?>">
                      </td>
                      <td><?php echo $v['title'];?></td>
                      <td><?php echo $v['serial'];?></td>
                      <td><?php echo date('Y-m-d H:i:s',$v['updatetime']);?></td>
                      <td>
                          <a href="javascript:;" class="btn btn-mini btn-primary j-editClass" title="编辑" data-id="<?php echo $v['id'];?>" data-title="<?php echo $v['title'];?>" data-serial="<?php echo $v['serial'];?>" data-link="<?php echo $v['url'];?>" >编辑</a>
                          <a href="javascript:;" class="btn btn-mini btn-danger j-delClass" title="删除" data-id="<?php echo $v['id'];?>">删除</a>
                      </td>
                  </tr>
                <?php }?>
              </tbody>
        </table>
        <!-- end wxtables -->
        <div class="tables-btmctrl clearfix">
            <div class="fl">
            </div>
            <div class="fr">
                <div class="paginate"></div>
                <!-- end paginate -->
            </div>
        </div>
        <!-- end tables-btmctrl -->


        </div>
        <!-- end content-right -->

        <a href="javascript:;" class="btn-leftMenuFold" id="j-btn-leftMenuFold" ></a>
    </div>
</div>
<!-- end container -->
<!--tip-->
<!-- end footer -->
    <div class="fixedBar">
        <ul>
            <li class="shopManager3"><a href="javascript:;" data-target="#shop_3">商品管理</a></li>
            <li class="shopManager4"><a href="javascript:;" data-target="#shop_4">分组管理</a></li>
            <li class="shopManager5"><a href="javascript:;" data-target="#shop_5">批量导入</a></li>
        </ul>
        <a href="javascript:;" class="fixedBar-btn" id="j-fixedBar-btn"></a>
    </div><a href="#" id="j-gotop" class="gotop" title="回到顶部"></a>
<!-- end gotop -->

<!-- end CategoryPicker -->
    <script type="text/j-template" id="tpl_edit_class">
        <div class="formitems">
            <label class="fi-name"><span class="colorRed">*</span>分类名称：</label>
            <div class="form-controls">
                <input type="text"  class="input" name="title" value="<%= title %>">
                <span class="fi-help-text"></span>
            </div>
        </div>
        <div class="formitems">
            <label class="fi-name"><span class="colorRed"></span>分类排序：</label>
            <div class="form-controls">
                <input type="text"  class="input" name="serial" value="<%= serial %>">
                <span class="fi-help-text"></span>
            </div>
        </div>
        <div class="formitems">
            <label class="fi-name"><span class="colorRed"></span>链接地址：</label>
            <div class="form-controls">
                <input type="text"  class="input" name="link" value="<%=  link %>">
                <span class="fi-help-text"></span>
            </div>
        </div>
    </script>


<!--end front template  -->
<!--测试-->
<?php include "views/global_footer.php";?>

  <!-- diy js start-->
 	<script src="<?php echo SITE_ROOT;?>statics/plugins/ueditor/diyUeditor-min.js"></script>
	<script src="<?php echo SITE_ROOT;?>statics/plugins/uploadify/jquery.uploadify.min.js?ver=2054"></script>
	<script src="<?php echo SITE_ROOT;?>statics/js/jquery-ui/jquery-ui.min.js"></script>
	<script src="<?php echo SITE_ROOT;?>statics/plugins/diy/diy-min.js"></script>
	<script src="<?php echo SITE_ROOT;?>statics/plugins/colorpicker/colorpicker.js"></script><!-- diy js end -->
  <script src="<?php echo SITE_ROOT;?>statics/js/dist/Shop/edit_magazine_category.js"></script>
</body>
</html>
<!-- 20170105 -->
