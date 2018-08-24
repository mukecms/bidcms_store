<?php
/*
	[Bidcms.com!] (C)2009-2011 Bidcms.com.
	This is NOT a freeware, use is subject to license terms
	$author limengqi
	$Id: showcase.class.php 2010-08-24 10:42 $
*/
if(!defined('IN_BIDCMS')) {
	exit('Access Denied');
}
header("content-type:text/html;charset=utf-8");
class sms_controller extends controller
{
	function __construct(){
		$this->models_dir=MODELS_PATH;
		$this->views_dir=VIEWS_PATH;
	}
	function index_action(){
		include $this->bidcms_template('log','views/sms');
	}
	function recharge_action(){
		include $this->bidcms_template('recharge','views/sms');
	}

	function recharge_log_action(){
		include $this->bidcms_template('recharge_log','views/sms');
	}
}