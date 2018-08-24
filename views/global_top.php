<script type="text/javascript">
<!--
	var api_root='<?php echo API_ROOT;?>';
	var site_root='<?php echo SITE_ROOT;?>';
	var static_root='<?php echo SITE_ROOT;?>statics/';
//-->
</script>
<!--[if lt IE 9]>
<div class="alert alert-danger disable-del txtCenter" id="tipLowIEVer">
    <h4>系统检测到您使用的浏览器版本过低，为达到更好的体验效果请升级您的浏览器，我们为您推荐：</h4>
    <p>
        <a href="https://www.google.com.hk/chrome/" target="_blank">Chrome浏览器</a>
        <a href="//www.firefox.com.cn/download/" target="_blank">Firefox浏览器</a>
        <a href="//www.maxthon.cn/" target="_blank">遨游浏览器</a>
        <a href="//se.360.cn/" target="_blank">360浏览器</a>
        <a href="//www.liebao.cn/" target="_blank">猎豹浏览器</a>
    </p>
</div>
<![endif]-->
<div class="header">
    <div class="inner clearfix">
        <div class="fl">
            <a href="/" class="header-logo" style="width:auto; margin-right:4px;">
              <img src="<?php echo SITE_ROOT;?>data/logo/logo.png" style="height:80%;margin-top:5%;">
			</a>
        </div>
        <!-- end logo -->

        <div class="header-nav fl">
            <ul class="header-nav-list clearfix">
              <li class="fl "><a href="index.php" >首页</a></li><li class="fl"><a href="index.php?con=shop" >店铺</a></li><li class="fl"><li class="fl "><a href="index.php?con=customer" >会员</a></li><li class="fl "><a href="index.php?con=statistics" >统计</a></li><li class="fl "><a href="index.php?con=system" >设置</a></li><li class="fl "><a href="//shop.bidcms.com/basis.html#/app/<?php echo $GLOBALS['store_id'];?>/marketing/center" target="_blank">营销</a></li><li class="fl "><a href="//shop.bidcms.com/basis.html#/app/<?php echo $GLOBALS['store_id'];?>/wechat/miniApp/list" target="_blank">微信</a></li>
			      </ul>
        </div>

        <!-- end header-nav -->

        <div class="fr">
            <ul class="header-ctrl clearfix">
                <li class="header-ctrl-item fl">
                    <a href="//shop.bidcms.com" class="header-ctrl-item-parent" style="width:120px;">
						<i class="gicon-home white"></i>
                        <i class="gicon-home"></i>
                        商户列表
                    </a>
                    <ul class="header-ctrl-item-children" id="applist" style="width:170px;">
                    </ul>
                </li>
            </ul>
        </div>
        <!-- end list -->
		<!--<span class="account_inbox_switch fr"><a href="/System/notice_list" class="header_mail"><span class="act"></span></a></span>-->
        <span class="header-welcome fr " style="margin-right:15px;">
            <a href="//shop.bidcms.com/basis.html#/app/<?php echo $GLOBALS['store_id'];?>/qualification/application/progress" title="" class="tips" data-trigger="hover" data-placement="top" data-content='<strong>版本：</strong><font style="color:red"></font>'>店铺认证</a>
        </span>
        <!-- end header-welcome -->
    </div>
</div>
<!-- end header -->
