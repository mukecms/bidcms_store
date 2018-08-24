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
class sku_controller extends controller
{
	function __construct(){
		$this->models_dir=MODELS_PATH;
		$this->views_dir=VIEWS_PATH;
	}
	function ajax_norms_action(){
		if($_POST['name']=='规格名称'){
			echo '{"key":"0","text":"\u89c4\u683c\u540d\u79f0"}';
		} else {
			$sku=$this->bidcms_model('sku_base')->save($_POST);
			echo $this->bidcms_json(array('key'=>$sku['id'],'text'=>$sku['name']));
		}
	}
	function ajax_props_action(){
		if($_POST['id']>0){
			$attr=$this->bidcms_model('sku_attribute')->save($_POST);
			echo $this->bidcms_json(array('key'=>$attr['id'],'text'=>$attr['name']));
		}
	}
}