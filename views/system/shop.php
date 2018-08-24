
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- 满足有些用户在手机端访问的需要 -->

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <title>店铺信息 - Bidcms开源电商</title>

        <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/css/component-min.css">    <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/plugins/jbox/jbox-min.css">

    <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/plugins/uploadify/uploadify-min.css">
    <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/plugins/colorpicker/colorpicker.css">
    <style>
        .img-list-user li.img-list-add {
            background: #fff;
            border: 1px dashed #999;
            color: #999;
            font: bold 46px/60px"arial";
            cursor: pointer;
        }
        .img-list-user li {
            position: relative;
            float: left;
            padding: 1px;
            margin: -3px 10px 10px 0;
            width: 60px;
            height: 60px;
            text-align: center;
            overflow: hidden;
        }
        .img-list-user li img {
            width: 60px;
            height: auto;
            vertical-align: middle;
        }
        .sysPanel-style1 .formitems .fi-name{width:130px;}
        .sysPanel-style1 .form-controls{margin-left: 140px;}
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
            <h1 class="content-right-title">店铺信息<a class="gicon-info-sign gicon_linkother" href="//www.wifenxiao.com/Index/help_show/lm/help/id/64.html" target="_blank"></a></h1>


    <div class="tabs j-tab clearfix mgt10 mgb20">
        <a href="javascript:;" class="active tabs_a fl">系统设置</a>
        <a href="javascript:;" class="tabs_a fl">店中店设置</a>
        <a href="javascript:;" class="tabs_a fl">会员设置</a>
        <a href="javascript:;" class="tabs_a fl">分销商设置</a>
        <a href="javascript:;" class="tabs_a fl">商品设置</a>
        <a href="javascript:;" class="tabs_a fl">购物设置</a>
        <a href="javascript:;" class="tabs_a fl">外观设置</a>
    </div>

    <div class="alert alert-info disable-del"><b>提示</b>以下设置项，编辑完成后会自动保存。</div>

    <div class="tabcontent">
        <!-- 系统设置 -->
        <div class="tabitem">
            <div class="sysPanel">
                <div class="sysPanel-con">
                    <div class="sysPanel-title">验证手机号</div>
                    <div class="sysPanel-tip">关闭后，将不发送短信验证手机号。</div>
                </div>
                <div class="vir-chkb j-vir-chkb">
                    <div class="vir-chkb-actions clearfix">
                        <a href="javascript:;" class="vir-chkb-enable">已开启</a>
                        <a href="javascript:;" class="vir-chkb-disable">已关闭</a>
                    </div>
                    <input type="radio" name="check_apply_mobile" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['check_apply_mobile']?'checked':'';?>>
                </div>
            </div>

            <div class="sysPanel">
                <div class="sysPanel-con">
                    <div class="sysPanel-title">终端兼容模式</div>
                    <div class="sysPanel-tip">开启终端兼容模式后,进入会员中心将提示会员完善手机号和密码。</div>
                </div>
                <div class="vir-chkb j-vir-chkb">
                    <div class="vir-chkb-actions clearfix">
                        <a href="javascript:;" class="vir-chkb-enable">已开启</a>
                        <a href="javascript:;" class="vir-chkb-disable">已关闭</a>
                    </div>
                    <input type="radio" name="is_compatible_mode" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['is_compatible_mode']?'checked':'';?>>
                </div>
            </div>
            <div class="sysPanel j-mustCompatible">
                <div class="sysPanel-con">
                    <div class="sysPanel-title">是否强制绑定</div>
                    <div class="sysPanel-tip">如果选择"是",会员必须完善手机号和密码后才能继续访问。</div>
                </div>
                <div class="vir-chkb j-vir-chkb">
                    <div class="vir-chkb-actions clearfix">
                        <a href="javascript:;" class="vir-chkb-enable">是</a>
                        <a href="javascript:;" class="vir-chkb-disable">否</a>
                    </div>
                    <input type="radio" name="is_must_compatible" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['is_must_compatible']?'checked':'';?>>
                </div>
            </div>

            <div class="sysPanel j-mustCompatible">
                <div class="sysPanel-con">
                    <div class="sysPanel-title">帐号冲突解决方案</div>
                    <div class="sysPanel-tip">如果选择"替换老帐号",需要开启短信验证,新会员通过手机验证后,相同手机号的老会员的openid将会替换成新会员的openid,新会员账号将被删除。<br/>(该功能主要用于处理换公众号以后,由于同个人openid改变,导致之前会员进入商城后成为新会员的问题,请谨慎选择!)</div>
                </div>
                <div class="form-controls pdt5" style="margin-left:0;">
                    <label><input name="is_change_openid" type="radio" class="j-radio-autosave" value="0" <?php echo $shopinfo['is_change_openid']==0?'checked':'';?> /> 保留老帐号</label>　　
                    <label><input name="is_change_openid" type="radio" class="j-radio-autosave" value="1" <?php echo $shopinfo['is_change_openid']==1?'checked':'';?>/> 替换老帐号</label>
                    <span class="j-autosavePanel"></span>
                    <span class="fi-help-text"></span>
                </div>
            </div>

            <div class="sysPanel">
                <div class="sysPanel-con">
                    <div class="sysPanel-title">登录短信验证</div>
                    <div class="sysPanel-tip">开启后，登录需用短信验证</div>
                </div>
                <div class="vir-chkb j-vir-chkb">
                    <div class="vir-chkb-actions clearfix">
                        <a href="javascript:;" class="vir-chkb-enable">已开启</a>
                        <a href="javascript:;" class="vir-chkb-disable">已关闭</a>
                    </div>
                    <input type="radio" name="is_login_auth" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['is_login_auth']==1?'checked':'';?>>
                </div>
            </div>
            <div class="sysPanel">
                <div class="sysPanel-con">
                    <div class="sysPanel-title">异常登陆短信验证</div>
                    <div class="sysPanel-tip">取消异常登录短信验证后，您的店铺安全将降低，因此造成的损失后果自负。</div>
                </div>
                <div class="vir-chkb j-vir-chkb">
                    <div class="vir-chkb-actions clearfix">
                        <a href="javascript:;" class="vir-chkb-enable">已开启</a>
                        <a href="javascript:;" class="vir-chkb-disable">已关闭</a>
                    </div>
                    <input type="radio" name="is_unusual_auth" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['is_unusual_auth']==1?'checked':'';?>>
                </div>
            </div>

            <div class="sysPanel">
                <div class="sysPanel-con">
                    <div class="sysPanel-title">是否需要微信授权</div>
                    <div class="sysPanel-tip">选择不需要，将不授权获取会员的微信头像和昵称。</div>
                </div>
                <div class="vir-chkb j-vir-chkb">
                    <div class="vir-chkb-actions clearfix">
                        <a href="javascript:;" class="vir-chkb-enable">需要</a>
                        <a href="javascript:;" class="vir-chkb-disable">不需要</a>
                    </div>
                    <input type="radio" name="is_weixin_auth" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['is_weixin_auth']==1?'checked':'';?>>
                </div>
            </div>

            <div class="sysPanel">
                <div class="sysPanel-con">
                    <div class="sysPanel-title">余额提现</div>
                    <div class="sysPanel-tip">开启后，会员余额可以提现。</div>
                </div>
                <div class="vir-chkb j-vir-chkb">
                    <div class="vir-chkb-actions clearfix">
                        <a href="javascript:;" class="vir-chkb-enable">已开启</a>
                        <a href="javascript:;" class="vir-chkb-disable">已关闭</a>
                    </div>
                    <input type="radio" name="is_balance_draw" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['is_balance_draw']==1?'checked':'';?>>
                </div>
            </div>

            <div class="sysPanel">
                <div class="sysPanel-con">
                    <div class="sysPanel-title">佣金转余额</div>
                    <div class="sysPanel-tip">开启后，佣金可以转余额。</div>
                </div>
                <div class="vir-chkb j-vir-chkb">
                    <div class="vir-chkb-actions clearfix">
                        <a href="javascript:;" class="vir-chkb-enable">已开启</a>
                        <a href="javascript:;" class="vir-chkb-disable">已关闭</a>
                    </div>
                    <input type="radio" name="commission_balance_draw" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['commission_balance_draw']==1?'checked':'';?>>
                </div>
            </div>

            <div class="sysPanel">
                <div class="sysPanel-con">
                    <div class="sysPanel-title">下单提醒</div>
                    <div class="sysPanel-tip">开启后，会员下单支付后会有消息提醒</div>
                </div>
                <div class="vir-chkb j-vir-chkb">
                    <div class="vir-chkb-actions clearfix">
                        <a href="javascript:;" class="vir-chkb-enable">已开启</a>
                        <a href="javascript:;" class="vir-chkb-disable">已关闭</a>
                    </div>
                    <input type="radio" name="new_order_notice" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['new_order_notice']==1?'checked':'';?>>
                </div>
            </div>


            <div class="sysPanel">
                <div class="sysPanel-con">
                    <div class="sysPanel-title">运费参与返佣</div>
                    <div class="sysPanel-tip">开启后，运费将参与返佣</div>
                </div>
                <div class="vir-chkb j-vir-chkb">
                    <div class="vir-chkb-actions clearfix">
                        <a href="javascript:;" class="vir-chkb-enable">已开启</a>
                        <a href="javascript:;" class="vir-chkb-disable">已关闭</a>
                    </div>
                    <input type="radio" name="is_post_fee_commission" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['is_post_fee_commission']==1?'checked':'';?>>
                </div>
            </div>

            <div class="sysPanel">
                <div class="sysPanel-con">
                    <div class="sysPanel-title">优惠券抵运费</div>
                    <div class="sysPanel-tip">开启后，优惠券可以抵运费</div>
                </div>
                <div class="vir-chkb j-vir-chkb">
                    <div class="vir-chkb-actions clearfix">
                        <a href="javascript:;" class="vir-chkb-enable">已开启</a>
                        <a href="javascript:;" class="vir-chkb-disable">已关闭</a>
                    </div>
                    <input type="radio" name="is_coupon_postfee" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['is_coupon_postfee']==1?'checked':'';?>>
                </div>
            </div>

            <div class="sysPanel">
                <div class="sysPanel-con">
                    <div class="sysPanel-title">微信中只显示一级会员</div>
                    <div class="sysPanel-tip">开启后只在微信中显示一级会员</div>
                </div>
                <div class="vir-chkb j-vir-chkb">
                    <div class="vir-chkb-actions clearfix">
                        <a href="javascript:;" class="vir-chkb-enable">已开启</a>
                        <a href="javascript:;" class="vir-chkb-disable">已关闭</a>
                    </div>
                    <input type="radio" name="is_wx_one_user" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['is_wx_one_user']==1?'checked':'';?>>
                </div>
            </div>

            <div class="sysPanel sysPanel-style1">
                <div class="formitems">
                    <label class="fi-name"><span class="colorRed">*</span>显示代理中心：</label>
                    <div class="form-controls">
                        <div class="checkbox-group">
							<?php $agent=explode(',',$shopinfo['is_show_agent']);?>
                            <label><input type="checkbox" class="input j-checkbox-autosave" name="is_show_agent" value="1" <?php echo in_array(1,$agent)?'checked':'';?>>在微信环境显示</label>
                            <label><input type="checkbox" class="input j-checkbox-autosave" name="is_show_agent" value="2" <?php echo in_array(2,$agent)?'checked':'';?>>在APP显示</label>
                            <label><input type="checkbox" class="input j-checkbox-autosave" name="is_show_agent" value="3" <?php echo in_array(3,$agent)?'checked':'';?>>在浏览器显示</label>
                            <span class="j-autosavePanel"></span>
                        </div>
                        <span class="fi-help-text"></span>
                    </div>
                </div>
                <div class="formitems">
                    <label class="fi-name"><span class="colorRed">*</span>显示分销中心：</label>
                    <div class="form-controls">
                        <div class="checkbox-group">
							<?php $distributor=explode(',',$shopinfo['is_show_distributor']);?>
                            <label><input type="checkbox" class="input j-checkbox-autosave" name="is_show_distributor" value="1" <?php echo in_array(1,$distributor)?'checked':'';?>>在微信环境显示</label>
                            <label><input type="checkbox" class="input j-checkbox-autosave" name="is_show_distributor" value="2" <?php echo in_array(2,$distributor)?'checked':'';?>>在APP显示</label>
                            <label><input type="checkbox" class="input j-checkbox-autosave" name="is_show_distributor" value="3" <?php echo in_array(3,$distributor)?'checked':'';?>>在浏览器显示</label>
                            <span class="j-autosavePanel"></span>
                        </div>
                        <span class="fi-help-text"></span>
                    </div>
                </div>
                <div class="formitems">
                    <label class="fi-name"><span class="colorRed"></span>版权所有：</label>
                    <div class="form-controls">
                        <input type="text" class="input j-text-autosave" name="copy_right" value="<?php echo $shopinfo['copy_right'];?>">
                        <span class="fi-help-text"></span>
                    </div>
                </div>
                <div class="formitems">
                    <label class="fi-name">技术支持：</label>
                    <div class="form-controls">
                        <input type="text" class="input j-text-autosave" name="support" value="<?php echo $shopinfo['support'];?>">
                    </div>
                </div>
                <div class="formitems">
                    <label class="fi-name">短信签名：</label>
                    <div class="form-controls">
                        <input type="text" class="input j-text-autosave" name="sms_sign" value="<?php echo $shopinfo['sms_sign'];?>">
                    </div>
                </div>
                <div class="formitems">
                    <label class="fi-name">PC端访问店铺：</label>
                    <div class="form-controls" style="padding-top:5px;">
                        <label><input name="visit_shop_type" type="radio" class="j-radio-autosave" value="1" <?php echo $shopinfo['visit_shop_type']==1?'checked':'';?> />预览显示</label>　　
                        <label><input name="visit_shop_type" type="radio" class="j-radio-autosave" value="0" <?php echo $shopinfo['visit_shop_type']==0?'checked':'';?>/>全屏显示</label>
                        <span class="j-autosavePanel"></span>
                        <span class="fi-help-text">预览显示，右侧会有二维码提示到微信中浏览。</span>
                    </div>
                </div>
                <!--<div class="formitems">
                    <div class="form-controls" style="margin-left:128px;">
                        <a href="javascript:;" class="btn btn-primary js-save-btn">保存</a>
                    </div>
                </div>-->
            </div>

        </div>

        <!-- 店铺设置 -->
        <div class="tabitem hide">
            <div class="sysPanel">
                <div class="sysPanel-con">
                    <div class="sysPanel-title">是否开启店中店</div>
                    <div class="sysPanel-tip">关闭后，店中店功能将无法使用。</div>
                </div>
                <div class="vir-chkb j-vir-chkb">
                    <div class="vir-chkb-actions clearfix">
                        <a href="javascript:;" class="vir-chkb-enable">已开启</a>
                        <a href="javascript:;" class="vir-chkb-disable">已关闭</a>
                    </div>
                    <input type="radio" name="is_store_log" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['is_store_log']==1?'checked':'';?>>
                </div>
            </div>

            <div class="sysPanel">
                <div class="sysPanel-con">
                    <div class="sysPanel-title">是否显示店中店品牌前缀</div>
                    <div class="sysPanel-tip">关闭后，店中店名称前将不会显示自定义品牌前缀</div>
                </div>
                <div class="vir-chkb j-vir-chkb">
                    <div class="vir-chkb-actions clearfix">
                        <a href="javascript:;" class="vir-chkb-enable">已显示</a>
                        <a href="javascript:;" class="vir-chkb-disable">已隐藏</a>
                    </div>
                    <input type="radio" name="is_store_name" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['is_store_name']==1?'checked':'';?>>
                </div>
            </div>

            <div class="sysPanel">
                <div class="sysPanel-con">
                    <div class="sysPanel-title">店中店默认显示微信头像和昵称</div>
                    <div class="sysPanel-tip">关闭后，店中店默认显示的是店铺的Logo和标题</div>
                </div>
                <div class="vir-chkb j-vir-chkb">
                    <div class="vir-chkb-actions clearfix">
                        <a href="javascript:;" class="vir-chkb-enable">已开启</a>
                        <a href="javascript:;" class="vir-chkb-disable">已关闭</a>
                    </div>
                    <input type="radio" name="is_store_wx" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['is_store_wx']==1?'checked':'';?>>
                </div>
            </div>

            <div class="sysPanel">
                <div class="sysPanel-con">
                    <div class="sysPanel-title">图文标题</div>
                    <div class="sysPanel-tip">开启后，分享图文时点击浏览显示标题，日期和作者</div>
                </div>
                <div class="vir-chkb j-vir-chkb">
                    <div class="vir-chkb-actions clearfix">
                        <a href="javascript:;" class="vir-chkb-enable">已开启</a>
                        <a href="javascript:;" class="vir-chkb-disable">已关闭</a>
                    </div>
                    <input type="radio" name="is_material_title" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['is_material_title']==1?'checked':'';?>>
                </div>
            </div>

            <div class="sysPanel">
                <div class="formitems store">
                    <label class="fi-name">店中店品牌前缀：</label>
                    <div class="form-controls">
                        <input type="text" class="input j-text-autosave" name="store_prefix" value="<?php echo $shopinfo['store_prefix'];?>">
                        <span class="fi-help-text"></span>
                    </div>
                </div>
            </div>
		</div>

        <!-- 会员设置 -->
        <div class="tabitem hide">
            <div class="sysPanel">
                <div class="sysPanel-con">
                    <div class="sysPanel-title">
                        会员积分排行
                    </div>
                    <div class="sysPanel-tip">关闭后，会员积分不显示积分排行</div>
                </div>
                <div class="vir-chkb j-vir-chkb">
                    <div class="vir-chkb-actions clearfix">
                        <a href="javascript:;" class="vir-chkb-enable">已显示</a>
                        <a href="javascript:;" class="vir-chkb-disable">已隐藏</a>
                    </div>
                    <input type="radio" name="is_point_rank" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['is_point_rank']==1?'checked':'';?>>
                </div>
            </div>
            <div class="sysPanel">
                <div class="sysPanel-con">
                    <div class="sysPanel-title">
                        会员中心广告图
                        <a href="javascript:;" class="gicon-info-sign gicon_linkother tips" data-trigger="hover" data-placement="top" data-content="<img src='/statics/images/home/ggt.png'>"></a>
                    </div>
                    <div class="sysPanel-tip">关闭后，底部将不显示会员中心广告图</div>
                </div>
                <div class="vir-chkb j-vir-chkb">
                    <div class="vir-chkb-actions clearfix">
                        <a href="javascript:;" class="vir-chkb-enable">已显示</a>
                        <a href="javascript:;" class="vir-chkb-disable">已隐藏</a>
                    </div>
                    <input type="radio" name="is_user_img" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['is_user_img']==1?'checked':'';?>>
                </div>
            </div>

            <div class="sysPanel">
                <div class="sysPanel-divider"><span>广告图相关</span></div>

                <div class="formitems">
                    <label class="fi-name">会员中心广告图：</label>
                    <div class="form-controls pdt5 j-imglistUser">
                        <ul class="img-list-user clearfix">
                            <li class="img-list-add j-addgoods-user">
							<?php if(isset($shopinfo['user_img_ggt']) && !empty($shopinfo['user_img_ggt'])){?><img src="<?php echo $shopinfo['user_img_ggt'];?>" style="width:100%;"/>
							<?php } else {?>
							+
							<?php }?>
							</li>
                        </ul>
                        <input type="hidden" name="user_img_ggt" class="j-imglist-userset j-text-autosave" value="<?php echo $shopinfo['user_img_ggt'];?>">
                        <span class="fi-help-text">图片最佳尺寸640*256</span>
                    </div>
                </div>
                <div class="formitems">
                    <label class="fi-name"><span class="colorRed"></span>广告图链接：</label>
                    <div class="form-controls">
                        <input type="text" class="input xlarge j-text-autosave" name="user_img_link" value="<?php echo $shopinfo['user_img_link'];?>">
                        <span class="fi-help-text">链接请以//开头</span>
                    </div>
                </div>
				<div class="formitems affiche">
					<label class="fi-name">浮动信息：</label>
					<div class="form-controls">
						<textarea name="affiche" id="" class="textarea j-text-autosave"><?php echo $shopinfo['affiche'];?></textarea>
						<span class="fi-help-text">每条公告请用英文 ; 号隔开 <a href="javasecript:;" class="tips" data-trigger="hover" data-placement="top" data-content='<img src="<?php echo SITE_ROOT;?>statics/images/home/affiche.jpg">' style="color:#31708f;">查看样例</a></span>
					</div>
				</div>

				<div class="formitems affiche">
					<label class="fi-name">公告颜色:</label>
					<div class="form-controls">
						<input class="input mini color j-text-autosave" value="<?php echo $shopinfo['affiche_color'];?>" name="affiche_color">
					</div>
				</div>
                <div class="sysPanel-divider"><span>退款相关</span></div>

                <div class="formitems">
                    <label class="fi-name"><span class="colorRed"></span>退款设置：</label>
                    <div class="form-controls" style="padding-top:5px;">
                        <label><input  name="is_refund_config" type="radio" class="j-radio-autosave" value="1" <?php echo $shopinfo['is_refund_config']==1?'checked':'';?>/>付款后就能申请退款</label>　　
                        <label><input  name="is_refund_config" type="radio" class="j-radio-autosave" value="0" <?php echo $shopinfo['is_refund_config']==0?'checked':'';?> />发货后才可申请退款</label>
                        <span class="j-autosavePanel"></span>
                        <span class="fi-help-text"></span>
                    </div>
                </div>

                <div class="formitems">
                    <label class="fi-name">会员退款设置：</label>
                    <div class="form-controls" style="padding-top:5px;">
                        <label><input name="is_user_refunding" type="radio" class="j-radio-autosave" value="0" <?php echo $shopinfo['is_user_refunding']==0?'checked':'';?> />账户余额</label>　　
                        <label><input name="is_user_refunding" type="radio" class="j-radio-autosave" value="1" <?php echo $shopinfo['is_user_refunding']==1?'checked':'';?>/>微信账户</label>
                        <!--<label><input name="is_user_refunding" type="radio" value="2" />支付宝账户</label>-->
                        <span class="j-autosavePanel"></span>
                        <span class="fi-help-text">选择微信账户时1.需上传微信API证书。2.确保微信账户里的资金充足（可在微信商户后台->资金管理中充值）。</span>
                    </div>
                </div>

                <div class="sysPanel-divider"><span>其它设置</span></div>

                <div class="formitems">
                    <label class="fi-name"><span class="colorRed"></span>会员基础数量：</label>
                    <div class="form-controls">
                        <input type="number" class="input j-text-autosave" name="user_base_num" value="0">
                    </div>
                </div>
               
            </div>
        </div>

        <!-- 分销商设置 -->
        <div class="tabitem hide">
            <div class="sysPanel">
                <div class="sysPanel-con">
                    <div class="sysPanel-title">允许分销商上下架商品</div>
                    <div class="sysPanel-tip">开启后，允许分销商上下架商品</div>
                </div>
                <div class="vir-chkb j-vir-chkb">
                    <div class="vir-chkb-actions clearfix">
                        <a href="javascript:;" class="vir-chkb-enable">允许</a>
                        <a href="javascript:;" class="vir-chkb-disable">不允许</a>
                    </div>
                    <input type="radio" name="is_agent_item" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['is_agent_item']==1?'checked':'';?>>
                </div>
            </div>

            <div class="sysPanel">
                <div class="sysPanel-con">
                    <div class="sysPanel-title">佣金转余额审核</div>
                    <div class="sysPanel-tip">开启后，佣金转余额需要进行审核</div>
                </div>
                <div class="vir-chkb j-vir-chkb">
                    <div class="vir-chkb-actions clearfix">
                        <a href="javascript:;" class="vir-chkb-enable">已开启</a>
                        <a href="javascript:;" class="vir-chkb-disable">已关闭</a>
                    </div>
                    <input type="radio" name="is_commission_blance" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['is_commission_blance']==1?'checked':'';?>>
                </div>
            </div>

            <div class="sysPanel">
                <div class="sysPanel-con">
                    <div class="sysPanel-title">显示分销商特权
                        <a href="javascript:;" class="gicon-info-sign gicon_linkother tips" data-trigger="hover" data-placement="top" data-content="<img src='/statics/images/mp_tip_img4.jpg'>"></a>
                    </div>
                    <div class="sysPanel-tip">开启后，显示分销商特权说明</div>
                </div>
                <div class="vir-chkb j-vir-chkb">
                    <div class="vir-chkb-actions clearfix">
                        <a href="javascript:;" class="vir-chkb-enable">已开启</a>
                        <a href="javascript:;" class="vir-chkb-disable">已关闭</a>
                    </div>
                    <input type="radio" name="is_show_privilege" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['is_show_privilege']==1?'checked':'';?>>
                </div>
            </div>

            <div class="sysPanel">
                <div class="sysPanel-con">
                    <div class="sysPanel-title">到期佣金转余额</div>
                    <div class="sysPanel-tip">开启后，分销商和代理商都到期后佣金自动转入余额</div>
                </div>
                <div class="vir-chkb j-vir-chkb">
                    <div class="vir-chkb-actions clearfix">
                        <a href="javascript:;" class="vir-chkb-enable">已开启</a>
                        <a href="javascript:;" class="vir-chkb-disable">已关闭</a>
                    </div>
                    <input type="radio" name="expire_commission_blance" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['expire_commission_blance']==1?'checked':'';?>>
                </div>
            </div>

            <div class="sysPanel">
                <div class="sysPanel-con">
                    <div class="sysPanel-title">是否过滤佣金为0的分销订单</div>
                    <div class="sysPanel-tip">过滤后，分销中心的分销订单将不显示佣金为0的订单</div>
                </div>
                <div class="vir-chkb j-vir-chkb">
                    <div class="vir-chkb-actions clearfix">
                        <a href="javascript:;" class="vir-chkb-enable">是</a>
                        <a href="javascript:;" class="vir-chkb-disable">否</a>
                    </div>
                    <input type="radio" name="is_filter_zero_commission" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['is_filter_zero_commission']==1?'checked':'';?>>
                </div>
            </div>

            <div class="sysPanel">
                <div class="formitems">
                    <label class="fi-name"><span class="colorRed">*</span>佣金顶部图片：</label>
                    <div class="form-controls pdt5 j-imglistPanel">
                        <ul class="img-list clearfix">
                            <li class="img-list-add j-commission-agent"><?php echo isset($shopinfo['my_commission_img'])?'<img src="'.$shopinfo['my_commission_img'].'" style="width:100%;"/>':'+';?></li>
                        </ul>
                        <input type="hidden" name="my_commission_img" class="j-imglist-agentset j-text-autosave" value="<?php echo $shopinfo['my_commission_img'];?>">
                        <span class="fi-help-text">此图片在我的佣金页面顶部显示，建议图片尺寸750*330</span>
                    </div>
                </div>
                <div class="formitems">
                    <label class="fi-name"><span class="colorRed"></span>分销按钮文字：</label>
                    <div class="form-controls">
                        <input type="text" class="input j-text-autosave" name="fx_good_title" value="<?php echo $shopinfo['fx_good_title'];?>">
                        <span class="fi-help-text">此处文字在分销产品、分销专题里显示</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- 商品设置 -->
        <div class="tabitem hide">
            <div class="sysPanel">
                <div class="sysPanel-con">
                    <div class="sysPanel-title">销售记录</div>
                    <div class="sysPanel-tip">开启后，商品详情页将显示销售记录</div>
                </div>
                <div class="vir-chkb j-vir-chkb">
                    <div class="vir-chkb-actions clearfix">
                        <a href="javascript:;" class="vir-chkb-enable">已显示</a>
                        <a href="javascript:;" class="vir-chkb-disable">已隐藏</a>
                    </div>
                    <input type="radio" name="is_sale_record" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['is_sale_record']==1?'checked':'';?>>
                </div>
            </div>

            <div class="sysPanel">
                <div class="sysPanel-con">
                    <div class="sysPanel-title">商品导出到一个订单</div>
                    <div class="sysPanel-tip">开启后,订单导出时,多个订单商品显示到一个订单里面</div>
                </div>
                <div class="vir-chkb j-vir-chkb">
                    <div class="vir-chkb-actions clearfix">
                        <a href="javascript:;" class="vir-chkb-enable">已开启</a>
                        <a href="javascript:;" class="vir-chkb-disable">已关闭</a>
                    </div>
                    <input type="radio" name="is_export_order" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['is_export_order']==1?'checked':'';?>>
                </div>
            </div>

            <div class="sysPanel">
                <div class="sysPanel-con">
                    <div class="sysPanel-title">是否显示原价</div>
                    <div class="sysPanel-tip">开启后，商品将显示原价</div>
                </div>
                <div class="vir-chkb j-vir-chkb">
                    <div class="vir-chkb-actions clearfix">
                        <a href="javascript:;" class="vir-chkb-enable">已显示</a>
                        <a href="javascript:;" class="vir-chkb-disable">已隐藏</a>
                    </div>
                    <input type="radio" name="is_display_original_price" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['is_display_original_price']==1?'checked':'';?>>
                </div>
            </div>

            <div class="sysPanel">
                <div class="sysPanel-con">
                    <div class="sysPanel-title">打折商品显示现价</div>
                    <div class="sysPanel-tip">开启后，当有打折价时，是否显示现价</div>
                </div>
                <div class="vir-chkb j-vir-chkb">
                    <div class="vir-chkb-actions clearfix">
                        <a href="javascript:;" class="vir-chkb-enable">已显示</a>
                        <a href="javascript:;" class="vir-chkb-disable">已隐藏</a>
                    </div>
                    <input type="radio" name="is_display_current_price" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['is_display_current_price']==1?'checked':'';?>>
                </div>
            </div>

            <div class="sysPanel">
                <div class="sysPanel-con">
                    <div class="sysPanel-title">折扣价取整</div>
                    <div class="sysPanel-tip">如果选择“是”,商品打折之后的金额将四舍五入取整。</div>
                </div>
                <div class="vir-chkb j-vir-chkb">
                    <div class="vir-chkb-actions clearfix">
                        <a href="javascript:;" class="vir-chkb-enable">是</a>
                        <a href="javascript:;" class="vir-chkb-disable">否</a>
                    </div>
                    <input type="radio" name="is_discount_price_round" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['is_discount_price_round']==1?'checked':'';?>>
                </div>
            </div>

            <div class="sysPanel">
                <div class="sysPanel-con">
                    <div class="sysPanel-title">商品描述留白</div>
                    <div class="sysPanel-tip">开启后，商品详情页，两边将会显示有留白</div>
                </div>
                <div class="vir-chkb j-vir-chkb">
                    <div class="vir-chkb-actions clearfix">
                        <a href="javascript:;" class="vir-chkb-enable">已显示</a>
                        <a href="javascript:;" class="vir-chkb-disable">已隐藏</a>
                    </div>
                    <input type="radio" name="is_item_detail_blank" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['is_item_detail_blank']==1?'checked':'';?>>
                </div>
            </div>

            <div class="sysPanel">
                <div class="sysPanel-con">
                    <div class="sysPanel-title">商品二维码</div>
                    <div class="sysPanel-tip">开启后，将会在商品详情页显示二维码</div>
                </div>
                <div class="vir-chkb j-vir-chkb">
                    <div class="vir-chkb-actions clearfix">
                        <a href="javascript:;" class="vir-chkb-enable">已显示</a>
                        <a href="javascript:;" class="vir-chkb-disable">已隐藏</a>
                    </div>
                    <input type="radio" name="is_detail_code" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['is_detail_code']==1?'checked':'';?>>
                </div>
            </div>

            <div class="sysPanel">
                <div class="sysPanel-con">
                    <div class="sysPanel-title">商品销量</div>
                    <div class="sysPanel-tip">开启后，将会显示商品的销量</div>
                </div>
                <div class="vir-chkb j-vir-chkb">
                    <div class="vir-chkb-actions clearfix">
                        <a href="javascript:;" class="vir-chkb-enable">已显示</a>
                        <a href="javascript:;" class="vir-chkb-disable">已隐藏</a>
                    </div>
                    <input type="radio" name="is_lists_sales" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['is_lists_sales']==1?'checked':'';?>>
                </div>
            </div>

            <div class="sysPanel">
                <div class="sysPanel-con">
                    <div class="sysPanel-title">点赞、分享</div>
                    <div class="sysPanel-tip">关闭后商品详情页和分销专题页将不显示对应按钮</div>
                </div>
                <div class="vir-chkb j-vir-chkb">
                    <div class="vir-chkb-actions clearfix">
                        <a href="javascript:;" class="vir-chkb-enable">显示</a>
                        <a href="javascript:;" class="vir-chkb-disable">隐藏</a>
                    </div>
                    <input type="radio" name="is_praise_share" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['is_praise_share']==1?'checked':'';?>>
                </div>
            </div>
            <div class="sysPanel">
                <div class="sysPanel-con">
                    <div class="sysPanel-title">商品评价</div>
                    <div class="sysPanel-tip">关闭后商品详情页将不显示评价</div>
                </div>
                <div class="vir-chkb j-vir-chkb">
                    <div class="vir-chkb-actions clearfix">
                        <a href="javascript:;" class="vir-chkb-enable">显示</a>
                        <a href="javascript:;" class="vir-chkb-disable">隐藏</a>
                    </div>
                    <input type="radio" name="is_comment" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['is_comment']==1?'checked':'';?>>
                </div>
            </div>
            <div class="sysPanel">
                <div class="sysPanel-con">
                    <div class="sysPanel-title">营销活动未开始原价购买</div>
                    <div class="sysPanel-tip">开启后，营销活动未开始时，可以按商品原价购买</div>
                </div>
                <div class="vir-chkb j-vir-chkb">
                    <div class="vir-chkb-actions clearfix">
                        <a href="javascript:;" class="vir-chkb-enable">显示</a>
                        <a href="javascript:;" class="vir-chkb-disable">隐藏</a>
                    </div>
                    <input type="radio" name="is_marketing_buy" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['is_marketing_buy']==1?'checked':'';?>>
                </div>
            </div>
            <div class="sysPanel">
                <div class="formitems">
                    <label class="fi-name"><span class="colorRed"></span>复购生效设置：</label>
                    <div class="form-controls" style="padding-top:5px;">
                        <label><input  name="is_repurchase" type="radio" class="j-radio-autosave" value="0"  <?php echo $shopinfo['is_repurchase']==0?'checked':'';?> />付款后生效(若是货到付款，则交易完成后生效)</label>　　
                        <label class="mgr10"><input  name="is_repurchase" type="radio" class="j-radio-autosave" value="1"  <?php echo $shopinfo['is_repurchase']==1?'checked':'';?> />交易完成后生效</label>
                        <span class="j-autosavePanel"></span>
                        <span class="fi-help-text"></span>
                    </div>
                </div>
                <div class="formitems">
                    <label class="fi-name"><span class="colorRed"></span>复购规则设置：</label>
                    <div class="form-controls" style="padding-top:5px;">
                        <label>
                            <input  name="is_buy_repurchase" type="radio" class="j-radio-autosave" value="0" <?php echo $shopinfo['is_buy_repurchase']==0?'checked':'';?>/>购买过同件商品才能享受复购价</label>　　
                        <label class="mgr10">
                            <input  name="is_buy_repurchase" type="radio" class="j-radio-autosave" value="1" <?php echo $shopinfo['is_buy_repurchase']==1?'checked':'';?>/>购买任何商品都能享受复购价</label>
                        <label class="mgr10">
                            <input  name="is_buy_repurchase" type="radio" class="j-radio-autosave" value="2" <?php echo $shopinfo['is_buy_repurchase']==2?'checked':'';?>/>购物满多少元才能享受复购价</label>
                        <span class="j-autosavePanel"></span>
                        <span class="fi-help-text"></span>
                    </div>
                </div>
                <div class="formitems repurchase_money">
                    <label class="fi-name"><span class="colorRed"></span>购物满：</label>
                    <div class="form-controls" style="padding-top:5px;">
                        <label>
                        <input type="number" name="buy_repurchase_money" value="<?php echo $shopinfo['buy_repurchase_money'];?>" class="input min j-text-autosave">元</label>
                        <span class="j-autosavePanel"></span>
                        <span class="fi-help-text"></span>
                    </div>
                </div>
            </div>
            <div class="sysPanel">
                <div class="formitems">
                    <label class="fi-name"><span class="colorRed"></span>商品列表展现形式：</label>
                    <div class="form-controls" style="padding-top:5px;">
                        <label><input  name="item_list_style" type="radio" class="j-radio-autosave" value="0" <?php echo $shopinfo['item_list_style']==0?'checked':'';?> />瀑布流</label>　　
                        <label class="mgr10"><input  name="item_list_style" type="radio" class="j-radio-autosave" value="1"  <?php echo $shopinfo['item_list_style']==1?'checked':'';?>/>翻页</label>
                        <span class="j-autosavePanel"></span>
                        <span class="fi-help-text"></span>
                    </div>
                </div>
            </div>
            <div class="sysPanel">
                <div class="formitems">
                    <label class="fi-name"><span class="colorRed"></span>警戒库存：</label>
                    <div class="form-controls">
                        <input type="text" class="input j-text-autosave" name="good_warn_num" value="<?php echo $shopinfo['good_warn_num'];?>">
                        <span class="fi-help-text"></span>
                    </div>
                </div>
                <div class="formitems">
                    <label class="fi-name"><span class="colorRed"></span>商品分享描述：</label>
                    <div class="form-controls">
                        <input type="text" class="input xxlarge j-text-autosave" name="share_item_desc" value="<?php echo !empty($shopinfo['share_item_desc'])?$shopinfo['share_item_desc']:'发现一个好东东，赶快去瞧瞧吧~~';?>">
                        <span class="fi-help-text">分享商品时显示,如果商品设置了副标题,将显示副标题。使用该功能，需要将mob.91weimai.com设为微信JS接口安全域名。<a href="/System/jssdk_guide" target="_blank" class="btn btn-mini btn-warning">操作步骤</a></span>
                    </div>
                </div>
            </div>
		</div>

        <!-- 购物设置 -->
        <div class="tabitem hide">
            <div class="sysPanel">
                <div class="sysPanel-con">
                    <div class="sysPanel-title">身份证号码</div>
                    <div class="sysPanel-tip">开启后，购物需要提供身份证号码</div>
                </div>
                <div class="vir-chkb j-vir-chkb">
                    <div class="vir-chkb-actions clearfix">
                        <a href="javascript:;" class="vir-chkb-enable">已开启</a>
                        <a href="javascript:;" class="vir-chkb-disable">已关闭</a>
                    </div>
                    <input type="radio" name="buy_need_id" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['buy_need_id']==1?'checked':'';?>>
                </div>
            </div>

            <div class="sysPanel">
                <div class="sysPanel-con">
                    <div class="sysPanel-title">上传身份证正反面</div>
                    <div class="sysPanel-tip">开启后，购物需要上传身份证正反面</div>
                </div>
                <div class="vir-chkb j-vir-chkb">
                    <div class="vir-chkb-actions clearfix">
                        <a href="javascript:;" class="vir-chkb-enable">已开启</a>
                        <a href="javascript:;" class="vir-chkb-disable">已关闭</a>
                    </div>
                    <input type="radio" name="id_pros_cons" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['id_pros_cons']==1?'checked':'';?>>
                </div>
            </div>

            <div class="sysPanel">
                <div class="formitems">
                    <label class="fi-name"><span class="colorRed"></span>填写身份证提示：</label>
                    <div class="form-controls">
                        <input type="text" class="input xxlarge j-text-autosave" name="need_idcard_desc" value="<?php echo !empty($shopinfo['need_idcard_desc'])?$shopinfo['need_idcard_desc']:'购买跨境商品，填写的收件人与身份证号需要与证件保持一致！(该证件只用于报关使用)';?>">
                    </div>
                </div>
            </div>

            <div class="sysPanel">
                <div class="sysPanel-con">
                    <div class="sysPanel-title">填写邮箱</div>
                    <div class="sysPanel-tip">开启后，购物时需填写邮箱</div>
                </div>
                <div class="vir-chkb j-vir-chkb">
                    <div class="vir-chkb-actions clearfix">
                        <a href="javascript:;" class="vir-chkb-enable">已开启</a>
                        <a href="javascript:;" class="vir-chkb-disable">已关闭</a>
                    </div>
                    <input type="radio" name="is_order_email" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['is_order_email']==1?'checked':'';?>>
                </div>
            </div>

            <div class="sysPanel">
                <div class="sysPanel-con">
                    <div class="sysPanel-title">自提填写姓名和手机号</div>
                    <div class="sysPanel-tip">开启后，购物时选择自提需填写姓名和手机号</div>
                </div>
                <div class="vir-chkb j-vir-chkb">
                    <div class="vir-chkb-actions clearfix">
                        <a href="javascript:;" class="vir-chkb-enable">已开启</a>
                        <a href="javascript:;" class="vir-chkb-disable">已关闭</a>
                    </div>
                    <input type="radio" name="is_self_mobile" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['is_self_mobile']==1?'checked':'';?>>
                </div>
            </div>

            <div class="sysPanel">
                <div class="sysPanel-con">
                    <div class="sysPanel-title">自提订单是否需要卖家确认</div>
                    <div class="sysPanel-tip">如果选择"是",自提订单需要卖家或者门店确认后,会员才能自提</div>
                </div>
                <div class="vir-chkb j-vir-chkb">
                    <div class="vir-chkb-actions clearfix">
                        <a href="javascript:;" class="vir-chkb-enable">是</a>
                        <a href="javascript:;" class="vir-chkb-disable">否</a>
                    </div>
                    <input type="radio" name="self_order_need_confirm" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['self_order_need_confirm']==1?'checked':'';?>>
                </div>
            </div>

            <div class="sysPanel">
                <div class="sysPanel-con">
                    <div class="sysPanel-title">购物送积分是否只有分销商才享受</div>
                    <div class="sysPanel-tip">开启后，购物送积分只有分销商才享受，会员购物将获得不了积分</div>
                </div>
                <div class="vir-chkb j-vir-chkb">
                    <div class="vir-chkb-actions clearfix">
                        <a href="javascript:;" class="vir-chkb-enable">已开启</a>
                        <a href="javascript:;" class="vir-chkb-disable">已关闭</a>
                    </div>
                    <input type="radio" name="is_point_trader" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['is_point_trader']==1?'checked':'';?>>
                </div>
            </div>

		</div>

        <!-- 外观设置 -->
        <div class="tabitem hide">
			
            <div class="sysPanel sysPanel-style1">
                <div class="formitems">
                    <label class="fi-name"><span class="colorRed"></span>导航背景色：</label>
                    <div class="form-controls">
                        <input type="text" class="input mini color j-text-autosave" name="nav_bgcolor" value="<?php echo $shopinfo['nav_bgcolor'];?>">
                        <span class="fi-help-text"></span>
                    </div>
                </div>
                <div class="formitems">
                    <label class="fi-name">导航字体颜色：</label>
                    <div class="form-controls">
                        <input type="text" class="input mini color j-text-autosave" name="nav_color" value="<?php echo $shopinfo['nav_color'];?>">
                    </div>
                </div>
                <div class="formitems">
                    <label class="fi-name">默认标题：</label>
                    <div class="form-controls">
                        <input type="text" class="input j-text-autosave" name="site_title" value="<?php echo $shopinfo['site_title'];?>">
                    </div>
                </div>
            </div>
            <div class="sysPanel">
                <div class="sysPanel-con">
                    <div class="sysPanel-title">
                    技术支持
                    <a href="javascript:;" class="gicon-info-sign gicon_linkother tips" data-trigger="hover" data-placement="top" data-content="<img src='/statics/images/mp_tip_img1.png'>"></a>
                    </div>
                    <div class="sysPanel-tip">关闭后，底部将不显示技术支持文字</div>
                </div>
                <div class="vir-chkb j-vir-chkb">
                    <div class="vir-chkb-actions clearfix">
                        <a href="javascript:;" class="vir-chkb-enable">已开启</a>
                        <a href="javascript:;" class="vir-chkb-disable">已关闭</a>
                    </div>
                    <input type="radio" name="show_support" class="ip-checkbox j-vir-checkbox" data-enableval="1" data-disableval="2" <?php echo $shopinfo['show_support']==1?'checked':'';?>>
                </div>
            </div>

            <div class="sysPanel">
                <div class="sysPanel-con">
                    <div class="sysPanel-title">
                    底部文字链接
                    <a href="javascript:;" class="gicon-info-sign gicon_linkother tips" data-trigger="hover" data-placement="top" data-content="<img src='/statics/images/mp_tip_img2.png'>"></a>
                    </div>
                    <div class="sysPanel-tip">关闭后，底部将不显示文字链接</div>
                </div>
                <div class="vir-chkb j-vir-chkb">
                    <div class="vir-chkb-actions clearfix">
                        <a href="javascript:;" class="vir-chkb-enable">已开启</a>
                        <a href="javascript:;" class="vir-chkb-disable">已关闭</a>
                    </div>
                    <input type="radio" name="hide_bottom" class="ip-checkbox j-vir-checkbox" data-enableval="0" data-disableval="1" <?php echo $shopinfo['hide_bottom']==1?'checked':'';?>>
                </div>
            </div>

            <div class="sysPanel">
                <div class="sysPanel-con">
                    <div class="sysPanel-title">
                    会员中心浮层
                    <a href="javascript:;" class="gicon-info-sign gicon_linkother tips" data-trigger="hover" data-placement="top" data-content="<img src='/statics/images/mp_tip_img6.png'>"></a>
                    </div>
                    <div class="sysPanel-tip">开启后，用户可在网站任意页面直接查看个人订单状态，快速进入一些主要的功能页面。</div>
                    <div class="sysPanel-tip mgt10">以下页面可控制是否显示浮层：</div>
                    <div class="sysPanel-tip mgt10">
                        <div class="form-controls" style="margin-left:0;">
                            <label><input name="is_user_layer_home" type="checkbox" class="j-checkbox-autosave" value="1" <?php echo $shopinfo['is_user_layer_home']==1?'checked':'';?>> 商城主页</label>　　
                            <label><input name="is_user_layer_list" type="checkbox" class="j-checkbox-autosave" value="1" <?php echo $shopinfo['is_user_layer_list']==1?'checked':'';?>> 商品列表页</label>
                            <span class="j-autosavePanel"></span>
                        </div>
                    </div>
                </div>
                <div class="vir-chkb j-vir-chkb">
                    <div class="vir-chkb-actions clearfix">
                        <a href="javascript:;" class="vir-chkb-enable">已开启</a>
                        <a href="javascript:;" class="vir-chkb-disable">已关闭</a>
                    </div>
                    <input type="radio" name="is_user_layer" class="ip-checkbox j-vir-checkbox" data-enableval="1" data-disableval="0" <?php echo $shopinfo['is_user_layer']==1?'checked':'';?>>
                </div>
            </div>

            <div class="sysPanel">
                <div class="sysPanel-con">
                    <div class="sysPanel-title">
                    网站挂件
                    <a href="javascript:;" class="gicon-info-sign gicon_linkother tips" data-trigger="hover" data-placement="top" data-content="<img src='/statics/images/mp_tip_img7.png'>"></a>
                    </div>
                    <div class="sysPanel-tip">开启后，全站可以使用网站挂件功能，包括返回主页、购物车、一键关注、联系店主、返回顶部功能。</div>
                     
                </div>
                <div class="vir-chkb j-vir-chkb">
                    <div class="vir-chkb-actions clearfix">
                        <a href="javascript:;" class="vir-chkb-enable">已开启</a>
                        <a href="javascript:;" class="vir-chkb-disable">已关闭</a>
                    </div>
                    <input type="radio" name="is_side_widget" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['is_side_widget']==1?'checked':'';?>>
                </div>
            </div>

            <div class="sysPanel">
                <div class="sysPanel-con">
                    <div class="sysPanel-title">
                    悬浮按钮
                    <a href="javascript:;" class="gicon-info-sign gicon_linkother tips" data-trigger="hover" data-placement="top" data-content="<img src='/statics/images/mp_tip_img3.png'>"></a>
                    </div>
                    <div class="sysPanel-tip">关闭后，全站将隐藏悬浮按钮</div>
                </div>
                <div class="vir-chkb j-vir-chkb">
                    <div class="vir-chkb-actions clearfix">
                        <a href="javascript:;" class="vir-chkb-enable">已开启</a>
                        <a href="javascript:;" class="vir-chkb-disable">已关闭</a>
                    </div>
                    <input type="radio" name="is_display_icon" class="ip-checkbox j-vir-checkbox" <?php echo $shopinfo['is_display_icon']==1?'checked':'';?>>
                </div>
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
<script src="<?php echo SITE_ROOT;?>statics/plugins/uploadify/jquery.uploadify.min.js?ver=5436"></script>
<script type="text/javascript" src="<?php echo SITE_ROOT;?>statics/js/dist/System/jscolor.js"></script>
<script src="<?php echo SITE_ROOT;?>statics/js/dist/Shop/shopinfo.js"></script>

</body>
</html>
<!-- 20170105 -->
