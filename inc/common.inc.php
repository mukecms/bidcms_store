<?php
/*
	[Bidcms.com!] (C)2009-2014 Bidcms.com.
	This is NOT a freeware, use is subject to license terms
	$author: limengqi
	$Id: common.inc.php 2010-08-24 10:42 $
*/

if (isset($_REQUEST['GLOBALS']) OR isset($_FILES['GLOBALS'])) {
	exit('Request tainting attempted.');
}
date_default_timezone_set("PRC");
define('ROOT_PATH',str_replace('\\','/',substr(dirname(__FILE__),0,-3)));
define('IN_BIDCMS',1);


header("Content-type:text/html;charset=".$charset);

//加载公共函数
require(ROOT_PATH.'/inc/global.func.php');

//加载cookie类
require(ROOT_PATH."/inc/classes/cookie.class.php");
$cookie=new cookies($cookie_info);

//Controller
require(ROOT_PATH.'/inc/controller.class.php');
$base=new controller();

//Model
require(ROOT_PATH.'/inc/model.class.php');

//Curl
require(ROOT_PATH.'/inc/classes/curl.class.php');
$curl=new curl();

//Cache
require(ROOT_PATH.'/inc/classes/cache.class.php');
$cache=new cache(ROOT_PATH.'data/cache/');

require(ROOT_PATH.'/inc/global.inc.php');


define('SITE_ROOT','http://store.bidcms.com/');
define('SITE_LANG_ID','2');
define('SITE_LANG','zh-cn');
define('SITE_TITLE','');
define('SEO_TITLE','');
define('SITE_THEME','default');
define('VERSION','BidCms_3.0');
define('BIDCMS_CLIENT_SESSION','bidcms');
define('SITE_CURRENCY','CNY');
