<?php
session_start();
error_reporting(0);
set_time_limit(1000);
require('inc/common.inc.php');

define("SYSTEM_PATH",dirname(__FILE__).'/');
define("MODELS_PATH",SYSTEM_PATH.'models/');
define("VIEWS_PATH",SYSTEM_PATH.'views/');

define("API_ROOT",'http://shop.bidcms.com/');
define("API_WXAPP",'http://shop.bidcms.com/wxapp/');
define("API_STORE",'http://shop.bidcms.com/store/');
define("SITE_ROOT",'http://'.$_SERVER['SERVER_NAME'].'/');

$controller=empty($_REQUEST['con'])?'index':$_REQUEST['con'];
$action=empty($_REQUEST['act'])?'index':$_REQUEST['act'];

$input=$base->bidcms_request(null,'input',true);
$get=$base->bidcms_request(null,'get',true);
//商户ID
if(!empty($get['store_id'])){
	$store_id=intval($get['store_id']);
	$cookie->set('store_id',$store_id);
} else {
	$store_id=$cookie->get('store_id');
}
//用户token
if(!empty($get['token'])){
	$token=$get['token'];
	$cookie->set('sutoken',$token);
} else {
	$token=$cookie->get('sutoken');
}
$manager=$store=array();
if(!empty($token) && $store_id>0){
	$manager=$base->bidcms_model('system_user')->get_cache_hash($token);
	$store=$base->bidcms_model('system_shops')->get_cache_hash($token,$store_id);
}

if(empty($manager)){
	if($_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest'){
		echo '{"status":-1,"msg":"用户不存在,请刷新页面重新登录"}';
		exit;
	} else {
		sheader(API_ROOT,3,array('message'=>'用户为空，请登录后操作'));
	}
}
if(empty($store)){
	if($_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest'){
		echo '{"status":-1,"msg":"商户不存在,请刷新页面重新登录"}';
		exit;
	} else {
	sheader(API_ROOT,3,array('message'=>'商户不存在，请登录后操作'));
	}
}

require(ROOT_PATH.'inc/global.menu.php');
$left_menu=isset($menu[$controller])?$menu[$controller]:$menu['shop'];
$file=SYSTEM_PATH.'controls/'.$controller.'.class.php';

if(is_file($file)) {
	include_once($file);
	$conclass=$controller.'_controller';
	$actfunc=$action.'_action';
	if(method_exists($conclass, $actfunc)){
		$views=new $conclass;
		$views->$actfunc();
	}else{
		echo $actfunc.'()方法不存在';
	}
}else{
	echo $controller.".class.php控制器文件不存在";
}
