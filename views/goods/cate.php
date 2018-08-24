
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
    <title>商品分类列表 - Bidcms开源电商</title>
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
            <h1 class="content-right-title">商品分类列表<a class="gicon-info-sign gicon_linkother" href="//www.wifenxiao.com/Index/help_show/lm/help/id/37.html" target="_blank"></a></h1>

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
                <col width="10%">
                <col width="10%">
                <col width="20%">
                <col width="18%">
            </colgroup>
            <thead>
            <tr>
                <td><i class="icon_check"></i></td>
                <td>分类名称</td>
                <td>商品数量</td>
                <td>排序</td>
                <td>创建时间</td>
                <td>操作</td>
            </tr>
            </thead>
            <tbody>
              <?php foreach ($list as $key => $v) {?>
                <tr>
                      <td>
                          <input type="checkbox" class="checkbox table-ckbs" data-id="<?php echo $v['id'];?>">
                      </td>
                      <td><?php echo str_repeat("&nbsp;&nbsp;",$v['cat_level']);?><?php echo $v['cat_name'];?></td>
                      <td><?php echo $v['goods_count'];?></td>
                      <td><?php echo $v['cat_displayorder'];?></td>
                      <td><?php echo date('Y-m-d H:i:s',$v['updatetime']);?></td>
                      <td>
                          <a href="javascript:;" class="btn btn-mini btn-primary j-editClass" title="编辑" data-id="<?php echo $v['id'];?>" data-title="<?php echo $v['cat_name'];?>" data-pid="<?php echo $v['cat_pid'];?>" data-img="<?php echo $v['cat_thumb'];?>" data-serial="<?php echo $v['cat_displayorder'];?>" data-link="<?php echo $v['url'];?>" >编辑</a>
                          <a href="javascript:;" class="btn btn-mini btn-danger j-delClass" title="删除" data-id="<?php echo $v['id'];?>">删除</a>
                      </td>
                  </tr>
                <?php }?>
              </tbody>
        </table>
        <!-- end wxtables -->
        <div class="tables-btmctrl clearfix">
            <div class="fl">
                <a href="javascript:;" class="btn btn-primary btn_table_selectAll">全选</a>
                    <a href="javascript:;" class="btn btn-primary btn_table_Cancle">取消</a>
                    <a href="javascript:;" class="btn btn-primary btn_table_delAll">批量删除</a>            </div>
            <div class="fr">
                <div class="paginate">
                                    </div>
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
            <li class="shopManager3"><a href="javascript:;" data-target="#shop_3">商品管理</a></li><li class="shopManager4"><a href="javascript:;" data-target="#shop_4">分组管理</a></li><li class="shopManager5"><a href="javascript:;" data-target="#shop_5">批量导入</a></li>        </ul>
        <a href="javascript:;" class="fixedBar-btn" id="j-fixedBar-btn"></a>
    </div><a href="#" id="j-gotop" class="gotop" title="回到顶部"></a>
<!-- end gotop -->



<!-- start CategoryPicker 小程序商品分类模仿商品分组-->
<script type="text/j-template" id="tpl_popbox_CategoryPicker">
	<div id="GoodsAndGroupPicker">
        <div class="tabs clearfix">
            <a href="javascript:;" class="active tabs_a fl" data-origin="goodsandgroup" data-index="1">商品</a>
            <a href="javascript:;" class="tabs_a fl j-tab-group" data-origin="goodsandgroup" data-index="2">商品分组</a>
        </div>
        <!-- end tabs -->
        <div class="tabs-content" data-origin="goodsandgroup">
            <div class="tc" data-index="1">
                <ul class="gagp-goodslist"></ul>
				<div class="clearfix mgt10">
					<div class="fl">
						<a href="javascript:;" class="btn btn-primary j-btn-goodsuse">确定使用</a>
					</div>
					<div class="paginate fr"></div>
				</div>
            </div>
            <div class="tc hide" data-index="2">
                <ul class="gagp-grouplist"></ul>
				<div class="clearfix mgt10">
					<div class="paginate fr"></div>
				</div>
            </div>
        </div>
	</div>
</script>

<script type="text/j-template" id="tpl_popbox_CategoryPicker_groupitem">
	<% _.each(dataset,function(data){%>
		<li class="clearfix" data-group="<%= data.group_id %>">
			<a href="<%= data.link %>" class="fl a_hover" target="_blank" title="<%= data.title %>"><%= data.title %></a>
			<a href="javascript:;" class="btn fr j-select">选取</a>
		</li>
	<% }) %>
</script>
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
            <label class="fi-name">上传图片：</label>
            <div class="form-controls pdt5 j-imglistPanel">
                <ul class="img-list clearfix">
                    <% if(img){%>
                    <li><span class="img-list-btndel j-delimg"><i class="gicon-trash white"></i></span><span class="img-list-overlay"></span><img src="<%= img %>"></li>
                    <% }else{ %>
                    <li class="img-list-add">+</li>
                    <% } %>


                </ul>
                <input type="hidden" name="file_path" class="j-imglist-dataset" value="<%= img %>">
            </div>
        </div>
        <div class="formitems">
            <label class="fi-name"><span class="colorRed">*</span>上级分类：</label>
            <div class="form-controls">
                <select name="pid" class="select">
                </select>
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
    <script type="text/j-template" id="tpl_class_item">
        <% if(data.length){ %>
            <% _.each(data,function(item){ %>
                <tr class="class_init<%= init %>_<%= id %>" data-initpid="<%= class_id %>">
                    <td>
                        <input type="checkbox" class="checkbox table-ckbs" data-id="<%= item.class_id %>">
                    </td>
                    <td><%= item.temp %><%= item.class_name %></td>
                    <td><%= item.item_num %></td>
                    <td style="text-align:center">
                        <% if(item.is_level == 1&&init < 3){ %><span class="j-getclass btn btn-success btn-mini" data-id="<%= item.class_id %>" data-init="<%= init+1 %>" data-pid="<%= id %>">显示下级</span><% } %>
                    </td>
                    <td><%= item.serial %></td>
                    <td><%= item.create_time %></td>
                    <td>
                        <a href="javascript:;" class="btn btn-mini btn-primary j-editClass" title="编辑" data-id="<%= item.class_id %>" data-title="<%= item.class_name %>" data-pid="<%= item.parent_id %>" data-img="<%= item.class_img %>" data-serial="<%= item.serial %>" data-link="<%= item.link %>" >编辑</a>
                        <a href="javascript:;" class="btn btn-mini btn-danger j-delClass" title="删除" data-id="<%= item.class_id %>">删除</a>
                        <a href="javascript:;" class="btn btn-mini btn-success j-copy" title="复制地址" data-copy="<%= item.url_link %>">分类商品地址</a>
                        <a href="javascript:;" class="btn btn-mini btn-success j-qrcode" title="二维码" data-url="<%= item.encode_link %>">二维码</a>
                        <a href="javascript:;" class="btn btn-mini btn-warning j-copy" title="复制地址" data-copy="<%= item.class_link %>">分类地址</a>
                    </td>
                </tr>
            <% }) %>
        <% } %>
    </script>

<!--end front template  -->
<!--测试-->

<?php include "views/global_template.php";?>
<?php include "views/global_footer.php";?>

  <!-- diy js start-->
 	<script src="<?php echo SITE_ROOT;?>statics/plugins/ueditor/diyUeditor-min.js"></script>
	<script src="<?php echo SITE_ROOT;?>statics/plugins/uploadify/jquery.uploadify.min.js?ver=2054"></script>
	<script src="<?php echo SITE_ROOT;?>statics/js/jquery-ui/jquery-ui.min.js"></script>
	<script src="<?php echo SITE_ROOT;?>statics/plugins/diy/diy-min.js"></script>
	<script src="<?php echo SITE_ROOT;?>statics/plugins/colorpicker/colorpicker.js"></script><!-- diy js end -->
  <script src="<?php echo SITE_ROOT;?>statics/js/dist/Item/list_class.js"></script>


</body>
</html>
<!-- 20170105 -->
