<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- 满足有些用户在手机端访问的需要 -->

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <title>专题页面 - Bidcms开源电商</title>
    <!-- 线上环境 -->
        <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/css/component-min.css">
        <link rel="stylesheet" href="statics/plugins/jbox/jbox-min.css">

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
            <h1 class="content-right-title">专题页面<a class="gicon-info-sign gicon_linkother" href="//www.wifenxiao.com/Index/help_show/lm/help/id/38.html" target="_blank"></a></h1>


    <a href="index.php?con=special&act=edit" class="btn btn-success">新建页面</a>

        <div class="tabs clearfix mgt15">
            <a href="/Shop/list_magazine/status/1.html" class="active tabs_a fl">已上架</a>
            <a href="/Shop/list_magazine/status/0.html" class=" tabs_a fl">草稿箱</a>

            <form action="" method="post">
            <div class="tables-searchbox pd0 fr">
                <select name="magazine_category_id" class="select">
                    <option value="0" selected>所有分类</option>
                    <option value="4003377" >专题分类名称</option>                </select>
                <input type="text" placeholder="页面标题" class="input" name="title" value="">
                <input type="hidden" name="status" value="1">
                <button class="btn btn-primary"><i class="gicon-search white"></i>查询</button>
            </div>
            </form>
        </div>
        <!-- end tabs -->

        <table class="wxtables mgt15">
            <colgroup>
                <col width="5%">
                <col width="25%">
				<col width="8%">
				<col width="8%">
				<col width="8%">
				<col width="8%">
                <col width="15%">
                <col width="23%">
            </colgroup>
            <thead>
            <tr>
                <td></td>
                <td>页面名称</td>
                <td>当日UV</td>
                <td>当日PV</td>
                <td>总UV</td>
                <td>总PV</td>
                <td>创建时间</td>
                <td>操作</td>
            </tr>
            </thead>
            <tbody>
            <?php if($list['data']){?>
            <?php foreach($list['data'] as $k=>$v){?>
            <tr id="list<?php echo $v['id'];?>">
                <td>
                    <input type="checkbox" class="checkbox table-ckbs" data-id="<?php echo $v['id'];?>">
                </td>
                <td>
                    <a href="mobile/index.php?con=special&id=<?php echo $v['id'];?>" class="block" target="_blank" title="<?php echo $v['title'];?>">
                        <p><?php echo $v['title'];?></p>
                    </a>
                </td>
				<td>
                    0
                </td>
				<td>
                    0
                </td>
				<td>
                    0
                </td>
				<td>
                    0
                </td>
                <td><?php echo date('Y-m-d H:i',$v['updatetime']);?></td>
                <td>
                    <a href="index.php?con=special&act=edit&id=<?php echo $v['id'];?>" class="btn btn-mini btn-primary" title="修改">编辑</a>
                    <a href="javascript:;" class="btn btn-mini btn-danger j-del" title="删除" data-id="<?php echo $v['id'];?>">删除</a>
                    <a href="javascript:;" class="btn btn-mini btn-success j-qrcode" title="二维码" data-url="<?php echo WAP_ROOT;?>index.php?con=special&id=<?php echo $v['id'];?>">二维码</a></td>
            </tr>
            <?php }?>
            <?php } else {?>
            <tr><td colspan="4">暂无信息</td></tr>
            <?php }?>
            </tbody>

        </table>
        <!-- end wxtables -->
        <div class="tables-btmctrl clearfix">
            <div class="fl">
                    <a href="javascript:;" class="btn btn-primary btn_table_selectAll">全选</a>
                    <a href="javascript:;" class="btn btn-primary btn_table_Cancle">取消</a>
                    <a href="javascript:;" class="btn btn-primary btn_table_offshelf">下架</a>
                                            <a href="javascript:;" class="btn btn-primary btn_table_delAll">删除</a>
            </div>

            <div class="fr">
                <div class="paginate">
                                    </div>
                <!-- end paginate -->
            </div>
        </div>        <!-- end tables-btmctrl -->

        </div>
        <!-- end content-right -->

        <a href="javascript:;" class="btn-leftMenuFold" id="j-btn-leftMenuFold"></a>
    </div>
</div>
<!-- end container -->

<!--gonggao-->
<div id="gonggao">
        <div class="gonggao_tt"><i class="gicon_gg_up"></i>系统公告<a href="javascript:;" class="fr gound_close"></a></div>
        <div class="gonggao_cent">
            <div class="gonggao_cent_tt">【新增】系统设置新增银联收款账号</div>
            <div class="gonggao_cent_cent">
                <p><a href="/System/notice_list">新增银联收款账号后，客户端订单付款 ，充值，夺宝，代付，众筹等都可以选择银联支付。</a></p>
            </div>
        </div>
        <div class="gonggao_href"><a href="javascript:;" class="fl btn-notice">我知道了</a><a href="/System/notice_list">查看更多>></a></div>
    </div>
<!--tip-->
<!-- end footer -->
    <div class="fixedBar">
        <ul>
            <li class="shopManager0"><a href="javascript:;" data-target="#shop_0">店铺管理</a></li><li class="shopManager1"><a href="javascript:;" data-target="#shop_1">自定义专题</a></li>        </ul>
        <a href="javascript:;" class="fixedBar-btn" id="j-fixedBar-btn"></a>
    </div><a href="#" id="j-gotop" class="gotop" title="回到顶部"></a>
<!-- end gotop -->

<audio id="music-bg" preload="preload">
    <source src="<?php echo SITE_ROOT;?>statics/music/new-chat.ogg" type="audio/ogg">
    <source src="<?php echo SITE_ROOT;?>statics/music/new-chat.mp3" type="audio/mpeg">
</audio>
<!-- end 订单提示音 -->


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

<script type="text/j-template" id="tpl_verify_set">

    <div class="tabs clearfix mgt15" id="verify-set-tabs">
        <a href="javascript:;" class="tabs_a fl active">店铺信息设置</a>
        <a href="javascript:;" class="tabs_a fl">微信设置</a>
        <a href="javascript:;" class="tabs_a fl">佣金设置</a>
    </div>
    <form action="" method="post" id='form-set'>

        <!-- 店铺信息 -->
        <div class="panel-single panel-single-light mgt20 verify-set-div ">
            <div class="formitems">
                <label class="fi-name"><span class="colorRed">*</span>店铺名称：</label>
                <div class="form-controls">
                    <input type="text" class="input" name="title" value="">
                    <span class="fi-help-text"></span>
                </div>
            </div>
            <div class="formitems">
                <label class="fi-name"><span class="colorRed">*</span>联系人：</label>
                <div class="form-controls">
                    <input type="text" class="input" name="contact_name" value="">
                    <span class="fi-help-text"></span>
                </div>
            </div>
            <div class="formitems">
                <label class="fi-name"><span class="colorRed">*</span>联系电话：</label>
                <div class="form-controls">
                    <input type="text" class="input" name="contact_phone" value="">
                    <span class="fi-help-text"></span>
                </div>
            </div>
            <div class="formitems">
                <label class="fi-name">店铺简介：</label>
                <div class="form-controls">
                    <textarea class="textarea" name="description"></textarea>
                    <span class="fi-help-text"></span>
                </div>
            </div>
        </div>
        <!-- 微信 -->
        <div class="panel-single panel-single-light mgt20 verify-set-div hide">
            <div class="alert alert-info">开通微信营销需要绑定微信公众帐号，不知道怎么绑定请参考 <a href="/PubMarketing/setting_guide" target="_blank" class="a_hover">开通指引</a></div>

            <div class="formitems">
                <label class="fi-name"><span class="colorRed">*</span>名称：</label>
                <div class="form-controls">
                    <input type="text" class="input" name="pub_name" value="">
                    <span class="fi-help-text"></span>
                </div>
            </div>
            <div class="formitems">
                <label class="fi-name"><span class="colorRed">*</span>原始ID：</label>
                <div class="form-controls">
                    <input type="text" class="input" name="source_id" value="">
                    <span class="fi-help-text"></span>
                </div>
            </div>

            <div class="formitems">
                <label class="fi-name"><span class="colorRed">*</span>微信号：</label>
                <div class="form-controls">
                    <input type="text" class="input" name="pub_account" value="">
                    <span class="fi-help-text"></span>
                </div>
            </div>
            <div class="formitems" style="margin-top:30px;">
                <label class="fi-name">回调URL：</label>
                <div class="form-controls pdt5">
                    <div class="fl" style="width:355px;">//mob.wifenxiao.com/Wxapi/index.html?id=4001003&sid=4001109</div>
                    <a href="javascript:;" class="btn btn-small j-copy" data-copy="//mob.wifenxiao.com/Wxapi/index.html?id=4001003&sid=4001109">复制</a>
                </div>
            </div>
            <div class="formitems">
                <label class="fi-name">Token：</label>
                <div class="form-controls pdt5">
                    <div class="fl" style="width:355px;">e33c96aed8fae16f99f4d910662e5cd3</div>
                    <a href="javascript:;" class="btn btn-small j-copy" data-copy="e33c96aed8fae16f99f4d910662e5cd3">复制</a>
                </div>
            </div>
            <div class="formitems mgt5">
                <label class="fi-name"><span class="colorRed">*</span>AppId：</label>
                <div class="form-controls">
                    <input type="text" class="input xlarge" value="" name="app_id" >
                    <span class="fi-help-text"><a href="https://mp.weixin.qq.com/" target="_blank">点击获取</a>(开发者中心)</span>
                </div>
            </div>

            <div class="formitems">
                <label class="fi-name"><span class="colorRed">*</span>Secret：</label>
                <div class="form-controls">
                    <input type="text" class="input xlarge" name="app_secret" value="">
                    <span class="fi-help-text"><a href="https://mp.weixin.qq.com/" target="_blank">点击获取</a>(开发者中心)</span>
                </div>
            </div>

        </div>
        <!-- 提成 -->
        <div class="panel-single panel-single-light mgt20 verify-set-div hide">
            <div class="alert alert-info">三级佣金比例累计不可以超过50%</div>
            <div class="formitems">
                <label class="fi-name" style="width: 121px;"><span class="colorRed">*</span>一级上级佣金比例：</label>
                <div class="form-controls">
                    <input type="text" class="input mini j-pid" name="directly_online_ratio" value="0">%
                    <span class="fi-help-text">分销商推荐买家购买后能拿到的佣金比例</span>
                </div>
            </div>

            <div class="formitems">
                <label class="fi-name" style="width: 121px;"><span class="colorRed">*</span>二级上级佣金比例：</label>
                <div class="form-controls">
                    <input type="text" class="input mini j-pid" name="superior_online_ratio" value="0">%
                    <span class="fi-help-text">分销商的上级分销商能拿到的佣金比例</span>
                </div>
            </div>

            <div class="formitems">
                <label class="fi-name" style="width: 121px;"><span class="colorRed">*</span>三级上级佣金比例：</label>
                <div class="form-controls">
                    <input type="text" class="input mini j-pid" name="three_online_ratio" value="0">%
                    <span class="fi-help-text">分销商上级的上级能拿到的佣金比例</span>
                </div>
            </div>

        </div>

        <div class="panel-single panel-single-light mgt20 txtCenter">
            <a href="javascript:;" class="btn btn-primary" id='verify-set-save'>保存</a>
        </div>
    </form>
</script>

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

<!--end front template  -->

<script src="<?php echo SITE_ROOT;?>statics/js/dist/lib-min.js"></script>
<script src="<?php echo SITE_ROOT;?>statics/plugins/jbox/jquery.jbox-min.js"></script>
<script src="<?php echo SITE_ROOT;?>statics/plugins/zclip/jquery.zclip-min.js"></script>
<script src="<?php echo SITE_ROOT;?>statics/plugins/zclip/zclip-min.js"></script>

<!-- 线上环境 -->
    <script src="<?php echo SITE_ROOT;?>statics/js/dist/component-min.js"></script>
	<script>
var need_verify_set = false;
</script>
<script src="<?php echo SITE_ROOT;?>statics/js/dist/Public/verifySet.js"></script>
    <script>
        $(function () {
            $.get('/Home/haveVerifySet');
        });
        need_verify_set = true;
    </script>
<!--[if lt IE 10]>
<script src="<?php echo SITE_ROOT;?>statics/js/jquery/jquery.placeholder-min.js"></script>
<script>
    $(function(){
        //修复IE下的placeholder
        $('.input,.textarea').placeholder();
    });
</script>
<![endif]-->


    <script src="<?php echo SITE_ROOT;?>statics/js/dist/Shop/list_magazine.js"></script>


<script>
    var isOpenOrderNotice= 0; //是否开启订单提醒

    var isFirstLogin='';

    var is_domain_tip=0;//域名注册引导弹窗

    $(function(){
                                $(".btn-notice").click(function(){
            // $.post('/System/readAllNotice',{},function(){
            //     window.location.reload();
            // })
            $.ajax({
                url: '/System/readAllNotice',
                type: 'POST',
                success:function(data){
                    if(data.status == 1){
                        window.location.reload();
                    }else{
                         HYD.hint("danger",data.msg);
                    }

                }
            })
        });

        ;(function(){
            // 首页竖线到底
            var height1=$(".content-right").height();
            var height2=$(".content-left").height();
            if(parseInt(height1) < parseInt(height2)){
                $(".content-right").css({'min-height': height2});
            };

            // 免费版用户提示
                // 提示内容
                                var notice = '<p style="height:36px;line-height:36px;font-size:14px;">您目前使用的是<span style="color:#ff0000;">免费版</span>，' +
                        '<span style="color:#ff0000;">免费版</span>只能发展<span style="color:#ff0000;">5</span>个分销商，并且没有代理商功能，</p>' +
                        '<p style="height:36px;line-height:36px;font-size:14px;">裂变式发展下线效果很有限，建议购买正式版，</p>' +
                        '<p style="height:36px;line-height:36px;font-size:14px;">购买正式版或免费体验代理商功能请联系QQ：' +
                        '<a target="_blank" href="//wpa.qq.com/msgrd?v=3&uin=80068921&site=qq&menu=yes"><img border="0" src="//wpa.qq.com/pa?p=2:80068921:41" alt="点击这里给我发消息" title="点击这里给我发消息"></a> <a target="_blank" href="//wpa.qq.com/msgrd?v=3&uin=10069521&site=qq&menu=yes"><img border="0" src="//wpa.qq.com/pa?p=2:10069521:41" alt="点击这里给我发消息" title="点击这里给我发消息"></a></p>';
                    //10分钟弹出一次
                    var timer,
                        showFreeVerPopup=function(){
                            if (need_verify_set == false) { //如果还没有设置必填设置的话，就不要提示是免费用户（此时还没有体验好，现在就告诉客户要收费会吓到人的），只有客户都设置好了，也就是说客户都用起来了，此时再告诉他用的是免费版
                                $.jBox.show({
                                    title: '温馨提示',
                                    content: notice,
                                    btnOK: {show:false},
                                    btnCancel:{show:false},
                                    onOpen:function(){
                                        if(timer) clearInterval(timer);
                                    },
                                    onClosed:function(){
                                        timer=setInterval(showFreeVerPopup,600000);
                                    }
                                });
                            }
                        };

                    if(isFirstLogin==1){
                        showFreeVerPopup();
                    }
                    else{
                        timer=setInterval(showFreeVerPopup,600000);
                    }        })();
    });
</script>
<!-- end session hint -->
<script>
    $(function () {
        setTimeout(gggoup,5000);
        $('#gonggao .gound_close').click(function(){
            $('#gonggao').animate({bottom:"-270px"},1000);
        });
    });
    function gggoup(){
        $('#gonggao').animate({bottom:"3px"},1000);
    };

    //提示弹框
    ;(function(){
        $('#tip_box .gound_close').click(function(){
            $('#tip_box').animate({bottom:"-186px"},1000);
        });

        function tipgoup(){
            $('#tip_box').animate({bottom:"3px"},1000);
        };

        setTimeout(function(){
            tipgoup();
            setInterval(tipgoup,108000);
        }, 0);

    })();

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
<!-- 20160922 -->
