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
class index_controller extends controller
{
	function __construct(){
		$this->models_dir=MODELS_PATH;
		$this->views_dir=VIEWS_PATH;
	}
	function index_action(){
		global $token;
		
		//ËùÓÐÉÌÆÌ
		$shops=$this->bidcms_model('system_shops')->get_page();
		include $this->bidcms_template('global_index');
	}

	function qrcode_action(){
		if(!empty($_GET['link'])){
			include ROOT_PATH.'inc/classes/qr.class.php';
			QRcode::png(urldecode($_GET['link']));
		}

	}
}
