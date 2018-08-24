<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <title><?php echo is_array($message) && isset($message['message'])?$message['message']:$message;?></title>
    <link rel="stylesheet" href="//store.bidcms.com/statics/plugins/weui/weui.min.css"/>
</head>
<body>
<div class="container" id="container">
  <div class="weui-msg">
        <div class="weui-msg__icon-area"><i class="weui-icon-<?php echo isset($message['type'])?$message['type']:'info';?> weui-icon_msg"></i></div>
        <div class="weui-msg__text-area">
            <h2 class="weui-msg__title">操作提示</h2>
            <p class="weui-msg__desc"><?php echo isset($message['message'])?$message['message']:'请点击确定';?></p>
        </div>
        <div class="weui-msg__opr-area">
            <p class="weui-btn-area">
                <a href="javascript:cBack();" class="weui-btn weui-btn_primary">确定</a>
            </p>
        </div>
        <div class="weui-msg__extra-area">
            <div class="weui-footer">
                <p class="weui-footer__links">
                    <a href="javascript:void(0);" class="weui-footer__link">必得CMS</a>
                </p>
                <p class="weui-footer__text">Copyright © 2008-2016 bidcms.com</p>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
<!--
var time="<?php echo $time;?>";
var url='<?php echo $url;?>';
if(time>0){
	setTimeout(function(){window.location.replace(url);},time*1000);
}
function cBack(){
	if(url!=''){
		window.location.replace(url);
	} else {
		window.history.go(-1);
	}
}
//-->
</script>
</body>
</html>
