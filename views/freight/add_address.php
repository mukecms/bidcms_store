
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- 满足有些用户在手机端访问的需要 -->

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <title>添加自提地址 - Bidcms开源电商</title>
    <!-- 线上环境 -->
        <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/css/component-min.css">
		<link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/plugins/jbox/jbox-min.css">

    <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/plugins/uploadify/uploadify-min.css">
    <style>
        .amap-icon{
            width:28px;
            height: 37px;
        }
        .amap-icon img{
            display: block;
            width: 100%;
        }
        .amap-marker-label{
            border:0;
            background: none;
            padding: 10px;
        }
        .mapAddress{
            background-color: #fff;
            padding: 15px;
            border: 1px solid #ccc;
            position: relative;
            z-index: 1;
            font-size: 14px;
            color: #cc3300;
            box-shadow: -2px -2px 5px #666;
        }
        .mapAddress i{
            position: absolute;
            z-index: 99;
            left:-21px;
            top:50%;
            display: block;
            width: 22px;
            height: 14px;
            background-image: url(/statics/images/mapMarkbg.png);
            background-repeat: no-repeat;
            background-position: 0 0;
            margin-top: -5px;
        }
    </style>

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
            <h1 class="content-right-title">添加自提地址</h1>


    <form action="index.php" method="post" id="form1">
	<input type="hidden" name="commit" value="1">
	<input type="hidden" name="con" value="freight">
	<input type="hidden" name="act" value="add_address">
  <input type="hidden" name="update_id" value="<?php echo $info['id'];?>">
        <div class="formitems inline">
            <label class="fi-name"><span class="colorRed">*</span>联系人姓名：</label>
            <div class="form-controls">
                <input type="text" placeholder="联系人姓名" name="name" class="input" value="<?php echo $info['name'];?>">
                <span class="fi-help-text"></span>
            </div>
        </div>
        <div class="formitems inline">
            <label class="fi-name"><span class="colorRed">*</span>联系人手机号：</label>
            <div class="form-controls">
                <input type="text" placeholder="联系人手机号" name="mobile" class="input"  value="<?php echo $info['mobile'];?>">
                <span class="fi-help-text"></span>
            </div>
        </div>
        <div class="formitems inline">
            <label class="fi-name"><span class="colorRed"></span>联系人固定电话：</label>
            <div class="form-controls">
                <input type="text" placeholder="联系人固定电话" name="phone" class="input" value="<?php echo $info['phone'];?>">
                <span class="fi-help-text"></span>
            </div>
        </div>
        <div class="formitems inline">
            <label class="fi-name"><span class="colorRed"></span>店名：</label>
            <div class="form-controls">
                <input type="text" placeholder="店名" name="store_name" class="input"  value="<?php echo $info['store_name'];?>">
                <span class="fi-help-text"></span>
            </div>
        </div>
        <div class="formitems">
            <label class="fi-name">上传图片：</label>
            <div class="form-controls pdt5 j-imglistPanel">
                <ul class="img-list clearfix">

                  <?php if(!empty($info['imgdir'])){?>
                    <li><span class="img-list-btndel j-delimg"><i class="gicon-trash white"></i></span><span class="img-list-overlay"></span><img src="<?php echo $info['imgdir'];?>"></li>
                  <?php } else {?>
                    <li class="img-list-add">+</li>
                  <?php }?>
                </ul>
                <input type="hidden" name="imgdir" class="j-imglist-dataset" value="<?php echo $info['imgdir'];?>">
            </div>
        </div>
        <div class="formitems inline">
            <label class="fi-name"><span class="colorRed"></span>经度：</label>
            <div class="form-controls">
                <input type="text" placeholder="经度" name="longitude" class="input" value="<?php echo $info['longitude'];?>" readonly>
                <span class="fi-help-text"></span>
            </div>
        </div>
        <div class="formitems inline">
            <label class="fi-name"><span class="colorRed"></span>纬度：</label>
            <div class="form-controls">
                <input type="text" placeholder="纬度" name="latitude" class="input" value="<?php echo $info['latitude'];?>" readonly>
                <span class="fi-help-text">请移动地图上的红点设置详细地址经纬度，双击鼠标左键放大地图移动位置。</span>
            </div>
        </div>
        <div class="formitems inline">
            <label class="fi-name"><span class="colorRed">*</span>详细地址：</label>
            <div class="form-controls">
                <textarea name="address" id="address" class="textarea small"><?php echo $info['address'];?></textarea>
                <span class="fi-help-text"></span>
            </div>
        </div>
        <input value="110000" type="hidden"  id="province_id">
        <input value="110100" type="hidden"  id="city_id">
        <input  value="" type="hidden" id="area_id">
        <div class="mgl120 ">
            <input type="submit" class="btn btn-primary"  value="保存">
        </div>
    </form>
    <!-- 地址搜索 -->
    <div class="formitems" style="padding-left: 598px;margin-bottom:-20px;margin-top:20px;">
        <label class="fi-name"><span class="colorRed"></span>地址搜索：</label>
        <div class="form-controls">
            <input type="text" placeholder="请输入搜索地址" name="mapaddress" class="input" value="">
            <a href="javascript:;" class="btn btn-primary" id="getMapAddress">搜索</a>
        </div>
    </div>
    <!-- Map -->
    <div class="mgt10" style="height:500px;padding:10px;border: 1px solid #ccc;-webkit-box-sizing:border-box;box-sizing:border-box;">
        <div id="MapContainer" style="width:100%;height:100%;"></div>
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
</div>
<a href="#" id="j-gotop" class="gotop" title="回到顶部"></a>
<!-- end gotop -->
<?php include "views/global_template.php";?>
<?php include "views/global_footer.php";?>
<!--end front template  -->
<!-- diy js start-->
<script src="<?php echo SITE_ROOT;?>statics/plugins/ueditor/diyUeditor-min.js"></script>
<script src="<?php echo SITE_ROOT;?>statics/plugins/uploadify/jquery.uploadify.min.js?ver=4994"></script>
<script src="<?php echo SITE_ROOT;?>statics/js/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo SITE_ROOT;?>statics/plugins/diy/diy-min.js"></script>
<script src="<?php echo SITE_ROOT;?>statics/plugins/colorpicker/colorpicker.js"></script><!-- diy js end -->
<script type="text/javascript" src="//webapi.amap.com/maps?v=1.3&key=de4d841a9e2138bf29b9c846d5969dea&plugin=AMap.Autocomplete,AMap.Geocoder"></script>
<script src="<?php echo SITE_ROOT;?>statics/js/dist/User/store_address.js"></script>

</body>
</html>
<!-- 20170105 -->
