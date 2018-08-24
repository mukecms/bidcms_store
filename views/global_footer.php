<audio id="music-bg" preload="preload">
    <source src="<?php echo SITE_ROOT;?>statics/music/new-chat.ogg" type="audio/ogg">
    <source src="<?php echo SITE_ROOT;?>statics/music/new-chat.mp3" type="audio/mpeg">
</audio>
<!-- end 订单提示音 -->
<!------------------通用模板---------------------->
<script type="text/j-template" id="tpl_tooltips">
	<div class="tooltips" style="display:none;">
	    <span class="tooltips-arrow tooltips-arrow-<%= placement %>"><em>◆</em><i>◆</i></span>
	    <%= content %>
	</div>
</script>
<!-- end tooltips -->

<script type="text/j-template" id="tpl_hint">
	<div class="hint hint-<%= type %>"><%= content %></div>
</script>
<!-- end hint -->

<script type="text/j-template" id="tpl_jbox_simple">
	<div class="mgt30"><%= content %></div>
</script>
<!-- end tpl_jbox_simple -->

<script type="text/j-template" id="tpl_qrcode">
	<div id="qrcode">
		<img src="<%= src %>">
		<a href="javascript:;" class="qrcode-btn j-closeQrcode"><i class="gicon-remove white"></i></a>
	</div>
</script>
<!-- end qrcode -->

<!-- end 店铺信息模板 -->
<script type="text/j-template" id="tpl_jbox_domain_tip">
	<p style="line-height:1.8em;font-size:14px;">应微信转发规则要求，2016年3月30日后未启用顶级域名的商户后台部分营销功能使用将受限制，请抓紧办理。 <a href="statics/change_domain.html" style="color:blue" target="_blank">查看绑定域名流程</a></p>
</script>
<!-- end tpl_jbox_simple -->

<script type="text/j-template" id="tpl_order_remind">
    <div class="order-tip-box clearfix">
        <div class="order-con">
            <a href="javascript:;" class="order-close"></a>
            <div class="order-img fl"><img src="<?php echo SITE_ROOT;?>statics/images/clipboard.png"/></div>
            <div class="order-info">
            	<h2>您有一笔新订单</h2>
                <p class="order-no">订单编号：<%= order_no %></p>
                <p class="order-price">下单时间：<%= create_time %></p>
                <p class="order-price">实付金额：&yen;<%= payment %></p>
                <p class="order-price">订单状态：已付款</p>
            </div>
            <a href="/Order/lists" class="check-lists">查看更多</a>
        </div>
    </div>
</script>
<!-- end 订单提醒弹框 -->
<!------------------------------------end 通用模板------------------------------------>
<script type="text/javascript">
<!--
	var api_wxapp='<?php echo API_WXAPP;?>';
	var need_verify_set=false;
    var isOpenOrderNotice= 0; //是否开启订单提醒
    var isFirstLogin=1;
    var is_domain_tip=0;//域名注册引导弹窗
	var gg_id=12;
	var shop_id='<?php echo $GLOBALS["store_id"];?>';
	var global_sid='<?php echo $GLOBALS["store_id"];?>';
	var token='<?php echo $GLOBALS["token"];?>';
	var global_uid='';
	var bidcmsData={"customer": {"id":"8888","username":"bidcms","emails":"limengqi@bidcms.com","updatetime":"2017/07/12","sex":"1","mobile":"13800000000","headimgurl":"//shop.bidcms.com/statics/images/user.jpg","level":"普通会员","amount":"10000","point":"200","is_agent":"1"},"customer_count":{"mails":10,"amount":1000,"point":10}};
//-->
</script>
<script src="<?php echo SITE_ROOT;?>statics/js/dist/lib-min.js"></script>
<script src="<?php echo SITE_ROOT;?>statics/plugins/jbox/jquery.jbox-min.js"></script>

<!-- 线上环境 -->
<script src="<?php echo SITE_ROOT;?>statics/js/upload.js"></script>
<script src="<?php echo SITE_ROOT;?>statics/js/dist/component-min.js"></script>
<script src="<?php echo SITE_ROOT;?>statics/modulesJs/scroll.js"></script>
<script src="<?php echo SITE_ROOT;?>statics/js/dist/Public/verifySet.js"></script>
<!--[if lt IE 10]>
<script src="<?php echo SITE_ROOT;?>statics/js/jquery/jquery.placeholder-min.js"></script>
<script>
    $(function(){
        //修复IE下的placeholder
        $('.input,.textarea').placeholder();
    });
</script>
<![endif]-->
<iframe id="tempframe" name="tempframe" style="display:none;"></iframe>

<script>
    function parseFile(file){
        $("#"+file.key+"path").val(file.name.replace('..',''));
        $("#"+file.key+"path").trigger("change");
    }
	function parseMsg(data){
         HYD.hint("danger", data.msg);
         $("#"+field+"path").val('');
    }
    $(function(){
       $(".btn-notice").click(function(){
		   window.localStorage.setItem('status'+gg_id,true);
		   $('#gonggao').animate({bottom:"-270px"},1000);
	   });

       var showRecharge=function(data){

            //获取模板渲染数据
            var html=_.template($("#tpl_fenmob").html(),data),$render=$(html);

            $.jBox.show({
                title: "",
                content: $render,
                onOpen:function(jbox){
                    $(".jbox-container").css("height","");
                    $(".jbox").css("height","");
                    $(".jbox-title-txt").css("height","auto");
                    $(".jbox-title-txt").append("<img src=''>");
                    $(".jbox-title-txt img").attr("src","/statics/images/sqheader.png");
                    $(".jbox-title-txt img").css("width","100%");
                    $(".jbox-title-txt").css("padding-left","0px");
                    $(".jbox").css("border","0px solid transparent");
                    $(".jbox").css("width","600px");
                    // $(".jbox-overlay").css("left","50%");
                    // $(".jbox-overlay").css("top","50%");
                    $(".jbox-container").css("padding","0px 0px ");
                    $(".jbox-close").css("background","url('/statics/images/close.png') no-repeat");
                    $(".jbox").css("margin-left","-256px");
                    $(".jbox").css("margin-top","-147px");
                    //直接关闭弹窗
                    $render.find(".j-close").click(function(){
                        $.jBox.close(jbox);
                        return false;
                    });

                    //直接关闭弹窗，但不阻止冒泡
                    $render.find(".j-alipay").click(function(){
                        $.jBox.close(jbox);

                    });
                },
                btnOK: {show:false},
                btnCancel:{show:false}
            });
        }

        if(shop_id>0){
            //异步获取数据后，显示列表
			var product=window.localStorage.getItem('product');
			if(!product){
				$.ajax({
					url: api_wxapp+"index.php?con=biz&act=listMerchantsWithProductInfo",
					type: "post",
					dataType: "json",
					data: JSON.stringify({pid:shop_id,token:token}),
					beforeSend: function() {
					},
					success: function(data) {
						if (data.errcode == 0) {
							product=JSON.stringify(data);
							window.localStorage.setItem('product',product);
						} else {
							HYD.hint("danger", "对不起，操作失败：" + data.msg);
						}
					}
				});
			}
			if(product){
				product=JSON.parse(product);
				var html='';
				for(i in product.data){
					html+='<li><a href="'+product.data[i].linkUrl+'" target="_blank">'+product.data[i].merchantName+'</a></li>';
				}
				$("#applist").html(html);
			}
        }
    });
</script>
<!-- end session hint -->
<!--gonggao-->
<div id="gonggao">
    <div class="gonggao_tt"><i class="gicon_gg_up"></i>系统公告<a href="javascript:;" class="fr gound_close"></a></div>
    <div class="gonggao_cent">
        <div class="gonggao_cent_tt">【新增】系统设置新增银联收款账号</div>
        <div class="gonggao_cent_cent">
            <p><a href="/System/notice_list">新增银联收款账号后，客户端订单付款 ，充值，夺宝，代付，众筹等都可以选择银联支付。</a></p>
        </div>
    </div>
    <div class="gonggao_href"><a href="javascript:;" data-id="12" class="fl btn-notice">我知道了</a><a href="/System/notice_list">查看更多>></a></div>
</div>
<script>
	$(function () {
		s=window.localStorage.getItem('status12') || false;
		if(s==false){
			gggoup();
		}
		$('.gound_close').click(function(){
			$('#gonggao').animate({bottom:"-270px"},1000);
		});
	});
	function gggoup(){
		$('#gonggao').animate({bottom:"3px"},1000);
	};

    ;(function(){
        //订单提示弹窗
        var ordertip = function(data){
            var audio = document.getElementById('music-bg');
            var tpl=$("#tpl_order_remind").html(),//获取模板
            render=_.template(tpl,data),//渲染模板
            $tipbox=$(render);

            $("body").append($tipbox);

            playMusic();

            //显示弹框
            $tipbox.animate({bottom:"10px"},1000);

            //关闭订单弹窗
            $tipbox.find(".order-close").click(function(){
                $tipbox.animate({bottom:"-270px"},1000,function() {
                    $(this).remove();
                    pauseMusic();
                });
            });

            //订单提示音
            function playMusic(){
                audio.play();
            }
            function pauseMusic(){
                audio.pause();
            }
        }

        //有订单显示弹框
        if(isOpenOrderNotice == 1){
            $.ajax({
                url: "/Home/noticeNewOrder"+"?v="+Math.round(Math.random()*100),
                type: "post",
                dataType: "json",
                success: function(data) {
                    if(data.status == 1){
                        ordertip(data.data);
                    }
                }
            })
        }
    })();
</script>


<!--tip-->
<div class="footer">&copy; 2016  , Inc. All rights reserved.</div>
<!-- end footer -->
