
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <title>店铺主页 - Bidcms开源电商</title>
    <!-- 线上环境 -->
        <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/css/component-min.css">
		<link rel="stylesheet" href="statics/plugins/jbox/jbox-min.css">

		<link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/css/Shop/list_homepage.css">
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


    <h1 class="content-right-title">店铺主页<a class="gicon-info-sign gicon_linkother" href="//www.wifenxiao.com/Index/help_show/lm/help/id/29" target="_blank"></a></h1>


	 <!-- <div class="alert alert-info disable-del"><strong>为迎接双十一，打造更稳定快速的运行环境，系统启用新的个性二级域名（只需3步，<a href="statics/open_second_level_domain" target="_blank" class="colorRed">查看操作步骤</a>），截止11月30日。感谢支持！</strong></div> -->
	<div class="hPage-using" style="display:none;">
		<h3 class="cst_h3">当前使用的模板</h3>
		<div class="clearfix mgt20">
			<div class="hPage-using-preview fl">
				<img src="" alt="" id="theme_thumb">
			</div>
			
			<div class="fl hPage-using-info">
				<ul>
					<li style="display:flex">
						<span>模板名称：</span>
						<span id="theme_title"></span>
					</li>
					<li class="clearfix">
						<span>店铺首页链接：</span>
						<span><?php echo $url;?></span>
					</li>
					<li class="clearfix" style="display:flex">
						<div>店铺首页二维码：</div>
						<div style="text-align:center;"><img src="//shop.bidcms.com/tool/qrcode.php?link=<?php echo urlencode($url);?>" id="home_qrcode" class="hPage-using-qrcode"><br/><br/><a href="index.php?con=shop&act=edit_home" class="btn btn-primary" id="edit">编辑</a>
						<a href="<?php echo $url;?>" target="_blank" class="btn btn-success">预览</a></div>
						<div style="padding-left:10px;">小程序关联：</div>
						<div id="wxapp" style="text-align:center;"><img src="statics/images/wxapp.jpg" class="hPage-using-qrcode"><br/><br/><a href="//shop.bidcms.com/basis.html#/app/<?php echo $GLOBALS['store_id'];?>/wechat/miniApp/list" class="btn btn-primary" >绑定小程序</a></div>
						<div style="padding-left:10px;">公众号关联：</div>
						<div id="wxmp" style="text-align:center;"><img src="statics/images/wxmp.jpg" class="hPage-using-qrcode"><br/><br/><a href="//shop.bidcms.com/basis.html#/app/<?php echo $GLOBALS['store_id'];?>/wechat/officalAccountManagement/officalAccountSet" class="btn btn-primary" target="_blank">绑定公众号</a></div>
					</li>
				</ul>
				
			</div>
		</div>
	</div>
	<!-- end 当前使用的模板 -->

	<h3 class="cst_h3 mgt30">可使用的模板</h3>
	<!-- end 可使用的模板 -->
	<ul class="hPage-tpls clearfix mgt20 mgb20">
		
	</ul>

</div>
<!-- end content-right -->
</div>
</div>
<!-- end container -->

<div class="fixedBar" style="right: 5px;">
	<ul>
		<li class="shopManager0 cur"><a href="javascript:;" data-target="#shop_0">店铺管理</a></li><li class="shopManager1"><a href="javascript:;" data-target="#shop_1">自定义专题</a></li>
	</ul>
	<a href="javascript:;" class="fixedBar-btn" id="j-fixedBar-btn"></a>
</div>
<!-- end gotop -->
<!-- start GoodsAndGroupPicker -->
<script type="text/j-template" id="tpl_popbox_version">
	<% _.each(dataset,function(data){%>
		<div style="border:1px solid #eee;border-radius:5px;padding:0.5rem;line-height:1.5rem;position:relative;margin-bottom:10px;">
			<div style="font-size:1rem;"><%= data.name %><em style="color:#428bca"><%= data.num %></em></div>
			<p style="color:#999"><%= data.desc %></p>
			<button class="btn btn-primary" onclick="publish(<%= data.id %>)" type="button" style="position:absolute;right:1rem;top:1rem;">选择此版本</button>
		</div>
	<% }) %>
</script>
<?php include "views/global_footer.php";?>

<script>
	var templates=<?php echo $json;?>;
	var template_id='<?php echo $homepage["theme_id"];?>';
	var site_root='<?php echo SITE_ROOT;?>';
	var api_wxapp='<?php echo API_WXAPP;?>';
	var html='';
	for(i in templates.data.rows){
		html+='<li class="fl">'+
            '<div class="hPage-tpls-img">'+
            '    <img id="thumb'+templates.data.rows[i].id+'" src="'+templates.data.rows[i].cover+'" alt="'+templates.data.rows[i].name+'">'+
            '</div>'+
            '<div class="albums-cr-imgs-selected"  id="cover'+templates.data.rows[i].id+'" style="display: none;"><i></i></div>'+
			'<div class="hPage-tpls-overlay">'+
			'	<div class="hPage-tpls-acitons">'+
			'		<a href="javascript:;" class="btn btn-small btn-success js-set" data-id="'+templates.data.rows[i].id+'">启用</a>'+
			'		<a href="index.php?con=shop&act=edit_home&tid='+templates.data.rows[i].id+'" class="btn btn-small mgl10">编辑</a>'+
			'	</div>'+
			'</div>'+
		'</li>';
	}
	$(".hPage-tpls").html(html);
    function setDefault(tpl_id){
		if(tpl_id>0){
			$(".hPage-using").show();
			$("#theme_title").html($("#thumb"+tpl_id).attr('alt'));
			$("#theme_thumb").attr('src',$("#thumb"+tpl_id).attr('src'));
			$("#cover"+tpl_id).show();
		}
        
    }
    setDefault(template_id);
	$(function(){
		$(".hPage-tpls li").hover(function(){
			$(this).addClass("showActions");
		},function(){
			$(this).removeClass("showActions");
		});
        $(".js-set").click(function(){
            id=$(this).data('id');
            $.post("index.php?con=shop&act=set_home",{id:id},function(data){
                if(data.status==1){
                    $(".albums-cr-imgs-selected").hide();
                    setDefault(id);
                }
            },'json');

        });

	});
	$.ajax({
	   url: api_root+'wxapp/index.php?con=foundation&act=getAppInfo',
	   data:JSON.stringify({pid:shop_id,type:'store'}),
	   type: 'post',
	   dataType:'json',
	   success: function(res) {
		   if(res.errorcode=='0'){
			   var list=res.data.list;
			   for(i in list){
				   if(0==list[i].service){
						str='';
						str='<img src="'+list[i].qrcodeUrl+'" class="hPage-using-qrcode"><br/><br/><a href="//shop.bidcms.com/basis.html#/app/'+shop_id+'/wechat/miniApp/list" class="btn btn-primary" target="_blank">管理</a>';
						if(list[i].versionStatus!=1){
							str+='&nbsp;&nbsp;<a href="javascript:;" onclick="audit();" class="btn btn-success">提交</a>';
						} else if(list[i].versionStatus==3){
							str+='&nbsp;&nbsp;<a href="javascript:;" onclick="release();" class="btn btn-success">发布</a>';
						}
						str+='<div style="margin-top:10px;">'+list[i].nickName+'(<strong style="color:#ff0000;padding-left:5px;padding-right:5px;">'+list[i].versionStatusName+'</strong>)</div>';
						$("#wxapp").html(str);
				   }
				   if(2==list[i].service){
					   str='<img src="'+list[i].qrcodeUrl+'" class="hPage-using-qrcode"><br/><br/><a href="//shop.bidcms.com/basis.html#/app/'+shop_id+'/wechat/officalAccountManagement/officalAccountSet" class="btn btn-primary" target="_blank">管理公众号</a>';
						$("#wxmp").html(str);
				   }
			   }
			}
	   }
	});
	function audit(){
		$.ajax({
		   url: api_root+'wxapp/index.php?con=core&act=version',
		   data:JSON.stringify({pid:shop_id,type:'store'}),
		   type: 'POST',
		   dataType:'json',
		   success: function(res) {
			   if(res.errcode=='0'){
					$.jBox.show({
						title: "选择版本号",
						content: _.template($("#tpl_popbox_version").html(), {
							dataset:res.data.list
						}),
						btnOK:{show:false},
						btnCancel:{show:false}
					})
			   } else {
				   alert(res.errmsg);
			   }
		   }
		});
		
		
	}
	function publish(id){
		if(confirm('确认通过审核？')){
			var url=api_root+'wxapp/index.php?con=core&act=publish';
			if(shop_id>0 && id>0){
				$.ajax({
				   url: url,
				   data:JSON.stringify({pid:shop_id,token:token,vid:id}),
				   type: 'POST',
				   dataType:'json',
				   success: function(res) {
					   if(res.errcode==0){
						   alert(res.errmsg);
						   window.location.reload();
					   } else {
						   alert(res.errmsg);
					   }
				   }
				});
			}
		}
	}
	function release(){
		if(confirm('确认发布代码？')){
			var url=api_root+'wxapp/index.php?con=wxapp&act=release';
			if(shop_id>0){
				var appid=$(this).data('appid');
				$.ajax({
				   url: url,
				   data:JSON.stringify({pid:shop_id,appid:appid}),
				   type: 'PUT',
				   dataType:'json',
				   success: function(res) {
					   if(res.errcode=='0'){
						   alert("发布成功");
						   window.location.reload();
					   } else {
						   alert(res.errmsg);
					   }
				   }
				});
			}
		}
	}
</script>



</body>
</html>
<!-- 20160505 -->
