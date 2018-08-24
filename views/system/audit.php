
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- 满足有些用户在手机端访问的需要 -->

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <title>分销商自动审核设置 - Bidcms开源电商</title>

        <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/css/component-min.css">    <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/plugins/jbox/jbox-min.css">
    <script type="text/javascript">
    <!--
		var URL_virChkb='index.php?con=system&act=setting';
    //-->
    </script>
    <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/plugins/diy/diy.css">
    <!-- diy css start-->
<link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/mobile/css/style.css">

	<link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/plugins/diy/diy-min.css">
<link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/plugins/uploadify/uploadify-min.css">
<link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/plugins/colorpicker/colorpicker.css">
<!-- diy css end-->

</head>
<body class="cp-bodybox">
<?php include "views/global_top.php";?>

<div class="container">
    <div class="inner clearfix">
        <div class="content-left fl">
        <?php include "views/global_nav.php";?>
        </div>
        <div class="content-right">
            <h1 class="content-right-title">分销商自动审核设置<a class="gicon-info-sign gicon_linkother" href="//www.wifenxiao.com/Index/help_show/lm/help/id/199.html" target="_blank"></a></h1>


    <div class="alert alert-info disable-del"><h4>提示</h4>开启该功能后，申请成为分销商将根据交易金额或交易次数判断是否自动通过。</div>

    <div class="sysPanel">
        <div class="sysPanel-con">
            <div class="sysPanel-title">功能开关</div>
            <div class="sysPanel-tip">开启后，申请成为分销商将根据交易金额或交易次数判断是否自动通过。</div>
        </div>
        <div class="vir-chkb j-vir-chkb">
            <div class="vir-chkb-actions clearfix">
                <a href="javascript:;" class="vir-chkb-enable">已开启</a>
                <a href="javascript:;" class="vir-chkb-disable">已关闭</a>
            </div>
            <input type="radio" name="automatic_audit" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['automatic_audit']==1?'checked':'';?>>
        </div>
    </div>

    <div class="sysPanel hide draw">
        <div class="sysPanel-con">
            <div class="sysPanel-title">免申请功能</div>
            <div class="sysPanel-tip">开启后，会员符合条件时将自动成为分销商。</div>
        </div>
        <div class="vir-chkb j-vir-chkb">
            <div class="vir-chkb-actions clearfix">
                <a href="javascript:;" class="vir-chkb-enable">已开启</a>
                <a href="javascript:;" class="vir-chkb-disable">已关闭</a>
            </div>
            <input type="radio" name="automatic_free_application" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['automatic_free_application']==1?'checked':'';?>>
        </div>
    </div>

    <div class="sysPanel">
        <div class="sysPanel-con">
            <div class="sysPanel-title">注册即为分销商</div>
            <div class="sysPanel-tip">开启此功能，会员注册后自动成为分销商</div>
        </div>
        <div class="vir-chkb j-vir-chkb">
            <div class="vir-chkb-actions clearfix">
                <a href="javascript:;" class="vir-chkb-enable">已开启</a>
                <a href="javascript:;" class="vir-chkb-disable">已关闭</a>
            </div>
            <input type="radio" name="is_register_agent" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['is_register_agent']==1?'checked':'';?>>
        </div>
    </div>

    <div class="sysPanel hide draw">
        <div class="formitems">
            <label class="fi-name" ><span class="colorRed"></span>订单状态：</label>
            <div class="form-controls" style="padding-top:5px;">
                <label><input name="automatic_audit_order_status" type="radio" class="j-radio-autosave" value="1" <?php echo $shopinfo['automatic_audit_order_status']==1?'checked':'';?> />交易成功的订单</label>　　
                <label><input name="automatic_audit_order_status" type="radio" class="j-radio-autosave" value="2" <?php echo $shopinfo['automatic_audit_order_status']==2?'checked':'';?>/>已付款的订单</label>
                <span class="j-autosavePanel"></span>
                <span class="fi-help-text">选择“交易成功的订单”，只判断会员交易成功的订单是否满足下面的条件；<br>选择“已付款的订单”，将判断会员付过款的订单是否满足下面的条件。</span>
            </div>
        </div>
        <div class="formitems">
            <label class="fi-name" ><span class="colorRed"></span>一级下级人数：</label>
            <div class="form-controls" style="padding-top:5px;">
                <input type="text" class="input mini j-text-autosave j-pid" name="automatic_level_count" value="<?php echo $shopinfo['automatic_level_count'];?>">
                <spna>人</spna>
                <span class="fi-help-text">为空不做判断</span>
            </div>
        </div>
        <div class="sysPanel-divider"><span style="color:#a7a7a7">
        当会员满足下列交易条件或购买指定商品时即可成为分销商</span></div>
        <div class="formitems clearfix">
            <label class="fi-name" ><span class="colorRed"></span>交易条件：</label>
            <div class="form-controls fl" style="margin:0 20px 0 10px;">
                <span>金额满</span>
                <input type="text" class="input mini j-text-autosave j-pid" name="automatic_audit_amount" value="<?php echo $shopinfo['automatic_audit_amount'];?>">
                <span>元</span>
            </div>
            <div class="form-controls fl" style="margin:6px 20px 0 0">
                <label><input name="automatic_audit_map" type="radio" class="j-radio-autosave" value="1" <?php echo $shopinfo['automatic_audit_map']==1?'checked':'';?>/>或</label>
				<label><input name="automatic_audit_map" type="radio" class="j-radio-autosave" value="0" <?php echo $shopinfo['automatic_audit_map']==0?'checked':'';?>/>且</label>
                <span class="j-autosavePanel"></span>
                <span class="fi-help-text"></span>
            </div>
            <div class="form-controls fl" style="margin-left:0px;">
                <span>交易满</span>
                <input type="text" class="input mini j-text-autosave j-pid" name="automatic_audit_num" value="<?php echo $shopinfo['automatic_audit_num'];?>">
                <spna>次</spna>
            </div>
            <span class="fi-help-text fl" style="margin:6px 0 0 10px;">( 为空不做判断 )</span>
        </div>
       <!--  <div class="formitems">
            <label class="fi-name" ><span class="colorRed"></span>选择条件：</label>
            <div class="form-controls" style="padding-top:5px;">
                <label><input name="automatic_audit_map" type="radio" class="j-radio-autosave" value="1"checked="checked" />或</label>　　
                <label><input name="automatic_audit_map" type="radio" class="j-radio-autosave" value="0" />与</label>
                <span class="j-autosavePanel"></span>
                <span class="fi-help-text"></span>
            </div>
        </div> -->
       <!--  <div class="formitems">
            <label class="fi-name"><span class="colorRed"></span>交易次数：</label>
            <div class="form-controls" style="padding-top:5px;">
                <input type="text" class="input mini j-text-autosave j-pid" name="automatic_audit_num" value=""><spna>次</spna>
                <span class="fi-help-text">为空不做判断</span>
            </div>
        </div> -->
        <div class="formitems">
            <label class="fi-name"><span class="colorRed">*</span>指定商品：</label>
            <div class="form-controls j-imglistPanel">
                <ul class="img-list clearfix">
                    <li class="img-list-add j-addgoods">+</li>
                </ul>
                <input type="hidden" id="item_id" name="item_id" class="j-verify j-text-autosave" value="<?php echo $shopinfo['item_ids'];?>">
                <!-- <span class="fi-help-text">当会员购买指定商品或者满足上面条件时，成为分销商。</span> -->
            </div>
        </div>
        <div class="formitems">
            <label class="fi-name" ><span class="colorRed"></span>指定商品条件：</label>
            <div class="form-controls" style="padding-top:5px;">
                <label><input name="automatic_item_map" type="radio" class="j-radio-autosave" value="0" <?php echo $shopinfo['automatic_item_map']==0?'checked':'';?> />购买1件</label>　　
                <label><input name="automatic_item_map" type="radio" class="j-radio-autosave" value="1" <?php echo $shopinfo['automatic_item_map']==1?'checked':'';?>/>购买全部</label>
                <span class="j-autosavePanel"></span>
                <span class="fi-help-text">当选择购买全部时，则购买全部指定商品才能成为分销商</span>
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
            <li class="shopManager21"><a href="javascript:;" data-target="#shop_21">系统设置</a></li><li class="shopManager22"><a href="javascript:;" data-target="#shop_22">域名管理</a></li><li class="shopManager23"><a href="javascript:;" data-target="#shop_23">在线客服</a></li><li class="shopManager24"><a href="javascript:;" data-target="#shop_24">微信设置</a></li><li class="shopManager25"><a href="javascript:;" data-target="#shop_25">素材库</a></li><li class="shopManager26"><a href="javascript:;" data-target="#shop_26">短信</a></li><li class="shopManager27"><a href="javascript:;" data-target="#shop_27">物流管理</a></li><li class="shopManager29"><a href="javascript:;" data-target="#shop_29">系统日志</a></li>        </ul>
        <a href="javascript:;" class="fixedBar-btn" id="j-fixedBar-btn"></a>
    </div><a href="#" id="j-gotop" class="gotop" title="回到顶部"></a>
<!-- end gotop -->


<?php include "views/global_template.php";?>

<?php include "views/global_footer.php";?>
<!-- diy js start-->
<script src="<?php echo SITE_ROOT;?>statics/plugins/ueditor/diyUeditor-min.js"></script>
<script src="<?php echo SITE_ROOT;?>statics/plugins/uploadify/jquery.uploadify.min.js?ver=1"></script>
<script src="<?php echo SITE_ROOT;?>statics/js/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo SITE_ROOT;?>statics/plugins/diy/diy-min.js"></script>
<script src="<?php echo SITE_ROOT;?>statics/plugins/colorpicker/colorpicker.js"></script><!-- diy js end -->
<script>
	$(function(){
		var Cache=[];//缓存数据数据
		var ids = $('.j-verify').val().split(",");

		if($('input[name="automatic_audit"]').is(":checked")){
			$(".draw").removeClass('hide');
		}else{
			$(".draw").addClass('hide');
		}

		$('input[name="automatic_audit"]').change(function(){
			if($(this).is(":checked")){
				$(".draw").removeClass('hide');
			}else{
				$(".draw").addClass('hide');
			}
		});

		$(document).on('click','.j-addgoods',function(){
			var ids = $('.j-verify').val().split(",");
			$.selectGoods({
				selectMod:2,
				selectIds:ids,
				callback:function(data,ids){
					//判断是对象还是数组
					if(Object.prototype.toString.call(data).toLowerCase() == "[object object]"){
						Cache.push(data);
					}else if(Object.prototype.toString.call(data).toLowerCase() == "[object array]"){
						Cache=Cache.concat(data);
					}
					reRender(Cache);
					$('#item_id').val($('.j-verify').val()).change();
				}
			});
		});

		//重新渲染数据
		var reRender = function(cache) {
			var $conitem = $('.j-imglistPanel');
			var tpl_con = $('#tpl_add_imgList').html();

			var $render = $(_.template(tpl_con, {data:cache}));
			$conitem.find(".img-list").empty().append($render);

			var newsids = $render.filter('input[name="goods_ids"]').val();
			$('.j-verify').val(newsids);
		}

		function getlistdata(callback){
			$.ajax({
				url:'index.php?con=design&act=getItem',
				type: 'post',
				dataType:'json',
				data :{
					item_id :ids
				},
				success:function(data){
					Cache = data.list;
					reRender(Cache);
					if(callback) callback();
				}
			})
		};
		getlistdata();

		//删除商品
		$(document).on("click",".j-delgoods",function() {
			var index = $(this).parents("li").index();
			Cache.splice(index, 1);
			reRender(Cache);
			$('#item_id').val($('.j-verify').val()).change();
			return false;
		});

		// function reRender(data){
		//     if(data.is_compress == 1){
		//         var $html = '<li class="j-addgoods"><img src="'+data.pic+'80x80"/></li>';
		//     }else{
		//         var $html = '<li class="j-addgoods"><img src="'+data.pic+'"/></li>';
		//     }

		//     var $tpl_con= $('.img-list');
		//     if($('.img-list li').leight = 1){
		//         $(".j-verify").val("");
		//         $tpl_con.empty().append($html);//插入dom
		//     }
		//     $("#item_id").val(data.item_id).change();
		// }

		// 删除图片
		// $(document).on("click", ".j-delimg", function() {
		//     var str = '<li class="img-list-add  j-addgoods">+</li>';
		//     $('.img-list').empty().append(str);
		//     $("#item_id").val('').change();
		// });
	});
</script>
</body>
</html>
<!-- 20170105 -->
